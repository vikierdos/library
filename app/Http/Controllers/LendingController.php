<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LendingController extends Controller
{
    public function index()
    {
        return Lending::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $record = new Lending();
        $record->fill($request->all());
        $record->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id, $copy_id, $start)
    {
        $lending = Lending::where('user_id', $user_id)
            ->where('copy_id', $copy_id)
            ->where('start', $start)
            //listát ad vissza:
            ->get();
        return $lending[0];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id, $copy_id, $start)
    {
        $record = $this->show($user_id, $copy_id, $start);
        $record->fill($request->all());
        $record->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id, $copy_id, $start)
    {
        $this->show($user_id, $copy_id, $start)->delete();
    }

    //lekérdezések

    public function lendingsCopies()
    {
        $user = Auth::user();
        return Lending::with('copies')
        ->where('user_id', '=', $user->id)
        ->get();
    }

    public function lendingsDate()
    {
        return Lending::with('users')
        ->where('start', '=', '1995-02-21')
        ->get();
    }
    public function specificCopy($copy_id)
    {
        return Lending::with('copies')
        ->where("copy_id", "=", $copy_id)
        ->get();
    }
}

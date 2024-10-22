<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
<<<<<<< HEAD
use Illuminate\Http\JsonResponse;
=======
>>>>>>> a7043f99f93028c712bab7f35327cf80c83cd855
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
<<<<<<< HEAD
            'password' => ['required', Rules\Password::defaults()],
=======
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
>>>>>>> a7043f99f93028c712bab7f35327cf80c83cd855
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
        ]);

        event(new Registered($user));

        $token = $user->createToken('auth_token')->plainTextToken;
<<<<<<< HEAD
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);

        }
=======
        
        return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => $user
        ]);

    }
>>>>>>> a7043f99f93028c712bab7f35327cf80c83cd855
}

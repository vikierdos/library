<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

<<<<<<< HEAD

=======
>>>>>>> a7043f99f93028c712bab7f35327cf80c83cd855
class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string'],
<<<<<<< HEAD
                'password_confirmation' => 'required'
            ]);
        if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json(['message' => 'Invalid login credentials'], 401);
            }
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'status' => 'Login successful',
        ]);
=======
            ]);
    if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json(['message' => 'Invalid login credentials'], 401);        }
    
    $user = Auth::user();
    $token = $user->createToken('auth_token')->plainTextToken;
    return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
                'status' => 'Login successful',
            ]);
>>>>>>> a7043f99f93028c712bab7f35327cf80c83cd855
    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
<<<<<<< HEAD
    	return response()->json(['message' => 'Logout successful']);
    }
=======
        return response()->json(['message' => 'Logout successful']);
    }

>>>>>>> a7043f99f93028c712bab7f35327cf80c83cd855
}

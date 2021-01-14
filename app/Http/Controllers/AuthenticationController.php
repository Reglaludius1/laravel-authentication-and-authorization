<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(Request $request) {
        if ($request->isMethod('GET')) {
            return view('components.login');
        } elseif ($request->isMethod('POST')) {
            $credentials = $request->except(('_token'));

            if (Auth::attempt($credentials)) {
                return redirect()->route('users.posts', ['user' => Auth::user()]);
            } else {
                abort(401);
            }
        }

        return response()->json(['message' => 'The following method is not supported on this endpoint.']);
    }

    public function register(Request $request) {
        if ($request->isMethod('GET')) {
            return view('components.register');
        } elseif ($request->isMethod('POST')) {
            $user = new User($request->all());

            $user->password = bcrypt($request->password);

            $user->role = "user";

            $user->save();

            return redirect()->route('/');
        }

        return response()->json(['message' => 'The following method is not supported on this endpoint.']);
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('/');
    }
}

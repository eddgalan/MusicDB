<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show() {
        if( Auth::check() ) {
            return redirect('/home');
        } else {
            return view('login', ['title' => 'Login']);
        }
    }

    public function login(LoginRequest $request) {
        $credentials = $request->getCredentials();
        if( !Auth::validate($credentials) ) {
            return redirect()->to('/login')->withErrors('Username or Password incorrect.');
        } else {
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            return $this->authenticated($request, $user);
        }
    }

    public function authenticated(Request $request, $user) {
        return redirect('/home');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect()->to('/login');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function show() {
      return view('register');
    }

    public function register(RegisterRequest $request) {
        $user = User::create($request->validated());
        return redirect('/')->with('success', 'Account successfully registered.');
    }

}

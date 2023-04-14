<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function create ()
    {
        return view('register');
    }

      public function store(Request $request)
    {
        $user = $request->only(['name','email','password']);

        return view('toppage', compact('user'));
    }
    
}

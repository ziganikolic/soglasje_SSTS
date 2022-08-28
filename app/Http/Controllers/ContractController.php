<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $token = auth()->user()->remember_token;


        if ($token == null){
            return view('auth.passwords.email');
        } else {
            return view('contract',compact('user'));
        }
    }
}

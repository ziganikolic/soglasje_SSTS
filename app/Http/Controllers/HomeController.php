<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use http\Client\Curl\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Database;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user()->remember_token;


        if ($user == null){
            return view('auth.passwords.email');
        } else {
            if(auth()->user()->role == 1){
                return view('home');
            }else{
                return redirect()->route('dashboard');
            }
        }



    }
}

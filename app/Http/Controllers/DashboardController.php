<?php

namespace App\Http\Controllers;

use App\Models\ContractStatus;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\ContractStatusResource;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user()->remember_token;


        if ($user == null){
            return view('auth.passwords.email');
        } else {
            if(auth()->user()->role != 1){

                $users = user::with('contractStatus')->get()->toArray();

                return view('dashboard.index',compact('users'));
            }else{
                return redirect('home');
            }
        }

    }

    public function show($id)
    {
        if(auth()->user()->role != 1) {
            $userID = $id;
            return view('dashboard.show', compact('userID'));
        }else{
            return redirect('home');
        }
    }

    public function store(Request $request)
    {
//        dd($request);

        $users = $request->users;
        $class = $request->class;
        $pwd = $request->pwd;

        $i = 0;

        foreach($users as $user){
            $datasave = new User;
            $datasave->name = $user['Ime'];
            $datasave->surname = $user['Priimek'];
            $datasave->email = $user['Email'];
//            $datasave->email_verified_at = now();        //za pravilno delovanje potrebna sprememba (na mail poslan link s katerim verificira profil in pridobi geslo (v testiranju)
            $datasave->password = Hash::make($pwd[$i]);
            $datasave->class = $class;
            $datasave->role = 1;
            //$datasave->data = serialize($data);
            $datasave->save();
            $i += 1;


        }

        return response()->json([
            "message" => "Uporabniki so kreirani"
        ], 201);
    }

    public function destroyALL(Request $request)
    {
        $users = $request->users;


        for($i=0; $i < count($users); $i++){
            $contract = ContractStatus::query()
                ->where('user_id', [$users[$i]])
                ->delete();

            $user = User::query()
                ->where('id', [$users[$i]])
                ->delete();

        }
        return response()->json([
            "message" => "Uporabniki so izbrisani"
        ], 201);

    }
}

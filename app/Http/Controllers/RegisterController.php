<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',  [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request){
        

        $validetedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validetedData['password'] = bcrypt($validetedData['password']);

        User::create($validetedData);

        // $request->session()->flash('success', 'Regristrasi berhasil!! silahkan Login');

        return redirect('/login')->with('success', 'Regristrasi berhasil!! silahkan Login') ;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Alert;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index(){
        $user = User::where('id', Auth::user()->id)->first();

        return view ('profil.index', [
            "title" => "Profil",
            "active" => "Home",
            "user" => $user]);
    }

    public function update(Request $request){
        $user = User::where('id', Auth::user()->id)->first();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->nohp = $request->nohp;
        $user->password = Hash::make($request->password);

        $user->update();

        alert()->success('User Berhasil di update', 'Succes');
        return redirect('profil');
    }
}

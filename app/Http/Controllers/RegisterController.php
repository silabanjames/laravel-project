<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'judul'=>'Register',
            'active'=> 'register'
        ]);
    }

    public function store(Request $request){
        $validateInput = $request->validate([
            'name'=>'required|max:255',
            'username'=>['required', 'unique:users', 'min:3', 'max:255'],
            'email'=>'required|unique:users|email:dns',
            'password'=>'required|min:3'
        ]);

        // $validateInput['password'] = Hash::make($validateInput['password']);
        User::create($validateInput);

        // $request->session()->flash('success', 'Registation successfull!');

        return redirect('/login')->with('success', 'Registation successfull!');
    }
}

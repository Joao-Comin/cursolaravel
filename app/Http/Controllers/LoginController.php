<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function auth(Request $request){
        
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'email.required'=> 'O campo Email é Obrigatorio!',
            'email.email' => 'O email não é valido',
            'password.required' => "O campo Senha é Obrigatorio",
        ]
    );

        if(Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->intended('dashbord');
        }else {
            return redirect()-> back()->with('erro', 'Email ou Senha invalidos');
        }

    }

}

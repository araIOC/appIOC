<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
Use Alert;

class LoginController extends Controller{
  public function __construct(){
    $this->middleware('guest',['only' => 'showLoginForm']);
  }

  public function showLoginForm(){
    return view('auth.login');
  }

  public function login(){
    $validacion = $this->validate(request(),[
      $this->username() => 'required|string',
      'password' => 'required|string'
    ]);
    if(Auth::attempt($validacion)){
      alert()->success('Bienvenido '. request($this->username()).'')->autoclose(2000);

      return redirect()->route('app');

    }
    return back()
    ->withErrors([$this->username() => trans('auth.datosIncorrectos'),'password' => trans('auth.datosIncorrectos')])
    ->withInput(request([$this->username()]));
  }

  public function logout(){
    Auth::logout();

    return redirect('/');
  }

  public function username()
  {
    return 'name';
  }
}
<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Session;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function login(Request $request){
        
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
                return redirect('/admin/dashboard');
            }else{
                return redirect('/admin')->with('flash_message_error','Email ou usuario invalido, tente novamente.');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function settings(){
        return view('admin.settings');
    }

    public function logout(){

        Session::flush();
        return redirect('/admin')->with('flash_message_sucess','Sessão finalizada. Faça o login novamente para entrar no sistema.');
    }
}

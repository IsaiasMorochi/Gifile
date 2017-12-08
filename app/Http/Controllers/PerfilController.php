<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Auth;
class PerfilController extends Controller
{
    public function index(){
    	$user = User::findOrFail(Auth::user()->id);
    	$creados = DB::table('workflows as wu')->select('wu.*')->where('wu.id_users','=',Auth::user()->id)->get();
    	$asignados = DB::table('workflow_usuarios as wu')->select('wu.*')->where('wu.id_users','=',Auth::user()->id)->get();
    	return view('auth.profile.index',["user"=>$user,"creados"=>$creados,"asignados"=>$asignados]);
    }

    public function store(Request $request){
    	$user = User::findOrFail(Auth::user()->id);
    	$user->nombre = $request->get('nombre');
    	$user->apellido = $request->get('apellido');
    	$user->password = bcrypt($request->get('password'));
    	$user->update();
    	return back();
    }
}

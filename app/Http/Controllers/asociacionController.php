<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\asociacion;
use Auth;
use Input;
use Redirect;
use Image;
use File;
use Validator;
use DB;
use Config;
class asociacionController extends Controller
{
	public function create(Request $request){
		$var = "validar  valida";

		$this->validate($request, [
			'name'      => 'required',
			'direccion' => 'required',
			'pais'      => 'required',
			'provincia' => 'required',
			'poblacion' => 'required',
			'cp'        => 'required',
			'email'     => 'required',
			'password'  => 'required',
			'web'       => 'required',
			'telefono'  => 'required',
		]);


		$asociacion = new asociacion(array(
			'nombre'      => $request->input('name'),
			'direccion' => $request->input('direccion'),
			'pais'      => $request->input('pais'),
			'provincia' => $request->input('provincia'),
			'poblacion' => $request->input('poblacion'),
			'cp'        => $request->input('cp'),
			'email'     => $request->input('email'),
			'password'  => $request->input('password'),
			'web'       => $request->input('web'),
			'telefono'  => $request->input('telefono'),
		));

		if($asociacion->save()){
			return Redirect::to('login')->with('send','Registro completado con exito!');
		}

	}
}
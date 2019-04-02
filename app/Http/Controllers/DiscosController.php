<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
class DiscosController extends Controller{

	public function consultarDiscos(){
		$trabajos = DB::table('trabajos')->select()->get();
		$pacientes = DB::table('pacientes_tratamientos')
		->join('trabajos', 'pacientes_tratamientos.id', '=', 'trabajos.id_tratamiento')
		->join('pacientes', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
		->select()
		->get();

		return view('consultarDiscos',['trabajos'=>$trabajos,'pacientes'=>$pacientes]);
	}

	public function registroDisco(){
		$trabajos = DB::table('trabajos')->select()->get();
		$materiales = DB::table('material')->select()->get();
		$colores = DB::table('colores')->select()->get();
		$discos = DB::table('discos')->select()->get();
		$maquinas = DB::table('maquina')->select()->get();
		$tratamientos = DB::table('tratamientos')->select()->get();

		$pacientes = DB::table('pacientes_tratamientos')
		->join('trabajos', 'pacientes_tratamientos.id', '=', 'trabajos.id_tratamiento')
		->join('pacientes', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
		->select()
		->get();
		return view('agregarDisco',['trabajos'=>$trabajos,'materiales'=>$materiales,'colores'=>$colores,'discos'=>$discos,'maquinas'=>$maquinas,'tratamientos'=>$tratamientos,'pacientes'=>$pacientes]);
	}
}

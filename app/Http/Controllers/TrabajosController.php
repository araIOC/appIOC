<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
class TrabajosController extends Controller{

	public function consultarTrabajos(){
		$trabajos = DB::table('trabajos')->select()->get();
		$pacientes = DB::table('pacientes_tratamientos')
		->join('trabajos', 'pacientes_tratamientos.id', '=', 'trabajos.id_tratamiento')
		->join('pacientes', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
		->select()
		->get();
		$tipos_trabajo = DB::table('tipo_trabajo')->select()->get();
		$materiales = DB::table('material')->select()->get();

		return view('consultarTrabajos',['trabajos'=>$trabajos,'pacientes'=>$pacientes,'tipos_trabajo' => $tipos_trabajo,'materiales'=>$materiales]);
	}

	public function registroTrabajo(){
		$trabajos = DB::table('trabajos')->select()->get();
		$materiales = DB::table('material')->select()->get();
		$colores = DB::table('colores')->select()->get();
		$discos = DB::table('discos')->select()->get();
		$maquinas = DB::table('maquina')->select()->get();
		$tratamientos = DB::table('tratamientos')->select()->get();
		$tipos_trabajo = DB::table('tipo_trabajo')->select()->get();

		$pacientes = DB::table('pacientes_tratamientos')
		->join('trabajos', 'pacientes_tratamientos.id', '=', 'trabajos.id_tratamiento')
		->join('pacientes', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
		->select()
		->get();
		return view('agregarTrabajo',['trabajos'=>$trabajos,'materiales'=>$materiales,'colores'=>$colores,'discos'=>$discos,'maquinas'=>$maquinas,'tratamientos'=>$tratamientos, 'tipos_trabajo' => $tipos_trabajo,'pacientes'=>$pacientes]);
	}
	public function agregarTrabajo(){

	}
}

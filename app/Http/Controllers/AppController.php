<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
class AppController extends Controller{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		return view('bienvenido');
	}

	public function consultarPacientes(){
		$implantes = DB::table('implantes')->select()->get();
		$tratamientos = DB::table('tratamientos')->select()->get();
		$doctores = DB::table('doctores')->select()->get();
		$asesores = DB::table('asesores')->select()->get();
		$pacientes = DB::table('pacientes_tratamientos')
		->join('pacientes', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
		->join('tratamientos', 'pacientes_tratamientos.id_tratamiento', '=', 'tratamientos.id')
		->select()
		->get();

		return view('consultarPacientes',['asesores'=>$asesores,'doctores'=>$doctores,'tratamientos'=>$tratamientos,'implantes'=>$implantes,'pacientes'=>$pacientes]);
	}

	public function registroPacientes(){
		return view('agregarPaciente');
	}
	public function agregarPacientes(){
		$pacientes = DB::table('pacientes')->select('codigo')->get()
			->where('codigo',request()->codigo);
		if (count($pacientes)>0) {
				Alert::error('Failed','Paciente duplicado');
				return view('agregarPaciente');
		}else{
			DB::table('pacientes')->insert(
				['nombre' => request()->nombre,'apellidos' => request()->apellidos,'codigo' => request()->codigo]
			);
			alert()->success('Éxito', 'Paciente agregado.');
			return redirect()->route('consultar');
		}
	}
	public function agregarTratamiento(){
		$implantes = DB::table('implantes')->select()->get();
		$tratamientos = DB::table('tratamientos')->select()->get();
		$doctores = DB::table('doctores')->select()->get();
		$asesores = DB::table('asesores')->select()->get();
		return view('agregarTratamiento',['asesores'=>$asesores,'doctores'=>$doctores,'tratamientos'=>$tratamientos,'implantes'=>$implantes]);
	}
}

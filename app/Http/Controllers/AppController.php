<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
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
		$pacientes = DB::table('pacientes')->select()->get();
		$pacientes_tratamientos = DB::table('pacientes')
		->join('pacientes_tratamientos', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
		->join('tratamientos', 'pacientes_tratamientos.id_tratamiento', '=', 'tratamientos.id')
		->select()
		->get();

		return view('consultarPacientes',['asesores'=>$asesores,'doctores'=>$doctores,'tratamientos'=>$tratamientos,'implantes'=>$implantes,'pacientes'=>$pacientes,'pacientes_tratamientos'=>$pacientes_tratamientos]);
	}

	public function registroPacientes(){
		return view('agregarPaciente');
	}

	public function agregarPacientes(){
		$validacion = $this->validate(request(),[
			'nombre' => 'required|string',
			'apellidos' => 'required|string',
			'codigo' => 'required|string'
		]);
		if($validacion){
			$pacientes = DB::table('pacientes')->select()->get()
			->where('codigoP',request()->codigo);
			if (count($pacientes)>0) {
				alert()->error('Error','Paciente duplicado');
				return view('agregarPaciente');
			}else{
				DB::table('pacientes')->insert(
					['nombreP' => request()->nombre,'apellidosP' => request()->apellidos,'codigoP' => request()->codigo]
				);

				return redirect()->route('consultar');
			}
		}
	}

	public function agregarTratamiento(){
		$implantes = DB::table('implantes')->select()->get();
		$tratamientos = DB::table('tratamientos')->select()->get();
		$doctores = DB::table('doctores')->select()->get();
		$asesores = DB::table('asesores')->select()->get();
		return view('agregarTratamiento',['asesores'=>$asesores,'doctores'=>$doctores,'tratamientos'=>$tratamientos,'implantes'=>$implantes]);
	}

	/*public function eliminarPaciente($codigoP){
		if(request()->ajax()){
			$pacientes = DB::table('pacientes')->select()->get()
			->where('codigoP',request()->codigo);
			$pacientes->delete();
		}

	}*/
}

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

		$query = 'SELECT * FROM PACIENTES_TRATAMIENTOS as PT
		LEFT OUTER JOIN PACIENTES as P ON P.ID = PT.ID_PACIENTE
		UNION
		SELECT * FROM PACIENTES_TRATAMIENTOS as PT
		RIGHT OUTER JOIN PACIENTES as P ON P.ID = PT.ID_PACIENTE
		ORDER BY id_paciente';

		$pacientes = DB::select($query);
		return view('consultarPacientes',['asesores'=>$asesores,'doctores'=>$doctores,'tratamientos'=>$tratamientos,'implantes'=>$implantes,'pacientes'=>$pacientes]);
	}

	public function registroPacientes(){
		return view('agregarPaciente');
	}

	public function agregarPacientes(){

		$validacion = $this->validate(request(),[
			'nombre' => 'required|string',
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
					['nombreP' => request()->nombre,'codigoP' => request()->codigo]
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

	public function buscadorPaciente(){

		$implantes = DB::table('implantes')->select()->get();
		$tratamientos = DB::table('tratamientos')->select()->get();
		$doctores = DB::table('doctores')->select()->get();
		$asesores = DB::table('asesores')->select()->get();
		$query = 'SELECT * FROM PACIENTES_TRATAMIENTOS as PT
		LEFT OUTER JOIN PACIENTES as P ON P.ID = PT.ID_PACIENTE
		UNION
		SELECT * FROM PACIENTES_TRATAMIENTOS as PT
		RIGHT OUTER JOIN PACIENTES as P ON P.ID = PT.ID_PACIENTE
		where 1=1';

		$tratamiento = request()->nombreT;

		if($tratamiento != "Elija un tratamiento..."){
			$query.=" AND nombreT = '".request()->nombreT."'";
		}

		$pacientes = DB::select($query);

		return view('consultarPacientes',['asesores'=>$asesores,'doctores'=>$doctores,'tratamientos'=>$tratamientos,'implantes'=>$implantes,'pacientes'=>$pacientes]);
	}

}
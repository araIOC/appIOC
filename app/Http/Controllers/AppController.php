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
		//$pacientes = DB::table('pacientes')->select()->get();
		/*$pacientes = DB::table('pacientes')
		->leftJoin('pacientes_tratamientos', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
		->leftJoin('tratamientos', 'pacientes_tratamientos.id_tratamiento', '=', 'tratamientos.id')
		->leftJoin('doctores', 'pacientes_tratamientos.id_doctor', '=', 'doctores.id')
		->leftJoin('asesores', 'pacientes_tratamientos.id_asesor', '=', 'asesores.id')
		->select()
		->distinct()
		->get();*/
		$query = 'SELECT * FROM PACIENTES_TRATAMIENTOS as PT
		LEFT OUTER JOIN PACIENTES as P ON P.ID = PT.ID_PACIENTE
		UNION
		SELECT * FROM PACIENTES_TRATAMIENTOS as PT
		RIGHT OUTER JOIN PACIENTES as P ON P.ID = PT.ID_PACIENTE
		ORDER BY id_paciente';

		/*$pacientes = DB::table('pacientes')
					->leftJoin('pacientes_tratamientos', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
					->rightJoin('pacientes_tratamientos', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
					->orderBy('id_paciente')
					->get();;*/

					$pacientes = DB::select($query);
					return view('consultarPacientes',['asesores'=>$asesores,'doctores'=>$doctores,'tratamientos'=>$tratamientos,'implantes'=>$implantes,'pacientes'=>$pacientes]);
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

				public function buscadorPaciente(){
					$implantes = DB::table('implantes')->select()->get();
					$tratamientos = DB::table('tratamientos')->select()->get();
					$doctores = DB::table('doctores')->select()->get();
					$asesores = DB::table('asesores')->select()->get();
					$query = 'SELECT  * FROM PACIENTES as P
					LEFT OUTER JOIN PACIENTES_TRATAMIENTOS as PT ON P.ID = PT.ID_PACIENTE
					UNION
					SELECT * FROM PACIENTES as P
					RIGHT OUTER JOIN PACIENTES_TRATAMIENTOS as PT ON P.ID = PT.ID_PACIENTE
					INNER JOIN TRATAMIENTOS AS T ON T.ID = PT.ID_TRATAMIENTO
					where 1 = 1';

					$tratamiento = request()->nombreT;

					if($tratamiento != "Elija un tratamiento..."){
						$query = $query." AND nombreT = '".request()->nombreT."'";
					}
					$pacientes = DB::select($query);

					return view('consultarPacientes',['asesores'=>$asesores,'doctores'=>$doctores,'tratamientos'=>$tratamientos,'implantes'=>$implantes,'pacientes'=>$pacientes,'pacientes_tratamientos'=>$pacientes_tratamientos]);
				}
	/*public function eliminarPaciente($codigoP){
		if(request()->ajax()){
			$pacientes = DB::table('pacientes')->select()->get()
			->where('codigoP',request()->codigo);
			$pacientes->delete();
		}*/
	}
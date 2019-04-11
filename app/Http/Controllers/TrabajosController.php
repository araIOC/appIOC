<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
class TrabajosController extends Controller{

	public function consultarTrabajos(){

		$trabajos = DB::table('pacientes_tratamientos')
		->join('trabajos', 'pacientes_tratamientos.id', '=', 'trabajos.id_tratamiento')
		->join('pacientes', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
		->join('tratamientos', 'pacientes_tratamientos.id_tratamiento', '=', 'tratamientos.id')
		->select()
		->get();
		$tipos_trabajo = DB::table('tipo_trabajo')->select()->get();
		$materiales = DB::table('material')->select()->get();

		return view('consultarTrabajos',['trabajos'=>$trabajos,'tipos_trabajo' => $tipos_trabajo,'materiales'=>$materiales]);
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

	public function filtroTratamientos(){

		$codigoP = request()->codigopaciente;
		$query = DB::select('SELECT DISTINCT nombreT FROM TRATAMIENTOS T INNER JOIN PACIENTES_TRATAMIENTOS PT ON T.ID = PT.ID_TRATAMIENTO INNER JOIN PACIENTES P ON PT.ID_PACIENTE = P.ID WHERE P.CODIGOP LIKE "%'.$codigoP .'%"');

		$select = '<option value="">Elija un tratamiento...</option>';
		foreach ($query as $tratamiento) {
			if($codigoP)
				$select .= '<option value="'.$tratamiento->nombreT.'">'.$tratamiento->nombreT.'</option>';
		}
		echo $select;
	}


	public function agregarTrabajo(){
		$tratamiento = DB::table('trabajos')
		->join('pacientes_tratamientos', 'pacientes_tratamientos.id', '=', 'trabajo.id_tratamiento')
		->join('pacientes', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
		->join('tratamientos', 'pacientes_tratamientos.id_tratamiento', '=', 'tratamiento.id')
		->whereColumn([
			['codigoP', '=', request()->codigopaciente],
			['nombreT', '=', request()->tratamientop]
		])->get();
		/*

		DB::table('trabajos')->insert(
			['codigo' => request()->codigo,'material' => request()->material,'marca' => request()->marca,'escala' => request()->escala,'color' => request()->color,'altura' => request()->altura]
		);

		return redirect()->route('consultarDiscos');*/
		var_dump($tratamiento);
	}

	public function buscadorTrabajo(){
		$tipo_trabajo = request()->tipo_trabajo;
		$material = request()->materialTrabajo;
		$codigoP = request()->codigoPTrabajo;
		$nombreP = request()->nombrePTrabajo;

		$query ='SELECT T.*, P.codigoP, P.nombreP, TR.nombreT
		FROM TRABAJOS T
		INNER JOIN PACIENTES_TRATAMIENTOS PT
		ON PT.ID = T.ID_TRATAMIENTO
		INNER JOIN PACIENTES P
		ON PT.ID_PACIENTE = P.ID
		INNER JOIN TRATAMIENTOS TR
		ON PT.ID_TRATAMIENTO = TR.ID
		WHERE 1 = 1';

		if($material != "Material..."){
			$query = $query." AND material = '".$material."'";
		}

		if($tipo_trabajo != "Tipo de trabajo..."){
			$query = $query." AND tipo_trabajo = '".$tipo_trabajo."'";
		}

		if($nombreP){
			$query = $query." AND nombreP LIKE  '%".$nombreP."%'";
		}

		if($codigoP){
			$query = $query." AND codigoP LIKE '%".$codigoP."%'";
		}
		$trabajos = DB::select($query);
		$tabla = "";
		foreach ($trabajos as $trabajo) {
			$tabla.='<tr>
			<th class="test1"scope="row" data-toggle="modal" data-target=".modal-ficha-trabajo" data-nombrep="'.$trabajo->nombreP.'" data-nombret="'.$trabajo->nombreT.'" data-material="'.$trabajo->material.'" data-tipotrabajo="'.$trabajo->tipo_trabajo.'" data-npiezas="'.$trabajo->n_piezas.'" data-color="'.$trabajo->color.'" data-maquina="'.$trabajo->maquina.'" data-notas="'.$trabajo->notas.'">'.$trabajo->codigoP.'</th>
			<th scope="row" data-toggle="modal" data-target=".modal-ficha-trabajo" data-nombrep="'.$trabajo->nombreP.'" data-nombret="'.$trabajo->nombreT.'" data-material="'.$trabajo->material.'" data-tipotrabajo="'.$trabajo->tipo_trabajo.'" data-npiezas="'.$trabajo->n_piezas.'" data-color="'.$trabajo->color.'" data-maquina="'.$trabajo->maquina.'" data-notas="'.$trabajo->notas.'">'.$trabajo->nombreP.'</th>
			<td data-toggle="modal" data-target=".modal-ficha-trabajo" data-nombrep="'.$trabajo->nombreP.'" data-nombret="'.$trabajo->nombreT.'" data-material="'.$trabajo->material.'" data-tipotrabajo="'.$trabajo->tipo_trabajo.'" data-npiezas="'.$trabajo->n_piezas.'" data-color="'.$trabajo->color.'" data-maquina="'.$trabajo->maquina.'" data-notas="'.$trabajo->notas.'">'.$trabajo->tipo_trabajo.'</td>
			<td>
			<button data-toggle="tooltip" data-placement="auto" title="Modificar" class="btn btn-outline-warning mx-auto" type="submit"><i class="fas fa-sync-alt"></i></button>
			</td>
			</tr>';

		}echo $tabla;
	}
}
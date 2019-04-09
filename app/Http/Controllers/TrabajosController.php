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
		$codigoP = request()->codigop;
		$query = DB::table('pacientes_tratamientos')
		->join('pacientes', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
		->where('codigoP', 'like', '%'.$codigoP.'%')
		->get();
		$tratamientos = DB::table('tratamientos')
		->where($query->id_tratamiento, '=', 'id')
		->get();

		$select = '<option value="">Elija un tratamiento...</option>';
		foreach($tratamientos as $tratamiento){
			$select .= '<option value="'.$tratamiento->nombreT.'">'.$tratamiento->nombreT.'</option>';
		}
		echo $select;
	}


/*public function agregarTrabajo(){

}*/

public function buscadorTrabajo(){
	$tipo_trabajo = request()->tipo_trabajo;
	$material = request()->material;
	$codigoP = request()->codigoP;
	$nombreP = request()->nombreP;

	$tipos_trabajo = DB::table('tipo_trabajo')->select()->get();
	$materiales = DB::table('material')->select()->get();

	$query ='SELECT * FROM trabajos t
	inner join pacientes_tratamientos pt on pt.id = t.id_tratamiento
	inner join pacientes p on pt.id_paciente = p.id where 1 =1';

	if($material != "Material..."){
		$query = $query." AND material = '".$material."'";
	}

	if($tipo_trabajo != "Tipo de trabajo..."){
		$query = $query." AND tipo_trabajo = '".$tipo_trabajo."'";
	}

	if($nombreP){
		$query = $query." AND nombreP LIKE  '%".$nombreP."%' OR apellidosP LIKE  '%".$nombreP."%'";
	}

	if($codigoP){
		$query = $query." AND codigoP = '".$codigoP."'";
	}

	$trabajos = DB::select($query);
	return view('consultarTrabajos',['trabajos'=>$trabajos,'tipos_trabajo' => $tipos_trabajo,'materiales'=>$materiales]);
}
}
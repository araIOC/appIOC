<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
class TrabajosController extends Controller{

	public function consultarTrabajos(){

		$trabajos = DB::table('pacientes_tratamientos')
		->join('trabajos', 'pacientes_tratamientos.id_pt', '=', 'trabajos.id_tratamiento')
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
		->join('trabajos', 'pacientes_tratamientos.id_pt', '=', 'trabajos.id_tratamiento')
		->join('pacientes', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id')
		->select()
		->get();
		return view('agregarTrabajo',['trabajos'=>$trabajos,'materiales'=>$materiales,'colores'=>$colores,'discos'=>$discos,'maquinas'=>$maquinas,'tratamientos'=>$tratamientos, 'tipos_trabajo' => $tipos_trabajo,'pacientes'=>$pacientes]);
	}

	public function filtroTratamientos(){

		$codigoP = request()->codigopaciente;
		$query = DB::select('SELECT  nombreT FROM TRATAMIENTOS T INNER JOIN PACIENTES_TRATAMIENTOS PT ON T.ID = PT.ID_TRATAMIENTO INNER JOIN PACIENTES P ON PT.ID_PACIENTE = P.ID WHERE P.CODIGOP LIKE "%'.$codigoP .'%"');

		$select = '<option value="">Elija un tratamiento...</option>';
		foreach ($query as $tratamiento) {
			if($codigoP)
				$select .= '<option value="'.$tratamiento->nombreT.'">'.$tratamiento->nombreT.'</option>';
		}
		echo $select;
	}


	public function agregarTrabajo(){
		$tratamiento = DB::table('trabajos')
		->join('pacientes_tratamientos', 'pacientes_tratamientos.id_pt', '=', 'trabajo.id_tratamiento')
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

		$query ='SELECT T.*, P.codigoP, P.nombreP, TR.nombreT, D.codigoD
		FROM TRABAJOS T
		INNER JOIN PACIENTES_TRATAMIENTOS PT
		ON PT.ID_PT = T.ID_TRATAMIENTO
		INNER JOIN PACIENTES P
		ON PT.ID_PACIENTE = P.ID
		INNER JOIN TRATAMIENTOS TR
		ON PT.ID_TRATAMIENTO = TR.ID
		LEFT OUTER JOIN DISCOS D
		ON T.ID_DISCO = D.ID
		WHERE 1 = 1';

		if($material != "Material..."){
			$query = $query." AND materialT = '".$material."'";
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
		return view('datosTrabajos',['trabajos'=>$trabajos]);
	}
	public function modificarMaterialTrabajo(){
		$materiales = DB::table('material')->select()->get();
		$nombreMaterial = request()->material;

		$select = '<select class="custom-select mr-sm-2" id="materialTrabajoMod" name="materialTrabajoMod">';
		foreach ($materiales as $material){
			if($material->nombreM == $nombreMaterial){
				$select .='<option value="'.$material->nombreM.'" selected>'.$material->nombreM.'</option>';
			}else{
				$select .='<option value="'.$material->nombreM.'">'.$material->nombreM.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
	}
	public function modificarTipoTrabajo(){
		$tipos = DB::table('tipo_trabajo')->select()->get();
		$tipoTrabajo = request()->tipo_trabajo;

		$select = '<select class="custom-select mr-sm-2" id="tipoTrabajoMod" name="tipoTrabajoMod">';
		foreach ($tipos as $tipo){
			if($tipo->tipoT == $tipoTrabajo){
				$select .='<option value="'.$tipo->tipoT.'" selected>'.$tipo->tipoT.'</option>';
			}else{
				$select .='<option value="'.$tipo->tipoT.'">'.$tipo->tipoT.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
	}
	public function modificarColorTrabajo(){
		$colores = DB::table('colores')->select()->get();
		$colorT = request()->colorT;

		$select = '<select class="custom-select mr-sm-2" id="colorTrabajoMod" name="colorTrabajoMod"><option></option>';
		foreach ($colores as $color){
			if($color->nombreC == $colorT){
				$select .='<option value="'.$color->nombreC.'" selected>'.$color->nombreC.'</option>';
			}else{
				$select .='<option value="'.$color->nombreC.'">'.$color->nombreC.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
	}
	public function modificarDiscoTrabajo(){
		$discos = DB::table('discos')->select()->get();
		$codigoDisco = request()->codigoDisco;

		$select = '<select class="custom-select mr-sm-2" id="discoTrabajoMod" name="discoTrabajoMod"><option></option>';
		foreach ($discos as $disco){
			if($disco->codigoD == $codigoDisco){
				$select .='<option value="'.$disco->codigoD.'" selected>'.$disco->codigoD.'</option>';
			}else{
				$select .='<option value="'.$disco->codigoD.'">'.$disco->codigoD.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
	}
	public function modificarMaquinaTrabajo(){
		$maquinas = DB::table('maquina')->select()->get();
		$maquinaT = request()->maquina;

		$select = '<select class="custom-select mr-sm-2" id="maquinaTrabajoMod" name="maquinaTrabajoMod"><option></option>';
		foreach ($maquinas as $maquina){
			if($maquina->nombreMaq == $maquinaT){
				$select .='<option value="'.$maquina->nombreMaq.'" selected>'.$maquina->nombreMaq.'</option>';
			}else{
				$select .='<option value="'.$maquina->nombreMaq.'">'.$maquina->nombreMaq.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
	}

	public function modificarTrabajo(){
		$id_disco = DB::table('discos')->select('id')->where('codigoD', '=',request()->codigoDiscoT)->get();
		DB::table('trabajos')->where('id', request()->id)
		->update([
			'materialT' => request()->materialT,
			'tipo_trabajo' => request()->tipo_trabajoT,
			'n_piezas' => request()->npiezasT,
			'color' => request()->colorT,
			'id_disco' => $id_disco[0]->id,
			'maquina' => request()->maquinaT,
			'notas' => request()->notasT
		]);
	}
}
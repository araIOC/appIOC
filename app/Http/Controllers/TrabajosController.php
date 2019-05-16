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
		->join('pacientes', 'pacientes_tratamientos.id_paciente', '=', 'pacientes.id_p')
		->select()
		->get();

		$nombre = request()->nombrep;
		$codigo = explode(': ', request()->codigop);
		$tratamiento = request()->tratamiento;
		$id_pt = request()->id_pt;

		return view('agregarTrabajo',['trabajos'=>$trabajos,'materiales'=>$materiales,'colores'=>$colores,'discos'=>$discos,'maquinas'=>$maquinas,'tratamientos'=>$tratamientos, 'tipos_trabajo' => $tipos_trabajo,'pacientes'=>$pacientes,'nombre'=>$nombre,'id_pt'=>$id_pt,'tratamiento'=>$tratamiento,'codigo'=>$codigo[1]]);
	}

	/* function filtroTratamientos(){

		$codigoP = request()->codigopaciente;
		$query = DB::select('SELECT  nombreT FROM TRATAMIENTOS T INNER JOIN PACIENTES_TRATAMIENTOS PT ON T.ID = PT.ID_TRATAMIENTO INNER JOIN PACIENTES P ON PT.ID_PACIENTE = P.ID WHERE P.CODIGOP LIKE "%'.$codigoP .'%"');

		$select = '<option value="">Elija un tratamiento...</option>';
		foreach ($query as $tratamiento) {
			if($codigoP)
				$select .= '<option value="'.$tratamiento->nombreT.'">'.$tratamiento->nombreT.'</option>';
		}
		echo $select;
	}*/

	public function agregarTrabajo(){
		$id_disco = DB::table('discos')->select('id','fecha_alta')->where('codigoD', '=',request()->codigoDisco_trabajo)->get();


		DB::table('trabajos')->insert(
			['id_tratamiento' => request()->id_pt,'materialT' => request()->material_trabajo,'stl' => request()->stl_insertTrab,'tipo_trabajo' => request()->t_trabajo,'n_piezas' => request()->numeroPiezas,'color' => request()->color_trabajo,'id_disco' => $id_disco[0]->id,'maquina' => request()->maquina_trabajo,'notas' => request()->notas,'fecha_trabajo' => request()->fecha_alta_trabajo]
		);

		if($id_disco[0]->fecha_alta == NULL){
			DB::table('discos')->where('id', $id_disco[0]->id)
			->update(['fecha_alta' => date("Y") . "-" . date("m") . "-" . date("d")]);
		}
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
		ON PT.ID_PACIENTE = P.ID_P
		INNER JOIN TRATAMIENTOS TR
		ON PT.ID_TRATAMIENTO = TR.ID
		LEFT OUTER JOIN DISCOS D
		ON T.ID_DISCO = D.ID
		WHERE 1 = 1 AND t.fecha_baja IS NULL';
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

		$select = '<select class="custom-select mr-sm-2" id="materialTrabajoMod" name="materialTrabajoMod"><option></option>';
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

		$select = '<select class="custom-select mr-sm-2" id="tipoTrabajoMod" name="tipoTrabajoMod"><option></option>';
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
			'notas' => request()->notasT,
			'stl' => request()->stl
		]);
	}

	public function eliminarTrabajo(){
		DB::table('trabajos')->where('id', request()->id)
		->update(['fecha_baja' => date("Y") . "-" . date("m") . "-" . date("d")]);

		alert()->success('¡Éxito!', 'El trabajo se ha eliminado correctamente.');
	}
}
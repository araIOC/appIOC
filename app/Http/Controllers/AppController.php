<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
class AppController extends Controller{

	public function __construct(){
		$this->middleware('auth');
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

		$pacientes = DB::table('pacientes')->select()->get()
		->where('codigoP',request()->codigop);
		if (count($pacientes)<=0) {
			DB::table('pacientes')->insert(
				['nombreP' => request()->nombrep,'codigoP' => request()->codigop]
			);
		}/*else{
			DB::table('pacientes')->insert(
				['nombreP' => request()->nombrePacienteAgr,'codigoP' => request()->codPacienteAgr]
			);
				//return redirect()->route('consultar');
		}*/

	}
	public function registroTratamiento(){
		$nombre = request()->nombrep;
		$codigo = request()->codigop;

		$implantes = DB::table('implantes')->select()->get();
		$tratamientos = DB::table('tratamientos')->select()->get();
		$doctores = DB::table('doctores')->select()->get();
		$asesores = DB::table('asesores')->select()->get();
		return view('agregarTratamiento',['nombre'=>$nombre,'codigo'=>$codigo,'asesores'=>$asesores,'doctores'=>$doctores,'tratamientos'=>$tratamientos,'implantes'=>$implantes]);
	}

	public function agregarTratamiento(){
		$id_paciente = DB::table('paciente')
		->select('id')
		->where('codigoP', '=', request()->codigopaciente)
		->get();

		/*DB::table('pacientes_tratamientos')->insert(
			[
				'nombreP' => request()->nombrep,
				'codigoP' => request()->codigop,
			]);*/

		}

		public function buscadorPaciente(){
		/*$query = 'SELECT * FROM PACIENTES_TRATAMIENTOS as PT
		LEFT OUTER JOIN PACIENTES as P ON P.ID = PT.ID_PACIENTE
		LEFT OUTER JOIN tratamientos as t on t.id = pt.id_tratamiento
		LEFT OUTER JOIN doctores as d on d.id = pt.id_doctor
		LEFT OUTER JOIN asesores as a on a.id = pt.id_asesor
		where 1=1';
		$query2 = ' UNION
		SELECT * FROM PACIENTES_TRATAMIENTOS as PT
		RIGHT OUTER JOIN PACIENTES as P ON P.ID = PT.ID_PACIENTE
		RIGHT OUTER JOIN tratamientos as t on t.id = pt.id_tratamiento
		RIGHT OUTER JOIN doctores as d on d.id = pt.id_doctor
		RIGHT OUTER JOIN asesores as a on a.id = pt.id_asesor
		where 1 = 1';*/
		$query = 'SELECT *
		FROM PACIENTES AS P
		LEFT OUTER JOIN PACIENTES_TRATAMIENTOS AS PT
		ON P.ID = PT.ID_PACIENTE
		LEFT OUTER JOIN TRATAMIENTOS AS T
		ON PT.ID_TRATAMIENTO = T.ID
		LEFT OUTER JOIN DOCTORES AS D
		ON PT.ID_DOCTOR = D.ID
		LEFT OUTER JOIN ASESORES AS A
		ON PT.ID_ASESOR = A.ID
		where 1 = 1';


		if(request()->nombrePaciente){
			$query.=" AND p.nombreP LIKE '%".request()->nombrePaciente."%'";
		}

		if(request()->codigoPaciente){
			$query.=" AND p.codigoP LIKE '".request()->codigoPaciente."%'";
		}
		if(request()->nombreT != "Elija un tratamiento..."){
			$query.=" AND t.nombreT = '".request()->nombreT."'";
		}
		if(request()->tipo_implante != "Tipo de implante..."){
			$query.=" AND pt.tipo_implante = '".request()->tipo_implante."'";
		}
		if(request()->doctorPaciente != "Elija un doctor..."){
			$query.=" AND d.nombreD = '".request()->doctorPaciente."'";
		}
		if(request()->asesorPaciente != "Elija un asesor..."){
			$query.=" AND a.nombreA = '".request()->asesorPaciente."'";
		}
		if(request()->rbCirugia == "rbcdinamica"){
			$query.=" AND pt.c_guiada = 'Dinámica'";
		}
		if(request()->rbCirugia == "rbcestatica"){
			$query.=" AND pt.c_guiada = 'Estática'";
		}

		$estado = "";
		if (request()->invertir == 'false') {
			$estado = '1';
		}
		if (request()->invertir == "true") {
			$estado = '0';
		}
		if(request()->CBpic_definitivo == 'true'){
			$query.=" AND pt.pic_final = '".$estado."'";
		}
		if(request()->CBpic_provisional == 'true'){
			$query.=" AND pt.pic_provisional = '".$estado."'";
		}
		if(request()->cbTac_pre == 'true'){
			$query.=" AND pt.tac_pre = '".$estado."'";
		}
		if(request()->cbTac_post == 'true'){
			$query.=" AND pt.tac_post = '".$estado."'";
		}
		if(request()->cbIOScan_pre == 'true'){
			$query.=" AND pt.ioscan_pre = '".$estado."'";
		}
		if(request()->cbIOScan_post == 'true'){
			$query.=" AND pt.ioscan_post = '".$estado."'";
		}
		if(request()->cbOrto_pre == 'true'){
			$query.=" AND pt.orto_pre = '".$estado."'";
		}
		if(request()->cbOrto_post == 'true'){
			$query.=" AND pt.orto_post = '".$estado."'";
		}
		if(request()->cbFotos_pre == 'true'){
			$query.=" AND pt.fotos_pre = '".$estado."'";
		}
		if(request()->cbFotos_post == 'true'){
			$query.=" AND pt.foto_post = '".$estado."'";
		}
		if(request()->cbFotos_protesis_pre == 'true'){
			$query.=" AND pt.foto_protesis = '".$estado."'";
		}
		if(request()->cbFotos_protesis_post == 'true'){
			$query.=" AND pt.foto_protesis_final = '".$estado."'";
		}
		if(request()->cbFotos_protesis_boca_pre == 'true'){
			$query.=" AND pt.foto_protesis_boca_provisional = '".$estado."'";
		}
		if(request()->cbFotos_protesis_boca_post == 'true'){
			$query.=" AND pt.foto_protesis_boca_final = '".$estado."'";
		}
		if(request()->cbVideo_pre == 'true'){
			$query.=" AND pt.video_pre = '".$estado."'";
		}
		if(request()->cbVideo_post == 'true'){
			$query.=" AND pt.video_final = '".$estado."'";
		}
		$tipo_fecha = "";
		if(request()->rangoFecha == "f_inicio"){
			$tipo_fecha = "fecha_inicio";
		}
		if(request()->rangoFecha == "f_definitiva"){
			$tipo_fecha = "fecha_definitiva";
		}
		if(request()->rangoFecha && request()->fecha_definitiva && request()->Dfecha_inicial){
			$query.=" AND pt.".$tipo_fecha." BETWEEN '".request()->Dfecha_inicial."' AND '".request()->fecha_definitiva."'";

		}
		if(request()->rangoFecha && request()->fecha_definitiva && request()->Dfecha_inicial){
			$query.=" AND pt.".$tipo_fecha." BETWEEN '".request()->Dfecha_inicial."' AND '".request()->fecha_definitiva."'";
		}
		if(request()->rangoFecha && request()->fecha_definitiva){
			$query.=" AND pt.".$tipo_fecha." <= '".request()->fecha_definitiva."'";
		}
		if(request()->rangoFecha && request()->Dfecha_inicial){
			$query.=" AND pt.".$tipo_fecha." >= '".request()->Dfecha_inicial."'";
		}
		//var_dump($query.$query2);
		//$pacientes = DB::select($query.$query2);
		$pacientes = DB::select($query);
		return view('datosPaciente',['pacientes'=>$pacientes]);
	}

	public function downloadFilepptx(){
		var_dump(request()->codigopaciente);
		$pacientes = DB::table('pacientes')
		->where('codigoP', '=', request()->codigopaciente)
		->get();
			//var_dump( $pacientes);

		/*$pathtoFile = public_path().'images/'.$file;
		return response()->download($pathtoFile);*/
	}

	public function modificarDoctorPacientes(){
		$doctores = DB::table('doctores')->select()->get();
		$nombreDoctor =request()->nombreDoctor;

		$select = '<select class="custom-select mr-sm-2" id="doctorPacienteMod" name="doctorPacienteMod">';
		foreach ($doctores as $doctor) {
			if($doctor->nombreD == $nombreDoctor){
				$select .='<option value="'.$doctor->nombreD.'" selected>'.$doctor->nombreD.'</option>';
			}else{
				$select .='<option value="'.$doctor->nombreD.'">'.$doctor->nombreD.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
		//return view('modal-modificarPaciente',['doctores'=>$doctores,'nombreDoctor' => $nombreDoctor]);
	}

	public function modificarAsesorPacientes(){
		$asesores = DB::table('asesores')->select()->get();
		$nombreAsesorPaciente = request()->nombreAsesor;

		$select = '<select class="custom-select mr-sm-2" id="asesorPacienteMod" name="asesorPacienteMod">';
		foreach ($asesores as $asesor) {
			if($asesor->nombreA == $nombreAsesorPaciente){
				$select .='<option value="'.$asesor->nombreA.'" selected>'.$asesor->nombreA.'</option>';
			}else{
				$select .='<option value="'.$asesor->nombreA.'">'.$asesor->nombreA.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
	}

	public function modificarImplantePaciente(){
		$implantes = DB::table('implantes')->select()->get();
		$implantePaciente = request()->implante;

		$select = '<select class="custom-select mr-sm-2" id="implantePacienteMod" name="implantePacienteMod">';
		foreach ($implantes as $implante) {
			if($implante->tipo == $implantePaciente){
				$select .='<option value="'.$implante->tipo.'" selected>'.$implante->tipo.'</option>';
			}else{
				$select .='<option value="'.$implante->tipo.'">'.$implante->tipo.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
	}

	public function modificarTratamientoPaciente(){
		$id_doctor = DB::table('doctores')->select('id')->where('nombreD', '=',request()->nombreD)->get();
		$id_asesor = DB::table('asesores')->select('id')->where('nombreA', '=',request()->nombreA)->get();

		DB::table('pacientes_tratamientos')->where('id_pt', request()->id_pt)
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
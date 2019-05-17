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
		LEFT OUTER JOIN PACIENTES as P ON P.ID_P = PT.ID_PACIENTE
		UNION
		SELECT * FROM PACIENTES_TRATAMIENTOS as PT
		RIGHT OUTER JOIN PACIENTES as P ON P.ID_P = PT.ID_PACIENTE
		ORDER BY id_paciente';

		$pacientes = DB::select($query);
		return view('consultarPacientes',['asesores'=>$asesores,'doctores'=>$doctores,'tratamientos'=>$tratamientos,'implantes'=>$implantes,'pacientes'=>$pacientes]);
	}

	public function registroPacientes(){
		return view('agregarPaciente');
	}

	public function agregarPaciente(){
		DB::table('pacientes')->insert(
			['nombreP' => request()->nombrep,'codigoP' => request()->codigop]
		);
	}
	public function registroTratamiento(){
		$nombre = request()->nombrep;
		$codigo = explode(': ', request()->codigop);

		$codigo = $codigo[1];
		$implantes = DB::table('implantes')->select()->get();
		$tratamientos = DB::table('tratamientos')->select()->get();
		$doctores = DB::table('doctores')->select()->get();
		$asesores = DB::table('asesores')->select()->get();
		return view('agregarTratamiento',['nombre'=>$nombre,'codigo'=>$codigo,'asesores'=>$asesores,'doctores'=>$doctores,'tratamientos'=>$tratamientos,'implantes'=>$implantes]);
	}
	public function agregar(){
		return redirect('consultar');
	}
	public function agregarTratamiento(){
		$id_doctor = 0;
		if(request()->doctorPaciente != 0){
			$id_doctor = DB::table('doctores')->select('id')->where('nombreD', '=',request()->doctorPaciente)->get();
			$id_doctor = $id_doctor[0]->id;
		}

		$id_asesor = 0;
		if(request()->asesorPaciente != 0){
			$id_asesor = DB::table('asesores')->select('id')->where('nombreA', '=',request()->asesorPaciente)->get();
			$id_asesor = $id_asesor[0]->id;
		}

		$id_paciente = DB::table('pacientes')
		->select('id')
		->where('codigoP', '=', request()->codigopaciente)
		->get();

		$cirugia_guiada = NULL;
		if(request()->rbCirugia == "c_estatica_insertTrat"){
			$cirugia_guiada = "Estática";
		}
		if(request()->rbCirugia == "c_dinamica_insertTrat"){
			$cirugia_guiada = "Dinámica";
		}

		$id_tratamiento = DB::table('tratamientos')
		->select('id')
		->where('nombreT', '=', request()->nombreT)
		->get();

		DB::table('pacientes_tratamientos')->insert([
			'id_paciente' => $id_paciente[0]->id,
			'id_tratamiento' => $id_tratamiento[0]->id,
			'id_doctor' => ($id_doctor > 0) ? $id_doctor : NULL,
			'id_asesor' => ($id_asesor > 0) ? $id_asesor : NULL,
			'tipo_implante' => (request()->tipo_implante != "Tipo de implante...") ? request()->tipo_implante : NULL,
			'c_guiada' => $cirugia_guiada,
			'fecha_inicio' => request()->fecha_inicio,
			'fecha_definitiva' => request()->fecha_definitiva,
			'pic_provisional' => (request()->CBpic_provisional == "true") ? 1 : 0,
			'fecha_inicio' => date("Y") . "-" . date("m") . "-" . date("d"),
			'pic_final' => (request()->CBpic_definitivo == "true") ? 1 : 0,
			'fotos_pre' => (request()->cbFotos_pre == "true") ? 1 : 0,
			'foto_post' => (request()->cbFotos_post == "true") ? 1 : 0,
			'orto_pre' => (request()->cbOrto_pre == "true") ? 1 : 0,
			'orto_post' =>(request()->cbOrto_post == "true") ? 1 : 0,
			'tac_pre' => (request()->cbTac_pre == "true") ? 1 : 0,
			'tac_post' => (request()->cbTac_post == "true") ? 1 : 0,
			'video_pre' => (request()->cbVideo_pre == "true") ? 1 : 0,
			'video_final' => (request()->cbVideo_post == "true") ? 1 : 0,
			'ioscan_pre' => (request()->cbIOScan_pre == "true") ? 1 : 0,
			'ioscan_post' => (request()->cbIOScan_post == "true") ? 1 : 0,
			'foto_protesis' => (request()->cbFotos_protesis_pre == "true") ? 1 : 0,
			'foto_protesis_final' => (request()->cbFotos_protesis_post == "true") ? 1 : 0,
			'foto_protesis_boca_provisional' => (request()->cbFotos_protesis_boca_pre == "true") ? 1 : 0,
			'foto_protesis_boca_final' => (request()->cbFotos_protesis_boca_post == "true") ? 1 : 0,
			'link' => request()->linkD,
		]);

		DB::table('pacientes')->where('id', $id_paciente[0]->id)
		->update([
			'powerpoint' => request()->pptx,
			'pdf' => request()->pdf
		]);

		alert()->success('¡Éxito!', 'El tratamiento se a insertado correctamente.');
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
		ON P.ID_P = PT.ID_PACIENTE
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

	public function modificarDoctorPacientes(){
		$doctores = DB::table('doctores')->select()->get();
		$nombreDoctor =request()->nombreDoctor;

		$select = '<input type="hidden" id="dato_anterior-nombred" value="'.$nombreDoctor.'"><td colspan="2"><div class="input-group">
		<div class="input-group-prepend">
		<label class="btn btn-outline-secondary" for="inputGroupSelect01">DOCTOR</label>
		</div><select class="custom-select mr-sm-2" id="doctorPacienteMod" name="doctorPacienteMod"><option></option>';
		foreach ($doctores as $doctor) {
			if($doctor->nombreD == $nombreDoctor){
				$select .='<option value="'.$doctor->nombreD.'" selected>'.$doctor->nombreD.'</option>';
			}else{
				$select .='<option value="'.$doctor->nombreD.'">'.$doctor->nombreD.'</option>';
			}
		}

		$select .= '</select></div></td>';
		echo $select;
	}

	public function modificarAsesorPacientes(){
		$asesores = DB::table('asesores')->select()->get();
		$nombreAsesorPaciente = request()->nombreAsesor;

		$select = '<input type="hidden" id="dato_anterior-nombrea" value="'.$nombreAsesorPaciente.'"><td colspan="2"><div class="input-group">
		<div class="input-group-prepend">
		<label class="btn btn-outline-secondary" for="inputGroupSelect01">ASESOR</label>
		</div><select class="custom-select mr-sm-2" id="asesorPacienteMod" name="asesorPacienteMod"><option></option>';
		foreach ($asesores as $asesor) {
			if($asesor->nombreA == $nombreAsesorPaciente){
				$select .='<option value="'.$asesor->nombreA.'" selected>'.$asesor->nombreA.'</option>';
			}else{
				$select .='<option value="'.$asesor->nombreA.'">'.$asesor->nombreA.'</option>';
			}
		}
		$select .= '</select></div></td>';
		echo $select;
	}

	public function modificarImplantePaciente(){
		$implantes = DB::table('implantes')->select()->get();
		$implantePaciente = request()->implante;

		$select = '<input type="hidden" id="dato_anterior-tipo_implante" value="'.$implantePaciente.'"><td colspan="2"><div class="input-group">
		<div class="input-group-prepend">
		<label class="btn btn-outline-secondary" for="inputGroupSelect01">IMPLANTE</label>
		</div><select class="custom-select mr-sm-2" id="implantePacienteMod" name="implantePacienteMod"><option></option>';
		foreach ($implantes as $implante) {
			if($implante->tipo == $implantePaciente){
				$select .='<option value="'.$implante->tipo.'" selected>'.$implante->tipo.'</option>';
			}else{
				$select .='<option value="'.$implante->tipo.'">'.$implante->tipo.'</option>';
			}
		}
		$select .= '</select></div></td>';
		echo $select;
	}

	public function ponerModificarTratamientoPaciente(){
		$tratamientos = DB::table('tratamientos')->select()->get();

		$select = '<input type="hidden" id="hidden_tratamiento_actual" value="'.request()->tratamiento.'"><select class="custom-select mr-sm-2" id="tratamientoPacienteMod" name="tratamientoPacienteMod">';
		foreach ($tratamientos as $tratamiento) {
			if($tratamiento->nombreT == request()->tratamiento){
				$select .='<option value="'.$tratamiento->nombreT.'" selected>'.$tratamiento->nombreT.'</option>';
			}else{
				$select .='<option value="'.$tratamiento->nombreT.'">'.$tratamiento->nombreT.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
	}

	public function modificarTratamientoPaciente(){
		$id_doctor = 0;
		if(request()->nombreD){
			$id_doctor = DB::table('doctores')->select('id')->where('nombreD', '=',request()->nombreD)->get();
			$id_doctor = $id_doctor[0]->id;
		}

		$id_asesor = 0;
		if(request()->nombreA){
			$id_asesor = DB::table('asesores')->select('id')->where('nombreA', '=',request()->nombreA)->get();
			$id_asesor = $id_asesor[0]->id;
		}

		$codigo_paciente = explode(': ', request()->codigoP);
		$id_paciente = DB::table('pacientes')->select('id_p')->where('codigoP', '=',$codigo_paciente[1])->get();

		$id_tratamiento = 0;
		if(request()->nuevoTratamiento){
			$tratamiento = DB::table('tratamientos')->select('id')->where('nombreT',request()->nuevoTratamiento)->get();
			$id_tratamiento = $tratamiento[0]->id;
		}else{
			$tratamiento = DB::table('tratamientos')->select('id')->where('nombreT',request()->nombreT)->get();
			$id_tratamiento = $tratamiento[0]->id;
		}
		$c_guiada = NULL;
		if(request()->c_guiada == "rbcestatica-modificar"){
			$c_guiada = "Estática";
		}
		if(request()->c_guiada == "rbcdinamica-modificar"){
			$c_guiada = "Dinámica";
		}
		DB::table('pacientes_tratamientos')->where('id_pt', request()->id_pt)
		->update([
			'id_tratamiento' => $id_tratamiento,
			'id_doctor' => ($id_doctor != 0) ? $id_doctor : NULL,
			'id_asesor' => ($id_asesor != 0) ? $id_asesor : NULL,
			'tipo_implante' => request()->tipo_implante,
			'c_guiada' => $c_guiada,
			'fecha_inicio' => request()->fecha_inicio,
			'fecha_definitiva' => request()->fecha_definitiva,
			'pic_provisional' => (request()->pic_pre == "true") ? 1 : 0,
			'pic_final' => (request()->pic_post == "true") ? 1 : 0,
			'fotos_pre' => (request()->fotos_pre == "true") ? 1 : 0,
			'foto_post' => (request()->fotos_post == "true") ? 1 : 0,
			'orto_pre' => (request()->orto_pre == "true") ? 1 : 0,
			'orto_post' =>(request()->orto_post == "true") ? 1 : 0,
			'tac_pre' => (request()->tac_pre == "true") ? 1 : 0,
			'tac_post' => (request()->tac_post == "true") ? 1 : 0,
			'video_pre' => (request()->video_pre == "true") ? 1 : 0,
			'video_final' => (request()->video_post == "true") ? 1 : 0,
			'ioscan_pre' => (request()->ioscan_pre == "true") ? 1 : 0,
			'ioscan_post' => (request()->ioscan_post == "true") ? 1 : 0,
			'foto_protesis' => (request()->foto_protesis_pre == "true") ? 1 : 0,
			'foto_protesis_final' => (request()->foto_protesis_post == "true") ? 1 : 0,
			'foto_protesis_boca_provisional' => (request()->foto_protesis_boca_pre == "true") ? 1 : 0,
			'foto_protesis_boca_final' => (request()->foto_protesis_boca_post == "true") ? 1 : 0,
			'link' => request()->link
		]);

		$id_paciente = DB::table('pacientes_tratamientos')->select('id_paciente')->where('id_pt', request()->id_pt)->get();

		DB::table('pacientes')->where('id_p', $id_paciente[0]->id_paciente)
		->update([
			'powerpoint' => request()->powerpoint,
			'pdf' => request()->pdf
		]);

		return redirect()->route('consultar');
	}

	public function modificarPaciente(){
		DB::table('pacientes')->where('id_p', request()->id_p)
		->update([
			'nombreP' => request()->nombre,
			'codigoP' => request()->codigo
		]);
	}
}
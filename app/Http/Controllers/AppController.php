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
		$query1 = 'SELECT * FROM PACIENTES_TRATAMIENTOS as PT
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
		where 1 = 1';


		if(request()->nombrePaciente){
			$query1.=" AND p.nombreP LIKE '%".request()->nombrePaciente."%'";
			$query2.=" AND p.nombreP LIKE '%".request()->nombrePaciente."%'";
		}

		if(request()->codigoPaciente){
			$query1.=" AND p.codigoP LIKE '".request()->codigoPaciente."%'";
			$query2.=" AND p.codigoP LIKE '".request()->codigoPaciente."%'";
		}
		if(request()->nombreT != "Elija un tratamiento..."){
			$query1.=" AND t.nombreT = '".request()->nombreT."'";
			$query2.=" AND t.nombreT = '".request()->nombreT."'";
		}
		if(request()->tipo_implante != "Tipo de implante..."){
			$query1.=" AND pt.tipo_implante = '".request()->tipo_implante."'";
			$query2.=" AND pt.tipo_implante = '".request()->tipo_implante."'";
		}
		if(request()->doctorPaciente != "Elija un doctor..."){
			$query1.=" AND d.nombreD = '".request()->doctorPaciente."'";
			$query2.=" AND d.nombreD = '".request()->doctorPaciente."'";
		}
		if(request()->asesorPaciente != "Elija un asesor..."){
			$query1.=" AND a.nombreA = '".request()->asesorPaciente."'";
			$query2.=" AND a.nombreA = '".request()->asesorPaciente."'";
		}
		if(request()->rbCirugia == "rbcdinamica"){
			$query1.=" AND pt.c_guiada = 'Dinámica'";
			$query2.=" AND pt.c_guiada = 'Dinámica'";
		}
		if(request()->rbCirugia == "rbcestatica"){
			$query1.=" AND pt.c_guiada = 'Estática'";
			$query2.=" AND pt.c_guiada = 'Estática'";
		}

		$estado = "";
		if (request()->invertir == 'false') {
			$estado = '1';

		}
		if (request()->invertir == "true") {
			$estado = '0';
		}
		if(request()->CBpic_definitivo == 'true'){
			$query1.=" AND pt.pic_final = '".$estado."'";
			$query2.=" AND pt.pic_final = '".$estado."'";
		}
		if(request()->CBpic_provisional == 'true'){
			$query1.=" AND pt.pic_provisional = '".$estado."'";
			$query2.=" AND pt.pic_provisional = '".$estado."'";
		}
		if(request()->cbTac_pre == 'true'){
			$query1.=" AND pt.tac_pre = '".$estado."'";
			$query2.=" AND pt.tac_pre = '".$estado."'";
		}
		if(request()->cbTac_post == 'true'){
			$query1.=" AND pt.tac_post = '".$estado."'";
			$query2.=" AND pt.tac_post = '".$estado."'";
		}
		if(request()->cbIOScan_pre == 'true'){
			$query1.=" AND pt.ioscan_pre = '".$estado."'";
			$query2.=" AND pt.ioscan_pre = '".$estado."'";
		}
		if(request()->cbIOScan_post == 'true'){
			$query1.=" AND pt.ioscan_post = '".$estado."'";
			$query2.=" AND pt.ioscan_post = '".$estado."'";
		}
		if(request()->cbOrto_pre == 'true'){
			$query1.=" AND pt.orto_pre = '".$estado."'";
			$query2.=" AND pt.orto_pre = '".$estado."'";
		}
		if(request()->cbOrto_post == 'true'){
			$query1.=" AND pt.orto_post = '".$estado."'";
			$query2.=" AND pt.orto_post = '".$estado."'";
		}
		if(request()->cbFotos_pre == 'true'){
			$query1.=" AND pt.fotos_pre = '".$estado."'";
			$query2.=" AND pt.fotos_pre = '".$estado."'";
		}
		if(request()->cbFotos_post == 'true'){
			$query1.=" AND pt.foto_post = '".$estado."'";
			$query2.=" AND pt.foto_post = '".$estado."'";
		}
		if(request()->cbFotos_protesis_pre == 'true'){
			$query1.=" AND pt.foto_protesis = '".$estado."'";
			$query2.=" AND pt.foto_protesis = '".$estado."'";
		}
		if(request()->cbFotos_protesis_post == 'true'){
			$query1.=" AND pt.foto_protesis_final = '".$estado."'";
			$query2.=" AND pt.foto_protesis_final = '".$estado."'";
		}
		if(request()->cbFotos_protesis_boca_pre == 'true'){
			$query1.=" AND pt.foto_protesis_boca_provisional = '".$estado."'";
			$query2.=" AND pt.foto_protesis_boca_provisional = '".$estado."'";
		}
		if(request()->cbFotos_protesis_boca_post == 'true'){
			$query1.=" AND pt.foto_protesis_boca_final = '".$estado."'";
			$query2.=" AND pt.foto_protesis_boca_final = '".$estado."'";
		}
		if(request()->cbVideo_pre == 'true'){
			$query1.=" AND pt.video_pre = '".$estado."'";
			$query2.=" AND pt.video_pre = '".$estado."'";
		}
		if(request()->cbVideo_post == 'true'){
			$query1.=" AND pt.video_final = '".$estado."'";
			$query2.=" AND pt.video_final = '".$estado."'";
		}
		$tipo_fecha = "";
		if(request()->rangoFecha == "f_inicio"){
			$tipo_fecha = "fecha_inicio";
		}
		if(request()->rangoFecha == "f_definitiva"){
			$tipo_fecha = "fecha_definitiva";
		}
		if(request()->rangoFecha && request()->fecha_definitiva && request()->Dfecha_inicial){
			$query1.=" AND pt.".$tipo_fecha." BETWEEN '".request()->Dfecha_inicial."' AND '".request()->fecha_definitiva."'";
			$query2.=" AND pt.".$tipo_fecha." BETWEEN  '".request()->Dfecha_inicial."' AND '".request()->fecha_definitiva."'";

		}
		if(request()->rangoFecha && request()->fecha_definitiva && request()->Dfecha_inicial){
			$query1.=" AND pt.".$tipo_fecha." BETWEEN '".request()->Dfecha_inicial."' AND '".request()->fecha_definitiva."'";
			$query2.=" AND pt.".$tipo_fecha." BETWEEN  '".request()->Dfecha_inicial."' AND '".request()->fecha_definitiva."'";
		}
		if(request()->rangoFecha && request()->fecha_definitiva){
			$query1.=" AND pt.".$tipo_fecha." <= '".request()->fecha_definitiva."'";
			$query2.=" AND pt.".$tipo_fecha." <=  '".request()->fecha_definitiva."'";
		}
		if(request()->rangoFecha && request()->Dfecha_inicial){
			$query1.=" AND pt.".$tipo_fecha." >= '".request()->Dfecha_inicial."'";
			$query2.=" AND pt.".$tipo_fecha." >=  '".request()->Dfecha_inicial."'";
		}

		$pacientes = DB::select($query1.$query2);
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
		$select = '<select class="custom-select mr-sm-2" id="doctorPaciente" name="doctorPaciente">';
		foreach ($doctores as $doctor) {
			$select .='<option value="'.$doctor->nombreD.'" ('.$doctor->nombreD.' == '.request()->nombreDoctor.') ? "selected" : "">'.$doctor->nombreD.'</option>';
		}
		$select .= '</select>';
		echo $select;
	}
	public function modificarAsesorPacientes(){
		$asesores = DB::table('asesores')->select()->get();
		$nombreAsesorPaciente = request()->nombreAsesor;
		$select = '<select class="custom-select mr-sm-2" id="asesorPaciente" name="asesorPaciente">';
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
		$select = '<select class="custom-select mr-sm-2" id="asesorPaciente" name="asesorPaciente">';
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

}
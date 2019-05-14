<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Alert;
class DiscosController extends Controller{

	public function consultarDiscos(){
		$colores = DB::table('colores')->select()->get();
		$materiales = DB::table('material')->select()->get();
		$marcas = DB::table('marca')->select()->get();
		$discos = DB::table('discos')->select()->get();


		return view('consultarDiscos',['colores'=>$colores,'materiales'=>$materiales,'marcas'=>$marcas,'discos'=>$discos]);
	}

	public function registroDisco(){
		$materiales = DB::table('material')->select()->get();
		$colores = DB::table('colores')->select()->get();
		$discos = DB::table('discos')->select()->get();
		$marcas = DB::table('marca')->select()->get();

		return view('agregarDisco',['materiales'=>$materiales,'colores'=>$colores,'discos'=>$discos,'marcas'=>$marcas]);
	}
	public function agregarDisco(){
		$colores = DB::table('colores')->select()->get();
		$materiales = DB::table('material')->select()->get();
		$marcas = DB::table('marca')->select()->get();
		$discos = DB::table('discos')->select()->get();

		DB::table('discos')->insert(
			['codigoD' => request()->codigod,'material' => request()->material,'marca' => request()->marca,'escala' => (request()->escala) ? request()->escala : NULL,'color' => request()->color,'altura' => (request()->altura) ? request()->altura : NULL]
		);

		alert()->success('¡Éxito!', 'El disco se a insertado correctamente.');
	}
	public function buscadorDisco(){
		$material = request()->materialDisco;
		$marca = request()->marcaDisco;
		$color = request()->colorDisco;
		$fecha = request()->fecha_alta;
		$fecha2 = request()->fecha_alta2;

		$query ='SELECT * FROM discos where fecha_baja IS NULL ';
		if($material != "Material..."){
			$query = $query." AND material = '".$material."'";
		}
		if($marca != "Marca..."){
			$query = $query." AND marca = '".$marca."'";
		}
		if($color != "Color..."){
			$query = $query." AND color = '".$color."'";
		}
		if($fecha && $fecha2 == null){
			$query.=" AND fecha_alta >= '".$fecha."'";
		}
		if($fecha == NULL && $fecha2){
			$query.=" AND fecha_alta <= '".$fecha2."'";
		}
		if($fecha && $fecha2){
			$query.=" AND fecha_alta BETWEEN '".$fecha."' AND '".$fecha2."'";
		}

		$discos = DB::select($query);
		if (count($discos)>0) {
			return view('datosDiscos',['discos'=>$discos]);
		}else{
			echo "Sin resultados";
		}
	}

	public function darBajaDisco(){
		DB::table('discos')->where('codigoD', request()->codigod)
		->update(['fecha_baja' => date("Y") . "-" . date("m") . "-" . date("d")]);
	}

	public function modificarColorDisco(){
		$colores = DB::table('colores')->select()->get();
		$colorD = request()->colorD;

		$select = '<select class="custom-select mr-sm-2" id="colorDiscoMod" name="colorDiscoMod"><option></option>';
		foreach ($colores as $color){
			if($color->nombreC == $colorD){
				$select .='<option value="'.$color->nombreC.'" selected>'.$color->nombreC.'</option>';
			}else{
				$select .='<option value="'.$color->nombreC.'">'.$color->nombreC.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
	}

	public function modificarMaterialDisco(){
		$materiales = DB::table('material')->select()->get();
		$materialD = request()->materialD;

		$select = '<select class="custom-select mr-sm-2" id="materialDiscoMod" name="materialDiscoMod"><option></option>';
		foreach ($materiales as $material){
			if($material->nombreM == $materialD){
				$select .='<option value="'.$material->nombreM.'" selected>'.$material->nombreM.'</option>';
			}else{
				$select .='<option value="'.$material->nombreM.'">'.$material->nombreM.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
	}
	public function modificarMarcaDisco(){
		$marcas = DB::table('marca')->select()->get();
		$marcad = request()->marcad;

		$select = '<select class="custom-select mr-sm-2" id="marcaDiscoMod" name="marcaDiscoMod"><option></option>';
		foreach ($marcas as $marca){
			if($marca->marcaD == $marcad){
				$select .='<option value="'.$marca->marcaD.'" selected>'.$marca->marcaD.'</option>';
			}else{
				$select .='<option value="'.$marca->marcaD.'">'.$marca->marcaD.'</option>';
			}
		}
		$select .= '</select>';
		echo $select;
	}
	public function modificarDisco(){
		$codigoD = explode(': ', request()->codigod);

		DB::table('discos')->where('codigoD', $codigoD[1])
		->update([
			'material' => request()->materiald,
			'marca' => request()->marcad,
			'escala' => request()->escala,
			'color' => request()->colord,
			'fecha_alta' => request()->fecha_altad,
			'altura' => request()->altura
		]);
	}
}

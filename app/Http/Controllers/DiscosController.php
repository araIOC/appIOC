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
		$discos = DB::table('discos')->select()->get()
		->where('codigo',request()->codigo);

		if (count($discos)>0) {
			return view('agregarDisco');
		}else{
			DB::table('discos')->insert(
				['codigo' => request()->codigo,'material' => request()->material,'marca' => request()->marca,'escala' => request()->escala,'color' => request()->color,'altura' => request()->altura]
			);

			return redirect()->route('consultarDiscos');
		}
	}
	public function buscadorDisco(){
		$material = request()->materialDisco;
		$marca = request()->marcaDisco;
		$color = request()->colorDisco;

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

		$discos = DB::select($query);
		return view('datosDiscos',['discos'=>$discos]);

	}

	public function darBajaDisco(){
		DB::table('discos')->where('codigo', request()->codigod)
		->update(['fecha_baja' => date("Y") . "-" . date("m") . "-" . date("d")]);
	}
}

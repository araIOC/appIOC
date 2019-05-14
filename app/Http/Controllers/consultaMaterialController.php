<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class consultaMaterialController extends Controller{

	public function consultarMaterial(){
		$materiales = DB::table('material')->select()->get();
		$colores = DB::table('colores')->select()->get();
		return view ('consultaMaterial',['materiales'=>$materiales,'colores'=>$colores]);
	}

	public function calcularPiezas(){
		$piezas = DB::table('trabajos')->select('n_piezas')
		->where([
			['materialT', '=', request()->material],
			['color', '=', request()->color],
		])->whereBetween('fecha_trabajo', [request()->primera_fecha, request()->segunda_fecha])->get();

		echo $piezas;
	}
}
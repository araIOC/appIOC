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
		$materiales = DB::table('material')->select()->get();
		$arrayDientes1 = ['18','17','16','15','14','13','12','11','21','22','23','24','25','26','27','28'];
		$numero_piezas = 0;

		foreach ($materiales as $material) {
			$piezas = DB::table('trabajos')->select('n_piezas')
			->where([
				['materialT', '=', $material],
			])->whereBetween('fecha_trabajo', [request()->primera_fecha, request()->segunda_fecha])->get();

			/*foreach ($piezas as $pieza) {
				$n_piezas = explode(',',$piezas->n_piezas);
				foreach ($n_piezas as $n_pieza) {
					if ($n_pieza.contains("-")) {
						$puente = explode('-',$n_pieza);

						for ($i=0; $i < $arrayDientes1.count(); $i++) {
							if($arrayDientes1[$i] == $puente[$i]){
								$numero_piezas ++;
							}
						}
					}else{
						$numero_piezas ++;
					}
				}
			}
			return view ('pdfPiezas');*/
		}
	}

	public function generarPDF(){
		$piezas = DB::table('trabajos')->select('n_piezas')
		->whereBetween('fecha_trabajo', [request()->primera_fecha, request()->segunda_fecha])->get();

		$pdf = PDF::loadView('pdfPiezas',['piezas' => $piezas]);
		return $pdf -> download('consulta.pdf');
	}
}
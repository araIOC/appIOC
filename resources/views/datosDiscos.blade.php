@foreach ($discos as $disco)
<tr>
	<td class="td-datosdisco" data-toggle="modal" data-target=".modal-ficha-disco" data-codigod="{{$disco->codigo}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}"></td>
	<th scope="row" data-toggle="modal" data-target=".modal-ficha-disco" data-codigod="{{$disco->codigo}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}">{{$disco->codigo}}</th>
	<td class="td-datosdisco" data-toggle="modal" data-target=".modal-ficha-disco" data-codigod="{{$disco->codigo}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}">{{$disco->material}}</td>
	<td class="td-datosdisco" data-toggle="modal" data-target=".modal-ficha-disco" data-codigod="{{$disco->codigo}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}">{{$disco->marca}}</td>
	<td>
		<button data-toggle="tooltip" data-placement="auto" title="Dar de baja" class="btn btn-outline-warning mr-sm-2 mx-auto borrar" type="submit" name="{{$disco->codigo}}"><i class="fas fa-arrow-alt-circle-down"></i></button>

		<button data-toggle="tooltip" data-placement="auto" title="Modificar" class="btn btn-outline-warning mx-auto" type="submit"><i class="fas fa-sync-alt"></i></button>
	</td>
</tr>
@endforeach
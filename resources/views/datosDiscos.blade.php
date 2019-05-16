@foreach ($discos as $disco)
<tr>
	<td class="td-datosdisco" data-toggle="modal" data-target=".modal-ficha-disco" data-marcad="{{$disco->marca}}" data-codigod="{{$disco->codigoD}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}"></td>
	<th scope="row" td class="td-datosdisco" data-toggle="modal" data-target=".modal-ficha-disco" data-marcad="{{$disco->marca}}" data-codigod="{{$disco->codigoD}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}">{{$disco->codigoD}}</th>
	<td class="td-datosdisco" data-toggle="modal" data-target=".modal-ficha-disco" data-marcad="{{$disco->marca}}" data-codigod="{{$disco->codigoD}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}">{{$disco->material}}</td>
	<td class="td-datosdisco" data-toggle="modal" data-target=".modal-ficha-disco" data-marcad="{{$disco->marca}}" data-codigod="{{$disco->codigoD}}" data-materiald="{{$disco->material}}" data-escala="{{$disco->escala}}" data-color="{{$disco->color}}" data-fecha_alta="{{$disco->fecha_alta}}" data-altura="{{$disco->altura}}">{{$disco->marca}}</td>
	<td>
		<a data-codigod="{{$disco->codigoD}}" class="darBajaDisco"><button  data-toggle="tooltip" data-placement="auto" title="Dar de baja" class="btn btn-outline-warning mr-sm-2 mx-auto " type="submit" name="{{$disco->codigoD}}"><i class="fas fa-arrow-alt-circle-down"></i></button></a>
	</td>
</tr>
@endforeach
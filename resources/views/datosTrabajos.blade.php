@foreach ($trabajos as $trabajo)
<tr data-toggle="modal" data-target=".modal-ficha-trabajo" data-idtrabajo="{{$trabajo->id}}" data-nombrep="{{$trabajo->nombreP}}" data-nombret="{{$trabajo->nombreT}}" data-material="{{$trabajo->materialT}}" data-tipotrabajo="{{$trabajo->tipo_trabajo}}" data-npiezas="{{$trabajo->n_piezas}}" data-color="{{$trabajo->color}}" data-maquina="{{$trabajo->maquina}}" data-notas="{{$trabajo->notas}}" data-disco="{{$trabajo->codigoD}}" data-stl="{{$trabajo->stl}}" class="td-datostrabajo">
	<th>{{$trabajo->codigoP}}</th>
	<th>{{$trabajo->nombreP}}</th>
	<td>{{$trabajo->tipo_trabajo}}</td>
</tr>

@endforeach
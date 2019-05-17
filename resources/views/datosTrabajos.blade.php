@foreach ($trabajos as $trabajo)
<tr data-toggle="modal" data-target=".modal-ficha-trabajo" data-idtrabajo="{{$trabajo->id}}" data-nombrep="{{$trabajo->nombreP}}" data-nombret="{{$trabajo->nombreT}}" data-material="{{$trabajo->materialT}}" data-tipotrabajo="{{$trabajo->tipo_trabajo}}" data-npiezas="{{$trabajo->n_piezas}}" data-color="{{$trabajo->color}}" data-maquina="{{$trabajo->maquina}}" data-repetido="{{$trabajo->repetido}}" data-notas="{{$trabajo->notas}}" data-disco="{{$trabajo->codigoD}}" data-stl="{{$trabajo->stl}}" class="td-datostrabajo {{($trabajo->repetido == 1) ? "thead-light" : ''}}">
	<th>{{$trabajo->codigoP}}</th>
	<th>{{$trabajo->nombreP}}</th>
	<th>{{$trabajo->tipo_trabajo}}</th>
</tr>

@endforeach
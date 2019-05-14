@foreach ($trabajos as $trabajo)
<tr>
	<th scope="row" data-toggle="modal" data-target=".modal-ficha-trabajo" data-idtrabajo="{{$trabajo->id}}" data-nombrep="{{$trabajo->nombreP}}" data-nombret="{{$trabajo->nombreT}}" data-material="{{$trabajo->materialT}}" data-tipotrabajo="{{$trabajo->tipo_trabajo}}" data-npiezas="{{$trabajo->n_piezas}}" data-color="{{$trabajo->color}}" data-maquina="{{$trabajo->maquina}}" data-notas="{{$trabajo->notas}}" data-disco="{{$trabajo->codigoD}}" data-stl="{{$trabajo->stl}}" class="td-datostrabajo">{{$trabajo->codigoP}}</th>
	<th scope="row" data-toggle="modal" data-target=".modal-ficha-trabajo" data-idtrabajo="{{$trabajo->id}}" data-nombrep="{{$trabajo->nombreP}}" data-nombret="{{$trabajo->nombreT}}" data-material="{{$trabajo->materialT}}" data-tipotrabajo="{{$trabajo->tipo_trabajo}}" data-npiezas="{{$trabajo->n_piezas}}" data-color="{{$trabajo->color}}" data-maquina="{{$trabajo->maquina}}" data-notas="{{$trabajo->notas}}" data-disco="{{$trabajo->codigoD}}" data-stl="{{$trabajo->stl}}" class="td-datostrabajo">{{$trabajo->nombreP}}</th>
	<td data-toggle="modal" data-target=".modal-ficha-trabajo" data-idtrabajo="{{$trabajo->id}}" data-nombrep="{{$trabajo->nombreP}}" data-nombret="{{$trabajo->nombreT}}" data-material="{{$trabajo->materialT}}" data-tipotrabajo="{{$trabajo->tipo_trabajo}}" data-npiezas="{{$trabajo->n_piezas}}" data-color="{{$trabajo->color}}" data-maquina="{{$trabajo->maquina}}" data-notas="{{$trabajo->notas}}" data-disco="{{$trabajo->codigoD}}" data-stl="{{$trabajo->stl}}" class="td-datostrabajo">{{$trabajo->tipo_trabajo}}</td>
	<td>
		<button data-toggle="tooltip" data-placement="auto" title="Modificar" class="btn btn-outline-warning mx-auto" type="submit"><i class="fas fa-sync-alt"></i></button>
	</td>
</tr>

@endforeach
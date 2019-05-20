@foreach ($pacientes as $paciente)
<tr data-toggle="modal" data-target=".modal-ficha-cliente" data-codigop="{{$paciente->codigoP}}"data-idpt="{{$paciente->id_pt}}"   data-nombrep="{{$paciente->nombreP}}"  data-tipo_implante="{{$paciente->tipo_implante}}" data-c_guiada="{{$paciente->c_guiada}}" data-fecha_inicio="{{$paciente->fecha_inicio}}" data-fecha_definitiva="{{$paciente->fecha_definitiva}}"  data-pic_provisional="{{$paciente->pic_provisional}}"data-fotos_pre="{{$paciente->fotos_pre}}" data-orto_pre="{{$paciente->orto_pre}}" data-tac_pre="{{$paciente->tac_pre}}" data-ioscan_pre="{{$paciente->ioscan_pre}}" data-foto_protesis_boca_provisional="{{$paciente->foto_protesis_boca_provisional}}" data-foto_protesis="{{$paciente->foto_protesis}}" data-video_pre="{{$paciente->video_pre}}" data-pic_final="{{$paciente->pic_final}}" data-foto_post="{{$paciente->foto_post}}" data-orto_post="{{$paciente->orto_post}}" data-tac_post="{{$paciente->tac_post}}" data-ioscan_post="{{$paciente->ioscan_post}}" data-video_final="{{$paciente->video_final}}" data-foto_protesis_final="{{$paciente->foto_protesis_final}}" data-foto_protesis_boca_final="{{$paciente->foto_protesis_boca_final}}" data-link="{{$paciente->link}}" data-nombred="{{$paciente->nombreD}}" data-nombret="{{$paciente->nombreT}}"data-nombrea="{{$paciente->nombreA}}" data-trabajos="{{$paciente->TIPO_TRABAJO}}" data-idp="{{$paciente->id_p}}" data-powerpoint="{{$paciente->powerpoint}}" data-pdf="{{$paciente->pdf}}" class="td-datospaciente">
	<td></td>

	<th>{{$paciente->codigoP}}</th>

	<td>{{$paciente->nombreP}}</td>

	<td>{{$paciente->nombreT}}</td>
</tr>

@endforeach



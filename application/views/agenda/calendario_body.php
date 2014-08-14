<div class='calendario_body'>
	<table class='tb_calendario_body'>
		<tbody>
			<?php if(isset($agenda)){
				$horaAtual = '';
				foreach ($agenda as $item){
					if($horaAtual != $item->hora){
						$link = base_url('agenda/cadastrar/'.$this->agendaMod->getDatadmYUrl().'/'.$item->hora);
						$columnTitle = '<a href="'.$link.'">'.str_pad($item->hora, 2, "0", STR_PAD_LEFT).':00</a>';

						$horaAtual = $item->hora;
					}
					else{
						$columnTitle =  '&nbsp;';
					}
					
					if($item->agendaId != NULL){
						$columnDescript = '<a href="'.base_url('/agenda/editar/'.$item->agendaId).'"><div class="table_icone glyphicon glyphicon-time"></div><div class="columnLink">'.$item->nome.'</div></a>';
					}
					else{
						$columnDescript = '';
					}
					
					echo '<tr>';
						echo "<td class='column_title'>".$columnTitle."</td>";
						echo "<td class='column_descript'>".$columnDescript."</td>";
					echo '</tr>';
				}
			} ?>
		</tbody>
	</table>
</div>
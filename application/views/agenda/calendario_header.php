<div class='calendario_header'>
	<div class='periodo'>
		<div class='periodo_antes icone_data'>
			<a href="<?php echo base_url('agenda/visualizar/'.$this->agendaMod->getDatadmYUrl(-1));?>">
				<div class="glyphicon glyphicon-chevron-left"></div>
			</a>
		</div>
		<div class="dataAtual"><?php echo $this->agendaMod->getDataDiaSemana() . ', ' . $this->agendaMod->getDataMes() . ' ' . $this->agendaMod->getDataDia() . ', ' . $this->agendaMod->getDataAno();?></div>    
		<div class='periodo_depois icone_data'>
			<a href="<?php echo base_url('agenda/visualizar/'.$this->agendaMod->getDatadmYUrl(+1));?>">
				<div class="glyphicon glyphicon-chevron-right"></div>
			</a>
		</div>
	</div>
	<div class='bread'>
		<div class='bread_others'>MÊS</div>
		<div class='bread_separador'>&nbsp;</div>
		<div class='bread_others'>SEMANA</div>
		<div class='bread_separador'>&nbsp;</div>
		<div class='bread_dia'>DIA</div>		
	</div>
</div>
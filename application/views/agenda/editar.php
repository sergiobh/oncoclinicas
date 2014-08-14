<?php 
	$data = $agenda->data;
	$hora = str_pad($agenda->hora, 2, "0", STR_PAD_LEFT).':00';
?>
<div class='form_cadastrar'>
	<div class='title_cadastrar bg-primary'>AGENDAMENTO (<?php echo $data;?> às <?php echo $hora;?>)</div>
	<div class='formulario'>
		<form id='formulario_edicao'>
			<div class='form_title'>
				<div class='form_line'>Nome do Paciente: *</div>
				<div class='form_line'>Data de Nascimento: *</div>
				<div class='form_line'>Telefone: *</div>
				<div class='form_line'>Médico responsável: *</div>		
			</div>
			<div class='form_fields'>
				<input type="hidden" id='agendaId' name='agendaId' value='<?php echo $agenda->agendaId;?>' />
				<div class='input_nome form_line'>
					<input type="text" id='nome' name='nome' value='<?php echo $agenda->nome;?>' readonly="readonly" />
				</div>
				<div class='input_dtNasc form_line'>
					<input type="text" id='dtNasc' name='dtNasc' value='<?php echo $agenda->dtNasc;?>' readonly="readonly" />
				</div>
				<div class='input_tel form_line'>
					<input type="text" id='tel' name='tel' value='<?php echo $agenda->telefone;?>' />
				</div>
				<div class='input_medico form_line'>
					<input type="text" id='medico' name='medico' value='<?php echo $agenda->medico;?>' />
				</div>
			</div>
			<hr class='form_divisor' />
			<div class='form_buttons'>
				<button class="btn btn-sm btn btn-success btn-block button_confirm" id='confirm' name='confirm'>CONFIRMAR</button>
				<button type="reset" class="btn btn-sm btn btn-warning btn-block button_cancel" id='cancel' name='cancel'>CANCELAR</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	agenda_edicao.initialize( $("#formulario_edicao"), "<?php echo base_url();?>", "agenda/salvarEdicao", <?php echo $this->agendaMod->getDatadmYUrl();?> );

	agenda_edicao.formulario.submit(function () {	
		agenda_edicao.submit();
	});

	$('#cancel').click(function(){	
		agenda_edicao.reset();
	});
});
</script>
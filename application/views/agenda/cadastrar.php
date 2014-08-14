<?php 
	$data = $this->agendaMod->getDatadmYBr();
	$hora = str_pad($this->agendaMod->getHora(), 2, "0", STR_PAD_LEFT).':00';
?>
<div class='form_cadastrar'>
	<div class='title_cadastrar bg-primary'>NOVO AGENDAMENTO (<?php echo $data;?> às <?php echo $hora;?>)</div>
	<div class='formulario'>
		<form id='formulario_cadastrar'>
			<div class='form_title'>
				<div class='form_line'>Nome do Paciente: *</div>
				<div class='form_line'>Data de Nascimento: *</div>
				<div class='form_line'>Telefone: *</div>
				<div class='form_line'>Médico responsável: *</div>		
			</div>
			<div class='form_fields'>
				<input type="hidden" id='data' name='data' value='<?php echo $this->agendaMod->getDatadmYUrl();?>' />
				<input type="hidden" id='hora' name='hora' value='<?php echo $this->agendaMod->getHora();?>' />
				<div class='input_nome form_line'>
					<input type="text" id='nome' name='nome' />
				</div>
				<div class='input_dtNasc form_line'>
					<input type="text" id='dtNasc' name='dtNasc' />
				</div>
				<div class='input_tel form_line'>
					<input type="text" id='tel' name='tel' />
				</div>
				<div class='input_medico form_line'>
					<input type="text" id='medico' name='medico' />
				</div>
			</div>
			<hr class='form_divisor' />
			<div class='form_buttons'>
				<button class="btn btn-sm btn btn-success btn-block button_confirm" id='confirm' name='confirm'>CONFIRMAR</button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	agenda_cadastro.initialize( $("#formulario_cadastrar"), "<?php echo base_url();?>", "agenda/salvarCadastro" );

	agenda_cadastro.formulario.submit(function () {
		agenda_cadastro.submit();
	});
});
</script>
<?php header('Content-type: application/javascript');?>
<?php echo "/*";?><script><?php echo "*/\n";?>
var agenda_cadastro = ({
	formulario: '',
	base_url: '',
	url: '',
	validacao: '',
	validate: function(){
		agenda_cadastro.validacao = $(agenda_cadastro.formulario).validate({
			debug: true,
			rules: ( "add", {
				nome: {
					required: true,
					minlength: 3,
					maxlength: 100,
				},
				dtNasc: {
					required: true,
				},
				tel: {
					required: true,
				},
				medico: {
					required: true,
					minlength: 3,
					maxlength: 100,
				},
			}),
			messages: {
				nome: {
		            required: "Campo obrigatório",
		            minlength: "Digite pelo menos 3 caracteres",
		            maxlength: "Digite no máximo 100 caracteres",
				},
				dtNasc: {
		            required: "Campo obrigatório",
				},
				tel: {
		            required: "Campo obrigatório",
				},
				medico: {
		            required: "Campo obrigatório",
		            minlength: "Digite pelo menos 3 caracteres",
		            maxlength: "Digite no máximo 100 caracteres",
				},
			}
		});
	},
	submit: function(){
		if ( agenda_cadastro.validacao.form() ) {
	    	agenda_cadastro.salvarEdicao();
	    }

	    return false;
	},
	salvarEdicao: function(){
		// Declaração de variaveis
		var data 	= $("#data").val();
		var hora 	= $("#hora").val();
		var nome 	= $("#nome").val();
		var dtNasc 	= $("#dtNasc").val();
		var tel 	= $("#tel").val();
		var medico 	= $("#medico").val();

		// Executa o POST usando metodo AJAX e retorando Json
		var Url				= agenda_cadastro.base_url+agenda_cadastro.url;

		var data 			= 'data='+data+'&hora='+hora+'&nome='+nome+'&dtNasc='+dtNasc+'&tel='+tel+'&medico='+medico;

		$.blockUI({ message: '<h1>Salvando os dados...</h1>' });

		$.ajax({
			type: "POST",
			url: Url,
			data: data,
			dataType: 'json',
			success: function(retorno){
				if(retorno.success){
					$.blockUI({ message: '<h3>'+retorno.msg+'</h3>' });

					// Efetuar o redirecionamento
					setTimeout(
						function(){
							window.location = agenda_cadastro.base_url;
						},
						4000
					);
				}
				else{					
					$.blockUI({ message: '<h3>'+retorno.msg+'</h3>' });

					setTimeout(
							function(){
								$.unblockUI();
							},
							4000
						);
				}
			},
			error: function(){
				$('.retorno_ajax').html('Ocorreu um erro no servidor. Tentar novamente!');
				$.unblockUI();
			}
		});
	},
	initialize: function(formulario, base_url, url){
		agenda_cadastro.formulario = formulario;
		agenda_cadastro.base_url = base_url;
		agenda_cadastro.url = url;

		$('#tel').mask("(99)9999-9999");
		$("#dtNasc").datepicker({
		    dateFormat: 'dd/mm/yy',
		    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		    nextText: 'Próximo',
		    prevText: 'Anterior'
		});
		
		agenda_cadastro.validate();
	},
});


var agenda_edicao = ({
	formulario: '',
	base_url: '',
	url: '',
	dataAtual: '', 
	validacao: '',
	validate: function(){
		agenda_edicao.validacao = $(agenda_edicao.formulario).validate({
			debug: true,
			rules: ( "add", {
				nome: {
					required: true,
					minlength: 3,
					maxlength: 100,
				},
				dtNasc: {
					required: true,
				},
				tel: {
					required: true,
				},
				medico: {
					required: true,
					minlength: 3,
					maxlength: 100,
				},
			}),
			messages: {
				nome: {
		            required: "Campo obrigatório",
		            minlength: "Digite pelo menos 3 caracteres",
		            maxlength: "Digite no máximo 100 caracteres",
				},
				dtNasc: {
		            required: "Campo obrigatório",
				},
				tel: {
		            required: "Campo obrigatório",
				},
				medico: {
		            required: "Campo obrigatório",
		            minlength: "Digite pelo menos 3 caracteres",
		            maxlength: "Digite no máximo 100 caracteres",
				},
			}
		});
	},
	submit: function(){
		if ( agenda_edicao.validacao.form() ) {
	    	agenda_edicao.salvarEdicao();
	    }

	    return false;
	},
	salvarEdicao: function(){
		// Declaração de variaveis
		var agendaId = $("#agendaId").val();
		var tel 	= $("#tel").val();
		var medico 	= $("#medico").val();

		// Executa o POST usando metodo AJAX e retorando Json
		var Url				= agenda_edicao.base_url+agenda_edicao.url;

		var data 			= 'agendaId='+agendaId+'&tel='+tel+'&medico='+medico;

		$.blockUI({ message: '<h1>Salvando os dados...</h1>' });

		$.ajax({
			type: "POST",
			url: Url,
			data: data,
			dataType: 'json',
			success: function(retorno){
				if(retorno.success){
					$.blockUI({ message: '<h3>'+retorno.msg+'</h3>' });

					// Efetuar o redirecionamento
					setTimeout(
						function(){
							window.location = agenda_edicao.base_url+'agenda/visualizar/'+agenda_edicao.dataAtual;
						},
						4000
					);
				}
				else{					
					$.blockUI({ message: '<h3>'+retorno.msg+'</h3>' });

					setTimeout(
							function(){
								$.unblockUI();
							},
							4000
						);
				}
			},
			error: function(){
				$('.retorno_ajax').html('Ocorreu um erro no servidor. Tentar novamente!');
				$.unblockUI();
			}
		});
	},
	reset: function(){
		// Declaração de variaveis
		var agendaId = $("#agendaId").val();

		// Executa o POST usando metodo AJAX e retorando Json
		var Url				= agenda_edicao.base_url+'agenda/deletar';

		var data 			= 'agendaId='+agendaId;

		$.blockUI({ message: '<h1>Excluindo a agenda...</h1>' });

		$.ajax({
			type: "POST",
			url: Url,
			data: data,
			dataType: 'json',
			success: function(retorno){
				if(retorno.success){
					$.blockUI({ message: '<h3>Registro deletado com sucesso!!!</h3>' });

					// Efetuar o redirecionamento
					setTimeout(
						function(){
							window.location = agenda_edicao.base_url+'agenda/visualizar/'+agenda_edicao.dataAtual;
						},
						4000
					);
				}
				else{					
					$.blockUI({ message: '<h3>Erro ao deletar registro!</h3>' });

					setTimeout(
							function(){
								$.unblockUI();
							},
							4000
						);
				}
			},
			error: function(){
				$('.retorno_ajax').html('Ocorreu um erro no servidor. Tentar novamente!');
				$.unblockUI();
			}
		});
	},
	initialize: function(formulario, base_url, url, dataAtual){
		agenda_edicao.formulario = formulario;
		agenda_edicao.base_url = base_url;
		agenda_edicao.url = url;
		agenda_edicao.dataAtual = dataAtual;

		$('#tel').mask("(99)9999-9999");
		
		agenda_edicao.validate();
	},
});

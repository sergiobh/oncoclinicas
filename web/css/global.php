<?php header('Content-type: text/css');?>
<?php define('BASE_IMG', 'http://'.$_SERVER['HTTP_HOST'].'/oncoclinicas/web/img/');?>
<?php echo "/*";?><style><?php echo "*/\n";?>
html{
	background: none repeat scroll 0 0 #E1E1E5;
}
body{
    margin: 0;
}
h2{
	font-size: 26px !important;
}
.middle .header_page{
	left: 50%;	
	margin-top: 20px;
	margin-left: -120px;
	margin-bottom: 20px;
	position: relative;
	z-index: 100;
}
.middle .header_page .logo{
	background: url('<?php echo BASE_IMG;?>oncoclinicas.png') no-repeat;
	width: 239px;
	height: 75px;
	margin: 0;
}
.middle .container a{
	color: #333333;
	display: block;
}
.middle .container a:hover{
	background-color: #C0C0C0;
}
.middle .container a:hover,
.middle .container a:visited{
	color: #333333;
}
.middle .container .calendario .calendario_header{
	display: block;
	clear: both;
}
.middle .container .calendario .calendario_header .periodo{
	float: left;
	width: 40%;
}
.middle .container .calendario .calendario_header .bread{
	float: right;
	width: 60%;
}
.middle .container .calendario .calendario_header .periodo .periodo_antes{
	float: left;
	width: 17px;
}
.middle .container .calendario .calendario_header .dataAtual{
	float: left;
	font-size: 22px;
}
.middle .container .calendario .calendario_header .periodo .periodo_depois{
	float: left;
	width: 17px;
	margin-left: 2px;
}
.middle .container .calendario .calendario_header .periodo .icone_data{
	margin-top: 7px;
}
.middle .container .calendario .calendario_header .periodo .icone_data .glyphicon-chevron-left, 
.middle .container .calendario .calendario_header .periodo .icone_data .glyphicon-chevron-right{
	height: 22px;
	display: block;
}
.middle .container .calendario .calendario_header .bread_others,
.middle .container .calendario .calendario_header .bread_dia,
.middle .container .calendario .calendario_header .bread_separador{
	float: right;
	margin-right: 10px;
	height: 22px;
}
.middle .container .calendario .calendario_header .bread_dia{
	color: red;
}
.middle .container .calendario .calendario_header .bread_separador{
	width: 5px;
	border-right: 1px solid;
}
.middle .container .calendario .calendario_header .bread{

}

.middle .container .calendario table{
	width: 100%;
}
.middle .container .calendario th,
.middle .container .calendario td{
	padding: 4px;
}
.middle .container .calendario table,
.middle .container .calendario th,
.middle .container .calendario td{
	border:1px dotted gray;
	border-collapse:collapse
}
.middle .container .calendario .calendario_body{
	margin-top: 2px;
}
.middle .container .calendario .column_title{
	width: 15%;
}
.middle .container .calendario .tb_calendario_title .column_title,
.middle .container .calendario .tb_calendario_title .column_descript{
	text-align: center;
}
.middle .container .calendario .tb_calendario_body .column_title{
	text-align: right;
}
.middle .container .calendario .column_descript{
	width: 75%	
}
.middle .container .calendario .tb_calendario_body .table_icone{
	float: left;
	margin-left: 5px;
	width: 18px;
}
.middle .container .form_cadastrar{
	padding: 5px;
}
.middle .container .form_cadastrar .title_cadastrar{
	
}
.middle .container .form_cadastrar .formulario .form_title{
	float: left;
	width: 150px;
	margin-left: 5px;
}
.middle .container .form_cadastrar .formulario .form_fields{
	margin-left: 155px;
}
.middle .container .form_cadastrar .formulario .form_fields .input_nome input,
.middle .container .form_cadastrar .formulario .form_fields .input_medico input{
	width: 300px;
}
.middle .container .form_cadastrar .formulario .form_title{
	padding-top: 5px;
}
.middle .container .form_cadastrar .formulario .form_line{
	height: 35px;
}
.middle .container .form_cadastrar .formulario .form_line label.error{
	color: red;
	margin-left: 5px;
}
.middle .container .form_cadastrar .title_cadastrar{
	padding: 8px;
	margin-bottom: 10px;
}
.form_divisor{
	color: blue;
    background-color: blue;
	height: 1px;
}
#formulario_edicao .form_buttons .button_confirm{
	margin-top: 5px;
	float: left;
}
#formulario_edicao .form_buttons .button_cancel{
	margin-left: 10px;
	float: left;
}
.middle .footer{
	margin-top: 15px;
}
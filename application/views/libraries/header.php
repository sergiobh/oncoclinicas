<?php $this->load->helper('url');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "<?php echo isset($_SERVER['HTTPS']) ? 'https://' : 'http://';?>www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="pt-BR" xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<title><?php echo ((isset($Title_Page) && $Title_Page != '') ? $Title_Page : TITLE_PAGE);?></title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<meta http-equiv="content-language" content="pt-BR" />		
        <link rel="stylesheet" href="<?php echo base_url('/web/css/global.php');?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url('/web/css/bootstrap.css');?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url('/web/css/jquery-ui.min.css');?>" type="text/css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url('/web/js/jquery-1.11.0.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('/web/js/jquery.blockUI.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('/web/js/bootstrap.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('/web/js/jquery.validate.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('/web/js/jquery.maskedinput.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('/web/js/jquery-ui.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('/web/js/global.php');?>"></script>	
	</head>
	<body>
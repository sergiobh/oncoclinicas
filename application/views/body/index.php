<?php
	$LibHeader 			= 'libraries/header';
	$LibFooter 			= 'libraries/footer';

	$Header				= 'body/header';
	$Footer 			= 'body/footer';
?>
<?php $this->load->view($LibHeader);?>
	<div class='middle'>
		<?php $this->load->view($Header);?>
        <div class='container'>
            <?php $this->load->view($View);?>
		</div>
        <?php $this->load->view($Footer);?>
	</div>
<?php $this->load->view($LibFooter);?>
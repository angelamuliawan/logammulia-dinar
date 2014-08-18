<html>
	<head>
		<?php $this->load->view('theme/default/template/common/header');?>
	</head>
	<body>
    	<?php $this->load->view('theme/default/template/common/popup')?>
        <?php $this->load->view('theme/default/template/common/infobox')?>
		<div id="top_menu">
			<div id="fixed">
				<?php $this->load->view('theme/default/template/common/top_menu');?>
			</div>
		</div>
		<div id="outline">
			<img src="<?php echo base_url('asset/images/system')?>/logo.png">
			<?php $this->load->view('theme/default/template/common/nav');
			if($this->uri->segment(1) != ""){?>
			<div class="breadcrumbs_container">
			<?php echo $breadcrumbs; ?>
			</div>
			<div class="clear"></div>
			<?php }?>
			<?php echo $contents ?>
			<div id="links">
				<?php $this->load->view('theme/default/template/common/links');?>
			</div>
			<div id="footer">
				<?php $this->load->view('theme/default/template/common/footer');?>
			</div>
		</div>
	</body>
</html>
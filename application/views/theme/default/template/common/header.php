<title><?php echo $title ?></title>
<link href="<?php echo base_url('asset/stylesheet/default')?>/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('asset/plugin/nivo/themes/default')?>/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url('asset/plugin/nivo')?>/nivo-slider.css" type="text/css" media="screen" />
<meta name="description" content="<?php echo $meta_desc?>">
<link rel="icon" type="image/png" href="<?php echo $favicon?>" />
<link rel="stylesheet" href="<?php echo base_url('asset/jquery-ui-1.9.2.custom/development-bundle/themes/base/jquery.ui.datepicker.css');?>"/>
<link rel="stylesheet" href="<?php echo base_url('asset/jquery-ui-1.9.2.custom/development-bundle/themes/base/jquery.ui.theme.css');?>"/>"
<script src="<?php echo base_url('asset/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js')?>"></script>
<script src="<?php echo base_url('asset/jquery-ui-1.9.2.custom/development-bundle/ui/jquery.ui.core.js');?>"></script>
<script src="<?php echo base_url('asset/jquery-ui-1.9.2.custom/development-bundle/ui/jquery.ui.widget.js');?>"></script>
<script src="<?php echo base_url('asset/jquery-ui-1.9.2.custom/development-bundle/ui/jquery.ui.datepicker.js');?>"></script>
<script type="text/javascript">
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>
<!doctype html>
<html lang="en">

<head>
	<?php $this->load->view('theme/admintheme/template/common/header'); ?>
</head>
<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo base_url()?>adminpanel">Admin Panel</a></h1>
			<h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a target="_blank" href="<?php echo base_url()?>">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<?php $this->load->view('theme/admintheme/template/common/user_top'); ?>
		</div>
		<div class="breadcrumbs_container">
			<?php echo $breadcrumbs; ?>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<?php $this->load->view('theme/admintheme/template/common/sidebar'); ?>
		<footer>
			<?php $this->load->view('theme/admintheme/template/common/footer'); ?>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		<?php echo $contents ?>
	</section>


</body>

</html>
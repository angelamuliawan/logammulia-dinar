<div id="container">
<?php
	$id_page = $this->uri->segment(1);
	$id_page2 = $this->uri->segment(2);
	$id_page3 = $this->uri->segment(3);
?>
	<ul id="nav">
		<li <?php if($id_page == "") echo "id=\"selected\"";?>><a href="<?php echo base_url()?>">Home</a></li>
		<li  <?php if($id_page == "tutorial") echo "id=\"selected\"";?>><a href="<?php echo base_url('tutorial/')?>">Cara Transaksi</a></li>
		<li <?php if($id_page == "product" && $id_page2 == "view_all" || $id_page == "memberarea") echo "id=\"selected\"";?>><a href="<?php echo base_url('product/view_all')?>">Buy Gold</a></li>
		<li <?php if($id_page == "product" && $id_page2 == "sell") echo "id=\"selected\"";?>><a href="<?php echo base_url('product/sell')?>">Sell Gold</a></li>
		<li <?php if($id_page == "module" && $id_page2 == "intro_simpan_pinjam") echo "id=\"selected\"";?>><a href="<?php echo base_url('module/intro_simpan_pinjam')?>">Simpan</a></li>
		<li <?php if($id_page == "module" && $id_page2 == "intro_celengan_emas") echo "id=\"selected\"";?>><a href="<?php echo base_url('module/intro_celengan_emas/')?>">Celengan</a></li>
		<li <?php if($id_page == "module" && $id_page2 == "intro_gadai") echo "id=\"selected\"";?>><a href="<?php echo base_url('memberarea/history/gadai')?>">Gadai</a></li>
        <li <?php if($id_page == "news") echo "id=\"selected\"";?>><a href="<?php echo base_url('news/view_all')?>">News</a></li>
	</ul>

</div>

<script src="<?php echo base_url('asset/js/default/jquery.1.4.js')?>" type="text/javascript"></script>	

<script type="text/javascript" src="<?php echo base_url('asset/js/default/jquery.1.7.2.js')?>"></script>

<script type="text/javascript" src="<?php echo base_url('asset/js/default/spasticnav.js')?>"></script>	

<script type="text/javascript">
$('#nav').spasticNav();
</script>
<div class="clear"></div>
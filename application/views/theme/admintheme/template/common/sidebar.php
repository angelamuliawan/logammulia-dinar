<?php
if($this->session->userdata('login_admin')){
?>
<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Content</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="<?php echo base_url()?>adminpanel/article/new_article">New Article</a></li>
			<li class="icn_categories"><a href="<?php echo base_url()?>adminpanel/article/manage_article">Manage Articles</a></li>
			<li class="icn_video"><a href="<?php echo base_url()?>adminpanel/article/new_slideshow">Add Slideshow</a></li>
			<li class="icn_video"><a href="<?php echo base_url()?>adminpanel/article/manage_slideshow">Manage Slideshow</a></li>
			<li class="icn_categories"><a href="<?php echo base_url()?>adminpanel/article/manage_comment">Manage Comments</a></li>
		</ul>
		<h3>Users</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="<?php echo base_url()?>adminpanel/user/add_user">Add New User</a></li>
			<li class="icn_add_user"><a href="<?php echo base_url()?>adminpanel/user/add_backoffice">Add New Back Ofice</a></li>
			<li class="icn_add_user"><a href="<?php echo base_url()?>adminpanel/user/add_admin">Add New Admin</a></li>
			<li class="icn_view_users"><a href="<?php echo base_url()?>adminpanel/user/manage_user">Manage Users</a></li>
			<li class="icn_view_users"><a href="<?php echo base_url()?>adminpanel/user/manage_backoffice">Manage Back Office</a></li>
			<li class="icn_view_users"><a href="<?php echo base_url()?>adminpanel/user/manage_admin">Manage Admin</a></li>
			<li class="icn_profile"><a href="<?php echo base_url()?>adminpanel/user/view_profile/<?php echo $this->session->userdata('id_admin')?>">Your Profile</a></li>
		</ul>
		<h3>Product</h3>
		<ul class="toggle">
			<li class="icn_photo"><a href="<?php echo base_url()?>adminpanel/product/add_product">Add Product</a></li>
			<li class="icn_categories"><a href="<?php echo base_url()?>adminpanel/product/manage_product">Manage Product</a></li>
			<li class="icn_settings"><a href="<?php echo base_url()?>adminpanel/product/set_margin">Set Margin</a></li>
			<li class="icn_settings"><a href="<?php echo base_url()?>adminpanel/product/set_harga_beli">Set Harga Beli</a></li>
		</ul>
		<h3>Buy Transactions</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="<?php echo base_url('adminpanel/transaction/confirmation_transfer')?>">Konfirmasi Transfer Member</a></li>
			<li class="icn_categories"><a href="<?php echo base_url('adminpanel/transaction/confirmation_transfer_nonmember')?>">Konfirmasi Transfer Non Member</a></li>
			<li class="icn_categories"><a href="<?php echo base_url('adminpanel/transaction/member')?>">Transaksi Member</a></li>
			<li class="icn_categories"><a href="<?php echo base_url('adminpanel/transaction/nonmember')?>">Transaksi Non Member</a></li>
		</ul>
		<h3>Other Transaction</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="<?php echo base_url('adminpanel/transaction/sell')?>">Jual</a></li>
			<li class="icn_categories"><a href="<?php echo base_url('adminpanel/transaction/cicilan')?>">List Cicilan</a></li>
			<li class="icn_photo"><a href="<?php echo base_url('adminpanel/transaction/simpan')?>">Program Simpan</a></li>
			<li class="icn_photo"><a href="<?php echo base_url('adminpanel/transaction/celengan_emas')?>">Celengan Emas</a></li>
			<li class="icn_photo"><a href="<?php echo base_url('adminpanel/transaction/gadai')?>">Gadai</a></li>
			<li class="icn_consultation"><a href="<?php echo base_url('adminpanel/transaction/consultation')?>">Konsultasi</a></li>
		
		</ul>
		<?php
				if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
				?>
		<h3>Transactions' Confirmation (ADMIN)</h3>
		<ul class="toggle">
			<li class="icn_consultation"><a href="<?php echo base_url('adminpanel/transaction/confirmation_member')?>">Transaksi Member</a></li>
			<li class="icn_consultation"><a href="<?php echo base_url('adminpanel/transaction/confirmation_nonmember')?>">Transaksi Non Member</a></li>
		</ul>
				<?php
				}
			?>
		<h3>Setting</h3>
		<ul class="toggle">
			<?php
				if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
			?>
			<li class="icn_settings"><a href="<?php echo base_url('adminpanel/setting')?>">Configuration</a></li>
			<li class="icn_settings"><a href="<?php echo base_url('adminpanel/setting/bank')?>">Manage Bank</a></li>
			<li class="icn_settings"><a href="<?php echo base_url('adminpanel/setting/links')?>">Links</a></li>
			<?php
				}
			?>
			<li class="icn_jump_back"><a href="<?php echo base_url()?>adminpanel/setting/logout">Logout</a></li>
		</ul>
<?php
}
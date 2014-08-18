<div id="sidebar">
  <h2>Member Menu</h2>
<?php
if($loginstat == 1){
?>
	<b>Profile</b><br />
	<a title="View Your Profile" href="<?php echo base_url('memberarea/profile/')?>">View Profile</a><br />
	<a title="Edit Your Profile" href="<?php echo base_url('memberarea/profile/edit')?>">Edit Profile</a><br />
	<a title="Change Your Password" href="<?php echo base_url('memberarea/profile/password')?>">Change Password</a><br />
	<a title="Change Your Avatar" href="<?php echo base_url('memberarea/profile/avatar')?>">Change Avatar</a><br />
	<a title="Logout" href="<?php echo base_url('member/logout')?>">Logout</a><br /><br />
	<b>Transactions</b><br />
	<a title="View All Transactions History" href="<?php echo base_url('memberarea/history/view_all')?>">History Cash</a><br />
	<a title="History Cicilan" href="<?php echo base_url('memberarea/history/cicilan')?>">History Cicilan</a><br />
	<a title="History Celengan" href="<?php echo base_url('memberarea/history/celengan')?>">History Celengan</a><br />
	<a title="History Celengan" href="<?php echo base_url('memberarea/history/gadai')?>">History Gadai</a><br />
	<a title="History Program Simpan" href="<?php echo base_url('memberarea/history/simpan')?>">History Simpan</a><br />
	<a title="History Program Simpan" href="<?php echo base_url('memberarea/history/sell')?>">History Jual</a><br />
	<a title="History Celengan" href="<?php echo base_url('memberarea/history/celengan')?>">History Celengan</a><br />
	&nbsp;&nbsp;<a title="Recent Transaction" href="<?php echo base_url('memberarea/history/celengan_detail')?>">Recent Transaction</a><br />
	&nbsp;&nbsp;<a title="My Gold" href="<?php echo base_url('memberarea/history/celengan_emas')?>">My Gold</a><br />
	
	<b>Other Features</b><br />
	<a title="Konsultasi" href="<?php echo base_url('memberarea/consultation')?>">Konsultasi</a><br />
	<a title="Konfirmasi Pembayaran" href="<?php echo base_url('product/confirmation')?>">Konfirmasi Pembayaran</a>
	<a title="Simulasi Cicilan" href="<?php echo base_url()?>">Simulasi Cicilan</a><br />
<?php
}
else{
	?>
	<b>Profile</b><br />
	<a title="login to member area" href="#" onclick="document.getElementById('txtusername').focus();">Login</a><br />
	<a title="Register" href="<?php echo base_url('member/register')?>">Register</a><br /><br />
	<b>Transactions</b><br />
	<a title="Simulasi Cicilan" href="<?php echo base_url('product/simulation')?>">Simulasi Cicilan</a><br />
	<a title="Konfirmasi Pembayaran" href="<?php echo base_url('product/confirmation')?>">Konfirmasi Pembayaran</a>
<?php
}
?>
</div>
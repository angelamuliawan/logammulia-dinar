<script src="<?php echo base_url('asset/js/default/main.js')?>"></script>
<div id="regisbox">
<p align="right" style="padding-right:10px;"><a href="#" onClick="document.getElementById('regisbox_ready').id = 'regisbox'">Close</a></p>
<h2 style="margin-left:20px">Register</h2>
<div style="overflow:auto;">
<?php echo form_open('member/member/register')?>
<!--<form action="<?php echo base_url('member/member/register')?>" method="post">-->
<table style="margin-left:20px">
<tr>
  <td colspan="4"><div id="outputregis"><?php 
  if($reg['msg']!=""){
	  echo $reg['msg']; 
	  ?><script>
	  document.getElementById('outputregis').style.display='block';
	  document.getElementById('regisbox').id = 'regisbox_ready'</script><?php
	  }
	  ?></a></div></td>
  </tr>
<tr>
  <td colspan="2"><strong><em>Informasi Umum</em></strong></td>
  <td colspan="2"><strong><em>Informasi Rekening Bank <a title="Informasi rekening Bank diperlukan saat bertransaksi">[?]</a></em></strong></td>
</tr>
<tr>
<td>Nama Lengkap</td><td><input value="<?php echo $reg['data']['nama']?>" placeholder="Masukkan nama anda" class="txt" type="text" name="txtNama" maxlength="50"></td>
<td>Rekening atas nama</td>
<td><input value="<?php echo $reg['data']['nama_rek']?>" type="text" name="txtNamaRek" id="textfield" class="txt" placeholder="Nama pemilik rekening"/></td>
</tr>
<tr>
<td>Username</td><td><input onkeyup="checkUsername('<?php echo base_url('member/member/checkUsername')?>',this.value)" value="<?php echo $reg['data']['id']?>" placeholder="Masukkan username" class="txt" type="text" name="txtId" maxlength="50"></td>
<td>Nomor Rekening</td>
<td><input value="<?php echo $reg['data']['no_rek']?>" type="text" name="txtNoRek" id="textfield2" class="txt" placeholder="Nomor rekening bank"/></td>
</tr>
<tr>
<td>New Password</td><td><input placeholder="Masukkan password" class="txt" type="password" name="txtPass" maxlength="50"></td>
<td>No Handphone</td>
<td><input value="<?php echo $reg['data']['hp']?>" type="text" name="txtHP" id="textfield3" class="txt" placeholder="Masukkan no handphone"/></td>
</tr>
<tr>
<td>Email <a title="Email untuk aktivasi akun, lupa password, dan transaksi">[?]</a></td><td><input value="<?php echo $reg['data']['email']?>" placeholder="Masukkan email anda" class="txt" type="email" name="txtEmail" maxlength="50"></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Jenis Kelamin</td><td colspan="3">
<select name="jk" class="txt"><option value="1">Pria</option><option value="2">Wanita</option></select>
</td>
</tr>
<tr>
<td>Alamat</td><td colspan="3"><textarea placeholder="Masukkan alamat anda" class="txt" name="txtAdd" maxlength="50" style="font-family:Arial; width:100%;"><?php echo $reg['data']['add']?></textarea></td>
</tr>
<tr>
<td>Verifikasi <a title="Verifikasi untuk pencegahan spam/bot. Kode bersifat case-sensitive">[?]</a></td><td valign="middle" align="center"><?php echo $datacap['cap_img'];?></td><td width="100" colspan="2"><input class="txt" placeholder="Masukkan kode" type="text" name="txtCap" />
  <input type="submit" value="Register" /></td><td>&nbsp;</td>
</tr>
</table>
</form>
</div>
</div>


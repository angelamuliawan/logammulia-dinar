<?php if($loginstat==0){redirect(base_url());}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view('theme/default/template/common/print_header_element')?>
</head>

<body>
<?php $this->load->view('theme/default/template/common/print_topbanner')?>
<?php $this->load->view('theme/default/template/common/print_header')?>
<?php $data['member_menu'] = '1'?>
<?php $this->load->view('theme/default/template/common/print_member_menubar',$data)?>
<div id="body" style="overflow:auto;">
<a title="Click to close" class="linkclose" href="#" onclick="document.getElementById('error').style.display='none'"><div id="error">
<?php
if($error!="")
{
	?><script>document.getElementById('error').style.display='block';</script><?php
	if($error==1)
	{
		echo "Profil berhasil diupdate";
		?><script>
        document.getElementById('error').style.color='green';
        document.getElementById('error').style.backgroundColor='#6F6';
        document.getElementById('error').style.borderColor='green';</script><?php
	}else{
 		echo $error;
	}
}
?>
</div></a>
<form action="member/member/update" method="post" id="form1" name="form1">
  <table width="90%" >
    <tr>
      <td colspan="2"><strong>Informasi Pribadi</strong></td>
      <td width="4%" rowspan="11">&nbsp;</td>
      <td colspan="3"><strong>Informasi Account</strong></td>
    </tr>
    <tr>
      <td width="24%">Nama Lengkap</td>
      <td width="20%"><input type="text" name="txtNama" class="txt" placeholder="Masukkan nama" value="<?php echo $p->name?>"></td>
      <td width="21%">Username</td>
      <td width="31%" colspan="2"><input type="hidden" name="txtId" value="<?php echo $session['tgs_username_member'] ?>"><strong><?php echo $session['tgs_username_member'] ?></strong></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td><select name="jk" class="txt">
      <option value="1" <?php if($p->gender==1){echo "selected=''";}?>>Pria</option>
      <option value="2" <?php if($p->gender==2){echo "selected=''";}?>>Wanita</option>
      </select></td>
      <td>Password</td>
      <input type="hidden" name="txtPass" value="<?php echo $p->password?>" />
      <td><input type="password" name="txtOldPass" placeholder="Masukkan password lama" class="txt" /></td>
      <td><input type="password" name="txtNewPass" placeholder="Masukkan password baru" class="txt" /></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><textarea style="font-family:Arial" name="txtAdd" class="txt" placeholder="Masukkan alamat"><?php echo $p->address?></textarea></td>
      <td>&nbsp;</td>
      <td colspan="2"><em>*Kosongkan jika tidak ingin mengubah password</em></td>
    </tr>
    <tr>
      <td>Nomor Handphone</td>
      <td><input type="text" name="txtHP" class="txt" placeholder="Masukkan nomor HP" value="<?php echo $p->no_hp?>"></td>
      <td>&nbsp;</td>
      <td colspan="2"><input type="submit" value="Update Profile" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="email" name="txtEmail" class="txt" placeholder="Masukkan email" value="<?php echo $p->email?>"></td>
      <td colspan="3" rowspan="6">
      
      </td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td colspan="2"><strong>Informasi Akun Bank</strong></td>
      </tr>
    <tr>
      <td>Rekening atas nama</td>
      <td><input type="text" name="txtNamaRek" class="txt" placeholder="Masukkan rekening atas nama" value="<?php echo $p->atas_nama?>" /></td>
      </tr>
    <tr>
      <td>Nomor Rekening</td>
      <td><input type="text" name="txtNoRek" class="txt" placeholder="Masukkan nomor rekening" value="<?php echo $p->account_number?>" /></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
  </table>
 </form>
</div>
<?php $this->load->view('theme/default/template/common/print_footer')?>
<style>
#error
{
	background-color:#FCC; color:#F00; width:99%; display:none;
	border-color:#F00; border-style:solid; border-width:thin; border-radius:5px;	
}

</style>
</body>
</html>
<script type="text/javascript">
function getCaptcha(baseurl)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById('captcha').innerHTML = xmlhttp.responseText;
		}else{
			document.getElementById('captcha').innerHTML = "Loading captcha...";
		}
	}
	
	xmlhttp.open("GET",baseurl+"member/getCaptcha/"+Math.random(),true);
	xmlhttp.send();
}
function closeRegisBox()
{
	document.getElementById('regisbox').id = 'regisboxhidden';
}
function openRegisBox(baseurl)
{
	document.getElementById('regisboxhidden').id = 'regisbox';
}

</script>
<script type="text/javascript">
getCaptcha('<?php echo base_url();?>')
</script>

<div id="regisboxhidden">

<form method="post" action="<?php echo base_url('member/register')?>">
  <table width="100%" border="1">
    <tr>
      <td height="35"><h1>Registrasi</h1></td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td colspan="2" align="right" valign="middle"><a href="#" onClick="closeRegisBox()"><img width="40" height="40" src="<?php echo base_url('asset/images/icons/close256.png');?>"></a></td>
    </tr>
    <tr>
      <td height="35" colspan="6">
      <a onclick="document.getElementById('errordiv').style.display='none'" title="Click to close">
      <div id="errordiv">
      <?php if($msg['key']=='error_regis'){
		  echo $msg['msg'];
		  }?>
      </div>
      </a>
      </td>
      </tr>
    <tr>
      <td height="35" colspan="4"><strong><em>Informasi Umum</em></strong></td>
      <td colspan="2"><strong><em>Informasi Rekening Bank</em></strong></td>
    </tr>
    <tr>
      <td width="17%" height="26">Nama Lengkap</td>
      <td width="15%"><input type="text" name="txtNama" placeholder="Masukkan nama" value="<?php echo $regis['nama'];?>"></td>
      <td width="10%" style="vertical-align:middle;">Alamat</td>
      <td width="18%" align="center" valign="middle" style="vertical-align:middle;"><textarea placeholder="Masukkan alamat" name="txtAlamat" rows="1"><?php echo $regis['alamat'];?></textarea></td>
      <td width="23%">Nama Pemilik Rekening</td>
      <td width="17%"><input type="text" name="txtNamaRek" placeholder="Masukkan nama pemilik" value="<?php echo $regis['namarek']?>"></td>
    </tr>
    <tr>
      <td height="30">Email</td>
      <td><input type="email" name="txtEmail" placeholder="Masukkan email" value="<?php echo $regis['email'];?>"></td>
      <td>Gender</td>
      <td><label><input type="radio" name="txtGender" value="1">Pria</label>
      <label><input type="radio" name="txtGender" value="2">Wanita</label>
      </td>
      <td>No. Rekening</td>
      <td><input type="text" name="txtNoRek" placeholder="Masukkan no rekening" value="<?php echo $regis['norek'];?>"></td>
    </tr>
    <tr>
      <td height="29">Username</td>
      <td><input type="text" name="txtUsername" placeholder="Masukkan username" value="<?php echo $regis['username'];?>"></td>
      <td>No. Handphone</td>
      <td><input type="text" name="txtPhone" placeholder="Masukkan no.handphone" value="<?php echo $regis['phone'];?>"></td>
      <td colspan="2" align="center" valign="middle"><div id="captcha"></div></td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2" align="center" valign="middle"><a title="Ganti captcha lain" href="#" onclick="getCaptcha('<?php echo base_url()?>')">Reload captcha</a></td>
    </tr>
    <tr>
      <td height="36">New Password</td>
      <td><input type="password" name="txtNewPass" placeholder="Masukkan password baru"></td>
      <td colspan="2">&nbsp;</td>
      <td>Isi captcha berikut </td>
      <td><input type="text" name="txtCaptcha" placeholder="Masukkan kode captcha"></td>
    </tr>
    <tr>
      <td height="40">Confirm Password</td>
      <td><input type="password" name="txtConPass" placeholder="Masukkan ulang password"></td>
      <td colspan="2">&nbsp;</td>
      <td colspan="2" align="right"><input type="submit" value="Daftar"></td>
    </tr>
  </table>
  </form>
</div>
<?php
if($msg['key']=='error_regis')
{
?> <script type="text/javascript">openRegisBox('<?php echo base_url()?>');</script> <?php	
}
?>


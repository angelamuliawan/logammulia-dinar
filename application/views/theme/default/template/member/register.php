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
function checkUsername(baseurl, a)
{
	if(a.length > 0)
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
			var res = xmlhttp.responseText; var txt="";
			if(res==1)
			{
				txt="Username tersedia";
			}else{txt="Username tidak tersedia"}
			document.getElementById('usernameStat').innerHTML = txt;
		}else{
			document.getElementById('usernameStat').innerHTML = "Mengecek ketersediaan...";
		}
	}
	
	xmlhttp.open("GET",baseurl+"member/isAvailable/"+a,true);
	xmlhttp.send();	
	}
}
function closeDiv(id)
{
	document.getElementById(id).style.display='none';
}
getCaptcha('<?php echo base_url()?>');
</script>


<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Registrasi Member</h2>
            <p>Silahkan mengisi form berikut dengan lengkap dan benar</p>
            <a href="#" title="Click to close" onClick="closeDiv('infodiv')"><div id="infodiv"><?php if($msg['key']=='info_regis') echo $msg['msg'] ?></div></a>
            <a href="#" title="Click to close" onClick="closeDiv('errordiv')"><div id="errordiv"><?php if($msg['key']=='error_regis') echo $msg['msg'] ?></div></a>
            <form method="post" action="<?php echo base_url('member/register');?>">
            <table width="63%" border="1">
              <tr>
                <td colspan="3"><strong><em>Informasi Pribadi</em></strong></td>
              </tr>
              <tr>
                <td width="27%">Nama Lengkap</td>
                <td colspan="2"><input class="txt" type="text" name="txtNama" placeholder="Isi nama lengkap anda" value="<?php echo $regis['nama']?>"></td>
              </tr>
              <tr>
                <td>Email</td>
                <td colspan="2"><input class="txt" type="email" name="txtEmail" placeholder="Isi email anda" value="<?php echo $regis['email']?>"></td>
              </tr>
              <tr>
                <td>Username</td>
                <td colspan="2"><input class="txt" onKeyUp="checkUsername('<?php echo base_url()?>' ,this.value)" type="text" name="txtUsername" placeholder="Isi username anda" value="<?php echo $regis['username']?>"> <span id="usernameStat"></span></td>
              </tr>
              <tr>
                <td>Password baru</td>
                <td colspan="2"><input class="txt" type="password" name="txtNewPass" placeholder="Isi password baru anda" ></td>
              </tr>
              <tr>
                <td>Konfirmasi password</td>
                <td colspan="2"><input class="txt" type="password" name="txtConPass" placeholder="Isi konfirmasi password"></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td colspan="2"><textarea style="font-family:Arial; font-size:13px;" class="txt" name="txtAlamat" placeholder="Isi alamat anda" ><?php echo $regis['alamat']?></textarea></td>
              </tr>
              <tr>
                <td>Gender</td>
                <td colspan="2"><select class="txt" name="txtGender"><option value="" selected>- Pilih salah satu -</option><option value="1" >Pria</option><option value="2">Wanita</option></select></td>
              </tr>
              <tr>
                <td>No Handphone</td>
                <td colspan="2"><input class="txt" type="text" name="txtPhone" placeholder="Isi nomor handphone anda" value="<?php echo $regis['phone']?>"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3"><strong><em>Informasi Account Bank</em></strong></td>
              </tr>
              <tr>
                <td>Nama pemilik rekening</td>
                <td colspan="2"><input class="txt" type="text" name="txtNamaRek" placeholder="Isi nama pemilik rekening" value="<?php echo $regis['namarek']?>"></td>
              </tr>
              <tr>
                <td>Nomor rekening</td>
                <td colspan="2"><input class="txt" type="text" name="txtNoRek" placeholder="Isi nomor rekening anda" value="<?php echo $regis['norek']?>"></td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3"><strong><em>Konfirmasi</em></strong></td>
              </tr>
              <tr>
                <td colspan="3"><label>
                  <textarea class="txt" name="textarea" id="textarea" cols="80" rows="5" readonly style="height:auto; width:auto;">
  ATURAN DAN KONDISI-KONDISI MEMBERSHIP TAMARGOLD SHOP
  1. Saya menggunakan informasi yang sebenar-benarnya untuk pendaftaran
  2. Saya tidak menggunakan akun untuk hal yang tidak semestinya
  3. Saya tidak akan membobol sistem maupun akun user lainnya
  4. Saya bersedia menerima informasi dan promosi melalui akun ini
  5. Saya bersedia mengikuti semua aturan penggunaan akun untuk kedepannya
                  </textarea>
                </label></td>
              </tr>
              <tr>
                <td colspan="3"><label>
                  <input type="checkbox" name="txtAgree">
                  Saya paham dan menyetujui semua aturan dan kondisi penggunaan akun Tamar Gold Shop
                </label>
                diatas</td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3"><strong><em>Verifikasi</em></strong></td>
              </tr>
              <tr>
                <td>Isi kode captcha berikut</td>
                <td width="29%"><input class="txt" type="text" name="txtCaptcha" placeholder="Isi kode captcha disamping"></td>
                <td width="44%"><div id="captcha"></div> <a title="Click to reload captcha" onClick="getCaptcha('<?php echo base_url()?>')">Reload</a></td>
              </tr>
              <tr>
                <td colspan="3" align="center" valign="middle"><input type="submit" value="Register"></td>
              </tr>
              </table>
            </form>
            <p></p>
    </div>
  </div>
    <div class="clear"></div>
</div>

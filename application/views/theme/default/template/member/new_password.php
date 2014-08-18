<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>New Password</h2>
            <p>Isilah informasi berikut dengan lengkap</p>
            <a title="Click to close" href="#" onClick="document.getElementById('errordiv').style.display='none'"><div id="errordiv"><?php if($msg['key']=='error_newpass')echo $msg['msg'];?></div></a>
            <form method="post" action="<?php echo base_url('member/updatePass')?>">
            <table width="55%" border="1">
            <input type="hidden" value="<?php echo $username; ?>" name="txtUsername">
            <input type="hidden" value="<?php echo $key?>" name="txtKey">
              <tr>
                <td width="38%">Password baru</td>
                <td width="62%"><input class="txt" type="password" name="txtNewPass"></td>
              </tr>
              <tr>
                <td>Konfirmasi Password Baru</td>
                <td><input class="txt" type="password" name="txtConPass"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Change my password"></td>
              </tr>
            </table>
            </form>
            <p>&nbsp;</p>
    </div>
  </div>
    <div class="clear"></div>
</div>
<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Forgot Password</h2>
            <div id="infodiv"><?php if($msg['key']=='info_forgotpass')echo $msg['msg']; ?></div>
            <div id="errordiv"><?php if($msg['key']=='error_forgotpass')echo $msg['msg']; ?></div>
            <form method="post" action="<?php echo base_url('member/checkmail')?>">
            <table width="55%" border="1">
              <tr>
                <td width="30%">Email anda</td>
                <td width="70%"><input type="email" name="txtEmail" class="txt" placeholder="Masukkan email anda"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Kirim"></td>
              </tr>
            </table>
            </form>
            <p>&nbsp;</p>
    </div>
  </div>
    <div class="clear"></div>
</div>
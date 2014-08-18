<div id="content">
				<div id="content_left">
					<?php $this->load->view('theme/default/template/common/sidebar')?>
				</div>
				<div id="content_right">
					<div id="contain">
						<?php
						echo "<center>";
						if($image_user != "")
						echo "<img src=\"$image_user\" height=\"150px\" width=\"150px\">";
						else echo "<img src=\"".base_url('asset/images/theme/default/member.png')."\" height=\"150px\" width=\"150px\"";
				        echo "</center>";       
						?>
                        <div id="infodiv" title="Click to close"><?php if($msg['key']=='pass_info') echo $msg['msg'];?></div>
                        <div id="errordiv" title="Click to close"><?php if($msg['key']=='pass_error') echo $msg['msg'];?></div>
                        <form action="<?php echo base_url('memberarea/profile/update_password')?>" method="post">
					       <table>
                           		<input type="hidden" name="txtUsername" value="<?php echo $username?>" />
								<tr>
                                <th>Change password</th>
                                </tr>
                                <tr>
                                <td>Password saat ini</td><td><input type="password" name="txtOldPass"></td>
                                </tr>
                                <tr>
                                <td>Password baru</td><td><input type="password" name="txtNewPass"></td>
                                </tr>
                                <tr>
                                <td>Konfirmasi password baru</td><td><input type="password" name="txtConPass"></td>
                                </tr>
                                <tr>
                                <td></td><td><input type="submit" value="Change password"></td>
                                </tr>
					       </table>
                           </form>
					</div>
</div>
<div class="clear"></div>
<script>
if($('#errordiv').text() != "")
{
	$('#errordiv').hide();
	$('#errordiv').show("slow");
}
$('#infodiv').click(function(e) {
    $(this).hide("slow");
});
$('#errordiv').click(function(e) {
    $(this).hide("slow");
});
</script>
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
                        <div id="infodiv"><?php if($msg['key']=='avatar_info') echo $msg['msg'];?></div>
                        <div id="errordiv"><?php if($msg['key']=='avatar_error') echo $msg['msg'];?></div>
                        <form action="<?php echo base_url('memberarea/profile/update_avatar')?>" method="post" enctype="multipart/form-data">
					       <table>
                           <input type="hidden" name="txtUsername" value="<?php echo $username?>">
                           		<tr>
                                <th>Change Avatar</th>
                                </tr>
                                <tr>
                                <td>Browse picture</td><td><input type="file" name="userfile" accept="image/jpeg, image/png"></td>
                                </tr>
                                <tr>
                                <td></td><td><input type="submit" value="Upload and change avatar"></td>
                                </tr>
					       </table>
                           </form>
					</div>
</div>
<div class="clear"></div>
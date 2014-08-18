<?php if($loginstat==0){redirect(base_url());}?>
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
                        <div id="infodiv"><?php if($msg['key']=='update_info') echo $msg['msg'];?></div>
                       <div id="errordiv"><?php if($msg['key']=='update_error') echo $msg['msg'];?></div>
                        <form action="<?php echo base_url('memberarea/profile/update')?>" method="post">
					       <table>
								<tr>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
								</tr>
								<tr>
									<td width="30%">Username</td>
									<td><?php echo $username; ?><input type="hidden" name="txtUsername" value = "<?php echo $username?>"></td>
								</tr>
								<tr>
									<td width="30%">Name</td>
									<td><input name="txtName" type="name" value="<?php echo $name; ?>"></td>
								</tr>
								<tr>
									<td width="30%">Email</td>
									<td><input name="txtEmail" type="email" value="<?php echo $email; ?>"></td>
								</tr>
								<tr>
									<td width="30%" valign="middle">Address</td>
									<td><textarea rows="3" cols="40" name="txtAlamat"><?php echo $address; ?></textarea></td>
								</tr>
								<tr>
									<td width="30%">Nomor Rekening</td>
									<td><input type="text" name="txtNoRek" value="<?php echo $no_rek; ?>"></td>
								</tr>
								<tr>
									<td width="30%">Atas Nama</td>
									<td><input type="text" name="txtNamaRek" value="<?php echo $an; ?>"></td>
								</tr>
								<tr>
									<td width="30%">Nomor Handphone</td>
									<td><input type="text" name="txtPhone" value="<?php echo $no_hp; ?>"></td>
								</tr>
								<tr>
									<td width="30%">Date Join</td>
									<td><?php echo date("d M Y",strtotime($date_regis)); ?></td>
								</tr>
								<tr>
								  <td>&nbsp;</td>
								  <td><input type="submit" value="Update Profile"></td>
						     </tr>
					       </table>
                           </form>
					</div>
</div>
<div class="clear"></div>
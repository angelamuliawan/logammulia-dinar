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
					       <table>
								<tr>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
								</tr>
								<tr>
									<td width="30%">Username</td>
									<td><?php echo $username; ?></td>
								</tr>
								<tr>
									<td width="30%">Full Name</td>
									<td><?php echo $name; ?></td>
								</tr>
								<tr>
									<td width="30%">Email</td>
									<td><?php echo $email; ?></td>
								</tr>
								<tr>
									<td width="30%">Address</td>
									<td><?php echo $address; ?></td>
								</tr>
								<tr>
									<td width="30%">Nomor Rekening</td>
									<td><?php echo $no_rek; ?></td>
								</tr>
								<tr>
									<td width="30%">Atas Nama</td>
									<td><?php echo $an; ?></td>
								</tr>
								<tr>
									<td width="30%">Nomor Handphone</td>
									<td><?php echo $no_hp; ?></td>
								</tr>
								<tr>
									<td width="30%">Date Join</td>
									<td><?php echo date("d M Y",strtotime($date_regis)); ?></td>
								</tr>
					       </table>
					</div>
</div>
<div class="clear"></div>
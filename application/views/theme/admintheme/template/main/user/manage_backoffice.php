<article class="module width_full">
		<header><h3 class="tabs_involved">Manage Back Office</h3>
		</header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
					<th>Username</th> 
					<th>Email</th> 
					<th>Date Register</th> 
                                        <th>Last Login</th>
					<th>Actions</th>
				</tr> 
			</thead> 
			<tbody>
                            <?php
                            $no =0;
                            if($total_rows != 0){
                                foreach($results as $rows){
                                    $no++;
				    ?>
				<script type="text/javascript">
					<!--
						function queryAction<?php echo $no?>(){
						var confirmmessage = "Are you sure you want to continue?";
						var goifokay = "<?php echo base_url().'adminpanel/user/delete_backoffice/'.$rows->id_administrator;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
				</script>
				    <?php
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\"></td>";
                                echo "<td>".$rows->username."</td>";
                                echo "<td>".$rows->email."</td>";
                                 echo "<td>".date("D, d M Y",strtotime($rows->date_register))."</td>";
                                if($rows->date_login != 0)echo "<td>".date("d/M/Y h:i",strtotime($rows->date_login))."</td>";
                                else echo "<td>Never Login</td>";
				if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2 || $this->session->userdata('id_admin') == $rows->id_administrator)
				echo "<td><a href='".base_url()."adminpanel/user/edit_backoffice/".$rows->id_administrator."' title=\"edit this user\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='delete user' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                else echo "<td>-</td>";
				echo "</tr>";
                                }
                            }
                            else echo "<tr><td colspan='6'>no data was found</td></tr>";
                            ?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->	
		</div><!-- end of .tab_container -->
		<?php echo $links;?>
		</article>
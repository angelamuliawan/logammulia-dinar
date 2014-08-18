<article class="module width_full">
		<header><h3 class="tabs_involved">Manage User</h3>
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
                                        <th>Account Number</th>
					<th>Status</th>
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
						var goifokay = "<?php echo base_url().'adminpanel/user/delete_user/'.$rows->id_user;?>";
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
                                echo "<td>".$rows->account_number."</td>";
				if($rows->status_user == 1) echo "<td>Active</td>";
				else echo "<td>Nonctive</td>";
                                echo "<td><a href='".base_url()."adminpanel/user/edit_user/".$rows->id_user."' title=\"edit this user\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='delete user' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
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
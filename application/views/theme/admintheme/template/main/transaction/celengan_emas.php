<article class="module width_full">
    <header><h3>Celengan Emas</h3></header>
		<div class="tab_container">
				<table class="tablesorter" cellspacing="0"> 
				<thead> 
					<tr> 
						<th></th> 
						<th>Nama Pemilik</th>
						<th>Username</th> 
						<th>Total Balance</th> 
						<th>Tanggal Pembuatan</th>
						<th>Status</th>
						<th>Actions</th>
					</tr> 
				</thead> 
				<tbody>
					<?php
                    $no =0;
					if($results != 0){
					foreach($results as $rows){
					?>
					<script type="text/javascript">
					<!--
						function queryAction<?php echo $no?>(){
						var confirmmessage = "Are you sure you want to continue?";
						var goifokay = "<?php echo base_url().'adminpanel/transaction/delete_celengan/'.$rows->id_celengan;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
					</script>
				    <?php
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\"></td>";
								echo "<td>".$rows->name."</td>";
                                echo "<td>".$rows->username."</td>";
								echo "<td>".number_format($rows->total_balance)."</td>";
                                echo "<td>".date("D, d M Y",strtotime($rows->date_celengan))."</td>";
                                
								if($rows->status_celengan == 2)
									echo "<td><font color=\"#ff0000\">Non Aktif</font></td>";
								else if($rows->status_celengan == 1)
									echo "<td><font color=\"#008000\"><b>Aktif</b></font></td>";
                                echo "<td><a title=\"View celengan\" href='".base_url('adminpanel/transaction/view_celengan/'.$rows->id_celengan)."'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_categories.png'></a><a href='".base_url()."adminpanel/transaction/edit_status_celengan/".$rows->id_celengan."' title=\"Change Transaction's Status\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='Move to Archive' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                echo "</tr>";
								}
                        }
					  else echo "<tr><td colspan='9'>no data was found</td></tr>";
							?>
				</tbody> 
				</table>
		</div>
</article>
<article class="module width_full">
    <header><h3>Konfirmasi Transfer Member</h3></header>
		<div class="tab_container">
				<table class="tablesorter" cellspacing="0"> 
				<thead> 
					<tr> 
						<th width="1%"></th> 
						<th>Code Order</th> 
						<th>Transfer ke Bank</th>
						<th>Date Konfirmasi</th>
						<th>Action</th>
					</tr> 
				</thead> 
				<tbody>
<?php
                    $no =1;
					if($results != 0){
					foreach($results as $rows){
					?>
					<script type="text/javascript">
					<!--
						function queryAction<?php echo $no?>(){
						var confirmmessage = "Are you sure you want to continue?";
						var goifokay = "<?php echo base_url().'adminpanel/transaction/delete_confirmation/'.$rows->id_konfirmasi;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
					</script>
					<?php
                                echo "<tr class=\"even\">";
								echo "<td><input type=\"checkbox\"></td>";
								 echo "<td>".$rows->code_order."</td>";
								 echo "<td>".$rows->nama_bank."</td>";
                                echo "<td>".date("D, d M Y h:i",strtotime($rows->date_konfirmasi))."</td>";
								if($rows->cicilan == 1){
								echo "<td>
								<a href='".base_url()."adminpanel/transaction/edit_status_member/".$rows->id_order."' title=\"Change Transaction's Status\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a>
								<a title='Move to Archive' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
								}
								else echo "<td>-</td>";
                                echo "</tr>";
								$no++;
								}
                        }
					  else echo "<tr><td colspan='4'>no data was found</td></tr>";
			?>
				</tbody> 
				</table>
				<?php echo $links; ?>
		</div>
</article>
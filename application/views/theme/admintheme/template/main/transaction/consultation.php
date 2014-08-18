<article class="module width_full">
    <header><h3>Lihat Detail Cicilan</h3></header>
		<div class="tab_container">
				<table class="tablesorter" cellspacing="0"> 
				<thead> 
					<tr> 
						<th width="1%"></th> 
						<th width="3%">No.</th>
						<th>Subject</th> 
						<th>Date</th>
						<th>Sender</th> 
						<th>Status</th>
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
						var goifokay = "<?php echo base_url().'adminpanel/transaction/delete_consultation/'.$rows->id_konsultasi;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
					</script>
					<?php
                                echo "<tr class=\"even\">";
								echo "<td><input type=\"checkbox\"></td>";
                                echo "<td>".$no."</td>";
                                echo "<td><b><a title=\"Read and Reply Consultation\" href=\"".base_url('adminpanel/transaction/reply_consultation/'.$rows->id_konsultasi)."\">".$rows->subject."</a></b></td>";
                                echo "<td>".date("D, d M Y",strtotime($rows->date_konsultasi))."</td>";
                                echo "<td>".$rows->name."</td>";
								if($rows->status_konsultasi == 1)
									echo "<td><font color=\"#ff0000\">Unread</font></td>";
								else if($rows->status_konsultasi == 2)
									echo "<td><font color=\"#008000\"><b>Read</b></font></td>";
								else if($rows->status_konsultasi == 3)
									echo "<td><font color=\"#008000\"><b>Replied</b></font></td>";
								echo "<td><a title='Move to Archive' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                echo "</tr>";
								$no++;
								}
                        }
					  else echo "<tr><td colspan='6'>no data was found</td></tr>";
			?>
				</tbody> 
				</table>
				<?php echo $links; ?>
		</div>
</article>
<?php
					echo "<center>".$links."</center>";
				?>
<article class="module width_full">
    <header><h3>Celengan Emas</h3></header>
		<div class="tab_container">
				<table class="tablesorter" cellspacing="0"> 
				<thead> 
					<tr> 
						<th></th> 
						<th>Balance</th> 
						<th>Tanggal Top Up</th>
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
						var goifokay = "<?php echo base_url().'adminpanel/transaction/delete_celengan_detail/'.$rows->id_celengan_detail;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
					</script>
				    <?php
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\"></td>";
								echo "<td>".number_format($rows->balance)."</td>";
                                echo "<td>".date("D, d M Y",strtotime($rows->date_celengan_detail))."</td>";
                                
								if($rows->status_celengan_detail == 0)
									echo "<td><font color=\"#ff0000\">Belum Transfer</font></td>";
								else if($rows->status_celengan_detail == 1)
									echo "<td><font color=\"#008000\"><b>Sudah Transfer</b></font></td>";
								else if($rows->status_celengan_detail == 2)
									echo "<td><a href='".base_url('adminpanel/transaction/celengan_detail/'.$rows->id_celengan_detail)."' title='Lihat Detail'><b>Terpakai</b></a></td>";
								else if($rows->status_celengan_detail == 3)
									echo "<td><font color=\"#ff0000\"><b>Dicairkan (Not Yet Transfer)</b></font></td>";
								else if($rows->status_celengan_detail == 4)
									echo "<td><font color=\"#ff0000\"><b>Dicairkan (Transfered)</b></font></td>";
								else if($rows->status_celengan_detail == 5)
									echo "<td><font color=\"#ff0000\"><b>Batal Transfer</b></font></td>";
								else if($rows->status_celengan_detail == 7){
									echo "<td><a href='".base_url('adminpanel/transaction/celengan_detail/'.$rows->id_celengan_detail)."' title='Lihat Detail'><b>Convert dari Gold ke Rupiah</b></a></td>";
								}
								if($rows->status_celengan_detail != 2 && $rows->status_celengan_detail != 7)
                                echo "<td><a href='".base_url()."adminpanel/transaction/edit_celengan_detail/".$rows->id_celengan_detail."' title=\"Change Transaction's Status\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='Move to Archive' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                else
								echo "<td>No Action</td>";
								echo "</tr>";
								}
                        }
					  else echo "<tr><td colspan='9'>no data was found</td></tr>";
							?>
				</tbody> 
				</table>
		</div>
</article>
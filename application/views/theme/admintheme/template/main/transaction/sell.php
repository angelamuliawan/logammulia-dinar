<article class="module width_full">
    <header><h3>Transaction Member (Cash)</h3></header>
		<div class="tab_container">
				<table class="tablesorter" cellspacing="0"> 
				<thead> 
					<tr> 
						<th></th> 
						<th>Nama Penjual</th> 
						<th>Produk</th> 
						<th>Harga Jual</th>
						<th>Qty</th>
						<th>Total Harga</th>
						<th>Tanggal Jual</th>
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
						var goifokay = "<?php echo base_url().'adminpanel/transaction/delete_sell/'.$rows->id_jual;?>";
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
                                echo "<td>".$rows->name_product."</td>";
                                echo "<td>Rp ".number_format($rows->harga_pas_jual)."</td>";
                                echo "<td>".$rows->qty."</td>";
								echo "<td>".number_format($rows->harga_pas_jual*$rows->qty)."</td>";
                                echo "<td>".date("D, d M Y",strtotime($rows->date_jual))."</td>";
                                if($rows->status_jual == 1)
								echo "<td><font color=\"#ff0000\">Ajukkan Jual</font></td>";
								else if($rows->status_jual == 2)
								echo "<td><font color=\"#008000\"><b>Terjual</b></font></td>";
								else if($rows->status_jual == 3)
								echo "<td><font color=\"#ff0000\"><b>Batal</b></font></td>";
                                echo "<td><a href='".base_url()."adminpanel/transaction/edit_status_jual/".$rows->id_jual."' title=\"Change Transaction's Status\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a>";
									if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){
										echo "<a title='Move to Archive' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a>";	
									}
									echo "</td>";
                                echo "</tr>";
								}
                        }
					  else echo "<tr><td colspan='9'>no data was found</td></tr>";
							?>
				</tbody> 
				</table>
                <div style="margin:5px 0 5px 10px;">
					<a href="<?php echo base_url('adminpanel/report/sell')?>"><input type="submit" value="Print Report" class="alt_btn"></a>
				</div>
		</div>
</article>
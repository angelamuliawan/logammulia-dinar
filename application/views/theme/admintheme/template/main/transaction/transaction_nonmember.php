<article class="module width_full">
    <header><h3>Transaction Non Member</h3></header>
		<div class="tab_container">
				<table class="tablesorter" cellspacing="0"> 
				<thead> 
					<tr> 
						<th></th> 
						<th>Code</th>
						<th>Nama Pembeli</th> 
						<th>Produk</th> 
						<th>Harga Beli</th>
						<th>Qty</th>
						<th>Total Harga</th>
						<th>Tanggal Beli</th>
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
						var goifokay = "<?php echo base_url().'adminpanel/transaction/delete_transaction_nonmember/'.$rows->id_order_nonmember;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
					</script>
				    <?php
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\"></td>";
								echo "<td>".$rows->code_order."</td>";
								echo "<td>".$rows->name."</td>";
                                echo "<td>".$rows->name_product."</td>";
                                echo "<td>Rp ".number_format($rows->harga_pas_beli)."</td>";
                                echo "<td>".$rows->qty."</td>";
								echo "<td>".number_format($rows->total_price)."</td>";
                                echo "<td>".date("D, d M Y",strtotime($rows->date_order))."</td>";
                                if($rows->status_order == 1)
								echo "<td><font color=\"#ff0000\">Unpaid</font></td>";
								else if($rows->status_order == 2)
								echo "<td><font color=\"#008000\"><b>Paid</b></font></td>";
								else if($rows->status_order == 3)
								echo "<td><font color=\"#4088ff\">Paid (Confirmed)</font></td>";
								else if($rows->status_order == 4)
								echo "<td>Dikirim</td>";
								else if($rows->status_order == 5)
								echo "<td><font color=\"#f8bb00\">Cancel</font></td>";
                                echo "<td><a href='".base_url()."adminpanel/transaction/edit_status_nonmember/".$rows->id_order_nonmember."' title=\"Change Transaction's Status\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a>";
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
				<a href="<?php echo base_url('adminpanel/report/order_nonmember')?>"><input type="submit" value="Print Report" class="alt_btn"></a>
				</div>
		</div>
</article>
<center><?php echo $links; ?></center>
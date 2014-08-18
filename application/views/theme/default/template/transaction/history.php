<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Transaction's History (Cash)</h2>
            <table>
					<tr> 
						<th>No.</th>
						<th>Order Code</th>
						<th>Produk</th> 
						<th>Harga</th>
						<th>Qty</th>
						<th>Total Harga</th>
						<th>Tanggal Beli</th>
						<th>Status</th>
						<th>Confirm</th>
					</tr> 
           <?php
                    $no =1;
					if($results != 0){
					foreach($results as $rows){
					if($no%2==0) $class = "even"; else $class = "odd";
								echo form_open('product/confirmation');
                                echo "<tr>";
								echo "<input type='hidden' name='code' value='".$rows->code_order."'>";
                                echo "<td class='$class'>".$no."</td>";
								echo "<td class='$class'>".$rows->code_order."</td>";
                                echo "<td class='$class'>".$rows->name_product."</td>";
                                echo "<td class='$class'>Rp ".number_format($rows->harga_pas_beli)."</td>";
                                echo "<td class='$class'>".$rows->qty."</td>";
								echo "<td class='$class'>Rp ".number_format($rows->total_price)."</td>";
                                echo "<td class='$class'>".date("D, d M Y",strtotime($rows->date_order))."</td>";
                                if($rows->status_order == 1)
								echo "<td class='$class'><font color=\"#ff0000\"><b>Unpaid</b></font></td>";
								else if($rows->status_order == 2 || $rows->status_order == 3)
								echo "<td class='$class'><font color=\"#008000\"><b>Paid</b></font></td>";
								else if($rows->status_order == 4)
								echo "<td class='$class'>Dikirim</td>";
								else if($rows->status_order == 5)
								echo "<td class='$class'><font color=\"#ff0000\"><b>Canceled</b></font></td>";
								 if($rows->status_order == 1){
								echo "<td class='$class'>
										<center>
											<input title='Confirmation this History' type='image' height='20px' width='20px' src='".base_url('asset/images/theme/default/info.png')."'>
										</center>
									</td>";
								}
								else if($rows->status_order == 2 || $rows->status_order == 3 || $rows->status_order == 4)
									echo "<td class='$class'><center>
									<a href=\"".base_url('memberarea/history/print_cash/'.$rows->id_order)."\" title=\"Print Faktur\"><img height='20px' width='20px' src='".base_url('asset/images/theme/default/print.png')."'></a>
									<img height='20px' width='20px' src='".base_url('asset/images/theme/default/confirmation.png')."'></center></td>";
                                else
									echo "<td class='$class'><center><img height='20px' width='20px' src='".base_url('asset/images/theme/default/canceled.png')."'></center></td>";
								echo "</tr></form>";
								$no++;
								}
                        }
					  else echo "<tr><td colspan='9'>no data was found</td></tr>";
			echo $links;
			?>
    
            </table>
      </div>
    </div>
    <div class="clear"></div>
</div>
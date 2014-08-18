<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Transaction's History (Cicilan)</h2>
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
					</tr> 
           <?php
                    $no =1;
					if($results != 0){
					foreach($results as $rows){
					if($no%2==0) $class = "even"; else $class = "odd";
                                echo "<tr>";
                                echo "<td class='$class'>".$no."</td>";
								echo "<td class='$class'>".$rows->code_order."</td>";
                                echo "<td class='$class'><a title=\"Lihat Detail Cicilan\" href=\"".base_url('memberarea/history/view_cicilan/'.$rows->id_cicilan)."\">".$rows->name_product."</a></td>";
                                echo "<td class='$class'>Rp ".number_format($rows->harga_pas_beli)."</td>";
                                echo "<td class='$class'>".$rows->qty."</td>";
								echo "<td class='$class'>Rp ".number_format($rows->total_price)."</td>";
                                echo "<td class='$class'>".date("D, d M Y",strtotime($rows->date_order))."</td>";
                                if($rows->status_transfer == 1)
								echo "<td class='$class'><font color=\"#ff0000\">Unpaid</font></td>";
								else if($rows->status_transfer == 2 || $rows->status_order == 3)
								echo "<td class='$class'><font color=\"#008000\"><b>Paid</b></font></td>";
								else if($rows->status_transfer == 4)
								echo "<td class='$class'>Dikirim</td>";
								else if($rows->status_transfer == 5)
								echo "<td class='$class'><font color=\"#f8bb00\">Canceled</font></td>";
                                echo "</tr>";
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
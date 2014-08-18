<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Recent Transaction List (Celengan)</h2>
            <table>
					<tr> 
						<th width="3%">No.</th>
						<th width="20%">Balance</th>
						<th width="20%">Tanggal Detail</th>
						<th width="57%%">Status</th>
					</tr> 
           <?php
                    $no =1;
					if($results != 0){
					foreach($results as $rows){
					if($no%2==0) $class = "even"; else $class = "odd";
                                echo "<tr>";
                                echo "<td class='$class'>".$no."</td>";
                                echo "<td class='$class'>Rp ".number_format($rows->balance)."</td>";
                                echo "<td class='$class'>".date("D, d M Y",strtotime($rows->date_celengan_detail))."</td>";
								 if($rows->status_celengan_detail == 0)
								echo "<td class='$class'><font color=\"#ff0000\">Belum Transfer</font></td>";
								else if($rows->status_celengan_detail == 1)
								echo "<td class='$class'><font color=\"#008000\"><b>Sudah Transfer</b></font></td>";
								else if($rows->status_celengan_detail == 2){
								$product = $this->Model_product->get_product($rows->id_product);
								echo "<td class='$class'><font color=\"#ff0000\"><b>Terpakai Untuk ".$rows->qty." ".$product['name_product']."</b></font></td>";
								}
								else if($rows->status_celengan_detail == 3)
								echo "<td class='$class'><font color=\"#ff0000\"><b>Dicairkan (Belum Transfer)</b></font></td>";
								else if($rows->status_celengan_detail == 4)
								echo "<td class='$class'><font color=\"#ff0000\"><b>Dicairkan (Sudah di Transfer)</b></font></td>";
                                else if($rows->status_celengan_detail == 5)
									echo "<td class='$class'><font color=\"#ff0000\"><b>Batal Transfer</b></font></td>";
								else if($rows->status_celengan_detail == 7){
									$product = $this->Model_product->get_product($rows->id_product);
									echo "<td class='$class'><font color=\"#008000\"><b>Convert dari ".$rows->qty." ".$product['name_product']."</b></font></td>";
								}
								echo "</tr>";
								$no++;
								}
                        }
					  else echo "<tr><td colspan='5'>no data was found.</td></tr>";
			echo $links;
			?>
				<tr>
					<th colspan='4'>Total Saldo : Rp <?php echo number_format($results_saldo['total_balance']);?></th>
				</tr>
            </table>
			<?php
				if($count != 0){
			?>
			<b><a class="submit" title="Top Up Celengan" href="<?php echo base_url('module/topup_celengan')?>">Top Up Celengan</a></b>
			<a class="submit" title="Cairkan Celengan" href="<?php echo base_url('module/cairkan_celengan')?>">Cairkan</a>
			<?php
			}
			else
			echo "<b><a title=\"Aktifkan Celengan\" href=\"".base_url('module/intro_celengan_emas')."\">Aktifkan Celengan</a></b>";
			?>
      </div>
    </div>
    <div class="clear"></div>
</div>
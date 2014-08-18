<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Transaction's History (Celengan)</h2>
			
			<b>Recent Transaction List</b>
            <table>
					<tr> 
						<th width="3%">No.</th>
						<th width="20%">Balance</th>
						<th width="20%">Tanggal Detail</th>
						<th width="57%%">Status</th>
					</tr> 
           <?php
                    $no =1;
					if($results_celengan != 0){
					foreach($results_celengan as $rows){
					if($no%2==0) $class = "even"; else $class = "odd";
                                echo "<tr>";
                                echo "<td class='$class'>".$no."</td>";
                                echo "<td class='$class'>Rp ".number_format($rows->balance)."</td>";
                                echo "<td class='$class'>".date("D, d M Y",strtotime($rows->date_celengan_detail))."</td>";
                                if($rows->status_celengan_detail == 0)
								echo "<td class='$class'><font color=\"#ff0000\">Dalam Proses Top UP</font></td>";
								else if($rows->status_celengan_detail == 1)
								echo "<td class='$class'><font color=\"#008000\"><b>Top Up berhasil</b></font></td>";
								else if($rows->status_celengan_detail == 2){
								$product = $this->Model_product->get_product($rows->id_product);
								echo "<td class='$class'><font color=\"#ff0000\"><b>Terpakai Untuk ".$rows->qty." ".$product['name_product']."</b></font></td>";
								}
								else if($rows->status_celengan_detail == 3)
								echo "<td class='$class'><font color=\"#ff0000\"><b>Dalam Proses Dicairkan</b></font></td>";
								else if($rows->status_celengan_detail == 4)
								echo "<td class='$class'><font color=\"#ff0000\"><b>Pencairan Berhasil</b></font></td>";
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
			?>
				<tr>
					<td colspan='4'><center><a href="<?php echo base_url('memberarea/history/celengan_detail');?>">View All Celengan Detail</a></center></td>
				</tr>
				<tr>
					<th colspan='4'><b>Total Saldo : Rp <?php echo number_format($results_saldo['total_balance']);?></b></th>
				</tr>
            </table>
			<center><b><a class="submit" title="Top Up Celengan" href="<?php echo base_url('module/topup_celengan')?>">Top Up</a>
			<a class="submit" title="Cairkan Celengan" href="<?php echo base_url('module/cairkan_celengan')?>">Cairkan</a>
			</b></center><br /><br />
			<b>Recent My Gold List</b>
            <table>
					<tr> 
						<th>No.</th>
						<th>Produk</th>
						<th>Qty</th>
						<th>Buy Back Saat Ini</th>
						<th>Tanggal Beli</th>
					</tr> 
           <?php
                    $no =1;
					if($results_emas != 0){
					foreach($results_emas as $rows){
					if($rows->id_product == 13){
					$harga_beli = $this->Model_transaction->get_dirham_beli();
					$gram = 1;
					}
					else if($rows->id_product == 12){
					$harga_beli = $this->Model_transaction->get_dinar_beli();
					$gram = 1;
					}
					else{
					$harga_beli = $this->Model_transaction->get_lm_beli();
					$gram = $rows->gram;
					}
					if($no%2==0) $class = "even"; else $class = "odd";
                                echo "<tr>";
                                echo "<td class='$class'>".$no."</td>";
                                echo "<td class='$class'>".$rows->name_product."</td>";
                                echo "<td class='$class'>".$rows->qty."</td>";
								echo "<td class='$class'>Rp ".number_format($harga_beli*$gram*$rows->qty)."</td>"; // harga beli * berapa gram
                                echo "<td class='$class'>".date("D, d M Y",strtotime($rows->date_celengan_emas))."</td>";
                                echo "</tr>";
								$no++;
								}
                        }
					  else echo "<tr><td colspan='8'>no data was found.</td></tr>";
			?>
			<tr>
					<td colspan='8'><center><a href="<?php echo base_url('memberarea/history/celengan_emas');?>">View All Celengan Emas</a></center></td>
				</tr>
            </table>
			<center>
				<b><a class="submit" href="<?php echo base_url('module/buy_celengan')?>">Convert To Gold</a></b>
				<b><a class="submit" href="<?php echo base_url('module/lepas')?>">Convert to Rupiah</a></b>
			</center>
			<?php
			if($count == 0)
			echo "<b><a title=\"Aktifkan Celengan\" href=\"".base_url('module/intro_celengan_emas')."\">Aktifkan Celengan</a></b>";
			?>
      </div>
    </div>
    <div class="clear"></div>
</div>
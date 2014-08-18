<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Recent My Gold List</h2>
            <table>
					<tr> 
						<th>No.</th>
						<th>Produk</th>
						<th>Qty</th>
						<th>Harga Jual Now</th>
						<th>Tanggal Beli</th>
					</tr> 
          <?php
                    $no =1;
					if($results != 0){
					foreach($results as $rows){
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
            </table>
			<center>
				<b><a class="submit" href="<?php echo base_url('module/buy_celengan')?>">Convert to Gold</a></b>
				<b><a class="submit" href="<?php echo base_url('module/lepas')?>">Convert to Rupiah</a></b>
			</center>
			<?php
			echo $links;
			if($count == 0)
			echo "<b><a title=\"Aktifkan Celengan\" href=\"".base_url('module/intro_celengan_emas')."\">Aktifkan Celengan</a></b>";
			?>
      </div>
    </div>
    <div class="clear"></div>
</div>
<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Gold Anda Saat Ini</h2>
            <table>
					<tr> 
						<th>No.</th>
						<th>Produk</th>
						<th>Qty</th>
					</tr> 
          <?php
                    $no =1;
					if($simpan['status_simpan'] == 1){
					if($results != 0){
					foreach($results as $rows){
					if($no%2==0) $class = "even"; else $class = "odd";
                                echo "<tr>";
                                echo "<td class='$class'>".$no."</td>";
                                echo "<td class='$class'>".$rows->name_product."</td>";
                                echo "<td class='$class'>".$rows->qty."</td>";
								echo "</tr>";
								$no++;
								}
					 }
					  else echo "<tr><td colspan='3'>no data was found.</td></tr>";
					}
					else echo "<tr><td colspan='8'>Program Simpan anda saat ini tidak atau belum aktif</td></tr>";
			?>
            </table>
			<?php
			echo $links;
			if($count == 0)
			echo "<b><a class='submit' title=\"Aktifkan Simpan\" href=\"".base_url('module/intro_simpan_pinjam')."\">Aktifkan Program Simpan</a></b>";
			else if($simpan['status_simpan'] != 1)
			echo "<b>Program Simpan anda saat ini tidak atau belum aktif</b>";
			else{
				if(strtotime("now") < strtotime($simpan['date_akhir'])){
				echo "<b><a class='submit' title=\"Simpan Emas\" href=\"".base_url('module/add_simpan')."\">Simpan Emas</a></b> ";
				echo "<b><a class='submit' title=\"Ambil Emas\" href=\"".base_url('module/ambil_simpan')."\">Ambil Emas</a></b>";
				}
				else{
					echo "Maaf akun anda saat ini tidak aktif. Silahkan perpanjang terlebih dahulu";
				}
			}
			?>
      </div>
    </div>
    <div class="clear"></div>
</div>
<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Lihat Detail Cicilan</h2>
            <table>
					<tr> 
						<th>Keterangan</th>
						<th>Sisa Angsuran</th>
						<th>Cicilan Pokok</th>
						<th>Biaya Titip</th>
						<th>Total</th>
						<th>Jatuh Tempo</th>
						<th>Tanggal Terbayar</th>
						<th>Status</th>
					</tr> 
          <?php
                    $no =0;
					$grand_total=0;
					$biaya_titip = 0;
					if($results != 0){
					foreach($results as $rows){
						if($no%2==0)
							$class = "odd";
						else $class = "even";
						$pokok = ($rows->harga_pas_beli)/($rows->jangka_waktu);
						if($no==0)
							$sisa_angsuran = ($rows->harga_pas_beli*$rows->qty);
						else
							$sisa_angsuran = ($rows->harga_pas_beli*$rows->qty)-$pokok*$no;
						$pokok = ($rows->harga_pas_beli*$rows->qty)/($rows->jangka_waktu);
                        echo "<tr>";
						echo "<td class='$class'>Cicilan ke-".($no+1)."</td>";
						echo "<td class='$class'>".number_format($sisa_angsuran)."</td>";
						if($rows->cannot_pay == 0)
							echo "<td class='$class'>".number_format($pokok)."</td>";
						else
							echo "<td class='$class'>-</td>";
						echo "<td class='$class'>".number_format($rows->biaya_titip)."</td>";
						if($no == 0){
							$total = $pokok+$rows->biaya_titip+100000;
							echo "<td class='$class'>".number_format($total)."</td>";
						}
						else{
							if($rows->cannot_pay == 0){
								$total = $pokok+$rows->biaya_titip;
								echo "<td class='$class'>".number_format($total)."</td>";
							}
							else
								echo "<td class='$class'>-</td>";
						}
                        echo "<td class='$class'>".date("D, d M Y",strtotime($rows->date_jatuh_tempo))."</td>";
						if($rows->status_cicilan == 1)
							echo "<td class='$class'>-</td>";
						else
							echo "<td class='$class'>".date("D, d M Y",strtotime($rows->date_terbayar))."</td>";
                        if($rows->status_cicilan == 1)
							echo "<td class='$class'><font color=\"#ff0000\">Unpaid</font></td>";
						else if($rows->status_cicilan == 2)
							echo "<td class='$class'><font color=\"#008000\"><b>Paid</b></font></td>";
                            echo "</tr>";
						if($rows->cannot_pay == 0)
						$grand_total += $total;
						$biaya_titip += $rows->biaya_titip;
						$no++;
						}
                    }
					  else echo "<tr><td colspan='9'>no data was found</td></tr>";
				?>
				<tr>
					<th colspan="2"><center><?php echo "<b>Total</b>";?></center></th>
					<th><?php echo number_format($grand_total-$biaya_titip-100000)?></th>
					<th><?php echo number_format($biaya_titip)?></th>
					<th><?php echo number_format($grand_total)?></th>
					<th colspan="3"></th>
				</tr>
            </table>
			<a href="<?php echo base_url('memberarea/history/cicilan');?>" title="Back to Cicilan"><< Back to Transaksi Cicilan</a>
      </div>
    </div>
    <div class="clear"></div>
</div>
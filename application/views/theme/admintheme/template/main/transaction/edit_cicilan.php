<article class="module width_full">
    <header><h3>Lihat Detail Cicilan</h3></header>
		<div class="tab_container">
			Nama Pemesan : <?php echo $name;?>
				<table class="tablesorter" cellspacing="0"> 
				<thead> 
					<tr> 
						<th></th> 
						<th>Keterangan</th>
						<th>Sisa Angsuran</th>
						<th>Cicilan Pokok</th>
						<th>Biaya Titip</th>
						<th>Total</th>
						<th>Jatuh Tempo</th>
						<th>Tanggal Terbayar</th>
						<th>Status</th>
						<th>Actions</th>
					</tr> 
				</thead> 
				<tbody>
<?php
                    $no =0;
					$grand_total=0;
					if($results != 0){
					foreach($results as $rows){
						$pokok = ($rows->harga_pas_beli)/($rows->jangka_waktu);
						if($no==0)
							$sisa_angsuran = ($rows->harga_pas_beli);
						else
							$sisa_angsuran = ($rows->harga_pas_beli)-$pokok*$no;
						$pokok = ($rows->harga_pas_beli)/($rows->jangka_waktu);
                        echo "<tr>";
                        echo "<td><input type=\"checkbox\"></td>";
						echo "<td>Cicilan ke-".($no+1)."</td>";
						echo "<td>".number_format($sisa_angsuran)."</td>";
						if($rows->cannot_pay == 0)
							echo "<td>".number_format($pokok)."</td>";
						else
							echo "<td>-</td>";
						echo "<td>".number_format($rows->biaya_titip)."</td>";
						if($no == 0){
							$total = $pokok+$rows->biaya_titip+100000;
							echo "<td>".number_format($total)."</td>";
						}
						else{
							if($rows->cannot_pay == 0){
								$total = $pokok+$rows->biaya_titip;
								echo "<td>".number_format($total)."</td>";
							}
							else
								echo "<td>-</td>";
						}
                        echo "<td>".date("D, d M Y",strtotime($rows->date_jatuh_tempo))."</td>";
						if($rows->date_terbayar == 0)
							echo "<td>-</td>";
						else
							echo "<td>".date("D, d M Y",strtotime($rows->date_terbayar))."</td>";
                        if($rows->status_cicilan == 1)
							echo "<td><font color=\"#ff0000\">Unpaid</font></td>";
						else if($rows->status_cicilan == 2)
							echo "<td><font color=\"#008000\"><b>Paid</b></font></td>";
                            echo "<td><a href='".base_url()."adminpanel/transaction/edit_cicilan/".$rows->id_cicilan_detail."' title=\"Change Transaction's Status\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a></td>";
                            echo "</tr>";
						if($rows->cannot_pay == 0)
						$grand_total += $total;
						$no++;
						}
                    }
					  else echo "<tr><td colspan='9'>no data was found</td></tr>";
?>
				<tr>
					<td colspan="3"><center><?php echo "<b>Total</b>";?></center></td>
					<td><?php echo number_format($harga_beli)?></td>
					<td><?php echo number_format($no*6000*$gram)?></td>
					<td><?php echo number_format($grand_total)?></td>
				</tr>
				</tbody> 
				</table>
		</div>
</article>
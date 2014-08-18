<article class="module width_full">
    <header><h3>Transaction Member (Gadai)</h3></header>
		<div class="tab_container">
				<table class="tablesorter" cellspacing="0"> 
				<thead> 
					<tr> 
						<th></th> 
						<th>Nama Penggadai</th> 
						<th>Gram</th> 
						<th>Nilai Taksiran</th>
						<th>Pinjaman</th>
						<th>Tanggal Gadai</th>
						<th>Jangka Waktu</th>
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
						var goifokay = "<?php echo base_url().'adminpanel/transaction/delete_gadai/'.$rows->id_gadai;?>";
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
                                echo "<td>".$rows->gram_gadai."</td>";
                                echo "<td>Rp ".number_format($rows->nilai_taksiran)."</td>";
                                echo "<td>Rp ".number_format($rows->pinjaman)."</td>";
                                echo "<td>".date("D, d M Y",strtotime($rows->date_gadai))."</td>";
                                echo "<td>".$rows->jangka_waktu." Bulan</td>";
                                if($rows->status_gadai == 1)
								echo "<td><font color=\"#ff0000\">Tergadaikan</font></td>";
								else if($rows->status_gadai == 2)
								echo "<td><font color=\"#008000\"><b>Ditebus</b></font></td>";
                                echo "<td><a href='".base_url()."adminpanel/transaction/edit_status_gadai/".$rows->id_gadai."' title=\"Change Transaction's Status\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='Delete' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                echo "</tr>";
								}
                        }
					  else echo "<tr><td colspan='9'>no data was found</td></tr>";
							?>
				</tbody> 
				</table>
				<div style="margin:5px;">
					<a title="Add Gadai" href="<?php echo base_url('adminpanel/transaction/add_gadai')?>"><input type="submit" value="Add Gadai" class="alt_btn"></a>
                    <a title="Print Report" href="<?php echo base_url('adminpanel/report/gadai')?>"><input type="submit" value="Print Report" class="alt_btn"></a>
				</div>
		</div>
</article>
<article class="module width_full">
    <header><h3>Simpan Emas</h3></header>
		<div class="tab_container">
				<table class="tablesorter" cellspacing="0"> 
				<thead> 
					<tr> 
						<th></th> 
						<th>Nama Pemilik</th>
						<th>Username</th> 
						<th>Tanggal Pembuatan</th>
						<th>Tanggal Selesai</th>
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
						var goifokay = "<?php echo base_url().'adminpanel/transaction/delete_simpan/'.$rows->id_simpan;?>";
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
                                echo "<td>".$rows->username."</td>";
                                echo "<td>".date("D, d M Y",strtotime($rows->date_simpan))."</td>";
                                echo "<td>".date("D, d M Y",strtotime($rows->date_akhir))."</td>";
                                
								if($rows->status_simpan == 0)
									echo "<td><font color=\"#ff0000\">Non Aktif</font></td>";
								else if($rows->status_simpan == 1)
									echo "<td><font color=\"#008000\"><b>Aktif</b></font></td>";
								else if($rows->status_simpan == 2)
									echo "<td><font color=\"#ff0000\">Belum Bayar</font></td>";
                                echo "<td><a title=\"View simpan\" href='".base_url('adminpanel/transaction/view_simpan/'.$rows->id_simpan)."'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_categories.png'></a><a href='".base_url()."adminpanel/transaction/edit_status_simpan/".$rows->id_simpan."' title=\"Change Transaction's Status\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='Move to Archive' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                echo "</tr>";
								}
                        }
					  else echo "<tr><td colspan='9'>no data was found</td></tr>";
							?>
				</tbody> 
				</table>
                <div style="margin:5px 0 5px 10px;">
					<a href="<?php echo base_url('adminpanel/report/simpan')?>"><input type="submit" value="Print Report" class="alt_btn"></a>
				</div>
		</div>
</article>
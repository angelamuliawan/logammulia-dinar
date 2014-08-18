<article class="module width_full">
    <header><h3>Simpan Emas</h3></header>
		<div class="tab_container">
				<table class="tablesorter" cellspacing="0"> 
				<thead> 
					<tr> 
						<th></th> 
						<th>Nama Pemilik</th>
						<th>Produk</th>
						<th>Qty</th>
						<th>Tanggal Simpan</th>
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
						var goifokay = "<?php echo base_url().'adminpanel/transaction/delete_simpan_detail/'.$rows->id_simpan_detail;?>";
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
                                echo "<td>".$rows->name_product."</td>";
                                echo "<td>".$rows->qty."</td>";
                                echo "<td>".date("D, d M Y",strtotime($rows->date_simpan_detail))."</td>";
								if($rows->status_simpan_detail == 1)
									echo "<td><font color=\"#ff0000\"><b>Mengajukkan Simpan</b></font></td>";
								else if($rows->status_simpan_detail == 2)
									echo "<td><font color=\"#008000\"><b>Disimpan</b></font></td>";
								else if($rows->status_simpan_detail == 3)
									echo "<td><font color=\"#ff0000\"><b>Mengajukkan Lepas</b></font></td>";
								else if($rows->status_simpan_detail == 4)
									echo "<td><font color=\"#ff0000\"><b>Dilepas</b></font></td>";
                                echo "<td><a href='".base_url()."adminpanel/transaction/edit_simpan/".$rows->id_simpan_detail."' title=\"Change Transaction's Status\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='Move to Archive' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                echo "</tr>";
								}
                        }
					  else echo "<tr><td colspan='7'>no data was found</td></tr>";
							?>
				</tbody> 
				</table>
		</div>
</article>
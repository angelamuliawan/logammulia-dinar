<article class="module width_full">
		<header><h3 class="tabs_involved">Manage Bank</h3>
		</header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
					<th>Nama Bank</th>
					<th>Nomor Rekening</th>
					<th>Atas Nama</th> 
					<th>Action</th> 
				</tr> 
			</thead> 
			<tbody>
                            <?php
                            $no =0;
                            if($bank != 0){
                                foreach($bank as $rows){
                                    $no++;
				    ?>
				<script type="text/javascript">
					<!--
						function queryAction<?php echo $no?>(){
						var confirmmessage = "Are you sure you want to continue?";
						var goifokay = "<?php echo base_url().'adminpanel/setting/delete_bank/'.$rows->id_rekening_bank;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
				</script>
				    <?php
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\"></td>";
                                echo "<td>".$rows->nama_bank."</td>";
                                echo "<td>".$rows->nomor_rekening."</td>";
                                echo "<td>".$rows->atas_nama."</td>";
                                echo "<td><a href='".base_url()."adminpanel/setting/edit_bank/".$rows->id_rekening_bank."' title=\"edit this bank\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='delete user' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                echo "</tr>";
                                }
                            }
                            else echo "<tr><td colspan='5'>no data was found</td></tr>";
                            ?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			<div style="margin:10px 0 10px 10px">
				<?php echo form_open(base_url('adminpanel/setting/add_bank'))?>
				<input type="submit" value="add bank">
				</form>
			</div>
		</div><!-- end of .tab_container -->
		<?php echo $links;?>
		</article>
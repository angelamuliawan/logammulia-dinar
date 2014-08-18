<article class="module width_full">
		<header><h3 class="tabs_involved">Set Margin</h3>
		</header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
					<th>Nama Produk</th> 
					<th>Harga Dasar</th> 
					<th>Margin</th>
					<th>Harga Jual</th>
                                        <th>Date Update</th>
					<th>Actions</th>
				</tr> 
			</thead> 
			<tbody>
                            <?php
                            $no =0;
			    if($results != 0){
                                foreach($results as $rows){
                                    $no++;
				    ?>
				<script type="text/javascript">
					<!--
						function queryAction<?php echo $no?>(){
						var confirmmessage = "Are you sure you want to continue?";
						var goifokay = "<?php echo base_url().'adminpanel/product/delete_product/'.$rows->id_product;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
				</script>
				    <?php
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\"></td>";
                                echo "<td>".$rows->name_product."</td>";
                                echo "<td>Rp ".number_format($rows->base_price)."</td>";
                                echo "<td>Rp ".number_format($rows->margin)."</td>";
                                echo "<td>Rp ".number_format($rows->sell_price)."</td>";
                                if($rows->date_update_margin == 0) echo "<td>Never Update</td>";
                                else echo "<td>".date("d M Y H:i",strtotime($rows->date_update_margin))."</td>";
                                echo "<td><a href='".base_url()."adminpanel/product/edit_margin/".$rows->id_product."' title=\"edit margin this product\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a></td>";
                                echo "</tr>";
                                }
			    }
			    else echo "<tr><td colspan='6'>no data was found</td></tr>";
                            ?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->	
		</div><!-- end of .tab_container -->
		</article>
		<center><?php echo $links;?></center>
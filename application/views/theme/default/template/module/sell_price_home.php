<div class="new_price">Harga Jual Terbaru</div>
<p style="font-size:12px;text-align:center;">Tanggal Update: <?php echo date('D, d M Y');?></p>
					<table>
						<tr>
							<th>Produk</th>
							<th>Harga Jual (Rp)</th>
						</tr>
					<?php 
					$i = 0;
					foreach($result_product as $row){
					$title = preg_replace('/[^a-z0-9]+/','-',strtolower($row->name_product));
						if($i%2==0){
						?>
						<tr>
							<td class="even"><a title="order <?php echo $row->name_product?>" href="<?php echo base_url('product/order/'.$row->id_product.'/'.$title)?>"><?php echo $row->name_product?></a></td>
							<td class="even"><?php echo number_format($row->sell_price)?></td>
						</tr>
					<?php
						}
						else{
						?>
						<tr>
							<td class="odd"><a title="order <?php echo $row->name_product?>" href="<?php echo base_url('product/order/'.$row->id_product.'/'.$title)?>"><?php echo $row->name_product?></a></td>
							<td class="odd"><?php echo number_format($row->sell_price)?></td>
						</tr>
						<?php
						}
					$i++;
					}
					?>
						<tr>
							<th colspan="3" style="text-align:center;"><a title="Lihat Semua Harga" href="<?php echo base_url('product/view_all')?>">Lihat Semua Harga...</a></th>
						</tr>
					</table>
					<div class="login">
                    <?php if($loginstat==0){?> <a href="#" onclick="document.getElementById('txtusername').focus();">Login</a>
                    <a href="<?php echo base_url('register'); ?>">Register</a><?php }?></div>
                    
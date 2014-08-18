<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
    <div id="content_right">
        <div id="contain">
            <h2>Buy Gold</h2>
			Harga Update : <b><?php echo date('d M Y')?></b>
					<table>
						<tr>
							<th>Produk</th>
							<th>Harga Jual</th>
                            <th>Ketersediaan</th>
							<th>Order</th>
						</tr>
					<?php 
					$i = 0;
					foreach($result_product as $row){
					$title = preg_replace('/[^a-z0-9]+/','-',strtolower($row->name_product));
					if($i%2==0){
						$class="odd";
					}
					else $class = "even";
						?>
						<tr>
							<td class="<?php echo $class ?>"><a title="order <?php echo $row->name_product?>" href="<?php echo base_url('product/order/'.$row->id_product.'/'.$title)?>"><?php echo $row->name_product?></a></td>
							<td class="<?php echo $class ?>"><?php echo number_format($row->sell_price)?></td>
                            <td class="<?php echo $class ?>">
								 <?php
								 if($row->stock <= 0) echo "Not Ready";
								 else echo "Ready";
								 ?>
                            </td>
							<td><a href="<?php echo base_url('product/order_confirmation/'.$row->id_product);?>">Order</a></td>
						</tr>
					<?php
					$i++;
					}
					?>
					</table>
        </div>
    </div>
    <div class="clear"></div>
</div>
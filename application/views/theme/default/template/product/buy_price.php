<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
    <div id="content_right">
        <div id="contain">
            <h2>Sell Gold</h2>
			Harga Update : <b><?php echo date('d M Y')?></b>
					<table>
						<tr>
							<th>Produk</th>
							<th>Harga Beli</th>
							<th>Jual</th>
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
							<td class="<?php echo $class ?>"><?php echo $row->name_product?></td>
							<td class="<?php echo $class ?>"><?php echo number_format($row->harga_beli)?></td>
							<td class="<?php echo $class ?>"><?php if($loginstat == 1){?><a href="<?php echo base_url('product/sell_gold/'.$row->id_harga_beli);?>">Jual</a><?php } else echo "-";?></td>
						</tr>
					<?php
					$i++;
					}
					?>
					</table>
					<b>Notes</b> : Untuk Menjual Emas, anda harus login terlebih dahulu.
        </div>
    </div>
    <div class="clear"></div>
</div>
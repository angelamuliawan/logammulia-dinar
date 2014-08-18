<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Simulasi Cicilan</h2>
            <table width="35%" border="1">
              <tr>
                <td width="28%">Nama Produk</td>
                <td width="72%"><?php echo $produk['name_product'];?></td>
              </tr>
              <tr>
                <td>Harga Jual</td>
                <td><?php echo 'IDR '.number_format($produk['sell_price']);?></td>
              </tr>
              <tr>
                <td>Cicilan Pokok</td>
                <td><?php echo 'IDR '.number_format($cicilan_pokok).' x '.$jangka_waktu.' bulan';?></td>
              </tr>
            </table>
            <p>
            <table>
            <th>Keterangan</th><th>Sisa Angsuran</th><th>Cicilan Pokok</th><th>Biaya Titip (<?php echo $margin?>/gram)</th><th>Total</th>
            <?php
			$setting = $this->Model_setting->setting();
			$total_cicil=0; $total_titip=0; $grand_total=0;
			$title = preg_replace('/[^a-z0-9]+/','-',strtolower($produk['name_product']));
			for($i=1;$i<=$jangka_waktu;$i++)
			{
				if($i%2==0){
				?>
                <tr>
					<td class="even">Cicilan ke-<?php echo $i;?></td>
					<td class="even"><?php echo number_format($produk['sell_price']-$total_cicil);?></td>
					<td class="even"><?php echo number_format($cicilan_pokok); $total_cicil+=$cicilan_pokok;?></td>
					<td class="even"><?php $titip= $margin*$produk['gram']; $total_titip+=$titip; echo number_format($titip);?></td>
					<td class="even"><?php $total= $cicilan_pokok+$titip; if($i==1){$total+=$setting['administrasi_cicilan'];} $grand_total+= $total; echo number_format($total)?></td>
				</tr>
                <?php
				}
				else{
				?>
				 <tr>
					<td class="odd">Cicilan ke-<?php echo $i;?></td>
					<td class="odd"><?php echo number_format($produk['sell_price']-$total_cicil);?></td>
					<td class="odd"><?php echo number_format($cicilan_pokok); $total_cicil+=$cicilan_pokok;?></td>
					<td class="odd"><?php $titip= $margin*$produk['gram']; $total_titip+=$titip; echo number_format($titip);?></td>
					<td class="odd"><?php $total= $cicilan_pokok+$titip; if($i==1){$total+=$setting['administrasi_cicilan'];} $grand_total+= $total; echo number_format($total)?></td>
				</tr>
				<?php
				}
			}
			?>
            <th colspan="2">Total</th><th><?php echo number_format($cicilan_pokok*$jangka_waktu)?></th><th><?php echo number_format($total_titip);?></th><th><strong><?php echo number_format($grand_total)?></strong></th>
            </table>
			<a href="<?php echo base_url('product/order_confirmation/'.$id_produk.'/'.$title.'/');?>" title="Order <?php echo $produk['name_product']?>">Order <?php echo $produk['name_product']?></a><br />
            *Cicilan pertama dikenakan biaya IDR <?php echo number_format($setting['administrasi_cicilan']);?>,-
            </p>
            <p>
            
            </p>
      </div>
    </div>
    <div class="clear"></div>
</div>
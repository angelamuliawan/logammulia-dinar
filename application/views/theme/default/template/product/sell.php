<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
    <div id="content_right">
        <div id="contain">
            <h2>Sell Gold</h2>
			<?php echo form_open('');?>
			<table>
				<tr>
					<th width="40%">Product</th>
					<td><?php echo $result['name_product']?></td>
				</tr>
				<tr>
					<th>Price per gram</th>
					<td>Rp <?php echo number_format($result['harga_beli']);?>
					<input type="hidden" name="harga" value="<?php echo $result['harga_beli']?>" /></td>
				</tr>
				<tr>
					<th>gram</th>
					<td><input type="number" name="qty" class="txt" size="2" min="1" value="<?php echo set_value('qty')?>"/></td>
				</tr>
                <tr>
					<th>Shipping</th>
					<td>
                        <?php
								$options = array(
										'' => 'Pilih Metode Shipping',
										1 => 'Datang ke Outlet',
										2 => 'Delivery'
										);
								echo form_dropdown('shipping',$options,set_value('shipping'),'class="txt"');
                        ?>
                    </td>
				</tr>
                <tr>
                    <th>Tanggal Dikirim / Diambil</th>
                    <td><input type="text" name="date" id="datepicker" class="txt" value="<?php echo set_value('date')?>"></td>
                </tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Sell"/></td>
				</tr>
			</table>
			</form>
			<?php
				echo validation_errors();
				if(isset($sell)){
					?>
					Anda Berhasil Mengajukkan Penjualan dengan detail sebagai berikut :
					<table>
				<tr>
					<th width="40%">Product</th>
					<td><?php echo $result['name_product']?></td>
				</tr>
				<tr>
					<th>gram</th>
					<td><?php echo $this->input->post('qty')?></td>
				</tr>
				<tr>
					<th>Total Harga</th>
					<td>Rp <?php echo number_format($result['harga_beli']*$this->input->post('qty'));?></td>
				</tr>
                <tr>
					<th>Akan diambil / dikirim pada</th>
					<td><?php echo date("D, d/m/y",strtotime($this->input->post('date')));?></td>
				</tr>
			</table>
					Selanjutnya, silahkan datang ke outlet kami atau hubungi kontak kami.
					<?php
				}
			?>
        </div>
    </div>
    <div class="clear"></div>
</div>
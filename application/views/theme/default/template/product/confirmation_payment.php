<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
    <div id="content_right">
        <div id="contain">
            <h2>Konfirmasi Pembayaran</h2>
			<br />
			<?php if($result != FALSE){
				echo form_open('');
			?>
			<table>
				<tr>
						<td width="30%">Code Order</td>
						<td><b><?php echo $result['code_order']?></b></td>
						<input type="hidden" name="code" value="<?php echo $result['code_order']; ?>">
					</tr>
				<tr>
						<td>Status</td>
						<td><?php if($result['status_order']==1) echo "Unpaid";
							else if($result['status_order']==2) echo "Paid";
							else if($result['status_order']==4) echo "Dikirim";
							else if($result['status_order']==5) echo "Batal";
						?></td>
				</tr>
                    <td>Nama Produk</td>
                    <td><?php echo $result['name_product'];?></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td>Rp <?php echo number_format($result['harga_pas_beli']); ?></td>
                </tr>
					<tr>
						<td>Qty</td>
						<td><?php echo $result['qty']?></td>
					</tr>
					<tr>
						<td>Total Harga</td>
						<td>Rp <?php echo number_format($result['total_price'])?></td>
					</tr>
					<tr>
						<td>Metode Shipping</td>
						<td><?php if($result['shipping']==1) echo "COD di Outlet"; else echo "Delivery";?></td>
					</tr>
					<?php
					// logika nyicil
						if($type == 2 && $result['cicilan'] ==2){
						?>
						
						<?php
						}
					?>
					<tr>
						<td>Transfer ke Rekening</td>
						<td>
							<select name="bank">
								<option value="">Select Bank</option>
							<?php
								foreach($bank as $rows){
									echo "<option value=\"".$rows->id_rekening_bank."\">".$rows->nama_bank."</option>";
								}
							?>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><?php if($result['status_order']==1){?> <input type="submit" value="konfirmasi"> <?php }?></td>
					</tr>
            </table>
			<?php
				echo validation_errors();
				}
			else{
				echo "<b>Order Code Not Found</b>, <a href='".base_url('product/confirmation')."'>Try Again</a>";
			}
			?>
		</div>
    </div>
    <div class="clear"></div>
</div>
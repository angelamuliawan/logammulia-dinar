<script type="text/javascript">
function disable()
{
    if(document.getElementById("cicilan").value == 1){
         document.getElementById("bulan").disabled = true;
    }
    else{
         document.getElementById("bulan").disabled = false;
    }

}
    
</script>
<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
    <div id="content_right">
        <div id="contain">
			<form method="post" action="<?php echo base_url('product/order_confirmation/'.$this->uri->segment(3))?>" onsubmit="return validasiOrder()">
            <h2>Order Confirmation</h2>
			<div class="error">
			<?php
				if($this->session->flashdata('error') != "") echo $this->session->flashdata('error');
			?>
			</div>
			<input type="hidden" name="username" value="<?php if($loginstat == 1) echo $session['tgs_username_member'];?>">
            <a href="#" title="Click to close"><div id="errordiv" onclick="document.getElementById('errordiv').style.display='none'"><?php echo validation_errors();?></div></a>
            <table>
				<tr>
                    <td>Nama Produk</td>
                    <td><?php echo $name_product?></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td>Rp <?php echo number_format($sell_price); ?></td>
					<input type="hidden" name="harga_jual" value="<?php echo $sell_price?>">
                </tr>
				<?php
					if($loginstat == 0){
					?>
					<tr>
						<td>Qty*</td>
						<td><input id="txtQty" type="number" name="qty" value="1" min="1" max="10" value="<?php echo set_value('qty')?>" onchange="updateTotal(this.value)"></td>
					</tr>
					<tr>
					  <td>Total</td>
					  <td id="total"></td>
					</tr>
					<tr>
						<td>Nama*</td>
						<td><input id="txtNama" type="text" name="nama" value="<?php echo set_value("nama")?>"></td>
					</tr>
					<tr>
						<td>Email*</td>
						<td><input id="txtEmail" type="text" name="email" value="<?php echo set_value("email")?>"></td>
					</tr>
					<tr>
						<td>No HP*</td>
						<td><input id="txtNoHp" type="text" name="no_hp" value="<?php echo set_value("no_hp")?>"></td>
					</tr>
					<tr>
						<td>Alamat*</td>
						<td><textarea id="txtAlamat" name="address" cols="40" rows="4"><?php echo set_value("address")?></textarea></td>
					</tr>
					<tr>
						<td>Nomor Rekening*</td>
						<td><input id="txtNoRek" type="text" name="no_rek" value="<?php echo set_value("no_rek")?>"></td>
					</tr>
					<tr>
						<td>Atas Nama*</td>
						<td><input id="txtNamaRek" type="text" name="an" value="<?php echo set_value("an")?>"></td>
					</tr>
					<tr>
						<td>Metode Shipping*</td>
						<td>
							<?php
								$options = array(
										'' => 'Pilih Metode Shipping',
										1 => 'COD di Outlet',
										2 => 'Delivery'
										);
								echo form_dropdown('shipping',$options,set_value('shipping'));
							?>
						</td>
					</tr>
					
					<tr>
						<td>Tanggal Dikirim</td>
						<td>
							<input type="date" name="date" id="date" />
							<br />
							*Jika Metode Shipping Delivery wajib diisi.
						</td>
					</tr>
					<?php
					}
					else{
					?>
					<tr>
						<td>Qty*</td>
						<td><input type="number" name="qty" value="1" min="1" max="10" onchange="updateTotal(this.value)"></td>
					</tr>
					<tr>
					  <td>Total</td>
					  <td id="total"></td>
					</tr>
					<tr>
						<td>Nama*</td>
						<td><input type="text" value="<?php echo $nama?>" disabled></td>
						<input type="hidden" name="nama" value="<?php echo $nama?>">
					</tr>
						<input type="hidden" name="email" value="<?php echo $email?>">
						<input type="hidden" name="no_hp" value="<?php echo $no_hp?>">
						<input type="hidden" name="address" value="<?php echo $address?>">
						<input type="hidden" name="no_rek" value="<?php echo $no_rek?>">
						<input type="hidden" name="an" value="<?php echo $an?>">
					<tr>
						<td>Metode Pembayaran*</td>
						<td>
							<?php
								$options = array(
										1 => 'Cash',
										2 => 'Cicilan'
										);
								echo form_dropdown('cicilan',$options,set_value('cicilan'),'id="cicilan" onchange="disable()"');
							?>
						</td>
					</tr>
                
					<tr>
						<td>Jangka Waktu</td>
						<td>
						<?php
								$options = array(
										'' => 'Pilih Jangka Waktu',
										3 => '3 Bulan',
										6 => '6 Bulan',
										9 => '9 Bulan',
										10 => '10 Bulan',
										12 => '1 Tahun',
										24 => '2 Tahun',
										36 => '3 Tahun',
										);
								echo form_dropdown('bulan',$options,set_value('bulan'),'id="bulan" disabled');
							?>
						</td>
					</tr>
					<tr>
						<td>Metode Shipping*</td>
						<td>
							<?php
								$options = array(
										'' => 'Pilih Metode Shipping',
										1 => 'Datang ke Outlet',
										2 => 'Delivery'
										);
								echo form_dropdown('shipping',$options,set_value('shipping'));
							?>
						</td>
					</tr>
					
					<tr>
						<td>Tanggal Dikirim</td>
						<td><input type="text" name="date" id="datepicker">
						<br />
						*Jika Metode Shipping Delivery wajib diisi.
						</td>
					</tr>
					<?php
					}
				?>
				<tr>
					<td></td>
					<td><input type="submit" value="beli">
				</tr>
            </table>
			</form>
			<?php
			if($loginstat == 0){
			?>
			<b>Notes :</b> Pastikan data alamat pengiriman benar. Pembayaran harus dibayarkan maksimal pada pukul 22.00 pada hari yang sama. Jika pembayaran
            dilakukan diatas pukul 22.00 dianggap batal.
			<?php
			}
			else{
			echo "<b>Notes :</b> Pastikan data alamat pengiriman benar. Pembayaran harus dibayarkan maksimal pada pukul 22.00 pada hari yang sama. Jika pembayaran
            dilakukan diatas pukul 22.00 dianggap batal.
			";
			}
			?>
        </div>
    </div>
    <div class="clear"></div>
</div>
<script>
function updateTotal(a)
{
	var sell = <?php echo $sell_price;?>*a;
	document.getElementById('total').innerHTML = sell;
}
updateTotal(1);
</script>
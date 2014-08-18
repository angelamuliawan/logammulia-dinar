<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
    <div id="content_right">
        <div id="contain">
            <h2>Order Finish</h2>
			  <table>
				<tr>
						<td>Code Order</td>
						<td><b><?php echo $code_order?></b></td>
					</tr>
				<tr>
                    <td>Nama Produk</td>
                    <td><?php echo $produk?></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td>Rp <?php echo number_format($harga); ?></td>
                </tr>
					<tr>
						<td>Qty</td>
						<td><?php echo $qty?></td>
					</tr>
					<tr>
						<td>Total Harga</td>
						<td>Rp <?php echo number_format($total)?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td><?php echo $nama?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $email?></td>
					</tr>
					<tr>
						<td>No HP</td>
						<td><?php echo $produk?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><?php echo $alamat?></td>
					</tr>
					<tr>
						<td>Nomor Rekening</td>
						<td><?php echo $no_rek?></td>
					</tr>
					<tr>
						<td>Atas Nama</td>
						<td><?php echo $an?></td>
					</tr>
					<tr>
						<td>Metode Shipping</td>
						<td><?php echo $shipping?></td>
					</tr>
            </table>
			<b>Notes!</b> Silahkan Transfer sejumlah Rp <?php echo number_format($harga); ?> ke salah satu rekening kami:<br />
			<table>
				<tr>
					<th>Nama Bank</th>
					<th>Nomor Rekening</th>
					<th>Atas Nama</th>
				</tr>
				<?php
					foreach($bank as $row){
						echo "<tr>";
						echo "<td>$row->nama_bank</td>";
						echo "<td>$row->nomor_rekening</td>";
						echo "<td>$row->atas_nama</td>";
						echo "</tr>";
					}
				?>
			</table>
			Jika Sudah, silahkan lakukan konfirmasi via telpon, bbm, atau bisa <a href="<?php echo base_url('product/confirmation')?>" title="Konfirmasi Pembayaran">Disini</a>
        </div>
    </div>
    <div class="clear"></div>
</div>
<script>
function updateTotal(a)
{
	document.getElementById('total').innerHTML =  <?php echo $sell_price;?>*a;
}
updateTotal(1);
</script>
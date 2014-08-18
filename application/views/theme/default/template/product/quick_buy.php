<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
    <div id="content_right">
        <div id="contain">
            <h2>Quick Buy</h2>
			<br />
			<label><b>Produk</b></label><br />
			<select name="produk">
			<?php
				foreach($product as $row){
					echo "<option value='$row->id_product'>$row->name_product</option>";
				}
			?>
			</select><br />
			<label><b>Qty</b></label><br />
			<select name="qty">
			<?php
				for($i=1;$i<=10;$i++){
					echo "<option value='$i'>$i</option>";
				}
			?>
			</select><br />
			<label><b>Metode Pembayaran</b></label><br />
			<select name="shipping">
				<option value="1">COD di Outlet</option>
				<option value="2">Delivery</option>
			</select><br />
			<label><b>Tanggal Dikirim</b></label><br />
			<input type="date" name="tgl_dikirim" />
        </div>
    </div>
    <div class="clear"></div>
</div>
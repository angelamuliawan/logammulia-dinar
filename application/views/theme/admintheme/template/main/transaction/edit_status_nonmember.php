<form method="post" action="">
<article class="module width_full">
    <header><h3>Edit Status Transaksi</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Nama Pembeli</label>
    	<input type="text" value="<?php echo $name;?>" disabled>
		<label style="margin-top:5px">Nama Produk</label>
    	<input type="text" value="<?php echo $name_product;?>" disabled>
		<label style="margin-top:5px">Harga Beli</label>
    	<input type="text" value="<?php echo $harga_beli;?>" disabled>
		<label style="margin-top:5px">Qty</label>
    	<input type="text" value="<?php echo $qty;?>" disabled>
		<label style="margin-top:5px">Total Harga</label>
    	<input type="text" value="<?php echo $total_price;?>" disabled>
        <label style="margin-top:5px">Tanggal Beli</label>
    	<input type="text" value="<?php echo date("D, d M Y",strtotime($date_order));?>" disabled>
		<label style="margin-top:5px">Nomor Rekening</label>
    	<input type="text" value="<?php echo $no_rek;?>" disabled>
		<label style="margin-top:5px">Atas Nama</label>
    	<input type="text" value="<?php echo $an;?>" disabled>
		 <label style="margin-top:5px">Shipping Method</label>
		<?php
			if($shipping ==1) $ship = "COD di Outlet"; else $ship = "Delivery";
		?>
    	<input type="text" value="<?php echo $ship;?>" disabled>
        <label style="margin-top:5px">Status Transaksi</label>
		<div class="clear"></div>
		<?php
			$options = array(
						'' => 'Change Status',
						1 => 'Unpaid',
						2 => 'Paid',
						4 => 'Dikirim / Diambil',
						5 => 'Cancel',
					);
			echo form_dropdown('status',$options,$status);
		?>
		<div class="clear"></div>
	</fieldset>
	</div>
       <footer>
	    <div class="submit_link">
		<input type="submit" value="Save" class="alt_btn">
            </div>
    	</footer>
</article>
<?php
        echo validation_errors();
        ?>
</form>
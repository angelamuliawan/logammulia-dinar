<form method="post" action="">
<article class="module width_full">
    <header><h3>Edit Status Transaksi</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Nama Pembeli</label>
    	<input type="text" value="<?php echo $result['name'];?>" disabled>
		<label style="margin-top:5px">Nama Produk</label>
    	<input type="text" value="<?php echo $result['name_product'];;?>" disabled>
		<label style="margin-top:5px">Harga Beli</label>
    	<input type="text" value="<?php echo $result['harga_pas_beli'];?>" disabled>
		<label style="margin-top:5px">Qty</label>
    	<input type="text" value="<?php echo $result['qty'];?>" disabled>
		<label style="margin-top:5px">Total Harga</label>
    	<input type="text" value="<?php echo number_format($result['total_price']);?>" disabled>
        <label style="margin-top:5px">Tanggal Beli</label>
    	<input type="text" value="<?php echo date("D, d M Y",strtotime($result['date_order']));?>" disabled>
        <label style="margin-top:5px">Status Transaksi</label>
		<div class="clear"></div>
		<?php
			$options = array(
						'' => 'Change Status',
						2 => 'Paid',
						3 => 'Paid (Confirm)',
					);
			echo form_dropdown('status',$options,$result['status_order']);
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
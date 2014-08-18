<form method="post" action="">
<article class="module width_full">
    <header><h3>Edit Status Transaksi</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Nama Penjual</label>
    	<input type="text" value="<?php echo $result['name'];?>" disabled>
		<label style="margin-top:5px">Nama Produk</label>
    	<input type="text" value="<?php echo $result['name_product'];?>" disabled>
		<label style="margin-top:5px">Harga Jual</label>
    	<input type="text" value="<?php echo $result['harga_beli'];?>" disabled>
		<label style="margin-top:5px">Qty</label>
    	<input type="text" value="<?php echo $result['qty'];?>" disabled>
		<label style="margin-top:5px">Total Harga</label>
    	<input type="text" value="<?php echo $result['qty']*$result['harga_pas_jual'];?>" disabled>
        <label style="margin-top:5px">Tanggal Jual</label>
    	<input type="text" value="<?php echo date("D, d M Y",strtotime($result['date_jual']));?>" disabled>
        <label style="margin-top:5px">Tanggal Daimbil atau Dikirim</label>
    	<input type="text" value="<?php echo date("D, d M Y",strtotime($result['date_diambil']));?>" disabled>
        <label style="margin-top:5px">Shipping</label>
    	<input type="text" value="<?php if($result['shipping']==1) echo "Ketemu di Stand"; else echo "Delivery";?>" disabled>
        <label style="margin-top:5px">Status Transaksi</label>
		<div class="clear"></div>
		<?php
			$options = array(
						'' => 'Change Status',
						1 => 'Ajukkan Jual',
						2 => 'Terjual',
						3 => 'Batal'
					);
			echo form_dropdown('status',$options,$result['status_jual']);
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
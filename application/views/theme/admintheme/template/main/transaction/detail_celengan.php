<article class="module width_full">
    <header><h3>Edit Detail Celengan</h3></header>
		<?php 
			echo form_open('');
		?>
		<div class="module_content">
		<fieldset>
		<input type="hidden" name="id_celengan" value="<?php echo $results['id_celengan']?>">
		<input type="hidden" name="balance" value="<?php echo $results['balance']?>">
			<label>Uang yang Terpakai</label>
				<input type="text" value="<?php echo $results['balance'];?>" disabled>
			<label>Terpakai Untuk</label>
				<input type="text" value="<?php if($results['status_celengan_detail']==2) echo "Beli ".$results['name_product'];
					else if($results['status_celengan_detail']==7) echo "Convert ".$results['name_product']." Ke Rupiah";
				?>" disabled>
			<label style="margin-top:5px">Tanggal Transaksi</label>
				<input type="text"  value="<?php echo date("D, d-M-Y",strtotime($results['date_celengan_detail']));?>" disabled>
			<label style="margin-top:5px">Jam Transaksi</label>
				<input type="text"  value="<?php echo date("H:i",strtotime($results['date_celengan_detail']));?>" disabled>
		</fieldset>
		</div>
		</form>
</article>
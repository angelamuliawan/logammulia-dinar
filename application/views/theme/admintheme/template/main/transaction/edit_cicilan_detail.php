<article class="module width_full">
    <header><h3>Edit Detail Cicilan</h3></header>
		<?php 
			echo form_open('');
		?>
		<div class="module_content">
		<fieldset>
			<label>Nama Pemesan</label>
				<input type="text" value="<?php echo $results['name'];?>" disabled>
			<label style="margin-top:5px">Username</label>
				<input type="text" value="<?php echo $results['username'];?>" disabled>
			<label style="margin-top:5px">Nama Produk</label>
				<input type="text" value="<?php echo $results['name_product'];?>" disabled>
			<label style="margin-top:5px">Cicilan Pokok</label>
				<input type="text"  value="<?php echo "Rp. ".number_format($results['harga_pas_beli']/$results['jangka_waktu']);?>" disabled>
			<label style="margin-top:5px">Biaya Titip</label>
				<input type="text"  value="<?php echo "Rp. ".number_format($results['biaya_titip']);?>" disabled>
			<label style="margin-top:5px">Total</label>
				<input type="text"  value="<?php 
				if($plus == TRUE)
					echo "Rp. ".number_format($results['biaya_titip']+($results['harga_pas_beli']/$results['jangka_waktu'])+100000);
				else
					echo "Rp. ".number_format($results['biaya_titip']+($results['harga_pas_beli']/$results['jangka_waktu']));
				?>" disabled>
			<label style="margin-top:5px">Jatuh Tempo</label>
				<input type="text"  value="<?php echo date("D, d-M-Y",strtotime($results['date_jatuh_tempo']));?>" disabled>
		</fieldset>
		</div>
		<footer>
	    <div class="submit_link">
                <?php
                    $options = array(
                                1 => 'Belum Transfer',
                                2 => 'Sudah Transfer'
                                );
                  echo form_dropdown('status', $options,$results['status_cicilan']);
                ?>
		<input type="submit" value="Save" class="alt_btn">
            </div>
    	</footer>
		</form>
</article>
<article class="module width_full">
    <header><h3>Edit Detail Cicilan</h3></header>
		<?php 
			echo form_open('');
		?>
		<div class="module_content">
		<fieldset>
			<label>Nama Pemesan</label>
				<input type="text" value="<?php echo $results['name'];?>" disabled>
				<input type="hidden" name="id_simpan" value="<?php echo $results['id_simpan'];?>">
			<label style="margin-top:5px">Username</label>
				<input type="text" value="<?php echo $results['username'];?>" disabled>
			<label style="margin-top:5px">Produk</label>
				<input type="text" value="<?php echo $results['name_product'];?>" disabled>
				<input type="hidden" name="product" value="<?php echo $results['id_product'];?>">
			<label style="margin-top:5px">Qty</label>
				<input type="text" value="<?php echo $results['qty'];?>" disabled>
				<input type="hidden" name="qty" value="<?php echo $results['qty'];?>">
			<label style="margin-top:5px">Tanggal Mulai</label>
				<input type="text"  value="<?php echo date("D, d-M-Y",strtotime($results['date_simpan']));?>" disabled>
			<label style="margin-top:5px">Tanggal Selesai</label>
				<input type="text"  value="<?php echo date("D, d-M-Y",strtotime($results['date_akhir']));?>" disabled>
		</fieldset>
		</div>
		<footer>
	    <div class="submit_link">
                <?php
					if($results['status_simpan_detail']==1||$results['status_simpan_detail']==2)
                    $options = array(
                                1 => 'Mengajukkan Simpan',
                                2 => 'Disimpan'
                                );
					else
                    $options = array(
                                3 => 'Mengajukkan Lepas',
                                4 => 'Dilepas'
                                );
					
                  echo form_dropdown('status', $options,$results['status_simpan_detail']);
                ?>
		<input type="submit" value="Save" class="alt_btn">
            </div>
    	</footer>
		</form>
</article>
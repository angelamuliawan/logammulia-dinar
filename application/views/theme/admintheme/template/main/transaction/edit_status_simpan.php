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
			<label style="margin-top:5px">Tanggal Mulai</label>
				<input type="text"  value="<?php echo date("D, d-M-Y",strtotime($results['date_simpan']));?>" disabled>
			<label style="margin-top:5px">Tanggal Selesai</label>
				<input type="text"  value="<?php echo date("D, d-M-Y",strtotime($results['date_akhir']));?>" disabled>
		</fieldset>
		</div>
		<footer>
	    <div class="submit_link">
                <?php
                    $options = array(
                                0 => 'Non Aktif',
                                1 => 'Aktif',
                                2 => 'Belum Transfer'
                                );
                  echo form_dropdown('status', $options,$results['status_simpan']);
                ?>
		<input type="submit" value="Save" class="alt_btn">
            </div>
    	</footer>
		</form>
</article>
<article class="module width_full">
    <header><h3>Edit Detail Celengan</h3></header>
		<?php 
			echo form_open('');
		?>
		<div class="module_content">
		<fieldset>
		<input type="hidden" name="id_celengan" value="<?php echo $results['id_celengan']?>">
		<input type="hidden" name="balance" value="<?php echo $results['balance']?>">
			<label>Balance Top Up</label>
				<input type="text" value="<?php echo $results['balance'];?>" disabled>
			<label style="margin-top:5px">Tanggal Top Up</label>
				<input type="text"  value="<?php echo date("D, d-M-Y",strtotime($results['date_celengan_detail']));?>" disabled>
		</fieldset>
		</div>
		<footer>
	    <div class="submit_link">
                <?php
					if($results['status_celengan_detail'] == 0 || $results['status_celengan_detail'] == 1 || $results['status_celengan_detail'] == 5){
                    $options = array(
                                0 => 'Belum Transfer',
                                1 => 'Sudah Transfer',
                                5 => 'Batal Transfer'
                                );
					}
					else{
						echo "Dicairkan : ";
						 $options = array(
                                3 => 'Not Yet Transfer',
                                4 => 'Transfered',
                                );
					}
                  echo form_dropdown('status', $options,$results['status_celengan_detail']);
                ?>
		<input type="submit" value="Save" class="alt_btn">
            </div>
    	</footer>
		</form>
</article>
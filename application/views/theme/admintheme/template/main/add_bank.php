<form method="post" action="">
<article class="module width_full">
    <header><h3>Configuration</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Nama Bank*</label>
    		<input type="text" name="nama" value="<?php echo set_value('nama');?>">
                <label style="margin-top:5px">Nomor Rekening</label>
    		<input type="text" name="no_rek" value="<?php echo set_value('no_rek');?>">
		<label style="margin-top:5px">Atas Nama</label>
    		<input type="text" name="atas_nama" value="<?php echo set_value('atas_nama');?>">
	</fieldset>
                * = must be filled
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
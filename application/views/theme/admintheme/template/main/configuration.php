<form method="post" action="">
<article class="module width_full">
    <header><h3>Configuration</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Title*</label>
    		<input type="text" name="title" value="<?php echo $title;?>">
                <label style="margin-top:5px">Rekening Bank (Admin)*</label>
    		<input type="text" name="no_rek" value="<?php echo $rek;?>">
		<label style="margin-top:5px">Description Website</label>
		<textarea id="elm1" rows="12" name="desc"><?php echo $desc;?></textarea>
		<label style="margin-top:5px">Favicon</label>
    		<input type="text" name="favicon" value="<?php echo $favicon;?>">
		<label style="margin-top:5px">Email Default Website*</label>
    		<input type="text" name="email" value="<?php echo $email;?>">
                <label style="margin-top:5px">Footer*</label>
    		<input type="text" name="footer" value="<?php echo $footer;?>">
        <label style="margin-top:5px">Biaya Titip Cicilan</label> 
    		<input type="text" name="margin" value="<?php echo $margin; // biaya titip kalau di databasenya namanya margin_default?>">
        <label style="margin-top:5px">Biaya Titip Gadai</label> 
    		<input type="text" name="gadai" value="<?php echo $titip_gadai;?>">
        <label style="margin-top:5px">Biaya Administratsi Cicilan</label> 
    		<input type="text" name="cicilan" value="<?php echo $cicilan;?>">
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
<form method="post" action="">
<article class="module width_full">
    <header><h3>Add New Gadai</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Username*</label>
    		<input type="text" name="username" value="<?php echo set_value("username");?>">
		<label style="margin-top:5px">No ID Emas*</label>
    		<input type="text" name="no_id" value="<?php echo set_value("no_id");?>">
		<label style="margin-top:5px">Tanggal Sertifikat*
    		<input type="date" name="tanggal_sertifikat" value="<?php echo set_value("tanggal_sertifikat");?>"></label>
			<div class="clear"></div><br />
		<label style="margin-top:5px">Gram*</label>
    		<input type="number" name="gram" min=1 value="<?php echo set_value("gram");?>">
		<label style="margin-top:5px">Nilai Taksiran*</label>
    		<input type="number" name="nilai_taksiran" min=0 value="<?php echo set_value("nilai_taksiran");?>">
		<label style="margin-top:5px">Jangka Waktu (Bulan)*</label>
    		<input type="number" name="month" min=1 value="<?php echo set_value("month");?>">	
		<label style="margin-top:5px">Pinjaman*</label>
    		<input type="number" name="pinjaman" min=1 value="<?php echo set_value("pinjaman");?>">
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
			if(isset($save)){
				switch($save){
					case 1:
					echo "<h4 class=\"alert_warning\">You've Successfully added Gadai</h4>";
					break;
					case 2:
					echo "<h4 class=\"alert_warning\">Username Not Found</h4>";
					break;
				}
			}
        ?>
</form>
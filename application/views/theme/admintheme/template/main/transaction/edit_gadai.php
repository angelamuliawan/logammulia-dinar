<form method="post" action="">
<article class="module width_full">
    <header><h3>Edit Gadai</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Username*</label>
    		<input type="text" name="username" value="<?php echo $result['username'];?>" disabled>
		<label style="margin-top:5px">No ID Emas*</label>
    		<input type="text" name="no_id" value="<?php echo $result['no_id_emas'];?>">
		<label style="margin-top:5px">Tanggal Sertifikat*</label>
    		<input type="text" name="tanggal_sertifikat" value="<?php echo $result['tanggal_sertifikat'];?>" disabled>
		<label style="margin-top:5px">Tanggal Mulai Gadai*</label>
    		<input type="text" name="tanggal_sertifikat" value="<?php echo date("D, d/M/Y",strtotime($result['date_gadai']));?>" disabled>
		<label style="margin-top:5px">Gram*</label>
    		<input type="number" name="gram" min=1 value="<?php echo $result['gram_gadai'];?>">
		<label style="margin-top:5px">Nilai Taksiran*</label>
    		<input type="number" name="nilai_taksiran" min=0 value="<?php echo $result['nilai_taksiran'];?>">
		<label style="margin-top:5px">Jangka Waktu (Bulan)*</label>
    		<input type="number" name="month" min=1 value="<?php echo $result['jangka_waktu'];?>">	
		<label style="margin-top:5px">Pinjaman*</label>
    		<input type="number" name="pinjaman" min=1 value="<?php echo $result['pinjaman'];?>">
        <label style="margin-top:5px">Biaya Titip*</label>
    		<input type="number" name="biaya_titip" min=1 value="<?php echo $biaya_titip;?>" disabled="disabled">    
		<label style="margin-top:5px">Cicilan yang Sudah dilunasin*</label>
    		<input type="number" name="cicilan" min=0 value="<?php echo $result['cicilan_lunas'];?>"><br />
		<label style="margin-top:5px">Sisa Tagihan</label>
    		<input type="number" name="sisa_tagihan" min=0 value="<?php echo ($result['pinjaman']+$biaya_titip)-$result['cicilan_lunas'];?>" disabled="disabled">
        </fieldset>
                * = must be filled
	</div>
        <footer>
	    <div class="submit_link">
		<?php
			$options = array(1=>'Tergadaikan',2=>'Ditebus');
			echo form_dropdown('status',$options,$result['status_gadai']);
		?>
		<input type="submit" value="Save" class="alt_btn">
            </div>
    	</footer>
</article>
<?php
        echo validation_errors();
			if(isset($save)){
				switch($save){
					case 1:
					echo "<h4 class=\"alert_warning\">You've Successfully edited Gadai. Please Wait We'll redirect you.</h4>";
					?>
					<meta http-equiv="refresh" content="2; url=<?php echo base_url('adminpanel/transaction/gadai')?>">
					<?php
					break;
					case 2:
					echo "<h4 class=\"alert_warning\">Username Not Found</h4>";
					break;
				}
			}
        ?>
</form>
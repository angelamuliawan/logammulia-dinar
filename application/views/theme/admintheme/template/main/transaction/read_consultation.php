<form method="post" action="">
<article class="module width_full">
    <header><h3>Read & Reply Consultation</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Pengirim</label>
    	<input type="text" value="<?php echo $result['name'];?>" disabled>
		<label style="margin-top:5px">Subjet</label>
    	<input type="text" value="<?php echo $result['subject'];?>" disabled>
		<label style="margin-top:5px">Konsultasi</label>
		<textarea disabled><?php echo $result['konsultasi'];?></textarea>
		<label style="margin-top:25px">Quick Reply:</label>
		<textarea rows="5" name="reply"><?php echo set_value('reply');if($result2 != FALSE) echo $result2['jawaban']?></textarea>
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
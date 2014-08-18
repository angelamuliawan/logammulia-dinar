<form method="post" action="">
<article class="module width_full">
    <header><h3>Edit Comment</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Name*</label>
    		<input type="text" name="name_comment" value="<?php echo $result['name_comment'];?>" disabled>
		<label>Email*</label>
    		<input type="text" name="email" value="<?php echo $result['email'];?>" disabled>
		<label style="margin-top:5px">Comment*</label>
		<textarea id="elm1" rows="12" name="comment"><?php echo $result['comment'];?></textarea>
	</fieldset>
                * = must be filled
	</div>
        <footer>
	    <div class="submit_link">
                <?php
                    $options = array(
                                1 => 'Unmoderated',
                                2 => 'Publish',
                                3 => 'Spam'
                                );
                  echo form_dropdown('status', $options,$result['status_comment']);
                ?>
		<input type="submit" value="Save" class="alt_btn">
            </div>
    	</footer>
</article>
<?php
        echo validation_errors();
        ?>
</form>
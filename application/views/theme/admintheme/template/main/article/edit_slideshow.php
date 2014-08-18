<form method="post" action="">
<article class="module width_full">
    <header><h3>Edit Slideshow</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Title*</label>
    		<input type="text" name="title" value="<?php echo $title;?>">
		<label style="margin-top:5px">Image Slideshow*</label>
    		<input type="text" name="img" value="<?php echo $img;?>">
		<label style="margin-top:5px">Link URL*</label>
    		<input type="text" name="url" value="<?php echo $url;?>">
		<label style="margin-top:5px">Sort Order*</label>
    		<input type="text" name="sort" value="<?php echo $sort;?>">
	</fieldset>
                * = must be filled
	</div>
        <footer>
	    <div class="submit_link">
				<b>Status</b> : 
                <?php
                    $options = array(
								'' => 'Select Status',
                                1 => 'Draft',
                                2 => 'Publish'
                                );
                  echo form_dropdown('status', $options,$status);
                ?>
		<input type="submit" value="Save" class="alt_btn">
            </div>
    	</footer>
</article>
<?php
        echo validation_errors();
        ?>
</form>
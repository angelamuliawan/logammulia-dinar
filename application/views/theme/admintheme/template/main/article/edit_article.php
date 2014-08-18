<form method="post" action="">
<article class="module width_full">
    <header><h3>Edit Article</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Title*</label>
    		<input type="text" name="title" value="<?php echo $title;?>">
		<label style="margin-top:5px">Content*</label>
		<textarea id="elm1" rows="12" name="content"><?php echo $content;?></textarea>
	</fieldset>
                * = must be filled
	</div>
        <footer>
	    <div class="submit_link">
                <?php
                    $options = array(
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
        if(!empty($_POST['title']) and !empty($_POST['content']))
        echo "<h4 class=\"alert_warning\">Artikel berhasil disimpan</h4>";
        ?>
</form>
<form method="post" action="">
<article class="module width_full">
    <header><h3>Configuration</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Title Links*</label>
    		<input type="text" name="title" value="<?php echo set_value('title');?>">
                <label style="margin-top:5px">Links*</label>
    		<input type="text" name="links" value="<?php echo set_value('links');?>">
		<label style="margin-top:5px">Sort Order*</label>
    		<input type="number" name="sort" value="<?php echo set_value('sort');?>">
	</fieldset>
                * = must be filled
	</div>
        <footer>
	    <div class="submit_link">
		<?php
			$options = array(''=>'Select Status',1=>'Active',2=>'Nonactive');
			echo form_dropdown('status',$options,set_value('status'));
		?>
		<input type="submit" value="Save" class="alt_btn">
            </div>
    	</footer>
</article>
<?php
        echo validation_errors();
        ?>
</form>
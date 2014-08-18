<form method="post" action="">
<article class="module width_full">
    <header><h3>Add News Product</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Product Name*</label>
    		<input type="text" name="name_product" value="<?php echo set_value('name_product');?>">
		<label style="margin-top:5px">Stock*</label>
    	<input type="text" name="stock" value="<?php echo set_value('stock');?>">
		<label style="margin-top:5px">Berat (gram)*</label>
    	<input type="text" name="gram" value="<?php echo set_value('gram');?>">
        <label style="margin-top:5px">Harga Dasar*</label>
    	<input type="text" name="base_price" value="<?php echo set_value('base_price');?>">
		<label style="margin-top:5px">Description</label>
		<textarea id="elm1" rows="12" name="desc"><?php echo set_value('desc');?></textarea>
		<label style="margin-top:5px">Sort Order</label>
    		<input type="text" name="sort_order" value="<?php echo set_value('sort_order');?>">
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
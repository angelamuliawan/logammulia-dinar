<form method="post" action="">
<article class="module width_full">
    <header><h3>Edit Product</h3></header>
        <div class="module_content">
	<fieldset>
                <input type="hidden" name="base_price" value="<?php echo $base_price;?>">
		<label>Product Name*</label>
    		<input type="text" name="name_product" value="<?php echo $name_product;?>" disabled>
                <label style="margin-top:5px">Harga Dasar*</label>
    		<input type="text" name="base_price" value="<?php echo $base_price;?>"  disabled>
		<label style="margin-top:5px">Margin*</label>
    		<input type="text" name="margin" value="<?php echo $margin;?>">
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
<form method="post" action="">
<article class="module width_full">
    <header><h3>Edit Product</h3></header>
        <div class="module_content">
	<fieldset>
	<?php if($this->session->userdata('permission_admin') == 1 || $this->session->userdata('permission_admin') == 2){?>
		<label>Product Name*</label>
    	<input type="text" name="name_product" value="<?php echo $name_product;?>">
		<label style="margin-top:5px">Stock*</label>
    	<input type="text" name="stock" value="<?php echo $stock;?>">
		<label style="margin-top:5px">Berat (gram)*</label>
    	<input type="text" name="gram" value="<?php echo $gram;?>">
        <label style="margin-top:5px">Harga Dasar*</label>
    	<input type="text" name="base_price" value="<?php echo $base_price;?>">
		<label style="margin-top:5px">Description</label>
		<textarea id="elm1" rows="12" name="desc"><?php echo $desc;?></textarea>
		<label style="margin-top:5px">Sort Order</label>
    		<input type="text" name="sort_order" value="<?php echo $sort;?>">
		<?php
			}
		else{
		?>
		<label>Product Name*</label>
    	<input type="text" value="<?php echo $name_product;?>" disabled>
    	<input type="hidden" name="name_product" value="<?php echo $name_product;?>">
		<label style="margin-top:5px">Stock*</label>
    	<input type="text" value="<?php echo $stock;?>" disabled>
    	<input type="hidden" name="stock" value="<?php echo $stock;?>">
		<label style="margin-top:5px">Berat (gram)*</label>
    	<input type="text" value="<?php echo $gram;?>" disabled>
		<input type="hidden" name="gram" value="<?php echo $gram;?>">
        <label style="margin-top:5px">Harga Dasar*</label>
    	<input type="text" name="base_price" value="<?php echo $base_price;?>">
		<label style="margin-top:5px">Description</label>
		<textarea id="elm1" rows="12" name="desc"><?php echo $desc;?></textarea>
		<label style="margin-top:5px">Sort Order</label>
    		<input type="text"  value="<?php echo $sort;?>" disabled>
		<input type="hidden" name="sort_order" value="<?php echo $sort;?>">
		<?php
			}
		?>
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
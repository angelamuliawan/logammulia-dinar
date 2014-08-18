<form method="post" action="">
<article class="module width_full">
    <header><h3>Add New Back Office</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Username*</label>
    		<input type="text" name="username" value="<?php echo set_value("username");?>">
		<label style="margin-top:5px">Name*</label>
    		<input type="text" name="name" value="<?php echo set_value("name");?>">
                <label style="margin-top:5px">Password*</label>
    		<input type="password" name="password">
                <label style="margin-top:5px">Confirm Password*</label>
    		<input type="password" name="confirm">
                <label style="margin-top:5px">Email*</label>
    		<input type="text" name="email" value="<?php echo set_value("email");?>">
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
        if(!empty($_POST['username']) && $this->form_validation->run())
        echo "<h4 class=\"alert_warning\">Back Office berhasil ditambahkan</h4>";
        ?>
</form>
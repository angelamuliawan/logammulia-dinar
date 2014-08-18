<form method="post" action="">
<article class="module width_full">
    <header><h3>Add New User</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Username*</label>
    		<input type="text" name="username" value="<?php echo set_value("username");?>">
                <label style="margin-top:5px">Password*</label>
    		<input type="password" name="password">
                <label style="margin-top:5px">Confirm Password*</label>
    		<input type="password" name="confirm">
                <label>Name*</label>
    		<input type="text" name="name" value="<?php echo set_value("name");?>">
                <label style="margin-top:5px">Email*</label>
    		<input type="text" name="email" value="<?php echo set_value("email");?>">
		<label style="margin-top:5px">Address*</label>
		<textarea id="elm1" rows="12" name="address"><?php echo set_value("address");?></textarea>
                <label style="margin-top:5px">Gender*</label><div class="clear"></div>
                <?php
                    $options = array(
                                1 => 'Male',
                                2 => 'Female'
                                );
                  echo form_dropdown('gender', $options,set_value('gender'));
                ?><div class="clear"></div>
                <label style="margin-top:5px">Status User*</label><div class="clear"></div>
                <?php
                    $options = array(
                                1 => 'Active',
                                0 => 'Nonactive'
                                );
                  echo form_dropdown('status', $options,set_value('status'));
                ?><div class="clear"></div>
                <label style="margin-top:5px">Account Number</label>
    		<input type="text" name="account" value="<?php echo set_value("account");?>">
                <label style="margin-top:5px">Atas Nama</label>
    		<input type="text" name="atas_nama" value="<?php echo set_value("atas_nama");?>">
                <label style="margin-top:5px">Phone Number</label>
    		<input type="text" name="no_hp" value="<?php echo set_value("no_hp");?>">
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
        echo "<h4 class=\"alert_warning\">User berhasil ditambahkan</h4>";
        ?>
</form>
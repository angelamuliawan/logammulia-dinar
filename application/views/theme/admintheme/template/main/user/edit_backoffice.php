<form method="post" action="">
<article class="module width_full">
    <header><h3>Edit Back Office</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Username*</label>
    		<input type="text" name="username" value="<?php echo $username;?>">
		<label style="margin-top:5px">Name*</label>
    		<input type="text" name="name" value="<?php echo $name;?>">
                <label style="margin-top:5px">Password</label>
    		<input type="password" name="password">
                <label style="margin-top:5px">Confirm Password</label>
    		<input type="password" name="confirm">
                <label style="margin-top:5px">Email*</label>
    		<input type="text" name="email" value="<?php echo $email;?>">
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
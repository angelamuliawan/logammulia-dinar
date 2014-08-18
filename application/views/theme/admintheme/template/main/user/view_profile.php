<form method="post"
    <?php
        if($permission == 0) echo "action=".base_url()."adminpanel/user/edit_backoffice/".$this->uri->segment(4);
        else echo "action=".base_url()."adminpanel/user/edit_admin/".$this->uri->segment(4);
    ?>
>_
<article class="module width_full">
    <header><h3>View Profile</h3></header>
        <div class="module_content">
	<fieldset>
		<label>Username</label>
    		<input type="text" name="username" value="<?php echo $username;?>" disabled>
		<label style="margin-top:5px">Name</label>
    		<input type="text" name="name" value="<?php echo $name;?>" disabled>
                <label style="margin-top:5px">Email</label>
    		<input type="text" name="email" value="<?php echo $email;?>" disabled>
        </fieldset>
                * = must be filled
	</div>
        <footer>
	    <div class="submit_link">
		<input type="submit" value="Edit Profile" class="alt_btn">
            </div>
    	</footer>
</article>
</form>
<form method="post" action="">
<article class="module width_full">
    <header><h3>Login Admin Panel</h3></header>
    <div class="module_content">
	<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
            <label>Username</label>
	    <input type="text" style="width:92%;" name="username" value="<?php echo set_value("username");?>">
            <label style="margin-top:5px;">Password</label>
	    <input type="password" style="width:92%;" name="password">
	</fieldset>
        <div class="clear"></div>
    </div>
    <footer>
	<div class="submit_link">
            <input type="submit" value="Login" class="alt_btn">
        </div>
        <div class="clear"></div>
    </footer>
</article>
        <?php
        echo validation_errors();
        if(!empty($_POST['username']) and !empty($_POST['password']))
        echo "<h4 class=\"alert_warning\">Username atau Password tidak ditemukan</h4>";
        ?>
</form>
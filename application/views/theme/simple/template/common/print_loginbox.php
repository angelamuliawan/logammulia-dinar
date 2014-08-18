<div id="loginbox">
<p align="right" style="padding-right:10px;"><a href="#" onClick="document.getElementById('loginbox_ready').id = 'loginbox'">Close</a></p>
<h2 style="margin-left:20px">Login</h2>
<form method="post" action="<?php echo base_url('member/member/login')?>" name="formLogin">
<table style="margin-left:20px;">
<tr>
<td>Username</td><td><input type="text" name="txtId" class="txt" placeholder="Masukkan username" style="width:100%;" value="<?php echo $id?>"></td>
</tr>
<tr>
<td width="50%">Password</td><td width="50%"><input type="password" name="txtPass" class="txt" placeholder="Masukkan password" style="width:100%;"></td>
</tr>
<tr>
<td><input type="submit" style="visibility:hidden; width:0; height:0"></td>
<td align="right"><br/><a href="#" onClick="document.formLogin.submit()"><div style="margin-left:10px;" id="submit">Login</div></a></td>
</tr>
</table>
<div id="output">
<?php 
	if($msg!="")
	{
		echo $msg;
		?><script>document.getElementById('loginbox').id = 'loginbox_ready';</script><?php
	}
?>

</div>
</form>
</div>
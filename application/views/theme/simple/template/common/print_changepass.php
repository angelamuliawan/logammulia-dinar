<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view('theme/default/template/common/print_header_element');?>

</head>

<body>
<?php  $this->load->view('theme/default/template/common/print_header');?>
<div id="body">
<h1>Change password</h1>
<?php echo $error;?>
<form action="<?php echo base_url('member/member/updatePass')?>" method="post">
<table>
<tr>
<input type="hidden" value="<?php echo $username?>" name="txtUsername" />
<input type="hidden" value="<?php echo $actcode?>" name="txtCode" />
<td>Password baru</td>
<td><input type="password" name="txtNewPass"></td>
</tr>
<tr>
<td>Konfirmasi Password</td>
<td><input type="password" name="txtConPass"></td>
</tr>
<tr>
<td colspan="2" align="right">
<input type="submit" value="Change password" />
</td>
</tr>
</table>
</form>
</div>
</body>
</html>
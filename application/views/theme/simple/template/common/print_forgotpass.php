<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view('theme/default/template/common/print_header_element');?>
</head>

<body>
<?php  $this->load->view('theme/default/template/common/print_header');?>
<div id="body">
<h1>Forgot password</h1>
<?php echo $error;?>
<form action="<?php echo base_url('member/member/forgotpassConfirm')?>" method="post">
<table>
<tr>
<td>Your email</td>
<td><input type="text" class="txt" name="txtEmail"></td>
<td><input type="submit" value="Send new activation code"></td>
</tr>
</table>
</form>
</div>
</body>
</html>
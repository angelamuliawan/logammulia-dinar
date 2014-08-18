<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view('theme/default/template/common/print_header_element');?>
</head>

<body>
<?php  $this->load->view('theme/default/template/common/print_header');?>
<div id="body">
<h1>Account Activation</h1>
<?php echo $error;?>
<form action="<?php echo base_url('member/member/checkCode');?>" method="post">
  <table>
<tr>
<td>Username</td>
<td>
<input type="text" class="txt" value="<?php echo $username?>" name="txtUsername" readonly="readonly"/>
</td>
<td>
</td>
</tr>
<tr>
<td>Activation Code</td>
<td><input type="password" class="txt" name="txtCode" /></td>
</tr>
<tr>
<td colspan="2" align="right">
<input type="submit" value="Activate my account" />
</td>
</tr>
</table>
</form>
</div>
</body>
</html>
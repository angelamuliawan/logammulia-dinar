<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view('theme/default/template/common/print_header_element')?>
</head>

<body>
<?php $this->load->view('theme/default/template/common/print_topbanner')?>
<?php $data['menu']=1;?>
<?php $this->load->view('theme/default/template/common/print_header')?>
<?php $this->load->view('theme/default/template/common/print_menubar', $data)?>
<?php $this->load->view('theme/default/template/common/print_infobar')?>
<?php $this->load->view('theme/default/template/common/print_body')?>
<!--Footer ada di view print body -->
</body>
</html>
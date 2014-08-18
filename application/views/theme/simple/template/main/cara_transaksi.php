<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view('theme/default/template/common/print_header_element')?>
</head>

<body>
<?php $this->load->view('theme/default/template/common/print_topbanner')?>

<?php $data['menu']=2;?>
<?php $this->load->view('theme/default/template/common/print_header')?>
<?php $this->load->view('theme/default/template/common/print_menubar',$data)?>
<div id="body" style="font-size:16px">
<h1 style="margin-left:10px">Cara Transaksi</h1>
<p style="margin-left:10px">
Berikut adalah cara bertransaksi di Tamar Gold Shop<br/>
1. Anda dapat mengecek harga jual produk kami di menu 'Home' atau melalui menu 'Harga Jual'<br/>
2. Anda dapat langsung memesan produk tersebut melalui menu yang tersedia<br/>
3. Anda dapat membayar secara tunai (melalui transfer) atau dengan cicilan bulanan<br/>
4. Untuk program cicilan, SIMPAN, Celengan Emas, dan Gadai, anda diwajibkan untuk melakukan registrasi<br/>
   di web ini<br/>
5. ...lainnya
</p>
</div>
<?php $this->load->view('theme/default/template/common/print_footer')?>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view('theme/default/template/common/print_header_element')?>
</head>

<body>
<?php $this->load->view('theme/default/template/common/print_header')?>
<?php $this->load->view('theme/default/template/common/print_menubar')?>
<div id="body">
<span id="locationbar">
<a href="<?php echo base_url('harga_jual')?>" style="margin-left:5px; color:#FFF; text-decoration:none;">Harga Jual</a> > <a>Mulai transaksi</a>
</span><br/><br/>
 Anda memilih produk sebagai berikut : <br/>
  <div id="propreview">
    <table width="100%">
      <tr>
        <td height="23" colspan="4" align="center" valign="middle" class="tablerow">PRODUCT ID : <?php echo $pro->id_product?></td>
      </tr>
      <tr>
        <td colspan="2" rowspan="6" align="center" valign="middle">
        <a target="_blank" href="<?php echo base_url($pro->image_product)?>"><img src="<?php echo base_url($pro->image_product)?>" height="140" width="140" class="proimg" alt="<?php echo $pro->name_product?>" /></a>
        </td>
        <td width="33%" height="27" class="tablerow">Nama Produk</td>
        <td width="37%" class="tablerow"> <?php echo $pro->name_product?></td>
      </tr>
      <tr>
        <td class="tablerow">Harga Jual (IDR)</td>
        <td class="tablerow"><?php echo $pro->sell_price?></td>
      </tr>
      <tr>
        <td class="tablerow"><span class="tablerow1">Deskripsi Produk</span></td>
        <td class="tablerow"><span class="tablerow1"><?php echo $pro->description_product?></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="23">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div>
</div>

</div>
<?php $this->load->view('theme/default/template/common/print_footer')?>
</body>

</html>
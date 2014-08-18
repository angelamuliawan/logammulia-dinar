<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view('theme/default/template/common/print_header_element')?>
</head>

<body>
<?php $this->load->view('theme/default/template/common/print_topbanner')?>
<?php $data['menu']=3;?>
<?php $this->load->view('theme/default/template/common/print_header')?>
<?php $this->load->view('theme/default/template/common/print_menubar',$data)?>
<div id="body">
<h1>Harga Jual</h1>
Update <?php echo date('d-m-Y');?> - Showing <?php echo $n?> items - Pages
<select onchange="location.href='<?php echo base_url('harga_jual/pages')?>/'+this.value">
<?php 
for($i=1;$i<=$pagetotal;$i++)
{
	?>
    <option <?php if($pagenumber==$i){echo 'selected=selected';}?> ><?php echo $i;?></option>
    <?php
}
?>
</select>
<div style="overflow:auto; height:300px; width:500px;">
<table border="1">
<th>ID Produk</th><th>Nama Produk</th><th>Harga Jual (IDR)</th><th>Action</th>
<?php
foreach($dataproduk as $pro)
{
	?>
    <tr>
    <td><?php echo $pro->id_product?></td>
    <td><?php echo $pro->name_product?></td>
    <td align="center"><?php echo number_format($pro->sell_price)?></td>
    <td><a href="#" onclick="cekLogin(<?php echo $loginstat;?>,<?php echo $pro->id_product?>)"><div class="buybutton">Beli</div></a></td>
    </tr>
    <?php
}
?>
</table>
</div>
</div>
<?php $this->load->view('theme/default/template/common/print_footer')?>
</body>
<style>
.buybutton
{
	background-color:#F60;
	color:white; text-align:center;
	width:80px; height:auto;
	border-radius:5px;	
}
.buybutton:hover
{
	background-color:#F90;
}
</style>
<script type="text/javascript">
function cekLogin(a, id)
{
	if(a==1)
	{
		location.href = "<?php echo base_url('harga_jual/transaksi_member')?>/"+id;
	}else{
		location.href = "<?php echo base_url('harga_jual/transaksi_nonmember')?>/"+id;
	}
}
</script>
</html>
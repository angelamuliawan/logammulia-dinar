<div id="sidebar" style="float:left; margin-left:140px; margin-top:10px;">
<?php if($loginstat!=1){ ?>
<div id="memberbox">
<b style="margin-left:5px;">Member Corner</b><br/>
<p style="margin-left:5px;">

<a href="#" onClick="document.getElementById('loginbox').id = 'loginbox_ready'; document.getElementById('regisbox_ready').style.zIndex = '0';
document.getElementById('loginbox_ready').style.zIndex = '9'">Login</a> - 
<a href="#" onclick="document.getElementById('regisbox').id = 'regisbox_ready'; document.getElementById('loginbox_ready').style.zIndex = '0';
document.getElementById('regisbox_ready').style.zIndex = '9'">Register</a><br/>
<a href="<?php echo base_url('member/member/forgotpass')?>">Forgot password</a>

</p>
</div>
<?php }?>
<div id="productbox">
<b style="margin-left:5px;">Product Price Quickview</b><br/>
<table style="margin-bottom:5px;">
	<tr>
	<th class="tbheader">Nama Produk</th>
	<th class="tbheader">Harga Jual<a title="Indonesia Rupiah">(Rp)</a></th>
	<th class="tbheader">Tanggal Update</th>
	</tr>
<?php
	foreach($pro as $p)
	{
	$harga_jual = $p->base_price+$p->margin;
		?>
        <tr>
		<td class="tbheader" style="font-size:14px;"><?php echo $p->name_product?></td>
		<td  class="tbheader"><?php echo number_format($harga_jual)?></td>
		<td class="tbheader" style="font-size:14px;">
			<?php
			if($p->date_update == 0) echo date("d M Y H:i",strtotime($p->date_insert));
			else echo date("d M Y H:i",strtotime($p->date_update))
			
			?>
		</td>
        </tr>
        <?php
	}
?>
</table>
</div>
</div>


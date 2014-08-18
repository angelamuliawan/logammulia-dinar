<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
    <div id="content_right">
        <div id="contain">
            <h2><?php echo $name_product?></h2>
            <table>
                <tr>
                    <td>Image</td>
                    <td>
                    <?php
                        if($image != "") echo "<img src=\"$image\" style=\"width:50%\">";
                        else echo "<i>No Image Available</i>";
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td><?php if($stock > 0) echo "Ready"; else echo "Not Ready";?></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><?php if(strlen($desc) == 0) echo "<i>No Description Available</i>"; else echo $desc;?></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td>Rp <?php echo number_format($sell_price); ?></td>
                </tr>
				<tr>
					<td></td>
					<td>
						<?php
							$id = $this->uri->segment(3);
							if($loginstat == 1){
								?>
								<a title="Order Tanpa Login" style="cursor:pointer;" href="<?php echo base_url("product/order_confirmation/$id");?>"><input type="button" value="Beli"></a>
								<?php
							}
							else{
								?>
								<a style="cursor:pointer;" href="<?php echo base_url("product/order_confirmation/$id");?>"><input type="button" value="Beli Tanpa Login"></a> |
								<a href="#" title="login to member area" onclick="document.getElementById('txtusername').focus();">Login</a> |
								<a title="Register" href="<?php echo base_url('member/register')?>">Register</a>
								<?php
							}
						?>
					</td>
				</tr>
            </table>
			<b>Notes :</b> Jika anda ingin membeli produk dengan metode pembayaran cicilan silahkan login atau daftar terlebih dahulu.
        </div>
    </div>
    <div class="clear"></div>
</div>
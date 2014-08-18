<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Ambil Emas</h2>
            
			<?php echo form_open(''); ?>
            <table>
            <tr>
				<td><b>Pilih Gold yang mau diambil</b>  : </td>
				<td><select name='product' class="txt">
				<?php
				if($gold!=0){
					foreach($gold as $row){
						echo "<option value='$row->id_product'>$row->name_product | Qty: $row->qty</option>";
					}
				}
				else echo "<option value=''>Gold Not Found</option>";
				?>
			</select></td>
            </tr>
            <tr>
				<td><b>Qty</b></td>
				<td><input type="number" name="qty" min=1 max=100 value="<?php echo set_value('qty');?>"/></td>
            <tr>
				<td></td>
				<td><input type="submit" value="Ambil"></td>
                </tr>
			</form>
			<?php
					if(isset($ambil)){
						if($ambil=="not_found"){
							echo "<font color='#ff0000'>Produk Tidak Ada dalam Gold List anda</font>";
						}
						else if($ambil=="success"){
							echo "<font color='#008000'>Anda berhasil mengajukkan lepas emas. Silahkan mengunjungi Outlet Kami agar bisa mengambil Emas Anda</font>";
						}
						else if($ambil=="stock"){
							echo "<font color='#ff0000'>Maaf, qty ambil anda melibihi qty simpan anda</font>";
						}
					}
				echo "<div id=\"errordiv\">".validation_errors()."</div>";
			?>
             </table>
      </div>
    </div>
    <div class="clear"></div>
</div>
<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Cairkan Saldo</h2>
            
			<?php echo form_open(''); ?>
			<input type="hidden" name="id_simpan" value="<?php echo $simpan['id_simpan']?>" />
            <table>
            <tr>
				<td><b>Produk yang Ingin Disimpan</b>  : </td>
				<td><select name='product' class="txt">
				<?php
					foreach($results_product as $row){
						if($row->id_product == $product)
						echo "<option value='$row->id_product' selected='selected'>$row->name_product</option>";
						else
						echo "<option value='$row->id_product'>$row->name_product</option>";
					}
				?>
			</select></td>
            </tr>
            <tr>
				<td><b>Qty</b></td>
				<td><input type="number" name="qty" min=1 max=10 value="<?php echo $qty?>"/></td>
            <tr>
				<td></td>
				<td><input type="submit" value="Proses Simpan"></td>
                </tr>
			</form>
            
			<?php
				if($this->form_validation->run() == TRUE && isset($_POST['product'])){
					echo "<div id=\"infodiv\">Anda berhasil Memproses Penyimpanan Emas Anda. Selanjutnya, silahkan untuk menyimpan emasnya ke toko kami.</div>";
				}
				echo "<div id=\"errordiv\">".validation_errors()."</div>";
			?>
            
             </table>
      </div>
    </div>
    <div class="clear"></div>
</div>
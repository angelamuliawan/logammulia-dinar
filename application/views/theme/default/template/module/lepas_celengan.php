<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Convert Gold to Rupiah</h2>
            
			<?php echo form_open(''); ?>
            <table>
            <tr>
				<td><b>Select Product Which to release to Rupiah</b>  : </td>
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
				<td><input type="submit" value="Lepas"></td>
                </tr>
			</form>
			<?php
					if(isset($lepas)){
						if($lepas=="not_found"){
							?>
							<font color="#FF0000"><b>Produk Tidak Ada dalam Gold List anda</b></font>
                            <?php 
						}
						else if($lepas=="success"){
							?>
							<font color="#00FF33"><b>Selamat, Anda Berhasil Sukses mengconvert Gold ke Rupiah.</b></font>
                            <?php
						}
						else if($lepas=="stock"){
							?>
							<font color="#FF0000"><b>Stock Tidak Tersedia</b></font>
                            <?php 
						}
					}
				echo "<div id=\"errordiv\">".validation_errors()."</div>";
			?>
             </table>
      </div>
    </div>
    <div class="clear"></div>
</div>
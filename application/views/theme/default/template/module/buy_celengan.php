<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Generate Gold</h2>
			<table>
			<?php echo form_open('')?>
			<tr><td><b>Your Total Balance :</b></td>
            <td> Rp <?php echo number_format($results_saldo['total_balance'])?></td>
            <tr>
			<td><b>Choose Your Gold Want to Buy using your balance</b></td>
			<td><select name='gold' class="txt">
				<?php
					foreach($results_product as $row){
						if($row->id_product == $gold)
						echo "<option value='$row->id_product' selected='selected'>$row->name_product</option>";
						else
						echo "<option value='$row->id_product'>$row->name_product</option>";
					}
				?>
			</select></td>
            </tr><tr>
			<td>
			<b>Input qty</b></td>
			<td><input type="number" class="txt" name="qty" min="1" max="10" placeholder="Masukkan jumlah"/></td>
            <tr>
			<td colspan="2" align="right"><input type="submit" value="Buy" /></td>
            </tr>
			<?php
				if($this->form_validation->run() == TRUE && isset($_POST['gold'])){
					if($this->session->userdata('error') == TRUE){
						echo "<br /><div id=\"errordiv\">Maaf, saldo anda tidak mencukupi<br/>Note : Saldo minimum setelah transaksi adalah Rp.200.000,-</div>";
					}
					else{
						echo "<br /><div id=\"infodiv\">Terima kasih, anda berhasil melakukan pembelian emas dengan menggunakan Saldo Celengan Anda</div>";
					}
				}
				echo "<div id=\"errordiv\">".validation_errors()."</div>";
			?>
			<br />
			<br />
            </table>
			<a href="<?php echo base_url('product/view_all')?>" target="_blank">Check Price</a>
      </div>
    </div>
    <div class="clear"></div>
</div>
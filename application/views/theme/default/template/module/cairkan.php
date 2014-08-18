<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Cairkan Saldo</h2>
            
			<?php echo form_open(''); ?>
			
            <table>
            <tr>
				<td><b>Saldo Anda</b>  : </td><td>Rp <?php echo number_format($results_saldo['total_balance'])?></td>
                </tr>
                <tr>
				<td><b>Cairkan Nominal</b></td>
				<td><input type="number" class="txt" placeholder="Masukkan nominal" name="nominal" value="<?php echo $nominal?>" min=200000 max="<?php echo $results_saldo['total_balance'];?>" value="<?php echo set_value('nominal');?>"></td>
				
                <tr>
				<td colspan="2" align="right"><input type="submit" value="Cairkan"></td>
                </tr>
			</form>
            <div id="errordiv">
			<?php
				if($this->form_validation->run() == TRUE && isset($_POST['nominal'])){
					if(isset($result)){
						if($result=="success"){
						?>
							<font color="#00FF00"><b>Saldo Anda berhasil Dicairkan</b></font>
						<?php
                        }
						else if($result == "waktu"){?>
                        	<font color="#FF0000">
                            	<b>
                                    Saat ini anda belum bisa mencairkan celengan anda, karena batas cairkan adalah satu Bulan setelah
                                    pengaktifan akun anda
                            	</b>
                            </font>
                        <?php
						}
						else if($result=="saldo"){
							echo "Saldo Anda tidak mencukupi batas minimum";
						}
					}
				}
			?>
            </div>
             </table>
      </div>
    </div>
    <div class="clear"></div>
</div>
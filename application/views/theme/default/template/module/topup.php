<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Top Up Saldo</h2>
            <div id="errordiv" title="Click to close" onclick="$('#errordiv').hide('fade');">
            <?php
				echo validation_errors();
			?>
            </div>
			<?php echo form_open(''); ?>
			
            <table width="100%">
            <tr><td><b>Top Up Nominal</b></td>
				<td><input type="number" placeholder="Masukkan nominal top up" class="txt" name="nominal" min=200000 value="<?php echo set_value('nominal');?>"></td>
				</tr>
                <tr>
				<td colspan="2" align="right"><input type="submit" value="Top Up"></td>
                </tr>
            </table>
				
		  </form>
			
    </div>
    </div>
    <div class="clear"></div>
</div>
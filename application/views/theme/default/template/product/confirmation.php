<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
    <div id="content_right">
        <div id="contain">
            <h2>Konfirmasi Pembayaran</h2>
			<?php echo form_open(''); ?>
			<br />
				<b>Order Code :</b>
				<input type="text" name="code" value="<?php echo set_value('code');?>">
				<br />
				<input type="submit" value="Konfirmasi">
			</form>
			<?php
				echo validation_errors();
			?>
		</div>
    </div>
    <div class="clear"></div>
</div>
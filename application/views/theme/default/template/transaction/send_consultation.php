<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Kirim Konsultasi</h2>
			<?php echo form_open('')?>
				<table>
					<tr>
						<td><input type="text" name="subject" placeholder="Conslutation's Subject" value="<?php echo set_value('subject');?>"></td>
					</tr>
					<tr>
						<td>
							<textarea name="isi" cols="80%" rows="5" placeholder="Consultation's Contain here"><?php echo set_value('isi');?></textarea>
						</td>
					</tr>
					<tr>
						<td><input type="submit" value="Send"></td>
					</tr>
				</table>
			</form>
			<?php echo validation_errors();?>
      </div>
    </div>
    <div class="clear"></div>
</div>
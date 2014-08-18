			<div id="content">
				<div id="content_left">
					<?php $this->load->view('theme/default/template/common/sidebar')?>
				</div>
				<div id="content_right">
					<div id="contain">
						<h2>Celengan Emas</h2>
						<?php 
							echo $intro;
							echo form_open(base_url('module/activate_celengan'));
						?>
						<br />
<textarea class="txt"  style="width:100%; height:200px;" readonly="readonly">
KETENTUAN DAN SYARAT-SYARAT PENGGUNAAN CELENGAN EMAS
1. Saya menyertakan informasi diri yang sebenar-benarnya
</textarea>
                        
						<br />
						<?php
							if($loginstat == 1 && $count == 0){
						?>
						<label><input type="checkbox" name="checkbox"/><b> Saya setuju dengan ketentuan-ketentuan diatas</b></label><br />
						<input type="submit" value="aktifkan" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false}">
						<?php
							}
							else if($loginstat == 1 && $count != 0){
								echo "Anda Sudah Mengaktifkan Celengan Emas di Akun anda";
							}
							else{
								echo "<a href=\"#\" onclick=\"document.getElementById('txtusername').focus();\">Login</a> / <a href=\"".base_url('register')."\" title =\"Register\">Register</a>";
							}
						?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Activate Celengan</h2>
			<?php
				if($count == 0)
					echo "Kamu berhasil mengaktifkan Celengan Emas di Akun anda<br /> Silahkan <a href='".base_url('module/topup_celengan')."'>Top Up</a> saldo anda.";
				else
					echo "Anda Sudah Mengaktifkan Celengan Emas di Akun anda<br /> Silahkan <a href='".base_url('module/topup_celengan')."'>Top Up</a> saldo anda.";
			?>
      </div>
    </div>
    <div class="clear"></div>
</div>
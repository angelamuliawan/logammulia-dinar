<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Activate Simpan</h2>
			<?php
				if($count == 0)
					echo "<br />Kamu berhasil mengajukkan Pengaktifan Program Simpan Emas di Akun anda<br />
					Silahkan Lakukan Transfer ke Rekening Kami sejumlah Rp 200.000<br />";
				else
					echo "<br />Anda Sudah Mengaktifkan Program Simpan Emas di Akun anda<br />";
			?>
      </div>
    </div>
    <div class="clear"></div>
</div>
<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
    <div id="content_right">
        <div id="contain">
            <h2>Konfirmasi Pembayaran</h2>
			<br />
			<?php
			if(isset($save)){
				switch($save){
				case 1:
			?>
			Terima kasih sudah mengkonfirmasikan pembayaran anda<br />
			Kami akan segera memproses transaksi anda.
			<?php
				break;
				}
			}
				?>
		</div>
    </div>
    <div class="clear"></div>
</div>
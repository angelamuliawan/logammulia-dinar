<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Top Up Saldo</h2>
			<b>Kamu Berhasil Mengajukan Top Up Saldo. Silahkan Transfer sejumlah Rp <?php echo number_format($nominal); ?> ke Salah satu Rekening Kami:</b><br />
			<table>
				<tr>
					<th>Nama Bank</th>
					<th>Nomor Rekening</th>
					<th>Atas Nama</th>
				</tr>
				<?php
					foreach($bank as $row){
						echo "<tr>";
						echo "<td>$row->nama_bank</td>";
						echo "<td>$row->nomor_rekening</td>";
						echo "<td>$row->atas_nama</td>";
						echo "</tr>";
					}
				?>
			</table>
      </div>
    </div>
    <div class="clear"></div>
</div>
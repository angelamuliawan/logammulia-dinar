<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>History Gadai</h2>
            <table>
					<tr> 
						<th>No.</th>
						<th>ID Emas</th>
						<th>Tanggal Sertifikat</th>
						<th>Pinjaman</th>
						<th>Gram</th>
						<th>Tanggal Mulai Gadai</th>
						<th>Status</th>
					</tr> 
          <?php
					if($results != 0){
					$no=1;
					foreach($results as $rows){
					if($no%2==0) $class = "even"; else $class = "odd";
                                echo "<tr>";
                                echo "<td class='$class'>".$no."</td>";
                                echo "<td class='$class'>".$rows->no_id_emas."</td>";
                                echo "<td class='$class'>".$rows->tanggal_sertifikat."</td>";
                                echo "<td class='$class'>Rp ".number_format($rows->pinjaman)."</td>";
                                echo "<td class='$class'>".$rows->gram_gadai."</td>";
                                echo "<td class='$class'>".date("d/m/Y",strtotime($rows->date_gadai))."</td>";
                                if($rows->status_gadai == 1) $gadai = "Digadaikan"; else $gadai = "Ditebus";
								echo "<td class='$class'>".$gadai."</td>";
								echo "</tr>";
								$no++;
								}
					 }
					  else echo "<tr><td colspan='7'>no data was found.</td></tr>";
			?>
            </table>
			<?php
			echo $links;
			?>
      </div>
    </div>
    <div class="clear"></div>
</div>
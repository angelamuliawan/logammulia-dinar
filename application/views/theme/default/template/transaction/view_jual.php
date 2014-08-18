<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>History Jual</h2>
			<table>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Gram</th>
					<th>Total Harga Jual</th>
					<th>Tanggal Jual</th>
					<th>Status</th>
				</tr>
				<?php
					if($results!=0){
						$no=1;
						foreach($results as $rows){
							?>
								<tr>
									<td><?php echo $no?></td>
									<td><?php echo $rows->name_product?></td>
									<td><?php echo $rows->qty?></td>
									<td>Rp <?php echo number_format($rows->harga_pas_jual*$rows->qty)?></td>
									<td><?php echo date("D, d M Y",strtotime($rows->date_jual));?></td>
									<td>
										<?php
											if($rows->status_jual==1)echo "<font color='#ff0000'><b>Tunggu Konfirmasi</b></font>"; 
											else if($rows->status_jual==2) echo "<font color='#008000'><b>Terjual</b></font>";
											else if($rows->status_jual==3) echo "<font color='#ff0000'><b>Cancel</b></font>";
										?>
									</td>
								</tr>
							<?php
						$no++;
						}
					}
					else echo "<tr><td colspan='5'>No Data was found</td></tr>";
				?>
			</table>
            
      </div>
    </div>
    <div class="clear"></div>
</div>
<div id="simulation_left">
					<img src="<?php echo base_url('asset/images/theme/default')?>/simulation.jpg">
				</div>
				<div id="simulation_center">
					<h3>Simulasi Cicilan Logam Mulia</h3>
					<form method="post" action="<?php echo base_url('product/simulation')?>" onsubmit="return cekOption()">
						<label>Produk</label><br />
						<select name="produk" id="produk">
							<option value="">Pilih Produk</option>
							<?php
								foreach($result_logam_mulia as $row){
								echo "<option value=\"".$row->id_product."\">".$row->name_product."</option>";
								}
							?>
						</select><br /><br />
						<label>Jangka Waktu</label><br />
						<select name="waktu" id="waktu">
							<option value="">Pilih Jangka Waktu</option>
							<option value="3">3 Bulan</option>
							<option value="6">6 Bulan</option>
							<option value="9">9 Bulan</option>
							<option value="10">10 Bulan</option>
							<option value="12">1 Tahun</option>
							<option value="24">2 Tahun</option>
							<option value="36">3 Tahun</option>
						</select><br /><br />
						<input type="submit" value="Simulasi" />
					</form>
				</div>
				<div id="simulation_right">
					<br />
					<center>
					<img height="150px" src="http://www.kitco.com/images/live/au_go_0030_ny.gif" />
					</center>
				</div>
				<div class="clear"></div>
                <script type="text/javascript">
				function cekOption()
				{
					if(document.getElementById('produk').value=="" || document.getElementById('waktu').value=="")
					{
						alert('Silahkan pilih produk dan jangka waktu yang ingin disimulasi');
						return false;
					}else{
						return true;
					}
				}
				</script>
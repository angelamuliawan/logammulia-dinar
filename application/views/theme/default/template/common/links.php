<div id="links_left">
<h3>Recent News</h3>
<?php
foreach($result_news as $row){
$title = preg_replace('/[^a-z0-9]+/','-',strtolower($row->title_news));
if(strlen($row->title_news) > 30) $titik = "..";
else $titik="";
?>
<a title ="Read <?php echo $row->title_news?>" href="<?php echo base_url("news/read/".$row->id_news."/$title")?>">
<?php echo substr($row->title_news,0,20).$titik?></a><br />
<?php
}
?>
</div>
				<div id="links_center">
					<h3>Partner</h3>
					<a href="#">Lorem ipsum</a><br />
					<a href="#">Dolor Sil Amet</a><br />
					<a href="#">Apsum ilour sir</a><br />
					<a href="#">Palka Raji Ayak</a>
				</div>
				<div id="links_right">
					<h3>Links</h3>
					<?php
						$links = $this->Model_setting->fetch_links_active(4,0);
						if($links!=0){
							foreach($links as $rows){
								echo "<a href='$rows->links' title='$rows->title_links' target='_blank' >$rows->title_links</a><br />";
							}
						}
					?>
				</div>
				<div id="links_contact">
					<h3>Contact</h3>
					<img src="<?php echo base_url('asset/images/theme/default')?>/office.png">
					The Plaza Semanggi Lantai 2.<br />
					<img src="<?php echo base_url('asset/images/theme/default')?>/bblogo.png">&nbsp;22D124DC / 2174827C<br />
					<img src="<?php echo base_url('asset/images/theme/default')?>/phone.png">&nbsp;08131 444 0552 / 081 777 0165
				</div>
				<div class="clear"></div>
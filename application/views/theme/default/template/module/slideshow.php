<div id="wrapper">
						<div class="slider-wrapper theme-default">
							<div id="slider" class="nivoSlider">
								<?php
									if($slideshow != 0){
									foreach($slideshow as $rows){
									?>
										<a href="<?php echo $rows->link_url?>"><img src="<?php echo $rows->image_slideshow?>" data-thumb="<?php echo $rows->image_slideshow?>" alt="" /></a>
									<?php
									}
									}
								?>
							</div>
							<div id="htmlcaption" class="nivo-html-caption">
								<strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
							</div>
						</div>
</div>
					<script type="text/javascript" src="<?php echo base_url('asset/plugin/nivo/scripts')?>/jquery-1.7.1.min.js"></script>
					<script type="text/javascript" src="<?php echo base_url('asset/plugin/nivo/')?>/jquery.nivo.slider.js"></script>
					<script type="text/javascript">
					$(window).load(function() {
						$('#slider').nivoSlider();
					});
					</script>
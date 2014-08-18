
			<div id="content">
				<div id="content_left">
					<?php $this->load->view('theme/default/template/common/sidebar')?>
				</div>
				<div id="content_right">
                                <?php
				$i = 0;
                     foreach($results as $row){
					$i++;
                                    $title = preg_replace('/[^a-z0-9]+/','-',strtolower($row->title_news));
                                ?>
					<div id="contain">
						<h2><?php echo "<a href=\"".base_url("news/read/".$row->id_news."/$title")."\" title=\"read ".$row->title_news."\">".$row->title_news."</a>"; ?></h2>
						<div class="details">
							Penulis: <?php echo $row->name?> | <?php echo date('D, d M Y  | H:i',strtotime($row->date_insert));?>
						</div>
											<?php
												if($row->image_news != ""){
													echo "<img src=\"".$row->image_news."\" width=\"100%\"/>"; 
												}
											if(strlen($row->content_news) > 400)
											$titik = "..<br /><div class=\"readmore\"><a href=\"".base_url("news/read/".$row->id_news."/$title")."\" title=\"read more\">Read More..</a></div>";
											else $titik = "<br />";
											echo substr($row->content_news,0,400).$titik;
											?>
					</div>
					<div class="clear"></div>
                                <?php
                                }
								echo $links;
                                ?>
				</div>
				<div class="clear"></div>
			</div>
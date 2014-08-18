<article class="module width_full">
		<header><h3 class="tabs_involved">Manage Article</h3>
		</header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
					<th>Title</th> 
					<th>Image Slideshow</th> 
					<th>Status</th> 
                    <th>Date Added</th>
                    <th>Sort Order</th>
					<th>Actions</th>
				</tr> 
			</thead> 
			<tbody>
                     <?php
                            $no =0;
			    if($results != 0){
                                foreach($results as $rows){
                                    $no++;
				    ?>
				<script type="text/javascript">
					<!--
						function queryAction<?php echo $no?>(){
						var confirmmessage = "Are you sure you want to continue?";
						var goifokay = "<?php echo base_url().'adminpanel/article/delete_slideshow/'.$rows->id_slideshow;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
				</script>
				    <?php
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\"></td>";
                                echo "<td>".$rows->title_slideshow."</td>";
                                echo "<td><img src=\"".$rows->image_slideshow."\" height=\"100px\" width=\"100px\"></td>";
                                if($rows->status_slideshow == 1) echo "<td>Draft</td>";
                                else if($rows->status_slideshow == 2) echo "<td>Active</td>";
                                 echo "<td>".date("D, d M Y",strtotime($rows->date_slideshow))."</td>";
                                echo "<td>".$rows->sort_order."</td>";
                                echo "<td><a href='".base_url()."adminpanel/article/edit_slideshow/".$rows->id_slideshow."' title=\"edit this slideshow\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='delete' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                echo "</tr>";
                        }
			    }
			    else echo "<tr><td colspan='7'><center>no data was found, <a title=\"add new slideshow\" href=\"".base_url('adminpanel/article/new_slideshow')."\">add new slideshow</a></center></td></tr>";
                            ?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->	
		</div><!-- end of .tab_container -->
		<?php echo $links;?>
		</article>
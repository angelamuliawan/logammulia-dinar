<article class="module width_full">
		<header><h3 class="tabs_involved">Manage Links</h3>
		</header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
					<th>Title Link</th>
					<th>Sort</th>
					<th>Status</th> 
					<th>Action</th> 
				</tr> 
			</thead> 
			<tbody>
                            <?php
                            $no =0;
                            if($bank != 0){
                                foreach($bank as $rows){
                                    $no++;
				    ?>
				<script type="text/javascript">
					<!--
						function queryAction<?php echo $no?>(){
						var confirmmessage = "Are you sure you want to continue?";
						var goifokay = "<?php echo base_url().'adminpanel/setting/delete_links/'.$rows->id_links;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
				</script>
				    <?php
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\"></td>";
                                echo "<td>".$rows->title_links."</td>";
                                echo "<td>".$rows->sort_order."</td>";
								if($rows->status_links == 1) $status = "Active";
								else if($rows->status_links == 2) $status = "Nonactive";
                                echo "<td>".$status."</td>";
                                echo "<td><a href='".base_url()."adminpanel/setting/edit_links/".$rows->id_links."' title=\"edit link\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='delete link' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                echo "</tr>";
                                }
                            }
                            else echo "<tr><td colspan='5'>no data was found</td></tr>";
                            ?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			<div style="margin:10px 0 10px 10px">
				<a href="<?php echo base_url('adminpanel/setting/add_links');?>">
				<input type="submit" value="add Link">
				</a>
			</div>
		</div><!-- end of .tab_container -->
		<?php echo $links;?>
		</article>
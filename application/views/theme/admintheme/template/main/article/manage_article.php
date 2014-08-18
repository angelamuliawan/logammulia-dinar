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
					<th>Status</th> 
					<th>Created On</th> 
                                        <th>Created by</th>
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
						var goifokay = "<?php echo base_url().'adminpanel/article/delete_article/'.$rows->id_news;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
				</script>
				    <?php
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\"></td>";
                                echo "<td>".$rows->title_news."</td>";
                                if($rows->status_news == 1) echo "<td>Draft</td>";
                                else if($rows->status_news == 2) echo "<td>Publish</td>";
                                 echo "<td>".date("D, d M Y",strtotime($rows->date_insert))."</td>";
                                echo "<td>".$rows->username."</td>";
                                echo "<td><a href='".base_url()."adminpanel/article/edit_article/".$rows->id_news."' title=\"edit this article\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='move to trash' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                echo "</tr>";
                                }
			    }
			    else echo "<tr><td colspan='6'>no data was found</td></tr>";
                            ?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->	
		</div><!-- end of .tab_container -->
		<?php echo $links;?>
		</article>
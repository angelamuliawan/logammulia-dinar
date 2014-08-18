<article class="module width_full">
		<header><h3 class="tabs_involved">Manage Article</h3>
		</header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
					<th>Article</th> 
					<th>Name</th> 
					<th>Email</th> 
					<th>Status</th> 
                    <th>Date Comment</th>
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
						var goifokay = "<?php echo base_url().'adminpanel/article/delete_comment/'.$rows->id_comment;?>";
						if (confirm(confirmmessage)){
						      window.location = goifokay;
						  }
						}
						//-->
				</script>
				    <?php
                                echo "<tr>";
                                echo "<td><input type=\"checkbox\"></td>";
								echo "<td>".substr($rows->title_news,0,20)."</td>";
                                echo "<td>".$rows->name_comment."</td>";
                                echo "<td>".$rows->email."</td>";
                                if($rows->status_comment == 1) echo "<td>Unmoderated</td>";
                                else if($rows->status_comment == 2) echo "<td>Published</td>";
                                else if($rows->status_comment == 4) echo "<td>Spam</td>";
                                 echo "<td>".date("D, d M Y",strtotime($rows->date_comment))."</td>";
                                echo "<td><a href='".base_url()."adminpanel/article/edit_comment/".$rows->id_comment."' title=\"edit this comment\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='delete' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                echo "</tr>";
                        }
			    }
			    else echo "<tr><td colspan='7'><center>no data was found</center></td></tr>";
                            ?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->	
		</div><!-- end of .tab_container -->
		<?php echo $links;?>
		</article>
<article class="module width_full">
			<header><h3>Stats</h3></header>
			<div class="module_content">
				<article class="stats_graph">
					<img src="http://chart.apis.google.com/chart?chxr=0,0,3000&chxt=y&chs=520x140&cht=lc&chco=76A4FB,80C65A&chd=s:Tdjpsvyvttmiihgmnrst,OTbdcfhhggcTUTTUadfk&chls=2|2&chma=40,20,20,30" width="520" height="140" alt="" />
				</article>
				
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Today</p>
						<p class="overview_count">1,876</p>
						<p class="overview_type">Hits</p>
						<p class="overview_count">2,103</p>
						<p class="overview_type">Views</p>
					</div>
					<div class="overview_previous">
						<p class="overview_day">Yesterday</p>
						<p class="overview_count">1,646</p>
						<p class="overview_type">Hits</p>
						<p class="overview_count">2,054</p>
						<p class="overview_type">Views</p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
		
		<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Content Manager</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Posts</a></li>
    		<li><a href="#tab2">Comments</a></li>
		</ul>
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
				if(strlen($rows->title_news) > 30)
                                echo "<td>".substr($rows->title_news,0,30)."..</td>";
				else echo "<td>".$rows->title_news."</td>";
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
			
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Comment</th> 
					<th>Status</th> 
    				<th>Posted by</th> 
    				<th>Posted On</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
				  <?php
                            $no =0;
			    if($results != 0){
                                foreach($comment as $rows){
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
				if(strlen($rows->title_news) > 30)
                                echo "<td>".substr($rows->title_news,0,30)."..</td>";
								else echo "<td>".$rows->title_news."</td>";
                                if($rows->status_comment == 1) echo "<td>Unmoderated</td>";
                                else if($rows->status_comment == 2) echo "<td>Publish</td>";
                                else if($rows->status_comment == 3) echo "<td>Spam</td>";
                                echo "<td>".$rows->name_comment."</td>"; 
								echo "<td>".date("D, d M Y",strtotime($rows->date_comment))."</td>";
                                echo "<td><a href='".base_url()."adminpanel/article/edit_comment/".$rows->id_comment."' title=\"edit this comment\"><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_edit.png'></a><a title='move to trash' onClick='queryAction".$no."()' class='pointer'><input type=\"image\" src='".base_url()."asset/images/theme/admintheme/icn_trash.png'></a></td>";
                                echo "</tr>";
                                }
			    }
			    else echo "<tr><td colspan='6'>no data was found</td></tr>";
                            ?>
			</tbody> 
			</table>

			</div><!-- end of #tab2 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
		<article class="module width_quarter">
			<header><h3>Konsultasi</h3></header>
			<div class="message_list">
				<div class="module_content">
					<?php
						foreach($results_consultation as $row_cons){
					?>
					<div class="message">
						<p><h3><a href="<?php echo base_url('adminpanel/transaction/reply_consultation/'.$row_cons->id_konsultasi)?>"><strong><?php echo $row_cons->subject?></a></strong></h3></p>
						<p><?php echo substr($row_cons->konsultasi,0,100)?></p>
						<p><b><?php echo $row_cons->name?></b> -
						<?php
							if($row_cons->status_konsultasi == 1) echo "<font color=\"#ff0000\">Unread</font>";
							elseif($row_cons->status_konsultasi == 2) echo "<font color=\"#008000\"><b>Read</b></font>";
							elseif($row_cons->status_konsultasi == 3) echo "<font color=\"#008000\"><b>Replied</b></font>";
						?>
						</p>
					</div>
					<?php
						}
					?>
				</div>
			</div>
			<!--
			<footer>
				<form class="post_message">
					<input type="text" value="Message" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
					<input type="submit" class="btn_post_message" value=""/>
				</form>
			</footer>
			-->
		</article><!-- end of messages article -->
		
		<div class="clear"></div>
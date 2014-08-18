<div id="content">
    <div id="content_left">
	<?php $this->load->view('theme/default/template/common/sidebar')?>
    </div>
  <div id="content_right">
        <div id="contain">
            <h2>Konsultasi</h2>
            <table>
					<tr> 
						<th width="5%">No.</th>
						<th>Subject</th> 
						<th>Date</th> 
						<th>Status</th>
					</tr> 
           <?php
                    $no =1;
					if($results != 0){
					foreach($results as $rows){
									if($no%2==0){
											echo "<tr>";
											echo "<td class=\"even\">".$no."</td>";
											echo "<td class=\"even\"><a title=\"read consultation\" href=\"".base_url('memberarea/consultation/read/'.$rows->id_konsultasi)."\">".$rows->subject."</a></td>";
											echo "<td class=\"even\">".date("D, d M Y",strtotime($rows->date_konsultasi))."</td>";
											if($rows->status_konsultasi == 1)
											echo "<td class=\"even\"><font color=\"#ff0000\">Not Read</font></td>";
											else if($rows->status_konsultasi == 2)
												echo "<td class=\"even\"><font color=\"#008000\"><b>Read</b></font></td>";
											else if($rows->status_konsultasi == 3)
												echo "<td class=\"even\"><font color=\"#008000\"><b>Replied</b></font></td>";
											echo "</tr>";
									}
									else{
										 echo "<tr>";
											echo "<td class=\"odd\">".$no."</td>";
											echo "<td class=\"odd\"><a title=\"read consultation\" href=\"".base_url('memberarea/consultation/read/'.$rows->id_konsultasi)."\">".$rows->subject."</a></td>";
											echo "<td class=\"odd\">".date("D, d M Y",strtotime($rows->date_konsultasi))."</td>";
											if($rows->status_konsultasi == 1)
												echo "<td class=\"odd\"><font color=\"#ff0000\">Not Read</font></td>";
											else if($rows->status_konsultasi == 2)
												echo "<td class=\"odd\"><font color=\"#008000\"><b>Read</b></font></td>";
											else if($rows->status_konsultasi == 3)
												echo "<td class=\"odd\"><font color=\"#008000\"><b>Replied</b></font></td>";
											echo "</tr>";
									}
											$no++;
								}
                        }
					  else echo "<tr><td colspan='4'>no data was found</td></tr>";
			echo $links;
			?>
    
            </table>
			<a href="<?php echo base_url('memberarea/consultation/add_new')?>" title="Kirim Konsultasi">Kirim Konsultasi</a>
      </div>
    </div>
    <div class="clear"></div>
</div>
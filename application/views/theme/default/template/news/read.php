			<div id="content">
				<div id="content_left">
					<?php $this->load->view('theme/default/template/common/sidebar')?>
				</div>
				<div id="content_right">
					<div id="contain">
					<h2><?php echo $title; ?></h2>
					<div class="details">
						Penulis: <?php echo $writer?> | <?php echo date('D, d M Y  | H:i',strtotime($date_insert));?>
					</div>
                                        <?php
                                            if($image != ""){
                                                echo "<img src=\"".$image."\" width=\"100%\"/>"; 
                                            }
                                        echo $content;
                                        ?>
						<?php echo "<br>
							<div class=\"tabbutton\">Comments</div>";
						if($news != FALSE){
							echo "
							<div id=\"comment_list\">";
							foreach($news as $rows){
								time(NULL);
								$rand = 1+rand()%11;
								?>
                                <div class="comment_item">
									<img align="left" src="<?php echo base_url('asset/images/theme/default/avatar'.$rand.'.png')?>" height="80px" width="80px" style="border-radius:5px;" />
									<?php echo $rows->name_comment."<p class='details'>on ".date("D, d M Y  | H:i",strtotime($rows->date_comment))."</p>";?>
									<?php echo $rows->comment?>
									<div class="clear"></div>
									<div  style="margin-bottom:20px;"></div>
                                    </div>
								<?php
							}
							echo "</div>";
						}
						else{
							echo "<br>No Comment was found ";
						}
						?>
						<div id="comment_box">
						<?php echo form_open('');?>
							<input id="txtNama" class="txt" name="name" placeholder="Name" value="<?php echo set_value('name');?>"/>
							<input id="txtEmail" class="txt" name="email" placeholder="Email" value="<?php echo set_value('email');?>" />
							<textarea id="txtComment" class="txt" name="comment" id="textarea" cols="80" rows="5" style="margin:5px 0 3px 0;height:auto; width:auto;" placeholder="Your Comment"><?php echo set_value('comment');?></textarea>
							<input type="submit" value="comment" />
						</form>
						</div>
						<?php
							if($this->session->flashdata('comment') == TRUE){?>
						<a href="#" title="Click to close"><div id="errordiv" onclick="document.getElementById('errordiv').style.display='none'">Your Comment successfully added. We'll moderate comment first</div></a>
						<?php } ?>
						<a href="#" title="Click to close"><div id="errordiv" onclick="document.getElementById('errordiv').style.display='none'"><?php echo validation_errors();?></div></a>	
					</div>
				</div>
				<div class="clear"></div>
			</div>
<script>
function validasiOrder()
{
	var nama = document.getElementById('txtNama').value;
	var email = document.getElementById('txtEmail').value;
	var comment = document.getElementById('txtComment').value;
	var stat=true;
	var msg="";
	if(nama=="")
	{
		msg+="Field nama wajib diisi"; stat = false;
	}if(email=="")
	{
		msg+="<br>Field email wajib diisi"; stat = false;
	}if(comment=="")
	{
		msg+="<br>Field comment wajib diisi"; stat = false;
	}
	document.getElementById('errordiv').innerHTML = msg;
	return stat;
}
jQuery('#comment_list').hide();
jQuery('#comment_list').fadeIn(1000);
</script>
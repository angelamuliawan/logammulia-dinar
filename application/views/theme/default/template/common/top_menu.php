
<div id="fixed_img">				
				<img src="<?php echo base_url('asset/images/theme/default')?>/profile.png" />
				</div>
				<div id="fixed_detail" >
                <?php if($loginstat==1)
					{
					?><a href="#" <?php if($loginstat==1){?>onclick="showDiv()" <?php }?> title="Click to show menu"><div id="membertab">Welcome, <?php echo $session['tgs_username_member'];?></div></a> <?php
					} else{?>
                
                 
				<form method="post" action="<?php echo base_url('member/login')?>">
					<input type="text" name="username" placeholder="Username" id="txtusername" value="<?php echo $username;?>"/>
					<input type="password" name="password" placeholder="Password" />
					<input type="submit" value="login" />
                    <a href="<?php echo base_url('member/forgotpass');?>"><strong style="font-size:12px">Forgot password</strong></a>
				</form>
                
                 <?php }?>
				<div style="text-align: right; margin:-25px 0 0 0;">
					<form method="post" action="<?php echo base_url('search');?>" name="searchform">
					<input type="text" name="txtSearch" placeholder="Search here" onkeyup="searchNews(this.value)" />
					<input type="submit" value="search" />
				</form>
				</div>
                <?php $this->load->view('theme/default/template/common/searchbox')?> 
				</div>
               
               
              
				<div class="clear"></div>
                
				<?php $this->load->view('theme/default/template/common/menumember')?>
				
            	<script type="text/javascript">
				function closeDiv()
				{
					
					document.getElementById('menumember').style.display='none';
				}
				function showDiv()
				{
					if(document.getElementById('menumember').style.display == 'block')
					{
						closeDiv();
					}else{
						document.getElementById('menumember').style.display='block';
					}
				}
				</script>
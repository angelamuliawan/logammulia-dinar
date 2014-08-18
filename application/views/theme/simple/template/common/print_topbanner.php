<?php if($loginstat==1){?>
<div id="topbanner">
<table onmouseover="openMemberMenu()" onmouseout="closeMemberMenu()">
<tr>
<td style="padding:0; margin:0;">
<table id="membersection">
<tr>
<td><a title="Kembali ke Home" href="<?php echo base_url()?>"><img src="<?php echo base_url('asset/images/icons/home.png')?>" width="26" height="26" /></a></td>
<td>Welcome, <?php echo $session['tgs_username_member'];?></td>
</tr>
</table>
</td>
</tr>
</table>
</div>



<div id="membermenu" onmouseover="openMemberMenu()" onmouseout="closeMemberMenu()">
<table style="margin-left:5px;" >

<tr>
<td><img src="<?php echo base_url('asset/images/icons/setting.png')?>" width="40" height="40"></td><td><a href="<?php echo base_url('member')?>">Member Area</a></td>
</tr>
<tr>
<td><img src="<?php echo base_url('asset/images/icons/logout.png')?>" width="40" height="40"></td><td><a href="<?php echo base_url('member/member/logout')?>">Logout</a></td>
</tr>
</table>
</div>

<style>
a:active
{
	color:#F30; text-decoration:none;
}
.membermenuitem:hover
{
	background-color:#F93;	
}

#membermenu
{
	background-color:white; left:0px; top:35px; position:fixed;
	width:300px; height:auto; z-index:9; display:none;
	border-bottom-left-radius:5px; border-bottom-right-radius:5px;
	border-color:#F30; border-width:thin; border-style:solid;
	box-shadow:0px 0px 10px #FF3300; padding-bottom:3px; padding-top:3px;
	font-family:Segoe UI; font-size:14px; color:#F60;
}
#membersection:hover
{
	background-color:#F93;
	border-top-left-radius:5px; border-top-right-radius:5px; 
}


#topbanner
{
	background-color:#F60;
	height:30px; width:100%; padding:3px;
	position:fixed; float:left; left:0px; top:0px; opacity:0.9;
	box-shadow:0px 0px 10px #999999; z-index:10;
	font-family:Segoe UI; font-size:14px; color:white;
}
</style>
<script type="text/javascript">
function openMemberMenu()
{
	document.getElementById('membermenu').style.display = 'block';	
}
function closeMemberMenu()
{
	document.getElementById('membermenu').style.display = 'none';	
}
</script>
<?php }?>
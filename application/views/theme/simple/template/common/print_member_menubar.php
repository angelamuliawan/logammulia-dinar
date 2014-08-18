<div id="menubar">
<a title="Return to home" href="<?php echo base_url()?>"><div class="menu">
<table align="center">
<tr>
<td><img src="<?php echo base_url('asset/images/icons/home.png')?>" width="20" height="20"></td><td align="center">Home</td>
</tr>
</table>
</div></a>
<a href="<?php echo base_url('member')?>"><div class="menu <?php if($member_menu==1){echo "selected";}?>">Profile</div></a>
<a href="<?php echo base_url('member')?>"><div class="menu <?php if($member_menu==3){echo "selected";}?>">History</div></a>
<a href="<?php echo base_url('member')?>"><div class="menu">Gadai</div></a>
<a href="<?php echo base_url('member')?>"><div class="menu <?php if($member_menu==4){echo "selected";}?>">SIMPAN</div></a>
<a href="<?php echo base_url('member')?>"><div class="menu <?php if($member_menu==5){echo "selected";}?>" style="width:120px">Celengan Emas</div></a>
<a href="<?php echo base_url('member')?>"><div class="menu <?php if($member_menu==6){echo "selected";}?>">Konsultasi</div></a>
</div>
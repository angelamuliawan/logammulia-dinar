<a href="#" onclick="document.getElementById('infobar').style.display = 'none';" title="Click to close">
<div id="infobar">
<?php 

if($info!="")
{
	echo $info;
	?><script>document.getElementById('infobar').style.display = 'block';</script><?php
}

?>
</div>
</a>
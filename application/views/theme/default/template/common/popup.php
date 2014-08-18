<a title="Click to close" onClick="document.getElementById('popup').style.display='none';">
<div id="popup" style="color:#F60;" >
<?php if($msg!="" && $msg['key']=='error_login')
{
	echo $msg['msg'];
	?><script type="text/javascript">document.getElementById('popup').style.display = 'block';</script><?php
}?>
</div>
</a>
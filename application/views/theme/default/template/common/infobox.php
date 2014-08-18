<div id="infobox">
  <table width="100%" border="1">
    <tr>
      <td width="59%"><h1>Information</h1></td>
      <td width="41%" align="right"><a href="#" onClick="document.getElementById('infobox').style.display='none'">Close</a></td>
    </tr>
    <tr>
      <td colspan="2">
      <?php
if($msg!="" && $msg['key']=='info')
{
	echo $msg['msg'];
	?>
	<script>document.getElementById('infobox').style.display = 'block';</script>
	<?php
}
?>
      </td>
    </tr>
  </table>
</div>

<script type="text/javascript">
function searchNews(word)
{
	setSearchBox('block');
	if(word.length > 0){
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById('searchresult').innerHTML = xmlhttp.responseText;
		}else{
			document.getElementById('searchresult').innerHTML = "Loading...";
		}
	}
	
	xmlhttp.open("GET","<?php echo base_url('news/searchNews/')?>/"+word,true);
	xmlhttp.send();
	}
}
function setSearchBox(a)
{
	document.getElementById('searchbox').style.display = a;
}
</script>

<div id="searchbox">
  <table width="75%" border="1">
      <th colspan="2" align="left">
      <strong><em>Quick results <a href="#" onclick="setSearchBox('none')">[Close]</a></em></strong>    
    </th>
    <tr>
      <td width="81%" id="searchresult"></td>
    </tr>
    <th colspan="2">
    <a href="#" onclick="document.forms['searchform'].submit()"> View all results </a>   
    </th>
  </table>
</div>
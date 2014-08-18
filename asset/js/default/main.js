// JavaScript Document

function checkUsername(base,str)
{
	if(str.length == 0)
	{
		document.getElementById('outputregis').innerHTML = "";
		document.getElementById('outputregis').style.display = 'none';
	}else{
		var xmlhttp;
		document.getElementById('outputregis').innerHTML = "Mengecek ketersediaan username...";
		document.getElementById('outputregis').style.display = 'block';
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
				var n = xmlhttp.responseText;
				if(n==0)
				{
					document.getElementById('outputregis').style.backgroundColor = '#FCC';
					document.getElementById('outputregis').style.color = 'red';
					document.getElementById('outputregis').style.borderColor = 'red';					
					document.getElementById('outputregis').innerHTML = 'Maaf, username tidak tersedia';
				}else{
					document.getElementById('outputregis').style.backgroundColor = '#6F6';
					document.getElementById('outputregis').style.color = 'green';
					document.getElementById('outputregis').style.borderColor = 'green';
					document.getElementById('outputregis').innerHTML = 'Selamat, username tersedia';
				}
			}
		}
		//var s = base+"/"+str;
		xmlhttp.open("GET",base+"/"+str,true);
		xmlhttp.send();
	}
		
	
	
}

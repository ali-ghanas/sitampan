<script type="text/javascript">
function GetXmlHttpObject() 
{ 
var xmlHttp=null; 
try 
 	{ 
 	// Firefox, Opera 8.0+, Safari 
 	xmlHttp=new XMLHttpRequest(); 
 	} 
	catch (e) 
 	{ 
 	//Internet Explorer 
 	try 
 	{ 
 	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); 
  	} 
 	catch (e) 
  	{ 
  	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); 
  	} 
 	} 
return xmlHttp; 
}

function kirim(id) 
{ 
var xmlHttp=GetXmlHttpObject()	 
var url="modul/mod_artikel/ajax4.php"; 
url1=url+"?id="+id; 
xmlHttp.onreadystatechange=hasil; 
function hasil() 
	{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") 
 	              {	     
                      document.getElementById("tampil").innerHTML=xmlHttp.responseText; 
 	              } 
	else 
    	              { 
    	               alert("Problem retrieving data:" + xmlhttp.statusText); 
    	               }	 
	} 
	xmlHttp.open("GET",url1,true); 
	xmlHttp.send(null); 	 
}
</script>


<select name="groupId" OnChange="kirim(this.value)">
<?php
$sql = mysql_query("SELECT * FROM tgrup");
while ($dta = mysql_fetch_array($sql)){
	if ($data[id_grup] == $dta[id_grup]){
		echo "<option value='$dta[id_grup]' selected>$dta[grup]</option>";
	}
	else{
		echo "<option value='$dta[id_grup]'>$dta[grup]</option>";
	}
}
?>
</select>

<p><b><i> Kategori: </i></b></p>
<div id="tampil"> </div> 
<?php 
mysql_connect("localhost","root","");
mysql_select_db("45f4m3d14");

$id_grup = $_GET['id']; 
echo "<select name='kategoriId'>";
$sql = mysql_query("SELECT * FROM tkategori WHERE id_grup = '$id_grup'"); 
while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id_kategori]'>$data[kategori]</option>";
}
echo "</select>";
?> 

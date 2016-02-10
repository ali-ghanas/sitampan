<form name="form1" method="post" action="target_edit_pbk.php">
<h3> Edit Phonebook </h3>
<?php
include "koneksi/koneksi.php";
$data = mysql_fetch_array(mysql_query("SELECT * FROM pbk WHERE ID = '$_GET[ID]'"));
?>
<table>
<tr>
	<td width="100"> <font face=tahoma size=2>Nama </font></td>
	<td width="10"><font face=tahoma size=2> : </font></td>
	<td><input name="nama" type="text" size="20" value="<?php echo $data[Name];?>"><input name="ID" type="hidden" size="20" value="<?php echo $_GET[ID];?>"></td>
</tr>
<tr>
	<td> <font face=tahoma size=2>HP </font></td>
	<td><font face=tahoma size=2> : </font></td>
	<td><input name="hp" type="text" size="20" value="<?php echo $data[Number];?>"></td>
</tr>
<tr>
	<td width="100"> <font face=tahoma size=2>Group </font></td>
	<td width="10"><font face=tahoma size=2> : </font></td>
	<td><select name=group>
	<?php
	include "koneksi/koneksi.php";
	$sql = mysql_query("SELECT * FROM pbk_groups ORDER BY Name ASC");
	while($datar = mysql_fetch_array($sql)){
		if($datar[ID] == $data[GroupID]){
			echo "<option value=$datar[ID] SELECTED>$datar[Name]</option>";
		}
		else{
			echo "<option value=$datar[ID]>$datar[Name]</option>";
		}
	}
	?>
	</select></td>
</tr>
<tr>
	<td><input type="submit" value="Simpan" /></td>
</tr>
</table>
</form>
</body>
</html>
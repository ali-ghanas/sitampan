<form name="form1" method="post" action="target_pbk.php">
<h3> Tambah Phonebook </h3>
<table>
<tr>
	<td width="100"> <font face=tahoma size=2>Nama </font></td>
	<td width="10"><font face=tahoma size=2> : </font></td>
	<td><input name="nama" type="text" size="20"></td>
</tr>
<tr>
	<td> <font face=tahoma size=2>HP </font></td>
	<td><font face=tahoma size=2> : </font></td>
	<td><input name="hp" type="text" size="20"></td>
</tr>
<tr>
	<td width="100"> <font face=tahoma size=2>Group </font></td>
	<td width="10"><font face=tahoma size=2> : </font></td>
	<td><select name=group>
	<?php
	include "koneksi/koneksi.php";
	$sql = mysql_query("SELECT * FROM pbk_groups ORDER BY Name ASC");
	while($data = mysql_fetch_array($sql)){
		echo "<option value=$data[ID]>$data[Name]</option>";
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
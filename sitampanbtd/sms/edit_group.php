<form name="form1" method="post" action="target_edit_pbkgroups.php">
<h3> Edit Group </h3>
<?php
include "koneksi/koneksi.php";
$data = mysql_fetch_array(mysql_query("SELECT * FROM pbk_groups WHERE ID = '$_GET[ID]'"));
?>
<table>
<tr>
	<td width="100"> <font face=tahoma size=2>Nama Group </font></td>
	<td width="10"><font face=tahoma size=2> : </font></td>
	<td><input name="nama" type="text" size="20" value="<?php echo $data[Name];?>"><input name="ID" type="hidden" size="20" value="<?php echo $_GET[ID];?>"></td>
</tr>
<tr>
	<td><input type="submit" value="Simpan" /></td>
</tr>
</table>
</form>
</body>
</html>
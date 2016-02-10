<?php
$aksi = "modul/mod_kategori/aksi_kategori.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
    echo "<h2>Kategori</h2>
          <input type=button value='Tambah Kategori' 
          onclick=\"window.location.href='?module=kategori&act=tambahkategori';\">
          <table id='tablekonten'>
          <tr><th><div id='kontentd'>No</div></th><th><div id='kontentd'>Group</div></th><th><div id='kontentd'>Nama Kategori</div></th><th><div id='kontentd'>Aksi</div></th></tr>"; 
    $tampil=mysql_query("SELECT * FROM tkategori c,tgrup cc WHERE c.id_grup=cc.id_grup ORDER BY kategori DESC");
    $no = 1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td><div id='kontentd'>$no</div></td>
			 <td><div id='kontentd'>$r[grup]</div></td>
             <td><div id='kontentd'>$r[kategori]</div></td>
             <td><div id='kontentd'><a href=?module=kategori&act=editkategori&id=$r[id_kategori]>Edit</a> | 
	               <a href=$aksi?module=kategori&act=hapus&id=$r[id_kategori]>Hapus</a></div>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah Kategori
  case "tambahkategori":
    echo "<h2>Tambah Kategori</h2>
          <form method=POST action='$aksi?module=kategori&act=input'>
          <table id='tablekonten'>
		  <tr><td><div id='kontentd'>Group</div></td><td> <div id='kontentd'>:</div></td>
		  <td><select name='groupId'>
		  <option value='-Pilih Group-'>-Pilih Group-</option>";
		  $sql = mysql_query("SELECT * FROM tgrup ORDER BY grup ASC");
		  while ($data = mysql_fetch_array($sql)){
			echo "<option value='$data[id_grup]'>$data[grup]</option>";
		  }
	echo "</select>		  
		  </td></tr>
          <tr><td><div id='kontentd'>Nama Kategori</div></td><td> <div id='kontentd'>:</div></td><td><input type=text name='kategori'></td></tr>
		  <tr><td><div id='kontentd'>Aktif</div></td><td> <div id='kontentd'>:</div></td><td><input type=radio name='aktif' value='Y'>Y &nbsp; <input type=radio name='aktif' value='N'>N</td></tr>
          <tr><td colspan=2><input type=submit name=submit value=Simpan> <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Kategori  
  case "editkategori":
    $edit=mysql_query("SELECT * FROM tkategori WHERE id_kategori='$_GET[id]'");
    $data = mysql_fetch_array($edit);
	if($data[aktif] == 'Y'){
		$y = 'checked';
	}
	elseif($data[aktif] == 'N'){
		$n = 'checked';
	}
	else{
		$y = '';
		$n = '';
	}

    echo "<h2>Edit Kategori</h2>
          <form method=POST action=$aksi?module=kategori&act=update>
          <input type=hidden name=id value='$data[id_kategori]'>
          <table id='tablekonten'>
		  <tr><td><div id='kontentd'>Group</div></td><td> <div id='kontentd'>:</div></td><td><select name=groupId>";
			$tampil = mysql_query("SELECT * FROM tgrup order by grup ASC");
			while($w = mysql_fetch_array($tampil)){
				if ($data[id_grup] == $w[id_grup]){
					echo "<option value=$w[id_grup] selected>$w[grup]</option>";
            	}
            	else {
					echo "<option value=$w[id_grup]>$w[grup]</option>";
				}
         	}
         	
	echo "</select></td></tr>
          <tr><td><div id='kontentd'>Nama Kategori</div></td><td> <div id='kontentd'>:</div></td><td> <input type=text name='kategori' value='$data[kategori]'></td></tr>
		  <tr><td><div id='kontentd'>Aktif</div></td><td> <div id='kontentd'>:</div></td><td><input type=radio name='aktif' value='Y' $y>Y &nbsp; <input type=radio name='aktif' value='N' $n>N</td></tr>
          <tr><td colspan=2><input type=submit value=Update> <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>

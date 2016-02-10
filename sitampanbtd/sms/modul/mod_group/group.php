<?php
$aksi = "modul/mod_group/aksi_group.php";
switch($_GET[act]){
	// Tampil Group
	default:
	echo "<h2>Group</h2>
		  <input type=button value='Tambah Group' onclick=\"window.location.href='?module=group&act=tambahgroup';\">
          <table id='tablekonten'>
          <tr><th><div id='kontentd'>No</div></th><th><div id='kontentd'>Group</div></th><th><div id='kontentd'>Group SEO</div></th><th><div id='kontentd'>Aksi</div></th></tr>"; 
	$p      = new PagingGroup;
	$batas  = 10;
	$posisi = $p->cariPosisi($batas);
    $tampil = mysql_query("SELECT * FROM tgrup LIMIT $posisi,$batas");
    $no = 1;
	while ($data = mysql_fetch_array($tampil)){
		echo "<tr><td><div id='kontentd'>$no</div></td>
			 <td><div id='kontentd'>$data[grup]</div></td>
			 <td><div id='kontentd'>$data[grup_seo]</div></td>
			 <td><div id='kontentd'><a href=?module=group&act=editgroup&id=$data[id_grup]>Edit</a> | <a href=$aksi?module=group&act=hapus&id=$data[id_grup]>Hapus</a></div>
             </td></tr>";
		$no++;
	}
    echo "</table>";
	
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM tgrup"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "<div id='paging'>Hal: $linkHalaman </div>";
	break;
  
	// Form Tambah Kategori
	case "tambahgroup":
	echo "<h2>Tambah Group</h2>
          <form method=POST action=$aksi?module=group&act=input>
		  <table id='tablekonten'>
		  <tr><td><div id='kontentd'>Nama Group</div></td><td> <div id='kontentd'>:</div></td><td><input type=text name='group'></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
  // Form Edit Kategori  
  case "editgroup":
    $edit=mysql_query("SELECT * FROM tgrup WHERE id_grup='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Grup</h2>
          <form method=POST action=$aksi?module=group&act=update>
          <input type=hidden name=id value='$r[id_grup]'>
          <table id='tablekonten'>
          <tr><td><div id='kontentd'>Nama Group</div></td><td> : <input type=text name='group' value='$r[grup]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update> <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggalMulai").datepicker({
					dateFormat  : "yy-mm-dd",        
          changeMonth : true,
          changeYear  : true,
        });
      });
	  
	  $(document).ready(function(){
        $("#tanggalSelesai").datepicker({
					dateFormat  : "yy-mm-dd",        
          changeMonth : true,
          changeYear  : true,
        });
      });
</script>
<?php
$aksi = "modul/mod_agenda/aksi_agenda.php";
switch($_GET[act]){
	// Tampil Agenda
	default:
	echo "<h2>Agenda</h2>
			<input type=button value='Tambah Agenda' onclick=location.href='?module=agenda&act=tambahagenda'>
			<table id=tablekonten>
			<tr><th><div id='konten'>no</div></th><th><div id='konten'>tema</div></th><th><div id='konten'>tgl. mulai</div></th><th><div id='konten'>tgl. selesai</div></th><th><div id='konten'>aktif</div></th><th><div id='konten'>aksi</div></th></tr>";
			// if ($_SESSION[Level]=='administrator'){
			//	$tampil = mysql_query("SELECT * FROM tagenda ORDER BY id_agenda DESC");
			// }
			// else {
				$tampil = mysql_query("SELECT * FROM tagenda WHERE id_user='$_SESSION[idUser]' ORDER BY id_agenda DESC");
			// }
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl_mulai   = tgl_indo($r[tgl_mulai]);
      $tgl_selesai = tgl_indo($r[tgl_selesai]);
	  $tema = substr($r[tema], 0, 40);
      echo "<tr><td><div id='kontentd'>$no</div></td>
                <td width=240><div id='kontentd'>$tema ..</div></td>
                <td><div id='kontentd'>$tgl_mulai</div></td>
                <td><div id='kontentd'>$tgl_selesai</div></td>
				<td align='center'><div id='kontentd'>$r[aktif]</div></td>
                <td><div id='kontentd'><a href=?module=agenda&act=editagenda&id=$r[id_agenda]>Edit</a> | <a href=$aksi?module=agenda&act=hapus&id=$r[id_agenda]>Hapus</a></div></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
    break;

  
  case "tambahagenda":
    echo "<h2>Tambah Agenda</h2>
		<body style='font-size:65%;'>
          <form method='POST' action='$aksi?module=agenda&act=input'>
          <table id='tablekonten'>
          <tr><td><div id='kontentd'>Tema</div></td>      <td> : <input type='text' name='tema' size='60'></td></tr>
		  <tr><td><div id='kontentd'>Aktif</div></td>      <td> : <input type='radio' name='aktif' value='Y'>Y &nbsp; <input type='radio' name='aktif' value='N'>N </td></tr>
          <tr valign='top'><td><div id='kontentd'>Isi Agenda</div></td>  <td> <textarea name='isi_agenda' style='width: 550px; height: 300px;'></textarea></td></tr>
          <tr><td><div id='kontentd'>Tempat</div></td>    <td> : <input type='text' name='tempat' size='40'></td></tr>

          <tr><td><div id='kontentd'>Tgl Mulai</div></td><td> : <input id='tanggalMulai' type='text' name='tgl_mulai'> </td></tr>
		  <tr><td><div id='kontentd'>Tgl Selesai</div></td><td> : <input id='tanggalSelesai' type='text' name='tgl_selesai'></td></tr>
		  <tr><td><div id='kontentd'>Jam</div></td>    <td> : <input type='text' name='jam' size='40'></td></tr>

          <tr><td><div id='kontentd'>Pengirim <br />(Contact Person)</div></td>    <td valign='top'> : <input type='text' name='pengirim' size='40'></td></tr>
          <tr><td colspan=2><input type='submit' value='Simpan'><input type=button value=Batal onclick=self.history.back()></td></tr>
          </table>
          </form></body>";
    break;
  

  case "editagenda":
    $edit = mysql_query("SELECT * FROM agenda WHERE id_agenda='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Agenda</h2>
          <form method=POST action=$aksi?module=agenda&act=update>
          <input type=hidden name=id value=$r[id_agenda]>
          <table>
          <tr><td>Tema</td>      <td> : <input type=text name='tema' size=60 value='$r[tema]'></td></tr>
          <tr><td>Isi Agenda</td>  <td> <textarea name='isi_agenda' style='width: 400px; height: 150px;'>$r[isi_agenda]</textarea></td></tr>
          <tr><td>Tempat</td>    <td> : <input type=text name='tempat' size=40 value='$r[tempat]'></td></tr>

          <tr><td>Tgl Mulai</td><td> : ";    
          $get_tgl=substr("$r[tgl_mulai]",8,2);
          combotgl(1,31,'tgl_mulai',$get_tgl);
          $get_bln=substr("$r[tgl_mulai]",5,2);
          combobln(1,12,'bln_mulai',$get_bln);
          $get_thn=substr("$r[tgl_mulai]",0,4);
          $thn_skrg=date("Y");
          combothn($thn_sekarang-2,$thn_sekarang+2,'thn_mulai',$get_thn);

    echo "</td></tr>
          <tr><td>Tgl Selesai</td><td> : ";    
          $get_tgl2=substr("$r[tgl_selesai]",8,2);
          combotgl(1,31,'tgl_selesai',$get_tgl2);
          $get_bln2=substr("$r[tgl_selesai]",5,2);
          combobln(1,12,'bln_selesai',$get_bln2);
          $get_thn2=substr("$r[tgl_selesai]",0,4);
          combothn($thn_sekarang-2,$thn_sekarang+2,'thn_selesai',$get_thn2);

    echo "</td></tr>

          <tr><td>Pengirim <br />(Contact Person)</td>    <td> : <input type=text name='pengirim' size=40 value='$r[pengirim]'></td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>

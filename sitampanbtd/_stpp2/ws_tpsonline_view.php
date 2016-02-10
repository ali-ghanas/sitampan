<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}

else
{
  
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
      <link rel="stylesheet" type="text/css" href="lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#bc11tgl").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#editcuti").submit(function() {
                 if ($.trim($("#alasan_cuti").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Alasan Cuti Tak Boleh kosong");
                    $("#alasan_cuti").focus();
                    return false;  
                 }
                  if ($.trim($("#kota_cuti").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Alamat cuti Tak Boleh kosong");
                    $("#kota_cuti").focus();
                    return false;  
                 }
                 if ($.trim($("#nmatasanlangsung").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama atasan langsung Tak Boleh kosong");
                    $("#nmatasanlangsung").focus();
                    return false;  
                 }
                if ($.trim($("#nipatasanlangsung").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> NIP Atasan Langsung Tak Boleh kosong");
                    $("#nipatasanlangsung").focus();
                    return false;  
                 }
                 if ($.trim($("#jabatanatasanlangsung").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Jabatan Atasan Langsung Tak Boleh kosong");
                    $("#jabatanatasanlangsung").focus();
                    return false;  
                 }
                 if ($.trim($("#nmpejabatberwenang").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama Pejabat Berwenang memutuskan cuti Tak Boleh kosong");
                    $("#nmpejabatberwenang").focus();
                    return false;  
                 }
                 if ($.trim($("#nippejabatberwenang").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> NIP Pejabat Berwenang memutuskan cuti Tak Boleh kosong");
                    $("#nippejabatberwenang").focus();
                    return false;  
                 }
                 if ($.trim($("#jabatanpejabatberwenang").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Jabatan Pejabat Berwenang memutuskan cuti Tak Boleh kosong");
                    $("#jabatanpejabatberwenang").focus();
                    return false;  
                 }
                 if ($.trim($("#tahuncuti").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tahun cuti Tak Boleh kosong");
                    $("#tahuncuti").focus();
                    return false;  
                 }
                 if ($.trim($("#lamacuti").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> lamanya cuti Tak Boleh kosong");
                    $("#lamacuti").focus();
                    return false;  
                 }
              });      
           });
        </script> 

</head>

<body>
<?php // aksi untuk edit
session_start();

if(isset($_POST['editsubmit1'])) // jika tombol editsubmit ditekan
	{               
		$bc11no = $_POST['bc11no']; // variable nama = apa yang diinput pada name "nama" 
		$bc11tgl = $_POST['bc11tgl'];
		$bc11pos = $_POST['bc11pos'];
		$bc11subpos = $_POST['bc11subpos'];
                $jmlCont=$_POST['jmlCont'];
                $nip_rekam=$_POST['nip_rekam'];
                $kd_tpsol=$_POST['kd_tpsol'];
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE bcf15 SET
							bc11no='$bc11no',
							bc11tgl='$bc11tgl',
							bc11pos='$bc11pos',
							bc11subpos='$bc11subpos',
                                                        jmlCont='$jmlCont',
                                                        nip_rekam='$nip_rekam',
                                                        kd_tpsol='$kd_tpsol'
                                                        
                        
					WHERE idbcf15='$id'");
                if($edit){
		echo "<script type='text/javascript'>window.location='index.php?hal=pagetpp2&pilih=kon_tpsol_view&id=$id'</script>";
                }
                else {
                    echo "tidak berhasil di edit";
                }
       
        
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15,tpp WHERE bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="editsprint" name="editsprint" action="?hal=pagetpp2&pilih=kon_tpsol_view">
        <input type="hidden" name="id" value="<?php echo  $data['idbcf15']; ?>" />
            <table width="100%"  align="left"  bgcolor="#fff" >
                <tr>
                    <td class="header" colspan="2">Kirim Ke TPS Online(Dalam Perbaikan)</td>
                </tr>
                <tr valign="top" width="100%">
                    <td valign="top" width="50%">
                        <table class="isitabel"  bgcolor="#f8f8f8">
                            
                            <tr>
                                <td  >No / Tgl SPP </td><td width="3">:</td>
                                <td >
                                    <input disabled class="required" id="suratperintahno" name="suratperintahno" size="5" type="text"  value="<?php echo $data['suratperintahno']; ?>" /> / <input disabled class="required" id="suratperintahdate" name="suratperintahdate" type="text" size="10" value="<?php echo $data['suratperintahdate']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >No / Tgl BCF 1.5 </td><td width="3">:</td>
                                <td >
                                    <input disabled class="required" id="bcf15no" name="bcf15no" type="text" size="10" value="<?php echo $data['bcf15no']; ?>" /> / <input disabled class="required" id="bcf15tgl" name="bcf15tgl" type="text" size="10" value="<?php echo $data['bcf15tgl']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >No / Tgl BL </td><td width="3">:</td>
                                <td >
                                    <input disabled class="required" id="blno" name="blno" type="text" size="20" value="<?php echo $data['blno']; ?>" /> / <input class="required" id="bltgl" name="bltgl" type="text" disabled size="10" value="<?php echo $data['bltgl']; ?>" /> 
                                </td>
                                
                            </tr>
                            
                            
                            
                            <tr>
                                <td  >Sarkut / Voy </td><td width="3">:</td>
                                <td >
                                    <input disabled class="required" id="saranapengangkut" name="saranapengangkut" type="text" size="10" value="<?php echo $data['saranapengangkut']; ?>" /> / <input  disabled class="required" id="voy" name="voy" type="text" size="10" value="<?php echo $data['voy']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >TPP </td><td width="3">:</td>
                                <td >
                                    <input disabled class="required" id="nm_tpp" name="nm_tpp" type="text" size="20" value="<?php echo $data['nm_tpp']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >TPS </td><td width="3">:</td>
                                <td >
                                    <input disabled class="required" id="idtps" name="idtps" type="text" size="10" value="<?php echo $data['idtps']; ?>" />
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td  >Jumlah Cont </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="jmlCont" name="jmlCont" type="text" size="10" value="<?php echo $data['jmlCont']; ?>" />
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td  >No / Pos/ Subpos  </td><td width="3">:</td>
                                <td >
                                    <input  class="required" id="bc11no" name="bc11no" type="text" size="5" value="<?php echo $data['bc11no']; ?>" /> / <input class="required" id="bc11pos" name="bc11pos" type="text" size="5" value="<?php echo $data['bc11pos']; ?>" /> /<input class="required" id="bc11subpos" name="bc11subpos" type="text" size="5" value="<?php echo $data['bc11subpos']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Tgl BC 1.1 </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="bc11tgl" name="bc11tgl" type="text" size="10" value="<?php echo $data['bc11tgl']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >NIP Rekam </td><td width="3">:</td>
                                <td >
                                    <input  class="required" size="15" id="nip_rekam" name="nip_rekam" type="text" size="10" value="<?php echo $data['nip_rekam']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td >Type Container </td><td>:</td>
                                <td colspan="3"><select disabled class="required" id="cmbfcl" name="cmbfcl">
                                  <option value="" selected></option>
                                            <?php
                                                $sql = "SELECT * FROM typecode ORDER BY idtypecode";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data1 =mysql_fetch_array($qry)) {
                                                        if ($data1[idtypecode]==$data[idtypecode]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data1[idtypecode]' $cek>$data1[nm_type]</option>";
                                                }
                                                ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td >Kode TPS </td><td>:</td>
                                <td colspan="3"><select  class="required" id="kd_tpsol" name="kd_tpsol">
                                  <option value="" selected></option>
                                            <?php
                                                $sql = "SELECT * FROM sprint_tps ORDER BY kode";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data2 =mysql_fetch_array($qry)) {
                                                        if ($data2[kode]==$data[kd_tpsol]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data2[kode]' $cek>$data2[gudang]</option>";
                                                }
                                                ?>
                                    </select>
                                </td>
                            </tr>
                            
                            
                            <tr>

                                <td colspan="2" align="center"><input  type="submit" name="editsubmit1" value="Simpan"  onclick="javascript:return confirm('Anda Yakin Untuk Merubah data ini ?')"  /></td>
                            </tr>           
                        </table>
                    </td>
                    <td valign="top" width="50%">
                        <table class="isitabel"  bgcolor="#f8f8f8">
                            <tr>
                                <td colspan="7" valign="center" >


                                                <?php
                                                $query = "select * from bcfcontainer where idbcf15=$id";
                                                 $hasil = mysql_query($query);
                                                    echo "<table id=tablemodul border='1'>";
                                                    echo "<tr>
                                                              <th class='judultabel'>No</th>
                                                              <th class='judultabel'>No Container</th>
                                                              <th class='judultabel'>Size</th>
                                                             
                                                          </tr>";  

                                                  $i = 1;
                                                    while($data1 = mysql_fetch_array($hasil)){
                                                     echo "<tr>
                                                            <td class='isitabel'>$i</td>
                                                            <td class='isitabel'>$data1[nocontainer]</td><input type='hidden' id='idcont' name='idcont$i' value='$data[idcontainer]' />
                                                            <td class='isitabel'>$data1[idsize]</td>
                                                            
                                                        </tr>";
                                                      $i++;
                                                }
                                                echo "</table>";
                                                echo "<input type='hidden' name='n' value='$i' /><br/>";

                                                ?>

                                       
                                </td>
                            </tr> 
                        </table>
                    </td>
                </tr>
                
                
                

              </table>
        </form>
    <br/>
    <form method="post" id="editsprint" name="editsprint" action="_stpp2/ws_tpsonline_kirim.php">
        <table border="0">
            <tr>
               
            <td>
                <input  class="required" id="suratperintahno" name="suratperintahno" size="5" type="hidden"  value="<?php echo $data['suratperintahno']; ?>" /> 
                <input  class="required" id="suratperintahdate" name="suratperintahdate" type="hidden" size="10" value="<?php echo $data['suratperintahdate']; ?>" /> 
                <input  class="required" id="bcf15no" name="bcf15no" type="hidden" size="10" value="<?php echo $data['bcf15no']; ?>" /> 
                <input  class="required" id="bcf15tgl" name="bcf15tgl" type="hidden" size="10" value="<?php echo $data['bcf15tgl']; ?>" /> 
                <input  class="required" id="blno" name="blno" type="hidden" size="20" value="<?php echo $data['blno']; ?>" /> 
                <input class="required" id="bltgl" name="bltgl" type="hidden"  size="10" value="<?php echo $data['bltgl']; ?>" /> 
                <input  class="required" id="saranapengangkut" name="saranapengangkut" type="hidden" size="10" value="<?php echo $data['saranapengangkut']; ?>" /> 
                <input   class="required" id="voy" name="voy" type="hidden" size="10" value="<?php echo $data['voy']; ?>" /> 
                <input  class="required" id="nm_tpp" name="nm_tpp" type="hidden" size="20" value="<?php echo $data['nm_tpp']; ?>" />
                <input  class="required" id="idtps" name="idtps" type="hidden" size="10" value="<?php echo $data['idtps']; ?>" />
                <input class="required" id="jmlCont" name="jmlCont" type="hidden" size="10" value="<?php echo $data['jmlCont']; ?>" />
                <input  class="required" id="bc11no" name="bc11no" type="hidden" size="5" value="<?php echo $data['bc11no']; ?>" /> 
                <input class="required" id="bc11pos" name="bc11pos" type="hidden" size="5" value="<?php echo $data['bc11pos']; ?>" /> 
                <input class="required" id="bc11subpos" name="bc11subpos" type="hidden" size="5" value="<?php echo $data['bc11subpos']; ?>" />
                <input class="required" id="bc11tgl" name="bc11tgl" type="hidden" size="10" value="<?php echo $data['bc11tgl']; ?>" /> 
                <input  class="required" size="15" id="nip_rekam" name="nip_rekam" type="hidden" size="10" value="<?php echo $data['nip_rekam']; ?>" />
                <input  class="required" size="15" id="kd_tpsol" name="kd_tpsol" type="hidden" size="10" value="<?php echo $data['kd_tpsol']; ?>" />
                <input  class="required" size="15" id="idbcf15" name="idbcf15" type="text" size="10" value="<?php echo $data['idbcf15']; ?>" />
            </td>
            </tr>
            <tr>
                <td><input  type="submit" name="kirim" value="Kirim"  onclick="javascript:return confirm('Anda Yakin Untuk Kirim data ini ?')"  /></td>
            </tr>
        </table>
    </form>
        
	<?php
        
        
        }; // penutup else
?>

</body>
</html>
<?php
};
?>
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
<html>
    <head>
    <title>SITAMPAN-Sistem Informasi Tempat Penimbunan</title>
    <!--       jquery anytimes -->
        
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
       
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#sprint").submit(function() {
                 if ($.trim($("#txtsprint").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?>  Sprint tidak boleh kosong");
                    $("#txtsprint").focus();
                    return false;  
                 }
                  if ($.trim($("#cmbtp2").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Pilih kode surat Penimbunan 2 ");
                    $("#cmbtp2").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbtpp2").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Seksinya Belum dipilih ");
                    $("#cmbtpp2").focus();
                    return false;  
                 }
                 
                 
                 
              });      
           });
        </script> 
    
    </head>
    <body>
       
	     <?php // aksi untuk edit
session_start();


if(isset($_POST['editsubmit4'])) // jika tombol editsubmit ditekan
	{ 
                $sql = "SELECT * FROM bcf15 where suratperintahno='txtsprint' and suratperintahdate='txttglsprint' ";
                     $query = mysql_query($sql);
                     $cek=mysql_numrows($query);
                    if($cek>0){
                    echo '<script type="text/javascript">
                    alert("No Surat Pernah di input");</script>';
                    
                }
                else {
                $id = $_POST['id']; 
		$txtsprint = $_POST['txtsprint']; 
                $cmbtp2 = $_POST['cmbtp2'];
                $txttglsprint = $_POST['txttglsprint'];
                $txtbcf15no = $_POST['txtbcf15no'];
                $txttahun = $_POST['txttahun'];
                $cmbtpp2 = $_POST['cmbtpp2'];
                $tglkini=date('Y-m-d');
                $tahunkini=date('Y');
                
                
                $id = $_POST['id'];
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
							suratperintahno='$txtsprint',
							idtp2='$cmbtp2',										
                                                        suratperintahdate='$txttglsprint',
                                                        Perintah='1',
                                                        idseksitp2='$cmbtpp2',
                                                        validasibcf15baru='3'
                        
                                                        	WHERE idbcf15='$id'");
                
                mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Surat Perintah Penarikan','$tglkini','$txtbcf15no','$txttahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtsprint','$txttglsprint')");
                    echo "<meta http-equiv='refresh' content='0; url=?hal=sprintok&id=$id'>";
                }         
        }
        else 
	{ 
        $tahunkini=date('Y');
	$id = $_GET['id']; // menangkap id
	$sql = "select idbcf15, bcf15no, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl, bc11no, DATE_FORMAT(bc11tgl,'%d %M %Y') as bc11tgl, bc11pos, bc11pos, blno, DATE_FORMAT(bltgl,'%d %M %Y') as bltgl, idtpp,idmanifest, Perintah, suratperintahno, idtp2, suratperintahdate, tahun,idseksitp2  FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        ?>
        <form method="post" id="sprint" name="sprint" action="?hal=sprint">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?>" />
        <input type="hidden" name="txttahun" value="<?php echo $bcf15['tahun']; ?>" />
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="3">
                <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b>Surat Perintah Penarikan</b> </td></tr>
                <tr>
                    <td   align="left" >No Sprint : </td> 
                    <td ><input name="txtsprint" id="txtsprint" class="required" type="text" value="<?php echo $bcf15['suratperintahno']; ?>" size="8" maxlength="6"></input>
                    <select id="cmbtp2" name="cmbtp2" class="required">
                        <option value="" selected >--kd surat tp2--</option>
                                <?php
                                    $sql = "SELECT * FROM tp2 ORDER BY idtp2";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[idtp2]==$bcf15[idtp2]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[idtp2]' $cek>$data[kd_tp2]</option>";
                                    }
                                    ?>
                        </select><input class="required" disabled name="txttahun" id="txttahun" type="text" value="<?php echo $tahunkini; ?>" ></input>
                    </td> 
                </tr>
                <tr>
                    <td align="left">Tgl Sprint : </td>
                    <td><input  class="required"  id="tanggal" type="text" name="txttglsprint" value="<?php echo $bcf15['suratperintahdate']; ?>" ></input></td>
                </tr>
                <tr>
                     <td  align="left"  >Seksi : </td>
                    <td colspan="2">
                    <select class="required" id="cmbtpp2" name="cmbtpp2" >
                        <option value = "" >--Pilih Seksi--</option>
                        <?php
                            $sql = "SELECT * FROM seksi where kdseksi='tpp2' ORDER BY idseksi ";
                            $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                    if ($data[idseksi]==$bcf15[idseksitp2]) {
                                        $cek="selected";
                                        }
                                   else {
                                        $cek="";
                                        }
                                        echo "<option value='$data[idseksi]' $cek>$data[nm_seksi]  $data[plh]</option>";
                                    }
                                    
                      ?>  
                    </select> 
                    </td>
                </tr>
                
                
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Detail BCF 1.5</b></td></tr>
                <tr>
                    
                </tr>    
            <tr>
                <td align="right" >No BCF 15  : </td> 
                <td ><input class="required" name="txtbcf15no" value="<?php echo $bcf15['bcf15no']; ?> " disabled />
                <select disabled id="cmbmanifest" name="cmbmanifest" class="required">
                  <option value="" selected></option>
                            <?php
                                $sql = "SELECT * FROM manifest ORDER BY idmanifest";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idmanifest]==$bcf15[idmanifest]) {
                                                $cek="selected";
                                        }
                                        else {
                                                $cek="";
                                        }
                                        echo "<option value='$data[idmanifest]' $cek>$data[kd_manifest]</option>";
                                }
                                ?>
                    </select><input class="required" disabled name="txttahun" id="txttahun" type="text" value="<?php echo $bcf15['tahun']; ?>" ></input>
                </td> 
            </tr>
            <tr>
                <td  align="right"   >Tgl BCF 15 : </td>
                <td><input  class="required" name="txtbcf15tgl" value="<?php echo $bcf15['bcf15tgl']; ?>" disabled  /></td>
            </tr>
            <tr>
                <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Manifest</b></td>
            </tr>
            <tr>
            
            <td align="right">TPP Tujuan :</td>
                <td><select class="required" disabled  id="cmbtpp" name="cmbtpp">
                  <option value="" selected></option>
                            <?php
                                $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                $qry = @mysql_query($sql) or die ("Gagal query");
                                while ($data =mysql_fetch_array($qry)) {
                                        if ($data[idtpp]==$bcf15[idtpp]) {
                                                $cek="selected";
                                        }
                                        else {
                                                $cek="";
                                        }
                                        echo "<option value='$data[idtpp]' $cek>$data[nm_tpp]</option>";
                                }
                                ?>
                    </select>
                </td>
                
            </tr>
            
                <tr>
                 <td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>Data Kontainer </b></td>
            </tr>
            <tr>
                <td colspan="2">
                    
                        <table cellspacing="0" cellpadding="3">
                            <tr>
                                <td class="judultabel">Id BCF 15</td>
                                <td class="judultabel">No Container</td>
                                <td class="judultabel">Size</td>

                            </tr>
                                <?php
                                    $rowset = mysql_query("select * from bcfcontainer where idbcf15=$id");
                                     while($bcfcont = mysql_fetch_array($rowset)){

                                         if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                echo "<tr class=highlight1>";
                                $j++;
                                }
                else
                                {
                                echo "<tr class=highlight2>";
                                $j--;
                                }


                                ?>
                            <tr>
                                <td class="isitabel"><?php echo $bcfcont['idbcf15'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['nocontainer'];?></td>
                                <td class="isitabel"><?php echo $bcfcont['idsize'];?></td>

                            </tr>
                            <?php };?>
                        </table>
                </td>
            </tr>
            <tr align="center"><td height="22" colspan="5" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
            <tr><td><input class="button putih bigrounded " type="submit" name="editsubmit4" value="Simpan"  /></td><td><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
            
            </table>
        </form>

	
        
<!--        <script type="text/javascript">new Validation('bcfedit',{useTitles : true},{stopOnFirst:true}, {immediate : true});</script>-->
	<?php
                     $sql = "SELECT * FROM bcf15 where suratperintahno='$txtsprint' and suratperintahdate='$txttglsprint' ";
                     $query = mysql_query($sql);
                     $cek=mysql_numrows($query);
                    if($cek>0){
                    echo '<script type="text/javascript">
                    alert("No Surat Pernah di input");</script>';
                    
                }
                
               

                    }; // penutup else
            ?>
      
            

</body>
</html>
<?php
};
?>
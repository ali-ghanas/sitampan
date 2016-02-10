<?php
include "lib/koneksi.php";
include "lib/function.php";
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
               $("#tanggal2").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal3").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
       
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#tutuppos").submit(function() {
                 if ($.trim($("#DokumenCode").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Jenis Dokumen Belum di Pilih");
                    $("#DokumenCode").focus();
                    return false;  
                 }
                 
                 if ($.trim($("#DokumenNo").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nomor dokumen belum diisi ");
                    $("#DokumenNo").focus();
                    return false;  
                 }
                 if ($.trim($("#Dokumen2Code").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Jenis Dokumen keduannya belum dipilih.  ");
                    $("#Dokumen2Code").focus();
                    return false;  
                 }
                 if ($.trim($("#DokumenNo").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nomor dokumen keduannya belum diisi. ");
                    $("#DokumenNo").focus();
                    return false;  
                 }
                
                  
              });      
           });
        </script> 

</head>

<body>
    <?php // aksi untuk edit
session_start();


if(isset($_POST['addsubmit'])) // jika tombol editsubmit ditekan
	{
                
                $alasantutuppos = $_POST['alasantutuppos'];
                $iduser=$_SESSION['id'];
                $tgl = date("Y-m-d");
                
                $DokumenCode = $_POST['DokumenCode'];
                $DokumenNo = $_POST['DokumenNo'];
                $DokumenDate = $_POST['DokumenDate'];
                $Dokumen2Code = $_POST['Dokumen2Code'];
                $Dokumen2No = $_POST['Dokumen2No'];
                $Dokumen2Date = $_POST['Dokumen2Date'];
                if($Dokumen2Code==''){ $setujubatal='2';}else {$setujubatal='1';}
                if($Dokumen2Code==''){ $SetujuBatalNo='';}else {$SetujuBatalNo='System';}
                
                if($Dokumen2Code==''){ $tutuppos='';}else {$tutuppos='1';}
               
                $id = $_POST['id'];
                
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
		 					setujubatal='1',
							SetujuBatalNo='$SetujuBatalNo',
                                                        
							SetujuBatalDate='$SetujuBatalDate',
                                                        DokumenCode='$DokumenCode',
                                                        DokumenNo='$DokumenNo',
                                                        DokumenDate='$DokumenDate',
                                                        Dokumen2Code='$Dokumen2Code',
                                                        Dokumen2No='$Dokumen2No',
                                                        Dokumen2Date='$Dokumen2Date'
                                                        
                        
                                                        	WHERE idbcf15='$id'");
                
                mysql_query("INSERT INTO tutuppos_bcf15(
                                idbcf15,
                                keterangan_penutupan, 
                                iduser, 
                                tgltutup
                         )
                        
		VALUES(
                        '$id',
                        '$alasantutuppos', 
                        '$iduser', 
                        '$tgl'
                        
                        )");
                
                    echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15pemwas&pilih=bcf15tutuppos&id=$id'</script>";
                              
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunkini=date('Y');
        
        $sqltutuppem = "SELECT * from tutuppos_bcf15 WHERE  idbcf15=$bcf15[idbcf15]"; // memanggil data dengan id yang ditangkap tadi
        $querytutuppem = mysql_query($sqltutuppem);
        $datatutuppem= mysql_fetch_array($querytutuppem);
        
        ?>


	
        <form method="post" id="tutuppos" name="tutuppos" action="?hal=pagebcf15pemwas&pilih=bcf15tutuppos">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td ><font color="#B39181"  size="5"><strong>Penutupan POS BTD Menjadi BMN dan BTD Laku Lelang</strong></font></td>
                </tr>
                
                <tr > 
                    <td colspan="2">
                        <table class="isitabel" width="100%" bgcolor="#f8f8f8">
                            
                            <tr>
                                <td >
                                    <font color="#B39181" ><b>BCF 1.5</b></font>
                                </td>
                                <td>
                                    <font color="#B39181">:</font>
                                </td>
                                <td >
                                    <font color="#B39181"><?php echo $bcf15['bcf15no']; ?>  Tanggal :  <?php echo tglindo($bcf15['bcf15tgl']); ?></font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td >
                                    <font color="#B39181" ><b>BC 1.1</b></font>
                                </td>
                                <td>
                                    <font color="#B39181">:</font>
                                </td>
                                <td >
                                    <font color="#B39181"><?php echo $bcf15['bc11no']; ?> / <?php echo tglindo($bcf15['bc11tgl']); ?> / Pos <?php echo $bcf15['bc11pos']; ?> / Sub Pos : <?php echo $bcf15['bc11subpos']; ?></font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td >
                                    <font color="#B39181" ><b>Consignee</b></font>
                                </td>
                                <td>
                                    <font color="#B39181">:</font>
                                </td>
                                <td >
                                    <font color="#B39181"><?php echo $bcf15['consignee']; ?> /  Notify : <?php echo $bcf15['notify']; ?></font>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td >
                                    <font color="#B39181" ><b>No NHP</b></font>
                                </td>
                                <td>
                                    <font color="#B39181">:</font>
                                </td>
                                <td >
                                    <font color="#B39181"><?php echo $bcf15['NHPLelangNo']; ?> / <?php echo $bcf15['NHPLelangDate']; ?></font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td >
                                    <font color="#B39181" ><b>Petugas Pencacahan</b></font>
                                </td>
                                <td>
                                    <font color="#B39181">:</font>
                                </td>
                                <td >
                                    <select disabled class="required" id="idpemeriksa_tpp" name="idpemeriksa_tpp">
                                    <option value="" selected>--Pilih Pemeriksa TPP--</option>
                                            <?php
                                                $sql = "SELECT * FROM pemeriksa_tpp ORDER BY idpemeriksa_tpp";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idpemeriksa_tpp]==$bcf15[idpemeriksa_tpp]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data[idpemeriksa_tpp]' $cek>$data[nm_pemeriksa]</option>";
                                                }
                                                ?>
                                    </select>
                                </td>
                                
                            </tr>
                            <tr>
                                <td >
                                    <font color="#B39181" ><b>Status AKhir</b></font>
                                </td>
                                <td>
                                    <font color="#B39181">:</font>
                                </td>
                                <td >
                                    <select disabled class="required" id="idstatusakhir" name="idstatusakhir">
                                    <option value="" selected>--Status Akhir--</option>
                                            <?php
                                                $sql = "SELECT * FROM statusakhir ORDER BY idstatusakhir";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                        if ($data[idstatusakhir]==$bcf15[idstatusakhir]) {
                                                                $cek="selected";
                                                        }
                                                        else {
                                                                $cek="";
                                                        }
                                                        echo "<option value='$data[idstatusakhir]' $cek>$data[statusakhirname]</option>";
                                                }
                                                ?>
                                    </select>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td colspan="3"><hr></hr></td>
                            </tr>
                            <tr>
                                <td >
                                    <font color="#B39181" ><b>KEP BMN</b></font>
                                </td>
                                <td>
                                    <font color="#B39181">:</font>
                                </td>
                                <td >
                                    <font color="#B39181"><?php echo $bcf15['KepBMNNo']; ?> / <?php echo $bcf15['KepBMNDate']; ?></font>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td >
                                    <font color="#B39181" ><b>KEP BTD Lelang I</b></font>
                                </td>
                                <td>
                                    <font color="#B39181">:</font>
                                </td>
                                <td  >
                                    <font color="#B39181"><?php echo $bcf15['KepLelang1No']; ?> / <?php echo $bcf15['KepLelang1Date']; ?></font>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td >
                                    <font color="#B39181" ><b>KEP BTD Lelang II</b></font>
                                </td>
                                <td>
                                    <font color="#B39181">:</font>
                                </td>
                                <td >
                                   <font color="#B39181"><?php echo $bcf15['KepLelang2No']; ?> / <?php echo $bcf15['KepLelang2Date']; ?> </font>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td >
                                    <font color="#B39181" ><b>KEP Musnah</b></font>
                                </td>
                                <td>
                                    <font color="#B39181">:</font>
                                </td>
                                <td >
                                   <font color="#B39181"><?php echo $bcf15['KepMusnahNo']; ?> / <?php echo $bcf15['KepMusnahDate']; ?></font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  colspan="3">
                                    <font color="#1589E7" ><b><hr></hr></b></font>
                                </td>
                                
                                
                            </tr>
                            
                            <tr>
                           <td >
                                <font color="#1589E7" ><b>Dokumen Pengeluaran</b></font>
                            </td>
                            
                            <td>
                                <font color="#1589E7">:</font>
                            </td>
                            <td>
                                <select  id="DokumenCode" name="DokumenCode" >
                                <option value="" selected>--Dokumen Pengeluaran--</option>
                                <?php
                                    $sql = "SELECT * FROM dokumen ORDER BY iddokumen";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[iddokumen]==$bcf15[DokumenCode]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[iddokumen]' $cek>$data[dokumenname]</option>";
                                    }
                                    ?>
                             </select></td>
                            
                        </tr>
                        <tr>
                            <td >
                                <font color="#1589E7" ><b>No / Tgl Dokumen</b></font>
                            </td>
                            <td>
                                <font color="#1589E7">:</font>
                            </td>
                            <td>
                                <input type="text" id="DokumenNo" name="DokumenNo" value="<?php echo $bcf15['DokumenNo']; ?>"/> / <input type="text"  name="DokumenDate" id="tanggal2" value="<?php echo $bcf15['DokumenDate'] ?>"/>
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <td >
                                <font color="#1589E7" ><b>Dokumen Pengeluaran (SPPB)</b></font>
                            </td>
                            
                            <td>
                                <font color="#1589E7">:</font>
                            </td>
                            <td>
                                <select  id="Dokumen2Code" name="Dokumen2Code" >
                                <option value="" selected>--Dokumen Pengeluaran--</option>
                                <?php
                                    $sql = "SELECT * FROM dokumen ORDER BY iddokumen";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                    while ($data =mysql_fetch_array($qry)) {
                                            if ($data[iddokumen]==$bcf15[Dokumen2Code]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                            echo "<option value='$data[iddokumen]' $cek>$data[dokumenname]</option>";
                                    }
                                    ?>
                        </select></td>
                            
                        </tr>
                        <tr>
                            <td >
                                <font color="#1589E7" ><b>No / Tgl Dokumen</b></font>
                            </td>
                            <td>
                                <font color="#1589E7">:</font>
                            </td>
                            <td>
                                <input type="text" id="Dokumen2No" name="Dokumen2No" value="<?php echo $bcf15['Dokumen2No']; ?>"/> / <input type="text"  name="Dokumen2Date" id="tanggal3" value="<?php echo $bcf15['Dokumen2Date'] ?>"/>
                                
                            </td>
                            
                        </tr>
                        <tr>
                            <td >
                                <font color="#1589E7" ><b>Keterangan Penutupan</b></font>
                            </td>
                            <td>
                                <font color="#1589E7">:</font>
                            </td>
                            <td>
                                <textarea type="text" cols="50" rows="3" id="alasantutuppos" name="alasantutuppos" ><?php echo $datatutuppem['keterangan_penutupan']; ?></textarea> 
                                
                            </td>
                            
                        </tr>
                           
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="addsubmit" value="Rekam"   /></td>
                            </tr>           
                        </table>
                    </td>
                    
                    
                </tr>
                
                

              </table>
        </form>
    
   
    <?php
//       
        }; // penutup else
?>
    
</body>
</html>
<?php

};
?>
        
	
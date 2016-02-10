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
               $("#tglsurattutuppos").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#txttanggaldok1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#txttanggaldok2").datepicker({
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
                 if ($.trim($("#alasantutuppos").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Isikan Alasan tutup pos BCF 1.5 ini!");
                    $("#alasantutuppos").focus();
                    return false;  
                 }
                 
                 if ($.trim($("#statusakhir").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Update Status BCF 1.5 ");
                    $("#statusakhir").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbdok1").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Wajib di isi dokumen pemberitahuannya  ");
                    $("#cmbdok1").focus();
                    return false;  
                 }
                 if ($.trim($("#txtnodok1").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Wajib di isi No dokumen pemberitahuannya  ");
                    $("#txtnodok1").focus();
                    return false;  
                 }
                 if ($.trim($("#txttanggaldok1").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Wajib di isi tgl dokumen pemberitahuannya  ");
                    $("#txttanggaldok1").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbdok2").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Wajib di isi  dokumen pengeluarannnya  ");
                    $("#cmbdok2").focus();
                    return false;  
                 }
                 if ($.trim($("#txtnodok2").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Wajib di isi No  dokumen pengeluarannnya  ");
                    $("#txtnodok2").focus();
                    return false;  
                 }
                 if ($.trim($("#txttanggaldok2").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Wajib di isi tgl dokumen pengeluarannnya  ");
                    $("#txttanggaldok2").focus();
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
                $nosurattutuppos= $_POST['nosurattutuppos']; 
		$tglsurattutuppos = $_POST['tglsurattutuppos']; 
                $alasantutuppos = $_POST['alasantutuppos'];
                $statusakhir = $_POST['statusakhir'];
                
                $cmbdok1 = $_POST['cmbdok1'];
                $txtnodok1 = $_POST['txtnodok1'];
                $txttanggaldok1 = $_POST['txttanggaldok1'];
                $cmbdok2 = $_POST['cmbdok2'];
                $txtnodok2 = $_POST['txtnodok2'];
                $txttanggaldok2 = $_POST['txttanggaldok2'];
                if($txtnodok2==''){ $setujubatal='2';}else {$setujubatal='1';}
                
                
                if($txtnodok2==''){ $tutuppos='';}else {$tutuppos='1';}
               
                $id = $_POST['id'];
                
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
		 					tutuppos='$tutuppos',
							nosurattutuppos='$nosurattutuppos',
							tglsurattutuppos='$tglsurattutuppos',
                                                        alasantutuppos='$alasantutuppos',
                                                        idstatusakhir='$statusakhir',
                                                        
                                                        setujubatal='$setujubatal',
                                                        DokumenCode='$cmbdok1',
                                                        DokumenNo='$txtnodok1',
                                                        DokumenDate='$txttanggaldok1',
                                                        Dokumen2Code='$cmbdok2',
                                                        Dokumen2No='$txtnodok2',
                                                        Dokumen2Date='$txttanggaldok2'
                                                        
                        
                                                        	WHERE idbcf15='$id'");
                
                
                    echo '<script type="text/javascript">window.location="index.php?hal=tutuposbcf15"</script>';
                              
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunkini=date('Y');
        
        ?>


	
        <form method="post" id="tutuppos" name="tutuppos" action="?hal=intutuposbcf15">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Penutupan POS BCF 1.5 (By sistem)</td>
                </tr>
                <tr>
                    <td class="header">Adalah Penutupan pos BCF 1.5 dikarenakan : BCF 1.5 dobel diinput oleh manifest, BCF 1.5 belum ditarik ke TPP karena telah di Gudang Importir, serta alasan lainnya yang dapat dipertanggungjawabkan dikemudian hari.</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            <tr>
                                <td  >No /Tgl BCF 1.5 </td><td width="3">:</td>
                                <td >
                                    <font size="3"><b><?php echo "$bcf15[bcf15no]"; ?> / <?php echo tglindo($bcf15['bcf15tgl']); ?></b></font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >No /Tgl BC 1.1 </td><td width="3">:</td>
                                <td >
                                    <font size="3"><b><?php echo "$bcf15[bc11no]"; ?> / <?php echo tglindo($bcf15['bc11tgl']); ?> pos <?php echo $bcf15['bc11pos'] ?></b></font>
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >No Surat Permohonan (Jika Ada) </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nosurattutuppos" name="nosurattutuppos" type="text"  value="<?php echo $bcf15['nosurattutuppos']; ?>" /> / <input class="required" id="tglsurattutuppos" name="tglsurattutuppos" type="text"  value="<?php echo $bcf15['tglsurattutuppos']; ?>" /> 
                                </td>
                                
                            </tr>
                            
                            <tr>
                                <td  >Alasan / Keterangan Lainnya </td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="alasantutuppos" name="alasantutuppos" type="text"   ><?php echo $bcf15['alasantutuppos']; ?></textarea> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Update Status BCF 1.5 </td><td width="3">:</td>
                                <td >
                                   <select class="required" id="statusakhir" name="statusakhir">
                                      <option value="" selected>::Pilih Status Terakhir::</option>
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
                                <td  align="left"  >Dokumen </td><td>:</td>
                                <td><select class="required"  id="cmbdok1" name="cmbdok1" >
                                    <option value="" selected>--Dokumen Pemberitahuan--</option>
                                            <?php
                                                $sql = "SELECT * FROM dokumen where jenis='pemberitahuan' ORDER BY iddokumen";
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
                                <td  align="left"  >Nomor </td><td>:</td>
                                <td ><input  name="txtnodok1" id="txtnodok1" class="required" type="text" value="<?php echo $bcf15['DokumenNo']; ?>" ></input></td>
                            </tr>
                            <tr>
                                <td  align="left"  >Tanggal </td><td>:</td>
                                <td><input  name="txttanggaldok1" id="txttanggaldok1" class="required" type="text" value="<?php echo $bcf15['DokumenDate']; ?>" ></input></td>
                            </tr>
                            <tr>
                                <td  align="left"  >Dokumen </td><td>:</td>
                                <td><select class="required"  id="cmbdok2" name="cmbdok2" >
                                    <option value="" selected>--Dokumen Pengeluaran--</option>
                                            <?php
                                                $sql = "SELECT * FROM dokumen where jenis='keluar' ORDER BY iddokumen";
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
                                <td  align="left"  >Nomor </td><td>:</td>
                                <td ><input  name="txtnodok2" id="txtnodok2" class="required" type="text" value="<?php echo $bcf15['Dokumen2No']; ?>" ></input></td>
                            </tr>
                            <tr>
                                <td  align="left"  >Tanggal </td><td>:</td>
                                <td ><input  name="txttanggaldok2" id="txttanggaldok2" class="required" type="text" value="<?php echo $bcf15['Dokumen2Date']; ?>" ></input></td>
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
        
	
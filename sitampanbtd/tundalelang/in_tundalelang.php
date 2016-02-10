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
               $("#tglsuratpermohonan").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
       
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#tundalelang").submit(function() {
                 if ($.trim($("#nosuratpermohonan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Isikan Nomor Surat Permohonan Tunda Lelang");
                    $("#nosuratpermohonan").focus();
                    return false;  
                 }
                 if ($.trim($("#asalsuratpermohonan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Isikan Asal Surat Permohonan Tunda Lelang");
                    $("#asalsuratpermohonan").focus();
                    return false;  
                 }
                 if ($.trim($("#statusakhir").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Update Status BCF 1.5 ");
                    $("#statusakhir").focus();
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
                $nosuratpermohonan= $_POST['nosuratpermohonan']; 
		$tglsuratpermohonan = $_POST['tglsuratpermohonan']; 
                $asalsuratpermohonan = $_POST['asalsuratpermohonan'];
                $alasantundalelang = $_POST['alasantundalelang'];
                $statusakhir = $_POST['statusakhir'];
                
                if($nosuratpermohonan==''){ $tundalelang='';}else {$tundalelang='1';}
               
                $id = $_POST['id'];
                
                
//                echo $txtnobcf15; 
//                echo $cmbkodemanifest;
//                echo  $txttglbcf15;
//                echo  $txtbc11no;
//                echo  $txtbc11tgl;

		$edit = mysql_query("UPDATE bcf15 SET
		 					tundalelang='$tundalelang',
							nosuratpermohonan='$nosuratpermohonan',
							tglsuratpermohonan='$tglsuratpermohonan',
                                                        asalsuratpermohonan='$asalsuratpermohonan',
                                                        alasantundalelang='$alasantundalelang',
                                                        idstatusakhir='$statusakhir'
                                                        
                        
                                                        	WHERE idbcf15='$id'");
                
                
                    echo '<script type="text/javascript">window.location="index.php?hal=tundalelang"</script>';
                              
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15 WHERE idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tahunkini=date('Y');
        
        ?>


	
        <form method="post" id="tundalelang" name="tundalelang" action="?hal=input_tundalelang">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Permohonan Tunda Lelang</td>
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
                                <td  >No Permohonan Tunda Lelang </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="nosuratpermohonan" name="nosuratpermohonan" type="text"  value="<?php echo $bcf15['nosuratpermohonan']; ?>" /> / <input class="required" id="tglsuratpermohonan" name="tglsuratpermohonan" type="text"  value="<?php echo $bcf15['tglsuratpermohonan']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Asal Surat Permohonan Tunda Lelang </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="asalsuratpermohonan" name="asalsuratpermohonan" type="text"  value="<?php echo $bcf15['asalsuratpermohonan']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Alasan / Keterangan Lainnya </td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="alasantundalelang" name="alasantundalelang" type="text"   ><?php echo $bcf15['alasantundalelang']; ?></textarea> 
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
        
	
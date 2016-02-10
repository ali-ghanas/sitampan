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
  
      
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tglnd").datepicker({
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
                 if ($.trim($("#nond").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Nota Dinas Roling  Tak Boleh kosong");
                    $("#nond").focus();
                    return false;  
                 }
                  if ($.trim($("#tglnd").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tanggal Nota Dinas  Tak Boleh kosong");
                    $("#tglnd").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 

</head>

<body>
<?php // aksi untuk edit
session_start();

if(isset($_POST['editsubmit'])) // jika tombol editsubmit ditekan
	{               
		$nond = $_POST['nond']; // variable nama = apa yang diinput pada name "nama" 
		$tglnd = $_POST['tglnd'];
		$hal_roling = $_POST['hal_roling'];
		$kepada = $_POST['kepada'];
                $darind = $_POST['darind'];
                $idseksi = $_POST['idseksi'];
                $tmt_roling = $_POST['tmt_roling'];
                
		$id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE ndroling SET
							nond='$nond',
							tglnd='$tglnd',
							hal_roling='$hal_roling',
							kepada='$kepada',
                                                        darind='$darind',
                                                        idseksi='$idseksi',
                                                        tmt_roling='$tmt_roling'
                                                        
                        
					WHERE idndroling='$id'");
                if($edit){
		echo '<script type="text/javascript">window.location="index.php?hal=in_roling"</script>';
                }
                else {
                    echo "tidak berhasil di edit";
                }
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM ndroling WHERE idndroling=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

	
        <form method="post" id="edit_roling" name="edit_roling" action="?hal=edit_roling">
        <input type="hidden" name="id" value="<?php echo  $data['idndroling']; ?>" />
            <table width="100%"  align="left" cellpadding="2" cellspacing="2" bgcolor="#fff" >
                <tr>
                    <td class="header">Input ND Roling</td>
                </tr>
                <tr >
                    <td>
                        <table class="isitabel" bgcolor="#f8f8f8">
                            <tr>
                                <td  >No ND </td><td width="3">:</td>
                                <td >
                                    <input backgroundcolor="red" class="required" id="nond" name="nond" type="text" size="15" value="<?php echo $data['nond']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Tanggal ND </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="tglnd" name="tglnd" type="text"  size="12"  value="<?php echo $data['tglnd']; ?>" />
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Kepada </td><td width="3">:</td>
                                <td >
                                    <textarea class="required" id="kepada" name="kepada" type="text" rows="3" cols="60" size="50"  ><?php echo $data['kepada']; ?></textarea> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Dari </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="darind" name="darind" type="text"  value="<?php echo $data['darind']?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >Hal </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="hal_roling" name="hal_roling" type="text"  value="<?php echo $data['hal_roling']; ?>" /> 
                                </td>
                                
                            </tr>
                            <tr>
                                <td  >TMT </td><td width="3">:</td>
                                <td >
                                    <input class="required" id="tmt_roling" name="tmt_roling" type="text"  value="<?php echo $data['tmt_roling']; ?>"  size="10"/><img src="images/calendar.png" /> (<font color="red">yyyy-mm-dd</font>)
                                </td>
                            </tr>
                            <tr>
                                <td  >Penanda Tangan ND</td><td width="3">:</td>
                                <td >
                                    <select class="required" id="idseksi" name="idseksi" >
                                        <option value = "" >--Seksi--</option>
                                        <?php
                                            $sql = "SELECT * FROM seksi where status_seksi='aktif' and kdseksi='tpp3' ORDER BY idseksi";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[idseksi]==$data['idseksi']) {
                                                        $cek="selected";
                                                        }
                                                   else {
                                                        $cek="";
                                                        }
                                                        echo "<option value='$data[idseksi]' $cek>$data[nm_seksi]</option>";
                                                    }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>

                                 <td colspan="3" align="center"><input class="button putih bigrounded " type="submit" name="editsubmit" value="Edit"   /></td>
                            </tr>           
                        </table>
                    </td>
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
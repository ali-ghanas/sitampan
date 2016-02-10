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
              $("#addlevel").submit(function() {
                 if ($.trim($("#akses").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tambahkan Hak Akses");
                    $("#akses").focus();
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
		
                        
                        $id = $_POST['id'];
                        $akses = $_POST['akses'];
                        $sqlcek = "SELECT * FROM userhak WHERE  iduser=$id and iduserlevel=$akses"; // memanggil data dengan id yang ditangkap tadi
                        $querycek = mysql_query($sqlcek);
                        $datacek=mysql_num_rows($querycek);
                        if($datacek>0){
                            echo "sudah ada didatabase";
                        }
                        else {
                          mysql_query("INSERT INTO userhak(iduser, iduserlevel)
                                   VALUES('$id', '$akses')");
                         
                        }
                         echo "<script type='text/javascript'>window.location='index.php?hal=addlevel&id=$id'</script>";
		
		
		
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM user WHERE  iduser=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$datauser = mysql_fetch_array($query);
        
        
        ?>

	
        <form method="post" id="addlevel" name="addlevel" action="?hal=addlevel">
        <input type="hidden" name="id" value="<?php echo  $datauser['iduser']; ?>" />
        
            <table border="0" bgcolor="#fff">
                <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Tambah Level Akses</b> </td>
                </tr>
                <tr>
                    <td class="isitabelnew">Username</td><td class="isitabelnew">:</td>
                    <td ><input class="required" disabled name="username" size="40" type="text" value="<?php echo  $datauser['username']; ?>"  /></td>
                </tr>
                <tr>
                      <td height="20" align="center" colspan="6" bgcolor="#dfe9ff"><b>DATA PEGAWAI</b></td>
                </tr>
                <tr >
                    <td class="isitabelnew">Nama /Nip Pegawai</td><td class="isitabelnew">:</td>
                    <td><input class="required" disabled name="nama" id="nama" type="text" value="<?php echo  $datauser['nm_lengkap']; ?>" />/<input disabled class="required" size="40" id="nip" name="nip" type="text" value="<?php echo  $datauser['nip_baru']; ?>" /><br /></td>
                </tr>
                <tr><td class="judulform">Hak Akses</td><td class="judulform">:</td><td> 
               <select  class="required" id="akses" name="akses">
                <option value = "" >--pilih--</option>
                <?php
                    $sql = "SELECT * FROM userlevel  ";
                    $qry = @mysql_query($sql) or die ("Gagal query");
                        while ($data =mysql_fetch_array($qry)) {
                            if ($data[level]==$_POST['akses']) {
				$cek="selected";
                                }
                           else {
				$cek="";
                                }
                                echo "<option value='$data[iduserlevel]' $cek>$data[nm_level] </option>";
                            }
		?>
            </select></td></tr>
                <tr><td></td><td></td><td><input class="button putih bigrounded " type="submit" name="editsubmit1" value="Tambah Hak Akses" onclick="javascript:return confirm('Anda Yakin Untuk Merubah Data ?')" /></td></tr>
                <tr>
                    <td colspan="3">
                        <?php
                        $sqlhak = "SELECT * FROM userhak,userlevel WHERE userhak.iduserlevel=userlevel.iduserlevel and  iduser=$id"; // memanggil data dengan id yang ditangkap tadi
                        $queryhak = mysql_query($sqlhak);
                        
                        ?>
                        <table class="data">
                            <tr>
                                <th class="isitabelnew">No</th>
                                <th class="isitabelnew">Pegawai</th>
                                <th class="isitabelnew">Level</th>
                                <th class="isitabelnew">Hapus</th>
                            </tr>
                            <?php
                            $awal=1;
                            while($datahak = mysql_fetch_array($queryhak)){

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
                            <td align="center" class="isitabel"><?php echo  $awal++; ?></td>
                            <td class="isitabel"><?php echo  $datauser['nm_lengkap']; ?></td>
                            <td class="isitabel"><?php echo  $datahak['nm_level']; ?></td>
                            <td class="isitabel"><a href=?hal=dellevel&id=<?php echo $datahak[iduserhak]  ?>&iduser=<?php echo $datauser['iduser']  ?>>Hapus</a></td>
                            </tr>
                            <?php
                            };
                            ?>
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
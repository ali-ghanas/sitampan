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
   
    <title></title>
    
   
   
</head>
<body>
    <?php
    function antiinjection($data){
    $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
    return $filter_sql;
    }
        
        
 
    if(isset($_POST['submit'])) // jika tombol editsubmit ditekan
	{               
		$passbaru= antiinjection($_POST['passbaru']);
                $id=$_POST['iduser'];
		$pengacak = "AJWKXLAJSCLWLW";
                $passwordbaruenkrip = md5($pengacak . md5($passbaru) . $pengacak );
                
                $query = "UPDATE user SET password = '$passwordbaruenkrip' WHERE iduser='$id' ";
                $hasil = mysql_query($query);
		echo "<div><img  src='images/new/warning.png'/> <font color='blue' size='4'>Reset Password Sukses</font></div> ";
              
                echo "<script type='text/javascript'>window.location='index.php?hal=user&pilih=manajemenuserresetpass&id=$id'</script>";
		
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM user WHERE iduser=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

   
    <div >
        
     <form id="gantipassForm" method="post" action="?hal=user&pilih=manajemenuserresetpass">
         <table id="groupmodul1">
             <input type="hidden" name="iduser"  id="iduser" value="<?php echo $data['iduser']?>" />
             <tr>
                 <td colspan="4" class="judulbreadcrumb"><h2>Ganti Password</h2></td>
             </tr>
             <tr>
                 <td class="judultabel1">User Name</td><td>:</td><td><input type="text" class="required" disabled name="username" class="username" id="username" value="<?php echo $data['username']?>" /></td>
                  
             </tr>
             <tr>
                 <td class="judultabel1">Nama  / NIP</td><td>:</td><td><input type="text" class="required" disabled name="username" class="nm_lengkap" id="nm_lengkap" value="<?php echo $data['nm_lengkap']?>" /> / <input type="text" class="required" disabled name="username" class="nip_baru" id="nip_baru" value="<?php echo $data['nip_baru']?>" /></td>
                  
             </tr>
             <tr>
                 <td class="judultabel1">Tetapkan Password Baru</td><td>:</td><td><input class="required" type="password" name="passbaru" class="password" id="password" value="" /></td>
                  
             </tr>
             
             <tr>
                 <td colspan="2"><input class="btn btn-primary " type="submit" id="submit" name="submit" value="Tetapkan Pass" onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')" /></td><td><img src="images/new/login.png"  width="100" height="100"/></td>
             </tr>
         </table>   
                            
                       
     </form>
    </div>
   
   
</body>
</html>
<?php
};
};
?>
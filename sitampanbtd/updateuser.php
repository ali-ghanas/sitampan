<?php
include "lib/koneksi.php";
include "lib/funtion.php";
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
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>login</title>
   
   
    
   
</head>
<body>
     <?php // aksi untuk edit
            session_start();


            if(isset($_POST['button'])) // jika tombol editsubmit ditekan
                    {
                        $avatar=$_POST['avatar'];
                        $id = $_POST['id'];
                        $nip = $_POST['nip'];
                        $kasta = $_POST['level'];
                        
                        if(!empty($_FILES) && $_FILES['avatar']['size'] > 0 && $_FILES['avatar']['error'] == 0){
                                $fileName = $_FILES['avatar']['name'];
                                $move = move_uploaded_file($_FILES['avatar']['tmp_name'], 'images/photo/'.$fileName);
                                if($move){
                                //simpan deskripsi dan nama file ke database
                                $sql = "UPDATE user SET avatar='$fileName' where username='$_SESSION[username]' and nip_baru='$_SESSION[nip_baru]'";
                                                
                                $edit=mysql_query($sql);
                                if($edit){
                                    echo "<script type='text/javascript'>window.location='index.php?hal=updateuser&id=$_SESSION[nip_baru]&kasta=$_SESSION[level]'</script>";
                                }
                                
                                exit;}
                        }
                       
                       
                        
		
                          
         
                    }
                    else 
                    { 
                    $nip = $_GET['id']; // menangkap id
                    $kasta=$_GET['kasta'];
                    $sql = "SELECT * FROM user,userhak,userlevel WHERE user.iduser=userhak.iduser and userlevel.iduserlevel=userhak.iduserlevel  and  nip_baru=$nip and userlevel.level='$kasta' "; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $user = mysql_fetch_array($query);
                    $tahunkini=date('Y');
                    
                    ?>
                    
                       <form method="post" id="updateuser" name="updateuser" action="?hal=updateuser" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo  $data['iduser']; ?>" />
                        <input type="hidden" name="nip" value="<?php echo  $data['nip_baru']; ?>" />
                        <input type="hidden" name="level" value="<?php echo  $data['level']; ?>" />
                        <table width="100%" border="0" align="left" cellpadding="3" cellspacing="6">
                            <tr>
                                <td Rowspan="7" class="isitabel"><img src="images/photo/<?php echo $user['avatar'] ?>"  width="200" height="200"/>
                                    
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="judultabel" width="15%"> Nama lengkap</td><td >:</td><td width="90%"><?php echo $user['nm_lengkap']; ?> <a href='?hal=gantipass' target='_blank'><img src="images/new/modul.png" title="Ganti Password"/> Ganti Password</a> | <a href="?hal=edit_user&id=<?php echo $user['iduser'] ?>"><img src="images/new/bc1.png" width="20"/> Update User</a> </td>
                                
                            </tr>
                            <tr>
                                <td class="judultabel" > NIP</td><td >:</td><td ><?php echo $user['nip_baru']; ?></td>
                                
                            </tr>
                            <tr>
                                <td class="judultabel" > User Name</td><td >:</td><td ><?php echo $user['username']; ?></td>
                                
                            </tr>
                            <tr>
                                <td class="judultabel" > Jabatan</td><td >:</td><td ><?php echo $user['jabatan']; ?></td>
                                
                            </tr>
                            <tr>
                                <td class="judultabel" > Tanggal Lahir</td><td >:</td><td ><?php echo $user['tgl_lahir']; ?></td>
                                
                            </tr>
                            
                            <tr>
                                <td class="judultabel" > Ubah Photo Profil</td><td >:</td><td><input id="avatar" class="required" name="avatar" type="file" value="<?php echo $user['avatar'] ?>" size="40" /></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            
                            
                            
                        
                            <tr><td><input class="button putih bigrounded " id="button" name="button" type="submit" value="Upload" /></td><td colspan="3"><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>

                        </table>
                        
                        <!--form to upload file-->  
                          
                    </form>



                   
                    <?php
                                

                                }; // penutup else
                        ?>
      
            
   
    
     
   
   
</body>
</html>
<?php
};
?>
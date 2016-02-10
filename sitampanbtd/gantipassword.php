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
    
   
    <div >
        
     <form id="gantipassForm" method="post" action="?hal=updatepass">
         <table id="groupmodul1">
             <tr>
                 <td colspan="4" class="judulbreadcrumb">Ganti Password</td>
             </tr>
             <tr>
                 <td class="judultabel1">User Name</td><td>:</td><td><input type="text" class="required" disabled name="username" class="username" id="username" value="<?php session_start(); echo $_SESSION['username']?>" /></td>
                  
             </tr>
             <tr>
                 <td class="judultabel1">Password Lama</td><td>:</td><td><input class="required" type="password" name="oldPass" class="password" id="password" value="" /></td>
                  
             </tr>
             <tr>
                 <td class="judultabel1">Password Baru</td><td>:</td><td><input class="required" type="password" name="newPass1" class="password" id="password" value="" /></td>
                  
             </tr>
             <tr>
                 <td class="judultabel1">Ketik Lagi Password Baru</td><td>:</td><td><input class="required" type="password" name="newPass2" class="password" id="password" value="" /></td>
                  
             </tr>
             <tr>
                 <td colspan="2"><input class="button putih bigrounded " type="submit" id="login" name="submit" value="Ganti" onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')" /></td><td><img src="images/new/login.png"  width="100" height="100"/></td>
             </tr>
         </table>   
                            
                       
     </form>
    </div>
   
   
</body>
</html>
<?php
};
?>
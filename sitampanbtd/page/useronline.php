<?php
include "lib/koneksi.php";

session_start();

?>
<html>
    <head>
    <title>Ubah BCF 15</title>
  
    </head>
           <body>
        <?php 
        $sql = "SELECT * FROM user WHERE iduser=$_SESSION[iduser]"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        ?>

   
   
               <div class="groupmodul1">
   
                    <table  border="0" width="100%">
                        <tr>
                            <td>
                                         <table  border="0" width="100%" >
                                            <tr>
                                                <td ><img src="images/photo/<?php echo $data['avatar'] ?>"  width="100" height="100"/> </td>
                                            </tr>
                                        </table>
                            </td>
                        </tr>

                        <tr>
                            <td class="isitabelnew">Nama</td><td ><a id="a" href="?hal=updateuser&id=<?php echo $_SESSION['nip_baru']  ?>&kasta=<?php echo $_SESSION['level']  ?>"><?php echo $_SESSION['nm_lengkap']  ?></a></td> 
                        </tr>
                        <tr>
                            <td class="isitabelnew">NIP</td><td ><?php echo $_SESSION['nip_baru'] ?></td> 
                        </tr>


                        <tr>
                            <td class="isitabelnew">Terakhir Login</td><td ><?php $sql = "select tanggal, jamin, username, status  from log where username ='$_SESSION[username]' and status='offline' order by tanggal desc limit 0,1 ";  $result = mysql_query($sql); $data = mysql_fetch_array($result);echo $data[tanggal]; ?></td>
                        </tr>
                        <tr>
                            <td class="isitabelnew" >Jam</td><td ><?php $sql = "select tanggal, jamin, username, status  from log where username ='$_SESSION[username]' and status='offline' order by tanggal desc limit 0,1 ";  $result = mysql_query($sql); $data = mysql_fetch_array($result); echo "$data[jamin] WIB";?></td>
                        </tr>
                        <tr>
                            <td class="isitabelnew" >Level Aktif</td><td ><?php echo $_SESSION['level']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><a href="?hal=ubahlevel&id=<?php echo $_SESSION['iduser'] ?>"><button >Ubah Level Akses</button></a> </td>
                        </tr>
                        
                    </table>
               </div> 
               <br/>
               <div class="groupmodul1">
                   <table width="100%" >
                       <tr>
                           <td class="judulbreadcrumb">User Online</td> 

                       </tr>
                       <tr>
                           <td>
                               <?php
                                                $columns = 4; //tentukan banyaknya kolom yang diinginkan


                                                $query = "select * from log,user where user.username=log.username and status='online' group by user.username";
                                                $result = mysql_query($query);
                                                
                                                $num_rows = mysql_num_rows($result);
                                                
                                                
                                                for($i = 0; $i < $num_rows; $i++) {
                                                $row = mysql_fetch_array($result);
                                                if($i % $columns == 0) {

                                                
                                                }
                                                echo "<font face=arial size=1pt><a style='color:#8C8C8C'>$row[nm_lengkap]</a></font>".",";
                                                    if(($i % $columns) == ($columns - 1) || ($i + 1) == $num_rows) {

                                                    
                                                    }
                                                }
                                                
                                           include "cleansession.php";
                                           
                                                
                                ?>   
                           </td>
                       </tr>


                </table>
                   
               </div>
        
          </body>
        </html>
        
            

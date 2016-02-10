<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>User Info</title>
        
        
    </head>
    <body>
                
                          
                <?php
                   include '../lib/koneksi.php';
//                   include '../lib/sembunyi.php';
        
                    $id = $_GET['id']; // menangkap id
                    
                    $sql = "SELECT * FROM user,userlevel where user.level=userlevel.level and iduser=$id"; // memanggil data dengan id yang ditangkap tadi
                    $query = mysql_query($sql);
                    $data = mysql_fetch_array($query);
                        

                    ?>
          
        <table valign="top" border="0" width="90%" cellpadding="1" cellspacing="1" id="groupmodul1">
            <tr valign="top">
                <td width="30%" height="100" class="isitabel"><img src="images/photo/<?php echo $data['avatar'] ?>" /></td>
                <td >
                    <table  width="100%" border="0" cellpadding="2" cellspacing="2">
                        <tr >
                            <td width="30%" class="judultabel">Nama</td><td class="judultabel">:</td><td width="70%"><?php echo $data[nm_lengkap]; ?></td>
                        </tr>
                        <tr>
                             <td class="judultabel">NIP</td><td class="judultabel">:</td><td><?php echo $data[nip_baru]; ?></td>
                        </tr>
                        
                        <tr>
                             <td class="judultabel">Jabatan</td><td class="judultabel">:</td><td><?php echo $data[jabatan]; ?></td>
                        </tr>
                        <tr>
                             <td class="judultabel">Unit</td><td class="judultabel">:</td><td><?php echo $data[seksi]; ?></td>
                        </tr>
                        <tr>
                             <td class="judultabel">Status User</td><td class="judultabel">:</td><td><?php echo $data[status_user]; ?></td>
                        </tr>
                        <tr>
                             <td class="judultabel">Level</td><td class="judultabel">:</td><td><?php echo $data[nm_level]; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            
        </table>
   
        </body>
        </html>
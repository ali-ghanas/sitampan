    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
<?php
error_reporting(0);
include "lib/koneksi.php";
$nip=$_POST['nip'];
$nohp=$_POST['nohp'];

          
if(isset($_POST['kirim'])){
                                       
                $sql = "SELECT * FROM user where nip_baru='$nip' and no_hp='$nohp'";
                $query = mysql_query($sql);
                
                $cek=mysql_numrows($query);
                 if($cek>0){
                     echo "<h3>Hasil Pencarian</h3>";
                    echo "<table class='table'>";
                    echo "<tr>
                            <th>Nama </th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            
                            <th>Kirim</th>
                          </tr>
                            ";
                    while($data = mysql_fetch_array($query)){
                    echo "
                        <tr>
                            <td>$data[nm_lengkap]</td>
                            <td>$data[nip_baru]</td>
                            <td>$data[jabatan]</td>
                            <td><a href=lupapass.php?pilih=kirimulangpass&id=$data[iduser]>Minta Pass</a></td>
                        </tr>
                        ";
                    }
                   echo "</table >";
                   
                   
                
                 }
                 else
                {
                     echo "<br/>
                         <div class='text-error lead'>
                         <strong>Data Tidak Ditemukan</strong>
                         <p>Pastikan data yang Anda masukkan benar dan sesuai seperti:
                            <ol >
                                <li >NIP Tidak boleh kosong</li>
                                <li >NIP Baru harus berjumlah 18 Digit dan berupa angka (bukan huruf)</li>
                                <li >Nomor HP harus sudah diupdate di database.  <a href='lupass_cara.php'>klik</a></li>
                            </ol>
                            
                            
                         </p>
                         
                         </div>";
                            
                }
    
}
                        
                        
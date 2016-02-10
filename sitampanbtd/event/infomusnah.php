<!doctype html>
<?php
include "lib/koneksi.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Info Lelang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/custom.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="favicon.jpg" />
  </head>
  <body >   
      <?php 
      
        $sql = "select * FROM event WHERE publish='1' and idevenkategori='2'"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$cek=mysql_numrows($query);
                
	
       ?>
          <table class="table table-striped">
              
                <thead>
                <tr>
                    <th>Judul</th>
                    <th>Author</th>
                    <th>Tgl</th>
                </tr>
                </thead>
                <?php 
                     if($cek<0){
                       echo "<tbody>
                                <tr>
                                    <td >Tidak ada data</td>
                                </tr>
                            </tbody>" ;
                     }
                     else {
                ?>
                <?php
                while($data = mysql_fetch_array($query)){
                    //user
                $sqluser = "SELECT * FROM user WHERE  iduser=$data[iduser]"; // memanggil data dengan id yang ditangkap tadi
                $queryuser= mysql_query($sqluser);
                $datauser = mysql_fetch_array($queryuser);
                ?>
                <tbody>
                  <tr>
                      <td><a href="?pilih=info_musnah_detail&id=<?php echo $data['idevent'] ?>"><?php echo $data['judulevent'] ?></a></td>
                      <td><?php echo $datauser['username'] ?></td>
                      <td><?php echo $data['tglpublish'] ?></td>
                  </tr>
              </tbody>
              <?php }}; ?>
          </table>
      
  </body>
</html>                                
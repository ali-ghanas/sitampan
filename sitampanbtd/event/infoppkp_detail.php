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
        $id = $_GET['id']; // menangkap id
        $sql = "select * FROM event WHERE idevent='$id'"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
                //user
                $sqluser = "SELECT * FROM user WHERE  iduser=$data[iduser]"; // memanggil data dengan id yang ditangkap tadi
                $queryuser= mysql_query($sqluser);
                $datauser = mysql_fetch_array($queryuser);
       ?>
          <table>
    <caption><h2><?php echo $data['judulevent']; ?></h2> </caption>
    
    <tbody>
    <tr>
        <td> <?php echo $data['tglpublish']; ?> Oleh : <?php echo $datauser['username']; ?></td>
    
    </tr>
    <tr>
        <td><?php echo $data['uraian']; ?> </td>
        
    </tr>
    <tr>
        <td>
            <ul class="thumbnails" style="background-color: transparent;">
            <?php
                $sqlfoto = "SELECT * FROM eventfoto WHERE  idevent=$data[idevent]"; // memanggil data dengan id yang ditangkap tadi
                $queryfoto= mysql_query($sqlfoto);
                while($datafoto = mysql_fetch_array($queryfoto)){
            ?>
                
                    <li class="span4">
                    <div class="thumbnail">
                        <img src="event/foto/<?php echo $datafoto['name'] ?>" alt="<?php echo $datafoto['keterangan_gbr']  ?>" />
                        <h3><?php echo  $datafoto['name']   ?></h3>
                        <small><?php echo  $datafoto['tglupload']   ?></small>
                        <p><?php echo  $datafoto['keterangan_gbr']   ?></p>
                    </div>
                    </li>
                
                
            <?php }; ?>
           </ul>
        </td>
    </tr>
    </tbody>
    </table>
        
          
      
  </body>
</html>                                
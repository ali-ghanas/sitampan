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
       <td> Lampiran :
            <?php
                                                     
               $query = "SELECT * FROM eventlamp where  idevent='$id' order by ideventlamp asc";
                $result = mysql_query($query);
                                                              
                while ($datalamp = mysql_fetch_array($result)){
                                                                   
            ?> 
                                                           
             <table>
                   <tr>
                        <td>
                              <ul>
                                  <li><a href="event/download_lamp_event.php?id=<?php echo $datalamp['ideventlamp'] ;  ?>"><?php echo $datalamp['name'] ;  ?></a></li>
                              </ul>
                        </td>
                  </tr>
           </table>
         <?php
              };
         ?>
      </td>
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
                        <img src="event/foto/<?php echo $datafoto['name'] ?>" alt="<?php echo $datafoto['keterangan_gbr']  ?>" /><a href="#myModalphoto<?php echo $datafoto['ideventfoto'] ?>" role="button" class="btn btn-info" data-toggle="modal">Perbesar</a>
                        
                        <small class="muted"><?php echo  $datafoto['tglupload']   ?></small>
                        <p class="muted"><?php echo  $datafoto['keterangan_gbr']   ?></p>
                        <div id="myModalphoto<?php echo $datafoto['ideventfoto'] ?>" class="modal hide fade" tabindex="-4" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                                        <h3 id="myModalLabel"></h3>
                                                        
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>
                                                            <img src="event/foto/<?php echo $datafoto['name'] ?>" alt="<?php echo $datafoto['keterangan_gbr']  ?>" />
                                                        </p>

                                                      </div>
                                                      <div class="modal-footer">
                                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

                                                      </div>
                                            </div>
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
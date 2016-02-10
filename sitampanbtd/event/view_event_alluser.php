<?php
include "lib/koneksi.php";
include "lib/function.php";
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
    <title>Lihat Event</title>
    <!--       jquery anytimes -->
        
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>


    <style type="text/css"> 
      div.pesan {
        height:250px;
        display:none;
        float: none;
      }
      div.pesan, p.flip {
        margin: 0px;
        padding: 5px;
        text-align: center;
        background: #fff;
        border: 1px solid black;
        cursor: pointer;
        
      }
      
      .ui-widget { 
      font-family: Arial,Verdana,sans-serif; 
      font-size: 1.0em;
   }  
   .ui-widget-header { 
      border: 1px solid #2b3846; 
      background: #2b3846;
      font-weight: bold; }
   .ui-widget-content { 
      border: 1px solid #2b3846; 
      background: #fcfcfd;
      color: #182e43; 
      
   }
   .tabs-bottom .ui-tabs-panel { 
      height: 450px; 
      overflow: auto; 
   } 
   .tabs-bottom .ui-tabs-nav { 
      position: absolute; 
      left: 0; 
      bottom: 0; 
      right:0; 
      padding: 0 0.2em 0.2em 0; 
   }  
   .tabs-bottom .ui-tabs-nav li { 
      margin-top: -2px; 
      margin-bottom: 1px; 
      border-bottom-width: 1px; 
      border-top: none;
      background: #fff;
   }
  #suratbataltpp ul li a  {
       background: #d6dceb;
   }
   .tabs-bottom .ui-tabs-nav li.ui-tabs-selected { 
      margin-top: -10px; 
      background: #eee;
   }   

     
    </style>
    <script type="text/javascript">
           $(document).ready(function() {
              $("#suratbataltpp").tabs({collapsible:"true"}).find(".ui-tabs-nav").sortable();
              $("#suratbataltpp").tabs({
                  fx:{
                      opacity :"toggle",
                      duration: "slow"
                  }
              })
           });
    </script>
                 
    

    </head>
    <body>
       
	     <?php // aksi untuk edit
                $id = $_GET['id']; // menangkap id
                
                $sql = "SELECT * FROM event WHERE  idevent=$id "; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $data = mysql_fetch_array($query);
                $now=date('Y-m-d');
                
                //user
                $sqluser = "SELECT * FROM user WHERE  iduser=$data[iduser]"; // memanggil data dengan id yang ditangkap tadi
                $queryuser= mysql_query($sqluser);
                $datauser = mysql_fetch_array($queryuser);
                
                //kategori event
                $sqlkat = "SELECT * FROM eventkategori WHERE  ideventkategori=$data[idevenkategori]"; // memanggil data dengan id yang ditangkap tadi
                $querykat= mysql_query($sqlkat);
                $datakat = mysql_fetch_array($querykat);
                
                
        ?>
        <form name="myform" enctype="multipart/form-data" action="event/tambah_foto_evet_upload.php" method="POST">
        <input type="hidden" name="id" value="<?php echo  $data['idevent']; ?>" />
        
            <table width="100%" border="0" align="center" cellpadding="0" >
                      
                <tr>
                    <td>
                        <div id="suratbataltpp">
                            
                              <ul>
                                  <li><a href="#tabs-1">Detail Event</a></li>   
                              </ul>
                        
                                <div id="tabs-1" >
                                   
                                    <table >
                                        <tr valign="top" class="isiform">
                                            <td width="100%" >
                                                <table class="isitabel" >
                                                    <tr >
                                                        <td  colspan="4">
                                                            <span class="isitabelnew"><?php echo $datakat['nm_kategori']; ?></span> <br/>
                                                            <span class="isitabelnew"><h2><?php echo $data['judulevent']; ?></h2></span> <br/>
                                                            <span><?php echo $data['tglpublish']; ?> oleh : <?php echo $datauser['username']; ?> </span>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr >
                                                        <td colspan="4">
                                                            <?php echo $data['uraian']; ?> 
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr >
                                                        <td colspan="4">
                                                            <?php
                                                                $columns = 3; //tentukan banyaknya kolom yang diinginkan


                                                                $query = "SELECT * FROM eventfoto where  idevent='$id' order by ideventfoto asc";
                                                                $result = mysql_query($query);
                                                                
                                                                $num_rows = mysql_num_rows($result);
                                                                echo "<table border=\"0\" >\n";

                                                                for($i = 0; $i < $num_rows; $i++) {
                                                                $row = mysql_fetch_array($result);
                                                                if($i % $columns == 0) {

                                                                echo "<TR>\n";
                                                                }
                                                                if($row[keterangan_gbr]==''){$isian='Klik Untuk Tambah Keterangan';}else{$isian=$row[keterangan_gbr];}
                                                                echo "<TD align=center>" . "<a href='?hal=edit_foto_ket&id=$row[ideventfoto]'><img src='event/foto/$row[name]' width='200' title='$isian' /><br/><small>$row[keterangan_gbr]</small></a>"." ". "</TD>\n";
                                                                
                                                                    if(($i % $columns) == ($columns - 1) || ($i + 1) == $num_rows) {

                                                                    echo "</TR>\n";
                                                                    }
                                                                }
                                                                echo "</table>";



                                                                ?>   
                                                        </td>
                                                        
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
                                                        <td height="50"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Event Terkait :</td>
                                                    </tr>
                                                    <?php 
                                                            $sqlterkait = "SELECT * FROM event WHERE  idevenkategori=$data[idevenkategori] group by idevent desc limit 5"; // memanggil data yang terkait
                                                            $queryterkait = mysql_query($sqlterkait);
                                                            while($dataterkait = mysql_fetch_array($queryterkait)){
                                                                
                                                          
                                                    ?>
                                                    <tr>
                                                         <td>
                                                            
                                                            <ul>
                                                                <li><a href="?hal=viewevent&id=<?php echo $dataterkait['idevent'] ?>"><?php echo $dataterkait['judulevent']; ?></a></li>
                                                            </ul>
                                                             
                                                        </td>
                                                        
                                                    </tr>
                                                   <?php };?>
                                                </table>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                       
                                        
                                    </table>
                                    
                                    
                                </div>
                                
                                
                            </div>
                                  
                    </td>
                </tr>
                
                <tr>
                
                </tr>
                
            
            </table>
        </form>
        
        
	<?php
                    
                
               

                    }; // penutup else
            ?>
     
            

</body>
</html>

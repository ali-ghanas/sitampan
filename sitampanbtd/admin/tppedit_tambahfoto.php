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
    <title>Pembatalan Status BCF 1.5</title>
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
                $sql = "SELECT * FROM tpp WHERE  idtpp=$id"; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $data = mysql_fetch_array($query);
                $now=date('Y-m-d');
                
               
                
        ?>
        <form name="myform" enctype="multipart/form-data" action="admin/tppedit_fotoupload.php" method="POST">
        <input type="hidden" name="id" value="<?php echo  $data['idtpp']; ?>" />
        
            <table width="100%" border="0" align="center" cellpadding="0" >
                      
                <tr>
                    <td>
                        <div id="suratbataltpp">
                            
                              <ul>
                                  <li><a href="#tabs-1">Tambah Foto TPP</a></li>   
                              </ul>
                        
                                <div id="tabs-1" >
                                    <script type="text/javascript">

                                       function show()
                                            {
                                                var n = document.myform.jumfile.value;
                                                var i;
                                                var string = "";

                                                for (i=0; i<=n-1; i++)
                                                {
                                                   string = string + "Pilih File: <input name=\"userfile"+ i + "\" type=\"file\"><br>";
                                                }

                                                document.getElementById('selectfile').innerHTML = string;
                                                document.myform.n.value = n;
                                            }
                                     </script>
                                    

                                        Pilih Jumlah File

                                        <select name="jumfile" onchange="show()">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select>

                                        <br><br>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />

                                        <div id="selectfile">
                                        </div>

                                    <br>
                                    <input type="hidden" name="n"/>
                                    <input type="submit" name="submit" value="Upload" />
                                    
                                    <table >
                                        <tr valign="top" class="isiform">
                                            <td width="100%" >
                                                <table class="isitabel" >
                                                    <tr >
                                                        <td  colspan="4">
                                                            TPP : <?php  echo $data['nm_tpp']?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr >
                                                        <td colspan="4">
                                                            <?php
                                                                $columns = 3; //tentukan banyaknya kolom yang diinginkan


                                                                $query = "SELECT * FROM tppfoto where  idtpp='$id' order by idtppfoto asc";
                                                                $result = mysql_query($query);
                                                                
                                                                $num_rows = mysql_num_rows($result);
                                                                echo "<table border=\"0\" >\n";

                                                                for($i = 0; $i < $num_rows; $i++) {
                                                                $row = mysql_fetch_array($result);
                                                                if($i % $columns == 0) {

                                                                echo "<TR>\n";
                                                                }
                                                                if($row[keterangan_gbr]==''){$isian='Klik Untuk Tambah Keterangan';}else{$isian=$row[keterangan_gbr];}
                                                                echo "<TD align=center>" . "<a href='?hal=pageadmin&pilih=tppedit_fotoket&id=$row[idtppfoto]'><img src='admin/fototpp/$row[name]' width='200' title='$isian' /></a>"." ". "</TD>\n";
                                                                
                                                                    if(($i % $columns) == ($columns - 1) || ($i + 1) == $num_rows) {

                                                                    echo "</TR>\n";
                                                                    }
                                                                }
                                                                echo "</table>";



                                                                ?>   
                                                        </td>
                                                        
                                                    </tr>
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

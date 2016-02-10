<?php

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
                                                                echo "<table border=\"1\" >\n";

                                                                for($i = 0; $i < $num_rows; $i++) {
                                                                $row = mysql_fetch_array($result);
                                                                if($i % $columns == 0) {

                                                                echo "<TR>\n";
                                                                }
                                                                if($row[keterangan_gbr]==''){$isian='Klik Untuk Tambah Keterangan';}else{$isian=$row[keterangan_gbr];}
                                                                echo "<TD align=center>" . "<a href='?hal=pageadmin&pilih=tppedit_fotoket&id=$row[idtppfoto]'><img src='tpp/fototpp/$row[name]' width='200' title='$isian' /></a>"." ". "</TD>\n";
                                                                
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

<?php
include "lib/koneksi.php";


?>
<!DOCTYPE html>
<html>
    <head>
    <title>Ubah BCF 15</title>
    <!--       jquery anytimes -->
        
        <link href="css/custom.css" rel="stylesheet" media="screen">
        
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
         <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="favicon.jpg" />
        
       

       
    </head>
    <body>
       
       
                <?php // yang belum koneksi database diabaikan aja dulu file ini
                     session_start();
                     ob_start();

                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
                   
                    ?>
                <form method="post" action=<?php echo "login.php?pilih=info_eventall"; ?> >
                    <table> 
                         <tr><td>Cari Events</td><td><input class="required" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" /> <input  name="mode" type="hidden" id="mode" value="cari" /> <input type="submit" name="Submit2" value="Cari" class="button putih bigrounded " /></td></tr>
                    </table>
                </form>
          
                <?php
                
                if (($mode=='cari')) {
                    $rpp = 2; // Jumlah data per halaman 

                $page = intval($_GET["page"]);
                if(!$page) $page = 1;

                $reload = "login.php?pilih=info_eventall";

                // data mentah 
                $sql = "SELECT * FROM event where ((uraian LIKE '%$katakunci%') or (judulevent LIKE '%$katakunci%'))  order by tgl_pelaksanaan desc";
                $result = mysql_query($sql);

                $tcount = mysql_num_rows($result);

                $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

                $count = 0;
                $i = ($page-1)*$rpp;
                while(($count<$rpp) && ($i<$tcount)) 
                        {
                    mysql_data_seek($result,$i);
                    $query = mysql_fetch_array($result);

                    // output each row:

                    $i++;
                    $count++;
                        }

                // by default we show first page
                $nohal = 1;

                // if $_GET['page'] defined, use it as page number
                if(isset($_GET['page']))
                        {
                    $nohal= $_GET['page'];
                        }

                // counting the offset
                $limit = ($nohal - 1) * $rpp;
                $sqltampil = "SELECT * FROM event where ((uraian LIKE '%$katakunci%') or (judulevent LIKE '%$katakunci%'))  order by tgl_pelaksanaan desc  LIMIT $limit,$rpp";

                if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                $tampil= mysql_query($sqltampil);
                $count	=mysql_num_rows($result);
                }
                else {
                /* ======================================================== pagination mulai ===================================================== */
                $rpp = 2; // Jumlah data per halaman 

                $page = intval($_GET["page"]);
                if(!$page) $page = 1;

                $reload = "login.php?pilih=info_eventall";
                $tgl_now=date('Y-m-d');
                $tahun_now=substr($tgl_now,0,4);
                // data mentah 
                $sql = "SELECT * FROM event where ((uraian LIKE '%$katakunci%'))  order by tgl_pelaksanaan desc";
                $result = mysql_query($sql);

                $tcount = mysql_num_rows($result);

                $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

                $count = 0;
                $i = ($page-1)*$rpp;
                while(($count<$rpp) && ($i<$tcount)) 
                        {
                    mysql_data_seek($result,$i);
                    $query = mysql_fetch_array($result);

                    // output each row:

                    $i++;
                    $count++;
                        }

                // by default we show first page
                $nohal = 1;

                // if $_GET['page'] defined, use it as page number
                if(isset($_GET['page']))
                        {
                    $nohal= $_GET['page'];
                        }

                // counting the offset
                $limit = ($nohal - 1) * $rpp;
                $sqltampil = "SELECT * FROM event where ((uraian LIKE '%$katakunci%'))  order by tgl_pelaksanaan desc LIMIT $limit,$rpp" ;

                if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                $tampil= mysql_query($sqltampil);
                $count	=mysql_num_rows($result);
                $max	 = ceil($count/$rpp);
                }
                /* ======================================================== pagination selesai ===================================================== */
                ?>               
                      
                <table>
                        <tr>
                        <td colspan="3"><b>Jumlah Data  :</b> <?php echo $count; ?> <br/> </td>
                      </tr>
                      
                    </table><br/>

                  <table class="table">
                        <tr><th >No</th>
                        <th >Jenis Event</th>
                        <th >Author</th>
                        <th >Tgl Upload</th>
                        </tr>

                <?php
                while($data = mysql_fetch_array($tampil)){

                if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                        echo "<tr class=highlight1>";
                                        $j++;
                                        }
                        else
                                        {
                                        echo "<tr class=highlight2>";
                                        $j--;
                                        }
                                  
                $sqlkat = "SELECT * FROM user WHERE iduser=$data[iduser]"; // memanggil data dengan id yang ditangkap tadi
                $querykat= mysql_query($sqlkat);
                $datakat = mysql_fetch_array($querykat);
                
                $sqlevbru = "SELECT * FROM event WHERE tgl_selesai  > '$tgl_now' and idevent= $data[idevent]"; // memanggil data dengan id yang ditangkap tadi
                $queryevbru= mysql_query($sqlevbru);
                $datakevbru = mysql_numrows($queryevbru);
                if ($datakevbru > '0'){
                      
                      
                       
                       $new='<img src=images/hot.gif />';
                }
                else {
                   
                   $new='';
                   
                    
                }
                ?>
                <td align="center"><?php echo  $awal++; ?></td>
                <td ><a href="?pilih=info_eventall_detail&id=<?php echo $data['idevent'] ?>"><?php echo  $data['judulevent']; echo "$new"?></a></td>
                <td ><?php echo  $datakat['nm_lengkap']; ?></td>
                <td ><?php echo  $data['tglpublish']; ?></td>
                </tr>
                <?php
                };
                ?>
                </table><br/>
                    Halaman :<div class="pagination pagination-mini">
                            
                            <?php
                            //memapilkan previous
                           
                            if ($nohal > 1) echo  "<ul style='background-color: #fff'><a href='".$_SERVER['PHP_SELF']."?pilih=info_eventall&page=".($nohal-1)."'>&lt;&lt; Prev</a></ul>";
                            // memunculkan nomor halaman dan linknya
                            //$page=$h $jumpage=$max
                            for($h = 1; $h <= $max; $h++)
                            {
                            if ((($h >= $nohal - 3) && ($h <= $nohal + 3)) || ($h == 1) || ($h == $max))
                            {
                            if (($showPage == 1) && ($h != 2))  echo "...";
                            if (($showPage != ($max - 1)) && ($h == $max))  echo "...";
                            if ($h == $nohal) echo " <b>".$h."</b> ";
                            else echo " <ul style='background-color: #fff'><a href='".$_SERVER['PHP_SELF']."?pilih=info_eventall&page=".$h."'>".$h."</a></ul> ";
                            $showPage = $h;
                            }
                            }
                            
                            // menampilkan link next

                            if ($nohal < $max) echo "<ul style='background-color: #fff'><a href='".$_SERVER['PHP_SELF']."?pilih=info_eventall&page=".($nohal+1)."'>Next &gt;&gt;</a><ul>";
                            ?>
                           
                    </div>
<!--                    <br/><a href="login.php?pilih=home"> HOME</a>  -->
                <?php 
                //untuk menampilkan paginasi
                echo paginate($reload, $page, $tpages);
                ?>
                
                    
             </body>
        </html>
       
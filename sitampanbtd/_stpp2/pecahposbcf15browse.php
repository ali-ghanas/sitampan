<?php
include "lib/koneksi.php";
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
    <title>Ubah BCF 15</title>
    <!--       jquery anytimes -->
        
<!--        <link rel="stylesheet" type="text/css" href="themes/main.css" />-->
        

               
    </head>
    <body>
        
                   <?php // yang belum koneksi database diabaikan aja dulu file ini
                     session_start();


                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
                   
                    ?>
                    <form method="post" action=<?php echo "index.php?hal=pagemonitoring&pilih=pecahpos"; ?> >
                    <table> 
                          <tr><td>Masukkan Kata Kunci</td><td><input class="required" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" /></td><td>(BCF15,BL,Consignee,Notify)</td></tr>
                          <tr><td>Tahun BCF 1.5</td><td><input class="required" name="txttahun" type="text" value="<?php echo "$tahun"; ?>" class="inputsearch" /></td><td>(Examp : 2012 or 2013)</td></tr>
                    <tr><td><input type="submit" name="Submit2" value="Cari" class="button putih bigrounded " /></td></tr>
                    <tr><td><input  name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                      </table>
                    </form>
                    <br />

                    <?php
                    if($act=="1"){echo "Update Berhasil";};
                    if($act=="2"){echo "Delete Berhasil";};
                    if($act=="3"){echo "Penambahan User Berhasil";};
                    if (($mode=='cari')) {
                        $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagemonitoring&pilih=pecahpos";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15 where ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' order by bcf15tgl desc ";
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
                    $sqltampil = "SELECT * FROM bcf15 where ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' order by bcf15tgl desc LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagemonitoring&pilih=pecahpos";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15 order by bcf15tgl desc ";
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
                    $sqltampil = "SELECT * FROM bcf15 order by bcf15tgl desc LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?><br />


                    <table class="data" >
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">No BCf 15</th>
                            <th class="judultabel">Tangal BCF</th>
                            <th class="judultabel">No BC 11</th>
                            <th class="judultabel">No Sprint</th>
                            
                            <th class="judultabel">pecahpos</th>
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

                    ?>
                    <td align="center" class="isitabel"><?php echo  $awal++; ?></td>
                    <td class="isitabel"><?php echo  ucwords($data['bcf15no']); ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15tgl']; ?></td>
                    <td class="isitabel"><?php echo  $data['bc11no']; ?></td>
                    <td class="isitabel"><?php if ($data['suratperintahno']=='') {echo '<img src="images/indicator.gif"></img>'; } else{ echo  $data['suratperintahno'];} ?></td>
                                      
                   <td align="center" class="isitabel"><?php if ($data['suratperintahno']=='') {echo ''; }  else {echo "<a href='?hal=pecahposdetil&id=$data[idbcf15]' target='_new'><img src='images/new/update.png' /></a> ";} ?> </td>
                    </tr>
                    <?php
                    };
                    ?>
                    </table><br/><br />
                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
                    
            
        </body>
        </html>
        <?php
};
?>
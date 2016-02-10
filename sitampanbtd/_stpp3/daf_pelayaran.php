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
                   
                   
                    ?>
                    <form method="post" action=<?php echo "index.php?hal=daf_pelayaran"; ?> >
                    <table> 
                        <tr>
                            <td><font size="5" color="red"><b>AGEN PENGANGKUT</b></font></td>
                        </tr>
                        <tr>
                            <td colspan="2"><p>Masukan nama dan alamat untuk pencarian agen pengangkut dibawah ini.</p></td>
                        </tr>
                          <tr><td>Nama Or Alamat</td><td><input class="required" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" /></td></tr>
                          
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

                    $reload = "index.php?hal=daf_pelayaran";

                    // data mentah 
                    $sql = "SELECT * FROM pelayaran where ((nm_pelayaran LIKE '%$katakunci%') 
                    OR (alamat_pelayaran LIKE '%$katakunci%'))  order by nm_pelayaran asc ";
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
                    $sqltampil = "SELECT * FROM pelayaran where ((nm_pelayaran LIKE '%$katakunci%') 
                    OR (alamat_pelayaran LIKE '%$katakunci%'))  order by nm_pelayaran asc LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=daf_pelayaran";

                    // data mentah 
                    $sql = "SELECT * FROM pelayaran order by nm_pelayaran desc ";
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
                    $sqltampil = "SELECT * FROM pelayaran order by nm_pelayaran asc LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?><br />

                    
                    <table class="data" >
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">Nama Agen</th>
                            <th class="judultabel">Alamat</th>
                            <th class="judultabel">Telp</th>
                            <th class="judultabel">Fax</th>
                            <th class="judultabel">Email</th>
                            
                            <th class="judultabel">Edit</th>
                            
                            
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
                    <td class="isitabel"><?php echo  $data['nm_pelayaran']; ?></td>
                    <td class="isitabel"><?php echo  $data['alamat_pelayaran']; ?> <?php echo  $data['alamat_pelayaran_2']; ?> <?php echo  $data['kota']; ?></td>
                    <td class="isitabel"><?php echo  $data['Telp']; ?></td>
                    <td class="isitabel"><?php echo  $data['Fax']; ?></td>
                    <td class="isitabel"><?php echo  $data['email']; ?></td>
                    
                   
                    <td align="center" class="isitabel"><a href="?hal=edit_pelayaran&id=<?php echo $data[idpelayaran] ?>"><img src="images/new/update.png" /></a> </td>
                   
                   
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
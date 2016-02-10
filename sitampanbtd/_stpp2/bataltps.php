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
        <script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="lib/js/anytimes/anytime.js">
        </script><link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function() {
              $("#sprint").tabs({event:"mouseover"}).find(".ui-tabs-nav").sortable();
           });
        </script>
       
    </head>
    <body>
        <div id="sprint">
      <ul>
  	     <li><a href="#tabs-1">Browse BCF 15</a></li>
	     <li><a href="#tabs-2">Help / petunjuk</a></li>
             
	     
      </ul>
            <div id="tabs-1">
                    <?php // yang belum koneksi database diabaikan aja dulu file ini
                     session_start();


                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    /*
                    cara baca halaman ini :
                    pilih sembarang dari table user
                    buatkan header table (dengan perintah <th>)
                    hingga (while) data habis, buatkan baris baru dengan isi data sesuai yang di echo
                    tutup table
                    */
                    //$sql = "SELECT * FROM user";
                    //$query = mysql_query($sql);
                    //$nourut=1;
                    ?>
                    <form method="post" action=<?php echo "index.php?hal=browsebataltps"; ?> >
                    <input name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" />
                    <input type="submit" name="Submit2" value="Cari" class="submitsearch" />  
                    <input name="mode" type="hidden" id="mode" value="cari" /><strong bgcolor="ddffff"> Cari Berdasarkan No BCF 15, BL, Nm Consignee, Notify</strong>
                    </form>
                    <br />

                    <?php
                    if($act=="1"){echo "Update Berhasil";};
                    if($act=="2"){echo "Delete Berhasil";};
                    if($act=="3"){echo "Penambahan User Berhasil";};
                    if (($mode=='cari')) {
                        $rpp = 10; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=browsebataltps";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15 where ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and masuk='2' ";
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
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%'))  and masuk='2' LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 10; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=browsebataltps";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15 where masuk='2'";
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
                    $sqltampil = "SELECT * FROM bcf15 where masuk='2'  LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?><br />


                    <h2>Daftar BCF 1.5 Yang Masih berada di TPS</h2>
                    <table class="data">
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">No BCf 15</th>
                            <th class="judultabel">Tangal BCF</th>
                            <th class="judultabel">No BC 11</th>
                            <th class="judultabel">Tanggal BC 11</th>
                            <th class="judultabel">Action</th>
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
                    <td class="isitabel"><?php echo  $data['bc11tgl']; ?></td>
                    <td align="center" class="isitabel"><a href="?hal=konfirmasip2tps&id=<?php echo  $data['idbcf15']; ?>">ND Konfirmasi P2</a> | <a href="?hal=suratbataltps&id=<?php echo  $data['idbcf15']; ?>">Surat Pembatalan BCF 1.5</a> |  
                            <a href="?hal=sprintview&id=<?php echo  $data['idbcf15']; ?>">Lihat</a>  
                    </td>
                    </tr>
                    <?php
                    };
                    ?>
                    </table><br/><br />
                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
            </div>
            <div id="tabs-2">
                Kelola BCF 15 :adalah Modul yang di gunakan untuk membuat nota dinas konfirmasi ke Bidang P2 terkait dengan 
                pembatalan BCF 15 tetapi masih berada di TPS dengan ketentuan:
                1. Harus berstatus record aktif;
                2. Harus sudah divalidasi oleh Seksi Manifest;
                3. belum masuk ke TPP ditandai dengan belum ada BA penarikan BCF 15, jika telah masuk ke TPP sudah bukan merupakan kewenangan seksi Tempat penimbuan Bid 2 tetapi merupakan kewenangan seksi tempat penimbunan III
                4. 
                
            </div>
            
        </body>
        </html>
                    <?php
};
?>
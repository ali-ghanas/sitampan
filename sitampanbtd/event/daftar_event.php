<?php
include "lib/koneksi.php";
session_start();
ob_start();
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
        
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
       
       
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
                <form method="post" action=<?php echo "index.php?hal=daf_event"; ?> >
                    <table> 
                         <tr><td>Cari Events</td><td><input class="required" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" /> <input  name="mode" type="hidden" id="mode" value="cari" /> <input type="submit" name="Submit2" value="Cari" class="button putih bigrounded " /></td></tr>
                    </table>
                </form>
          
                <?php
                if($act=="1"){echo "Update Berhasil";};
                if($act=="2"){echo "Delete Berhasil";};
                if($act=="3"){echo "Penambahan Berhasil";};
                if (($mode=='cari')) {
                    $rpp = 20; // Jumlah data per halaman 

                $page = intval($_GET["page"]);
                if(!$page) $page = 1;

                $reload = "index.php?hal=daf_event";

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
                $sqltampil = "SELECT * FROM event where ((uraian LIKE '%$katakunci%'))  order by tgl_pelaksanaan desc  LIMIT $limit,$rpp";

                if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                $tampil= mysql_query($sqltampil);
                $count	=mysql_num_rows($result);
                }
                else {
                /* ======================================================== pagination mulai ===================================================== */
                $rpp = 20; // Jumlah data per halaman 

                $page = intval($_GET["page"]);
                if(!$page) $page = 1;

                $reload = "index.php?hal=daf_event";
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
                }
                /* ======================================================== pagination selesai ===================================================== */
                ?>               

                  <table class="data">
                        <tr><th class="judultabel">No</th>
                        <th class="judultabel">Jenis Event</th>
                        <th class="judultabel">Tangal Mulai</th>
                        <th class="judultabel">Tanggal Selesai</th>
                        <th class="judultabel">Status</th>
                        
                        <th class="judultabel" colspan="3">Action</th>
                        
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
                 if($data['publish']=='1') {$publish='Yes';}  else{$publish='No';}                    
                $sqlkat = "SELECT * FROM eventkategori,event WHERE  eventkategori.ideventkategori=event.idevenkategori and idevent=$data[idevent]"; // memanggil data dengan id yang ditangkap tadi
                $querykat= mysql_query($sqlkat);
                $datakat = mysql_fetch_array($querykat);
                ?>
                <td align="center" class="isitabel"><?php echo  $awal++; ?></td>
                <td class="isitabel"><?php echo  $datakat['nm_kategori']; ?></td>
                <td class="isitabel"><?php echo  $data['tgl_pelaksanaan']; ?></td>
                <td class="isitabel"><?php echo  $data['tgl_selesai']; ?></td>
                <td class="isitabel"><?php echo  $data['publish']; ?></td>
                <td align="center" class="isitabel"><a href="?hal=add_fotoevent&id=<?php echo  $data['idevent']  ?>" target='_self'>Tambah Foto</a></td>
                <td align="center" class="isitabel"><a href="?hal=add_lampevent&id=<?php echo  $data['idevent']  ?>" target='_self'>Tambah Lampiran</a></td>
                <td align="center" class="isitabel"><a href="?hal=edit_event&id=<?php echo  $data['idevent']  ?>" target='_self'>Edit</a></td>
                </tr>
                <?php
                };
                ?>
                </table><br/>
                <?php 
                //untuk menampilkan paginasi
                echo paginate($reload, $page, $tpages);
                ?>
             </body>
        </html>
        <?php
};
ob_end_flush();
?>
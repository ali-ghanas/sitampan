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
  
    </head>
    <body>
      
                    <?php // yang belum koneksi database diabaikan aja dulu file ini
                    include 'lib/function.php';
                     session_start();
                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
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
                    <form method="post" action=<?php echo "index.php?hal=bataltpp"; ?> >
                    <table border="0">
                        <tr><td colspan="2">Masukkan Kata Kunci : No BCF 15, No BL, Nama Consignee, Nama Notify</td></tr>
                          <tr><td>Kata Kunci</td><td><input class="required" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" /></td></tr>
                          <tr><td>Tahun BCF 1.5</td><td><input class="required" name="txttahun" type="text" value="<?php echo "$tahun"; ?>" class="inputsearch" /></td><td>(Examp : 2012 or 2013)</td></tr>
                    <tr><td><input class="button putih bigrounded " type="submit" name="Submit2" value="Cari" class="submitsearch" /></td></tr>
                    <tr><td><input name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                      </table>
                    </form>
                    <br />

                    <?php
                    ob_start();
                    if($act=="1"){echo "Update Berhasil";};
                    if($act=="2"){echo "Delete Berhasil";};
                    if($act=="3"){echo "Penambahan User Berhasil";};
                    if (($mode=='cari')) {
                        $rpp = 10; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=bataltpp";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15,tpp  where bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' and recordstatus='2'  order by tahun desc";
                    $result = mysql_query($sql);

                    $tcount = mysql_num_rows($result);

                    $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number

                    $count = 0;
                    $i = ($page-1)*$rpp;
                    set_time_limit(10);
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
                    $sqltampil = "SELECT * FROM bcf15,tpp  where bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' and recordstatus='2'  order by tahun desc LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 10; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=bataltpp";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and recordstatus='2'  order by tahun ";
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
                    $sqltampil = "SELECT * FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and recordstatus='2'  order by tahun desc LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    
                    /* ======================================================== pagination selesai ===================================================== */
                    ?>


                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ob_end_flush();
                    ?><br>
                    
                    <table class="data">
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">No BCF 1.5</th>
                            <th class="judultabel">Tgl BCF1.5</th>
                            <th class="judultabel">Posisi Barang</th>
                            <th class="judultabel">Importir</th>
                            
                            
                            <th class="judultabel">Permohonan Pembatalan</th>
                           
                            <th class="judultabel" >Setuju Pembatalan</th>
                            <th class="judultabel">Action</th>
                            <th class="judultabel">Cetak</th>
                            <th class="judultabel">Keterangan</th>
                            <th class="judultabel">Jatuh Tempo</th>
                            </tr>

                    <?php
                    while($data = mysql_fetch_array($tampil)){
                         $now=date('Y-m-d');
                        $tglbcf=$data['bcf15tgl'];
                        
                        $querytempo ="select datediff('$now','$tglbcf') as selisih";
                        $hasiltempo=mysql_query($querytempo);
                        $datatempo=mysql_fetch_array($hasiltempo);
                        
                        $selisih=$datatempo['selisih'];

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
                    <td class="isitabel"><?php echo  tglindo($data['bcf15tgl']); ?></td>
                    <td class="isitabel"><?php if ($data['bamasukno']=='') {echo "<font color=blue>TPS :$data[idtps]</font>"; }  else {echo "<font color=red>TPP :$data[nm_tpp]</font>";} ?></td>
                    <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                    
                    
                    
                    <td class="isitabel"><?php echo  $data['SuratBatalNo']; ?></td>
                    <td align="center" class="isitabel"> <?php if ($data['SetujuBatalNo']=='') {echo "Belum Batal";}   else {echo "$data[SetujuBatalNo]"; } ?></td>
                    <td align="center" class="isitabel"> <?php if ($data['SetujuBatalNo']=='') {echo "<a href='?hal=suratbataltpp&id=$data[idbcf15]' target='_new'>Input</a> ";} else {echo "<a href='?hal=suratbataltpp&id=$data[idbcf15]' target='_new'>Edit</a> ";} ?></td>
                    <td align="center" class="isitabel"> <?php if ($data['SetujuBatalNo']=='') {echo "";} else {echo "<a href='?hal=suratbataltppok&id=$data[idbcf15]' target='_new'>Cetak</a> ";} ?></td>
                    <td class="isitabel">
                        <?php
                                                $sql = "SELECT * FROM statusakhir ORDER BY idstatusakhir";
                                                $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($bcf15 =mysql_fetch_array($qry)) {
                                                        if ($bcf15[idstatusakhir]==$data[idstatusakhir]) {
                                                           
                                                        echo "$bcf15[statusakhirname]";
                                                }
                                                }
                                                ?>
                    </td>
                    <td class="isitabel" align="center"><?php echo  "$selisih Hari" ; ?></td>
                    </tr>
                    <?php
                    };
                    ?>
                    </table><br/><br />
                    
                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ob_end_flush();
                    ?>
            
        </body>
        </html>
        <?php
};
?>
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
              $("#browseseksitpp2").tabs({event:"mouseover"}).find(".ui-tabs-nav").sortable();
           });
        </script>
       
    </head>
    <body>
        <div id="browseseksitpp2">
      <ul>
  	     <li><a href="#tabs-1">BROWSE NOTA DINAS PEMBUKAAN SEGEL PENGAMANAN</a></li>
             
	     <li><a href="#tabs-5">Help / petunjuk</a></li>
             
	     
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
                    <form method="post" action=<?php echo "index.php?hal=browsendbukasegelseksi"; ?> >
                    <input name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" />
                    <input type="submit" name="Submit2" value="Cari" class="submitsearch" />  
                    <input name="mode" type="hidden" id="mode" value="cari" /><strong bgcolor="ddffff"> Cari Berdasarkan <font color="red">No BCF 15</font>, <font color="green">BL</font>, <font color="blue">Nm Consignee</font>, <font color="blue">Notify</font> dan <font color="purple">No Nota Dinas</font></strong>
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

                    $reload = "index.php?hal=browsendbukasegelseksi";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15 where ((bcf15no LIKE '%$katakunci%') OR (ndsegelno LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and  segel='1'";
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
                    $sqltampil = "SELECT * FROM bcf15 where ((bcf15no LIKE '%$katakunci%') OR (ndsegelno LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and  segel='1' LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 10; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=browsendbukasegelseksi";

                    // data mentah 
                    $sql = "SELECT * FROM bcf15 where  segel='1'";
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
                    $sqltampil = "SELECT * FROM bcf15 where segel='1' LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?><br />


                    <h2>DAFTAR BCF 1.5 YANG TERKENA SEGEL PENGAMANAN</h2>
                    <table class="data">
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">No BCf 15</th>
                            <th class="judultabel">Tangal BCF</th>
                            <th class="judultabel">No BC 11</th>
                            <th class="judultabel">Tanggal BC 11</th>
                            <th class="judultabel">No ND</th>
                            <th class="judultabel">Tanggal ND</th>
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
                    <td class="isitabel"><?php echo  $data['ndsegelno']; ?></td>
                    <td class="isitabel"><?php echo  $data['ndsegeldate']; ?></td>
                    <td align="center" class="isitabel"><a href="?hal=sprintview&id=<?php echo  $data['idbcf15']; ?>">Lihat</a>  | <a href="?hal=viewndbukasegelseksi&id=<?php echo  $data['idbcf15']; ?>">View ND</a> | <a href="?hal=cetakbukasegelok&id=<?php echo  $data['idbcf15']; ?>">Cetak</a> 
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
            
            <div id="tabs-5">
                Browse BCF 15 : Modul ini di gunakan untuk melihat BCF 15 yang dikhususkna untuk seksi Tempat Penimbunan Bid II
                Syarat BCF 15 yang diberlakukan di modul ini adalah :
                1. Harus berstatus record aktif;
                
                
                
            </div>
            
        </body>
        </html>
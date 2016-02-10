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
    <title>Saldo BCF 15</title>
 
       
    </head>
    <body>
       
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
                    <form method="post" action=<?php echo "index.php?hal=sekbrowsaldositbun"; ?> >
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

                    $reload = "index.php?hal=sekbrowsaldositbun";

                    // data mentah 
                    $sql = "SELECT *, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and recordstatus='2' and masuk='1' and batal='2'  order by tahun ";
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
                    $sqltampil = "SELECT *, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl FROM bcf15,tpp  where bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and recordstatus='2' and masuk='1' and batal='2'  order by tahun  LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 10; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=sekbrowsaldositbun";

                    // data mentah 
                    $sql = "SELECT *, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp  and recordstatus='2' and masuk='1' and batal='2'  order by tahun ";
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
                    $sqltampil = "SELECT *, DATE_FORMAT(bcf15tgl,'%d %M %Y') as bcf15tgl FROM bcf15,tpp  where bcf15.idtpp=tpp.idtpp and recordstatus='2' and masuk='1' and batal='2' order by tahun  LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?><br />

                    
                    <h2>Daftar BCF 1.5 Yang menjadi Saldo di TPP </h2>
                    <table class="data" width="100%">
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">No BCf 15</th>
                            <th class="judultabel">Tangal BCF</th>
                            <th class="judultabel">TPP</th>
                            <th class="judultabel">Importir</th>
                            <th class="judultabel">No Kep</th>
                            <th class="judultabel">Status Akhir</th>
                            <th class="judultabel">KD-Status Akhir</th>
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
                    <td class="isitabel"><?php echo  $data['nm_tpp']; ?></td>
                    <td class="isitabel"><?php if ($data['consignee']=="Notify Party") {echo $data['notify']; } else  {echo $data['consignee'];;};?></td>
                    <td class="isitabel"><?php echo  $data['NoKepStatus_Akhr']; ?></td>
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
                    <td class="isitabel" align="center"><?php echo  $data['idstatusakhir']; ?></td>
                    <td align="center" class="isitabel"><a href="?hal=sekdetailstatusakhir&id=<?php echo  $data['idbcf15']; ?>">Detail</a>
                    </td>
                    
                    </tr>
                     
                    <?php
                    };
                    ?>
                    </table><br/><br />
                    <font color="red">* Saldo Akhir TPP (maunya seperti apa mas) monggo masukannya.. </font><br></br>
                   
                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
          
            
        </body>
        </html>
        <?php
};
?>
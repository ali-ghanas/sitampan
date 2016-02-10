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
                     ob_start();


                    $act = $_GET['act'];
                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
                    
                    ?>
                    <form method="post" action=<?php echo "index.php?hal=pagemanifest&pilih=querybcf15"; ?> >
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

                    $reload = "index.php?hal=pagemanifest&pilih=querybcf15";

                    // data mentah 
                    $sql = "SELECT tglvalidasibcf15,idbcf15,blno,recordstatus,tahun,bcf15no,bcf15tgl,bc11no,bc11tgl,bc11pos,consignee,notify,idtps,idtpp,idtypecode,validasibcf15baru,perintah FROM bcf15 where ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' order by tahun, bcf15no asc ";
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
                    $sqltampil = "SELECT tglvalidasibcf15,idbcf15,blno,recordstatus,tahun,bcf15no,bcf15tgl,bc11no,bc11tgl,bc11pos,consignee,notify,idtps,idtpp,idtypecode,validasibcf15baru,perintah FROM bcf15 where ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' order by tahun,bcf15no asc  LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    $max	 = ceil($count/$rpp);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagemanifest&pilih=querybcf15";
                    $tahunnow=date('Y');
                    // data mentah 
                    $sql = "SELECT tglvalidasibcf15,idbcf15,blno,recordstatus,tahun,bcf15no,bcf15tgl,bc11no,bc11tgl,bc11pos,consignee,notify,idtps,idtpp,idtypecode,validasibcf15baru,perintah FROM bcf15 where (tahun=$tahunnow or tahun=".($tahunnow -1).") order by bcf15no desc ";
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
                    $sqltampil = "SELECT tglvalidasibcf15,idbcf15,blno,recordstatus,tahun,bcf15no,bcf15tgl,bc11no,bc11tgl,bc11pos,consignee,notify,idtps,idtpp,idtypecode,validasibcf15baru,perintah FROM bcf15 where (tahun=$tahunnow or tahun=".($tahunnow -1).") order by bcf15no desc LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    $max	 = ceil($count/$rpp);
                    
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?><br />
                    <table>
                        <tr>
                        <td colspan="3"><b>Jumlah Data :</b> <?php echo $count; ?> </td>
                        <td colspan="5" align="right"><b>Halaman ke :</b>
                            <?php
                            //memapilkan previous
                            
                            if ($nohal > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?hal=pagemanifest&pilih=querybcf15&page=".($nohal-1)."'>&lt;&lt; Prev</a>";
                            // memunculkan nomor halaman dan linknya
                            //$page=$h $jumpage=$max
                            for($h = 1; $h <= $max; $h++)
                            {
                            if ((($h >= $nohal - 3) && ($h <= $nohal + 3)) || ($h == 1) || ($h == $max))
                            {
                            if (($showPage == 1) && ($h != 2))  echo "...";
                            if (($showPage != ($max - 1)) && ($h == $max))  echo "...";
                            if ($h == $nohal) echo " <b>".$h."</b> ";
                            else echo " <a href='".$_SERVER['PHP_SELF']."?hal=pagemanifest&pilih=querybcf15&page=".$h."'>".$h."</a> ";
                            $showPage = $h;
                            }
                            }
                            
                            // menampilkan link next

                            if ($nohal < $max) echo "<a href='".$_SERVER['PHP_SELF']."?hal=pagemanifest&pilih=querybcf15&page=".($nohal+1)."'>Next &gt;&gt;</a>";
                            ?></td>
                      </tr>
                      <tr>
                          <td>
                              Periode Tahun : <?php if (($mode=='cari')) { echo $tahun;} else {echo "<font color=red>$tahunnow</font>";}?>
                          </td>
                      </tr>
                    </table><br/>

                    <table class="data" >
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel">No BCF 15</th>
                            <th class="judultabel">Tangal BCF</th>
                            <th class="judultabel">BC 11</th>
                            <th class="judultabel">BL</th>
                            <th class="judultabel">Consignee/Notify</th>
                            
                            <th class="judultabel">Edit BCF 1.5</th>
                            <th class="judultabel">Cetak BCF 1.5</th>
                            <th class="judultabel">Hapus</th>
                            
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
                    <td class="isitabel"><?php echo  $data['blno']; ?></td>
                    
                    <td align="center" class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } else  {echo $data['consignee'];};?> </td>
                   
                   <td align="center" class="isitabel"><?php if ($data['recordstatus']=='1') {echo "<a href='?hal=bcfedit&id=$data[idbcf15]' target='_new'><img src='images/new/update.png' /></a> " ;} elseif ($data['validasibcf15baru']=='2') {echo "<a href='?hal=bcfedit&id=$data[idbcf15]' target='_new'><img src='images/new/update.png' /></a> " ;} elseif ($data['validasibcf15baru']=='3') {echo "Cetak Sprint" ;}  ?> </td>
                   <td align="center" class="isitabel"><?php if ($data['idtpp']=='0') {echo "TPP not found" ;} else echo "<a href='?hal=bcf15report&id=$data[idbcf15]' target='_new'><img src='images/new/printer.png' /></a> " ; ?> </td>
                   <td align="center" class="isitabel"><?php if ($data['perintah']=='1') {echo "" ;} else echo "<a href='?hal=pagemanifest&pilih=delbcf15&id=$data[idbcf15]' onclick=\"javascript:return confirm('Yakin untuk dihapus BCF 1.5: $data[bcf15no]/$data[tahun] ?')\" ><img src='images/new/delete.png'  /></a> " ; ?> </td>
                   
                    </tr>
                    
                    <?php
                    };
                    ?>
                    </table>
                    <br/><br />
                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
                    
            
        </body>
        </html>
        <?php

        ob_end_flush();
};
?>
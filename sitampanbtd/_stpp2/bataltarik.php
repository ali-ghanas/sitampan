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
                    
                    <form method="post" action=<?php echo "index.php?hal=pagemonitoring&pilih=bataltarik"; ?> >
                        <table>
                            <tr>
                                <td><a href="?hal=pagemonitoring&pilih=bataltarik_sim">Input Banyak</a></td>
                                
                            </tr>
                            <tr>
                                <td height="40"></td>
                            </tr>
                        </table>   
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

                    $reload = "index.php?hal=pagemonitoring&pilih=bataltarik";

                    // data mentah 
                    $sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,BatalTarikNo,BatalTarikDate,BatalTarikKet,bamasukno,bamasukdate,suratno,suratperintahno,ndsegelno
                    FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' and masuk='2' order by BatalTarikNo desc ";
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
                    $sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,BatalTarikNo,BatalTarikDate,BatalTarikKet,bamasukno,bamasukdate,suratno,suratperintahno,ndsegelno
                    FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and ((bcf15no LIKE '%$katakunci%') 
                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun LIKE '%$tahun%' and masuk='2' order by BatalTarikNo desc LIMIT $limit,$rpp";

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    else {
                    /* ======================================================== pagination mulai ===================================================== */
                    $rpp = 20; // Jumlah data per halaman 

                    $page = intval($_GET["page"]);
                    if(!$page) $page = 1;

                    $reload = "index.php?hal=pagemonitoring&pilih=bataltarik";
                    $tgl_now=date('Y-m-d');
                    $tahun_now=substr($tgl_now,0,4);
                    // data mentah 
                    $sql = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,BatalTarikNo,BatalTarikDate,BatalTarikKet,bamasukno,bamasukdate,suratno,suratperintahno,ndsegelno
                        FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and masuk='2' and tahun='$tahun_now' order by BatalTarikNo desc ";
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
                    $sqltampil = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,BatalTarikNo,BatalTarikDate,BatalTarikKet,bamasukno,bamasukdate,suratno,suratperintahno,ndsegelno
                    FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and masuk='2' and tahun='$tahun_now'  order by BatalTarikNo desc LIMIT $limit,$rpp" ;

                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                    $tampil= mysql_query($sqltampil);
                    $count	=mysql_num_rows($result);
                    }
                    /* ======================================================== pagination selesai ===================================================== */
                    ?>
                    <?php 
                    //untuk menampilkan paginasi
                    echo paginate($reload, $page, $tpages);
                    ?>
                    <br/>

                    <table class="data" >
                            <tr><th class="judultabel">No</th>
                            <th class="judultabel" >Permohonan Batal Tarik</th>    
                            <th class="judultabel" colspan="2">BCF 15</th>
                            <th class="judultabel">Consignee</th>
                            
                            <th class="judultabel">Posisi Barang</th>
                            <th class="judultabel">Surat Perintah</th>
                            <th class="judultabel">Surat P'tahuan</th>
                            <th class="judultabel">Segel P2</th>
                            <th class="judultabel">Input</th>
                            <th class="judultabel">Delete</th>
                            <th class="judultabel">History</th>
                            
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
                    <td class="isitabel"><?php echo  $data['BatalTarikNo']; ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15no']; ?></td>
                    <td class="isitabel"><?php echo  $data['bcf15tgl']; ?></td>
                    <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } elseif ($data['consignee']=="To The Order") {echo $data['notify']; } elseif ($data['consignee']=="ToTheOrder") {echo $data['notify']; } elseif ($data['consignee']=="totheorder") {echo $data['notify']; }  else  {echo $data['consignee'];};?></td>
                    
                    <td class="isitabel"><?php if ($data['bamasukno']=='') {echo "<blink><font color=blue>TPS :$data[idtps]</font></blink>"; }  else {echo "<font color=red>TPP :$data[nm_tpp]</font>";} ?></td>
                    <td class="isitabel"><?php if ($data['suratperintahno']=='') {echo ''; } else{echo '<img src="images/new/ok.png"></img>'; } ?></td>
                    <td class="isitabel"><?php if ($data['suratno']=='') {echo ''; } else{echo '<img src="images/new/ok.png"></img>'; } ?></td>
                    <td class="isitabel"><?php if ($data['ndsegelno']=='') {echo ''; } else{echo '<img src="images/new/ok.png"></img>'; } ?></td>
                    <td align="center" class="isitabel"><?php if ($data['bamasukno']=='') {echo "<a href='?hal=bataltarikedit&id=$data[idbcf15]' title='Input Batal tarik' ><img src='images/new/update.png' /></a> ";  } else {echo 'Masuk TPP';}; ?> </td>
                    <td align="center" class="isitabel"><?php if ($data['bamasukno']=='') {echo "<a href='?hal=pagemonitoring&pilih=bataltarik_hapus&id=$data[idbcf15]' title='Input Batal tarik' ><img src='images/new/delete.png' /></a> ";  } else {echo 'Masuk TPP';}; ?> </td>
                    <td align="center" class="isitabel"><a href="?hal=detailstatusakhirman&id=<?php echo  $data['idbcf15']; ?>" title='History'><img src="images/new/view.png" /></a></td>
                    </tr>
                    
                    <?php
                    
                   
                    };
                    ?>
                    </table>
                    
                    
            
        </body>
        </html>
        <?php
};
?>
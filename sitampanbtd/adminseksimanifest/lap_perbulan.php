<html>
    <head>
    <title>Eksport Data bcf 1.5 Per TPP</title>
    <!--       jquery anytimes -->
        
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function() {
              $("#laporantpp").tabs({event:"mouseover"}).find(".ui-tabs-nav").sortable();
           });
        </script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#form1").submit(function() {
                 if ($.trim($("#tpp").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> TPP Harus Di pilih dulu");
                    $("#tpp").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 
        
    
    </head>
    <body>
        <div id="laporantpp">
            
                <ul>
                <li><a href="#tabs-1">Daftar BCF 1.5</a></li>
                <li><a href="#tabs-2">Terbit</a></li>
                <li><a href="#tabs-3">Masuk</a></li>
                <li><a href="#tabs-4">Batal Tarik</a></li>
                <li><a href="#tabs-5">Masih di TPS </a></li>
                
                </ul>
                
                <div id="tabs-1">
               
                                    <?php // yang belum koneksi database diabaikan aja dulu file ini
                                     session_start();
                                     include "lib/function.php";

                                    $act = $_GET['act'];
                                    if(!isset($_REQUEST['mode'])){$mode='';}else{$mode=$_REQUEST['mode'];}
                                    $katakunci=htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
                                    $tahun=htmlentities(trim(mysql_real_escape_string($_REQUEST['txttahun'])));
                                    $tpp=htmlentities(trim(mysql_real_escape_string($_REQUEST['tpp'])));

                                    ?>
                                    <form method="post" action=<?php echo "index.php?hal=pagebcf15&pilih=lapbul&tabs=1"; ?> >
                                    <table> 
                                          <tr><td>Masukkan Kata Kunci</td><td><input class="required" name="katakunci" type="text" value="<?php echo "$katakunci"; ?>" class="inputsearch" /></td><td>(BCF15,BL,Consignee,Notify)</td></tr>

                                          <tr><td>TPP</td>
                                              <td>
                                                <select class="required" id="tpp" name="tpp">
                                                    <option value = "" >--All TPP--</option>
                                                    <?php
                                                        $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                            while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idtpp]==$Datatpp) {
                                                                    $cek="selected";
                                                                    }
                                                               else {
                                                                    $cek="";
                                                                    }
                                                                    echo "<option value='$data[idtpp]' $cek>$data[nm_tpp]</option>";
                                                                }
                                                    ?>
                                                </select>
                                                </td>
                                              <td></td></tr>
                                    <tr><td><input type="submit" name="Submit2" value="Cari" class="button putih bigrounded " /></td></tr>
                                    <tr><td><input  name="mode" type="hidden" id="mode" value="cari" /></td></tr>
                                      </table>
                                    </form>


                                    <?php
                                    if($act=="1"){echo "Update Berhasil";};
                                    if($act=="2"){echo "Delete Berhasil";};
                                    if($act=="3"){echo "Penambahan User Berhasil";};
                                    $now=date('Y');
                                    if (($mode=='cari')) {
                                        $rpp = 10; // Jumlah data per halaman 

                                    $page = intval($_GET["page"]);
                                    if(!$page) $page = 1;

                                    $reload = "index.php?hal=pagebcf15&pilih=lapbul&tabs=1";

                                    // data mentah 
                                    $sql = "SELECT * FROM bcf15,tpp,seksi where ((bcf15no LIKE '%$katakunci%') 
                                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun='$now' and bcf15.idtpp LIKE '%$tpp%' and recordstatus='2' and bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi  order by bcf15no,nm_tpp desc ";
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
                                    $sqltampil = "SELECT * FROM bcf15,tpp,seksi where ((bcf15no LIKE '%$katakunci%') 
                                    OR (blno LIKE '%$katakunci%') OR (consignee LIKE '%$katakunci%') OR (notify LIKE '%$katakunci%')) and tahun=$now and bcf15.idtpp LIKE '%$tpp%' and recordstatus='2' and bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi  order by bcf15no,nm_tpp desc LIMIT $limit,$rpp";

                                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                                    $tampil= mysql_query($sqltampil);
                                    $count	=mysql_num_rows($result);
                                    }
                                    else {
                                    /* ======================================================== pagination mulai ===================================================== */
                                    $rpp = 10; // Jumlah data per halaman 

                                    $page = intval($_GET["page"]);
                                    if(!$page) $page = 1;

                                    $reload = "index.php?hal=pagebcf15&pilih=lapbul&tabs=1";

                                    // data mentah 
                                    $sql = "SELECT * FROM bcf15,tpp,seksi where bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and recordstatus='2' and tahun=$now  order by bcf15no,nm_tpp desc ";
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
                                    $sqltampil = "SELECT * FROM bcf15,tpp,seksi where bcf15.idtpp=tpp.idtpp and bcf15.idseksi=seksi.idseksi and recordstatus='2' and tahun=$now  order by bcf15no,nm_tpp desc LIMIT $limit,$rpp" ;

                                    if($tcount>0) {$awal = "$limit" + "1";} else {$awal="0";}
                                    $tampil= mysql_query($sqltampil);
                                    $count	=mysql_num_rows($result);
                                    }
                                    /* ======================================================== pagination selesai ===================================================== */
                                    ?><br />


                                    <table class="data" >
                                            <tr><th class="judultabel">No</th>

                                            <th class="judultabel">No BCF 15</th>
                                            <th class="judultabel">Tangal BCF</th>
                                            <th class="judultabel">No BC 11</th>
                                            <th class="judultabel">Consignee</th>
                                            <th class="judultabel">Penandatangan</th>
                                            <th class="judultabel" colspan="2">No Surat Pengantar</th>
                                            <th class="judultabel">Lokasi Timbun</th>
                                            <th class="judultabel">Masuk *)</th>
                                            <th class="judultabel">Batal BCF 1.5 **)</th>
                                            <th class="judultabel">Batal Tarik ***)</th>
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
                                    <td class="isitabel"><font color="green"><b><?php echo  $data['bcf15no']; ?></b></font></td>
                                    <td class="isitabel"><?php echo  $data['bcf15tgl']; ?></td>
                                    <td class="isitabel"><?php echo  $data['bc11no']; ?></td>
                                    <td class="isitabel"><?php if ($data['consignee']=="To Order") {echo $data['notify']; } elseif ($data['consignee']=="to order") {echo $data['notify']; } elseif ($data['consignee']=="toorder") {echo $data['notify']; } elseif ($data['consignee']=="ToOrder") {echo $data['notify']; } else  {echo $data['consignee'];};?></td>
                                    <td class="isitabel"><?php echo  $data['plh']; ?><?php echo  $data['nm_seksi']; ?></td>
                                    <td class="isitabel" ><font color="green"><?php echo  $data['suratpengantarno']; ?></font></td>
                                    <td class="isitabel"><?php echo  tglindo($data['suratpengantartgl']); ?></td>
                                    <td class="isitabel"><?php if($data['masuk']=='1') {echo "<font color=blue>$data[nm_tpp]</font>";} else {echo "<font color=red>$data[idtps]</font>";} ?></td>
                                    <td class="isitabel" ><?php if($data['masuk']=='1') {echo "<img src='images/new/ok.png' />";} elseif($data['masuk']=='2') {echo "";} ?></td>
                                    <td class="isitabel" ><?php if($data['SetujuBatalNo']=='') {echo "";} else {echo "<img src='images/new/ok.png' />";} ?></td>
                                    <td class="isitabel" ><?php if($data['BatalTarikNo']=='') {echo "";} else{echo "<img src='images/new/ok.png' />";} ?></td>
                                    </tr>
                                    <?php
                                    };
                                    ?>
                                    </table><br/><br />
                                    <?php 
                                    //untuk menampilkan paginasi
                                    echo paginate($reload, $page, $tpages);
                                    ?>
                                    <br/>
                                    <table >
                                        <tr>
                                            <td class="isitabel">*)</td><td class="isitabel">Masuk TPP</td>
                                        </tr>
                                        <tr>
                                            <td class="isitabel">**)</td><td class="isitabel">Persetujuan Pembatalan BCF 1.5 oleh Seksi Penimbunan</td>
                                        </tr>
                                        <tr>
                                            <td class="isitabel">***)</td><td class="isitabel">Permohonan Batal Tarik oleh pihak TPP dengan berbagai alasan</td>
                                        </tr>
                                    </table>
                            </div>
                
                <div id="tabs-2">
                    
                <?php 
                
                $sql = "SELECT * FROM tpp  ";
                $query   = mysql_query( $sql );
                $data1=mysql_fetch_array( $query );
                $now=date('Y');
                
                ?>
                              <table border="0" width="100%">
                                <tr><td colspan="9"><h4>Jumlah BCF 1.5 yang terbit Per TPP Tahun <?php echo $now;?></h4></td></tr>
                                <tr>
                                    <td class="judultabel">No</td>
                                    <td class="judultabel">Nama TPP</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%m') as bulan, tahun FROM bcf15 where tahun='2012' group by bulan order by bulan asc  ";
                                            $query   = mysql_query( $sql );
                                            while ($data1=mysql_fetch_array( $query ))
                                 {

                                 echo "<td class='judultabel'>Bln $data1[bulan]</td>";

                                 }

                                 echo "<td class='judultabel'>Jumlah</td>"
                                     ?>


                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT * FROM TPP";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                               
                                                
                                 {
                                   $idtpp=$data1['idtpp'];
                                    if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[nm_tpp]</td>";  

                                   //query untuk menampilkan bulan berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct DATE_FORMAT(bcf15tgl,'%m') as bcf15tgl, tahun FROM bcf15 where tahun='2012' order by bcf15tgl asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['bcf15tgl'];
                                       
                                       //query untuk mencari jumlah bcf15 pertahun per tpp

                                       $query4="select count(*) as jumlahbcf, idtpp, bcf15tgl, tahun from bcf15 where tahun='2012' and  DATE_FORMAT(bcf15tgl,'%m')='$tahun' and idtpp='$idtpp'  ";
                                       $hasil4=mysql_query($query4);
                                       $data4=mysql_fetch_array($hasil4);

                                       //menghitung total bcf15 perjurusan (gunakan increment)
                                       $jumlahpertahun += $data4['jumlahbcf'];

                                       //menampilkan jumlah mahasiswa pertpp dan pr tahun
                                       echo "<td class='isitabel'>$data4[jumlahbcf]</td>";
                                   }
                                       //menampilkan jumlah mahasiswa per angkatan perjurusan
                                       echo "<td class='isitabel'>$jumlahpertahun</td>";
                                       echo "</tr>";

                                       $no++;//increment untuk no urut data

                                 }
                                 ?>


                            </table>
                       <br />
                    
                    </div>
                    <div id="tabs-3">

                            <table border="0" width="100%">
                                <tr><td colspan="9"><h4>Jumlah BCF 1.5 yang masuk Per TPP</h4></td></tr>
                                <tr>
                                    <td class="judultabel">No</td>
                                    <td class="judultabel">Nama TPP</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%M') as bulan, tahun,masuk FROM bcf15 where tahun='2012' and masuk='1' group by bulan order by bulan desc  ";
                                            $query   = mysql_query( $sql );
                                            while ($data1=mysql_fetch_array( $query ))
                                 {

                                 echo "<td class='judultabel'>$data1[bulan]</td>";

                                 }

                                 echo "<td class='judultabel'>Jumlah</td>"
                                     ?>


                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT * FROM TPP";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                               
                                                
                                 {
                                   $idtpp=$data1['idtpp'];
                                    if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[nm_tpp]</td>";  

                                   //query untuk menampilkan bulan berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct DATE_FORMAT(bcf15tgl,'%M') as bcf15tgl, tahun, masuk FROM bcf15 where tahun='2012' and masuk='1' order by bcf15tgl desc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['bcf15tgl'];
                                       
                                       //query untuk mencari jumlah bcf15 pertahun per tpp

                                       $query4="select count(*) as jumlahbcf, idtpp, bcf15tgl, tahun, masuk from bcf15 where tahun='2012' and masuk='1' and  DATE_FORMAT(bcf15tgl,'%M')='$tahun' and idtpp='$idtpp'  ";
                                       $hasil4=mysql_query($query4);
                                       $data4=mysql_fetch_array($hasil4);

                                       //menghitung total bcf15 perjurusan (gunakan increment)
                                       $jumlahpertahun += $data4['jumlahbcf'];

                                       //menampilkan jumlah mahasiswa pertpp dan pr tahun
                                       echo "<td class='isitabel'>$data4[jumlahbcf]</td>";
                                   }
                                       //menampilkan jumlah mahasiswa per angkatan perjurusan
                                       echo "<td class='isitabel'>$jumlahpertahun</td>";
                                       echo "</tr>";

                                       $no++;//increment untuk no urut data

                                 }
                                 ?>


                            </table>
                        </div>
                        <div id="tabs-4">
                            <br/>
                            <table border="0" width="100%">
                                <tr><td colspan="9"><h4>Jumlah Pengajuan Batal Tarik BCF 1.5</h4></td></tr>
                                <tr>
                                    <td class="judultabel">No</td>
                                    <td class="judultabel">Nama TPP</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%M') as bulan, tahun,BatalTarik FROM bcf15 where tahun='2012' and BatalTarik='1' group by bulan order by bulan desc  ";
                                            $query   = mysql_query( $sql );
                                            while ($data1=mysql_fetch_array( $query ))
                                 {

                                 echo "<td class='judultabel'>$data1[bulan]</td>";

                                 }

                                 echo "<td class='judultabel'>Jumlah</td>"
                                     ?>


                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT * FROM TPP";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                               
                                                
                                 {
                                   $idtpp=$data1['idtpp'];
                                    if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[nm_tpp]</td>";  

                                   //query untuk menampilkan bulan berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct DATE_FORMAT(bcf15tgl,'%M') as bcf15tgl, tahun, BatalTarik FROM bcf15 where tahun='2012' and BatalTarik='1' order by bcf15tgl desc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['bcf15tgl'];
                                       
                                       //query untuk mencari jumlah bcf15 pertahun per tpp

                                       $query4="select count(*) as jumlahbcf, idtpp, bcf15tgl, tahun, BatalTarik from bcf15 where tahun='2012' and BatalTarik='1' and  DATE_FORMAT(bcf15tgl,'%M')='$tahun' and idtpp='$idtpp'  ";
                                       $hasil4=mysql_query($query4);
                                       $data4=mysql_fetch_array($hasil4);

                                       //menghitung total bcf15 perjurusan (gunakan increment)
                                       $jumlahpertahun += $data4['jumlahbcf'];

                                       //menampilkan jumlah mahasiswa pertpp dan pr tahun
                                       echo "<td class='isitabel'>$data4[jumlahbcf]</td>";
                                   }
                                       //menampilkan jumlah mahasiswa per angkatan perjurusan
                                       echo "<td class='isitabel'>$jumlahpertahun</td>";
                                       echo "</tr>";

                                       $no++;//increment untuk no urut data

                                 }
                                 ?>


                            </table>
                        </div>
                        <div id="tabs-5">
                            
                            <table border="0" width="100%">
                                <tr><td colspan="9"><h4>Jumlah BCF 1.5 Yang Masih di TPS</h4></td></tr>
                                <tr>
                                    <td class="judultabel">No</td>
                                    <td class="judultabel">Nama TPP</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%M') as bulan, tahun,BatalTarik FROM bcf15 where tahun='2012' and BatalTarik='1' group by bulan order by bulan desc  ";
                                            $query   = mysql_query( $sql );
                                            while ($data1=mysql_fetch_array( $query ))
                                 {

                                 echo "<td class='judultabel'>$data1[bulan]</td>";

                                 }

                                 echo "<td class='judultabel'>Jumlah</td>"
                                     ?>


                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT * FROM TPP";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                               
                                                
                                 {
                                   $idtpp=$data1['idtpp'];
                                    if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[nm_tpp]</td>";  

                                   //query untuk menampilkan bulan berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct DATE_FORMAT(bcf15tgl,'%M') as bcf15tgl, tahun, BatalTarik FROM bcf15 where tahun='2012' and BatalTarik='1' order by bcf15tgl desc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['bcf15tgl'];
                                       
                                       //query untuk mencari jumlah bcf15 pertahun per tpp

                                       $query4="select count(*) as jumlahbcf, idtpp, bcf15tgl, tahun, BatalTarik from bcf15 where tahun='2012' and masuk='2' and  DATE_FORMAT(bcf15tgl,'%M')='$tahun' and idtpp='$idtpp'  ";
                                       $hasil4=mysql_query($query4);
                                       $data4=mysql_fetch_array($hasil4);

                                       //menghitung total bcf15 perjurusan (gunakan increment)
                                       $jumlahpertahun += $data4['jumlahbcf'];

                                       //menampilkan jumlah mahasiswa pertpp dan pr tahun
                                       echo "<td class='isitabel'>$data4[jumlahbcf]</td>";
                                   }
                                       //menampilkan jumlah mahasiswa per angkatan perjurusan
                                       echo "<td class='isitabel'>$jumlahpertahun</td>";
                                       echo "</tr>";

                                       $no++;//increment untuk no urut data

                                 }
                                 ?>


                            </table>
                             
                        </div>
                        
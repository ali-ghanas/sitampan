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
                
                <li><a href="#tabs-2">Terbit (%)</a></li>
                <li><a href="#tabs-3">Tidak Masuk TPP (%)</a></li>
                <li><a href="#tabs-4">Masuk TPP (%)</a></li>
                
                </ul>
                
                
        
        
                <div id="tabs-2">
                <?php 
                include '../../lib/koneksi.php';
                include '../../lib/function.php';
                $sql = "SELECT * FROM tpp  ";
                $query   = mysql_query( $sql );
                $data1=mysql_fetch_array( $query );
                
                ?>
                    <table border="0" width="100%">
                                <tr><td colspan="9"><h1>Tabel Jumlah BCF 1.5 yang terbit Per Tahun</h1></td></tr>
                                <tr>
                                    <td class="judultabel">No</td>
                                    <td class="judultabel">Tahun</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%m') as bulan FROM bcf15 group by tahun order by tahun asc  ";
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

                                            $query1   = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%M') as bulan FROM bcf15 group by tahun order by tahun asc  ";
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
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[tahun]</td>";  

                                   //query untuk menampilkan tahun berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct (tahun) as tahun from bcf15 order by tahun asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['tahun'];

                                       //query untuk mencari jumlah bcf15 pertahun per tpp
                                       
                                       $query4="select count(*) as jumlahbcf, idtpp,tahun,DATE_FORMAT(bcf15tgl,'%M') as bulan from bcf15 where tahun='$tahun'  ";
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
                    <hr/>
                    <table border="0" width="70%">
                                <tr><td colspan="9"><h1>Berdasarkan Type Container</h1></td></tr>
                                <tr>
                                    <td class="judultabel" width="10">No</td>
                                    <td class="judultabel" width="100">Type Container</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun FROM bcf15 group by tahun order by tahun asc  ";
                                            $query   = mysql_query( $sql );
                                            while ($data1=mysql_fetch_array( $query ))
                                 {

                                 echo "<td class='judultabel' width='50'>$data1[tahun]</td>";

                                 }

                                 echo "<td class='judultabel' width='50'>Jumlah</td>"
                                     ?>


                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT * FROM typecode";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 {
                                   $idtypecode=$data1['idtypecode'];
                                   if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[nm_type]</td>";  

                                   //query untuk menampilkan tahun berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct (tahun) as tahun from bcf15 order by tahun asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['tahun'];

                                       //query untuk mencari jumlah bcf15 pertahun per tpp

                                       $query4="select count(*) as jumlahbcf, idtypecode,tahun from bcf15 where tahun='$tahun' and idtypecode='$idtypecode'  ";
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
                    <hr/>
                    <table border="0" width="50%">
                                <tr><td colspan="9"><h1>Total Container  TPP Tripandu</h1></td></tr>
                               <tr>
                                    <td class="judultabel" width="10">No</td>
                                    <td class="judultabel" width="50">Ukuran Container</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun FROM bcf15 where idtpp='1' group by tahun order by tahun asc  ";
                                            $query   = mysql_query( $sql );
                                            while ($data1=mysql_fetch_array( $query ))
                                 {

                                 echo "<td class='judultabel'>$data1[tahun]</td>";

                                 }

                                 echo "<td class='judultabel'>Jumlah</td>"
                                     ?>


                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT idsize,idtpp FROM bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and (idsize='20' or idsize='40' or idsize='45') and idtpp='1' group by idsize order by idsize";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 {
                                   $idsize=$data1['idsize'];
                                   if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[idsize]</td>";  

                                   //query untuk menampilkan tahun berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct (tahun) as tahun,idtpp from bcf15 where idtpp='1' order by tahun asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['tahun'];

                                       //query untuk mencari jumlah bcf15 pertahun per tpp
                                       
                                       $query4="select count(*) as jumlahbcf, idsize,bcf15.tahun,idtpp from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and (idsize='20' or idsize='40' or idsize='45') and bcf15.tahun='$tahun' and idsize='$idsize' and idtpp='1' ";
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
                             <hr/>
                             <table border="0" width="50%">
                                <tr><td colspan="9"><h1>Total Container  TPP Transcon</h1></td></tr>
                                <tr>
                                    <td class="judultabel" width="10">No</td>
                                    <td class="judultabel" width="50">Ukuran Container</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun FROM bcf15 where idtpp='2' group by tahun order by tahun asc  ";
                                            $query   = mysql_query( $sql );
                                            while ($data1=mysql_fetch_array( $query ))
                                 {

                                 echo "<td class='judultabel'>$data1[tahun]</td>";

                                 }

                                 echo "<td class='judultabel'>Jumlah</td>"
                                     ?>


                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT idsize,idtpp FROM bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and (idsize='20' or idsize='40' or idsize='45') and idtpp='2' group by idsize order by idsize";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 {
                                   $idsize=$data1['idsize'];
                                   if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[idsize]</td>";  

                                   //query untuk menampilkan tahun berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct (tahun) as tahun,idtpp from bcf15 where idtpp='2' order by tahun asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['tahun'];

                                       //query untuk mencari jumlah bcf15 pertahun per tpp
                                       
                                       $query4="select count(*) as jumlahbcf, idsize,bcf15.tahun,idtpp from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and (idsize='20' or idsize='40' or idsize='45') and bcf15.tahun='$tahun' and idsize='$idsize' and idtpp='2' ";
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
                             <hr/>
                             <table border="0" width="50%">
                                <tr><td colspan="9"><h1>Total Container  TPP MSA</h1></td></tr>
                                <tr>
                                    <td class="judultabel" width="10">No</td>
                                    <td class="judultabel" width="50">Ukuran Container</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun FROM bcf15 where idtpp='3' group by tahun order by tahun asc  ";
                                            $query   = mysql_query( $sql );
                                            while ($data1=mysql_fetch_array( $query ))
                                 {

                                 echo "<td class='judultabel'>$data1[tahun]</td>";

                                 }

                                 echo "<td class='judultabel'>Jumlah</td>"
                                     ?>


                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT idsize,idtpp FROM bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and (idsize='20' or idsize='40' or idsize='45') and idtpp='3' group by idsize order by idsize";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 {
                                   $idsize=$data1['idsize'];
                                   if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[idsize]</td>";  

                                   //query untuk menampilkan tahun berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct (tahun) as tahun,idtpp from bcf15 where idtpp='3' order by tahun asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['tahun'];

                                       //query untuk mencari jumlah bcf15 pertahun per tpp
                                       
                                       $query4="select count(*) as jumlahbcf, idsize,bcf15.tahun,idtpp from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and (idsize='20' or idsize='40' or idsize='45') and bcf15.tahun='$tahun' and idsize='$idsize' and idtpp='3' ";
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
                             <hr/>
                             <table border="0" width="50%">
                                <tr><td colspan="9"><h1>Total Container  TPP Layanan Lancar Lintas Logistindo</h1></td></tr>
                                <tr>
                                    <td class="judultabel" width="10">No</td>
                                    <td class="judultabel" width="50">Ukuran Container</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun FROM bcf15 where idtpp='4' group by tahun order by tahun asc  ";
                                            $query   = mysql_query( $sql );
                                            while ($data1=mysql_fetch_array( $query ))
                                 {

                                 echo "<td class='judultabel'>$data1[tahun]</td>";

                                 }

                                 echo "<td class='judultabel'>Jumlah</td>"
                                     ?>


                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT idsize,idtpp FROM bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and (idsize='20' or idsize='40' or idsize='45') and idtpp='4' group by idsize order by idsize";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 {
                                   $idsize=$data1['idsize'];
                                   if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[idsize]</td>";  

                                   //query untuk menampilkan tahun berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct (tahun) as tahun,idtpp from bcf15 where idtpp='4' order by tahun asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['tahun'];

                                       //query untuk mencari jumlah bcf15 pertahun per tpp
                                       
                                       $query4="select count(*) as jumlahbcf, idsize,bcf15.tahun,idtpp from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and (idsize='20' or idsize='40' or idsize='45') and bcf15.tahun='$tahun' and idsize='$idsize' and idtpp='4' ";
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
       
                <div id="tabs-3" width="100%">
                                <table border="0" width="100%">
                                <tr><td colspan="9"><h1>Tabel Jumlah BCF 1.5 Telah Masuk TPP Per TPP</h1></td></tr>
                                <tr>
                                    <td class="judultabel">No</td>
                                    <td class="judultabel">Nama TPP</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun FROM bcf15 group by tahun order by tahun asc  ";
                                            $query   = mysql_query( $sql );
                                            while ($data1=mysql_fetch_array( $query ))
                                 {
                                   //menentukan tahun BCF 15                 
                                 echo "<td class='judultabel'>$data1[tahun]</td>";

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

                                   //query untuk menampilkan tahun berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct (tahun) as tahun from bcf15 order by tahun asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['tahun'];

                                       //query untuk mencari jumlah bcf15 pertahun per tpp

                                       $query4="select count(*) as jumlahbcf, idtpp,tahun from bcf15 where tahun='$tahun' and idtpp='$idtpp' and masuk='1'  ";
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
            <div id="tabs-4" >
                                <table border="0" width="100%">
                                <tr><td colspan="9"><h1>Total BCF 1.5 Batal Tarik</h1></td></tr>
                                <tr>
                                    <td class="judultabel">No</td>
                                    <td class="judultabel">Nama TPP</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun FROM bcf15 group by tahun order by tahun asc  ";
                                            $query   = mysql_query( $sql );
                                            while ($data1=mysql_fetch_array( $query ))
                                 {
                                   //menentukan tahun BCF 15                 
                                 echo "<td class='judultabel'>$data1[tahun]</td>";

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

                                   //query untuk menampilkan tahun berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct (tahun) as tahun from bcf15 order by tahun asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['tahun'];

                                       //query untuk mencari jumlah bcf15 pertahun per tpp

                                       $query4="select count(*) as jumlahbcf, idtpp,tahun from bcf15 where tahun='$tahun' and idtpp='$idtpp' and BatalTarik='1' and masuk='2'  ";
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
      </div>
      

</body>
</html>



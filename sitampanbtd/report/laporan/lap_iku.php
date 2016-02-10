<?php 
ob_start();
?>
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
                
                    <hr/>
                            <table border="0" width="100%">
                                <tr><td colspan="9"><h1>Total Pembatalan BCF 1.5 </h1></td></tr>
                                <tr>
                                    <td class="judultabel" width="10">No</td>
                                    <td class="judultabel" width="100">Bulan</td>
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

                                            $query1   = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%m') as bulan, DATE_FORMAT(bcf15tgl,'%M') as bulan1 FROM bcf15 group by bulan order by bulan asc";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 {
                                   $bulan=$data1['bulan'];
                                   if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[bulan1]</td>";  

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

                                       $query4="select count(*) as jumlahbcf,DATE_FORMAT(SetujuBatalDate,'%m') as bulan,tahun from bcf15 where DATE_FORMAT(SetujuBatalDate,'%Y')='$tahun' and DATE_FORMAT(SetujuBatalDate,'%m')='$bulan' and setujubatal='1'  ";
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
                          <table border="0" width="100%">
                                <tr><td colspan="9"><h1>Total Nota Dinas Konfirmasi </h1></td></tr>
                                <tr>
                                    <td class="judultabel" width="10">No</td>
                                    <td class="judultabel" width="100">Bulan</td>
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

                                            $query1   = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%m') as bulan, DATE_FORMAT(bcf15tgl,'%M') as bulan1 FROM bcf15 group by bulan order by bulan asc";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 {
                                   $bulan=$data1['bulan'];
                                   if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[bulan1]</td>";  

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

                                       $query4="select count(*) as jumlahbcf,DATE_FORMAT(ndkonfirmasidate,'%m') as bulan, DATE_FORMAT(ndkonfirmasidate,'%y') as tahun from bcf15 where DATE_FORMAT(ndkonfirmasidate,'%Y')='$tahun' and DATE_FORMAT(ndkonfirmasidate,'%m')='$bulan' and ndkonfirmasi='1'  ";
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
                            <table border="0" width="100%">
                                <tr><td colspan="9"><h1>Total Permohonan Pembatalan BCF 1.5 </h1></td></tr>
                                <tr>
                                    <td class="judultabel" width="10">No</td>
                                    <td class="judultabel" width="100">Bulan</td>
                                    <?php 

                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
                                            $sql = "SELECT count(bcf15no) as jumbcf, DATE_FORMAT(SuratBatalDate,'%y') as tahun FROM bcf15 group by tahun order by tahun asc  ";
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

                                            $query1   = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%m') as bulan, DATE_FORMAT(bcf15tgl,'%M') as bulan1 FROM bcf15 group by bulan order by bulan asc";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 {
                                   $bulan=$data1['bulan'];
                                   if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$data1[bulan1]</td>";  

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

                                       $query4="select count(*) as jumlahbcf,DATE_FORMAT(SuratBatalDate,'%m') as bulan,tahun from bcf15 where DATE_FORMAT(SuratBatalDate,'%Y')='$tahun' and DATE_FORMAT(SuratBatalDate,'%m')='$bulan' and Batal='1'  ";
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


<?php 
                                 ob_end_flush();
?>
<html>
    <head>
    <title>Eksport Data bcf 1.5 Per tps</title>
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
                 if ($.trim($("#tps").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> TPS Harus Di pilih salah satu");
                    $("#tps").focus();
                    return false;  
                 }
                 if ($.trim($("#cmbtarik").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Apakah sudah ditarik ? Pilih Ya atau Tidak !");
                    $("#cmbtarik").focus();
                    return false;  
                 }
                 
              });      
           });
        </script> 
        
    
    </head>
    <body>
        <div id="laporantpp">
            
                <ul>
                <li><a href="#tabs-1">Download</a></li>
                <li><a href="#tabs-2">Masih DI TPS</a></li>
                
                </ul>
                
                <div id="tabs-1">
        
	     
        <form id="form1" name="form1" method="get" action="report/laporan/exportprosestps.php">
        
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="6">
                <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>Eksport Data BCF 1.5 Per tps</b> </td></tr>
                
                <tr>
                    <td>Pilih tps</td>
                    <td width="20" coslpan="3">
                            <select name="tps" id="tps" class="required" type="text"  >
                                <option value = "" >:::..:::Pilih TPS:::..:::</option>
                                <?php
                                    $sql = "SELECT * FROM tps ORDER BY idtps";
                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                        while ($data =mysql_fetch_array($qry)) {
                                            if ($data[idtps]==$Datatps) {
                                                $cek="selected";
                                                }
                                           else {
                                                $cek="";
                                                }
                                                echo "<option value='$data[idtps]' $cek>$data[nm_tps]</option>";
                                            }
                                ?>
                            </select>
                       </td>
                </tr>
                <tr>
                    <td>
                        Sudah ditarik Ke TPP
                    </td>
                    <td>
                        <select class="required" name="cmbtarik" id="cmbtarik">
                            <option value="">:::...PILIH Salah Satu...:::</option>
                            <option value="1">Ya</option>
                            <option value="2">Tidak</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    
                    <td  align="left" width="20%">Masukkan Tanggal : </td> 
                    <td width="20" coslpan="3"><input name="txttgldari" id="tanggal" class="required" type="text" value="" ></input>
                    <td  align="left" width="20%">Sampai Tanggal : </td> 
                    <td width="20" coslpan="3"><input name="txttglsampai" id="tanggal1" class="required" type="text" value="" ></input>
                    
                        
                    </td> 
                </tr>
             
                
            <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
            <tr><td><input type="submit" class="buttonexcel" value="Download" name="search"/></td><td><input type="button" value="Cancel" onclick="self.history.back()" class="button putih bigrounded " /></td></tr>
            
            </table>
        </form>
     </div>
     <div id="tabs-2">
        <table border="0" width="100%">
                        <tr><td colspan="20"><h1>Tabel Jumlah BCF 1.5 Masih di TPS Per TPP</h1></td></tr>
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
                               
                               $query4="select count(*) as jumlahbcf, idtpp,tahun from bcf15 where tahun='$tahun' and idtpp='$idtpp' and masuk='2'  ";
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

</body>
</html>



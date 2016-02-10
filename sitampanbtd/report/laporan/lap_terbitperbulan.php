            <?php 
                include '../../lib/koneksi.php';
                include '../../lib/function.php';
                     $bulanget=$_GET['bulan'];
                     $tahunget=$_GET['tahun'];

                                            $query1   = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%m') as bulan, DATE_FORMAT(bcf15tgl,'%M') as bulan1 FROM bcf15 where tahun='$tahunget' and DATE_FORMAT(bcf15tgl,'%m')='$bulanget' group by bulan order by bulan asc";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 { 
                $bulan=$data1['bulan'];
                $bulan1=$data1['bulan1'];
                $tahundata=$data1['tahun'];
                ?>
                    <table border="0" width="100%">
                                <tr><td colspan="2"><h1> <?php echo $tahundata; ?>  </h1>
                                        <h2>Detail Penetapan BCF 1.5 Bulan <?php echo $bulan1; ?> </h2>
                                    </td></tr>
                                
                                <?php 
                                
                                 
                                   //query untuk menampilkan tahun berapa saja dalam tabel BCF 1.5
                                   $query3="select distinct (tahun) as tahun from bcf15 where tahun='2013' order by tahun asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['tahun'];

                                       //query untuk mencari jumlah bcf15 pertahun per bulan

                                       $queryterbit="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' ";
                                       $hasilterbit=mysql_query($queryterbit);
                                       $dataterbit=mysql_fetch_array($hasilterbit);
                                       
                                       $queryterbitfcl="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idtypecode='1' ";
                                       $hasilterbitfcl=mysql_query($queryterbitfcl);
                                       $dataterbitfcl=mysql_fetch_array($hasilterbitfcl);
                                       
                                       $queryterbitlcl="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idtypecode='2' ";
                                       $hasilterbitlcl=mysql_query($queryterbitlcl);
                                       $dataterbitlcl=mysql_fetch_array($hasilterbitlcl);
                                       
                                       $queryterbitpo="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idtypecode='3' ";
                                       $hasilterbitpo=mysql_query($queryterbitpo);
                                       $dataterbitpo=mysql_fetch_array($hasilterbitpo);
                                       
                                       $queryterbitss="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idtypecode='4' ";
                                       $hasilterbitss=mysql_query($queryterbitss);
                                       $dataterbitss=mysql_fetch_array($hasilterbitss);
                                       
                                       $queryterbitec="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idtypecode='5' ";
                                       $hasilterbitec=mysql_query($queryterbitec);
                                       $dataterbitec=mysql_fetch_array($hasilterbitec);
                                       
                                       $queryterbitit="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idtypecode='6' ";
                                       $hasilterbitit=mysql_query($queryterbitit);
                                       $dataterbitit=mysql_fetch_array($hasilterbitit);
                                       
                                       $queryterbitrf="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idtypecode='7' ";
                                       $hasilterbitrf=mysql_query($queryterbitrf);
                                       $dataterbitrf=mysql_fetch_array($hasilterbitrf);
                                       
                                       
                                       //penarikan bcf15
                                       
                                       
                                           
                                        echo "<tr><td colspan=2>Penetapan BCF 1.5</td></tr>";
                                        echo "<tr><td colspan=2>Total FCL : $dataterbitfcl[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total LCL : $dataterbitlcl[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total Part Of : $dataterbitpo[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total Short Ship : $dataterbitss[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total Reffer : $dataterbitrf[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total Empty : $dataterbitec[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total Iso Tank : $dataterbitit[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Jumlah Penetapan : $dataterbit[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2><hr></td></tr>";
                                        
                                        
                                        
                                        echo "<tr><td colspan=2>Penarikan BCF 1.5</td></tr>";
                                        echo "<tr><td colspan=2>Total FCL : $dataterbitfcl[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total LCL : $dataterbitlcl[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total Part Of : $dataterbitpo[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total Short Ship : $dataterbitss[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total Reffer : $dataterbitrf[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total Empty : $dataterbitec[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Total Iso Tank : $dataterbitit[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2>Jumlah Penetapan : $dataterbit[jumlahbcf] Dok</td></tr>";
                                        echo "<tr><td colspan=2><hr></td></tr>";
                                        
                                   }
                                   
                                   
                                  
                                 }
                                
                                 ?>


                            

                            </table>
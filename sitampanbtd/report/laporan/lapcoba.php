<?php 
                include '../../lib/koneksi.php';
                include '../../lib/function.php';
                $sql = "SELECT * FROM tpp  ";
                $query   = mysql_query( $sql );
                $data1=mysql_fetch_array( $query );
       
                
                ?>
                    <table border="0" width="100%">
                                <tr><td colspan="9"><h1>Laporan BCF 1.5</h1></td></tr>
                                <tr>
                                    <td class="judultabel" width="10">No</td>
                                    <td class="judultabel" width="100">Bulan</td>
                                    <td class="judultabel" width="100">BCF 1.5 Terbit</td>
                                    
                                    <td class="judultabel" width="100">Masuk TPP</td>
                                    <td class="judultabel" width="100">Tidak Masuk TPP</td>
                                    <td class="judultabel" width="100">Batal</td>
                                    <td class="judultabel" width="100">Saldo</td>

                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%m') as bulan, DATE_FORMAT(bcf15tgl,'%M') as bulan1 FROM bcf15 where tahun='2012' group by bulan order by bulan asc";
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
                                   $query3="select distinct (tahun) as tahun from bcf15 where tahun='2012' order by tahun asc";
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
                                       
                                       //query untuk mencari jumlah masuk pertahun per bulan
                                       $querymasuk="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and masuk='1' ";
                                       $hasilmasuk=mysql_query($querymasuk);
                                       $datamasuk=mysql_fetch_array($hasilmasuk);
                                       
                                       //query untuk mencari jumlah tidakmasuk pertahun per bulan
                                       $querytdkmasuk="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and masuk='2' ";
                                       $hasiltdkmasuk=mysql_query($querytdkmasuk);
                                       $datatdkmasuk=mysql_fetch_array($hasiltdkmasuk);
                                       
                                        //query untuk mencari jumlah batal pertahun per bulan
                                       $querybatal="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and setujubatal='1' ";
                                       $hasilbatal=mysql_query($querybatal);
                                       $databatal=mysql_fetch_array($hasilbatal);
                                       
                                        //query untuk mencari jumlah belum batal pertahun per bulan
                                       $querybbatal="select count(*) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and setujubatal='2' ";
                                       $hasilbbatal=mysql_query($querybbatal);
                                       $databbatal=mysql_fetch_array($hasilbbatal);

                                      
                                       //menampilkan jumlah mahasiswa pertpp dan pr tahun
                                       echo "<td class='isitabel'>$dataterbit[jumlahbcf]</td>";
                                       echo "<td class='isitabel'>$datamasuk[jumlahbcf]</td>";
                                       echo "<td class='isitabel'>$datatdkmasuk[jumlahbcf]</td>";
                                       echo "<td class='isitabel'>$databatal[jumlahbcf]</td>";
                                        echo "<td class='isitabel'>$databbatal[jumlahbcf]</td>";
                                   }
                                   
                                   
                                      

                                       $no++;//increment untuk no urut data

                                 }
                                
                                 ?>


                            

                            </table>
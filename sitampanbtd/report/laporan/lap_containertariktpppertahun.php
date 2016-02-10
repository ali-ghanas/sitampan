                    <?php 
                      include '../../lib/koneksi.php';
                      include '../../lib/function.php';
                        
                        $tahun=$_GET['tahun'];
                    ?>
                    <h4>Total Container Yang Ditarik Ke TPP (Masuk TPP) Tahun <?php echo $tahun; ?> </h4>
                    <h6>Catatan : *) Parameter Tanggal menggunakan tanggal penerbitan BCF 1.5</h6>
                    <table border="0" width="100%" class="data">
                                
                                <tr>
                                    <td class="judultabel" width="10" rowspan="2">No</td>
                                    <td class="judultabel" width="100" rowspan="2">Bulan *)</td>
                                    <td class="judultabel" width="100" rowspan="2">BCF 1.5 Masuk TPP</td>
                                    <td class="judultabel" width="100" colspan="5">Container</td>
                                    

                                </tr>
                                <tr>
                                        <td class="judultabel" width="100">20</td>
                                        <td class="judultabel" width="100">40</td>
                                        <td class="judultabel" width="100">45</td>
                                        <td class="judultabel" width="100">LCL</td>
                                        <td class="judultabel" width="100">TOTAL</td>
                                        
                                </tr>
                                <tr>
                                        <td class="judultabel" >1</td>
                                        <td class="judultabel" width="100">2</td>
                                        <td class="judultabel" width="100">3 </td>
                                        <td class="judultabel" width="100">4</td>
                                        <td class="judultabel" width="100">5</td>
                                        <td class="judultabel" width="100">6</td>
                                        <td class="judultabel" width="100">7</td>
                                        <td class="judultabel" width="100">8 (4+5+6)</td>
                                        
                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%m') as bulan, DATE_FORMAT(bcf15tgl,'%M') as bulan1 FROM bcf15 where tahun='$tahun' and masuk='1' group by bulan order by bulan asc";
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
                                   $query3="select distinct (tahun) as tahun from bcf15 where tahun='$tahun' order by tahun asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun1=$data3['tahun'];

                                       //query untuk mencari jumlah bcf15 pertahun per bulan

                                       $queryterbit="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15 where tahun='$tahun1'  and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and masuk='1'  ";
                                       $hasilterbit=mysql_query($queryterbit);
                                       $dataterbit=mysql_num_rows($hasilterbit);
                                       
                                       $queryterbit20="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and bcf15.tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idsize='20' and masuk='1'";
                                       $hasilterbit20=mysql_query($queryterbit20);
                                       $dataterbit20=mysql_num_rows($hasilterbit20);
                                       
                                       $queryterbit40="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and bcf15.tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idsize='40' and masuk='1'";
                                       $hasilterbit40=mysql_query($queryterbit40);
                                       $dataterbit40=mysql_num_rows($hasilterbit40);
                                       
                                       $queryterbit45="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and bcf15.tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idsize='45' and masuk='1'";
                                       $hasilterbit45=mysql_query($queryterbit45);
                                       $dataterbit45=mysql_num_rows($hasilterbit45);
                                       
                                       $queryterbittot="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and bcf15.tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and (idsize='45' or idsize='20' or idsize='40') and masuk='1' ";
                                       $hasilterbittot=mysql_query($queryterbittot);
                                       $dataterbittot=mysql_num_rows($hasilterbittot);
                                       
                                       $queryterbitLCL="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and bcf15.tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idsize='0' and masuk='1'";
                                       $hasilterbitLCL=mysql_query($queryterbitLCL);
                                       $dataterbitLCL=mysql_num_rows($hasilterbitLCL);
                                       
                                       
                                        

                                       //menampilkan jumlah mahasiswa pertpp dan pr tahun
                                       echo "<td class='isitabel' style='background-color:#75C9EA;'><a href='?hal=laporanmasukperbulan&bulan=$bulan&tahun=$tahun1' title='klik lihat detail' ><font color='#fff'><button>$dataterbit</button></font></a></td>";
                                      
                                       echo "<td class='isitabel' >$dataterbit20</td>";
                                       echo "<td class='isitabel'>$dataterbit40</td>";
                                       echo "<td class='isitabel'>$dataterbit45</td>";
                                       echo "<td class='isitabel'>$dataterbitLCL</td>";
                                       echo "<td class='isitabel' style='background-color: #F3F3F3;'>$dataterbittot</td>";
                                       
                                   }
                                   
                                   
                                      

                                       $no++;//increment untuk no urut data

                                 }
                                
                                 ?>


                            

                            </table>
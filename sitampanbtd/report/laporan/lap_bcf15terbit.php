<?php 
                include '../../lib/koneksi.php';
                include '../../lib/function.php';
                $sql = "SELECT * FROM tpp  ";
                $query   = mysql_query( $sql );
                $data1=mysql_fetch_array( $query );
       
                
                ?>
                    <form method="post" id="addbcf15" name="addbcf15" action="?hal=lap_bcfterbit">
                    <table >

                        <tr>
                          <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>></td>
                          <td><input type="text"  class="required" placeholder="input tahun disini" name="tahun" value="<?php echo $_POST['tahun']?>"> </td>


                            <td><input class="button putih bigrounded " type="submit" name="addsubmit" value="Ok"    /></td>
                            
                        </tr>

                    </table>
                        <span>Centang dan Masukkan Parameter Tahun</span>
                    </form>
                    <?php 
                                         
                                     if (isset($_POST['Tahun']))
                                        {
                                           $tahun = $_POST['tahun'];
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "Tahun LIKE '%$tahun%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND Tahun LIKE '%$tahun%'";
                                           }
                                        }
                                 else {
                                     $tahun = date('Y');
                                     if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "Tahun LIKE '%$tahun%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND Tahun LIKE '%$tahun%'";
                                           }
                                 }
                                            
                                         
                                     ?>
                    <h3>Laporan BCF 1.5 Tahun <?php echo $tahun ?></h3>
                    
                    <h4>1. Total Dokumen BCF 1.5</h4>
                    <h6>Catatan : *) Parameter Tanggal menggunakan tanggal penerbitan BCF 1.5</h6>
                    
                    <table border="0" width="100%" class="data">
                                
                                <tr>
                                    <td class="judultabel" width="10" rowspan="2">No</td>
                                    <td class="judultabel" width="100" rowspan="2">Bulan *)</td>
                                    <td class="judultabel" width="100" rowspan="2">BCF 1.5 Terbit</td>
                                    
                                    <td class="judultabel" width="100" rowspan="2">Masuk TPP</td>
                                    <td class="judultabel" width="100" rowspan="2">Tidak Masuk TPP</td>
                                    <td class="judultabel" width="100" colspan="3">Pembatalan BF 1.5</td>
                                    <td class="judultabel" width="100" colspan="3">Saldo</td>

                                </tr>
                                <tr>
                                        <td class="judultabel" width="100">TPP</td>
                                        <td class="judultabel" width="100">TPS</td>
                                        <td class="judultabel" width="100">TOTAL</td>
                                        <td class="judultabel" width="100">TPP</td>
                                        <td class="judultabel" width="100">TPS</td>
                                        <td class="judultabel" width="100">TOTAL</td>
                                </tr>
                                <tr>
                                        <td class="judultabel" >1</td>
                                        <td class="judultabel" width="100">2</td>
                                        <td class="judultabel" width="100">3 <br/> (4+5)<br/> atau (8+11)</td>
                                        <td class="judultabel" width="100">4</td>
                                        <td class="judultabel" width="100">5</td>
                                        <td class="judultabel" width="100">6</td>
                                        <td class="judultabel" width="100">7</td>
                                        <td class="judultabel" width="100">8 (6+7)</td>
                                        <td class="judultabel" width="100">9</td>
                                        <td class="judultabel" width="100">10</td>
                                        <td class="judultabel" width="100">11 (9+10)</td>
                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%m') as bulan, DATE_FORMAT(bcf15tgl,'%M') as bulan1 FROM bcf15 where tahun='$tahun' group by bulan order by bulan asc";
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

                                       $queryterbit="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' ";
                                       $hasilterbit=mysql_query($queryterbit);
                                       $dataterbit=mysql_num_rows($hasilterbit);
                                       
                                       //query untuk mencari jumlah masuk pertahun per bulan
                                       $querymasuk="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and masuk='1' ";
                                       $hasilmasuk=mysql_query($querymasuk);
                                       $datamasuk=mysql_num_rows($hasilmasuk);
                                       
                                       //query untuk mencari jumlah tidakmasuk pertahun per bulan
                                       $querytdkmasuk="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and masuk='2' ";
                                       $hasiltdkmasuk=mysql_query($querytdkmasuk);
                                       $datatdkmasuk=mysql_num_rows($hasiltdkmasuk);
                                       
                                        //query untuk mencari jumlah batal pertahun per bulan
                                       $querybatal="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and setujubatal='1' and masuk='1'";
                                       $hasilbatal=mysql_query($querybatal);
                                       $databatalmasuk=mysql_num_rows($hasilbatal);
                                       
                                       //query untuk mencari jumlah batal pertahun per bulan
                                       $querybatal="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and setujubatal='1' and masuk='2'";
                                       $hasilbatal=mysql_query($querybatal);
                                       $databbataltdkmsk=mysql_num_rows($hasilbatal);
                                       
                                       //query untuk mencari jumlah batal pertahun per bulan
                                       $querybatal="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and setujubatal='1'";
                                       $hasilbatal=mysql_query($querybatal);
                                       $databbatal=mysql_num_rows($hasilbatal);
                                       
                                        //query untuk mencari jumlah belum batal pertahun per bulan
                                       $querybbatal="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and setujubatal='2' and masuk='1' ";
                                       $hasilbbatal=mysql_query($querybbatal);
                                       $datasaldotpp=mysql_num_rows($hasilbbatal);
                                       
                                       //query untuk mencari jumlah belum batal pertahun per bulan
                                       $querybbatal="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and setujubatal='2' and masuk='2'  ";
                                       $hasilbbatal=mysql_query($querybbatal);
                                       $datasaldotps=mysql_num_rows($hasilbbatal);

                                      //query untuk mencari jumlah belum batal pertahun per bulan
                                       $querybbatal="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and setujubatal='2'   ";
                                       $hasilbbatal=mysql_query($querybbatal);
                                       $datasaldo=mysql_num_rows($hasilbbatal);

                                       //menampilkan jumlah mahasiswa pertpp dan pr tahun
                                       echo "<td class='isitabel' style='background-color:#75C9EA;'><a href='?hal=laporanterbitperbulan&bulan=$bulan&tahun=$tahun1' title='klik lihat detail'><font color='#fff'><button>$dataterbit</button></font></a></td>";
                                       echo "<td class='isitabel' style='background-color:#75C9EA;'><a href='?hal=laporanmasukperbulan&bulan=$bulan&tahun=$tahun1' title='klik lihat detail' ><font color='#fff'><button>$datamasuk</button></font></a></td>";
                                       echo "<td class='isitabel' style='background-color:#75C9EA;'><a href='?hal=laporantdkmasukperbulan&bulan=$bulan&tahun=$tahun1' title='klik lihat detail'><font color='#fff'><button>$datatdkmasuk</button></font></a></td>";
                                       echo "<td class='isitabel' >$databatalmasuk</td>";
                                       echo "<td class='isitabel'>$databbataltdkmsk</td>";
                                       
                                       echo "<td class='isitabel' style='background-color: #F3F3F3;'>$databbatal</td>";
                                       echo "<td class='isitabel'>$datasaldotpp</td>";
                                       echo "<td class='isitabel'>$datasaldotps</td>";
                                       echo "<td class='isitabel' style='background-color: #F3F3F3;'>$datasaldo</td>";
                                   }
                                   
                                   
                                      

                                       $no++;//increment untuk no urut data

                                 }
                                
                                 ?>


                            

                            </table>
                    <br/>
                    <h4>2. Total Container Yang Di BCF 1.5</h4>
                    <h6>Catatan : *) Parameter Tanggal menggunakan tanggal penerbitan BCF 1.5</h6>
                    <table border="0" width="100%" class="data">
                                
                                <tr>
                                    <td class="judultabel" width="10" rowspan="2">No</td>
                                    <td class="judultabel" width="100" rowspan="2">Bulan *)</td>
                                    <td class="judultabel" width="100" rowspan="2">BCF 1.5 Terbit</td>
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

                                            $query1   = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%m') as bulan, DATE_FORMAT(bcf15tgl,'%M') as bulan1 FROM bcf15 where tahun='$tahun' group by bulan order by bulan asc";
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

                                       $queryterbit="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15 where tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' ";
                                       $hasilterbit=mysql_query($queryterbit);
                                       $dataterbit=mysql_num_rows($hasilterbit);
                                       
                                       $queryterbit20="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and bcf15.tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idsize='20'";
                                       $hasilterbit20=mysql_query($queryterbit20);
                                       $dataterbit20=mysql_num_rows($hasilterbit20);
                                       
                                       $queryterbit40="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and bcf15.tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idsize='40'";
                                       $hasilterbit40=mysql_query($queryterbit40);
                                       $dataterbit40=mysql_num_rows($hasilterbit40);
                                       
                                       $queryterbit45="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and bcf15.tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idsize='45'";
                                       $hasilterbit45=mysql_query($queryterbit45);
                                       $dataterbit45=mysql_num_rows($hasilterbit45);
                                       
                                       $queryterbittot="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and bcf15.tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and (idsize='45' or idsize='20' or idsize='40') ";
                                       $hasilterbittot=mysql_query($queryterbittot);
                                       $dataterbittot=mysql_num_rows($hasilterbittot);
                                       
                                       $queryterbitLCL="select DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,bcf15.tahun from bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and bcf15.tahun='$tahun1' and DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and idsize='0'";
                                       $hasilterbitLCL=mysql_query($queryterbitLCL);
                                       $dataterbitLCL=mysql_num_rows($hasilterbitLCL);
                                       
                                       
                                        

                                       //menampilkan jumlah mahasiswa pertpp dan pr tahun
                                       echo "<td class='isitabel' style='background-color:#75C9EA;'><a href='?hal=laporanterbitperbulan&bulan=$bulan&tahun=$tahun1' title='klik lihat detail'><font color='#fff'><button>$dataterbit</button></font></a></td>";
                                      
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
                    <p style="color:#4AA415"> Untuk melihat jumlah kontainer yang masuk TPP untuk tahun  <a  href="?hal=lap_contmasuktpp&tahun=<?php echo "$tahun1"; ?>" target=_blank><?php echo "$tahun1"; ?></a> klik <a  href="?hal=lap_contmasuktpp&tahun=<?php echo "$tahun1"; ?>" target=_blank>disini </a></p>
                    <h4>3. Top 10 Importir </h4>
                    <h6>Merupakan daftar 10 besar importir yang sering terkena penetapan sebagai Barang Yang Dinyatakan Tidak Dikuasai (BTD/BCF 1.5)</h6>
                    <table border="0" width="100%" class="data">
                        
                        <tr>
                            <td class='judultabel'>No</td>
                            <td class='judultabel'>Nama Importir</td>
                            <td class='judultabel'>Tahun <?php echo $tahun ?></td>
                        </tr>
                        <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT count(consignee) as jumlah, consignee FROM bcf15 where tahun='$tahun'  group by consignee order by jumlah desc limit 10";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 {
                                   $consignee=$data1['consignee'];
                                   if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                                   
                                   echo "<td class='isitabel'>$no</td><td class='isitabel'>$consignee</td>";  

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

                                       $queryterbit="select consignee from bcf15 where tahun='$tahun1' and (consignee='$consignee') and pecahpos='2'  ";
                                       $hasilterbit=mysql_query($queryterbit);
                                       $dataterbit=mysql_num_rows($hasilterbit);
                                       
                                       

                                       //menampilkan jumlah mahasiswa pertpp dan pr tahun
                                      
                                       echo "<td class='isitabel'>$dataterbit</td>";
                                       
                                   }
                                   
                                   
                                      

                                       $no++;//increment untuk no urut data

                                 }
                                
                                 ?>
                        
                        
                    </table>
                    <h4>4. Total Permohonan Pembatalan BCF 1.5 </h4>
                    <h6>Catatan : *) Parameter tanggal menggunakan tanggal Agenda Permohonan yang Masuk Ke Loket</h6>
                    <table border="0" width="100%" class="data">
                                
                                <tr>
                                    <td class="judultabel" width="10" rowspan="2">No</td>
                                    <td class="judultabel" width="100" rowspan="2">Bulan *)</td>
                                    <td class="judultabel" width="100" colspan="3">Permohonan Pembatalan BCF 1.5</td>
                                   
                                    

                                </tr>
                                <tr>
                                    
                                    <td class="judultabel" width="100" >Total</td>
                                    <td class="judultabel" width="100" >Dalam Proses</td>
                                    <td class="judultabel" width="100" >Setuju Pembatalan</td>
                                    
                                    

                                </tr>
                                
                                <tr>
                                        <td class="judultabel" >1</td>
                                        <td class="judultabel" width="100">2</td>
                                        <td class="judultabel" width="100">3 </td>
                                        <td class="judultabel" width="100">4</td>
                                        <td class="judultabel" width="100">5 </td>
                                        
                                        
                                </tr>
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(bcf15tgl,'%m') as bulan, DATE_FORMAT(bcf15tgl,'%M') as bulan1 FROM bcf15 where tahun='$tahun' group by bulan order by bulan asc";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 {
                                   $bulan=$data1['bulan'];
                                   if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top' align='center'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top' align='center'>";
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

                                       $queryagenda="select DATE_FORMAT(tglagenda,'%m') as bulan, DATE_FORMAT(tglagenda,'%Y') as tahun from bcf15,suratmasukpembatalanbcf15 where bcf15.idbcf15=suratmasukpembatalanbcf15.noidbcf15 and DATE_FORMAT(tglagenda,'%Y')='$tahun1' and DATE_FORMAT(tglagenda,'%m')='$bulan'  ";
                                       $hasilagenda=mysql_query($queryagenda);
                                       $dataagenda=mysql_num_rows($hasilagenda);
                                       
                                       $queryagendaproses="select DATE_FORMAT(tglagenda,'%m') as bulan, bcf15.tahun from bcf15,suratmasukpembatalanbcf15 where bcf15.idbcf15=suratmasukpembatalanbcf15.noidbcf15 and DATE_FORMAT(tglagenda,'%Y')='$tahun1' and DATE_FORMAT(tglagenda,'%m')='$bulan' and setujubatal='2'  ";
                                       $hasilagendaproses=mysql_query($queryagendaproses);
                                       $dataagendaproses=mysql_num_rows($hasilagendaproses);
                                       
                                       $queryagendabatal="select DATE_FORMAT(tglagenda,'%m') as bulan, bcf15.tahun from bcf15,suratmasukpembatalanbcf15 where bcf15.idbcf15=suratmasukpembatalanbcf15.noidbcf15 and DATE_FORMAT(tglagenda,'%Y')='$tahun1' and DATE_FORMAT(tglagenda,'%m')='$bulan' and setujubatal='1'  ";
                                       $hasilagendabatal=mysql_query($queryagendabatal);
                                       $dataagendabatal=mysql_num_rows($hasilagendabatal);
                                      
                                       
                                       
                                        

                                       //menampilkan jumlah mahasiswa pertpp dan pr tahun
                                       echo "<td class='isitabel' style='background-color:#75C9EA;'><font color='#000'>$dataagenda</font></td>";
                                      
                                       echo "<td class='isitabel' >$dataagendaproses</td>";
                                       echo "<td class='isitabel'>$dataagendabatal</td>";
                                       
                                       
                                   }
                                   
                                   
                                      

                                       $no++;//increment untuk no urut data

                                 }
                                
                                 ?>


                            

                            </table>
                    <h4>5. Total Pembatalan BCF 1.5 </h4>
                    <h6>Catatan : *) Parameter tanggal surat persetujuan pembatalan BCF 1.5</h6>
                    <table border="0" width="100%" class="data">
                                
                                <tr>
                                    <td class="judultabel" width="10" >No</td>
                                    <td class="judultabel" width="100" >Bulan *)</td>
                                    <td class="judultabel" width="100" >Pembatalan BCF 1.5 (TPP)</td>
                                    <td class="judultabel" width="100" >Pembatalan BCF 1.5 (TPS)</td>
                                    <td class="judultabel" width="100" >Total</td>
                                    

                                </tr>
                                
                                
                                
                                <?php 
                                
                                       $no=1;    

                                            $query1   = "SELECT count(bcf15no) as jumbcf, tahun,DATE_FORMAT(SetujuBatalDate,'%m') as bulan, DATE_FORMAT(SetujuBatalDate,'%M') as bulan1 FROM bcf15 where DATE_FORMAT(SetujuBatalDate,'%Y')='$tahun' group by bulan order by bulan asc";
                                            $hasil1= mysql_query($query1);
                                            while ($data1=mysql_fetch_array( $hasil1 ))
                                                
                                                
                                 {
                                   $bulan=$data1['bulan'];
                                   if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top' align='center'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top' align='center'>";
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
                                       $queryagendatpp="select DATE_FORMAT(SetujuBatalDate,'%m') as bulan, DATE_FORMAT(SetujuBatalDate,'%Y') as tahun from bcf15 where  DATE_FORMAT(SetujuBatalDate,'%Y')='$tahun1' and DATE_FORMAT(SetujuBatalDate,'%m')='$bulan' and masuk='1' ";
                                       $hasilagendatpp=mysql_query($queryagendatpp);
                                       $dataagendatpp=mysql_num_rows($hasilagendatpp);
                                       
                                       $queryagendatps="select DATE_FORMAT(SetujuBatalDate,'%m') as bulan, DATE_FORMAT(SetujuBatalDate,'%Y') as tahun from bcf15 where  DATE_FORMAT(SetujuBatalDate,'%Y')='$tahun1' and DATE_FORMAT(SetujuBatalDate,'%m')='$bulan' and masuk='2'  ";
                                       $hasilagendatps=mysql_query($queryagendatps);
                                       $dataagendatps=mysql_num_rows($hasilagendatps);
                                       
                                       $queryagendatot="select DATE_FORMAT(SetujuBatalDate,'%m') as bulan, DATE_FORMAT(SetujuBatalDate,'%Y') as tahun from bcf15 where  DATE_FORMAT(SetujuBatalDate,'%Y')='$tahun1' and DATE_FORMAT(SetujuBatalDate,'%m')='$bulan'   ";
                                       $hasilagendatot=mysql_query($queryagendatot);
                                       $dataagendatot=mysql_num_rows($hasilagendatot);

                                       //menampilkan jumlah mahasiswa pertpp dan pr tahun
                                       echo "<td class='isitabel' style='background-color:#75C9EA;'><font color='#000'>$dataagendatpp</font></td>";
                                      
                                      
                                       echo "<td class='isitabel'>$dataagendatps</td>";
                                       echo "<td class='isitabel'>$dataagendatot</td>";
                                       
                                       
                                   }
                                   
                                   
                                      

                                       $no++;//increment untuk no urut data

                                 }
                                
                                 ?>


                            

                            </table>
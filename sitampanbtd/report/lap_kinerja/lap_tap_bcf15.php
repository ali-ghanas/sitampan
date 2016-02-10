
                    <form method="post" id="addbcf15" name="addbcf15" action="?hal=lap_data&pilih=lap_tap">
                    <table >

                        <tr>
                          <td><input type="checkbox" name="Tahun" value="1"  <?php  if($_POST['Tahun'] == 1){echo 'checked="checked"';}?>>Laporan Pertahun</td>
                          <td><input type="text"  class="required" name="tahun" value="<?php echo $_POST['tahun']?>"></td>


                            <td><input class="button putih bigrounded " type="submit" name="addsubmit" value="Ok"    /></td>
                        </tr>

                    </table>
                    </form>
                    <table border="0" width="100%">
                                <tr><td colspan="9"><h1>Total BCF 1.5 Yang Terbit</h1></td></tr>
                                <tr>
                                    <td class="judultabel" width="10">No</td>
                                    <td class="judultabel" width="50">Bulan</td>
                                    <?php 
                                                  
                                            include '../../lib/koneksi.php';
                                            include '../../lib/function.php';
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
                                            
                                            $sql = "SELECT count(bcf15no) as jumbcf, tahun FROM bcf15 where ".$bagianWhere." group by tahun order by tahun asc  ";
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
                                   $query3="select distinct (tahun) as tahun from bcf15 where ".$bagianWhere."   order by tahun asc";
                                   $hasil3=mysql_query($query3);

                                   //nilai awal untuk menjumlahkan bcf15 pertahun
                                   $jumlahpertahun=0;

                                   //looping kedua untuk menapilkan jumlah bcf15 pertahun
                                   while ($data3=  mysql_fetch_array($hasil3))
                                   {
                                       $tahun=$data3['tahun'];

                                       //query untuk mencari jumlah bcf15 pertahun per tpp

                                       $query4="select count(bcf15no) as jumlahbcf,DATE_FORMAT(bcf15tgl,'%m') as bulan, idtypecode,tahun from bcf15 where  DATE_FORMAT(bcf15tgl,'%m')='$bulan' and pecahpos='2' and ".$bagianWhere."   ";
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
                            
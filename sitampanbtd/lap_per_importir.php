<html>
    <head>
    <title>Eksport Data bcf 1.5 Per Importir</title>
     </head>
    <body>
        <div id="laporan">
         <div id="tabs-2">
                        
        <table border="0" width="100%" class="table">
                        <tr><td colspan="20"><h2>20 Besar Importir Yang Sering Terkena BCF 1.5</h2></td></tr>
                        <tr>
                            <td >No</td>
                            <td >Nama Importir</td>
                            <?php 
                            
                                    include 'lib/koneksi.php';
                                    include 'lib/function.php';
                                    $sql = "SELECT tahun FROM bcf15 group by tahun order by tahun asc  ";
                                    $query   = mysql_query( $sql );
                                    while ($data1=mysql_fetch_assoc( $query ))
                         {
                           //menentukan tahun BCF 15                 
                         echo "<td class='judultabel'>$data1[tahun]</td>";
                             
                         }
                         
                         echo "<td class='judultabel'>Jumlah</td>"
                             ?>
                            
                            
                        </tr>
                        <?php 
                               $no=1;    
                                    
                                    $query1   = "SELECT count(consignee) as jumlah, consignee,notify FROM bcf15  group by consignee order by jumlah desc limit 20";
                                    $hasil1= mysql_query($query1);
                                    while ($data2=mysql_fetch_row( $hasil1 ))
                         {
                           $consignee=$data2[1];//consignee
                           if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                                            echo "<tr class=tabs1 valign='top'>";
                                                            $j++;
                                                            }
                                            else
                                                            {
                                                            echo "<tr class=tabs2 valign='top'>";
                                                            $j--;
                                                            }
                           if ($data2[1]=='to order'){$consigneenya=$data2[2];} 
                           elseif($data2[1]=='To The Order'){$consigneenya=$data2[2];}
                           else{$consigneenya=$data2[1];}
                          
                           echo "<td class='isitabel'>$no</td><td class='isitabel'>$consigneenya</td>"; 
                           
                           
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
                               
                               $query4="select count(idbcf15) as jumlahbcf from bcf15 where tahun='$tahun' and consignee='$consignee'   ";
                               $hasil4=mysql_query($query4);
                               $data4=mysql_fetch_row($hasil4);
                               
                               //menghitung total bcf15 perjurusan (gunakan increment)
                               $jumlahpertahun += $data4['0'];
                               
                               //menampilkan jumlah mahasiswa pertpp dan pr tahun
                               echo "<td class='isitabel'>$data4[0]</td>";
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



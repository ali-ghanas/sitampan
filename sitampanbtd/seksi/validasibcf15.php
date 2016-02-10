<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
else
{
?>
              <html>
            <head>
              <title></title>
              <script type="text/javascript">
              function pilihan()
              {
                 // membaca jumlah komponen dalam form bernama 'myform'
                 var jumKomponen = document.myform.length;

                 // jika checkbox 'Pilih Semua' dipilih   
                 if (document.myform[0].checked == true)
                 {
                    // semua checkbox pada data akan terpilih
                    for (i=1; i<=jumKomponen; i++)
                    {
                        if (document.myform[i].type == "checkbox") 
                            document.myform[i].checked = true;
                    }
                 }
                 // jika checkbox 'Pilih Semua' tidak dipilih
                 else if (document.myform[0].checked == false)
                    {
                        // semua checkbox pada data tidak dipilih
                        for (i=1; i<=jumKomponen; i++)
                        {
                           if (document.myform[i].type == "checkbox") 
                                   document.myform[i].checked = false;
                        } 
                    }
              }
              </script>
             
            </head>
            <body>
            
           
            <?php
            // koneksi mysql
          

            // bagian script untuk mengedit data 
            if ($_GET['action'] == "edit")
            {
               // membaca nilai n dari hidden value
               $n = $_POST['n'];
               $recordstatus = $_POST['recordstatus'];
               $validasibcf15baru = $_POST['validasibcf15baru'];
              
               for ($i=0; $i<=$n-1; $i++)
               {
                 if (isset($_POST['idbcf15'.$i]))
                 {
                   $idbcf15 = $_POST['idbcf15'.$i]; 
                   $bcf15no = $_POST['bcf15no'.$i]; 
                   $tahun = $_POST['tahun'.$i]; 
                   
                   
                   $tglkini=date('Y-m-d');
                   $txttgl=$_POST['txttgl'];
                   $kdtp2=$_POST['kdtp2'];
                   $seksi=$_POST['seksi'];
                   $perintah='1';
                   $query = ("UPDATE bcf15 SET recordstatus='$recordstatus',validasibcf15baru='$validasibcf15baru', tglvalidasibcf15='$tglkini' WHERE idbcf15 = '$idbcf15'");
                   mysql_query($query);
                   mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user)VALUES('Validasi BCF 1.5','$tglkini','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
                 }
               }
            }

            // query SQL untuk menampilkan semua data mahasiswa
            $query = "SELECT * FROM bcf15,tpp,typecode,seksi where bcf15.idtypecode=typecode.idtypecode and bcf15.idseksi=seksi.idseksi and bcf15.idtpp=tpp.idtpp and perintah='2' and recordstatus='1'";
            $hasil = mysql_query($query);

            // membuat form penghapusan data
            echo "<form name='myform' id='myform' method='post' action='?hal=pagevalidasi&pilih=newbcf15&action=edit'>";
            
            echo "<table id=groupmodul1 border='0' >";
            echo "<tr><th class='judultabel'><input type='checkbox' name='pilih' onclick='pilihan()' /> Pilih semua </th>
            <th class='judultabel'>No BCF15</th>
            <th class='judultabel'>Tanggal</th>
            <th class='judultabel'>TPP</th>
            <th class='judultabel'>TPS</th>
            <th class='judultabel'>BC1.1</th>
            <th class='judultabel'>BL</th>
            <th class='judultabel'>Sarkut</th>
            <th class='judultabel'>Consignee</th>
            <th class='judultabel'>Notify</th>
            <th class='judultabel'>Uraian Barang</th>
            <th class='judultabel'>Type Cont</th>
            <th class='judultabel' >Container</th>
            <th class='judultabel'>Seksi</th>
            </tr>";

            $i = 0;
            while($data = mysql_fetch_array($hasil)){
             
                if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
			echo "<tr class=highlight1 valign='top'>";
			$j++;
			}
	else
			{
			echo "<tr class=highlight2 valign='top'>";
			$j--;
			}
             echo "<td class='isitabel'><input type='checkbox' id='check' name='idbcf15$i' value='$data[idbcf15]' /><input type='hidden'  name='bcf15no$i' value='$data[bcf15no]' /><input type='hidden'  name='tahun$i' value='$data[tahun]' /></td>";
             
             echo "<td class='isitabel'>$data[bcf15no]</td>";
             echo "<td class='isitabel'>$data[bcf15tgl]</td>";
                echo "<td class='isitabel'>$data[nm_tpp]</td>";
                echo "<td class='isitabel'>$data[idtps]</td>";
                echo "<td class='isitabel'>$data[bc11no] Pos $data[bc11pos] $data[bc11subpos]<br/> tanggal :<br/ >$data[bc11tgl]</td>";
                echo "<td class='isitabel'>$data[blno] <br/> tanggal :<br/ >$data[bltgl]</td>";
                echo "<td class='isitabel'>$data[saranapengangkut] <br/> Voy :<br/ >$data[voy]</td>";
                echo "<td class='isitabel'>$data[consignee]</td>";
                echo "<td class='isitabel'>$data[notify]</td>";
                echo "<td class='isitabel'>$data[amountbrg] $data[satuanbrg] $data[diskripsibrg]</td>";
                echo "<td class='isitabel'>";
                        if($data[idtypecode]=='1'){
                            echo "<font >FCL</font>";
                        }
                        elseif($data[idtypecode]=='2'){
                            echo "<font color='blue'>LCL</font>";
                        }
                        elseif($data[idtypecode]=='3'){
                            echo "<font color='red'>Part Off</font>";
                        }
                        elseif($data[idtypecode]=='4'){
                            echo "<font color='red'>Short Ship</font>";
                        }
                        elseif($data[idtypecode]=='5'){
                            echo "<font color='red'>Empty Cont</font>";
                        }
                        elseif($data[idtypecode]=='6'){
                            echo "<font color='red'>Iso Tank</font>";
                        }
              echo "</td>";
                                  
              echo "<td class='isitabel' >";
             
              $rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$data[idbcf15] and idsize='20'") ; $data2 = mysql_fetch_array($rowset);  
              $rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$data[idbcf15] and idsize='40'") ; $data3 = mysql_fetch_array($rowset1);                 
              $rowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$data[idbcf15] and idsize='45'") ; $data4 = mysql_fetch_array($rowset2); 
                           
                                             $jumlah2 = $data2[nocontainer];
                                             $jumlah4 = $data3[nocontainer];
                                             $jumlah45 = $data4[nocontainer];
                                             if($jumlah2>0) { echo "($jumlah2 x20') ";} else {echo '';}
                                             if($jumlah4>0) { echo "($jumlah4 x40')";} else  {echo '';} 
                                             if($jumlah45>0) { echo "($jumlah45 x45')";} else  {echo '';} 
                         
                                 
              echo  "</td>";
              echo "<td class='isitabel'><font color=blue>$data[nm_seksi]</font></td>";
              
                                 
             echo "</tr>"   ;
             
             $i++;
            }
            echo "</table>";
            echo "<input type='hidden' name='n' value='$i' /><br/>";
           
            echo "<input class='required' type='hidden' id='recordstatus' name='recordstatus' value='2' />";
            echo "<input class='required' type='hidden' id='validasibcf15baru' name='validasibcf15baru' value='1' />";
             ?>
            
           </form>
            
           
            </body>
            </html>


<?php
};
?>


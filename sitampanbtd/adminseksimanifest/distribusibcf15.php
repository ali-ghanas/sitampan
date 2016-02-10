<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}
elseif($_SESSION['level']=="manifest") {
 
      header('location:index.php');
      echo 'Admin : Anda tak punya otoritas ini';
 }
else
{
?>
              <html>
            <head>
              <title>Surat Pengantar</title>
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
              <script type="text/javascript">
           $(document).ready(function() {    
              $("#myform").submit(function() {
                 
                 if ($.trim($("#cmbtpp").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih dulu dong tpp sebelum di simpan");
                    $("#cmbtpp").focus();
                    return false;  
                 }
                     });      
           });
        </script> 
            </head>
            <body>
            <br/><a href="?hal=pagebcf15&pilih=editdisbcf15">Edit Nama TPP(distribusi BCF 1.5)</a>
           
            <?php
            // koneksi mysql
          

            // bagian script untuk menghapus data 
            if ($_GET['action'] == "del")
            {
               // membaca nilai n dari hidden value
               $n = $_POST['n'];
               $cmbtpp = $_POST['cmbtpp'];
              
               for ($i=0; $i<=$n-1; $i++)
               {
                 if (isset($_POST['idbcf15'.$i]))
                 {
                   $idbcf15 = $_POST['idbcf15'.$i]; 
                   $cmbtpp = $_POST['cmbtpp'];
                   
                   $tglkini=date('Y-m-d');
                   $query = ("UPDATE bcf15 SET idtpp='$cmbtpp' WHERE idbcf15 = '$idbcf15'");
                   
                   
                   mysql_query($query);
                   mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,bcf15no,tahun,nama_user,nip_user)VALUES('distribusi bcf','$now','$txtnobcf15','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
                   
                   
                 }
               }
            }

            // query SQL untuk menampilkan semua data mahasiswa
            $query = "SELECT * FROM bcf15,typecode,seksi where bcf15.idtypecode=typecode.idtypecode and bcf15.idseksi=seksi.idseksi and recordstatus='1' and idtpp='0' order by bcf15no, idtps,consignee desc";
            $hasil = mysql_query($query);

            // membuat form penghapusan data
            echo "<form name='myform' id='myform' method='post' action='?hal=pagebcf15&pilih=disbcf15&action=del'>";
            
            echo "<table id=tablemodul border='0'>";
            echo "<tr><th class='judultabel'><input type='checkbox' name='pilih' onclick='pilihan()' /> Pilih semua </th>
           <th class='judultabel'>No BCF15</th>
            <th class='judultabel'>Tanggal</th>
            <th class='judultabel'>TPS</th>
            <th class='judultabel'>BC1.1</th>
            <th class='judultabel'>BL</th>
            <th class='judultabel'>Sarkut</th>
            <th class='judultabel'>Consignee</th>
            <th class='judultabel'>Notify</th>
            <th class='judultabel'>Uraian Barang</th>
            <th class='judultabel'>Type Cont</th>
            <th class='judultabel' width='200'>Container</th>
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
             echo "
                <td  class='isitabel'><input type='checkbox' id='check' name='idbcf15$i' value='$data[idbcf15]' /></td>
                </td>
                <td class='isitabel'>$data[bcf15no]</td>
                <td class='isitabel'>$data[bcf15tgl]</td>
                <td class='isitabel'>$data[idtps]</td>
                <td class='isitabel'>$data[bc11no] Pos $data[bc11pos] $data[bc11subpos]<br/> tanggal :<br/ >$data[bc11tgl]</td>
                <td class='isitabel'>$data[blno] <br/> tanggal :<br/ >$data[bltgl]</td>
                <td class='isitabel'>$data[saranapengangkut] <br/> Voy :<br/ >$data[voy]</td>
                <td class='isitabel'>$data[consignee]</td>
                <td class='isitabel'>$data[notify]</td>
                <td class='isitabel'>$data[amountbrg] $data[satuanbrg] $data[diskripsibrg]</td>
                <td class='isitabel'>";
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
                                  
              echo "<td class='isitabel'>";
              
              $rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$data[idbcf15] and idsize='20'") ; $data2 = mysql_fetch_array($rowset);  
              $rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$data[idbcf15] and idsize='40'") ; $data3 = mysql_fetch_array($rowset1);                 
              $rowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$data[idbcf15] and idsize='45'") ; $data4 = mysql_fetch_array($rowset2); 
                          
                                             $jumlah2 = $data2[nocontainer];
                                             $jumlah4 = $data3[nocontainer];
                                             $jumlah45 = $data4[nocontainer];
                                             if($jumlah2>0) { echo "($jumlah2 x 20')<br/> ";} else {echo '';}
                                             if($jumlah4>0) { echo "($jumlah4 x 40')<br/>";} else  {echo '';} 
                                             if($jumlah45>0) { echo "($jumlah45 x 45')<br/>";} else  {echo '';} 
                          
                                 
              
                                 
              echo  "</td>";
              echo "<td class='isitabel'><font color=blue>$data[nm_seksi]</font></td>";
              
                                 
             echo "</tr>"   ;
             $i++;
            }
            echo "</table>";
            echo "<input type='hidden' name='n' value='$i' /><br/>";
            echo "Pilih TPP :<select class='required' id='cmbtpp' name='cmbtpp'>";
            echo " <option value = '' >--TPP--</option>";
                                
                                    $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                    $qry = @mysql_query($sql) or die ('Gagal query');
                                        while ($data =mysql_fetch_array($qry)) {
                                            if ($data[idtpp]==$Datatpp) {
                                                $cek='selected';
                                                }
                                           else {
                                                $cek='';
                                                }
                                                echo "<option value=$data[idtpp] $cek>$data[nm_tpp]</option>";
                                            }
                               
                           echo "</select>";
            
              ?>
            <input class="button putih bigrounded " type="submit" value="Simpan" name="submit" onclick="javascript:return confirm('Anda Yakin Untuk Melanjutkan ?')"/> 
            <input class="button putih bigrounded " type="reset" value="Batal" name="reset"/>
            </form>
           
           
            </body>
            </html>


<?php
};
?>


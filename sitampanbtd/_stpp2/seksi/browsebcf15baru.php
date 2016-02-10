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
                 $(document).ready(function() {    
                $("#myform").submit(function() {
                 
                   if ($.trim($("#seksitp2").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih seksi dulu");
                    $("#seksitp2").focus();
                    return false;  
                 }
                     });      
                   });
                </script> 

        
        
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
                 
                 if ($.trim($("#nosp").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Surat Perintah Tidak Boleh Kosong");
                    $("#nosp").focus();
                    return false;  
                 }
                 if ($.trim($("#seksitp2").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih seksi dulu");
                    $("#seksitp2").focus();
                    return false;  
                 }
                     });      
           });
        </script> 
            </head>
            <body>
            <a href="?hal=validasitpp2&pilih=daf_sprint" title="Daftar Surat Perintah" ><img src="images/new/cari.png" title="Edit Surat Perintah"/></a>Cari dan Ubah<br/>
           
            <?php
            // koneksi mysql
          

            // bagian script untuk mengedit data 
            if ($_GET['action'] == "edit")
            {
               // membaca nilai n dari hidden value
               $n = $_POST['n'];
               $txtsp = $_POST['txtsp'];
              
               for ($i=0; $i<=$n-1; $i++)
               {
                 if (isset($_POST['idbcf15'.$i]))
                 {
                   $idbcf15 = $_POST['idbcf15'.$i]; 
                   $bcf15no = $_POST['bcf15no'.$i]; 
                   $tahun = $_POST['tahun'.$i]; 
                   
                   $txtsp = $_POST['txtsp'];
                   $validasibcf15baru = '3';
                   $tglkini=date('Y-m-d');
                   $txttgl=$_POST['txttgl'];
                   $kdtp2=$_POST['kdtp2'];
                   $seksi=$_POST['seksi'];
                   $perintah='1';
                   $query = ("UPDATE bcf15 SET suratperintahno='$txtsp',validasibcf15baru='$validasibcf15baru', suratperintahdate='$txttgl', idtp2='$kdtp2',Perintah='$perintah',idseksitp2='$seksi' WHERE idbcf15 = '$idbcf15'");
                   mysql_query($query);
                   mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Surat Perintah Penarikan','$tglkini','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtsp','$txttgl')");
                   echo '<script type="text/javascript">window.location="index.php?hal=pagetpp2&pilih=sprint_sim"</script>';
                 }
               }
            }
            $cmbtpp = $_POST['cmbtpp'];

            // query SQL untuk menampilkan semua data mahasiswa
            $query = "SELECT * FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and validasibcf15baru='2' and bcf15.idtpp=$cmbtpp order by nm_tpp,idtps,suratperintahdate";
            $hasil = mysql_query($query);

            // membuat form penghapusan data
            echo "<form name='myform' id='myform' method='post' action='?hal=pagetpp2&pilih=newbcf15&action=edit'>";
            
            echo "<table id=tablemodul border='1'>";
            echo "<tr><th class='judultabel'><input type='checkbox' name='pilih' onclick='pilihan()' /> Pilih semua </th>
            <th class='judultabel'>No BCF15</th><th class='judultabel'>Tanggal</th><th class='judultabel'>TPP</th><th class='judultabel'>TPS</th></tr>";

            $i = 0;
            while($data = mysql_fetch_array($hasil)){
             echo "<tr>
             <td class='isitabel'><input type='checkbox' id='check' name='idbcf15$i' value='$data[idbcf15]' /><input type='hidden'  name='bcf15no$i' value='$data[bcf15no]' /><input type='hidden'  name='tahun$i' value='$data[tahun]' />
             </td><td class='isitabel'>$data[bcf15no]</td><td class='isitabel'>$data[bcf15tgl]</td><td class='isitabel'>$data[nm_tpp]</td><td class='isitabel'>$data[idtps]</td></tr>";
             $i++;
            }
            echo "</table>";
            echo "<input type='hidden' name='n' value='$i' /><br/>";
             //cari jumlah bcf15
            $query2 = "SELECT count(*) as jumlah FROM bcf15 where recordstatus='1' and bcf15.idtpp=$cmbtpp";
            $hasil2 = mysql_query($query2);
            $datautama = mysql_fetch_array($hasil2);
            
            //cari jumlah container
                $rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer,bcf15 where bcf15.idbcf15=bcfcontainer.idbcf15 and recordstatus='1' and idtpp=$cmbtpp and idsize='20'") ; $data2 = mysql_fetch_array($rowset);  
                $rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer,bcf15 where bcf15.idbcf15=bcfcontainer.idbcf15 and recordstatus='1' and idtpp=$cmbtpp and idsize='40'") ; $data3 = mysql_fetch_array($rowset1);                 
                $rowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer,bcf15 where bcf15.idbcf15=bcfcontainer.idbcf15 and recordstatus='1' and idtpp=$cmbtpp and idsize='45'") ; $data4 = mysql_fetch_array($rowset2); 
                                             $jumlah2 = $data2[nocontainer];
                                             $jumlah4 = $data3[nocontainer];
                                             $jumlah45 = $data4[nocontainer];
                                             
            
            echo "<font color=red size=10>TOTAL  $datautama[jumlah] BCF 1.5</font><br/>";
                                             if($jumlah2>0) { echo "<font color=red size=10>$jumlah2 x 20' </font> ";} else {echo '';}
                                             if($jumlah4>0) { echo "<font color=red size=10>$jumlah4 x 40' </font> ";} else  {echo '';} 
                                             if($jumlah45>0) { echo "<font color=red size=10>$jumlah45 x 45' </font> <br/>";} else  {echo '';}
                                             $jumlahseluruhnya=$jumlah2+$jumlah4+$jumlah45;
                                             echo "<font color=red size=10>=$jumlahseluruhnya Container</font>";
                                             echo "<br/>";
            echo "</form>";
            ?>
           
            </body>
            </html>


<?php
};
?>


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
                 if ($.trim($("#ls").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Tentukan Status Longstay atau Bukan");
                    $("#ls").focus();
                    return false;  
                 }
                     });      
           });
        </script> 
            </head>
            <body>
            <a href="?hal=pagetpp2&pilih=daf_sprint" title="Edit Surat Perintah" ><img src="images/new/cari.png" title="Edit Surat Perintah"/></a>Cari dan Ubah<br/>
           
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
                   $ls = $_POST['ls'];
                   $validasibcf15baru = '3';
                   $tglkini=date('Y-m-d');
                   $txttgl=$_POST['txttgl'];
                   $kdtp2=$_POST['kdtp2'];
                   $seksi=$_POST['seksi'];
                   $perintah='1';
                   $query = ("UPDATE bcf15 SET suratperintahno='$txtsp',validasibcf15baru='$validasibcf15baru', suratperintahdate='$txttgl', idtp2='$kdtp2',Perintah='$perintah',idseksitp2='$seksi',longstay_tps='$ls' WHERE idbcf15 = '$idbcf15'");
                   mysql_query($query);
                   mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Surat Perintah Penarikan','$tglkini','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtsp','$txttgl')");
                   echo '<script type="text/javascript">window.location="index.php?hal=pagetpp2&pilih=sprint_sim"</script>';
                 }
               }
            }
            $cmbtpp = $_POST['cmbtpp'];

            // query SQL untuk menampilkan semua data mahasiswa
            $query = "SELECT * FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and validasibcf15baru='2' and bcf15.idtpp=$cmbtpp order by bcf15no,idtps";
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
            echo "<table><tr><td>Masukan No Sprint</td><td> :</td><td><input type='text' id='nosp' class='required' name='txtsp' value='' />
                    <select class='required' name='kdtp2'>
                                    <option value=0 selected>::Pilih Kode Dok::</option>";
                                    $sql=mysql_query("SELECT * FROM tp2 ORDER BY idtp2");
                                    while($data1=mysql_fetch_array($sql)){
                                        if ($data1[idtp2]==$data[idtp2]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                    echo "<option value=$data1[idtp2] $cek>$data1[kd_tp2]</option>";
                                    }
                  echo "</select>
                    </td></tr>";
            echo "<tr><td>Tanggal Sprint</td><td> :</td><td><input class='required' type='text' id='tanggal' name='txttgl' value='' /></td></tr>";
            echo "<tr><td>Seksi</td><td> :</td>";
            echo "       <td> <select class='required' name='seksi' id='seksitp2' >
                                    <option value=0 selected>::</option>";
                                    $sql=mysql_query("SELECT * FROM seksi where kdseksi='tpp2' and status_seksi='aktif' ORDER BY idseksi");
                                    while($data1=mysql_fetch_array($sql)){
                                        if ($data1[idseksi]==$data[idseksitp2]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                    echo "<option value=$data1[idseksi] $cek>$data1[plh] $data1[nm_seksi]</option>";
                                    }
                  echo "</select></td>
                </tr>";
             echo "<tr><td>Apakah BCF 1.5 ini merupakan Longstay di TPS</td><td> :</td>";     
             echo "       <td> <select class='required' name='ls' id='ls' >
                                    <option value='' selected>::</option>
                                    <option value='1' >Ya</option>
                                    <option value='0'>Tidak</option>";
                                    
                                    
                                   
                                    
                  echo "</select></td>
                </tr>";     
                echo "</table>";
             
            echo "<p><input class='button putih bigrounded' type='submit' value='Simpan' name='submit' onclick=javascript:return confirm(Apakah isian Pejabat sudah diisi ?)> 
                  <input class='button putih bigrounded' type='reset' value='Batal' name='reset'></p>";
            echo "</form>";
            ?>
           
            </body>
            </html>


<?php
};
?>


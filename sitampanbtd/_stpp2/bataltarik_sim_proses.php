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
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> <b>No Surat Pemberitahuan Batal Tarik</b> Tidak Boleh Kosong");
                    $("#nosp").focus();
                    return false;  
                 }
                 if ($.trim($("#ket").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Isikan Keterangan Kenapa Batal Tarik!");
                    $("#ket").focus();
                    return false;  
                 }
                     });      
           });
        </script> 
            </head>
            <body>
            <a href="?hal=pagemonitoring&pilih=" title="Edit Permohonan Batal Tarik" ><img src="images/new/cari.png" title="Edit Surat Permohonan Batal Tarik"/></a>Cari dan Ubah<br/>
           
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
                   $txtsp1 = $_POST['txtsp1'];
                   $ket=$_POST['ket'];
                   $tglkini=date('Y-m-d');
                   $txttgl=$_POST['txttgl'];
                   $bataltarik='1';
                   
                   $query = ("UPDATE bcf15 SET BatalTarikNo='$txtsp', BatalTarikNo2='$txtsp1',BatalTarikDate='$txttgl', BatalTarikKet='$ket', BatalTarik='$bataltarik' WHERE idbcf15 = '$idbcf15'");
                   mysql_query($query);
                   mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Input Batal Tarik Simultan','$tglkini','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtsp','$txttgl')");
                   echo '<script type="text/javascript">window.location="index.php?hal=pagemonitoring&pilih=bataltarik_sim"</script>';
                 }
               }
            }
            $cmbtpp = $_POST['cmbtpp'];
            $tgl = $_POST['tgl'];
            $tps = $_POST['tps'];

            // query SQL untuk menampilkan semua data mahasiswa
            $query = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,BatalTarikNo,BatalTarikDate,BatalTarikKet,bamasukno,bamasukdate,suratno,suratperintahno,ndsegelno
            FROM bcf15,tpp,typecode where bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and BatalTarik='2' and masuk='2' and  bcf15.idtpp='$cmbtpp' and bcf15tgl='$tgl' and  idtps='$tps' ";
            $hasil = mysql_query($query);

            // membuat form penghapusan data
            echo "<form name='myform' id='myform' method='post' action='?hal=pagemonitoring&pilih=bataltarik_sim_pro&action=edit'>";
            
            echo "<table id=tablemodul border='1'>";
            echo "<tr><th class='judultabel'><input type='checkbox' name='pilih' onclick='pilihan()' /> Pilih semua </th>
            <th class='judultabel'>No BCF15</th><th class='judultabel'>Tanggal</th><th class='judultabel'>TPP</th><th class='judultabel'>TPS</th><th class='judultabel'>Type Cont</th><th class='judultabel'>ND Buka Segel</th></tr>";

            $i = 0;
            while($data = mysql_fetch_array($hasil)){
             echo "<tr>
             <td class='isitabel'><input type='checkbox' id='check' name='idbcf15$i' value='$data[idbcf15]' /><input type='hidden'  name='bcf15no$i' value='$data[bcf15no]' /><input type='hidden'  name='tahun$i' value='$data[tahun]' />
             </td><td class='isitabel'>$data[bcf15no]</td><td class='isitabel'>$data[bcf15tgl]</td><td class='isitabel'>$data[nm_tpp]</td><td class='isitabel'>$data[idtps]</td><td class='isitabel'>$data[nm_type]</td><td class='isitabel'>$data[ndsegelno]</td></tr>";
             $i++;
            }
            echo "</table>";
            echo "<input type='hidden' name='n' value='$i' /><br/>";
            echo "<table><tr><td>Masukan No Surat Pemberitahuan Batal Tarik</td><td> :</td><td><input type='text' id='nosp' size='5' class='required' name='txtsp' value='' /> <input type='text' id='nosp1' class='required' name='txtsp1' value='' />";
               echo " </td></tr>";
            echo "<tr><td>Tanggal Surat</td><td> :</td><td><input class='required' type='text' id='tanggal' name='txttgl' value='' /></td></tr>";
            echo "<tr><td>Keterangan </td><td> :</td><td><textarea class='required' type='text' rows=4 cols=30 id='ket' name='ket' value='' ></textarea></td></tr>";
            echo "<p><input class='button putih bigrounded' type='submit' value='Simpan' name='submit' onclick=javascript:return confirm(Anda Yakin menyimpan Surat Permohonan Batal Tarik?)> 
                  <input class='button putih bigrounded' type='reset' value='Batal' name='reset'></p>";
            echo "</form>";
            ?>
           
            </body>
            </html>


<?php
};
?>


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
            <br/><a href="?hal=suratpemberitahuan" target="_blank">Edit Surat Pemberitahuan</a>
            <br/>
            
           
            <?php
            // koneksi mysql
          

            // bagian script untuk mengedit data 
            if ($_GET['action'] == "edit")
            {
               // membaca nilai n dari hidden value
               $n = $_POST['n'];
               $txttglsp = $_POST['txttglsp'];
              
              for ($i=1; $i<=$n; $i++)
               {
                 if (isset($_POST['idbcf15'.$i]))
                 {
                   $idbcf15 = $_POST['idbcf15'.$i]; 
                   $bcf15no = $_POST['bcf15no'.$i]; 
                   $tahun = $_POST['tahun'.$i]; 
                   $suratno = $_POST['suratno'.$i];
                   $cmbpel = $_POST['cmbpel'.$i];
                   
                   $txttglsp = $_POST['txttglsp'];
                   $pemberitahuan = '1';
                   $tglkini=date('Y-m-d');
                  
                   $kdtp2=$_POST['kdtp2'];
                   $seksi=$_POST['seksi'];
                   $perintah='1';
                   $query = ("UPDATE bcf15 SET suratno='$suratno',pemberitahuan='$pemberitahuan', suratdate='$txttglsp', idtp3='$kdtp2',idseksitp3='$seksi',idpelayaran='$cmbpel',Pelayaran='$cmbpel' WHERE idbcf15 = '$idbcf15'");
                   mysql_query($query);
                   mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Surat Pemberitahuan','$tglkini','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtsp','$txttgl')");
                   echo '<script type="text/javascript">window.location="index.php?hal=pagetpp3&pilih=sptahusim"</script>';
                 }
               }
            }

            // query SQL untuk menampilkan semua data mahasiswa
            // membaca kode matakuliah yang disubmit
        
        $cmbtpp = $_POST['cmbtpp'];
        

        // menampilkan data nim dan nilai mahasiswa yang mengambil 
        // mata kuliah berdasarkan kode MK
        $query = "SELECT *  FROM bcf15,tpp 
         WHERE bcf15.idtpp=tpp.idtpp and bcf15.idtpp = '$cmbtpp' and pemberitahuan='2' and recordstatus='2' order by bcf15no asc";
            
            $hasil = mysql_query($query);
            

            // membuat form penghapusan data
            echo "<form name='myform' id='myform' method='post' action='?hal=pagetpp3&pilih=sptahusim_formedit&action=edit'>";
            
            echo "<table id=tablemodul border='0'>";
            echo "<tr><td class='judulbreadcrumb' colspan='12'>Surat Pemberitahuan BCF 1.5 yang akan ditarik Ke TPP  </td></tr>";
            echo "<tr><th class='judultabel'>No</th><th class='judultabel'><input type='checkbox' name='pilih' onclick='pilihan()' /> Pilih semua </th>
            <th class='judultabel'>Surat Pemberitahuan</th> 
            <th class='judultabel'>Pelayaran</th>
            <th class='judultabel'>No BCF15</th>
            <th class='judultabel'>Tanggal</th>
            <th class='judultabel'>BC 11</th>
            <th class='judultabel'>Pos</th>
            <th class='judultabel'>Tanggal</th>
            <th class='judultabel'>TPP</th>
            <th class='judultabel'>Consignee</th>
            <th class='judultabel'>Notify</th>
            </tr>";

            $i = 1;
            while($data = mysql_fetch_array($hasil)){
             echo "<tr><td class='isitabel' width=10>$i</td>
             <td class='isitabel'><input type='checkbox' id='check' name='idbcf15$i' value='$data[idbcf15]' /><input type='hidden'  name='bcf15no$i' value='$data[bcf15no]' /><input type='hidden'  name='tahun$i' value='$data[tahun]' /><input type='hidden'  name='tpp$i' value='$data[idtpp]' />
             </td>
                <td class='isitabel' width=10>
                    <input size=5 class='required' type='text'  name='suratno$i' value='$data[suratno]' />
                </td>
                <td class='isitabel' >
                        <select name='cmbpel$i'>
                                            <option value=0 selected>--</option>";
                                            $sql = "SELECT * FROM pelayaran ORDER BY idpelayaran";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data1 =mysql_fetch_array($qry)) {
                                                if ($data1[idpelayaran]==$data[idpelayaran]) {
                                                    $cek="selected";
                                                    }
                                               else {
                                                    $cek="";
                                                    }
                                                    echo "<option value='$data1[idpelayaran]' $cek>$data1[nm_pelayaran]</option>";
                                                }
                          echo "</select>
                </td>
                <td class='isitabel'>$data[bcf15no]</td>
                <td class='isitabel'>$data[bcf15tgl]</td>
                <td class='isitabel'>$data[bc11no]</td>
                <td class='isitabel'>$data[bc11pos]</td>
                <td class='isitabel'>$data[bc11tgl]</td>
                <td class='isitabel'>$data[nm_tpp]</td>
                <td class='isitabel'>$data[consignee]</td>
                <td class='isitabel'>$data[notify]</td>
                </tr>";
             $i++;
            }
            echo "</table>";
            echo "<input type='hidden' name='n' value='$i' /><br/>";
            echo "<table><tr><td>Tanggal Surat Pemberitahuan</td><td> :</td><td><input type='text' id='tanggal' class='required' name='txttglsp' value='' />
                    <select class='required' name='kdtp2'>
                                    <option value=0 selected>::Pilih Kode Dok::</option>";
                                    $sql=mysql_query("SELECT * FROM tp3 ORDER BY idtp3");
                                    while($data1=mysql_fetch_array($sql)){
                                        if ($data1[idtp3]==$data[idtp3]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                    echo "<option value=$data1[idtp3] $cek>$data1[kd_tp3]</option>";
                                    }
                  echo "</select>
                    </td></tr>";
           
            echo "<tr><td>Seksi</td><td> :</td>
                    <td> <select class='required' name='seksi'>
                                    <option value=0 selected>::PILIH SEKSI::</option>";
                                    $sql=mysql_query("SELECT * FROM seksi where kdseksi='tpp3' ORDER BY idseksi");
                                    while($data1=mysql_fetch_array($sql)){
                                        if ($data1[idseksi]==$data[idseksitp3]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                    echo "<option value=$data1[idseksi] $cek>$data1[nm_seksi]</option>";
                                    }
                  echo "</select></td>
                </tr>
                </table>";
             
            echo "<p><input class='button' type='submit' value='Simpan' name='submit'> 
                  <input class='buttoncancel' type='reset' value='Batal' name='reset'></p>";
            echo "</form>";
            ?>
           
            </body>
            </html>


<?php
};
?>


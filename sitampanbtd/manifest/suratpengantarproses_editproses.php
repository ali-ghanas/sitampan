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
               
              
              for ($i=1; $i<=$n; $i++)
               {
                 if (isset($_POST['idbcf15'.$i]))
                 {
                   $idbcf15 = $_POST['idbcf15'.$i]; 
                   $bcf15no = $_POST['bcf15no'.$i]; 
                   $tahun = $_POST['tahun'.$i]; 
                   $suratpengantarno = $_POST['suratpengantarno'.$i];
                   
                   $seksi = $_POST['seksi'.$i];
                   $cmbtpp = $_POST['cmbtpp'.$i];
                   
                   
                   $query = ("UPDATE bcf15 SET suratpengantarno='$suratpengantarno',idseksi='$seksi', idtpp='$cmbtpp' WHERE idbcf15 = '$idbcf15'");
                   mysql_query($query);
                   
                   echo '<script type="text/javascript">window.location="index.php?hal=pagemanifest&pilih=editsp"</script>';
                 }
               }
            }

            // query SQL untuk menampilkan semua data mahasiswa
            // membaca kode matakuliah yang disubmit
        
        $cmbtpp = $_POST['cmbtpp'];
        $tglakhir = $_POST['tglakhir'];
        $tglawal = $_POST['tglawal'];

        // menampilkan data nim dan nilai mahasiswa yang mengambil 
        // mata kuliah berdasarkan kode MK
        $query = "SELECT *  FROM bcf15,tpp 
         WHERE bcf15.idtpp=tpp.idtpp and bcf15.idtpp = '$cmbtpp' and (suratpengantartgl between '$tglawal' and '$tglakhir') and recordstatus='2'";
            
            $hasil = mysql_query($query);
            

            // membuat form penghapusan data
            echo "<form name='myform' id='myform' method='post' action='?hal=pagemanifest&pilih=editsp_proses&action=edit'>";
            
            echo "<table id=tablemodul border='0'>";
            echo "<tr><td class='judulbreadcrumb' colspan='15'>Surat Pengantar BCF 1.5  </td></tr>";
            echo "<tr><th class='judultabel'>No</th><th class='judultabel'><input type='checkbox' name='pilih' onclick='pilihan()' /> Pilih semua </th>
            <th class='judultabel'>Surat Pengantar</th> 
            
            <th class='judultabel'>Kepala Seksi</th>
            <th class='judultabel'>TPP</th>
            <th class='judultabel'>No BCF15</th>
            <th class='judultabel'>Tanggal</th>
            <th class='judultabel'>BC 11</th>
            <th class='judultabel'>Pos</th>
            <th class='judultabel'>Cetak SP</th>
            
            </tr>";

            $i = 1;
            while($data = mysql_fetch_array($hasil)){
             echo "<tr><td class='isitabel' width=10>$i</td>
             <td class='isitabel'><input type='checkbox' id='check' name='idbcf15$i' value='$data[idbcf15]' /><input type='hidden'  name='bcf15no$i' value='$data[bcf15no]' /><input type='hidden'  name='tahun$i' value='$data[tahun]' /><input type='hidden'  name='tpp$i' value='$data[idtpp]' />
             </td>
                <td class='isitabel' width=10>
                    <input size=5 class='required' type='text'  name='suratpengantarno$i' value='$data[suratpengantarno]' />
                </td>
                
                <td class='isitabel' >
                        <select name='seksi$i'>
                                            <option value=0 selected>--</option>";
                                            $sql = "SELECT * FROM seksi where kdseksi='manifest' ORDER BY idseksi";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data1 =mysql_fetch_array($qry)) {
                                                if ($data1[idseksi]==$data[idseksi]) {
                                                    $cek="selected";
                                                    }
                                               else {
                                                    $cek="";
                                                    }
                                                    echo "<option value='$data1[idseksi]' $cek>$data1[nm_seksi]</option>";
                                                }
                          echo "</select>
                </td>
                <td class='isitabel' >
                        <select name='cmbtpp$i'>
                                            <option value=0 selected>--</option>";
                                            $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data1 =mysql_fetch_array($qry)) {
                                                if ($data1[idtpp]==$data[idtpp]) {
                                                    $cek="selected";
                                                    }
                                               else {
                                                    $cek="";
                                                    }
                                                    echo "<option value='$data1[idtpp]' $cek>$data1[nm_tpp]</option>";
                                                }
                          echo "</select>
                </td>
                <td class='isitabel'>$data[bcf15no]</td>
                <td class='isitabel'>$data[bcf15tgl]</td>
                <td class='isitabel'>$data[bc11no]</td>
                <td class='isitabel'>$data[bc11pos]</td>
                <td class='isitabel'><a href=?hal=spcetak&id=$data[suratpengantarno]&tahun=$data[tahun]>$data[suratpengantarno]</a></td>
               
                </tr>";
             $i++;
            }
            echo "</table>";
            echo "<input type='hidden' name='n' value='$i' /><br/>";
           
           
            
             
            echo "<p><input class='button' type='submit' value='Simpan' name='submit'> 
                  <input class='button' type='reset' value='Batal' name='reset'></p>";
            echo "</form>";
            ?>
           
            </body>
            </html>


<?php
};
?>


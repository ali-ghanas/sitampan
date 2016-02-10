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
                 
                   if ($.trim($("#Jen_kegiatan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Jenis Kegiatan Yang akan dijalani");
                    $("#Jen_kegiatan").focus();
                    return false;  
                 }
                     });      
                   });
                </script> 
<script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
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
              
            </head>
            <body>
                <a href="?hal=sms_piketbrowse" title="Browse Piket" >INBOX</a> | <a href="?hal=addpbk">TAMBAH KONTAK</a> | <a href="?hal=addgroup">TAMBAH GROUP</a><br/>
           
            <?php
            // koneksi mysql
          

            // bagian script untuk mengedit data 
            if ($_GET['action'] == "edit")
            {
               // membaca nilai n dari hidden value
               $n = $_POST['n'];
                
                
              
               for ($i=0; $i<=$n-1; $i++)
               {
                 if (isset($_POST['ID'.$i]))
                 {
                   $ID = $_POST['ID'.$i]; 
                   $Name = $_POST['Name'.$i]; 
                   
                   
                   $Jen_kegiatan = $_POST['Jen_kegiatan'];
                   $tgl_kegiatan = $_POST['tgl_kegiatan'];
                   
                    $y =substr($tgl_kegiatan,0,4);
                    $m=substr($tgl_kegiatan,5,2);
                    $d=substr($tgl_kegiatan,8,2);
                    
                   $tglsms1 = mktime(0,0,0, $m,$d-1,$y);
                   $tglsms=date("Y-m-d", $tglsms1);
                   
                    $sqlpeg = "select * from pbk where ID='$ID'"; // memanggil data dengan id yang ditangkap tadi
                    $querypeg = mysql_query($sqlpeg);
                    $peg = mysql_fetch_array($querypeg);
                    $noHp=$peg['Number'];
                   
                   $query = mysql_query("INSERT INTO sms_kegiatan_tpp
                           (
                           nm_pegawai,
                           noHp_pegawai,
                           tgl_kegiatan,
                           Jen_kegiatan,
                           tglsms
                           )VALUES(
                           '$Name',
                           '$noHp',
                           '$tgl_kegiatan',
                           '$Jen_kegiatan',
                           '$tglsms'
                           )");
                  
                   echo '<script type="text/javascript">window.location="index.php?hal=sms_piket"</script>';
                 }
               }
            }
            

            // query SQL untuk menampilkan semua data mahasiswa
            $query = "SELECT * FROM pbk ";
            $hasil = mysql_query($query);

            // membuat form penghapusan data
            echo "<form name='myform' id='myform' method='post' action='?hal=sms_piket&action=edit'>";
            
            echo "<table class=data >";
            echo "<tr >
                <th class='judultabel'><input type='checkbox' name='pilih' onclick='pilihan()' /> Pilih semua </th>
                <th class='judultabel'>Nama</th>
                <th class='judultabel'>No HP</th>
                <th class='judultabel' colspan=2>Action</th>
               
                ";

            $i = 0;
            while($data = mysql_fetch_array($hasil)){
             echo "<tr align=center>
                <td class='isitabel'><input type='checkbox' id='check' name='ID$i' value='$data[ID]' /><input type='hidden'  name='Name$i' value='$data[Name]' />
             </td>
                <td class='isitabel'>$data[Name]</td>
                <td class='isitabel'>$data[Number]</td>
                <td class='isitabel'><a href='?hal=editpbk&id=$data[ID]'>Edit</a></td>
                <td class='isitabel'><a href='?hal=delpbk&id=$data[ID]' >Hapus</a></td>
              </tr>";
             $i++;
            }
            echo "</table>";
            echo "<input type='hidden' name='n' value='$i' /><br/>";
            echo "<table>
                        <tr><td>Jenis Kegiatan</td><td> :</td><td>";
                        echo "<select name=Jen_kegiatan type=text id=Jen_kegiatan >
                                <option value=''>::PILIH::</option>
                                <option value='PIKET247PAGI'>Piket 247 Pagi</option>
                                <option value='PIKET247MLM'>Piket 247 Malam</option>
                                <option value='PIKETCKRG'>Piket Cikarang</option>
                                <option value='P2KP'>P2KP</option>
                                <option value='PETUGASDISIPLIN'>Piket Petugas Disiplin</option>
                                <option value='Apel'>APEL Bulanan</option>
                                </select>";
            echo "    </td></tr>";
            echo "<tr><td>Tanggal Kegiatan</td><td> :</td><td><input class='required' type='text' id='tanggal' name='tgl_kegiatan' value='' /></td></tr>";
                
                echo "</table>";
             
            echo "<p><input class='button putih bigrounded' type='submit' value='Tambahkan' name='submit' onclick=javascript:return confirm(Lanjutkan ?)> 
                  </p>";
            echo "</form>";
            ?>
           
            </body>
            </html>


<?php
};
?>


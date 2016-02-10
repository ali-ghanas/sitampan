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
              <script type="text/javascript">
                 $(document).ready(function() {    
                $("#myform").submit(function() {
                 
                 if ($.trim($("#nosp").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Surat Perintah Tidak Boleh Kosong");
                    $("#nosp").focus();
                    return false;  
                 }
                 if ($.trim($("#kakan").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Anda Belum Memilih Kepala Kantornya");
                    $("#kakan").focus();
                    return false;  
                 }
                     });      
           });
        </script> 
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"100:+0"
               });
           });
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
               $txtsp = $_POST['txtsp'];
              
               for ($i=0; $i<=$n-1; $i++)
               {
                 if (isset($_POST['idbcf15'.$i]))
                 {
                   $idbcf15 = $_POST['idbcf15'.$i]; 
                   $bcf15no = $_POST['bcf15no'.$i]; 
                   $tahun = $_POST['tahun'.$i]; 
                   
                   $txtsp = 'konsep';
                   $tglkini=date('Y-m-d');
                   $txttgl=$_POST['txttgl'];
                   $kakan=$_POST['kakan'];
                   $query = ("UPDATE bcf15 SET KepLelang1No='$txtsp',KepLelang1Date='$txttgl', idkepala_kantor_skep_btd='$kakan' WHERE idbcf15 = '$idbcf15'");
                   mysql_query($query);
                   
                   if($query){
                   mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,bcf15no,tahun,nama_user,nip_user,dokupdate,tgldokupdate)VALUES('Konsep Kep Lelang I','$tglkini','$bcf15no','$tahun','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','$txtsp','$txttgl')");
                   echo "<script type='text/javascript'>window.location='index.php?hal=rep_kons_lelangI&no_skep=$txtsp&tgl=$txttgl'</script>";
                   }
                   else{echo "belum berhasil di simpan";}
                 }
               }
            }
            $cmbtpp = $_POST['cmbtpp'];

            // query SQL untuk menampilkan semua data mahasiswa
            $query = "SELECT * FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and konsep_skepbtd='1' and bcf15.idtpp=$cmbtpp order by nm_tpp,idtps,suratperintahdate";
            $hasil = mysql_query($query);

            // membuat form penghapusan data
            echo "<form name='myform' id='myform' method='post' action='?hal=pagebcf15pemwas&pilih=saldobtd&sub_pilih=kon_skep_btd_bro&action=edit'>";
            
            echo "<table id=tablemodul border='1'>";
            echo "<tr><th class='judultabel'><input type='checkbox' name='pilih' onclick='pilihan()' /> Pilih semua </th>
            <th class='judultabel' colspan=2>NHP</th><th class='judultabel' colspan=2>BCF 1.5</th><th class='judultabel'>TPP</th><th class='judultabel'>Consignee</th><th class='judultabel'>Notify</th></tr>";

            $i = 0;
            while($data = mysql_fetch_array($hasil)){
             echo "<tr>
             <td class='isitabel'><input type='checkbox' id='check' name='idbcf15$i' value='$data[idbcf15]' /><input type='hidden'  name='bcf15no$i' value='$data[bcf15no]' /><input type='hidden'  name='tahun$i' value='$data[tahun]' />
             </td><td class='isitabel'>$data[NHPLelangNo]</td><td class='isitabel'>$data[NHPLelangDate]</td> <td class='isitabel'>$data[bcf15no]</td><td class='isitabel'>$data[bcf15tgl]</td><td class='isitabel'>$data[nm_tpp]</td><td class='isitabel'>$data[consignee]</td><td class='isitabel'>$data[notify]</td></tr>";
             $i++;
            }
            echo "</table>";
            echo "<input type='hidden' name='n' value='$i' /><br/>";
            echo "<table><tr><td>No Kep</td><td> :</td><td><input disabled type='text' id='nosp' class='required' name='txtsp' value='konsep' /> ";
                    
                                   
                                    
            echo "</td></tr>";
            echo "<tr><td>Tanggal Kep</td><td> :</td><td><input class='required' type='text' id='tanggal' name='txttgl' value='' /></td></tr>";
            echo "<tr><td>Kepala Kantor</td><td> :</td>";
            echo "       <td> <select class='required' name='kakan' id='kakan' >
                                    <option value=0 selected>::</option>";
                                    $sql=mysql_query("SELECT * FROM kepala_kantor where status_record='aktif' ORDER BY idkepala_kantor");
                                    while($data1=mysql_fetch_array($sql)){
                                        if ($data1[idkepala_kantor]==$data[idkepala_kantor_skep_btd]) {
                                                    $cek="selected";
                                            }
                                            else {
                                                    $cek="";
                                            }
                                    echo "<option value=$data1[idkepala_kantor] $cek>$data1[plh] $data1[nm_kepala_kantor]</option>";
                                    }
                  echo "</select></td>
                </tr>
                </table>";
             
            echo "<p><input class='button' type='submit' value='Simpan' name='submit' onclick=javascript:return confirm(Lanjutkan ?)> 
                  <input class='buttoncancel' type='reset' value='Batal' name='reset'></p>";
            echo "</form>";
            ?>
           
            </body>
            </html>


<?php
};
?>


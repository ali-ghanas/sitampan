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
                 
                 
                 if ($.trim($("#ls").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Pilih Status Longstay atau Bukan");
                    $("#ls").focus();
                    return false;  
                 }
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
                   
                   
                   $ls = $_POST['ls'];
                   $ket=$_POST['ket'];
                   $tglkini=date('Y-m-d');
                   $txttgl=$_POST['txttgl'];
                   $bataltarik='1';
                   
                   $query = ("UPDATE bcf15 SET longstay_tps='$ls' WHERE idbcf15 = '$idbcf15'");
                   mysql_query($query);
                   
                   echo '<script type="text/javascript">window.location="index.php?hal=pagemonitoring&pilih=updatelongstay"</script>';
                 }
               }
            }
            $cmbtpp = $_POST['cmbtpp'];
            $tgl = $_POST['tgl'];
           
            $tps = $_POST['tps'];

            // query SQL untuk menampilkan semua data mahasiswa
            $query = "SELECT idbcf15,bcf15no,tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,blno,bltgl,consignee,notify,idtps,bcf15.idtpp,tpp.idtpp,nm_tpp,BatalTarikNo,BatalTarikDate,BatalTarikKet,bamasukno,bamasukdate,suratno,suratperintahno,ndsegelno,nm_type
            FROM bcf15,tpp,typecode where bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp  and masuk='2' and  bcf15.idtpp='$cmbtpp' and bcf15tgl='$tgl' and  idtps='$tps' ";
            $hasil = mysql_query($query);

            // membuat form penghapusan data
            echo "<form name='myform' id='myform' method='post' action='?hal=pagemonitoring&pilih=updatelongstay_proses&action=edit'>";
            
            echo "<table id=tablemodul border='1'>";
            echo "<tr><th class='judultabel'><input type='checkbox' name='pilih' onclick='pilihan()' /> Pilih semua </th>
            <th class='judultabel'>No BCF15</th><th class='judultabel'>Tanggal</th><th class='judultabel'>TPP</th><th class='judultabel'>TPS</th><th class='judultabel'>Type Cont</th></tr>";

            $i = 0;
            while($data = mysql_fetch_array($hasil)){
             echo "<tr>
             <td class='isitabel'><input type='checkbox' id='check' name='idbcf15$i' value='$data[idbcf15]' /><input type='hidden'  name='bcf15no$i' value='$data[bcf15no]' /><input type='hidden'  name='tahun$i' value='$data[tahun]' />
             </td><td class='isitabel'>$data[bcf15no]</td><td class='isitabel'>$data[bcf15tgl]</td><td class='isitabel'>$data[nm_tpp]</td><td class='isitabel'>$data[idtps]</td><td class='isitabel'>$data[nm_type]</td></tr>";
             $i++;
            }
            echo "</table>";
            echo "<input type='hidden' name='n' value='$i' /><br/>";
           echo "<table>";
            
             echo "<tr><td>Apakah BCF 1.5 ini merupakan Longstay di TPS</td><td> :</td>";     
             echo "       <td> <select class='required' name='ls' id='ls' >
                                    <option value='' selected>::</option>
                                    <option value='1' >Ya</option>
                                    <option value='0'>Tidak</option>";
                                    
                                    
                                   
                                    
                  echo "</select></td>
                </tr>";    
            echo "<tr><p><input class='button putih bigrounded' type='submit' value='Simpan' name='submit' onclick=javascript:return confirm(Anda Yakin menyimpan Surat Permohonan Batal Tarik?)> 
                  <input class='button putih bigrounded' type='reset' value='Batal' name='reset'></p></tr></table>";
            echo "</form>";
            ?>
           
            </body>
            </html>


<?php
};
?>


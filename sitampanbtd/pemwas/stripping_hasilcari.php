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
                 
                 if ($.trim($("#nosrt").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No Surat Perintah Tidak Boleh Kosong");
                    $("#nosrt").focus();
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
                   $idtpp = $_POST['idtpp'.$i]; 
                   $idpelayaran = $_POST['idpelayaran'.$i]; 
                   
                   $nosrt = $_POST['nosrt'];
                   $tglsrt = $_POST['tglsrt'];
                   $user_permohonan = $_SESSION['nip_baru'];
                   $tgl_ajupermohonan = date('Y-m-d H:i:s');
                                        //cek apakah sudah pernah diinput atau belum
                                        $sqlstrip = "SELECT * FROM suratmasukstripping where idbcf15='$idbcf15'  ";
                                        $querystrip = mysql_query($sqlstrip);
                                        
                                        $cekstrip=mysql_numrows($querystrip);
                                        if($cekstrip>0){
                                            $query = ("UPDATE suratmasukstripping SET idtpp='$idtpp',idpelayaran='$idpelayaran', nosrt='$nosrt', tglsrt='$tglsrt',user_permohonan='$user_permohonan',tgl_ajupermohonan='$tgl_ajupermohonan' WHERE idbcf15 = '$idbcf15'");
                                                       mysql_query($query);

                                                       echo '<script type="text/javascript">window.location="index.php?hal=pagebcf15pemwas&pilih=browsestrip"</script>';
                                           
                                        }
                                        else {
                                            $input=mysql_query("INSERT INTO suratmasukstripping(idbcf15, idtpp, idpelayaran,nosrt,tglsrt,user_permohonan,tgl_ajupermohonan)
                                                    VALUES('$idbcf15', '$idtpp', '$idpelayaran','$nosrt','$tglsrt','$user_permohonan','$tgl_ajupermohonan')");
                                                     echo '<script type="text/javascript">window.location="index.php?hal=pagebcf15pemwas&pilih=browsestrip"</script>';
                                           
                                        }
                   
                   
                 }
               }
            }
            $nocontainer = $_POST['nocontainer'];
            $tahun = $_POST['tahun'];

            // query SQL untuk menampilkan semua data mahasiswa
            $query = "SELECT bcf15.idbcf15,bcf15.bcf15no,bcf15.tahun,bcf15tgl,bc11no,bc11tgl,bc11pos,bc11subpos,saranapengangkut,voy,consignee,notify,idtps,bcf15.idtpp,idpelayaran,bcf15.idtpp,
                             tpp.idtpp,nm_tpp,
                             nocontainer,idsize,bcfcontainer.bcf15no,bcfcontainer.tahun
                             
            FROM bcf15,bcfcontainer,tpp where bcf15.idtpp=tpp.idtpp and bcf15.idbcf15=bcfcontainer.idbcf15 and recordstatus='2' and nocontainer='$nocontainer' and bcfcontainer.tahun='$tahun' order by bcf15.bcf15no,idtps";
            $hasil = mysql_query($query);

            // membuat form penghapusan data
            echo "<form name='myform' id='myform' method='post' action='?hal=pagebcf15pemwas&pilih=caricont_hasil&action=edit'>";
            
            echo "<table   class=data isitabel>";
            echo "<tr>
                <th class='isitabel' width=50><input type='checkbox' name='pilih' onclick='pilihan()' /> All </th>
                <th class='isitabel'>No BCF15</th>
                <th class='isitabel'>Tanggal</th>
                <th class='isitabel'>Consignee</th>
                <th class='isitabel'>Notify</th>
                <th class='isitabel'>TPP</th>
                <th class='isitabel'>TPS</th>
                </tr>";

            $i = 0;
            while($data = mysql_fetch_array($hasil)){
             echo "<tr>
             <td class='isitabel' >
                <input type='checkbox' id='check' name='idbcf15$i' value='$data[idbcf15]' /><input type='hidden'  name='bcf15no$i' value='$data[bcf15no]' /><input type='hidden'  name='idpelayaran$i' value='$data[idpelayaran]' /><input type='hidden'  name='idtpp$i' value='$data[idtpp]' /><input type='hidden'  name='tahun$i' value='$data[tahun]' />
             </td>
                <td class='isitabel'>$data[bcf15no]</td>
                <td class='isitabel'>$data[bcf15tgl]</td>
                <td class='isitabel'>$data[consignee]</td>
                <td class='isitabel'>$data[notify]</td>
                <td class='isitabel'>$data[nm_tpp]</td>
                <td class='isitabel'>$data[idtps]</td>
                
                
                </tr>";
             $i++;
            }
            echo "</table>";
            echo "<input type='hidden' name='n' value='$i' /><br/>";
            echo "<table >
                <tr>
                <td>Surat Permohonan</td>
                <td> :</td>
                <td><input type='text' id='nosrt' class='required' name='nosrt' value='' /></td>
                </tr>";
                    
                    
            echo "<tr>
                <td>Tanggal Surat Permohonan</td>
                <td> :</td>
                <td><input class='required' type='text' id='tanggal' name='tglsrt' value='' /></td>
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


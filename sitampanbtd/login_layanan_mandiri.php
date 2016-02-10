    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
     <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
<?php
error_reporting(0);
include "lib/koneksi.php";
$cmb_cari=$_POST['cmb_cari'];
$katakunci=$_POST['katakunci'];
$subkatakunci=$_POST['subkatakunci'];
$tahun=$_POST['tahun'];
                                       if ($cmb_cari=='bc11')
                                        {
                                           
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bcf15.bc11no LIKE '$katakunci' and bcf15.bc11pos LIKE '%$subkatakunci%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bcf15.bc11no LIKE '$katakunci' AND bcf15.bc11pos LIKE '%$subkatakunci%'";
                                           }
                                        }
                                        elseif($cmb_cari=='cont')
                                        {
                                           
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "bcfcontainer.nocontainer LIKE '%$katakunci%'";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND bcfcontainer.nocontainer LIKE '%$katakunci%'";
                                           }
                                        }
                                        elseif($cmb_cari=='bebas')
                                        {
                                           
                                           if (empty($bagianWhere))
                                           {
                                                $bagianWhere .= "(
                                               (saranapengangkut LIKE '%$pencarianbebas%')
                                               or (saranapengangkut LIKE '%$pencarianbebas%') 
                                               or (voy LIKE '%$pencarianbebas%')
                                               or (amountbrg LIKE '%$pencarianbebas%')
                                               or (satuanbrg LIKE '%$pencarianbebas%')
                                               or (diskripsibrg LIKE '%$pencarianbebas%')
                                               or (consigneeadrress LIKE '%$pencarianbebas%')
                                               or (consigneekota LIKE '%$pencarianbebas%')
                                               or (notifyadrress LIKE '%$pencarianbebas%')
                                               or (notifykota LIKE '%$pencarianbebas%')
                                               or (nm_tpp LIKE '%$pencarianbebas%')
                                               or (idtps LIKE '%$pencarianbebas%')
                                               or (keterangan LIKE '%$pencarianbebas%')
                                               or (DokumenNo LIKE '%$pencarianbebas%')
                                               or (Dokumen2No LIKE '%$pencarianbebas%')
                                               or (BatalTarikKet LIKE '%$pencarianbebas%')
                                               or (SuratBatalNo LIKE '%$pencarianbebas%')
                                               or (Pemohon LIKE '%$pencarianbebas%')
                                               or (AlamatPemohon LIKE '%$pencarianbebas%')
                                               or (jawabanp2Ket LIKE '%$pencarianbebas%')
                                               or (tonage_groos LIKE '%$pencarianbebas%')
                                               or (tonage_netto LIKE '%$pencarianbebas%')
                                               or (KetBA_Penarikan LIKE '%$pencarianbebas%')
                                               or (tundalelang LIKE '%$pencarianbebas%')
                                               
                                               )";
                                           }
                                           else
                                           {
                                                $bagianWhere .= " AND (
                                               (saranapengangkut LIKE '%$pencarianbebas%')
                                               or (saranapengangkut LIKE '%$pencarianbebas%') 
                                               or (voy LIKE '%$pencarianbebas%')
                                               or (amountbrg LIKE '%$pencarianbebas%')
                                               or (satuanbrg LIKE '%$pencarianbebas%')
                                               or (diskripsibrg LIKE '%$pencarianbebas%')
                                               or (consigneeadrress LIKE '%$pencarianbebas%')
                                               or (consigneekota LIKE '%$pencarianbebas%')
                                               or (notifyadrress LIKE '%$pencarianbebas%')
                                               or (notifykota LIKE '%$pencarianbebas%')
                                               or (nm_tpp LIKE '%$pencarianbebas%')
                                               or (idtps LIKE '%$pencarianbebas%')
                                               or (keterangan LIKE '%$pencarianbebas%')
                                               or (DokumenNo LIKE '%$pencarianbebas%')
                                               or (Dokumen2No LIKE '%$pencarianbebas%')
                                               or (BatalTarikKet LIKE '%$pencarianbebas%')
                                               or (SuratBatalNo LIKE '%$pencarianbebas%')
                                               or (Pemohon LIKE '%$pencarianbebas%')
                                               or (AlamatPemohon LIKE '%$pencarianbebas%')
                                               or (jawabanp2Ket LIKE '%$pencarianbebas%')
                                               or (tonage_groos LIKE '%$pencarianbebas%')
                                               or (tonage_netto LIKE '%$pencarianbebas%')
                                               or (KetBA_Penarikan LIKE '%$pencarianbebas%')
                                               or (tundalelang LIKE '%$pencarianbebas%')
                                               
                                               )";
                                           }
                                        }
                                        if(!empty($tahun)){
                                            $bagianWhere.="and date_format(bc11tgl,'%Y') LIKE $tahun";
                                        }


if(isset($_POST['cari'])){
                                       
                $sql = "SELECT bcf15.bcf15no,bcf15tgl,bcf15.idbcf15,nocontainer FROM bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and ".$bagianWhere."  group by bcf15.bcf15no ";
                $query = mysql_query($sql);
                
                $cek=mysql_numrows($query);
                 if($cek>0){
                     echo "<h3>Hasil Pencarian</h3>";
                    echo "<table class='table'>";
                    echo "<tr>
                            <th>No BCF 1.5</th>
                            <th>Tgl BCF 1.5</th>
                            <th>No Container</th>
                          </tr>
                            ";
                    while($data = mysql_fetch_array($query)){
                    echo "
                        <tr>
                            <td>$data[bcf15no]</td>
                            <td>$data[bcf15tgl]</td>
                            <td>$data[nocontainer]</td>
                        </tr>
                        ";
                    //<td><a href=layanan_mandiri.php?pilih=layananmandirihasil&id=$data[idbcf15]>Cek</a></td>
                    }
                   echo "</table >";
                   
                   
                
                 }
                 else
                {
                     echo "<br/>
                         <div class='text-error lead'>
                         <strong>Data Tidak Ditemukan</strong>
                         <p>Pastikan data yang Anda masukkan benar dan sesuai seperti:
                            <ol >
                                <li >Nomor BCF 1.5 harus 6 Digit Contoh : 001234</li>
                                <li >Nomor Container</li>
                                <li >Tahun BCF 1.5 merupakan tahun penetapan atas BCF 1.5 tersebut</li>
                            </ol>
                            <span>Masih kesulitan untuk mencari?? <strong>TANYAKAN KE PETUGAS KAMI</strong></span>
                                <blockquote class='pull-right'>
                                Kami Siap Membantu Anda
                                <small>FRONT OFFICE<cite title='Source Title'> Seksi Tempat Penimbunan</cite></small>
                                </blockquote>
                            
                         </p>
                         
                         </div>";
                            
                }
    
}
                        
                        
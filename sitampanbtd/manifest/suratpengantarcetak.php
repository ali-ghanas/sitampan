<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>report BCF 15</title>
    </head>
    <body>
        <?php
       include '/lib/function.php';
       $tahunkini=date('Y');
	$id = $_GET['id']; // menangkap id
        $tahun=$_GET['tahun'];
        $tglkini=date('Y-m-d');
        
	$sql = "SELECT * FROM bcf15,tpp,manifest where bcf15.idmanifest=manifest.idmanifest and bcf15.idtpp=tpp.idtpp and suratpengantarno=$id and tahun=$tahun "; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
       
       
        
        
        ?>
        <script type="text/javascript">
                    var s5_taf_parent = window.location;
                    function popup_print() {
                    window.open('report/suratpengantar.php?id=<?php echo  $bcf15['suratpengantarno']; ?>&tahun=<?php echo  $bcf15['tahun']; ?>','page','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=1,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
                    }
        </script>
                     <input type="button" class="button putih bigrounded " value="Print dan Preview" target="_blank" onClick="popup_print()"/>
       
                           <table width="100%" border="0">
                                <tr>
                                    <td colspan="5" height="5"><?php include 'report/headersurat_pre.html'; ?></td>

                                </tr>
                                <tr>
                                    <td align="left">YTH. KEPALA SEKSI PELAYANAN KEPABEANAN DAN CUKAI</td><td align="right"><?php echo tglindo($tglkini)?></td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="center"><font size="3">SURAT PENGANTAR</font></td>
                                </tr>
                                <tr>
                                  <td colspan="5" align="center"><font size="3">Nomor :SP-<?php echo $bcf15['suratpengantarno']?><?php echo $bcf15['kd_manifest']?><?php echo $bcf15['tahun']?></font></td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <table border="1" width="100%">
                                            <tr>
                                                <td align="center">No Urut                                               
                                                </td>
                                                <td align="center">No Surat</td>
                                                <td align="center">Jumlah</td>
                                                <td align="center">Keterangan</td>
                                            </tr>
                                            <tr >
                                                <td width="10" height="200" align="center" valign="top">1</td>
                                                <td valign="top">
                                            <?php
                                                $columns = 7; //tentukan banyaknya kolom yang diinginkan


                                                $query = "SELECT * FROM bcf15 where  suratpengantarno='$id' and tahun='$tahun' order by bcf15no asc";
                                                $result = mysql_query($query);
                                                echo "<font face=arial size=3pt>Dokumen daftar barang-barang yang dinyatakan tidak dikuasai nomor :</font>";
                                                $num_rows = mysql_num_rows($result);
                                                echo "<table border=\"0\" >\n";
                                                
                                                for($i = 0; $i < $num_rows; $i++) {
                                                $row = mysql_fetch_array($result);
                                                if($i % $columns == 0) {

                                                echo "<TR>\n";
                                                }
                                                echo "<TD align=center>" . "<font face=arial size=3pt>$row[bcf15no]</font>".",".  "</TD>\n";
                                                    if(($i % $columns) == ($columns - 1) || ($i + 1) == $num_rows) {

                                                    echo "</TR>\n";
                                                    }
                                                }
                                                echo "</table>";
                                                echo "<font face=arial size=3pt>$bcf15[kd_manifest]</font>";
                                                echo "<font face=arial size=3pt>$bcf15[tahun]</font>";
                                                
                                                ?>   Tanggal : <?php echo tglindo($bcf15['bcf15tgl'])?> </td>
                                                <td valign="top" align="center" width="20%"> <?php
                                                


                                                $query1 = "SELECT count(*) as jumlah FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and suratpengantarno=$id and tahun=$tahun";
                                                $query = mysql_query($query1);
                                                $data=  mysql_fetch_array($query);
                                                $jumlah=$data['jumlah'];
                                                echo   $jumlah;
                                                echo "<br>";
                                                echo ' (';
                                                echo rp_satuan($jumlah);
                                                echo ') Lembar';
                                                ?>   </td> 
                                                <td valign="top" width="30%">Disampaikan dengan hormat kepada Saudara untuk penyelesaian lebih lanjut sesuai dengan peraturan Menteri Keuangan Nomor : 62/PMK.04/2011 tanggal 30 Maret 2011</td>
                                            </tr>
                                        </table>
                                        <table border="0" width="100%" >
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr>
                                                <td width="60%"></td>
                                                <td align="left"><?php
                                                        $sql = "SELECT * FROM seksi ORDER BY idseksi";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                            while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idseksi]==$bcf15['idseksi']) {
                                                                   echo $data['plh'];
                                                                    }
                                                                   
                                                                }
                                                    ?> </td>
                                                <td>Kepala Seksi Administrasi Manifest</td>
                                                
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td height="60"></td>
                                            </tr>
                                            <tr>
                                                <td width="60%"></td><td></td>
                                                <td align="left">
                                                    <?php
                                                        $sql = "SELECT * FROM seksi ORDER BY idseksi";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                            while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idseksi]==$bcf15['idseksi']) {
                                                                   echo $data['nm_seksi'];
                                                                    }
                                                                   
                                                                }
                                                    ?>
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td width="60%"></td><td></td>
                                                <td align="left">
                                                    <?php
                                                        $sql = "SELECT * FROM seksi ORDER BY idseksi";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                            while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idseksi]==$bcf15['idseksi']) {
                                                                    echo "NIP "; 
                                                                    echo $data['nip'];
                                                                    }
                                                                   
                                                                }
                                                    ?>
                                                </td>
                                                
                                            </tr>
                                            
                                            
                                        </table>
                                        <table id="groupmodul1">
                                            <tr>
                                                <td>Diterima Tanggal </td><td>:</td><td>...................</td>
                                            </tr>
                                            <tr>
                                                <td>Penerima, </td><td></td>
                                            </tr>
                                            <tr>
                                                <td height="40"></td><td></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Nama </td><td>:</td><td>......................</td>
                                            </tr>
                                            <tr>
                                                <td>NIP </td><td>:</td><td>.......................</td>
                                            </tr>
                                        </table>
                                        <table id="groupmodul1">
                                            <tr>
                                                <td>Catatan :</td>
                                            </tr>
                                            <td colspan="2"> Harap setelah tanda terima diisi lembar ke-2 dikirim kembali kepada kami</td>
                                            
                                        </table>
                                    </td>
                                </tr>
                                
                            </table>
                            
       
       
        
    </body>
</html>

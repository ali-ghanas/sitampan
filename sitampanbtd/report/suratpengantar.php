<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>report BCF 15</title>
        <link rel="stylesheet" type="text/css" href="../themes/printer.css" />
        
    </head>
    <body>
        <?php
       include '../lib/function.php';
       include '../lib/koneksi.php';
       error_reporting(0);
       $tahunkini=date('Y');
	$id = $_GET['id']; // menangkap id
        $tahun=$_GET['tahun'];
        $tglkini=date('Y-m-d');
        
	$sql = "SELECT * FROM bcf15,seksi,manifest where bcf15.idmanifest=manifest.idmanifest and bcf15.idseksi=seksi.idseksi and suratpengantarno=$id and tahun=$tahun "; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
       
       
        
        
        ?>
        
                           <table width="100%" border="0" >
                                <tr>
                                    <td colspan="5" height="5" id="tablestd"><?php include '../report/headersurat.html'; ?></td>

                                </tr>
                                <tr>
                                    <td align="left"><font face="arial" size="3pt">Yth. Kepala Seksi Tempat Penimbunan</font></td><td align="right"><font face="arial" size="3pt"><?php echo tglindo($tglkini)?></font></td>
                                </tr>
                                <tr>
                                    <td colspan="5" height="50" ></td>

                                </tr>
                                
                                <tr>
                                    <td colspan="5" align="center"><font face="arial" size="3pt">SURAT PENGANTAR</font></td>
                                </tr>
                                <tr>
                                  <td colspan="5" align="center"><font face="arial" size="3pt">Nomor :SP-<?php echo $bcf15['suratpengantarno']?><?php echo $bcf15['kd_manifest']?><?php echo $bcf15['tahun']?></font></td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <table border="1" width="100%" cellpadding="2" cellspacing="2">
                                            <tr>
                                                <td align="center"><font face="arial" size="3pt">No Urut</font>                                               
                                                </td>
                                                <td align="center"><font face="arial" size="3pt">No Surat</font>  </td>
                                                <td align="center"><font face="arial" size="3pt">Jumlah</font>  </td>
                                                <td align="center"><font face="arial" size="3pt">Keterangan</font>  </td>
                                            </tr>
                                            <tr >
                                                <td width="10" height="200" align="center" valign="top"><font face="arial" size="3pt">1</font></td>
                                                <td valign="top">
                                            <?php
                                                $columns = 5; //tentukan banyaknya kolom yang diinginkan


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
                                                echo "<TD align=center>" . "<font face=arial size=3pt>$row[bcf15no]</font>".",". "</TD>\n";
                                                    if(($i % $columns) == ($columns - 1) || ($i + 1) == $num_rows) {

                                                    echo "</TR>\n";
                                                    }
                                                }
                                                echo "</table>";
                                                echo "<font face=arial size=3pt>$bcf15[kd_manifest]</font>";
                                                echo "<font face=arial size=3pt>$bcf15[tahun]</font>";
                                                
                                                ?>   <font face="arial" size="3pt">Tanggal :       <?php echo tglindo($bcf15['bcf15tgl'])?> </font></td>
                                                <td valign="top" align="center" width="20%"> <?php
                                                


                                                $query1 = "SELECT count(*) as jumlah FROM bcf15,tpp where bcf15.idtpp=tpp.idtpp and suratpengantarno=$id and tahun=$tahun";
                                                $query = mysql_query($query1);
                                                $data=  mysql_fetch_array($query);
                                                $jumlah=$data['jumlah'];
                                                echo   "<font face=arial size=3pt>$jumlah</font>";
                                                echo "<br>";
                                                echo ' (';
                                                echo rp_satuan($jumlah);
                                                echo ') Lembar';
                                                ?>   </td> 
                                                <td valign="top" width="30%"><font face="arial" size="3pt">Disampaikan dengan hormat kepada Saudara untuk penyelesaian lebih lanjut sesuai dengan peraturan Menteri Keuangan Nomor : 62/PMK.04/2011 tanggal 30 Maret 2011</font></td>
                                            </tr>
                                        </table>
                                        <table border="0" width="100%" >
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr>
                                                <td width="60%"></td>
                                                <td align="left"><font face="arial" size="3pt"><?php echo $bcf15['plh'];?></font></td><td><font face="arial" size="3pt">Kepala Seksi Administrasi Manifest</font></td>
                                                   
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td height="60"></td>
                                            </tr>
                                            <tr>
                                                <td width="60%"></td><td></td>
                                                <td align="left"><font face="arial" size="3pt">
                                                    <?php
                                                       echo $bcf15['nm_seksi'];
                                                    ?>
                                                    </font></td>
                                                
                                            </tr>
                                            <tr>
                                                <td width="60%"></td><td></td>
                                                <td align="left"><font face="arial" size="3pt">
                                                    <?php
                                                       echo "NIP $bcf15[nip]";
                                                    ?>
                                                    </font></td>
                                                
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

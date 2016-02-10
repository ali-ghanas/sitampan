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
    <title>SITAMPAN-STATUS AKHIR</title>
    
    
    </head>
    <body>
        
            <?php
            include 'lib/function.php';
                $id = $_GET['id']; // menangkap id
                $sql = "SELECT * FROM bcf15,tpp,typecode WHERE  bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $data = mysql_fetch_array($query);
                $now=date('Y-m-d');

                ?>
        <div>
            <table width="100%" border="0">
                <tr>
                    <td colspan="2">Detail Pencarian</td>
                </tr>
                <tr>
                    <td colspan="2"><a href="?hal=detailstatusakhirman&id=<?php echo $data[idbcf15]; ?>">Detail BCF15</a> | <a href="?hal=detailstatusakhir_tarik&id=<?php echo $data[idbcf15]; ?>">Penarikan BCF 1.5</a> | <a href="?hal=detailstatusakhir_bc11&id=<?php echo $data[idbcf15]; ?>">Pembukaan Pos BC 1.1</a> | <a href="?hal=detailstatusakhir_btlbcf15&id=<?php echo $data[idbcf15]; ?>">Pembatalan BCF 1.5</a> | <a>Status Akhir</a> | <a>Catatan Petugas</a> | <a>History By User</a></td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table>
                            <tr >
                                <td class="isitabel">
                                    Nomor BCF 1.5
                                </td>
                                <td class="isitabel">:</td>
                                <td class="isitabel">
                                    <?php echo $data['bcf15no']; ?>  
                                </td>
                                <td class="isitabel">
                                    <?php echo $data['bcf15tgl']; ?>
                                </td>
                            </tr>
                            <tr >
                                <td class="isitabel">
                                    Nomor BC 1.1
                                </td>
                                <td class="isitabel">:</td>
                                <td class="isitabel">
                                    <?php echo $data['bc11no']; ?> 
                                </td>
                                <td class="isitabel">
                                    <?php echo $data['bc11tgl']; ?>
                                </td>
                                <td class="isitabel">
                                    Pos <?php echo $data['bc11pos']; ?> Subpos <?php echo $data['bc11subpos']; ?>
                                </td>
                            </tr>
                             <?php 
                            $sql = "SELECT * FROM statusakhir WHERE  idstatusakhir=$data[idstatusakhir]"; // memanggil data dengan id yang ditangkap tadi
                            $query = mysql_query($sql);
                            $datastatus = mysql_fetch_array($query);
                            
                            ?>
                            <tr >
                                <td class="isitabel">
                                    Status Akhir
                                </td>
                                <td class="isitabel">:</td>
                                <td class="isitabel" colspan="3">
                                    <?php if($data[idstatusakhir]=='') {echo "BCF 1.5";}else{ echo $datastatus['statusakhirname'];} ?>  
                                </td>
                                
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr valign="top" class="isiform">
                    <td width="50%" class="isiform">
                        <table id="tablemodul" >
                            <tr>
                                <td colspan="4">Pembukaan Pos BC 1.1</td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                   No Surat Permohonan Pembukaan Pos
                                </td>
                                <td >:</td>
                                <td >
                                      
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr >
                                <td class="judultabel">
                                   Tanggal Pembukaan Pos BC 1.1
                                </td>
                                <td >:</td>
                                <td >
                                    
                                </td>
                                
                            </tr>
                            <tr >
                                <td class="judultabel">
                                   Nota Dinas Pembukaan Pos Ke Manifest
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['nobukaposbc11ceisa']; ?> / <?php echo $data['tglbukaposbc11ceisa']; ?>
                                </td>
                                
                            </tr>
                            <tr >
                                <td class="judultabel">
                                   Jawaban Buka Pos Manifest
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['jawaban_bukaposbc11no']; ?> / <?php echo $data['jawaban_bukaposbc11tgl']; ?>
                                </td>
                                
                            </tr>
                            
                            
                        </table>
                    </td>
                    <td width="50%" class="isiform">
                        <table id="tablemodul" >
                            <tr>
                                <td colspan="4">Penarikan Ke TPP</td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Berita Acara Penarikan
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['bamasukno']; ?> / <?php echo $data['bamasukdate']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Tanggal Input
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['bamasukdatetrx']; ?> 
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">Permohonan Pemberitahuan Batal Tarik</td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Nomor Surat
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['BatalTarikNo']; ?> / <?php echo $data['BatalTarikNo2']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Tanggal 
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['BatalTarikDate']; ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Keterangan Penarikan 
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['KetBA_Penarikan']; ?> 
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">Pembukaan Segel</td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Nomor ND Buka Segel
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['ndsegelno']; ?> / <?php echo $data['ndsegeldate']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="judultabel">
                                   Penindakan 
                                </td>
                                <td >:</td>
                                <td >
                                    <?php echo $data['idp2']; ?> 
                                </td>
                            </tr>
                            
                            
                        </table>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                </tr>
                
            </table>
        </div>
        

</body>
</html>
<?php
};
?>
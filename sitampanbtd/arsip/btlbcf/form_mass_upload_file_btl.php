<?php
$jumlah = $_POST['jumlahtampilkan']; // menangkap id
// sql untuk mencari cut off data terakhir yang telah di scan

if(!empty($_POST['tahunarsipbatal'])){
$tahun=$_POST['tahunarsipbatal'];
}else{
$tahun = date('Y');
}
//query untuk mencari nomor pembatalan terakhir  pada tahun berjalan
$sql1 = "SELECT * from arsip_btl_detail where tahun_btl=" . $tahun . " order by idarsip_btl_detail desc ,tahun_btl desc";
$query = mysql_query($sql1) or die('error sql1');
$result = mysql_fetch_array($query);

$nobtlterakhir = $result['nobtl'];
$tahunbtl = $result['tahun_btl'];
$tglbtl = $result['tglbtl'];


$sql2 = "select *,(date_format(setujubataldate,'%Y')) as tahun_btl from bcf15 where (date_format(setujubataldate,'%Y'))='" . $tahunbtl . "' and setujubatalno > '" . $nobtlterakhir . "' and setujubataldate >='" . $tglbtl . "' order by setujubataldate asc, setujubatalno asc limit " . $jumlah; // memanggil data dengan id yang ditangkap tadi
$query2 = mysql_query($sql2) or die('error sql2');
?>
<h2>Upload File</h2>
Ukuran File Maximal: 10mb.
<br>
<br>
<form name="form" enctype="multipart/form-data" action="arsip/btlbcf/mass_arsip_btluploadscanspproses.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
    <input type="hidden" name="jumlah" value="<?php echo $jumlah;?>" />

    <?php
    $i = 1;
    while ($bcf15 = mysql_fetch_array($query2)) {
        
        ?>
        <input name="idbcf15ke<?php echo $i; ?>" type="hidden" value="<?php echo $bcf15['idbcf15'] ?>" />
        Pilih File: <input name="fileke<?php echo $i; ?>" type="file" style="cursor:pointer;" />
        <br>
        <table>
            <tr>
                <td>BCF 15</td>
                <td>
                    <?php echo $bcf15['bcf15no'] ?> tanggal  <?php echo $bcf15['bcf15tgl'] ?> 
                </td>
            </tr>
            <tr>
                <td>No Persetujuan Pembatalan</td>
                <td>
                    <?php echo $bcf15['SetujuBatalNo'] ?> tanggal <?php echo $bcf15['SetujuBatalDate'] ?>
                </td>
            </tr>
            <tr>
                <td>Hasil Upload PDF</td>
                <td>
                    <?php
                    $id = $_GET['id']; // menangkap id
                    $query = "SELECT * FROM arsip_btl_detail where idbcf15='$id'";
                    $hasil = mysql_query($query);

                    while ($data = mysql_fetch_array($hasil)) {
                        echo "<p><a >" . $data['name'] . "</a> (" . $data['size'] . " bytes) [ <a href='arsip/btlbcf/btl_delete.php?id=" . $data['idarsip_btl_detail'] . "'>Delete</a> ]</p>";
                    }
                    ?>
                </td>
            </tr>            
        </table>
        <br>
        <br>
        <?php
        $i++;
    }
    ?>
    <input type="submit" name="submit" value="Mass Upload" />
</form>
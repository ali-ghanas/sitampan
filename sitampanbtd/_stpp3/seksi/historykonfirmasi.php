<?php

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
    </head>
    <body>
        <?php

include '../../lib/koneksi.php';
include '../../lib/function.php';
error_reporting();

        $id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM bcf15, historykonfirmasi WHERE bcf15.idbcf15=historykonfirmasi.idbcf15 and bcf15.idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
?>
<form method="post" id="validasiedit" name="validasiedit" action="?hal=validasi">
        <input type="hidden" name="id" value="<?php echo  $data['idbcf15']; ?>" />
        <input type="hidden" name="thn" value="<?php echo  $data['tahun']; ?>" />
        <input type="hidden" name="bcf15no" value="<?php echo  $data['bcf15no']; ?>" />
        <table border="0" width="100%" cellpadding="3" cellspacing="3">
     
                <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>History Konfirmasi BCF 1.5</b> </td>
                </tr>
                <tr>
                    <td>Nomor BCF 1.5</td><td>:</td>
                    <td > <?php echo  $data['bcf15no']; ?>  </td>
                   
                </tr>
                <tr>
                    <td>Tanggal BCF 1.5</td><td>:</td>
                    <td > <?php echo  tglindo($data['bcf15tgl']); ?> </td>
                   
                </tr>
                <tr>
                    <td>Seksi Penindakan</td><td>:</td>
                    <td > <?php echo  $data['ndkonfirmasito']; ?> </td>
                   
                </tr>
                <tr>
                    <td>No Nota Dinas Konfirmasi</td><td>:</td>
                    <td > <?php echo  $data['ndkonfirmasino']; ?> </td>
                   
                </tr>
                <tr>
                    <td>Tanggal ND</td><td>:</td>
                    <td > <?php echo  $data['ndkonfirmasidate']; ?> </td>
                   
                </tr>
                <tr>
                    <td>Staf Input ND</td><td>:</td>
                    <td > <?php echo  $data['namauserinputnd']; ?> / <?php echo  $data['nipuserinputnd']; ?> </td>
                   
                </tr>
                <tr>
                    <td>Tanggal Input</td><td>:</td>
                    <td > <?php echo  $data['tanggalinput']; ?>  </td>
                   
                </tr>
                <tr>
                    <td>Validasi</td><td>:</td>
                    <td > <?php echo  $data['validasiseksi']; ?>  </td>
                   
                </tr>
                <tr>
                    <td>Seksi Tempat Penimbunan</td><td>:</td>
                    <td > <?php echo  $data['namaseksivalidasi']; ?> / <?php echo  $data['nipseksivalidasi']; ?> </td>
                   
                </tr>
                <tr>
                    <td>Tanggal di Validasi</td><td>:</td>
                    <td > <?php echo  $data['tanggalvalidasiseksi']; ?>  </td>
                   
                </tr>
                <tr>
                    <td>Jawaban P2</td><td>:</td>
                    <td > <?php echo  $data['jawabanp2']; ?>  </td>
                   
                </tr>
                <tr>
                    <td>Nama Staf P2</td><td>:</td>
                    <td > <?php echo  $data['namauserp2']; ?> / <?php echo  $data['nipuserp2']; ?>  </td>
                   
                </tr>
                <tr>
                    <td>Tanggal Jawab</td><td>:</td>
                    <td > <?php echo  $data['tgljawabp2']; ?>  </td>
                   
                </tr>
                
                
            </table>
        
        </form>
    </body>
</html>
        <?php
};
?>
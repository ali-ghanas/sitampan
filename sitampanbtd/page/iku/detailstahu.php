<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
    header('location:index.php');
    echo 'Admin : Mohon Login dulu.';
} else {

    //proses pencarian
    session_start();

    if (isset($_REQUEST['tgl_awal']) && isset($_REQUEST['tgl_akhir']) && $_REQUEST['pilih'] == "Stahu") {
        echo '<div class="col-md-11">';
        echo '<p class="bg-primary">Menampilkan data dari tanggal  <strong>' . $_REQUEST['tgl_awal'] . '</strong>  sampai  <strong>' . $_REQUEST['tgl_akhir'] . '</strong></p>';
        echo '</div>';

        //menampilkan TPP yang ada
        $sql1 = "SELECT * FROM tpp";
        $datatpp = mysql_query($sql1) or die('error sql1');
        ?>

	<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

        <section class="content">
            <div class="col-md-12">

                <!--        hasil laporan detail-->
                <div class="col-md-12">
                    <div>
                        <table class="table table-responsive table-striped">
                            <thead>
                            <th colspan="4">
                            <h4 class="center"><strong>IKU Surat Pemberitahuan</strong></h4>
                            </th>
                            </thead>
                            <tbody>
                            <td>
                                <strong>TPP</strong>
                            </td>
                            <td>
                                <strong>Jumlah</strong>
                            </td>
                            <td align="center">
                                <strong>Action</strong>
                            </td>
                            <?php
                            while ($tpp = mysql_fetch_array($datatpp)) {
                                $idtpp = $tpp['idtpp'];
                                //menampilkan ba penarikan per tpp
                                $sql2 = "select bcf15no,bcf15tgl,suratno,suratdate FROM bcf15 where  idtpp='" . $idtpp . "' and suratdate between  '" . $_REQUEST['tgl_awal'] . "' and '" . $_REQUEST['tgl_akhir'] . "' and pemberitahuan='1'  order by bcf15tgl asc ";
                                $pemberitahuan = mysql_query($sql2) or die('error sql2');
                                $pemberitahuantp = mysql_num_rows($pemberitahuan);

                                echo '<form class="form-horizontal" name="form' . $idtpp . '" role="form" action="iku/report/export/lap_detailstahu.php" method="POST" id="detailstahu' . $idtpp . '">';
                                echo '<input type="hidden" name="tgl_awal" value="' . $_REQUEST['tgl_awal'] . '"/>';
                                echo '<input type="hidden" name="tgl_akhir" value="' . $_REQUEST['tgl_akhir'] . '"/>';
                                echo '<tr class="info">';
                                echo '<td>' . $tpp['nm_tpp'] . '</td>';
                                echo '<td>' . $pemberitahuantp . '</td>';
                                echo '<td align="center"><button type="submit" class="btn btn-info btn-sm" name="detailstahu" value="detailstahutpp' . $idtpp . '">Excel</button></td>';
                                echo '</tr>';
                                echo '<form>';

                                $totalpemberitahuan+=$pemberitahuantp;
                            }
                            ?>
                            <tr>
                                <?php
                                echo '<form class="form-horizontal" name="formall" role="form" action="iku/report/export/lap_detailstahu.php" method="POST" id="detailstahu">';
                                echo '<input type="hidden" name="tgl_awal" value="' . $_REQUEST['tgl_awal'] . '">';
                                echo '<input type="hidden" name="tgl_akhir" value="' . $_REQUEST['tgl_akhir'] . '">';
                                ?>
                                <td align="center">
                                    <strong>Total=</strong>
                                </td>
                                <td>
                                    <strong><?php echo $totalpemberitahuan; ?></strong>
                                </td>
                                <td align="center">
                                    <button type="submit" class="btn btn-info btn-sm" name="detailstahu" value="detailstahutppall">Excel</button>
                                </td>
                                </form>
                            </tr>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <?php
    } else {
        echo '<div class="col-md-11">';
        echo 'Pastikan anda menginput melalui <a href="?hal=iku">formulir</a> dengan benar!';
        echo '</div>';
    }
}
?>
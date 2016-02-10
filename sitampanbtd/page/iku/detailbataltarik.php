<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
    header('location:index.php');
    echo 'Admin : Mohon Login dulu.';
} else {

    //proses pencarian
    session_start();

    if (isset($_REQUEST['tgl_awal']) && isset($_REQUEST['tgl_akhir']) && $_REQUEST['pilih'] == "bataltarik") {
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
                                <h4 class="center"><strong>IKU Batal Tarik</strong></h4>
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
                                <strong>Hilangkan <br>Nomor Ganda?</strong>
                            </td>
                            <td align="center">
                                <strong>Action</strong>
                            </td>
                            <?php
                            $i=0;
                            while ($tpp = mysql_fetch_array($datatpp)) {
                                $idtpp = $tpp['idtpp'];
                                //menampilkan ba penarikan per tpp
                                $sql2 = "select bcf15no,bataltarik,bataltarikno,bataltarikdate from bcf15 where  idtpp='" . $idtpp . "' and bataltarikdate between '" . $_REQUEST['tgl_awal'] . "' and '" . $_REQUEST['tgl_akhir'] . "' and bataltarik='1' group by bataltarikno,bataltarikdate order by bataltarikdate ASC";
                                $sbatal = mysql_query($sql2) or die('error sql2');
                                $sbataltpp = mysql_num_rows($sbatal);

                                echo '<form class="form-horizontal" name="form' . $idtpp . '" role="form" action="iku/report/export/lap_detailbataltarik.php" method="POST" id="detailbataltarik' . $idtpp . '">';
                                echo '<input type="hidden" name="tgl_awal" value="' . $_REQUEST['tgl_awal'] . '"/>';
                                echo '<input type="hidden" name="tgl_akhir" value="' . $_REQUEST['tgl_akhir'] . '"/>';
                                echo '<tr class="info">';
                                echo '<td>' . $tpp['nm_tpp'] . '</td>';
                                echo '<td>' . $sbataltpp . '</td>';
                                if ($i == 0) {
                                    echo '<td rowspan="4" align="center" ><br><br><br>'
                                    . '<input type="checkbox" valign="middle"  name="single" value="group by bataltarikno,bataltarikdate"/>'
                                    . '</td>';
                                }
                                echo '<td align="center"><button type="submit" class="btn btn-info btn-sm" name="detailbataltarik" value="detailbataltariktpp' . $idtpp . '">Excel</button></td>';
                                echo '</tr>';
                                echo '<form>';

                                $totalsbatal+=$sbataltpp;
                                $i++;
                            }
                            ?>
                            <tr>
                                <?php
                                echo '<form class="form-horizontal" name="formall" role="form" action="iku/report/export/lap_detailbataltarik.php" method="POST" id="detailbataltarikall">';
                                echo '<input type="hidden" name="tgl_awal" value="' . $_REQUEST['tgl_awal'] . '">';
                                echo '<input type="hidden" name="tgl_akhir" value="' . $_REQUEST['tgl_akhir'] . '">';
                                ?>
                                <td align="center">
                                    <strong>Total=</strong>
                                </td>
                                <td>
                                    <strong><?php echo $totalsbatal; ?></strong>
                                </td>
                                <td align="center">
                                </td>
                                <td align="center">
                                    <button type="submit" class="btn btn-info btn-sm" name="detailbataltarik" value="detailbataltariktppall">Excel</button>
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
<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
    header('location:index.php');
    echo 'Admin : Mohon Login dulu.';
} else {

    //proses pencarian
    session_start();

    if (isset($_REQUEST['tgl_awal']) && isset($_REQUEST['tgl_akhir']) && $_REQUEST['pilih'] == "Sbatal") {
        echo '<div class="col-md-11">';
        echo '<p class="bg-primary">Menampilkan data dari tanggal  <strong>' . $_REQUEST['tgl_awal'] . '</strong>  sampai  <strong>' . $_REQUEST['tgl_akhir'] . '</strong></p>';
        echo '</div>';

        //menampilkan TPP yang ada
        $sql1 = "SELECT * FROM tpp";
        $datatpp = mysql_query($sql1) or die('error sql1');
        ?>

	<link type="text/css" rel="stylesheet" href="css2/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="css2/bootstrap.min.css" />

        <section class="content">
            <div class="col-md-12">

                <!--        hasil laporan detail-->
                <div class="col-md-12">
                    <div>
                        <table class="table table-responsive table-striped">
                            <thead>
                            <th colspan="4">
                            <h4 class="center"><strong>IKU Persetujuan Pembatalan BCF 1.5</strong></h4>
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
                                $sql2 = "select bcf15no, setujubatalno,setujubataldate,idtpp from sitampan.bcf15 where idtpp='" . $idtpp . "' AND setujubataldate between '" . $_REQUEST['tgl_awal'] . "' and '" . $_REQUEST['tgl_akhir'] . "' and bamasukno is not null order by bcf15tgl asc";
                                $sbatal = mysql_query($sql2) or die('error sql2');
                                $sbataltpp = mysql_num_rows($sbatal);

                                $sql3 = "select bcf15no, setujubatalno,setujubataldate,idtpp from sitampan.bcf15 where idtpp='" . $idtpp . "' AND setujubataldate between '" . $_REQUEST['tgl_awal'] . "' and '" . $_REQUEST['tgl_akhir'] . "' and bamasukno is null order by bcf15tgl asc";
                                $sbataltps=  mysql_query($sql3) or die('error sql3');
                                $sbataltpsall =  mysql_num_rows($sbataltps);

                                echo '<form class="form-horizontal" name="form' . $idtpp . '" role="form" action="iku/report/export/lap_detailsbatal.php" method="POST" id="detailsbatal' . $idtpp . '">';
                                echo '<input type="hidden" name="tgl_awal" value="' . $_REQUEST['tgl_awal'] . '"/>';
                                echo '<input type="hidden" name="tgl_akhir" value="' . $_REQUEST['tgl_akhir'] . '"/>';
                                echo '<tr class="info">';
                                echo '<td>' . $tpp['nm_tpp'] . '</td>';
                                echo '<td>' . $sbataltpp . '</td>';
                                echo '<td align="center"><button type="submit" class="btn btn-info btn-sm" name="detailsbatal" value="detailsbataltpp' . $idtpp . '">Excel</button></td>';
                                echo '</tr>';
                                echo '<form>';

                                $totalsbatal+=$sbataltpp;
                                $totalsbataltps+=$sbataltpsall;
                            }
                            ?>
                            <tr>
                                <td>
                                    Batal di TPS
                                </td>
                                <td>
                                    <?php echo $totalsbataltps;?>
                                </td>
                                <td align="center">
                                    <button type="submit" class="btn btn-info btn-sm" name="detailsbatal" value="detailsbataltpssall">Excel</button>
                                </td>                                    
                            </tr>
                            <tr>
                                <?php
                                echo '<form class="form-horizontal" name="formall" role="form" action="iku/report/export/lap_detailsbatal.php" method="POST" id="detailsbatal">';
                                echo '<input type="hidden" name="tgl_awal" value="' . $_REQUEST['tgl_awal'] . '">';
                                echo '<input type="hidden" name="tgl_akhir" value="' . $_REQUEST['tgl_akhir'] . '">';
                                ?>
                                <td align="center">
                                    <strong>Total=</strong>
                                </td>
                                <td>
                                    <strong><?php echo $totalsbatal+$totalsbataltps; ?></strong>
                                </td>
                                <td align="center">
                                    <button type="submit" class="btn btn-info btn-sm" name="detailsbatal" value="detailsbataltppall">Excel</button>
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
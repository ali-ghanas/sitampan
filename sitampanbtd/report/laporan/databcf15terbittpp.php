<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
    header('location:index.php');
    echo 'Admin : Mohon Login dulu.';
} else {

    //proses pencarian
    session_start();

    if (isset($_GET['hal']) || isset($_POST['bulan'])) {
        echo '<div class="col-md-11">';
        echo '<p class="bg-primary">Menampilkan Data Laporan BCF 1.5 Tahun  <strong>' . $_POST['tahun'] . '</strong></p>';
        echo '</div>';

        //proses dimulai

        if (isset($_POST['bulan'])) {
            $idtpp = substr($_POST['cari'], 21, 1);

            $tahun = $_POST['tahun'];
            $bulan = $_POST['bulan'];
            $reqbulan = "and DATE_FORMAT(bcf15tgl,'%M')='" . $bulan . "'";
        } else {
            $idtpp = $_GET['tpp'];

            $tahun = $_GET['tahun'];

            $bulan = '-';
        }



        //print_r($_POST);exit();
        //Data Jumlah Total BCF 1.5 Terbit ke tpp bersangkutan
        //sql untuk memanggil nama tpp
        $sql2 = "select nm_tpp from tpp where idtpp=" . $idtpp;
        $query = mysql_query($sql2) or die('error sql2');
        $nmtpp = mysql_fetch_row($query);


        //sql menghitung jumlah type code
        $sql10 = "select * from typecode";
        $query = mysql_query($sql10) or die('error sql10');
        $typecode = mysql_num_rows($query);
    } else {
        echo '<div class="col-md-11">';
        echo '<p class="bg-primary">Pastikan anda mengakses formulir dengan benar!</p>';
        echo '</div>';
    }
    ?>
    
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <section class="content">
        <div class="col-md-12">
            <h3><u>Management BCF 1.5</u></h3>
            <hr>
            <!--        hasil laporan-->
            <div class="content">
                <section class="content">
                    <div class="table-responsive" >
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                            <th align="center" colspan="14" class="col-md-12">
                            <h4><strong>Detail BCF 1.5 TPP <?php echo $nmtpp[0]; ?> Tahun <?php echo $tahun; ?></strong></h4>
                            <h5>Total BCF 1.5 TPP: <strong><u><?php echo ' ' . $jumbcftpp; ?></u></strong></h5>
                            </th>
                            <th align="center" colspan="14" class="col-md-12">
                            <h6><strong>klik nama angka untuk detailnya</strong></h6>
                            </th>
                            </thead>
                            <tbody class="table-hover">
                                <tr class="info">
                                    <td align="center" colspan="28" class="col-md-12">
                                        <strong>TPP <?php echo $nmtpp[0]; ?> Tahun: <?php echo $tahun; ?> Bulan: <?php echo $bulan; ?>
                                            <?php ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" rowspan="3" align="center">
                                        Dok
                                    </td>
                                    <td colspan="5" rowspan="1" align="center">
                                        Pemasukan
                                    </td>
                                    <td colspan="6" rowspan="1" align="center">
                                        Pengeluaran
                                    </td>
                                    <td colspan="6" rowspan="1" align="center">
                                        Striping
                                    </td>
                                    <td colspan="7" rowspan="1" align="center">
                                        Pencacahan
                                    </td>
                                    <td colspan="2" rowspan="3" align="center">
                                        Keterangan                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="2" colspan="1" align="center">
                                        Dok
                                    </td>
                                    <td rowspan="1" colspan="3" align="center">
                                        Container
                                    </td>
                                    <td rowspan="2" colspan="1" align="center">
                                        LCL
                                    </td>
                                    <td rowspan="2" colspan="2" align="center">
                                        Jenis Pengeluaran
                                    </td>
                                    <td rowspan="2" colspan="1" align="center">
                                        Dok
                                    </td>
                                    <td rowspan="1" colspan="3" align="center">
                                        Container
                                    </td>
                                    <td rowspan="2" colspan="1" align="center">
                                        LCL
                                    </td>
                                    <td rowspan="2" colspan="1" align="center">
                                        Dok
                                    </td>
                                    <td rowspan="1" colspan="3" align="center">
                                        Container
                                    </td>
                                    <td rowspan="2" colspan="1" align="center">
                                        LCL
                                    </td>
                                    <td rowspan="2" colspan="2" align="center">
                                        Dok
                                    </td>
                                    <td rowspan="2" colspan="1" align="center">
                                        Dok
                                    </td>
                                    <td rowspan="1" colspan="3" align="center">
                                        Container
                                    </td>
                                    <td rowspan="2" colspan="1" align="center">
                                        LCL
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="1" colspan="1" align="center">
                                        20
                                    </td>
                                    <td rowspan="1" colspan="1" align="center">
                                        40
                                    </td>
                                    <td rowspan="1" colspan="1" align="center">
                                        45
                                    </td>
                                    <td rowspan="1" colspan="1" align="center">
                                        20
                                    </td>
                                    <td rowspan="1" colspan="1" align="center">
                                        40
                                    </td>
                                    <td rowspan="1" colspan="1" align="center">
                                        45
                                    </td>
                                    <td rowspan="1" colspan="1" align="center">
                                        20
                                    </td>
                                    <td rowspan="1" colspan="1" align="center">
                                        40
                                    </td>
                                    <td rowspan="1" colspan="1" align="center">
                                        45
                                    </td>
                                    <td rowspan="1" colspan="1" align="center">
                                        20
                                    </td>
                                    <td rowspan="1" colspan="1" align="center">
                                        40
                                    </td>
                                    <td rowspan="1" colspan="1" align="center">
                                        45
                                    </td>
                                </tr>
                                <tr>

                                    <?php
                                    //sql untuk mengetahui jumlah pemasukan berdasarkan bamasuk

                                    $sql1 = "select *, DATE_FORMAT(bcf15tgl,'%M') as 'bulan' from bcf15 where  tahun='" . $tahun . "' and bamasukno is not null " . $reqbulan . "";
                                    $query1 = mysql_query($sql1) or die('error sql1');
                                    $jumbcfmasuktpp = mysql_num_rows($query1);
                                    ?>
                                    <td rowspan="9" colspan="2" align="center">
                                        BCF 1.5
                                    </td>
                                    <td rowspan="9" colspan="1" align="center">
                                        <button type="submit" class="btn btn-primary btn-sm" name="cari" value="carijumbcfmasuktpp">
                                            <?php echo $jumbcfmasuktpp; ?>
                                        </button>
                                    </td>
                                    <?php
                                    //menghitung container 20 yang masuk tpp
                                    $totalcont20masuk = 0;
                                    $totalcont40masuk = 0;
                                    $totalcont45masuk = 0;

                                    $sql4 = "select cont.nocontainer,b.bcf15tgl,b.bcf15no from bcfcontainer as cont INNER JOIN bcf15 as b using(idbcf15) WHERE b.bamasukno is not null  and b.tahun='" . $tahun . "' and b.idtpp=" . $idtpp . "  and cont.idsize='20' " . $reqbulan;
                                    $query = mysql_query($sql4) or die('error sql4');
                                    $jumcont20masuk = mysql_num_rows($query);

                                    $sql5 = "select cont.nocontainer,b.bcf15tgl,b.bcf15no from bcfcontainer as cont INNER JOIN bcf15 as b using(idbcf15) WHERE b.bamasukno is not null  and b.tahun='" . $tahun . "' and b.idtpp=" . $idtpp . "  and cont.idsize='40' " . $reqbulan;
                                    $query = mysql_query($sql5) or die('error sql5');
                                    $jumcont40masuk = mysql_num_rows($query);

                                    $sql6 = "select cont.nocontainer,b.bcf15tgl,b.bcf15no from bcfcontainer as cont INNER JOIN bcf15 as b using(idbcf15) WHERE b.bamasukno is not null  and b.tahun='" . $tahun . "' and b.idtpp=" . $idtpp . "  and cont.idsize='45' " . $reqbulan;
                                    $query = mysql_query($sql6) or die('error sql6');
                                    $jumcont45masuk = mysql_num_rows($query);

                                    $sql7 = "select cont.nocontainer,b.bcf15tgl,b.bcf15no from bcfcontainer as cont INNER JOIN bcf15 as b using(idbcf15) WHERE b.bamasukno is not null  and b.tahun='" . $tahun . "' and b.idtpp=" . $idtpp . "  and b.idtypecode='2' " . $reqbulan;
                                    $query = mysql_query($sql7) or die('error sql7');
                                    $jumlclmasuk = mysql_num_rows($query);
                                    ?>
                                    <td rowspan="9" colspan="1" align="center">
                                        <?php echo $jumcont20masuk; ?>
                                    </td>
                                    <td rowspan="9" colspan="1" align="center">
                                        <?php echo $jumcont40masuk; ?>
                                    </td>
                                    <td rowspan="9" colspan="1" align="center">
                                        <?php echo $jumcont45; ?>
                                    </td>
                                    <td rowspan="9" colspan="1" align="center">
                                        <?php echo $jumlclmasuk; ?>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <?php
}
?>
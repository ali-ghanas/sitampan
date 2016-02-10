<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
    header('location:index.php');
    echo 'Admin : Mohon Login dulu.';
} else {

    //proses pencarian
    session_start();

    if (isset($_POST['cari'])) {
        echo '<div class="col-md-11">';
        echo '<p class="bg-primary">Menampilkan Data Laporan BCF 1.5 Tahun  <strong>' . $_POST['thn_awal'] . '</strong></p>';
        echo '</div>';

        //proses dimulai

        $tahun = $_POST['thn_awal'];

        //Data Jumlah Total BCF 1.5 Terbit
        $sql1 = "select * from bcf15 where tahun ='" . $tahun . "'";
        $query = mysql_query($sql1) or die('error sql1');
        $jumtotbcf = mysql_num_rows($query);

        //jumlah bcf TPS
        $sql2 = "select * from bcf15 where tahun ='" . $tahun . "' and bamasukno is null";
        $query = mysql_query($sql2) or die('error sql2');
        $jumbcftps = mysql_num_rows($query);

        //jumlah bcf TPP
        $sql3 = "select * from bcf15 where tahun ='" . $tahun . "' and bamasukno is not null";
        $query = mysql_query($sql3) or die('error sql3');
        $jumbcftpp = mysql_num_rows($query);

        //jumlah bcf tps ket bataltarik
        $sql4 = "select * from bcf15 where bamasukno is null and setujubatalno is null and bataltarikno is not null and tahun='" . $tahun . "'";
        $query = mysql_query($sql4) or die('error sql4');
        $jumbcftpsbataltarik = mysql_num_rows($query);

        //jumlah bcf tps ket batal bcf
        $sql5 = "select * from bcf15 where bamasukno is null and setujubatalno is not null and tahun='" . $tahun . "'";
        $query = mysql_query($sql5) or die('error sql5');
        $jumbcftpsbatal = mysql_num_rows($query);

        //jumlah Longstay bcf 1.5 tidak diurus
        $sql6 = "select *,datediff(bcf15tgl,bc11tgl) as 'selisihhari' from bcf15 where datediff(bcf15tgl,bc11tgl)>30 and bamasukno is null and setujubatalno is null and bataltarikno is null and tahun='" . $tahun . "'";
        $query = mysql_query($sql6) or die('error sql6');
        $jumbcftpslongstaymurni = mysql_num_rows($query);

        //jumlah Longstay bcf 1.5 tidak diurus
        $sql6a = "select *,datediff(bcf15tgl,bc11tgl) as 'selisihhari' from bcf15 where datediff(bcf15tgl,bc11tgl)>30 and bamasukno is null and setujubatalno is null and tahun='" . $tahun . "'";
        $query = mysql_query($sql6a) or die('error sql6a');
        $jumbcftpslongstay = mysql_num_rows($query);

        //sql jumlah tpp
        $sql7 = "select * from tpp";
        $query = mysql_query($sql7) or die('error sql7');
        $jumtpp = mysql_num_rows($query);

        //sql menghitung jumlah type code
        $sql10 = "select * from typecode";
        $query = mysql_query($sql10) or die('error sql10');
        $typecode = mysql_num_rows($query);
    } else {
        echo '<div class="col-md-11">';
        echo '<p class="bg-primary">Pastikan anda menginput melalui formulir dengan benar!</p>';
        echo '</div>';
    }
    ?>

    <section class="content">
        <div class="col-md-12">
            <h3><u>Management BCF 1.5</u></h3>
            <hr>
            <!--        hasil laporan-->
            <div class="content">
                <section class="content">
                    <div class="table-responsive" >
                        <form name="bcf15all" role="form" action="report/export/datareportbcf15all.php" method="POST" >
                            <input type="hidden" name="tahun" value="<?php echo $tahun; ?>"/>
                            <table class="table table-responsive table-striped table-hover">
                                <thead>
                                <th class="col-md-6">
                                <h4><strong>Detail BCF 1.5 Tahun <?php echo $tahun; ?></strong></h4>
                                <h5>Total BCF 1.5 Terbit Tahun <?php echo $tahun; ?>: <strong><u><?php echo ' ' . $jumtotbcf; ?></u></strong></h5>
                                </th>
                                <th class="col-md-6">
                                    <select name="pilihtpp" title="sortir data di bawah ini berdasarkan tpp tujuan" class="col-md-6">
                                        <option value="">All TPP</option>
                                        <?php
                                        $sql8 = "select * from tpp";
                                        $query = mysql_query($sql8) or die('error sql8');
                                        while ($tpp = mysql_fetch_array($query)) {
                                            ?>
                                            <option value="<?php echo $tpp['idtpp']; ?>"><?php echo $tpp['nm_tpp']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <select name="pilihtps" title="sortir data di bawah ini berdasarkan Eks-TPS-nya" class="col-md-6">
                                        <option value="">All TPS</option>
                                        <?php
                                        $sql8 = "select * from tps order by nm_tps asc";
                                        $query = mysql_query($sql8) or die('error sql8');
                                        while ($tps = mysql_fetch_array($query)) {
                                            ?>
                                            <option value="<?php echo $tps['nm_tps']; ?>"><?php echo $tps['nm_tps']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <br>
                                <h6><strong>klik angka untuk detail excel dan klik baris untuk expand</strong></h6>
                                </th>
                                </thead>
                                <tbody class="table-hover">
                                    <tr class="info">
                                        <td>
                                            <strong>Lokasi</strong>
                                        </td>
                                        <td align="center">
                                            <strong>Jumlah</strong>
                                        </td>
                                    </tr>
                                    <tr data-toggle="collapse" data-target="#bcftps">
                                        <td>
                                            TPS
                                        </td>
                                        <td align="center">
                                            <button type="submit" class="btn btn-primary btn-sm" name="cari" value="carijumbcftps"><?php echo $jumbcftps; ?></button>
                                        </td>
                                    </tr>
                                    <tr id="bcftps" class="demo out collapse" data-toggle="collapse">

                                    </tr>
                                    <tr data-toggle="collapse" data-target="#bcftpp">
                                        <td>
                                            TPP
                                        </td>
                                        <td align="center">
                                            <button type="submit" class="btn btn-primary btn-sm" name="cari" value="carijumbcftpp"><?php echo $jumbcftpp; ?></button>
                                        </td>
                                    </tr>
                                    <tr id="bcftpp" class="demo out collapse" data-toggle="collapse">

                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <strong>Grand total =</strong>
                                        </td>
                                        <td align="center">
                                            <button type="submit" class="btn btn-primary btn-sm" name="cari" value="carijumbcfall"><?php echo $jumbcftpp + $jumbcftps; ?></button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </form>
                    </div>
                </section>
                <br>
                <hr>
                <br>
                <section class="content">
                    <div class="table-responsive" >
                        <form name="bcf15tps" role="form" action="report/export/datareportbcf15all.php" method="POST" >
                            <input type="hidden" name="tahun" value="<?php echo $tahun; ?>"/>
                            <table class="table table-responsive table-striped table-hover">
                                <thead>
                                <th class="col-md-6">
                                <h4><strong>Detail BCF 1.5 TPS Tahun <?php echo $tahun; ?></strong></h4>
                                <h5>Total BCF 1.5 TPS: <strong><u><?php echo ' ' . $jumbcftps; ?></u></strong></h5>
                                <h5></h5>
                                </th>
                                <th colspan="<?php echo $typecode; ?>">
                                    <select name="pilihtpp" title="sortir data di bawah ini berdasarkan tpp tujuan" class="col-md-6">
                                        <option value="">All TPP</option>
                                        <?php
                                        $sql8 = "select * from tpp";
                                        $query = mysql_query($sql8) or die('error sql8');
                                        while ($tpp = mysql_fetch_array($query)) {
                                            ?>
                                            <option value="<?php echo $tpp['idtpp']; ?>"><?php echo $tpp['nm_tpp']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <select name="pilihtps" title="sortir data di bawah ini berdasarkan Eks-TPS-nya" class="col-md-6">
                                        <option value="">All TPS</option>
                                        <?php
                                        $sql8 = "select * from tps order by nm_tps asc";
                                        $query = mysql_query($sql8) or die('error sql8');
                                        while ($tps = mysql_fetch_array($query)) {
                                            ?>
                                            <option value="<?php echo $tps['nm_tps']; ?>"><?php echo $tps['nm_tps']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <br>
                                <h6><strong>klik angka untuk detail excel dan klik baris untuk expand</strong></h6>
                                </th>
                                </thead>
                                <tbody class="table-hover">
                                    <tr class="info">
                                        <td colspan="1">
                                            <strong>Lokasi</strong>
                                        </td>
                                        <td align="center" colspan="<?php echo $typecode; ?>">
                                            <strong>Jumlah</strong>
                                        </td>
                                    </tr>
                                    <tr data-toggle="collapse" data-target="#bcftpsbataltarik">
                                        <td colspan="1">
                                            Batal Tarik
                                        </td>
                                        <td align="center" colspan="<?php echo $typecode; ?>">
                                            <button type="submit" class="btn btn-primary btn-sm" name="cari" value="carijumbcftpsbataltarik"><?php echo $jumbcftpsbataltarik; ?></button>
                                        </td>
                                    </tr>

                                    <tr data-toggle="collapse" data-target="#bcftpsbatal">
                                        <td colspan="1">
                                            Batal BCF 1.5
                                        </td>
                                        <td align="center" colspan="<?php echo $typecode; ?>">
                                            <button type="submit" class="btn btn-primary btn-sm" name="cari" value="carijumbcftpsbatal"><?php echo $jumbcftpsbatal; ?></button>
                                        </td>
                                    </tr>
                                    <tr id="bcftpsbatal" class="demo out collapse" data-toggle="collapse" data-target="#bcftpsbataldetail" >
                                        <td align="center" colspan="1">
                                            ->Detail:
                                        </td>
                                        <?php
                                        //sql menampilkan data nama typecode
                                        $sql12 = "select * from typecode";
                                        $query = mysql_query($sql12) or die('error query 12');
                                        while ($nmtypecode = mysql_fetch_array($query)) {
                                            ?>
                                            <td colspan="1">
                                                <?php echo $nmtypecode['nm_type']; ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr id="bcftpsbataldetail" class="demo out collapse">
                                        <td align="center" colspan="1">
                                        </td>
                                        <?php
                                        for ($i = 1; $i < ($typecode + 1); $i++) {

                                            //sql menampilkan jumlah data type longstay
                                            $sql11 = "select * from bcf15 where bamasukno is null and setujubatalno is not null and tahun='" . $tahun . "' and idtypecode='" . $i . "'";
                                            $query = mysql_query($sql11) or die('error sql11');
                                            $jumpertypecode = mysql_num_rows($query)
                                            ?>
                                            <td colspan="1">
                                                <button type="submit" class="btn btn-primary btn-sm" name="cari" value="carijumbcftpsbatal<?php echo $i; ?>"><?php echo $jumpertypecode; ?></button>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr data-toggle="collapse" data-target="#bcflongstaytipemurni" >
                                        <td colspan="1">
                                            Longstay BCF 1.5 Murni
                                        </td>
                                        <td align="center" colspan="<?php echo $typecode; ?>">
                                            <button type="submit" class="btn btn-primary btn-sm" name="cari" value="carijumbcftpslongstay"><?php echo $jumbcftpslongstaymurni; ?></button>

                                        </td>
                                    </tr>
                                    <tr id="bcflongstaytipemurni" class="demo out collapse" data-toggle="collapse" data-target="#bcflongstaydetailtipemurni" >
                                        <td align="center" colspan="1">
                                            ->Detail:
                                        </td>
                                        <?php
                                        //sql menampilkan data nama typecode
                                        $sql12 = "select * from typecode";
                                        $query = mysql_query($sql12) or die('error query 12');
                                        while ($nmtypecode = mysql_fetch_array($query)) {
                                            ?>
                                            <td colspan="1">
                                                <?php echo $nmtypecode['nm_type']; ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr id="bcflongstaydetailtipemurni" class="demo out collapse">
                                        <td align="center" colspan="1">

                                        </td>
                                        <?php
                                        for ($i = 1; $i < ($typecode + 1); $i++) {

                                            //sql menampilkan jumlah data type longstay
                                            $sql11 = "select *,datediff(bcf15tgl,bc11tgl) as 'selisihhari' from bcf15 where datediff(bcf15tgl,bc11tgl)>30 and bamasukno is null and setujubatalno is null and bataltarikno is null and tahun='" . $tahun . "' and idtypecode='" . $i . "'";
                                            $query = mysql_query($sql11) or die('error sql11');
                                            $jumpertypecode = mysql_num_rows($query)
                                            ?>
                                            <td colspan="1">
                                                <button type="submit" class="btn btn-primary btn-sm" name="cari" value="carijumbcftpslongstay<?php echo $i; ?>"><?php echo $jumpertypecode; ?></button>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr data-toggle="collapse" data-target="#bcflongstaytipe" >
                                        <td colspan="1">
                                            Longstay BCF 1.5
                                        </td>
                                        <td align="center" colspan="<?php echo $typecode; ?>">
                                            <button type="submit" class="btn btn-primary btn-sm" name="cari" value="carijumbcftpslongstaykotor"><?php echo $jumbcftpslongstay; ?></button>

                                        </td>
                                    </tr>
                                    <tr id="bcflongstaytipe" class="demo out collapse" data-toggle="collapse" data-target="#bcflongstaydetailtipe" >
                                        <td align="center" colspan="1">
                                            ->Detail:
                                        </td>
                                        <?php
                                        //sql menampilkan data nama typecode
                                        $sql12 = "select * from typecode";
                                        $query = mysql_query($sql12) or die('error query 12');
                                        while ($nmtypecode = mysql_fetch_array($query)) {
                                            ?>
                                            <td colspan="1">
                                                <?php echo $nmtypecode['nm_type']; ?>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr id="bcflongstaydetailtipe" class="demo out collapse">
                                        <td align="center" colspan="1">
                                        </td>
                                        <?php
                                        for ($i = 1; $i < ($typecode + 1); $i++) {

                                            //sql menampilkan jumlah data type longstay
                                            $sql11 = "select *,datediff(bcf15tgl,bc11tgl) as 'selisihhari' from bcf15 where datediff(bcf15tgl,bc11tgl)>30 and bamasukno is null and setujubatalno is null and tahun='" . $tahun . "' and idtypecode='" . $i . "'";
                                            $query = mysql_query($sql11) or die('error sql11');
                                            $jumpertypecode = mysql_num_rows($query)
                                            ?>
                                            <td colspan="1">
                                                <button type="submit" class="btn btn-primary btn-sm" name="cari" value="carijumbcftpslongstaykotor<?php echo $i; ?>"><?php echo $jumpertypecode; ?></button>
                                            </td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <strong>Grand total =</strong>
                                        </td>
                                        <td align="center" colspan="<?php echo $typecode; ?>">
                                            <?php echo $jumbcftpsbataltarik + $jumbcftpsbatal + $jumbcftpslongstaymurni . ' + ' . ($jumbcftps - ($jumbcftpsbataltarik + $jumbcftpsbatal + $jumbcftpslongstaymurni)); ?>
                                            <br>
                                            (jumlah real)+(jumlah dispersi)
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </form>
                    </div>
                </section>
                <br>
                <hr>
                <br>
                <section class="content">
                    <div class="table-responsive" >
                        <table class="table table-responsive table-striped table-hover">
                            <thead>
                            <th align="center" colspan="6" class="col-md-12">
                            <h4><strong>Detail BCF 1.5 TPP Tahun <?php echo $tahun; ?></strong></h4>
                            <h5>Total BCF 1.5 TPP: <strong><u><?php echo ' ' . $jumbcftpp; ?></u></strong></h5>
                            </th>
                            <th align="center" colspan="6" class="col-md-12">
                            <h6><strong>klik nama TPP untuk detail tahun <?php echo $tahun; ?> <br> Klik Cari Per Bulan untuk data Per Bulan</strong></h6>
                            </th>
                            </thead>
                            <tbody class="table-hover">
                                <tr class="info">
                                    <?php
                                    $colspan = $jumtpp * 3;
                                    ?>
                                    <td align="center" colspan="<?php echo $colspan; ?>" class="col-md-12">
                                        <strong>TPP</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                    $sql8 = "select * from tpp";
                                    $query = mysql_query($sql8) or die('error sql8');
                                    $jumbcfpertpp = array();
                                    while ($tpp = mysql_fetch_array($query)) {

                                        $idtpp = $tpp['idtpp'];
                                        //sql jumlah bcf masuk per tpp

                                        $sql9 = "select bcf15no from bcf15 where tahun ='" . $tahun . "' and bamasukno is not null and idtpp='" . $idtpp . "'";
                                        $query2 = mysql_query($sql9) or die('error sql9');
                                        $bcfpertpp = mysql_num_rows($query2);

                                        array_push($jumbcfpertpp, $bcfpertpp);
                                        ?>
                                        <td align="center" class="col-md-3" colspan="3">
                                            <?php
                                            //menampilkan nama tpp
                                            echo '<a href="?hal=databcf15terbittpp&tpp=' . $idtpp . '&tahun=' . $tahun . '"><button type="" class="btn btn-warning btn-sm">' . $tpp['nm_tpp'] . '</button></a>';
                                            ?>
                                        </td>
                                        <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <?php
                                    for ($i = 1; $i < $jumtpp + 1; $i++) {
                                        ?>
                                <form name="bcf15tpp<?php echo $i; ?>" id="<?php echo $i; ?>" role="form" action="?hal=databcf15terbittpp" method="POST" >
                                    <input type="hidden" name="tahun" value="<?php echo $tahun ?>"/>
                                    <td align="center" colspan="3">
                                        <select name="bulan">
                                            <option value="">-- Bulan --</option>
                                            <?php
                                            $bulans = array(1 => 'January', 'February', 'March', 'April', 'May', 'June',
                                                'July', 'August', 'September', 'October', 'November', 'December');

                                            foreach ($bulans as $idbulan => $bulan) {
                                                echo '<option value="' . $bulan . '">' . $bulan . '</option>';
                                            }
                                            ?>

                                        </select>
                                        <hr>
                                        <button type="submit" class="btn btn-info btn-sm" name="cari" value="carijumbcftppperbulan<?php echo $i; ?>">
                                            Cari Per-Bulan
                                        </button>
                                    </td>
                                </form>
                                <?php
                            }
                            ?>
                            </tr>
                            <tr>
                                <td align="center" colspan="12" class="col-md-12">
                                    <strong>Grand total = 
                                        <?php
                                        $jumlahbcftpp = array_sum($jumbcfpertpp);
                                        echo $jumlahbcftpp;
                                        ?>
                                    </strong>
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
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <?php
}
?>
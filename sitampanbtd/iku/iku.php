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
        echo '<p class="bg-primary">Menampilkan data dari tanggal  <strong>' . $_POST['tgl_awal'] . '</strong>  sampai  <strong>' . $_POST['tgl_akhir'] . '</strong></p>';
        echo '</div>';

        //proses dimulai
        //hitung ba penarikan
        $sql1 = "select count(*) from sitampan.bcf15 where bamasukdate between '" . $_POST['tgl_awal'] . "' and '" . $_POST['tgl_akhir'] . "' group by bamasukno, idtpp";
        $query = mysql_query($sql1) or die('error sql1');
        $jumlahbapenarikan = mysql_num_rows($query);


        //hitung jumlah surat perintah
        $sql2 = "select count(*) from sitampan.bcf15 where suratperintahdate between '" . $_POST['tgl_awal'] . "' and '" . $_POST['tgl_akhir'] . "' group by suratperintahno";
        $query = mysql_query($sql2) or die('error sql2');
        $jumlahsprint = mysql_num_rows($query);

        //hitung jumlah pemberitahuan
        $sql3 = "SELECT bcf15no,bcf15tgl,suratno,suratdate FROM bcf15 where  suratdate between  '" . $_POST['tgl_awal'] . "' and '" . $_POST['tgl_akhir'] . "' and pemberitahuan='1'  order by bcf15tgl asc ";
        $query = mysql_query($sql3) or die('error sql3');
        $jumlahpemberitahuan = mysql_num_rows($query);

        //hitung jumlah setujubatal
        $sql4 = "select bcf15no,SetujuBatalDate,setujubatalno from bcf15 where  SetujuBatalDate between '" . $_POST['tgl_awal'] . "' and '" . $_POST['tgl_akhir'] . "'";
        $query = mysql_query($sql4) or die('error sql4');
        $jumlahsetujubatal = mysql_num_rows($query);

        //hitung jumlah bataltarik
        $sql5 = "select bcf15no,bataltarik,bataltarikno,bataltarikdate from bcf15 where  bataltarikdate between '" . $_POST['tgl_awal'] . "' and '" . $_POST['tgl_akhir'] . "'  group by bataltarikno,bataltarikdate order by bataltarikdate ASC";
        $query = mysql_query($sql5) or dier('error sql5');
        $jumlahbataltarik = mysql_num_rows($query);
    } else {
        echo '<div class="col-md-11">';
        echo '<p class="bg-primary">Pastikan anda menginput melalui formulir dengan benar!</p>';
        echo '</div>';
    }
?>
	<link type="text/css" rel="stylesheet" href="css2/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="css2/bootstrap.min.css" />
    <section class="content">
        <div class="col-md-12">
            <h3>&nbsp; Management IKU</h3>
            <br>

            <!--        tempat parameter tanggal-->
            <div class="col-md-4">
                <h5>Masukan Tanggal</h5>
                <div class="col-md-11">
                    <form class="form-horizontal" role="form" action="?hal=iku" method="POST" id="cariiku">
                        <div class="form-group">
                            <input type="text" name="tgl_awal" class="form-control" id="tanggal" placeholder="Tanggal Awal">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="tgl_akhir" id="tanggal2" placeholder="Tanggal Akhir">
                        </div>
                        <button type="submit" class="btn btn-info btn-lg" name="cari" value="cari">Cari</button>
                    </form>
                </div>
            </div>

            <!--        hasil laporan-->
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-responsive table-striped table-hover">
                        <thead>
                        <th>
                            <h4 class="center"><strong>Progress IKU</strong></h4>
                        </th>
                        <th class="right">
                            <h6><strong>klik angka untuk detailnya</strong></h6>
                        </th>
                        </thead>
                        <tbody class="table-hover">
                            <tr class="info">
                                <td>
                                    <strong>Parameter</strong>
                                </td>
                                <td align="center">
                                    <strong>Jumlah</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BA Penarikan
                                </td>
                                <td align="center">
                                    <?php echo '<a href="?hal=detailiku&pilih=BATarik&tgl_awal=' . $_POST['tgl_awal'] . '&tgl_akhir=' . $_POST['tgl_akhir'] . '">' . $jumlahbapenarikan . '</a>'; ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Surat Perintah Penarikan
                                </td>
                                <td align="center">
                                    <?php echo '<a href="?hal=detailiku&pilih=SPrint&tgl_awal=' . $_POST['tgl_awal'] . '&tgl_akhir=' . $_POST['tgl_akhir'] . '">' . $jumlahsprint . '</a>'; ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Surat Pemberitahuan
                                </td>
                                <td align="center">
                                    <?php echo '<a href="?hal=detailiku&pilih=Stahu&tgl_awal=' . $_POST['tgl_awal'] . '&tgl_akhir=' . $_POST['tgl_akhir'] . '">' . $jumlahpemberitahuan . '</a>'; ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Surat Setuju Batal BCF 1.5
                                </td>
                                <td align="center">
                                    <?php echo '<a href="?hal=detailiku&pilih=Sbatal&tgl_awal=' . $_POST['tgl_awal'] . '&tgl_akhir=' . $_POST['tgl_akhir'] . '">' . $jumlahsetujubatal . '</a>'; ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Batal Tarik
                                </td>
                                <td align="center">
                                    <?php echo '<a href="?hal=detailiku&pilih=bataltarik&tgl_awal=' . $_POST['tgl_awal'] . '&tgl_akhir=' . $_POST['tgl_akhir'] . '">' . $jumlahbataltarik . '</a>'; ?>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script> 
    <script type="text/javascript">
        $(document).ready(function() {
            $("#cariiku").submit(function() {
                if ($.trim($("#tanggal").val()) == "") {
                    alert("<?php
                                    session_start();
                                    echo "Maaf $_SESSION[nm_lengkap]..."
                                    ?> Tanggal Awal Kosong, Wajib diisi untuk melanjutkannya");
                    $("#tanggal").focus();
                    return false;
                }
                if ($.trim($("#tanggal2").val()) == "") {
                    alert("<?php
                                    session_start();
                                    echo "Maaf $_SESSION[nm_lengkap]..."
                                    ?>  Tanggal Akhir Kosong, Wajib diisi untuk melanjutkannya");
                    $("#tanggal2").focus();
                    return false;
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#tanggal").datepicker({
                dateformat: "Y-m-d",
                changemonth: true,
                changeyear: true,
                yearrange: "-100:+0"
            });
            $("#tanggal2").datepicker({
                dateformat: "Y-m-d",
                changemonth: true,
                changeyear: true,
                yearrange: "-100:+0"
            });
        });
    </script>
    <?php
}
?>
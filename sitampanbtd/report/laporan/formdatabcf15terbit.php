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
        echo '<p class="bg-primary">Menampilkan data dari Tahun  <strong>' . $_POST['thn_awal'] . '</strong>  sampai  <strong>' . $_POST['thn_akhir'] . '</strong></p>';
        echo '</div>';
    } else {
        echo '<div class="col-md-11">';
        echo '<p class="bg-primary">Pastikan anda menginput melalui formulir dengan benar!</p>';
        echo '</div>';
    }
    ?>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <section class="content">
        <div class="col-md-12">
            <h3>&nbsp; Management BCF 1.5</h3>
            <br>

            <!--        tempat parameter tanggal-->
            <div class="col-md-4">
                <h5>Masukan Tahun</h5>
                <div class="col-md-11">
                    <form class="form-horizontal" role="form" action="?hal=datalap_bcfterbit" method="POST" id="datalap">
                        <div class="form-group">
                            <input type="text" name="thn_awal" class="form-control" id="tahun" placeholder="Tahun Pencarian">
                        </div>
                        <button type="submit" class="btn btn-info btn-lg" name="cari" value="cari">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script> 
    <script type="text/javascript">
        $(document).ready(function() {
            $("#datalap").submit(function() {
                if ($.trim($("#tahun").val()) == "") {
                    alert("<?php
    session_start();
    echo "Maaf $_SESSION[nm_lengkap]..."
    ?> Tahun Awal Kosong, Wajib diisi untuk melanjutkannya");
                    $("#tahun").focus();
                    return false;
                }
            });
        });
    </script>
    <?php
}
?>
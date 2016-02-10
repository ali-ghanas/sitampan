<?php
session_start();
include "lib/koneksi.php";
include "lib/function.php";

if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
    header('location:index.php');
    echo 'Admin : Mohon Login dulu.';
} else {
    ?>
    <html>
        <head>
            <meta charset="utf8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <link rel="stylesheet" type="text/css" media="all" href="css/style.css">
            <link href="css/custom.css" rel="stylesheet" media="screen">
            <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">
            <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
            <link href="css/bootstrap-responsive.css" rel="stylesheet">
            <script src="js/jquery.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <link rel="shortcut icon" href="favicon.jpg" />
            <title>Update User</title>

        </head>
        <body>
            <?php
            // aksi untuk edit

            if (isset($_POST['button'])) { // jika tombol editsubmit ditekan
                $iduser = $_POST['iduser'];
                $nm_lengkap = $_POST['nm_lengkap'];
                $nip_baru = $_POST['nip_baru'];
                $jabatan = $_POST['jabatan'];
                $nipsiap = $_POST['nipsiap'];
                $no_hp = $_POST['no_hp'];
                $pangkat = $_POST['pangkat'];
                $gol = $_POST['gol'];

                $edit = mysql_query("UPDATE user SET
                                                        
                                                        nm_lengkap='$nm_lengkap',
                                                        nip_baru='$nip_baru',
                                                        jabatan='$jabatan',
                                                        no_hp='$no_hp',
                                                        pangkat='$pangkat',
                                                        gol='$gol',
                                                        
                                                        nipsiap='$nipsiap'
                                                        
                                                                                                                
                                                        WHERE iduser='$iduser'");
                echo "<script type='text/javascript'>window.location='updateuser.php?id=$iduser&act=1'</script>";
            } else {
                $id = $_GET['id']; // menangkap id
                $sql = "SELECT * FROM user WHERE iduser=$id "; // memanggil data dengan id yang ditangkap tadi
                $query = mysql_query($sql);
                $user = mysql_fetch_array($query);
                $tahunkini = date('Y');
                ?>
                <div id="topbar" style="left: auto" >
                    <a>APLIKASI SITAMPAN</a><br/>
                    <a><small>Sistem Informasi Tempat Penimbunan Pabean</small></a>
                </div>
                <div style="padding: 15px"></div>
                <div class="container-fluid">
                    <div class="row-fluid">

                        <div class="span3 panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">User information</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row-fluid">
                                    <?php
                                    $sql = "SELECT * FROM user WHERE iduser=$_SESSION[iduser]"; // memanggil data dengan id yang ditangkap tadi
                                    $query = mysql_query($sql);
                                    $datauser = mysql_fetch_array($query);
                                    ?>
                                    <div class="span3">

                                        <img class="img-circle" alt="User Pic" src="image/photo/<?php echo $datauser['avatar'] ?>"  width="50" height="100"/>
                                    </div>
                                    <div class="span6">
                                        <strong><a id="a" href="?hal=updateuser&id=<?php echo $_SESSION['nip_baru'] ?>&kasta=<?php echo $_SESSION['level'] ?>"><?php echo $_SESSION['nm_lengkap'] ?></a></strong><br>
                                        <table class="table table-condensed table-responsive table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td class="isitabelnew">NIP</td><td ><?php echo $_SESSION['nip_baru'] ?></td> 
                                                </tr>
                                                <tr>
                                                    <td class="isitabelnew">Last Login</td><td ><?php
                            error_reporting(0);
                            $sql = "select tanggal, jamin, username, status  from log where username ='$_SESSION[username]' and status='offline' order by tanggal desc limit 0,1 ";
                            $result = mysql_query($sql);
                            $data = mysql_fetch_array($result);
                            echo $data[tanggal];
                                    ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="isitabelnew" >Jam</td><td ><?php
                                                $sql = "select tanggal, jamin, username, status  from log where username ='$_SESSION[username]' and status='offline' order by tanggal desc limit 0,1 ";
                                                $result = mysql_query($sql);
                                                $data = mysql_fetch_array($result);
                                                echo "$data[jamin] WIB";
                                    ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="isitabelnew" >Level Aktif</td><td ><?php echo $_SESSION['level']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <a  href="index.php"><button class="btn  btn-primary" type="button"
                                                                                                         data-toggle="tooltip"
                                                                                                         data-original-title="Send message to user"><i class="icon-home icon-white"></i>Home</button></a>
                                <span class="pull-right">
                                    <a  href="logout.php"><button class="btn btn-warning" type="button"
                                                                  data-toggle="tooltip"
                                                                  data-original-title="Edit this user"><i class="icon-edit icon-white"> </i>Log Out</button></a>

                                </span>
                            </div>
                        </div>
                        <div class="span9 panel panel-primary" >
                            <div class="panel-heading">
                                <h3 class="panel-title">UPDATE USER</h3>
                            </div>
                            <?php
                            $act = $_GET['act'];
                            if ($act == "1") {
                                echo "<div class='alert alert-block'><h4 >Update berhasil</h4></div>";
                            };
                            ?>
                            <div class="panel-body">
                                <div class='alert alert-info'><h4 class='panel-title'> Silahkan diupdate data Nama dan NIP yang sesuai dengan nama dan NIP pada APlikasi SIAP dalam rangka migrasi dan penggabungan aplikasi ke SIAP    </h4></div> 
                            </div>

                            <div class="panel-footer">
                                <form class="form-horizontal" id="edit" name="edit" action="updateuser.php" method="post">
                                    <input type="hidden" name="iduser" value="<?php echo $user['iduser'] ?>"/>

                                    <div class="heading">
                                        <h4 class="form-heading">Update User</h4>
                                    </div>
                                    <!--                                    <div class="control-group">
                                                                            <label class="control-label" for=
                                                                                   "inputCompanyName">Username </label>
                                                                            <div class="controls">
                                                                                <input name="username" disabled class="span5" value="<?php echo $user['username']; ?>" type="text" /> 
                                                                                
                                                                            </div>
                                    
                                                                        </div>-->
                                    <div class="control-group">
                                        <label class="control-label" for=
                                               "inputCompanyName">Nama </label>
                                        <div class="controls">
                                            <input name="nm_lengkap" class="span5" value="<?php echo $user['nm_lengkap']; ?>" type="text" /> NIP
                                            <input name="nip_baru" id="tanggal"class="span4" value="<?php echo $user['nip_baru']; ?>" type="text" />
                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for= "inputCompanyName">Jabatan</label>
                                        <div class="controls">
                                            <input name="jabatan" class="span4" value="<?php echo $user['jabatan']; ?>" type="text" /> 

                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for= "inputCompanyName">Pangkat </label>
                                        <div class="controls">
                                            <input name="pangkat" class="span5" value="<?php echo $user['pangkat']; ?>" type="text" /> Golongan
                                            <input name="gol" id="tanggal"class="span4" value="<?php echo $user['gol']; ?>" type="text" />

                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for= "inputCompanyName">No HP </label>
                                        <div class="controls">
                                            <input name="no_hp" class="span5" value="<?php echo $user['no_hp']; ?>" type="text" /> 

                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for= "inputCompanyName">NIP DI SIAP  </label>
                                        <div class="controls">
                                            <input name="nipsiap" class="span5" value="<?php echo $user['nipsiap']; ?>" type="text" /> 

                                        </div><small>Isikan dengan NIP pada aplikasi SIAP, bertujuan agar Anda login ke SITAMPAN melalui APLIKASI SIAP</small>

                                    </div>
                                    <div class="control-group">
                                        <div class="controls">

                                            <input class="btn  btn-success" type="submit" data-toggle="tooltip" data-original-title="add" name="button" value='Update'   />


                                        </div>
                                    </div>



                                </form>
                            </div>



                        </div>



                    </div>
                </div>

        <?php
    }; // penutup else
    ?>
        </body>
    </html>
    <?php
};
?>
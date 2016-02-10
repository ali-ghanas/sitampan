<?php
include "lib/koneksi.php";
session_start();
if ($_SESSION['nip_baru']!=$_SESSION['nipsiap']) {
    
    header('location:../../siap/logmu.php');
} else {
    require 'simpanlog.php';
    include 'notifikasiadmin.php';
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

        <head>
            <title>APLIKASI SITAMPAN</title>

            <link rel="stylesheet" type="text/css" media="all" href="css/style.css">
                <link href="css/custom.css" rel="stylesheet" media="screen">
                    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">
                        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
                            <link href="css/bootstrap-responsive.css" rel="stylesheet">
                                <script src="js/jquery.js"></script>
                                <script src="js/bootstrap.min.js"></script>
                                <link rel="shortcut icon" href="favicon.jpg" />
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

                                </head>
                                <body>

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
                                                    <a  href="updateuser.php?id= <?php echo $datauser['iduser']; ?>"><button class="btn  btn-primary" type="button"
                                                            data-toggle="tooltip"
                                                            data-original-title="Send message to user"><i class="icon-user icon-white"></i>Update User</button></a>
                                                    <span class="pull-right">
                                                        <a  href="logout.php"><button class="btn btn-warning" type="button"
                                                                                      data-toggle="tooltip"
                                                                                      data-original-title="Edit this user"><i class="icon-edit icon-white"> </i>Log Out</button></a>

                                                    </span>
                                                </div>


                                            </div>
                                            <div class="span9 panel panel-primary" >
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">DAFTAR APLIKASI PADA SISTEM SITAMPAN</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class='alert alert-info'><h4 class='panel-title'> Berikut ini daftar aplikasi pada Sistem SITAMPAN yang bisa di akses sesuai dengan kewenangan yang Anda miliki:    </h4></div> 
                                                </div>

                                                <div class="panel-footer">
                                                    <?php
                                                    if ($_SESSION['appadmin'] == '1') {
                                                        echo "<a href='admin/index.php?hal=user'' target='_blank'><button href='#'  class='btn btn-large btn-inverse' /><i class='fa fa fa-users fa-5x' ></i></br> ADMIN</button></a> ";
                                                    } else {
                                                        
                                                    }

                                                    if ($_SESSION['appoa'] == '1') {
                                                        echo "<a href='../sitampanOA/index.php' target='_blank'><button href='#'  class='btn btn-large btn-info' /><i class='fa fa-envelope-o fa-5x' ></i></br>OA</button></a>  ";
                                                    } else {
                                                        
                                                    }
                                                    if ($_SESSION['appbtd'] == '1') {
                                                        echo "  
                                               
                                            <a href='../sitampanbtd/index.php' target='_blank'><button href='#'  class='btn btn-large btn-success' /><i class='fa fa-truck fa-5x' ></i></br> BTD</button></a> ";
                                                    } else {
                                                        
                                                    }
                                                    if ($_SESSION['appbdn'] == '1') {
                                                        echo "  <a href='../sitampanbdn/index.php' target='_blank'><button href='#'  class='btn btn-large btn-warning' /><i class='fa fa-flag fa-5x' ></i></br> BDN</button></a> ";
                                                    } else {
                                                        
                                                    }
                                                    if ($_SESSION['appbmn'] == '1') {

                                                        echo " 
                                                      <a href='../sitampanbmn/index.php' target='_blank'><button href='#'  class='btn btn-large btn-danger' /><i class='fa fa-lock fa-5x' ></i></br> BMN</button></a> ";
                                                    } else {
                                                        
                                                    }

                                                    if ($_SESSION['appfm'] == '1') {

                                                        echo " 
                                                      <a href='#' target='_blank'><button href='#'  class='btn btn-large btn-default' /><i class='fa fa-folder-open fa-5x' ></i></br> F MANAGER</button></a> ";
                                                    } else {
                                                        
                                                    }
                                                    ?>


                                                </div>
                                                


                                            </div>
                                            <?php //mengecek apakah ada nitif dari admin
                                            $tglskrg=date('Y-m-d');
                                                $sqlnotif = "select *  from app_notifikasi where statusnotif ='posting' and tglakhirnotif > $tglskrg";
                                                $resultnotif = mysql_query($sqlnotif);
                                                $cekposting = mysql_numrows($resultnotif);
                                                if($cekposting>0){ include 'notifikasiadmin.php';}
                                                
                                                
                                             ?>
                                           
                                        </div>
                                    </div>

                                </body>
                                </html>
    <?php
};
?>
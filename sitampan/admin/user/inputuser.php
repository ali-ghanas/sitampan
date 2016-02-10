<?php
include "../lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])) {
    header('location:index.php');
    echo 'Admin : Mohon Login dulu.';
} elseif ($_SESSION['level'] == "tpp2") {

    header('location:index.php');
    echo 'Admin : Anda tak punya otoritas ini';
} elseif ($_SESSION['level'] == "tpp3") {

    header('location:index.php');
    echo 'Admin : Anda tak punya otoritas ini';
} elseif ($_SESSION['level'] == "seksitpp3") {

    header('location:index.php');
    echo 'Admin : Anda tak punya otoritas ini';
} elseif ($_SESSION['level'] == "p2") {

    header('location:index.php');
    echo 'Admin : Anda tak punya otoritas ini';
} else {
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Untitled Document</title>
            <script type="text/javascript" src="../js/jquery-ui.js"></script>
            <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.8.11.custom.css" />
    <!--<script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>-->


        </head>

        <body>
            <div class="container">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="span6">
                            <div class="area">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#atas1" data-toggle="tab"><i class='fa fa fa-users fa-3x' ></i> DARI SIAP </a></li>
                                    <li><a href="#atas2" data-toggle="tab"> <i class='fa fa fa-users fa-3x' ></i> SITAMPAN SAJA</a></li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane active in" id="atas1">
                                        <form method="post" id="adminadduser" name="adminadduser" action="?hal=user&pilih=manajemenuserinput">
                                            <table border="0" class="isitabel"  bgcolor="#2f4760">
                                                <tr align="center"> 
                                                    <td height="22"  ><h3><img src="../image/new/no_photo.png" width="50"/> Tambah User Aplikasi</h3> </td>
                                                </tr>
                                                <tr valign="top">
                                                    <td >
                                                        <table>
                                                            <tr><td>
                                                                    <select class="form-control" name="namanip" id="namanip">
                                                                        <option value="">Pilih...</option>
                                                                        <?php
                                                                        require "../lib/koneksisiap.php";
                                                                        
                                                                        $query = "SELECT nip,nama FROM m_user ORDER BY nama ASC";
                                                                        $result = mysql_query($query);
                                                                        while (list($nip, $nama) = mysql_fetch_row($result)) {
                                                                            echo "<option value=\"" . $nip . "~" . $nama . "\"";
                                                                            echo ">";
                                                                            echo ($nama . "  |  " . $nip);
                                                                            echo "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </td></tr>
                                                            <tr><td> <input  id="psw" name="psw" placeholder="Isikan Password" type="password" value="" /></td></tr>
                                                            
                                                            
                                                            <tr><td> <select placeholder="Pilih Jabatan"  name="jabatan" value="<?php echo $_POST['jabatan']; ?> selected" id="jabatan">
                                                                        <option value="" >Pilih Jabatan</option>
                                                                        <option value="Kepala Kantor" >Kepala Kantor</option>
                                                                        <option value="Kepala Bidang PPC II" >Kepala Bidang PPC II</option>
                                                                        <option value="Kepala Bidang PPC III" >Kepala Bidang PPC III</option>
                                                                        <option value="Kepala Bidang P2" >Kepala Bidang P2</option>
                                                                        <option value="Kepala Seksi Manifest" >Kepala Seksi Manifest</option>
                                                                        <option value="Kepala Seksi Tempat Penimbunan" >Kepala Seksi Tempat Penimbunan</option>
                                                                        <option value="Kepala Seksi Penindakan" >Kepala Seksi Penindakan I/II/III</option>
                                                                        <option value="Pelaksana Pemeriksa" >Pelaksana Pemeriksa</option>
                                                                        <option value="Pelaksana Administrasi" >Pelaksana Administrasi</option>
                                                                    </select></td></tr>
                                                            <tr><td><input placeholder="Isikan Pangkat" id="pangkat" name="pangkat" type="text" value="<?php echo $_POST['pangkat']; ?>" />/ <input  id="gol" placeholder="Isikan Golongan" name="gol" type="text" value="<?php echo $_POST['gol']; ?>" /></td></tr>

                                                            <tr><td> <input id="notlp" placeholder="Isikan No Telp" name="notlp" type="text" value="<?php echo $_POST['notlp']; ?>" /></td></tr>
                                                            <tr><td> <input  id="nohp"  name="nohp" placeholder="Isikan No HP" type="text" value="<?php echo $_POST['nohp']; ?>" /></td></tr>
                                            <!--                <tr><td>
                                                                    <select   id="akses" name="akses" placeholder="Pilih Akses">
                                                                        <option value = "" >Hak Akses</option>
                                                            <?php
                                                            include "../lib/koneksi.php";
                                                            $sql = "SELECT * FROM userlevel ";
                                                            $qry = @mysql_query($sql) or die("Gagal query");
                                                            while ($data = mysql_fetch_array($qry)) {
                                                                if ($data[level] == $datalevel) {
                                                                    $cek = "selected";
                                                                } else {
                                                                    $cek = "";
                                                                }
                                                                echo "<option value='$data[level]' $cek>$data[nm_level] </option>";
                                                            }
                                                            ?>
                                                                    </select>
                                                                </td></tr>-->



                                                            <tr>
                                                                <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b></b></td>
                                                            </tr>
                                                            <tr>
                                                                <td ><input class="btn btn-primary" type="submit" name="addsubmitsiap" value="Tambah" /> <input class="btn btn-danger" type="reset" value="Reset"  /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <h5 style="background-color:#dfe9ff; " >
                                                            Centang (<img src="../image/new/ok.png" />) Aplikasi Yang Bisa di Akses Oleh User tersebut.
                                                        </h5>
                                                        <ol>
                                                            <li>
                                                                <input type="checkbox" name="admin" id="admin" value="1"  <?php
                                                        if ($_POST['admin'] == 1) {
                                                            echo 'checked="checked"';
                                                        }
                                                        ?> />  Admin <img src='../image/5.png' width='50px'/>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" name="oa" id="oa" value="1"  <?php
                                                        if ($_POST['oa'] == 1) {
                                                            echo 'checked="checked"';
                                                        }
                                                        ?> />  Office Automation <img src='../image/4.png' width='50px'/>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" name="btd" id="btd" value="1"  <?php
                                                        if ($_POST['btd'] == 1) {
                                                            echo 'checked="checked"';
                                                        }
                                                            ?> /> SITAMPAN BTD <img src='../image/3.png' width='50px'/>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" id="bdn" name="bdn" value="1"  <?php
                                                                   if ($_POST['bdn'] == 1) {
                                                                       echo 'checked="checked"';
                                                                   }
                                                                   ?> /> SITAMPAN BDN <img src='../image/2.png' width='50px'/>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" name="bmn" id="bmn" value="1"  <?php
                                                                   if ($_POST['bmn'] == 1) {
                                                                       echo 'checked="checked"';
                                                                   }
                                                                   ?> /> SITAMPAN BMN <img src='../image/1.png' width='50px'/>
                                                            </li>
                                                        </ol>

                                                    </td>
                                                </tr>


                                            </table>

                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="atas2">
                                        <form method="post" id="adminadduser" name="adminadduser" action="?hal=user&pilih=manajemenuserinput">
                                            <table border="0" class="isitabel"  bgcolor="#2f4760">
                                                <tr align="center"> 
                                                    <td height="22"  ><h3><img src="../image/new/no_photo.png" width="50"/> Tambah User Aplikasi</h3> </td>
                                                </tr>
                                                <tr valign="top">
                                                    <td >
                                                        <table>
                                                            <tr><td> <input  id="user" size="20" name="user" type="text" value="<?php echo $_POST['user']; ?>" placeholder="Isikan Username" /></td></tr>
                                                            <tr><td> <input  id="psw" name="psw" placeholder="Isikan Password" type="password" value="" /></td></tr>
                                                            <tr><td> <input placeholder="Isikan Nama Lengkap"  id="nama" size="50" name="nama" type="text" value="<?php echo $_POST['nama']; ?>" /></td></tr>
                                                            <tr><td> <input id="nip"  placeholder="Isikan NIP Baru" name="nip" type="text" value="<?php echo $_POST['nip']; ?>" /></td></tr>
                                                            <tr><td> <select placeholder="Pilih Jabatan"  name="jabatan" value="<?php echo $_POST['jabatan']; ?> selected" id="jabatan">
                                                                        <option value="" >Pilih Jabatan</option>
                                                                        <option value="Kepala Kantor" >Kepala Kantor</option>
                                                                        <option value="Kepala Bidang PPC II" >Kepala Bidang PPC II</option>
                                                                        <option value="Kepala Bidang PPC III" >Kepala Bidang PPC III</option>
                                                                        <option value="Kepala Bidang P2" >Kepala Bidang P2</option>
                                                                        <option value="Kepala Seksi Manifest" >Kepala Seksi Manifest</option>
                                                                        <option value="Kepala Seksi Tempat Penimbunan" >Kepala Seksi Tempat Penimbunan</option>
                                                                        <option value="Kepala Seksi Penindakan" >Kepala Seksi Penindakan I/II/III</option>
                                                                        <option value="Pelaksana Pemeriksa" >Pelaksana Pemeriksa</option>
                                                                        <option value="Pelaksana Administrasi" >Pelaksana Administrasi</option>
                                                                    </select></td></tr>
                                                            <tr><td><input placeholder="Isikan Pangkat" id="pangkat" name="pangkat" type="text" value="<?php echo $_POST['pangkat']; ?>" />/ <input  id="gol" placeholder="Isikan Golongan" name="gol" type="text" value="<?php echo $_POST['gol']; ?>" /></td></tr>

                                                            <tr><td> <input id="notlp" placeholder="Isikan No Telp" name="notlp" type="text" value="<?php echo $_POST['notlp']; ?>" /></td></tr>
                                                            <tr><td> <input  id="nohp"  name="nohp" placeholder="Isikan No HP" type="text" value="<?php echo $_POST['nohp']; ?>" /></td></tr>
                                            <!--                <tr><td>
                                                                    <select   id="akses" name="akses" placeholder="Pilih Akses">
                                                                        <option value = "" >Hak Akses</option>
                                                            <?php
                                                            $sql = "SELECT * FROM userlevel ";
                                                            $qry = @mysql_query($sql) or die("Gagal query");
                                                            while ($data = mysql_fetch_array($qry)) {
                                                                if ($data[level] == $datalevel) {
                                                                    $cek = "selected";
                                                                } else {
                                                                    $cek = "";
                                                                }
                                                                echo "<option value='$data[level]' $cek>$data[nm_level] </option>";
                                                            }
                                                            ?>
                                                                    </select>
                                                                </td></tr>-->



                                                            <tr>
                                                                <td height="20" align="center" colspan="6" bgcolor="#dfe9ff">&nbsp;&nbsp;<b></b></td>
                                                            </tr>
                                                            <tr>
                                                                <td ><input class="btn btn-primary" type="submit" name="addsubmit" value="Tambah" /> <input class="btn btn-danger" type="reset" value="Reset"  /></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <h5 style="background-color:#dfe9ff; " >
                                                            Centang (<img src="../image/new/ok.png" />) Aplikasi Yang Bisa di Akses Oleh User tersebut.
                                                        </h5>
                                                        <ol>
                                                            <li>
                                                                <input type="checkbox" name="admin" id="admin" value="1"  <?php
                                                            if ($_POST['admin'] == 1) {
                                                                echo 'checked="checked"';
                                                            }
                                                            ?> />  Admin <img src='../image/5.png' width='50px'/>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" name="oa" id="oa" value="1"  <?php
                                                            if ($_POST['oa'] == 1) {
                                                                echo 'checked="checked"';
                                                            }
                                                            ?> />  Office Automation <img src='../image/4.png' width='50px'/>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" name="btd" id="btd" value="1"  <?php
                                                            if ($_POST['btd'] == 1) {
                                                                echo 'checked="checked"';
                                                            }
                                                            ?> /> SITAMPAN BTD <img src='../image/3.png' width='50px'/>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" id="bdn" name="bdn" value="1"  <?php
                                                            if ($_POST['bdn'] == 1) {
                                                                echo 'checked="checked"';
                                                            }
                                                            ?> /> SITAMPAN BDN <img src='../image/2.png' width='50px'/>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" name="bmn" id="bmn" value="1"  <?php
                                                            if ($_POST['bmn'] == 1) {
                                                                echo 'checked="checked"';
                                                            }
                                                            ?> /> SITAMPAN BMN <img src='../image/1.png' width='50px'/>
                                                            </li>
                                                        </ol>

                                                    </td>
                                                </tr>


                                            </table>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>






                <?php
                if (isset($_POST['addsubmit'])) { // jika tombol addsubmit ditekan
                    $user = $_POST['user']; // variable nama = apa yang diinput pada name "nama" 
                    $password = $_POST['psw'];
                    $nama = $_POST['nama'];
                    $nip = $_POST['nip'];
                    $jabatan = $_POST['jabatan'];
                    $pangkat = $_POST['pangkat'];
                    $gol = $_POST['gol'];

                    $notlp = $_POST['notlp'];
                    $nohp = $_POST['nohp'];
                    $level = $_POST['akses'];

                    $admin = $_POST['admin'];
                    $oa = $_POST['oa'];
                    $btd = $_POST['btd'];
                    $bdn = $_POST['bdn'];
                    $bmn = $_POST['bmn'];
                    $tglkini = date('Y-m-d');


                    $pengacak = "AJWKXLAJSCLWLW";
                    $passEnkrip = md5($pengacak . md5($password) . $pengacak);
                    $sql = "SELECT * FROM user where username='$user' or nip_baru='$nip' or nm_lengkap='$nama' ";
                    $query = mysql_query($sql);
                    $cek = mysql_numrows($query);
                    if ($cek > 0) {
                        echo '<script type="text/javascript">
                    alert("Sudah ada di database, CEK : nama user, NIP, dan nama lengkap");</script>';
                    } elseif
                    (strlen($nip) < 18) {
                        echo '<script type="text/javascript">
                    alert("Masukan NIP Baru : 18 Digit");</script>';
                    } else {

                        mysql_query("INSERT INTO user(username, password, nm_lengkap,  nip_baru, jabatan,  pangkat, gol, no_tlp, no_hp, seksi, admin, oa, btd, bdn, bmn)
		VALUES('$user', '$passEnkrip', '$nama',  '$nip', '$jabatan', '$pangkat', '$gol',  '$notlp', '$nohp' ,'$seksi','$admin','$oa','$btd','$bdn','$bmn')");



                        mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,nama_user,nip_user,userdiupdate,nipuserdiupdate)VALUES('adduseraplikasi','$tglkini','" . $_SESSION['nm_lengkap'] . "','" . $_SESSION['nip_baru'] . "','$nama','$nip')");
                        echo '<script type="text/javascript">window.location="index.php?hal=user&pilih=manajemenuserinput"</script>';
                    }
                }
                if (isset($_POST['addsubmitsiap'])) {
                    echo $namanip=$_POST['namanip'];
                    $namanipex=explode("~",$namanip);
                    $nip=$namanipex[0];
                    $nama= $namanipex[1];
                    $password = $_POST['psw'];
                    
                    $jabatan = $_POST['jabatan'];
                    $pangkat = $_POST['pangkat'];
                    

                    $notlp = $_POST['notlp'];
                    $nohp = $_POST['nohp'];
                    $level = $_POST['akses'];

                    $admin = $_POST['admin'];
                    $oa = $_POST['oa'];
                    $btd = $_POST['btd'];
                    $bdn = $_POST['bdn'];
                    $bmn = $_POST['bmn'];
                    $tglkini = date('Y-m-d');


                    $pengacak = "AJWKXLAJSCLWLW";
                    $passEnkrip = md5($pengacak . md5($password) . $pengacak);
                    $sql = "SELECT * FROM user where username='$nip' or nip_baru='$nip' or nm_lengkap='$nama' ";
                    $query = mysql_query($sql);
                    $cek = mysql_numrows($query);
                    if ($cek > 0) {
                        echo '<script type="text/javascript">
                    alert("Sudah ada di database, CEK : nama user, NIP, dan nama lengkap");</script>';
                    } else {

                        mysql_query("INSERT INTO user(username, password, nm_lengkap,  nip_baru, jabatan,  pangkat,  no_tlp, no_hp, seksi, admin, oa, btd, bdn, bmn)
		VALUES('$nip', '$passEnkrip', '$nama',  '$nip', '$jabatan', '$pangkat',   '$notlp', '$nohp' ,'$seksi','$admin','$oa','$btd','$bdn','$bmn')");



                        mysql_query("INSERT INTO historybcf15(namaaksi, tanggalaksi,nama_user,nip_user,userdiupdate,nipuserdiupdate)VALUES('adduseraplikasi','$tglkini','" . $_SESSION['nm_lengkap'] . "','" . $_SESSION['nip_baru'] . "','$nama','$nip')");
                        echo '<script type="text/javascript">window.location="index.php?hal=user&pilih=manajemenuserinput"</script>';
                    }
                    
                }; // if(kondisi) {hasil};
                ?>
            </div>
        </body>
    </html>

    <?php
};
?>
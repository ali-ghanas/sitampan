<html>
    <head>
        <title>Browse User</title>
        <!--       jquery anytimes -->
        <link rel="stylesheet" type="text/css" href="themes/main.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>


    </head>
    <?php
    // yang belum koneksi database diabaikan aja dulu file ini
    session_start();
    include "lib/koneksi.php";
    include "lib/function.php";

    $act = $_GET['act'];
    if (!isset($_REQUEST['mode'])) {
        $mode = '';
    } else {
        $mode = $_REQUEST['mode'];
    }
    $katakunci = htmlentities(trim(mysql_real_escape_string($_REQUEST['katakunci'])));
    /*
      cara baca halaman ini :
      pilih sembarang dari table user
      buatkan header table (dengan perintah <th>)
      hingga (while) data habis, buatkan baris baru dengan isi data sesuai yang di echo
      tutup table
     */
//$sql = "SELECT * FROM user";
//$query = mysql_query($sql);
//$nourut=1;
    ?>
    <br/>
    <div ><a href="?hal=page_arsip&pilih=browse_btl">Form Upload Pembatalan BCF 1.5</a> | <a href="?hal=page_arsip&pilih=form_mass_upload_btl">Form MASS Upload Pembatalan BCF 1.5</a> |<a href="?hal=page_arsip&pilih=btlviewupload"><img src="images/new/cari.png" width="20"/>Tracking Arsip Upload Pembatalan BCF 1.5</a></div><br/>
    <table width="100%"><tr><td class="judultabel1">Form Mass Upload Pembatalan BCF 1.5</td></tr></table>
    <table>
        <tr>
            <td colspan="3"><b>Isikan jumlah pembatalan BCF 1.5 yang akan diupload hardcopy-nya, data yang akan ditampilkan adalah sejumlah data terakhir yang belum di upload sesuai isian anda</b>
                <br>
                <b>Sangat tidak disarankan untuk melakukan update scan pembatalan bcf 1.5 disini!</b>
                <br>
                <b>Hanya untuk input scan pembatalan BCF 1.5 Baru</b>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <form method="post" action=<?php echo "index.php?hal=page_arsip&pilih=form_mass_upload_file_btl"; ?> >
        <table border="0" class="isitabel">
            <tr bgcolor="#000">
                <td colspan="3"><font color="#fff" size="4">Form Mass Upload Pembatalan BCF 1.5 </font></td>
            </tr>


            <tr bgcolor="#c1d350">
                <td width="80%">
                    Tampilkan Jumlah Data Terakhir yang belum di upload: </td><td width ="80%">
                    <select name="jumlahtampilkan">
                        <?php
                        for($i=1;$i<21;$i++){
                            echo '<option value="'.$i.'">'.$i.'</option>';                            
                        }
                        ?>
                    </select>
                </td>
            </tr>
		<tr bgcolor="#c1d350">
                <td width="80%">
                    Tahun:</td><td> 
                    <input type="text" name="tahunarsipbatal"/>
                </td>
            </tr>


            <tr><td><input class="button putih bigrounded " type="submit" name="tampilkan" value="tampilkan" class="submitsearch" /></td></tr>
            <tr><td><input name="mode" type="hidden" id="mode" value="cari" /></td></tr>
        </table>
    </form>
</body>
</html>
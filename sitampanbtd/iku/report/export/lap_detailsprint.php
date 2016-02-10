<?php

error_reporting(0);

//laporan untuk setiap tpp
if (isset($_POST['detailsprint'])) {

    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $group = $_POST['single'];

    if (mysql_connect("localhost", "sitampan", "sitampan")) {
        mysql_select_db("sitampan");
    }

    //mengambil idtpp dari $_POST['detailbatarik']
    $idtpp = substr($_POST['detailsprint'], 15, 1);

    //mengambil nama TPP
    $sql1 = "SELECT nm_tpp FROM tpp where idtpp='" . $idtpp . "'";
    $query = mysql_query($sql1) or die('error sql1');
    $nmtpp = mysql_fetch_row($query);


    if ($idtpp != "a") {
        $title = "<font size=5 face=arial><b align='center'>Laporan Detail SPRINT BCF ke TPP " . $nmtpp['0'] . "</b><br><br></font>";
    } else {
        $title = "<font size=5 face=arial><b align='center'>Laporan Detail SPRINT BCF ke Semua TPP</b><br><br></font>";
    }
    if (isset($group)) {
        $title1 = "Tanggal " . $_POST['tgl_awal'] . " sampai Tanggal " . $_POST['tgl_akhir'] . "<br><br>Format Excel ini menghilangkan nomor SPRINT BCF yang ganda, uncheck untuk menampilkan nomor ganda!";
    } else {
        $title1 = "Tanggal " . $_POST['tgl_awal'] . " sampai Tanggal " . $_POST['tgl_akhir'] . "<br><br> Perhatian! Jumlah di baris di dalam excel berbeda dengan yang ada di page IKU SPRINT BCF dikarenakan terdapat nomor SPRINT ganda pada format excel, jika dihilangkan nomor gandanya, jumlah SPRINT-nya akan sama! ";
    }
    $content_header = "<table border='1'>
                        <tr>
                        <th rowspan='2'> No </th>
                        <th colspan='2'>SPRINT BCF 1.5 ke TPP</th>
                        <th colspan='2'>BCF 1.5</th>
                        <th rowspan='2'>TPP</th>
                        <th rowspan='2'>Type Cont</th>
                        <th rowspan='2'>Jumlah Cont</th>
                        <th rowspan='2'>Cont</th>
                        </tr>";
    $content_header1 = "<tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        </tr>";
    $content_footer = "</table>";
    $content_dalam = "";

    if ($idtpp != 'a') {
        $sql2 = "select * from sitampan.bcf15 where idtpp='" . $idtpp . "' AND suratperintahdate between '" . $_REQUEST['tgl_awal'] . "' and '" . $_REQUEST['tgl_akhir'] . "' " . $group . " order by idtpp asc";
    } else {
        $sql2 = "select * from sitampan.bcf15 where suratperintahdate between '" . $_REQUEST['tgl_awal'] . "' and '" . $_REQUEST['tgl_akhir'] . "' " . $group . " order by idtpp asc";
    }
    $q = mysql_query($sql2) or die('error sql2');

    $i = 1;
    while ($r = mysql_fetch_array($q)) {


        //sql nama tpp
        $sql3 = "select nm_tpp from tpp where idtpp='" . $r['idtpp'] . "'";
        $result = mysql_query($sql3) or die('error sql3');
        $nmtpp = mysql_fetch_row($result);

        //sql jenis cont
        $sql4 = "select nm_type from typecode where idtypecode='" . $r['idtypecode'] . "'";
        $result1 = mysql_query($sql4) or die('error sql4');
        $typecont = mysql_fetch_row($result1);

        //sql detail container
        $sql5 = "select nocontainer,idsize from bcfcontainer where idbcf15='" . $r['idbcf15'] . "'";
        $result2 = mysql_query($sql5) or die('error sql5');

        while ($datacont = mysql_fetch_array($result2)) {
            $cont = ' ' . $datacont['nocontainer'] . '   [' . $datacont['idsize'] . ']<br>';

            $totalcontbcfterkait .= $cont;
        }


        //sql jumlah container per bcf

        $sql6 = "select nocontainer,idsize from bcfcontainer where idbcf15='" . $r['idbcf15'] . "'";
        $result3 = mysql_query($sql6) or die('error sql6');
        $jumlahcontbcfterkait = mysql_num_rows($result3);

        if ($r['idtypecode'] == 2) {
            $jumlahcontbcfterkait =0;
        }



        $data = "<tr>
            
            <td>" . $i . "</td>
            <td>" . $r['suratperintahno'] . "</td>
            <td>" . $r['suratperintahdate'] . "</td>
            <td>" . $r['bcf15no'] . "</td>
            <td>" . $r['bcf15tgl'] . "</td>
            <td>" . $nmtpp['0'] . "</td>
            <td>" . $typecont['0'] . "</td>
            <td>" . $jumlahcontbcfterkait . "</td>
            <td>" . $totalcontbcfterkait . "</td>
                            
                </tr>";


        $totalcontbcfterkait = "";

        $content_dalam = $content_dalam . "\n" . $data;
        $i++;
    }

    $content_sheet = $title . "\n" . $title1 . "\n" . $content_header . "\n" . $content_header1 . "\n" . $content_dalam . "\n" . $content_footer;


    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=excel.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $content_sheet;
}
?>
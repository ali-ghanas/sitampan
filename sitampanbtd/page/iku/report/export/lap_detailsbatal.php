<?php

//laporan untuk setiap tpp

if (isset($_POST['detailsbatal'])) {

    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $group = $_POST['single'];

    if (mysql_connect("localhost", "sitampan", "sitampan")) {
        mysql_select_db("sitampan");
    }

    //mengambil idtpp dari $_POST['detailbatarik']
    $idtpp = substr($_POST['detailsbatal'], 15, 1);


    //mengambil nama TPP
    $sql1 = "SELECT nm_tpp FROM tpp where idtpp='" . $idtpp . "'";
    $query = mysql_query($sql1) or die('error sql1');
    $nmtpp = mysql_fetch_row($query);


    if ($idtpp == "a") {
        $title = "<font size=5 face=arial><b align='center'>Laporan Detail Setuju Batal BCF </b><br><br></font>";
    } elseif ($idtpp == "s") {
        $title = "<font size=5 face=arial><b align='center'>Laporan Detail Setuju Batal BCF di TPS </b><br><br></font>";
    } else {
        $title = "<font size=5 face=arial><b align='center'>Laporan Detail Setuju Batal BCF " . $nmtpp['0'] . "</b><br><br></font>";
    }
    if (isset($group)) {
        $title1 = "Tanggal " . $_POST['tgl_awal'] . " sampai Tanggal " . $_POST['tgl_akhir'] . "<br><br>Format Excel ini menghilangkan nomor Surat Pemberitahuan BCF yang ganda, uncheck untuk menampilkan nomor ganda!";
    } else {
        $title1 = "Tanggal " . $_POST['tgl_awal'] . " sampai Tanggal " . $_POST['tgl_akhir'] . "<br><br> Berikut Detail Setuju Batal BCF ";
    }
    if ($idtpp == 's') {
        $content_header = "<table border='1'>
                        <tr>
                        <th rowspan='2'> No </th>
                        <th colspan='2'>Setuju Batal BCF 1.5</th>
                        <th colspan='2'>BCF 1.5</th>
                        <th rowspan='2'>TPP</th>
                        <th rowspan='2'>TPS</th>
                        <th rowspan='2'>Consignee</th>
                        <th rowspan='2'>Notify</th>
                        </tr>";

        $content_header1 = "<tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        </tr>";
    } else {
        $content_header = "<table border='1'>
                        <tr>
                        <th rowspan='2'> No </th>
                        <th colspan='2'>Setuju Batal BCF 1.5</th>
                        <th colspan='2'>BCF 1.5</th>
                        <th rowspan='2'>TPP</th>
                        <th rowspan='2'>TPS</th>
                        <th rowspan='2'>Consignee</th>
                        <th rowspan='2'>Notify</th>
                        </tr>";

        $content_header1 = "<tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        </tr>";
    }

    $content_footer = "</table>";
    $content_dalam = "";

    if ($idtpp == 'a') {
        $sql2 = "select bcf15no,bcf15tgl, setujubatalno,setujubataldate,idtpp,idtps, consignee,notify from sitampan.bcf15 where setujubataldate between '" . $_REQUEST['tgl_awal'] . "' and '" . $_REQUEST['tgl_akhir'] . "' order by setujubatalno,setujubataldate asc";
    } elseif ($idtpp == 's') {
        $sql2 = "select bcf15no,bcf15tgl, setujubatalno,setujubataldate,idtpp,idtps, consignee,notify from sitampan.bcf15 where setujubataldate between '" . $_REQUEST['tgl_awal'] . "' and '" . $_REQUEST['tgl_akhir'] . "' and bamasukno is null order by setujubatalno,setujubataldate asc";
    } else {
        $sql2 = "select bcf15no,bcf15tgl, setujubatalno,setujubataldate,idtpp,idtps, consignee,notify from sitampan.bcf15 where idtpp='" . $idtpp . "' AND setujubataldate between '" . $_REQUEST['tgl_awal'] . "' and '" . $_REQUEST['tgl_akhir'] . "' and bamasukno is not null order by setujubatalno,setujubataldate asc";
    }
    $q = mysql_query($sql2) or die('error sql2');

    $i = 1;
    
    print_r($r);
    while ($r = mysql_fetch_array($q)) {
        

        //sql nama tpp
        $sql3 = "select nm_tpp from tpp where idtpp='" . $r['idtpp'] . "'";
        $result = mysql_query($sql3) or die('error sql3');
        $nmtpp = mysql_fetch_row($result);

        $data = "<tr>
            
            <td>" . $i . "</td>
            <td>" . $r['setujubatalno'] . "</td>
            <td>" . $r['setujubataldate'] . "</td>
            <td>" . $r['bcf15no'] . "</td>
            <td>" . $r['bcf15tgl'] . "</td>
            <td>" . $nmtpp['0'] . "</td>
            <td>" . $r['idtps'] . "</td>
            <td>" . $r['consignee'] . "</td>
            <td>" . $r['notify'] . "</td>
            
                </tr>";
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
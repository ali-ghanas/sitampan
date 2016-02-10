<?php

error_reporting(0);
if (isset($_GET['search'])) {

    $bagianWhere = stripslashes($_GET['bagianWhere']);



    if (mysql_connect("localhost", "sitampan", "sitampan")) {
        mysql_select_db("sitampan");
    }


    $title = "<font size=3 face=arial><b>SALDO BARANG YANG DINYATAKAN TIDAK DIKUASAI</b></font>";
    $title1 = "<br><br>LAST UPDATE: " . date('Y-m-d') . "<br>";
    $content_header = "<table border='1'>
                        <tr><th rowspan='2'>No</th>
                        <th colspan='2'>BCF 1.5</th>
                        
                        <th colspan='3'>BC 1.1</th>
                        <th colspan='2'>B/L</th>
                        <th colspan='3'>Uraian Barang</th>
                        <th colspan='3'>Container</th>
                        <th rowspan='2'>Type Cont</th>
                        <th rowspan='2'>Detail Cont</th>
                        <th rowspan='2'>Consignee</th>
                        <th rowspan='2'>Alamat Consignee</th>
                        <th rowspan='2'>Kota Consignee</th>
                        <th rowspan='2'>Notify</th>
                        <th rowspan='2'>Alamat Notify</th>
                        <th rowspan='2'>Kota Notify</th>
                        <th colspan='3'>Dokumen Pengeluaran</th>
                        
                        <th rowspan='2'>TPS</th>
                        <th rowspan='2'>TPP</th>
                        <th colspan='7'>Status Akhir</th>
                        </tr>";
    $content_header1 = "<tr>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Pos</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Uraian</th>
                        <th>20</th>
                        <th>40</th>
                        <th>45</th>
                        
                        <th>Dok</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>No Kep</th>
                        <th>Kep BMN</th>
                        <th>Kep BTD Lelang</th>
                        <th>Kep BTD Musnah</th>
                        <th>No NHP</th>
                        <th>Tgl NHP</th>
                        
                        
                        </tr>";

    $content_footer = "</table>";
    $content_dalam = "";

    $sql = "SELECT *  FROM bcf15,tpp,typecode  where bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and  recordstatus='2' and masuk='1'  and setujubatal='2' and " . $bagianWhere . "  order by bcf15.idbcf15 desc ";
    $q = mysql_query($sql);
    $awal = '1';
    while ($r = mysql_fetch_array($q)) {
        if ($r['consignee'] == "To Order") {
            $consignee = $r['notify'];
        } elseif ($r['consignee'] == "to order") {
            $consignee = $r['notify'];
        } elseif ($r['consignee'] == "To The Order") {
            $consignee = $r['notify'];
        } elseif ($r['consignee'] == "toorder") {
            $consignee = $r['notify'];
        } elseif ($r['consignee'] == "ToOrder") {
            $consignee = $r['notify'];
        } else {
            $consignee = $r['consignee'];
        }
        if ($r['Dokumen2Code'] == "1") {
            $dokumen = "SPPB";
        } elseif ($r['Dokumen2Code'] == "0") {
            $dokumen = "";
        } elseif ($r['Dokumen2Code'] == "") {
            $dokumen = "";
        } elseif ($r['Dokumen2Code'] == "2") {
            $dokumen = "BC 1.2";
        } elseif ($r['Dokumen2Code'] == "4") {
            $dokumen = "BC 2.3";
        } elseif ($r['Dokumen2Code'] == "5") {
            $dokumen = "BC 3.0";
        } elseif ($r['Dokumen2Code'] == "11") {
            $dokumen = "ND Kasi Manifest";
        } elseif ($r['Dokumen2Code'] == "12") {
            $dokumen = "PIB";
        } elseif ($r['Dokumen2Code'] == "13") {
            $dokumen = "PIBK";
        } elseif ($r['Dokumen2Code'] == "27") {
            $dokumen = "Surat Persetujuan Reekspor";
        } elseif ($r['Dokumen2Code'] == "28") {
            $dokumen = "Returnable Package";
        }
        if ($r['DokumenCode'] == "1") {
            $dokumen1 = "SPPB";
        } elseif ($r['DokumenCode'] == "0") {
            $dokumen1 = "";
        } elseif ($r['DokumenCode'] == "") {
            $dokumen1 = "";
        } elseif ($r['DokumenCode'] == "2") {
            $dokumen1 = "BC 1.2";
        } elseif ($r['DokumenCode'] == "4") {
            $dokumen1 = "BC 2.3";
        } elseif ($r['DokumenCode'] == "5") {
            $dokumen1 = "BC 3.0";
        } elseif ($r['DokumenCode'] == "11") {
            $dokumen1 = "ND Kasi Manifest";
        } elseif ($r['DokumenCode'] == "12") {
            $dokumen1 = "PIB";
        } elseif ($r['DokumenCode'] == "13") {
            $dokumen1 = "PIBK";
        } elseif ($r['DokumenCode'] == "27") {
            $dokumen1 = "Surat Persetujuan Reekspor";
        } elseif ($r['DokumenCode'] == "28") {
            $dokumen1 = "Returnable Package";
        }
        if ($r['idstatusakhir'] == "5") {
            $status = "BTD Siap Lelang";
        } elseif ($r['idstatusakhir'] == "4") {
            $status = "BTD Cacah Lelang";
        } elseif ($r['idstatusakhir'] == "2") {
            $status = "BTD";
        } elseif ($r['idstatusakhir'] == "6") {
            $status = "BTD Lelang 1";
        } elseif ($r['idstatusakhir'] == "7") {
            $status = "BTD Lelang 2";
        } elseif ($r['idstatusakhir'] == "8") {
            $status = "BTD Musnah";
        } elseif ($r['idstatusakhir'] == "9") {
            $status = "BMN";
        } elseif ($r['idstatusakhir'] == "11") {
            $status = "Tunda Lelang";
        } elseif ($r['idstatusakhir'] == "13") {
            $status = "laku lelang";
        } elseif ($r['idstatusakhir'] == "14") {
            $status = "Tutup Pos BCF 15 By Sistem";
        } elseif ($r['idstatusakhir'] == "0") {
            $status = "";
        } elseif ($r['idstatusakhir'] == "") {
            $status = "";
        }
        $rowset = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='20'");
        $data2 = mysql_fetch_array($rowset);
        $rowset1 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='40'");
        $data3 = mysql_fetch_array($rowset1);
        $rowset2 = mysql_query("select  count(nocontainer) as nocontainer from bcfcontainer where idbcf15=$r[idbcf15] and idsize='45'");
        $data4 = mysql_fetch_array($rowset2);
        $jumlah2 = $data2['nocontainer'];
        $jumlah4 = $data3['nocontainer'];
        $jumlah45 = $data4['nocontainer'];
        if ($jumlah2 > 0) {
            $jum_20 = "$jumlah2";
        } else {
            $jum_20 = '';
        }
        if ($jumlah4 > 0) {
            $jum_40 = "$jumlah4";
        } else {
            $jum_40 = '';
        }
        if ($jumlah45 > 0) {
            $jum_45 = "$jumlah45";
        } else {
            $jum_45 = '';
        }
        if ($r['idtypecode'] == '1') {
            $typecode = "FCL";
        } elseif ($r['idtypecode'] == '2') {
            $typecode = "LCL";
        } elseif ($r['idtypecode'] == '3') {
            $typecode = "Part Off";
        } elseif ($r['idtypecode'] == '4') {
            $typecode = "Short Ship";
        } elseif ($r['idtypecode'] == '5') {
            $typecode = "Empty Cont";
        } elseif ($r['idtypecode'] == '6') {
            $typecode = "Iso Tank";
        }
        //sql detail container
        $sql5 = "select nocontainer,idsize from bcfcontainer where idbcf15='" . $r['idbcf15'] . "'";
        $result2 = mysql_query($sql5) or die('error sql5');

        while ($datacont = mysql_fetch_array($result2)) {
            $cont = ' ' . $datacont['nocontainer'] . '   [' . $datacont['idsize'] . ']<br>';

            $totalcontbcfterkait .= $cont;
        }

        $data = "<tr>
            <td>" . $awal++ . "</td>
            <td>" . $r['bcf15no'] . "</td>
            <td>" . $r['bcf15tgl'] . "</td>
            <td>" . $r['bc11no'] . "</td>
            <td>" . $r['bc11pos'] . "</td>
            <td>" . $r['bc11tgl'] . "</td>
            <td>" . $r['blno'] . "</td>
            <td>" . $r['bltgl'] . "</td>
            <td>" . $r['amountbrg'] . "</td>
            <td>" . $r['satuanbrg'] . "</td>
            <td>" . $r['diskripsibrg'] . "</td>
            <td>" . $jum_20 . "</td>
            <td>" . $jum_40 . "</td>
            <td>" . $jum_45 . "</td>
            <td>" . $typecode . "</td>
            <td>" . $totalcontbcfterkait . "</td>
            <td>" . $consignee . "</td>    
            <td>" . $r['consigneeadrress'] . "</td>    
            <td>" . $r['consigneekota'] . "</td>    
            <td>" . $r['notify'] . "</td>    
            <td>" . $r['notifyadrress'] . "</td>    
            <td>" . $r['notifykota'] . "</td>    
            <td>" . $dokumen . "</td>
            <td>" . $r['Dokumen2No'] . "</td>
            <td>" . $r['Dokumen2Date'] . "</td>
            <td>" . $r['idtps'] . "</td>
            <td>" . $r['nm_tpp'] . "</td>
            <td>" . $status . "</td>
            <td>" . $r['NoKepStatus_Akhr'] . "</td>
            <td>" . $r['KepBMNNo'] . "</td>
            <td>" . $r['KepLelang1No'] . "</td>
            <td>" . $r['KepMusnahNo'] . "</td>
            <td>" . $r['NHPLelangNo'] . "</td>
            <td>" . $r['NHPLelangDate'] . "</td>
            </tr>";

        $totalcontbcfterkait = "";
        $content_dalam = $content_dalam . "\n" . $data;
    }

    $content_sheet = $title . "\n" . $title1 . "\n" . $content_header . "\n" . $content_header1 . "\n" . $content_dalam . "\n" . $content_footer;

    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=excel.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $content_sheet;
}
?>
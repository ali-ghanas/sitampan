<?php

//print_r($_POST);exit();
//laporan untuk setiap tpp
if (isset($_POST['detailbatarik'])) {

    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $group = $_POST['single'];

    if (mysql_connect("localhost", "sitampan", "sitampan")) {
        mysql_select_db("sitampan");
    }

    //mengambil idtpp dari $_POST['detailbatarik']
    $idtpp = substr($_POST['detailbatarik'], 16, 1);

    //mengambil nama TPP
    $sql1 = "SELECT nm_tpp FROM tpp where idtpp='" . $idtpp . "'";
    $query = mysql_query($sql1) or die('error sql1');
    $nmtpp = mysql_fetch_row($query);


    if ($idtpp != "a") {
        $title = "<font size=5 face=arial><b align='center'>Laporan Detail BA Penarikan TPP " . $nmtpp['0'] . "</b><br><br></font>";
    } else {
        $title = "<font size=5 face=arial><b align='center'>Laporan Detail BA Penarikan Semua TPP</b><br><br></font>";
    }
    if (isset($group)) {
        $title1 = "Tanggal " . $_POST['tgl_awal'] . " sampai Tanggal " . $_POST['tgl_akhir'] . "<br><br>Format Excel ini menghilangkan nomor BA Penarikan yang ganda, uncheck untuk menampilkan nomor ganda!";
    } else {
        $title1 = "Tanggal " . $_POST['tgl_awal'] . " sampai Tanggal " . $_POST['tgl_akhir'] . "<br><br> Perhatian! Jumlah di baris di dalam excel berbeda dengan yang ada di page IKU BA Penarikan dikarenakan terdapat nomor BA Penarikan ganda pada format excel, jika dihilangkan nomor gandanya, jumlah BA Penarikannya akan sama! ";
    }
    $content_header = "<table border='1'>
                        <tr>
                        <th rowspan='2'>No</th>
                        <th colspan='2'>BCF 1.5</th>
                        <th colspan='4'>BC 1.1</th>
                        <th rowspan='2'>Uraian Barang</th>
                        <th rowspan='2'>Type Cont</th>
                        <th rowspan='2'>Jumlah Cont</th>
                        <th rowspan='2'>Cont</th>
                        <th rowspan='2'>Bruto</th>
                        <th rowspan='2'>Volume</th>
                        <th rowspan='2'>TPS</th>
                        <th rowspan='2'>TPP</th>
                        <th rowspan='2'>Consignee</th>
                        <th rowspan='2'>Notify</th>
                        <th colspan='2'>SP BCF 1.5</th>
                        <th colspan='2'>Surat Perintah Penarikan BCF 1.5</th>
                        <th colspan='2'>BA Penarikan Ke TPP</th>
                        <th colspan='3'>Dokumen Pemberitahuan</th>
                        <th colspan='3'>Dokumen Pengeluaran</th>
                        <th colspan='3'>Alasan Tidak ditarik</th>
                        <th colspan='5'>Status Akhir </th>
                        </tr>";
                        
    $content_header1 = "<tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Pos</th>
                        <th>Subpos</th>
                        
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Dokumen</th>
                        <th>Nomor</th>
                        <th>Tgl</th>
                        <th>Dokumen</th>
                        <th>Nomor</th>
                        <th>Tgl</th>
                        <th>Nomor</th>
                        <th>Tgl</th>
                        <th>Ket</th>
                        <th>Status Akhir</th>
                        <th>No Setuju Batal</th>
                        <th>KEP BTD LELANG</th>
                        <th>KEP BTD Musnah</th>
                        <th>KEP BMN</th>
                        </tr>";
    $content_footer = "</table>";
    $content_dalam = "";
    
    if ($idtpp != 'a') {
        $req = "where bamasukdate between '" . $_POST['tgl_awal'] . "' and '" . $_POST['tgl_akhir'] . "'and idtpp='" . $idtpp . "' " . $group . " order by bamasukno ASC";
    } else {
        $req = "where bamasukdate between '" . $_POST['tgl_awal'] . "' and '" . $_POST['tgl_akhir'] . "' " . $group . " order by bamasukno ASC";
    }
    
    $sql2 = "select * from sitampan.bcf15 " . $req;

    $q = mysql_query($sql2) or die('error sql2');

    $i = 1;
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
            $jumlahcontbcfterkait = 0;
        }



        $data = "<tr>
            
            <td>" . $i . "</td>
            <td>" . $r['bcf15no'] . "</td>
            <td>" . $r['bcf15tgl'] . "</td>
            <td>" . $r['bc11no'] . "</td>
            <td>" . $r['bc11tgl'] . "</td>
            <td>" . $r['bc11pos'] . "</td>
            <td>" . $r['bc11subpos'] . "</td>
            <td>" . $r['amountbrg'] . " " . $r['satuanbrg'] . " " . $r['diskripsibrg'] . "</td>
            <td>" . $typecont['0'] . "</td>
            <td>" . $jumlahcontbcfterkait . "</td>
            <td>" . $totalcontbcfterkait . "</td>
            <td>" . $r['tonage_groos'] . "</td>
            <td>" . $r['tonage_netto'] . "</td>
            <td>" . $r['idtps'] . "</td>            
            <td>" . $nmtpp['0'] . "</td>   
            <td>" . $r['consignee'] . "</td>
            <td>" . $r['notify'] . "</td>
            <td>" . $r['suratpengantarno'] . "</td>
            <td>" . $r['suratpengantartgl'] . "</td>
            <td>" . $r['suratperintahno'] . "</td>
            <td>" . $r['suratperintahdate'] . "</td>
            <td>" . $r['bamasukno'] . "</td>
            <td>" . $r['bamasukdate'] . "</td>
                
            <td>" . $dokumen1 . "</td>
            <td>" . $r['DokumenNo'] . "</td>
            <td>" . $r['DokumenDate'] . "</td>
            <td>" . $dokumen . "</td>
            <td>" . $r['Dokumen2No'] . "</td>
            <td>" . $r['Dokumen2Date'] . "</td>
            <td>" . $r['BatalTarikNo'] . $r['BatalTarikNo2'] . "</td>
            <td>" . $r['BatalTarikDate'] . "</td>
            <td>" . $r['BatalTarikKet'] . "</td>
            <td>" . $statusakhirname . "" . ($statusakhir) . "</td>
                <td>" . $r['SetujuBatalNo'] . "/" . $r['SetujuBatalDate'] . "</td>
                <td>" . $r['KepLelang1No'] . "</td>
                <td>" . $r['KepMusnahNo'] . "</td>
            <td>" . $r['KepBMNNo'] . "</td>
                            
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
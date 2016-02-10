<?php
if(isset($_GET['search'])){
    
    $in_tglawal=$_GET['in_tglawalbtl'];
    $in_tglakhir=$_GET['in_tglakhirbtl'];
    
    
    if( mysql_connect("localhost","sitampan","sitampan") ){
    mysql_select_db("sitampan");
    }

    $content_header = "<table border='1'>
                        <tr>
                        <th >IDBCF15</th>
                        <th>BATAL</th>
                        <th >SURATBATALNO</th>
                        <th >SURATBATALTGL</th>
                        <th >PEMOHON</th>
                        <th >ALAMATPEMOHON</th>
                        <th >SETUJUBATAL</th>
                        <th >SETUJUBATALNO</th>
                        <th >SETUJUBATALNO2</th>
                        <th >SETUJUBATALDATE</th>
                        <th >IDSEKSISETUJUBATAL</th>
                        <th >DOCUMENTCODE</th>
                        <th >DOCUMENTNO</th>
                        <th >DOCUMENTDATE</th>
                        <th >DOCUMENT2CODE</th>
                        <th >DOCUMENT2NO</th>
                        <th >DOCUMENT2DATE</th>
                        <th >BCF15NO</th>
                        <th >TANGGAL</th>
                        <th >STATUSUPLOAD</th>
                        
                        </tr>";
    
    $content_footer = "</table>";
    $content_dalam = "";

    
    $sql = "SELECT * FROM bcf15  where (SetujuBatalDate between '$in_tglawal' and '$in_tglakhir') and perintah='1'  order by idbcf15 desc  ";
    $q   = mysql_query( $sql );
    
    while( $r=mysql_fetch_array( $q ) ){
        $statusupload='BCFBATAL';
        $nobcf15data=$r['bcf15no'];
        
        $bcf15no = sprintf("%06s", $nobcf15data);
    
    $data = "<tr>
            <td>".$r['idbcf15']."</td>
            <td>".$r['Batal']."</td>
            <td>".$r['SuratBatalNo']."</td>
            <td>".$r['SuratBatalDate']."</td>
            <td>".$r['Pemohon']."</td>
            <td>".$r['AlamatPemohon']."</td>
            <td>".$r['setujubatal']."</td>
            <td>".$r['SetujuBatalNo']."</td>
            <td>".$r['SetujuBatalNo2']."</td>
            <td>".$r['SetujuBatalDate']."</td>
            <td>".$r['idseksisetujubatal']."</td>
            <td>".$r['DokumenCode']."</td>
            <td>".$r['DokumenNo']."</td>
            <td>".$r['DokumenDate']."</td>
            <td>".$r['Dokumen2Code']."</td>
            <td>".$r['Dokumen2No']."</td>
            <td>".$r['Dokumen2Date']."</td>
            <td>".$r['bcf15no']."</td>
            <td>".$r['bcf15tgl']."</td>
                <td>".$statusupload."</td>
            </tr>";
    $content_dalam = $content_dalam ."\n". $data;
    }

    $content_sheet = $content_header .  "\n" . $content_dalam . "\n" . $content_footer;

    $bcfbaru=date('dmY');
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=BATAL_$bcfbaru.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $content_sheet;
}
?>
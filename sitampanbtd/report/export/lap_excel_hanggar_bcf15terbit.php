<?php
if(isset($_GET['search'])){
    
    $in_tglawal=$_GET['in_tglawalbcf15'];
    $in_tglakhir=$_GET['in_tglakhirbcf15'];
    
    
    if( mysql_connect("localhost","sitampan","sitampan") ){
    mysql_select_db("sitampan");
    }

    $content_header = "<table border='1'>
                        <tr>
                        <th >IDBCF15</th>
                        <th>No BCF 1.5</th>
                        <th >Tgl BCF 1.5</th>
                        <th >Kode Manifest</th>
                        <th >Tahun</th>
                        <th >No BC 1.1</th>
                        <th >Tgl BC 1.1</th>
                        <th >POS</th>
                        <th >SUB Pos </th>
                        <th >No B/L</th>
                        <th >Tgl B/L</th>
                        <th >Sarkut </th>
                        <th >Voy </th>
                        <th >Jumlah </th>
                        <th >Satuan </th>
                        <th >Uraian </th>
                        <th >Consignee </th>
                        <th >Alamat </th>
                        <th >Kota </th>
                        <th >Notify </th>
                        <th >Alamat </th>
                        <th >Kota </th>
                        <th >IDTPS </th>
                        <th >IDTPP </th>
                        <th >TypeCont </th>
                        <th >Ket </th>
                        <th >Recordstatus </th>
                        <th >Perintah </th>
                        <th >Sprint No </th>
                        <th >Sprint Tgl </th>
                        <th >Idtp2 </th>
                        <th >Validasi BCF 1.5 </th>
                        <th >STATUSUPLOAD </th>
                        
                        </tr>";
    
    $content_footer = "</table>";
    $content_dalam = "";

    
    $sql = "SELECT * FROM bcf15  where (bcf15tgl between '$in_tglawal' and '$in_tglakhir') and perintah='1'  order by idbcf15 desc  ";
    $q   = mysql_query( $sql );
    
    while( $r=mysql_fetch_array( $q ) ){
        $statusupload='BCF15';
        $nobcf15data=$r['bcf15no'];
        
        $bcf15no = sprintf("%06s", $nobcf15data);
    
    $data = "<tr>
            <td>".$r['idbcf15']."</td>
            <td>".$r['bcf15no']."</td>
            <td>".$r['bcf15tgl']."</td>
            <td>".$r['idmanifest']."</td>
            <td>".$r['tahun']."</td>
            <td>".$r['bc11no']."</td>
            <td>".$r['bc11tgl']."</td>
            <td>".$r['bc11pos']."</td>
            <td>".$r['bc11subpos']."</td>
            <td>".$r['blno']."</td>
            <td>".$r['bltgl']."</td>
            <td>".$r['saranapengangkut']."</td>
                <td>".$r['voy']."</td>
                <td>".$r['amountbrg']."</td>
                <td>".$r['satuanbrg']."</td>
             <td>".$r['diskripsibrg']."</td>
             <td>".$r['consignee']."</td>
             <td>".$r['consigneeadrress']."</td>
             <td>".$r['consigneekota']."</td>
             <td>".$r['notify']."</td>
             <td>".$r['notifyadrress']."</td>
             <td>".$r['notifykota']."</td>
             <td>".$r['idtps']."</td>
             <td>".$r['idtpp']."</td>
             <td>".$r['idtypecode']."</td>
             <td>".$r['keterangan']."</td>
             <td>".$r['recordstatus']."</td>
             <td>".$r['perintah']."</td>
             <td>".$r['suratperintahno']."</td>
             <td>".$r['suratperintahdate']."</td>
             <td>".$r['idtp2']."</td>
             <td>".$r['validasibcf15baru']."</td>
             <td>".$statusupload."</td>
            </tr>";
    $content_dalam = $content_dalam ."\n". $data;
    }

    $content_sheet = $content_header .  "\n" . $content_dalam . "\n" . $content_footer;

    $bcfbaru=date('dmY');
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=BCF$bcfbaru.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $content_sheet;
}
?>
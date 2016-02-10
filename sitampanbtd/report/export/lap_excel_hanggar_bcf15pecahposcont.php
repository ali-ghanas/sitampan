<?php
if(isset($_GET['search'])){
    
    $in_tglawal=$_GET['in_tglawalcont'];
    $in_tglakhir=$_GET['in_tglakhircont'];
    
    
    if( mysql_connect("localhost","sitampan","sitampan") ){
    mysql_select_db("sitampan");
    }

    $content_header = "<table border='1'>
                        <tr>
                        <th >ID CONT</th>
                        <th>IDBCF15</th>
                        <th >BCF 1.5 NO</th>
                        <th >TAHUN</th>
                        <th >CONTAINER</th>
                        <th >SIZE</th>
                        <th >SEGEL PELAYARAN MANIFEST</th>
                        <th >STATUSUPLOAD</th>
                        
                        </tr>";
    
    $content_footer = "</table>";
    $content_dalam = "";

    
    $sql = "SELECT * FROM bcf15,bcfcontainer  where (PecahPosdate between '$in_tglawal' and '$in_tglakhir') and pecahpos='1' and bcf15.idbcf15=bcfcontainer.idbcf15  order by idcontainer desc  ";
    $q   = mysql_query( $sql );
    
    while( $r=mysql_fetch_array( $q ) ){
        $statusupload='PECAHPOSCONT';
        $nobcf15data=$r['bcf15no'];
        
        $bcf15no = sprintf("%06s", $nobcf15data);
    
    $data = "<tr>
            <td>".$r['idcontainer']."</td>
            <td>".$r['idbcf15']."</td>
            <td>".$r['bcf15no']."</td>
            <td>".$r['tahun']."</td>
            <td>".$r['nocontainer']."</td>
            <td>".$r['idsize']."</td>
            <td>".$r['segelpelayaran_man']."</td>
            <td>".$statusupload."</td>
            </tr>";
    $content_dalam = $content_dalam ."\n". $data;
    }

    $content_sheet = $content_header .  "\n" . $content_dalam . "\n" . $content_footer;

    $bcfbaru=date('dmY');
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=PPCONT$bcfbaru.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print $content_sheet;
}
?>
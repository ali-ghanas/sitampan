//<?php
//include "../lib/koneksi.php";
//include "../lib/function.php";
//error_reporting(0);
//       $query = "select * from bcfcontainer where idbcf15='103023'";
//                                                $result = mysql_query($query);
//                                                
//                                                $num_rows = mysql_num_rows($result);
//                                                
//                                                
//                                                for($i = 0; $i < $num_rows; $i++) {
//                                                $row = mysql_fetch_array($result);
//                                                echo $conti=$row['nocontainer'];
//                                                echo "$contuk=$row[idsize]";
//                                                
//                                              
//                                                
//		
//$paramcon = array(
//	array("seqId" => $return->return, "noCont" => "$conti", "ukCont" => "$contuk", "jnsCont" => "$contjenis", "bruto" => $contbruto),);
//
// }
//?>

<?php
/*
* Function to turn a mysql datetime (YYYY-MM-DD HH:MM:SS) into a unix timestamp
* @param str
*  The string to be formatted
*/

function convert_datetime($str) {

list($date, $time) = explode('', $str);
list($year, $month, $day) = explode('-', $date);
list($hour, $minute, $second) = explode(':', $time);

$timestamp = mktime($hour, $minute, $second, $month, $day, $year);

return $timestamp;
}

$time = time();
echo($time . "<hr/>");
$timezone = new DateTimeZone("asia/Kolkata" );
$date = new DateTime();
$date->setTimezone($timezone );
echo convert_datetime($date->format(( 'Y-m-j H:i:s' )));

?>
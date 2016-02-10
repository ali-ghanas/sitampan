<?php
$level="1,2,3";
include("inc/login.php");
$filefetcher="sumberdatakapal.inc.php";
$pesanpesan=ijinkan(
	"namsubmitproses=1"
);
extract($_REQUEST);
include("inc/status.php");
include("inc/modify.php");
require_once("inc/connect.php");
?>

<?php
$nambiggie[text]="Sumber Data";
$nambiggie[slices]="slices/forsumberdatakapal.jpg";
?>

<?php
if ($_POST["namsubmitproses"]) {
	if (!empty($_FILES["namtextlokasifile"]["name"])&&!empty($namtextshipsailstatus)) {
		if ($_FILES["namtextlokasifile"]["type"]=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"||$_FILES["namtextlokasifile"]["type"]=="application/vnd.ms-excel") {
			funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"Sumber Data: Impor XLS","RUN","1","","");
			require_once($deflink."class/phpexcel/PHPExcel/IOFactory.php");
			
			$inputFileType=PHPExcel_IOFactory::identify($_FILES["namtextlokasifile"]["tmp_name"]);
			$objReader=PHPExcel_IOFactory::createReader($inputFileType);
			$objReader->setReadDataOnly(true);
			$objReader->setLoadSheetsOnly("template");
			$objPHPExcel=$objReader->load($_FILES["namtextlokasifile"]["tmp_name"]);
			
			$objWorksheet=$objPHPExcel->getActiveSheet();

			$buatsumberid=funtheid("xls");
			$buatsumbertimeimported=date("Y-m-d H:i:s");
			$buatshipname=trim(strip_tags(funbuangkarakteraneh($objWorksheet->getCell('D1')->getValue())));
			if (!empty($buatshipname)) {
				$buatshipdepartureport=trim(strip_tags(funbuangkarakteraneh($objWorksheet->getCell('D2')->getValue())));
				$buatshipdestinationport=trim(strip_tags(funbuangkarakteraneh($objWorksheet->getCell('D3')->getValue())));
				$buatshipdeparturedate=funkoreksiexceldate($objWorksheet->getCell('D4')->getValue());
				$buatshipdestinationdate=funkoreksiexceldate($objWorksheet->getCell('D5')->getValue());
				if ($namtextshipsailstatus=="D"&&!empty($buatshipdeparturedate)) { $lanjut=1; }
				if ($namtextshipsailstatus=="A"&&!empty($buatshipdestinationdate)) { $lanjut=1; }
				$highestRow=$objWorksheet->getHighestRow();
				
				for ($row=8;$row<=$highestRow;++$row) {
					$buatpenumpangnobarissheet=trim(strip_tags(funbuangkarakteraneh($objWorksheet->getCellByColumnAndRow(0,$row)->getValue())));
					$buatpenumpangnama=trim(strip_tags(funbuangkarakteraneh($objWorksheet->getCellByColumnAndRow(1,$row)->getValue()))); $buatpenumpangnama=ucwords($buatpenumpangnama);
					if (empty($buatpenumpangnobarissheet)||empty($buatpenumpangnama)) { $lanjut=0; }
				}
				if ($lanjut==1) {
					for ($row=8;$row<=$highestRow;++$row) {
						$buatpenumpangnobarissheet=trim(strip_tags(funbuangkarakteraneh($objWorksheet->getCellByColumnAndRow(0,$row)->getValue())));
						$buatpenumpangnama=trim(strip_tags(funbuangkarakteraneh($objWorksheet->getCellByColumnAndRow(1,$row)->getValue()))); $buatpenumpangnama=ucwords($buatpenumpangnama);
						$buatpenumpangjeniskelamin=ucwords($objWorksheet->getCellByColumnAndRow(2,$row)->getValue());
						if ($buatpenumpangjeniskelamin=="M"||$buatpenumpangjeniskelamin=="F") {
							$buatpenumpangjeniskelamin=funconvjeniskelaminengid($buatpenumpangjeniskelamin);
						}
						$buatpenumpangwaktulahir=funkoreksiexceldate($objWorksheet->getCellByColumnAndRow(3,$row)->getValue());
						$buatpenumpangkebangsaan=trim(strip_tags(funbuangkarakteraneh($objWorksheet->getCellByColumnAndRow(4,$row)->getValue())));
						$buatpenumpangpasporno=trim(strip_tags(funbuangkarakteraneh($objWorksheet->getCellByColumnAndRow(5,$row)->getValue())));
						$buatpenumpangpasporpoi=trim(strip_tags(funbuangkarakteraneh($objWorksheet->getCellByColumnAndRow(6,$row)->getValue())));
						$buatpenumpangpaspordoi=funkoreksiexceldate($objWorksheet->getCellByColumnAndRow(7,$row)->getValue());
						$buatpenumpangremarks=trim(strip_tags(funbuangkarakteraneh($objWorksheet->getCellByColumnAndRow(8,$row)->getValue())));
						
						$insertintotblanalisispenumpangsumber=mysql_query("insert into tblanalisispenumpangsumber (
							sumberid,
							sumbertimeimported,
							shipsailstatus,
							shipname,
							shipdeparturedate,
							shipdepartureport,
							shipdestinationdate,
							shipdestinationport,
							penumpangnobarissheet,
							penumpangnama,
							penumpangjeniskelamin,
							penumpangwaktulahir,
							penumpangkebangsaan,
							penumpangpasporno,
							penumpangpasporpoi,
							penumpangpaspordoi,
							penumpangremarks
							) values (
								'".$buatsumberid."',
								'".$buatsumbertimeimported."',
								'".$namtextshipsailstatus."',
								'".$buatshipname."',
								'".$buatshipdeparturedate."',
								'".$buatshipdepartureport."',
								'".$buatshipdestinationdate."',
								'".$buatshipdestinationport."',
								'".$buatpenumpangnobarissheet."',
								'".$buatpenumpangnama."',
								'".$buatpenumpangjeniskelamin."',
								'".$buatpenumpangwaktulahir."',
								'".$buatpenumpangkebangsaan."',
								'".$buatpenumpangpasporno."',
								'".$buatpenumpangpasporpoi."',
								'".$buatpenumpangpaspordoi."',
								'".$buatpenumpangremarks."'
							)
						");
						if ($insertintotblanalisispenumpangsumber) {
							funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBINS","1","tblanalisispenumpangsumber",$buatsumberid);
							funplog($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DBINS","1","tblanalisispenumpangxls",$buatsumberid);
						}
					}
					
					$filehandle=fopen($_FILES["namtextlokasifile"]["tmp_name"],"rb");
					$buatsumberbinary=addslashes(fread($filehandle,filesize($_FILES["namtextlokasifile"]["tmp_name"])));
					fclose($filehandle);
					$insertintotblanalisispenumpangxls=mysql_query("insert into tblanalisispenumpangxls (
						sumberid,
						sumberbinary,
						sumberfiletype
						) values (
							'".$buatsumberid."',
							'".$buatsumberbinary."',
							'".$_FILES["namtextlokasifile"]["type"]."'
						)
					");
					if ($insertintotblanalisispenumpangsumber&&$insertintotblanalisispenumpangxls) { $pesanpesan=$statusdb[251]. "<a onClick=\"funffdivmain('".$filefetcher."?ffswitch=ffswfitur01&namvarmuncul=1&linsumberid=".$buatsumberid."','')\">Klik disini untuk analisis atensi lebih lanjut...</a>"; }
				} else { $pesanpesan=$statusdb[351]; }
			} else { $pesanpesan=$statusdb[351]; }
		} else { $pesanpesan=$statusdb[3223]; }
	} else { $pesanpesan=$statusdb[3]; }
}
?>

<?php function funconvjeniskelaminengid ($gender) {
	$case=ucwords($gender);
	switch($case) {
		case "M": $output="L"; break;
		case "F": $output="P"; break;
	}
	return $output;
} ?>

<?php function funkoreksiexceldate ($timestamp) {
	if (!empty($timestamp)) {
		if (PHPExcel_Shared_Date::ExcelToPHP($timestamp)<0) {
			if ($timestamp[2]=="/"&&$timestamp[5]=="/") {
				list($d,$m,$y)=explode("/",$timestamp);
				if ($y<70) { $y="19".$y; }
				return date("Y-m-d",mktime(0, 0, 0, $m, $d, $y));
			} else if ($timestamp[2]=="-"&&$timestamp[5]=="-") {
				list($d,$m,$y)=explode("-",$timestamp);
				if ($y<70) { $y="19".$y; }
				return date("Y-m-d",mktime(0, 0, 0, $m, $d, $y));
			}
		}
		else { return date("Y-m-d",PHPExcel_Shared_Date::ExcelToPHP($timestamp)); }
	} else { return $timestamp; }
} ?>

<?php if (empty($deflink)) { $deflink=""; } ?>

<link href="<?php echo($deflink); ?>inc/style.css" rel="stylesheet" type="text/css">
<?php include($deflink."inc/style.php"); ?>
<script language="javascript" src="<?php echo($deflink); ?>inc/style.js" type="text/javascript"></script>

<script language="javascript" src="<?php echo($deflink); ?>inc/modify.js" type="text/javascript"></script>

<?php include("inc/version.php"); ?>


<link rel="icon" href="./sah.ico" type="image/x-icon" />
<link rel="shortcut icon" href="./sah.ico" type="image/x-icon" />


<?php function funhelptip($asd) {

switch($asd) {
case "1": echo("<span class='clahelptip'>Lokasi berkas Microsoft&reg; Excel <strong><em>*.xls</em></strong> (wajib diisi).<br><br>Contoh: <strong>E:\\Penumpang_Januari_2011.xls</strong><br><br>Klik tombol Browse untuk memilih lokasi dan nama berkas dengan mudah.</span>"); break;

} } ?>
<?php
$level="1,2";
include("inc/login.php");
$pesanpesan=ijinkan(
	"namsubmitproses=1"
);
extract($_REQUEST);
include("inc/status.php");
require_once("inc/connect.php");
?>
<?php
$nambiggie[text]="Pemeliharaan Data";
$nambiggie[slices]="slices/forpemeliharaandata.jpg";
?>
<?php
if ($_POST["namsubmitproses"]) {
	ini_set("max_execution_time", "0");
	if ($_POST["namtextmetode"]=="ekspor") {
		funplogtae($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"Pemeliharaan Data: Pencadangan Data","RUN","1","","");
		$tables='*';
		if($tables=='*') {
			$tables=array();
			$result=mysql_query('SHOW TABLES');
			while($row=mysql_fetch_row($result)) {
				$tables[]=$row[0];
			}
		}
		else {
			$tables=is_array($tables) ? $tables : explode(',',$tables);
		}
		$fname="datacadangan_"."thn".date("Y")."bln".date("m")."tgl".date("d")."jam".date("His").".sql";
		header("Content-Disposition: attachment; filename=".$fname);
		header("Content-type: file");
		$pesanpesan=$statusdb[2];
		funplogtae($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DB","1","","");
		foreach($tables as $table) {
			$result=mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
			echo('DROP TABLE '.$table.';');
			$row2=mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			echo("\n".$row2[1].";\n");
			for ($i=0;$i<$num_fields;$i++) {
				while($row = mysql_fetch_row($result)) {
					echo('INSERT INTO '.$table.' VALUES(');
					for($j=0; $j<$num_fields; $j++) {
						$row[$j]=addslashes($row[$j]);
						$row[$j]=ereg_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { echo("'".$row[$j]."'"); } else { echo("''"); }
						if ($j<($num_fields-1)) { echo(','); }
					}
					echo(");\n");
				}
			}
			echo("");
		}
		exit;
	}
	elseif ($_POST["namtextmetode"]=="impor") {
		if (!empty($_FILES["namtextlokasifile"]["name"])) {
			funplogtae($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"Pemeliharaan Data: Pemulihan Data","RUN","1","","");
			$handle=fopen($_FILES["namtextlokasifile"]["tmp_name"],'r');
			$content=fread($handle, filesize($_FILES["namtextlokasifile"]["tmp_name"]));
			fclose($handle);
			$contentexp=explode(";\n",$content);
			$jmlcontentexp=count($contentexp);
			for ($x=0;$x<$jmlcontentexp;$x++) {
				$test=mysql_query($contentexp[$x]);
			}
			$pesanpesan=$statusdb[2];
			funplogtae($_SERVER['REMOTE_ADDR'],$_SESSION["penggunaid"],"","DB","1","","");
		} else { $pesanpesan=$statusdb[3]; }
	}
	elseif ($_POST["namtextmetode"]=="c&r") {
		$tables=array();
		$result=mysql_query('SHOW TABLES');
		while($row=mysql_fetch_row($result)) {
			$tables[]=$row[0];
		}
		$x=0;
		foreach($tables as $table) {
			$checkalltbl=mysql_query("check table ".$table);
			$checkalltblarray=mysql_fetch_array($checkalltbl);
			if ($checkalltblarray["Msg_type"]=="warning"||$checkalltblarray["Msg_type"]=="error") {
				$repairtbl=mysql_query("repair table ".$table);
				$repairtblarray=mysql_fetch_array($repairtbl);
				$x++;
			}
		}
		if ($x==0) { $pesanpesan=$statusdb[24]; }
		else { $pesanpesan=$statusdb[241].$x.". ".$statusdb[242].$x; }
	} else { $pesanpesan=$statusdb[322]; }
}
?>
<?php if (empty($deflink)) { $deflink=""; } ?>

<link href="<?php echo($deflink); ?>inc/style.css" rel="stylesheet" type="text/css">
<?php include($deflink."inc/style.php"); ?>
<script language="javascript" src="<?php echo($deflink); ?>inc/style.js" type="text/javascript"></script>

<?php include($deflink."inc/modify.php"); ?>
<script language="javascript" src="<?php echo($deflink); ?>inc/modify.js" type="text/javascript"></script>

<?php include($deflink."inc/version.php"); ?>


<link rel="icon" href="./sisdu.ico" type="image/x-icon" />
<link rel="shortcut icon" href="./sisdu.ico" type="image/x-icon" />

<?php
function funplogtae($plogipaddress,$penggunaid,$plogaction,$plogprocess,$plogprocessstatus,$plogtargettable,$plogtargetid) {
	include("inc/connect.php");
	$plogtime=date("Y-m-d H:i:s");
	$insertinto=mysql_query("insert into tblpenggunalog
		(
			plogtime,
			plogipaddress,
			penggunaid,
			plogaction,
			plogprocess,
			plogprocessstatus,
			plogtargettable,
			plogtargetid
		) values (
			'".$plogtime."',
			'".$plogipaddress."',
			'".$penggunaid."',
			'".$plogaction."',
			'".$plogprocess."',
			'".$plogprocessstatus."',
			'".$plogtargettable."',
			'".$plogtargetid."'
		)
	");
}
?>

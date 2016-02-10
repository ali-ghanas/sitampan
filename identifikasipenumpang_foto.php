<?php
include("identifikasipenumpang.inc.php");
extract($_REQUEST);
if (!empty($_FILES["namtextuploadfoto"]["name"])) {
	$filenameexp=explode(".",$_FILES["namtextuploadfoto"]["name"]);
	$filenametype=count($filenameexp)-1;
	if ($_FILES["namtextuploadfoto"]["error"]==1) { $pesanpesan="Kebesaran coy!"; }
	else {
		if ($_FILES["namtextuploadfoto"]["type"]=="image/jpeg") {
			$acak=rand(1,999999999);
			if (move_uploaded_file($_FILES["namtextuploadfoto"]["tmp_name"],"tmp/".$acak.".tmp.".$filenameexp[$filenametype])) {
				$tmpfotobinary1=funimgresize("tmp/".$acak.".tmp.".$filenameexp[$filenametype],"tmp/".$acak."-1.tmp.".$filenameexp[$filenametype],160,240);
				$tmplokasifotobinary1="tmp/".$acak."-1.tmp.".$filenameexp[$filenametype];
				$tmpfotobinary2=funimgresize("tmp/".$acak.".tmp.".$filenameexp[$filenametype],"tmp/".$acak."-2.tmp.".$filenameexp[$filenametype],50,50);
				$tmplokasifotobinary2="tmp/".$acak."-2.tmp.".$filenameexp[$filenametype];
				$tmptype=$_FILES["namtextuploadfoto"]["type"];
				$tmptampil="tmp/".$acak."-1.tmp.".$filenameexp[$filenametype];
				unlink("tmp/".$acak.".tmp.".$filenameexp[$filenametype]);
			}
		}
		else { $pesanpesan="Bukan gambar coy!"; }
	}
}
if (empty($tmplokasifotobinary1)||!file_exists($tmplokasifotobinary1)) {
	$tmptampil="img/imgfotobinary.php?fotoid=".$fotoid."&tablename=tblpenumpangfoto&fieldname1=fotobinary1&fieldname2=fotobinarytype";
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
</head>

<body>
<form enctype="multipart/form-data" method="post" action="<?php echo($PHP_SELF); ?>">
<table cellpadding="0" cellspacing="0" border="0" class="clasembunyi">
<tr><td width="160" height="240" class="clasoftback">
<?php if(file_exists($tmplokasifotobinary1)||!empty($fotoid)) { ?>
<img style="max-width:160px; max-height:240px;" src="<?php echo($tmptampil); ?>">
<?php } ?>
</td></tr>
<tr><td height="5"></td></tr>

<tr><td><div style="position:relative; left:5px;">

<input type="file" style="filter:alpha(opacity=0); -moz-opacity:.0; opacity:.0; z-index:50;" name="namtextuploadfoto" id="namtextuploadfoto">
<div style="position:absolute; top:0px; left:5px; z-index:-1;"><button class="clabuttshort">Pilih...</button></div>
<div style="position:absolute; top:0px; left:75px;"><button class="clabuttshort" type="submit" name="namsubmitunggahfotosiswa" id="namsubmitunggahfotosiswa">Simpan</button></div>

</div></td></tr>


</table>
<input type="hidden" name="namtexttmplokasifotobinary1" id="namtexttmplokasifotobinary1" value="<?php echo($tmplokasifotobinary1); ?>">
<input type="hidden" name="namtexttmplokasifotobinary2" id="namtexttmplokasifotobinary2" value="<?php echo($tmplokasifotobinary2); ?>">
<input type="hidden" name="namtexttypefoto" id="namtexttypefoto" value="<?php echo($tmptype); ?>">
</form>
</body>
</html>

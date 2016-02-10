<?php
include("../inc/connect.php");
$selectimg=mysql_query("select ".$_GET["fieldname1"].",".$_GET["fieldname2"]." from ".$_GET["tablename"]." where fotoid='".$_GET["fotoid"]."'");

Header("Content-type: ".mysql_result($selectimg,0,$_GET["fieldname2"]));
print(mysql_result($selectimg,0,$_GET["fieldname1"]));
?>

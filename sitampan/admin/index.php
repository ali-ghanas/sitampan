
<?php
include "../lib/koneksi.php";
include "../lib/paginate.php";
include "../lib/function.php";
error_reporting(0);
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
header("location:login.php?act=1");
}
else
{
    ?>

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>APLIKASI SITAMPAN</title>
        
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
         <link href="../css/bootstrap-responsive.css" rel="stylesheet">
         <link href="../css/custom1.css" rel="stylesheet">
        <script src="../js/jquery.js"></script>
        <script src="../js/tabelfilter.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="favicon.jpg" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    </head>
    <body style="border: #000  solid 0px;padding: 0px 10px;background: #D3ECF9;">
        
        <div  style="left: auto" >
            <?php include_once "menu.php"; ?>
        </div>
        
           
                <div class="row-fluid">
                    
                    <div class="span2"
                         style="border: #000  solid 0px;padding: 10px 10px;
                         background: #f3f6fa;-webkit-border-radius: 6px;  -moz-border-radius: 6px;
                         border-radius: 6px;-webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
                        -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5); box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
                      ">
                       <?php include_once "menu_kiri.php"; ?>
                        
                    </div>
                    <div class="span10"
                         style="border: #000  solid 0px;padding: 10px 20px;
                         background: #f3f6fa;-webkit-border-radius: 6px;  -moz-border-radius: 6px;
                         border-radius: 6px;-webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
                        -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5); box-shadow: 0 1px 5px rgba(0, 0, 0, 0.5);
                      ">
                       <?php include_once "loader.php"; ?>
                        
                </div>
            </div>
            
    </body>
</html>
<?php
};
?>
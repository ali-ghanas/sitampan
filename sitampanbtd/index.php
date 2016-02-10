                    <!--===========================FreiChat=======START=========================-->
<!--	For uninstalling ME , first remove/comment all FreiChat related code i.e below code
	 Then remove FreiChat tables frei_session & frei_chat if necessary
         The best/recommended way is using the module for installation                         -->

<?php
include "lib/koneksi.php";

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 
        
 header("location:login.php?act=1");
 
  
}
else
{
    
    $login=$_SESSION['logged'];
    $batas=18000;
    $total=$login+$batas;
    
    $now=time();
    
    $userid=$_SESSION['id'];
    $ses=null;

        if(!function_exists("freichatx_get_hash")){
        function freichatx_get_hash($ses){

               if(is_file("C:/xampp/htdocs/sitampan/freichat/hardcode.php")){

                       require "C:/xampp/htdocs/sitampan/freichat/hardcode.php";

                       $temp_id =  $ses . $uid;

                       return md5($temp_id);

               }
               else
               {
                       echo "<script>alert('module freichatx says: hardcode.php file not
        found!');</script>";
               }

               return 0;
        }
        }
    if($userid)
{ 
    $ses = $userid; //tell freichat the userid of the current user

    setcookie("freichat_user", "LOGGED_IN", time()+3600, "/"); // *do not change -> freichat code
}
else {
    $ses = null; //tell freichat that the current user is a guest

    setcookie("freichat_user", null, time()+3600, "/"); // *do not change -> freichat code
} 
    
    if ($now > $total) {
        
        
        $jam = date("H:i:s");
        $logout=mysql_query("UPDATE log SET jamout='$jam',
                                      status='offline'
          WHERE username = '$_SESSION[username]' AND jamout='logged' AND status='online'");
        // mysql_query("INSERT INTO historybcf15(namaaksi,tanggalaksi,nama_user,nip_user,userdiupdate,nipuserdiupdate)VALUES('logout','$tglkini','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."','".$_SESSION['nm_lengkap']."','".$_SESSION['nip_baru']."')");
       
         
     
        
        if ($logout){
             session_destroy();
         session_unset();
         
            echo '<script type="text/javascript">window.location="login.php?act=1"</script>';
        
          
         
         
         
        }
        else {
            echo "tidak jalan scriptnya";
        }
    }
    

?>
        <script type="text/javascript" language="javascipt" src="http://192.168.39.35:8080/sitampan/freichat/client/main.php?id=<?php echo $ses;?>&xhash=<?php echo freichatx_get_hash($ses); ?>"></script>
	<link rel="stylesheet" href="http://192.168.39.35:8080/sitampan/freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css">
<!--===========================FreiChatX=======END=========================-->                
<?php


?>
    <html>
    <head>
       
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
       <link type="text/css" rel="stylesheet" href="themes/main.css" />
       <link rel="shortcut icon" href="favicon.jpg" />
    
           <script type="text/javascript">

          function ajax()
          {
          if (window.XMLHttpRequest)
          {
             xmlhttp=new XMLHttpRequest();
          }
          else
          {
             xmlhttp =new ActiveXObject("Microsoft.XMLHTTP");
          }

          xmlhttp.open("GET","sms/piket/run_piket.php");
          xmlhttp.send();
          setTimeout("ajax()", 5000);
          }
          </script>

   

</head>
    <body onload="ajax()">
               <h1><font color="#F3F3F3">SMS Auto Forwarding running...</font></h1>
        <?php error_reporting(0);?> 
       <?php include "lib/koneksi.php";
        include "lib/paginate.php";// untuk menyambungkan dengan paginate
        
        ?>
     <div id="groupmodul1" width="900">
         <div width="900" >
             <div width="900" >
                 <?php include_once "page/header.php"; ?>
             </div>
              
             <div width="900" >
                 <?php include "page/menu.php"; ?>
             </div>
             <div width="900"  >
                    <table border="0" width="100%" align="center" >
                        <tr ><td colspan="2" bgcolor="#fff" height="10"></td></tr>
                        <tr><td colspan="2"  ><?php include 'page/breadcrumb.php'; ?></td></tr>
                    </table>
                 
             </div>
            
         </div>
         <div width="900" >
                     <table border="0" width="100%" align="center" cellpadding="2" cellspacing="2">

                    <tr ><td colspan="2" bgcolor="#fff" height="30"></td></tr>
                    <tr><td colspan="2" bgcolor="#fdfdfd" heigth="auto" id="groupmodul1"><?php include "page/kotakloader.php"; ?></td></tr>


                    </table>
         </div>
         <div width="900" >
             <table border="0" width="100%" align="center" >
                <tr><td colspan="2"  ><?php include "page/footer.php"; ?></td></tr>
            </table>
         </div>
         
         
        
        
      </div>
    </body>
</html>
<?php
};
?>
<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']))
{
 header('location:index.php');
 echo 'Admin : Mohon Login dulu.';
 
}

else
{
  
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SITAMPAN-Sistem Informasi Tempat Penimbunan Pabean</title>
  
      <link rel="stylesheet" type="text/css" href="lib/js/jquery-ui/css/ui-lightness/jquery-ui-1.8.11.custom.css" />
        <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        
        <script type="text/javascript">
           $(document).ready(function(){
               $("#tanggal").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
        
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#ubahlevel").submit(function() {
                 if ($.trim($("#akses").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Level yang Anda pilih tidak sesuai");
                    $("#akses").focus();
                    return false;  
                 }
                  
                 
              });      
           });
        </script> 
         <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>


    <style type="text/css"> 
      div.pesan {
        height:250px;
        display:none;
        float: none;
      }
      div.pesan, p.flip {
        margin: 0px;
        padding: 5px;
        text-align: center;
        background: #fff;
        border: 1px solid black;
        cursor: pointer;
        
      }
      
      .ui-widget { 
      font-family: Arial,Verdana,sans-serif; 
      font-size: 1.0em;
   }  
   .ui-widget-header { 
      border: 1px solid #2b3846; 
      background: #2b3846;
      font-weight: bold; }
   .ui-widget-content { 
      border: 1px solid #2b3846; 
      background: #fcfcfd;
      color: #182e43; 
      
   }
   .tabs-bottom .ui-tabs-panel { 
      height: 450px; 
      overflow: auto; 
   } 
   .tabs-bottom .ui-tabs-nav { 
      position: absolute; 
      left: 0; 
      bottom: 0; 
      right:0; 
      padding: 0 0.2em 0.2em 0; 
   }  
   .tabs-bottom .ui-tabs-nav li { 
      margin-top: -2px; 
      margin-bottom: 1px; 
      border-bottom-width: 1px; 
      border-top: none;
      background: #fff;
   }
  #suratbataltpp ul li a  {
       background: #d6dceb;
   }
   .tabs-bottom .ui-tabs-nav li.ui-tabs-selected { 
      margin-top: -10px; 
      background: #eee;
   }   

     
    </style>
    <script type="text/javascript">
           $(document).ready(function() {
              $("#suratbataltpp").tabs({collapsible:"true"}).find(".ui-tabs-nav").sortable();
              $("#suratbataltpp").tabs({
                  fx:{
                      opacity :"toggle",
                      duration: "slow"
                  }
              })
           });
    </script>

</head>

<body>
<?php // aksi untuk edit
session_start();

if(isset($_POST['editsubmit1'])) // jika tombol editsubmit ditekan
	{               
		
		$_SESSION['level']=$_POST['akses'];
                $id=$_POST['id'];
		echo "<script type='text/javascript'>window.location='index.php?hal=ubahlevel&id=$id'</script>";
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM user,userhak,userlevel WHERE user.iduser=userhak.iduser and userlevel.iduserlevel=userhak.iduserlevel  and user.iduser=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        
        ?>
<div id="suratbataltpp">
                            
                              <ul>
                                  <li><a href="#tabs-1">Pegawai</a></li>   
                                  <li><a href="#tabs-2">Hak Akses App</a></li>  
                                  

                              </ul>
                        
                                <div id="tabs-1" >
	
                                
                                    <table border="0">
                                       
                                        <tr>
                                            <td class="isitabelnew">Username</td><td class="isitabelnew">:</td>
                                            <td ><input class="required" disabled name="username" size="40" type="text" value="<?php echo  $data['username']; ?>"  /></td>
                                        </tr>
                                        <tr>
                                              <td height="20" align="center" colspan="6" bgcolor="#dfe9ff"><b>DATA PEGAWAI</b></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Nama /Nip Pegawai</td><td class="isitabelnew">:</td>
                                            <td><input class="required" disabled name="nama" id="nama" type="text" value="<?php echo  $data['nm_lengkap']; ?>" />/<input disabled class="required" size="40" id="nip" name="nip" type="text" value="<?php echo  $data['nip_baru']; ?>" /><br /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Jabatan</td><td class="isitabelnew">:</td>
                                            <td><input class="required" disabled name="jabatan" id="jabatan" type="text" value="<?php echo  $data['jabatan']; ?>" /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Pangkat /Gol</td><td class="isitabelnew">:</td>
                                            <td><input class="required" disabled name="pangkat" id="pangkat" type="text" value="<?php echo  $data['pangkat']; ?>" />/<input disabled class="required" size="40" id="gol" name="gol" type="text" value="<?php echo  $data['gol']; ?>" /><br /></td>
                                        </tr>

                                    </table>
                                
                                </div>
                                <div id="tabs-2" >
                                <form method="post" id="ubahlevel" name="ubahlevel" action="?hal=ubahlevel">
                                <input type="hidden" name="id" value="<?php echo  $data['iduser']; ?>" />
                                <input type="hidden" name="kasta" value="<?php echo  $data['level']; ?>" />
                                    <table border="0">
                                        <tr align="center"> 
                                              <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>Pindah Level Akses</b> </td>
                                        </tr>
                                        <tr>
                                            <td class="isitabelnew">Username</td><td class="isitabelnew">:</td>
                                            <td ><input class="required" disabled name="username" size="40" type="text" value="<?php echo  $data['username']; ?>"  /></td>
                                        </tr>
                                        <tr>
                                              <td height="20" align="center" colspan="6" bgcolor="#dfe9ff"><b>DATA PEGAWAI</b></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Nama /Nip Pegawai</td><td class="isitabelnew">:</td>
                                            <td><input class="required" disabled name="nama" id="nama" type="text" value="<?php echo  $data['nm_lengkap']; ?>" />/<input disabled class="required" size="40" id="nip" name="nip" type="text" value="<?php echo  $data['nip_baru']; ?>" /><br /></td>
                                        </tr>

                                        <tr><td class="isitabelnew">Hak Akses</td><td class="isitabelnew">:</td><td> <select  class="required" id="akses" name="akses">

                                        <?php
                                            $sql = "SELECT * FROM userlevel,userhak where userlevel.iduserlevel=userhak.iduserlevel and userhak.iduser=$id ";
                                            $qry = @mysql_query($sql) or die ("Gagal query");
                                                while ($data =mysql_fetch_array($qry)) {
                                                    if ($data[level]==$_SESSION['level']) {
                                                        $cek="selected";
                                                        }
                                                   else {
                                                        $cek="";
                                                        }
                                                        echo "<option value='$data[level]' $cek>$data[nm_level] </option>";
                                                    }
                                        ?>
                                        </select></td>
                                        </tr>


                                         <tr><td></td><td></td><td><input class="button putih bigrounded " type="submit" name="editsubmit1" value="Pindah Level Akses" onclick="javascript:return confirm('Anda Yakin Untuk Pindah? ?')" /></td></tr>
                                         <tr>
                                            <td class="isitabelnew" colspan="3" bgcolor="#5b5973"><font color="#fff">Sekarang user Anda dapat menggunakan beberapa hak akses sekaligus. Untuk berpindah dari level akses satu ke lainnya "Pilih Level Akses yang anda tuju kemudian klik tombol <i>Pindah Level Akses</i>". Untuk menambahkan Level akses Anda Hubungi Admin.</font></td>
                                        </tr>
                                    </table>
                                </form>
                                </div>
        </div>
	<?php
        
        
        }; // penutup else
?>

</body>
</html>
<?php
};
?>
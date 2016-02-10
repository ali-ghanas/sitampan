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
              $("#useredit").submit(function() {
                 if ($.trim($("#Name").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> Nama Tak Boleh kosong");
                    $("#Name").focus();
                    return false;  
                 }
                  if ($.trim($("#Number").val()) == "") {
                    alert("<?php session_start(); echo "$_SESSION[nm_lengkap]..." ?> No HP Tak Boleh kosong");
                    $("#Number").focus();
                    return false;  
                 }
                
                 
              });      
           });
        </script> 

</head>

<body>
<?php // aksi untuk edit
session_start();

if(isset($_POST['editsubmit1'])) // jika tombol editsubmit ditekan
	{               
		$Name = $_POST['Name']; // variable nama = apa yang diinput pada name "nama" 
		$Number = $_POST['Number'];
		$GroupID = $_POST['GroupID'];
		
                $id = $_POST['id'];
		/*echo $nama;
		echo $nip;
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE pbk SET
							Name='$Name',
							Number='$Number',
							GroupID='$GroupID'
							
                        
					WHERE ID='$id'");
		echo '<script type="text/javascript">window.location="index.php?hal=sms_piket"</script>';
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "SELECT * FROM pbk WHERE ID=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>

<div class="span12" >
        <div style="background-color: #75C9EA;color:#FFF;border:1px">
                 <h3>EDIT PHONE BOOK</h3>
       </div> 
        <div>	
        <form method="post" id="useredit" name="useredit" action="?hal=editpbk">
        <input type="hidden" name="id" value="<?php echo  $data['ID']; ?>" />
            <table border="0" >
                <tr align="center"> 
                      <td height="22" colspan="6" bgcolor="#84B9D5" class="HEAD"><b>DATA PHONE BOOK</b> </td>
                </tr>
                <tr>
                    <td >NAMA PEGAWAI</td><td >:</td>
                    <td ><input  name="Name"  id="Name" type="text" value="<?php echo  $data['Name']; ?>"  /></td>
                </tr>
                
                <tr >
                    <td >NO HP</td><td >:</td>
                    <td><input  name="Number" id="Number" type="text" value="<?php echo  $data['Number']; ?>" />
                </tr>
                <tr >
                    <td >GROUP</td><td >:</td>
                    <td> <select   id="GroupID" name="GroupID">
                         <option value = "" >--pilih--</option>
                        <?php
                    $sql = "SELECT * FROM pbk_groups ";
                    $qry = @mysql_query($sql) or die ("Gagal query");
                        while ($data1 =mysql_fetch_array($qry)) {
                            if ($data1[ID]==$data['GroupID']) {
				$cek="selected";
                                }
                           else {
				$cek="";
                                }
                                echo "<option value='$data1[ID]' $cek>$data1[Name] </option>";
                            }
		    ?>
                         </select>
                    </td>
                </tr>
                
                 <tr><td></td><td></td><td><input class="button putih bigrounded " type="submit" name="editsubmit1" value="Update" onclick="javascript:return confirm('Anda Yakin  ?')" /></td></tr>
           
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
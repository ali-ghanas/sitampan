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
<?php // aksi untuk edit
 require_once 'lib/function.php'; 

        
        
	$sql1 = "SELECT * FROM bcfcontainer WHERE idcontainer=$id"; // memanggil data dengan id yang ditangkap tadi
	$query1 = mysql_query($sql1);
	$data1 = mysql_fetch_array($query1);
        

if(isset($_POST['editsubmit2'])) // jika tombol editsubmit ditekan
	{                       
		$txtnobcf15 = $_POST['txtnobcf15']; // variable nama = apa yang diinput pada name "nama" 
		$txtnocontainer = $_POST['txtnocontainer'];
		$txtsize = $_POST['txtsize'];
		$idbcf15=$_POST['idbcf15'];
		$id = $_POST['id'];
                $id2 = $_POST['id2'];
		/*echo $nama;
		echo $nip;$txtnocontainer
		echo $username;
		echo $password;*/
		$edit = mysql_query("UPDATE bcfcontainer SET
							nocontainer='$txtnocontainer',
                                                        idsize='$txtsize'
							
					WHERE idcontainer='$id'");
                
//                echo "<meta http-equiv='refresh' content='0; url=?hal=bcfedit&id=$id2'>";
		echo "<script type='text/javascript'>window.location='index.php?hal=bcfedit&id=$id2'</script>";
        }
        else 
	{
           
            
	$id = $_GET['id']; // menangkap id
        $id2 = $_GET['id2'];   
        
        
	$sql = "SELECT * FROM bcfcontainer WHERE idcontainer=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$data = mysql_fetch_array($query);
        
        ?>
<div id="kotakdetail">
	
        <form method="post" id="editcon" name="maneditcont" action="?hal=maneditcont">
       <input type="hidden" name="id2" value="<?php echo $id2 ?>" />
       <input type="hidden" name="id" value="<?php echo  $data['idcontainer']; ?>" /> <input type="hidden" name="idbcf15" value="<?php echo  $data['idbcf15']; ?> "/>
            <table border="0">
                
            <tr>
                <td>No BCF 1.5</td>
                <td>:</td>
                <td><input class="required" name="txtnobcf15" type="text" value="<?php echo  $data['bcf15no']; ?>" /><br /></td>
            </tr>
            
            <tr>
                <td>No Container</td>
                <td>:</td>
                <td><input  class="required" name="txtnocontainer" type="text" value="<?php echo  $data['nocontainer']; ?>" /><br /></td>
            </tr>
            <tr>
                <td>Size</td>
                <td>:</td>
                <td><input class="required" name="txtsize" type="text" value="<?php echo  $data['idsize']; ?>" /><br /></td>
            </tr>
            
            <tr><td></td><td></td><td><input class="button putih bigrounded " type="submit" name="editsubmit2" value="Edit" /></td></tr>
           
            </table>
        </form>
</div>       
	<?php
        
        
        }; // penutup else
?>
<?php
};
?>


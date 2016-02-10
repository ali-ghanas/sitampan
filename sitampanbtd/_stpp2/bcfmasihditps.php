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
<?php 
session_start();
$no=0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Daftar Data Koleksi</title>
<!--        <link href="../style/admin.css" rel="stylesheet" type="text/css"></link>-->
        
    </head>
    <body>
        <form name="form1" method="POST" action="?hal=masihditps">
        <table width="800" border="0" cellspacing="1" cellpadding="2" bgcolor="#CCCCCC" class="keliling">
             
            <tr>
                <td colspan="6" bgcolor="#CCFF33">
                    <b>URUTKAN DATA</b>
                </td>
            </tr>
            <tr>
                <td colspan="6" bgcolor="#CCFF99">
                    <table width="100%" border="1" cellspacing="1" cellpadding="0">
                        <tr>
                                    <td width="22" align="right" ><b>TPP :</b></td>
                                    <td width="78%"><select name="cmbtpp">
                                            <option value="" selected>[All TPP]</option>
                                        <?php
                                        $sql="SELECT * FROM tpp ORDER BY idtpp";
                                        $qry=@mysql_query($sql) or die("Gagal Queryku");
                                        while ($data=  mysql_fetch_array($qry)) {
                                            if ($data[nm_tpp]==$_POST['cmbtpp']) {
                                                $cek="selected";
                                                }
                                                else {
                                                    $cek="";

                                                }
                                                echo "<option value='$data[idtpp]' $cek>$data[nm_tpp]</option>";
                                        }
                                        ?>
                                    </td>
                            </tr>
                            
                            <tr>
                                <td>
                                <input name="tbshow" type="submit" value="Show"></input></td>
                            </tr>
                    </table>
                </td>
                
            <tr bgcolor="#FFFFFF">
                <td colspan="6">&nbsp;</td>
                
            </tr>
            <tr>
                <td colspan="6" bgcolor="#CCFF33">
                    <b>Daftar BCF 1.5 Yang Masih Di TPS</b>
                </td>
            </tr>
            
            <tr>
                <td width="22" bgcolor="#CCFF99"><b>No</b></td>
                

                <td width="63" align="center" bgcolor="#CCFF99">
                    <b>No BCF 1.5</b>                  
                </td>
                <td width="63" align="center" bgcolor="#CCFF99">
                    <b>No BC 1.1</b>                  
                </td>
                <td width="63" align="center" bgcolor="#CCFF99">
                    <b>No BL</b>                  
                </td>
                <td width="63" align="center" bgcolor="#CCFF99">
                    <b>Consignee</b>                  
                </td>
                <td width="63" align="center" bgcolor="#CCFF99">
                    <b>Notify</b>                  
                </td>
                
                <td width="63" align="center" bgcolor="#CCFF99">
                    <b>Operasi</b>                  
                </td>
                
            </tr>
            <?php
            if (! trim($_POST['cmbtpp'])=="") {
                $sql="SELECT * FROM bcf15 WHERE idtpp='".$_POST['cmbtpp']."' and masuk='2' ";
                
                
            }
            
            
            else {
                $sql="SELECT * FROM bcf15 where masuk='2'";
            }
            $qry = mysql_query($sql)
                    or die ("Gagal Querynya");
            while ($data =  mysql_fetch_array($qry)) {
                $no++;
            
                
            ?>
            <tr bgclor="#FFFFFF">
                <td align="center"><?php echo $no; ?></td>
                <td><? echo $data['bcf15no'];?></td>

                <td align="right">
                    <? echo $data['bc11no'];?>
                    
                </td>
                <td align="right">
                    <? echo $data['blno'];?>
                    
                </td>
                <td align="right">
                    <? echo $data['consignee'];?>
                    
                </td>
                <td align="right">
                    <? echo $data['notify'];?>
                    
                </td>
                
                <td align="center"><a href="?hal=sprintview&id=<?php echo  $data['idbcf15']; ?>">Lihat</a>
                                        
                               
                </td>
            </tr>
                <?php 
            }
            ?>
            
                
        </table>
            </form>
    </body>
</html>
<?php
};
?>
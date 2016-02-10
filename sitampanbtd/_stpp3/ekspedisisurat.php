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
<html>
    <head>
    <title>Cetak Ekspedisi</title>
    <!--       jquery anytimes -->
       
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
           $(document).ready(function(){
               $("#tanggal1").datepicker({
                   dateformat:"Y-m-d",
                   changemonth:true,
                   changeyear:true,
                   yearrange:"-100:+0"
               });
           });
        </script>
    
    </head>
    <body>
        <table>
            <tr>
                <td><a href=index.php?hal=ekspedisi&pilih=inputsurmum><img src="images/new/tambahmtk.png" width="20"/>Tambah Ke Ekspedisi</a></td>
            </tr>
        </table>	     
        <form method="post" id="ekspedisi" name="ekspedisi" action="report/cetakekspedisi.php" target="new">
        
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="6">
                <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>Cetak Ekspedisi</b> </td></tr>
                <tr>
                    <td  align="left" width="20%">Tanggal Awal: </td> 
                    <td width="20" coslpan="3"><input name="txttgldari" id="tanggal" class="required" type="text" value="" ></input></td>
                    <td  align="left" width="20%">Tanggal Akhir: </td> 
                    <td width="20" coslpan="3"><input name="txttglsampai" id="tanggal1" class="required" type="text" value="" ></input></td>
                    
                        
                    </td> 
                </tr>
                <tr>
                    <td  align="left" width="20%">Pilih Yang Mau Dicetak: </td> 
                    <td width="20" coslpan="3"><input name="check1" class="required" type="checkbox" value="pos" /> Ekspedisi Pos</td>
                    
                </tr>
                <tr>
                    <td  align="left" width="20%"></td> 
                    <td width="20" coslpan="3"><input name="check2" class="required" type="checkbox" value="intern" /> Ekspedisi Intern</td>
                    
                </tr>
                
                
             
                
            <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
            <tr><td><input class="button putih bigrounded " type="submit" name="cetakekspedisi" value="Cetak" /></td><td><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
            
            </table>
        </form>
        
        <table border="0" width="100%">
                <tr>
                <td colspan="4"><font face=arial size=2><?php include "_stpp3/pilih.php";?></font></td>
                </tr>
      
        </table>
            

</body>
</html>
<?php
};
?>
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
        <script type="text/javascript" src="lib/js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="lib/js/anytimes/anytime.js">
        </script>
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
        
           
        <form method="post" id="cetakpemberitahuanall" name="cetakpemberitahuanall" action="report/cetakpemberitahuanall_rgsurat.php" target="new">
        
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="6">
                <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>Cetak Pemberitahuan</b> </td></tr>
                <tr>
                    <td  align="left" width="20%">Tanggal Surat Awal: </td> 
                    <td width="20" coslpan="3"><input name="txttgldari" id="tanggal" class="required" type="text" value="" ></input>
                    <td  align="left" width="20%">Tanggal Surat Akhir: </td> 
                    <td width="20" coslpan="3"><input name="txttglsampai" id="tanggal1" class="required" type="text" value="" ></input>
                    
                        
                    </td> 
                </tr>
                <tr>
                    <td  align="left" width="20%">No Surat Awal: </td> 
                    <td width="20" coslpan="3"><input name="suratawal" id="" class="required" type="text" value="" ></input>
                    <td  align="left" width="20%">No Surat Akhir: </td> 
                    <td width="20" coslpan="3"><input name="suratakhir" id="" class="required" type="text" value="" ></input>
                    
                        
                    </td> 
                </tr>
             
                
            <tr align="left"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>Cat: Parameternya tanggal surat pemberitahuan</b> </td></tr>
            <tr><td><input class="button putih bigrounded " type="submit" name="cetakpemberitahuanall" value="Cetak" /></td><td><input class="button putih bigrounded " type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
            
            </table>
        </form>
      
        
     
</body>
</html>
<?php
};
?>
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
        <title>Pencarian BCF 1.5</title>
    </head>
    <body>
        
         
      <div align="left"><font size="5" face="tahoma">Pencarian Data</font><hr color=#CCCCFF></div>
        <fieldset>
            <table border="0" width="500" align="center" cellpadding=0 cellspacing=0>
                
</tr>

                    <tr>
                        <td><font size="3" color="red">Pilih Kategori Pencarian </font></td>
                        <td><select >
                                <option value="?hal=caribcf_cont">Berdasarkan BCF 1.5</option>
                                <option >Berdasarkan No Container</option>
                                <option >Berdasarkan Nama Barang</option>
                                <option >Berdasarkan Dokumen Pengeluaran</option>
                            </select></td>
                    </tr>
                    
            </table>
            </fieldset>
        <fieldset>
            <table border="0" width="500" align="center" cellpadding=0 cellspacing=0>

                <tr><td><?php include ""; ?></td></tr>
                        
            </table>
            </fieldset>
<!--        <table border="0" width="100%">
            <tr><td colspan="2">Pilih Cara Pencarian BCF 1.5 dibawah ini:</td></tr>
            <tr><td width="10%"><img src="images/container.png"  ></img></td><td><a href="?hal=caribcf_cont">Pencarian berdasarkan Container</a></td></tr>
            <tr><td width="10%"><img src="images/bus.png"  ></img></td><td><a href="?hal=caribcf_cont">Pencarian berdasarkan Nama Barang</a></td></tr>
            <tr><td width="10%"><img src="images/bcf15.png" ></img></td><td><a href="?hal=caribcf_cont">Pencarian berdasarkan Nama No BCF 1.5</a></td></tr>
        </table>-->
    </body>
</html>
<?php
};
?>
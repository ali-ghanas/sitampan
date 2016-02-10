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
        
                               
<form id="form1" name="form1" method="post" action="?hal=lap_data&pilih=lap_masuk">

                                    <table width="100%" border="0" align="center" >
                                        <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>Cek Total BCF 1.5 Masuk  TPP</b> </td></tr>

                                        
                                        <tr>

                                            <td  align="left" >Tgl Awal : </td> 
                                            <td colspan="2" ><input name="txttgldari" id="tanggal" class="required" type="text" value="<?php echo $_POST['txttgldari'] ?>" ></input>
                                            sd : 
                                            <input name="txttglsampai" id="tanggal1" class="required" type="text" value="<?php echo $_POST['txttglsampai'] ?>" ></input>


                                            </td> 
                                        </tr>
                                        


                                    <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
                                    <tr><td><input class="button putih bigrounded " type="submit" value="Cek Total" name="search"/></td><td><input type="button" value="Cancel" class="button putih bigrounded " onclick="self.history.back()" /></td></tr>

                                    </table>
                                </form>
        
        <?php // aksi untuk edit
session_start();

if(isset($_POST['search'])) // jika tombol editsubmit ditekan
	{               
    
    $masuk = '1';
    
    
    $txttgldari = $_POST['txttgldari'];
    $txttglsampai = $_POST['txttglsampai'];
//    $tahun=$_GET['tahun'];
    $tpp = $_POST['tpp'];
    
     
        }
        ?>
        <?php session_start(); $sql = mysql_query ("SELECT idbcf15,bcf15no,bamasukdate FROM bcf15 where  (bamasukdate between '$txttgldari'  and '$txttglsampai' )  and masuk='$masuk' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >Total BCF 1.5 Periode <?php echo $txttgldari ?> sd <?php echo $txttglsampai ?> yang masuk TPP = <?php echo $jumlah1;?></a>

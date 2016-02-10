<html>
    <head>
    <title>Eksport Data Untuk Saldo Akhir Ke Excel</title>
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
       
	     
        <form name="form1" method="get" action="report/export/exporttoexcelprosessaldo.php">
        
            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="6">
                <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>Eksport Data</b> </td></tr>
<!--                <tr>
                    <td>Pilih Tahun</td>
                    <td width="20" coslpan="3"><select name="tahun" id="" class="required" type="text" value="" >
                            <option value="">--all--</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            
                            
                        </select></td>
                </tr>-->
                <tr>
                    <td>Pilih TPP</td>
                    <td width="20" coslpan="3"><select name="tpp" id="" class="required" type="text" value="" >
                            <option value="">--Silahkan Pilih--</option>
                            <option value="1">Tripandu Pelita</option>
                            <option value="2">Transcon Indonesia</option>
                            <option value="3">Multi Sejahtera Abadi</option>
                            <option value="4">Layanan Lancar Lintas Logistindo</option>
                        </select></td>
                </tr>
                <tr>
                    
                    <td  align="left" width="20%">Masukkan Tanggal : </td> 
                    <td width="20" coslpan="3"><input name="txttgldari" id="tanggal" class="required" type="text" value="" ></input>
                    <td  align="left" width="20%">Sampai Tanggal : </td> 
                    <td width="20" coslpan="3"><input name="txttglsampai" id="tanggal1" class="required" type="text" value="" ></input>
                    
                        
                    </td> 
                </tr>
                <tr>
                    <td>Masuk TPP</td>
                    <td width="20" coslpan="3"><select name="masuk" id="" class="required" type="text" value="" >
                            <option value="">--Pilih--</option>
                            <option value="1">Ya</option>
                            <option value="2">Tidak</option>
                            
                        </select></td>
                </tr>
                
             
                
            <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b></b> </td></tr>
            <tr><td><input type="submit" value="Search" name="search"/></td><td><input type="button" value="Cancel" onclick="self.history.back()" /></td></tr>
            
            </table>
        </form>
      
        
    

</body>
</html>



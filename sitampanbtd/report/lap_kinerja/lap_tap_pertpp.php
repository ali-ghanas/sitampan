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
        
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#form1").submit(function() {
                 if ($.trim($("#tpp").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> TPP Harus Di pilih dulu");
                    $("#tpp").focus();
                    return false;  
                 }
                 
              });      
           });
        </script>                         
<form id="form1" name="form1" method="post" action="?hal=lap_data&pilih=lap_tpp">

                                    <table width="100%" border="0" align="center" >
                                        <tr align="center"><td height="22" colspan="4" bgcolor="#84B9D5" class="HEAD"><b>Download Data BCF 1.5 Per Kontainer</b> </td></tr>

                                        <tr>
                                            <td>Pilih TPP</td>
                                            <td>
                                                <select class="required" id="tpp" name="tpp">
                                                <option value = "" >::::...:::Pilih TPP:::...::::</option>
                                                <?php
                                                    $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                                    $qry = @mysql_query($sql) or die ("Gagal query");
                                                        while ($data =mysql_fetch_array($qry)) {
                                                            if ($data[idtpp]==$_POST['tpp']) {
                                                                $cek="selected";
                                                                }
                                                           else {
                                                                $cek="";
                                                                }
                                                                echo "<option value='$data[idtpp]' $cek>$data[nm_tpp]</option>";
                                                            }
                                                ?>
                                                 </select>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td  align="left" >Tgl Awal : </td> 
                                            <td colspan="2" ><input name="txttgldari" id="tanggal" class="required" type="text" value="<?php echo $_POST['txttgldari'] ?>" ></input>
                                            sd : 
                                            <input name="txttglsampai" id="tanggal1" class="required" type="text" value="<?php echo $_POST['txttglsampai'] ?>" ></input>


                                            </td> 
                                        </tr>
                                        <tr>
                                            <td>Pilih Ukuran Cont</td>
                                            <td>
                                                <select class="required" id="size" name="size">
                                                <option value = "" >Pilih Size Container</option>
                                                <option value = "20" >20'</option>
                                                <option value = "40" >40'</option>
                                                <option value = "45" >45'</option>
                                                <option value = "0" >LCL</option>
                                                 </select>
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
    
    $size = $_POST['size'];
    
    $txttgldari = $_POST['txttgldari'];
    $txttglsampai = $_POST['txttglsampai'];
//    $tahun=$_GET['tahun'];
    $tpp = $_POST['tpp'];
    
     
        }
        ?>
        <?php session_start(); $sql = mysql_query ("SELECT bcf15.idbcf15,bcf15.bcf15no,bcf15tgl,idcontainer,bcfcontainer.idbcf15 FROM bcf15,bcfcontainer where bcf15.idbcf15=bcfcontainer.idbcf15 and  (bcf15tgl between '$txttgldari'  and '$txttglsampai' ) and bcf15.idtpp LIKE '$tpp' and idsize='$size' ");$jumlah1 = mysql_num_rows ($sql);?> </font> 	<span ><font color="#800000" >Total Container Size <?php echo $size;  ?> = <?php echo $jumlah1;?></a>

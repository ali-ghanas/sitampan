<?php
include "lib/koneksi.php";
include "lib/function.php";
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
    <title>Ubah BCF 15</title>
    <!--       jquery anytimes -->
         <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>
<!--        <script type="text/javascript" src="lib/js/jquery.tools.min.js"></script>-->
         
        <script type="text/javascript">
           $(document).ready(function() {    
              $("#stripping").submit(function() {
                 
                
                 
                 if ($.trim($("#nosrt").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> No Surat Kosong Harap diisi");
                    $("#nosrt").focus();
                    return false;  
                 }
                 if ($.trim($("#tglsrt").val()) == "") {
                    alert("<?php session_start(); echo "Maaf $_SESSION[nm_lengkap]..." ?> Tanggal surat kosong, Harap diisi");
                    $("#tglsrt").focus();
                    return false;  
                 }
                 
                 
              });      
           });
        </script>
        

        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               
               $('#tglsrt').mask('99/99/9999');
               
           });
         </script>
         <script type="text/javascript">
      $(document).ready(function() {
	       $('#ceksemua').click(function () {
		        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
	       });
      });  
    </script>
    <script type="text/javascript"> 
      $(document).ready(function(){
        $(".flip").click(function(){
          $(".pesan").slideToggle("slow");
        });
      });
    </script>
    <script type="text/javascript"> 
      $(document).ready(function(){
        	$("#flowtabs").tabs("#flowpanes > div");


	    });
	</script>


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
        background: #bed4e9;
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
      background: #f1f2f9;
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
      background: #f1f2f9;
   }
  #suratbataltpp ul li a  {
       background: #f1f2f9;
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
    <script type="text/javascript">
      $(document).ready(function() {
  	    $(':input:not([type="submit"])').each(function() {
	        $(this).focus(function() {
	            $(this).addClass('hilite');
	        }).blur(function() {
	            $(this).removeClass('hilite');});
	     });
      });  
    </script>    
    <style>   
      .hilite{
	       background-color: #adb9eb;
      }
    </style>  
    </head>
    <body>
       
        
	     <?php // aksi untuk edit
session_start();

	$id = $_GET['id']; // menangkap id
        $sql = "select *  FROM bcf15,tpp,typecode WHERE bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        
        $sqlstrip = "select *  FROM suratmasukstripping where idbcf15='$bcf15[idbcf15]'"; // memanggil data dengan id yang ditangkap tadi
        $querystrip = mysql_query($sqlstrip);
        $datastrip = mysql_fetch_array($querystrip);
        
	
        ?>
        <div id="kotakinput">
        
            <form enctype="multipart/form-data" action="arsip/stripping/uploaddokproses.php" method="POST">
                <input name="idsuratmasukstripping" type="hidden" value="<?php echo $datastrip['idsuratmasukstripping'] ?>" />
                <input name="idbcf15" type="hidden" value="<?php echo $bcf15['idbcf15'] ?>" />
                
                <table width="100%" border="0" align="center" cellpadding="0" >
                
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>UPLOAD HASIL SCAN SURAT-SURAT STRIPPING</b></td></tr>
                
                <tr>
                    <td>
                        <table class="data isitabel" width="100%">
                            <tr>
                                <td class="isitabelnew" width="25%">No BCF 1.5</td><td class="isitabelnew">:</td><td><?php echo "$bcf15[bcf15no]"; ?></td>
                                <td class="isitabelnew">Tgl</td><td class="isitabelnew">:</td><td><?php echo tglindo($bcf15[bcf15tgl]); ?></td>
                            </tr>
                            <tr>
                                <td class="isitabelnew">No /Pos BC 1.1 </td><td class="isitabelnew">:</td><td><?php echo "$bcf15[bc11no]"; ?> Pos  <?php echo "$bcf15[bc11pos]"; ?> Sub Pos <?php echo "$bcf15[bc11subpos]"; ?></td>
                                <td class="isitabelnew">Tgl</td><td class="isitabelnew">:</td><td><?php echo tglindo($bcf15[bc11tgl]); ?></td>
                            </tr>
                            <tr>
                                <td class="isitabelnew">Consignee </td><td class="isitabelnew">:</td><td><?php echo "$bcf15[consignee]"; ?></td>
                                
                            </tr>
                            <tr>
                                <td class="isitabelnew">Notify </td><td class="isitabelnew">:</td><td><?php echo "$bcf15[notify]"; ?></td>
                                
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <table class="data isitabel">
                                                <tr class=highlight1>
                                                    <th class="isitabel" colspan="2">Tgl Dok Lengkap</th>
                                                    <th class="isitabel" colspan="2">Persetujuan Stripping</th>
                                                    <th class="isitabel" colspan="2">Persetujuan Empty</th>
                                                    
                                                    
                                                </tr>
                                                <tr class=highlight2>
                                                    <th class="isitabel">
                                                        Tgl
                                                    </th>
                                                    <th class="isitabel">
                                                        User
                                                    </th>
                                                    <th class="isitabel">
                                                        Nomor
                                                    </th>
                                                    <th class="isitabel">
                                                        Tgl
                                                    </th>
                                                    <th class="isitabel">
                                                        Nomor
                                                    </th>
                                                    <th class="isitabel">
                                                        Tgl
                                                    </th>
                                                    
                                                </tr>
                                                <tr class=highlight1>
                                                   <td class="isitabel" align="center">
                                                        <?php if($datastrip['tgl_lengkap']=='0000-00-00 00:00:00'){echo "<a href='#'><img src=images/new/delete.png /></a>";} else {echo $datastrip['tgl_lengkap'];} ?>
                                                    </td>
                                                    <td class="isitabel" align="center">
                                                        <?php if($datastrip['user_permohonan']=='') {echo "";} else{echo $datastrip['user_permohonan'];} ?>
                                                    </td>
                                                    <td class="isitabel" align="center">
                                                        <?php if($datastrip['nopersetujuanstriping']==''){echo "<a href=?hal=pagebcf15pemwas&pilih=formstriping_setstrip&id=$datastrip[idbcf15]><img src=images/new/delete.png /></a>";} else {echo $datastrip['nopersetujuanstriping'];} ?>
                                                    </td>
                                                    <td class="isitabel" align="center">
                                                        <?php if($datastrip['tgpersetujuanstriping']=='0000-00-00'){echo "";}  else {echo tglindo($datastrip['tgpersetujuanstriping']);}?>
                                                    </td>
                                                    <td class="isitabel" align="center">
                                                        <?php if($datastrip['nosetujuempty']=='')  {echo "<a href=?hal=pagebcf15pemwas&pilih=formstriping_setstrip&id=$datastrip[idbcf15]><img src=images/new/delete.png /></a>";} else {echo $datastrip['nosetujuempty'];}?>
                                                    </td>
                                                    <td class="isitabel" align="center">
                                                       <?php if($datastrip['tglsetujuempty']=='0000-00-00'){echo "";}   else {echo tglindo($datastrip['tgpersetujuanstriping']);} ?>
                                                    </td>
                                                    
                                                </tr>
                                            </table>
                                </td>
                            </tr>
                        </table>
                        
                        <div id="suratbataltpp">
                            
                              <ul>
                                  <li><a href="#tabs-1">Form Upload</a></li>  
                                  <li><a href="#tabs-2">Hasil Upload</a></li>  
                              </ul>
                        
                                <div id="tabs-1" >
                                    <table class="isitabel" border="0" bgcolor="#98badd">
                                        <tr>
                                            <td  ><font color="#000" >Pilih File PDF</font></td><td width="3">:</td>
                                            <td colspan="4">
                                                <input  type="hidden" name="MAX_FILE_SIZE" value="3000000000000000000000000" />
                                                <input class="required" size="40" name="userfile" type="file" />

                                            </td>

                                        </tr>
                                        <tr>
                                            <td  ><font color="#000" >Tentukan Jenis Dokumen</font></td><td width="3">:</td>
                                            <td colspan="4">
                                                <select class="required" name="jenis_dok" id="jenis_dok">
                                                    <option value="">::Jenis Dokumen::</option>
                                                    <option value="1">NHP</option>
                                                    <option value="2">SetujuStripping</option>
                                                    <option value="3">SetujuEmptyCont</option>
                                                    <option value="4">Lainnya</option>
                                                </select>
                                            </td>

                                        </tr>

                                        <tr>
                                            <td colspan="5"><input type="submit" class="button putih bigrounded " value="Upload PDF" /></td>
                                        </tr>







                                    </table>
                                                
                                    
                           </div>
                            <div id="tabs-2" >
                                <table class="data isitabel">
                                    <tr>
                                        <td bgcolor="#d2d945" colspan="5">
                                             <span  style="text-decoration: none;color: #273372;font-size: 11pt; font-weight: bolder;font-family: verdana;">File -file Stripping</span> 
                                        </td>
                                    </tr>
                                
                                <?php
                                
                                    $querystrip  = "SELECT * FROM arsip_stripping,user where arsip_stripping.iduser=user.iduser and   idbcf15=$datastrip[idbcf15]";
                                    $hasilstrip  = mysql_query($querystrip);
                                    
                                    while($data1 = mysql_fetch_array($hasilstrip))
                                       
                                    {
                                        if($data1[jenis_dok]=='1'){$jenis_dok = "NHP";}
                                        elseif($data1[jenis_dok]=='2'){$jenis_dok = "Stripping";}
                                        elseif($data1[jenis_dok]=='3'){$jenis_dok = "Empty";}
                                        elseif($data1[jenis_dok]=='4'){$jenis_dok = "Lainnya";}
                                        if ($j==0) { // untuk membuat warna tiap row table berbeda dan warna berubah ketika mouse hover
                                            echo "<tr class=highlight1>";
                                            $j++;
                                            }
                                        else
                                            {
                                            echo "<tr class=highlight2>";
                                            $j--;
                                            }

                                     
                                    ?>
                                    
                                    <td class="isitabeljarak"><a href="arsip/stripping/download.php?id=<?php echo $data1[idarsip_stripping] ?>&jenis_dok=<?php echo $data1[jenis_dok] ?>"><u><?php echo  $data1['name'];   ?></u></a></td>
                                    <td  class="isitabeljarak"><?php echo   $jenis_dok  ?></td>
                                    <td  class="isitabeljarak"><?php echo $data1['size'];   ?> kb</td>
                                    <td  class="isitabeljarak"><?php echo $data1['tgl_upload'];    ?></td>
                                    <td  class="isitabeljarak"><?php echo $data1['nm_lengkap'];    ?></td>
                                    <?php 
                                    }?>
                                </table>
                                
                                    
                            </div>
                                
                            
                            
                            </div>
                    </td>
                </tr>
                
                <tr>
                
                </tr>
                
            
            </table>
                
<!--                <table>
                    <tr>
                        <td>Hasil Upload PDF</td>
                        <td>
                            
                        </td>
                    </tr>
                    
                </table>-->
            </form>
    
        
	
           </div>     

</body>
</html>
<?php
};
?>
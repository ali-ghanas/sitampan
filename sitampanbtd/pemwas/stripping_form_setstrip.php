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
    <title></title>
    <!--       jquery anytimes -->
        
       <script type="text/javascript" src="lib/js/spritelymenu/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript" src="lib/js/jquery.maskedinput-1.3.min.js"></script>
<!--        <script type="text/javascript" src="lib/js/jquery.tools.min.js"></script>-->
         
<!--        <script type="text/javascript">
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
        </script>-->
        

        <script type="text/javascript">
           $(document).ready(function() {
               $.mask.definitions['~']='[+-]';
               
               $('#tgpersetujuanstriping').mask('99/99/9999');
               $('#tglnhp').mask('99/99/9999');
               $('#tglsetujuempty').mask('99/99/9999');
               $('#tglbastrip').mask('99/99/9999');
               
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


        if(isset($_POST['setstrip'])) // jika tombol editsubmit ditekan
	{ 
                
            $id=$_POST['id'];
            $setujustrip=$_POST['setujustrip'];
            $nopersetujuanstriping=$_POST['nopersetujuanstriping'];
            $tgpersetujuanstripingsql=$_POST['tgpersetujuanstriping'];
            $tgpersetujuanstriping=sql($tgpersetujuanstripingsql);
            $nonhp=$_POST['nonhp'];
            $tglnhpsql=$_POST['tglnhp'];
            $tglnhp=sql($tglnhpsql);
            $nocontainerbeforeaddslash=$_POST['nocontainerbefore'];
            $nocontainerbefore=addslashes($nocontainerbeforeaddslash);
            $nocontainerafteraddslash=$_POST['nocontainerafter'];
            $nocontainerafter=addslashes($nocontainerafteraddslash);
            
            $nipinputperset=$_SESSION['nip_baru'];
            
            $tglrekam_setujustrip=date('Y-m-d H:i:s');
            
            
            
                $sql = "SELECT * FROM suratmasukstripping where idbcf15='$id' ";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    $edit = mysql_query("UPDATE suratmasukstripping SET
                            
                                        setujustrip='$setujustrip',
                                        nopersetujuanstriping='$nopersetujuanstriping',
                                        tgpersetujuanstriping='$tgpersetujuanstriping',
                                        nonhp='$nonhp',
                                        tglnhp='$tglnhp',
                                        
                                        nipinputperset='$nipinputperset',
                                        tglrekam_setujustrip='$tglrekam_setujustrip',
                                        nocontainerbefore='$nocontainerbefore',
                                        nocontainerafter='$nocontainerafter'
                        
                                WHERE idbcf15='$id'");
                     echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15pemwas&pilih=formstriping&id=$id'</script>";
                }
                                
                else
                {
                    
                    
                }
        }
        if(isset($_POST['setempty'])) // jika tombol editsubmit ditekan
        {   
            $id=$_POST['id'];
            $niprekamempty=$_SESSION['nip_baru'];
            $tglrekamsetempty=date('Y-m-d H:i:s');
            $nosetujuempty=$_POST['nosetujuempty'];
            $tglsetujuempty=sql($_POST['tglsetujuempty']);
            $nobastrip=$_POST['nobastrip'];
            $tglbastrip=sql($_POST['tglbastrip']);
            
            if($nosetujuempty==''){$setujuempty='0';} else{$setujuempty='1';}
            $edit = mysql_query("UPDATE suratmasukstripping SET
                            
                                        
                                        nosetujuempty='$nosetujuempty',
                                        tglsetujuempty='$tglsetujuempty',
                                        nobastrip='$nobastrip',
                                        tglbastrip='$tglbastrip',
                                        setujuempty='$setujuempty',
                                        niprekamempty='$niprekamempty',
                                        tglrekamsetempty='$tglrekamsetempty'
                        
                                WHERE idbcf15='$id'");
                     echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15pemwas&pilih=formstriping&id=$id'</script>";
        }
        else 
	{ 
	$id = $_GET['id']; // menangkap id
	$sql = "select *  FROM bcf15,tpp,typecode WHERE bcf15.idtypecode=typecode.idtypecode and bcf15.idtpp=tpp.idtpp and idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
	$query = mysql_query($sql);
	$bcf15 = mysql_fetch_array($query);
        $tglsurat=view($bcf15['SuratBatalDate']);
        
        
       
        ?>
        <form method="post" id="stripping" name="stripping" action="?hal=pagebcf15pemwas&pilih=formstriping_setstrip">
        <input type="hidden" name="id" value="<?php echo  $bcf15['idbcf15']; ?>" />
        <input type="hidden" name="status" id="status" value="<?php echo $bcf15['idstatusakhir']; ?>" />
            <table width="100%" border="0" align="center" cellpadding="0" >
                
                <tr><td height="20" align="center" colspan="5" bgcolor="#dfe9ff">&nbsp;&nbsp;<b>PERMOHONAN STRIPING CONTAINER DI TPP</b></td></tr>
                
                <tr>
                    <td>
                        <table class="data isitabel" width="60%">
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
                        </table>
                        <?php
                        $sqlstrip = "select *  FROM suratmasukstripping where idbcf15=$id"; // memanggil data dengan id yang ditangkap tadi
                        $querystrip = mysql_query($sqlstrip);
                        $datastrip = mysql_fetch_array($querystrip);
                        
                        ?>
                        <div id="suratbataltpp">
                            
                              <ul>
                                  <li><a href="#tabs-1">Persetujuan Stripping</a></li>  
                                  <li><a href="#tabs-2">Persetujuan Pengeluaran Empty</a></li>  
                                  
                              </ul>
                        
                                <div id="tabs-1" >
                                    <table class="data isitabel">
                                        <tr>
                                            <td bgcolor="#d2d945" colspan="4">
                                                <span  style="text-decoration: none;color: #273372;font-size: 11pt; font-weight: bolder;font-family: verdana;">Rekam Surat Pesetujuan Striping Container</span> 
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Setuju Stripping</td><td>:</td><td><input class="required"  type="checkbox"  name="setujustrip" id="setujustrip" value="1"  <?php  if($datastrip['setujustrip'] == '1'){echo 'checked="checked"';}?> /> Ya</td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">No Surat Persetujuan</td><td>:</td><td><input class="required"  type="text" size="35" name="nopersetujuanstriping" id="nopersetujuanstriping" value="<?php echo $datastrip['nopersetujuanstriping'] ?>" /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Tgl</td><td>:</td><td><input class="required"  type="text" size="10" name="tgpersetujuanstriping" id="tgpersetujuanstriping" value="<?php echo my_ke_tgl($datastrip['tgpersetujuanstriping'])?>" />(DD-MM-YYYY)</td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">No NHP</td><td>:</td><td><input class="required"  type="text" size="30" name="nonhp" id="nonhp" value="<?php echo $datastrip['nonhp'] ?>" /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Tgl</td><td>:</td><td><input class="required"  type="text" size="10" name="tglnhp" id="tglnhp" value="<?php echo my_ke_tgl($datastrip['tglnhp'])?>" />(DD-MM-YYYY)</td>
                                        </tr>
                                         <?php
                                                $columns = 20; //tentukan banyaknya kolom yang diinginkan


                                                $query = "select * from  bcfcontainer where idbcf15=$bcf15[idbcf15] ";
                                                $result = mysql_query($query);
                                                
                                                $num_rows = mysql_num_rows($result);
                                                
                                                
                                                
                                                
                                               
                                                
                                                ?> 
                                        <tr >
                                            <td class="isitabelnew">No Container Asal *)</td><td>:</td><td>
                                                <textarea class="required"  type="text"  name="nocontainerbefore" cols="50" rows="3" id="nocontainerbefore" >
                                                <?php 
                                                for($i = 0; $i < $num_rows; $i++) {
                                                $row = mysql_fetch_array($result);
                                                if($i % $columns == 0) {

                                                
                                                }
                                                  $container=$row[nocontainer]."/".$row[idsize].", ";
                                                  echo isset($container) ? $container : ''; 
                                                    if(($i % $columns) == ($columns - 1) || ($i + 1) == $num_rows) {

                                                    
                                                    }
                                                }
                                                
                                                ?>
                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Pindah Ke **)</td><td>:</td><td><textarea class="required"  type="text"  name="nocontainerafter" cols="50" rows="3" id="nocontainerafter" ><?php echo isset($datastrip['nocontainerafter']) ? $datastrip['nocontainerafter'] : '';?></textarea></td>
                                        </tr>
                                        
                                        <tr height=50><td colspan=3 bgcolor='#1e2233'><span style='text-decoration: none;color: #fff;font-size: 11pt; font-weight: bolder;font-family: verdana;'>*) Isikan No Container Mis : TCKU872399/20 (1x20)<br/>**) Isikan Nama LCL dan Nama Gudang, Mis : LCL Gudang B. Jika Cont Isikan No Container Lengkap  Mis: TCKU9823991/20,TCKU637472/20 dst</span></td></tr>
                                        <tr>
                                            <td colspan="3"><input type="submit" name="setstrip" value="Simpan" class="button putih " onclick="javascript:return confirm('Simpan Persetujuan Stripping?')"  /></td>
                                        </tr>
                                       
                                    </table>
                                                
                                    
                                </div>
                                <div id="tabs-2" >
                                    <table class="data isitabel">
                                        <tr>
                                            <td bgcolor="#d2d945" colspan="4">
                                                <span  style="text-decoration: none;color: #273372;font-size: 11pt; font-weight: bolder;font-family: verdana;">Rekam Persetujuan Pengeluaran Empty Container</span> 
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">No Surat Persetujuan Empty</td><td>:</td><td><input class="required"  type="text" size="50" name="nosetujuempty" id="nosetujuempty" value="<?php echo $datastrip['nosetujuempty'] ?>" /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Tgl</td><td>:</td><td><input class="required"  type="text" size="10" name="tglsetujuempty" id="tglsetujuempty" value="<?php echo my_ke_tgl($datastrip['tglsetujuempty'])?>" />(DD-MM-YYYY)</td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">No BA Stripping</td><td>:</td><td><input class="required"  type="text" size="50" name="nobastrip" id="nobastrip" value="<?php echo $datastrip['nobastrip'] ?>" /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Tgl</td><td>:</td><td><input class="required"  type="text" size="10" name="tglbastrip" id="tglbastrip" value="<?php echo my_ke_tgl($datastrip['tglbastrip'])?>" />(DD-MM-YYYY)</td>
                                        </tr>
                                        
                                        
                                        
                                        <tr>
                                            <td colspan="3"><input type="submit" name="setempty" value="Simpan" class="button putih " onclick="javascript:return confirm('Simpan ?')"  /></td>
                                        </tr>
                                       
                                    </table>
                                                
                                    
                                </div>
                                
                            
                            
                            </div>
                    </td>
                </tr>
                
                <tr>
                
                </tr>
                
            
            </table>
        </form>
        
        
	<?php
                    
                
               

                    }; // penutup else
            ?>
     
            

</body>
</html>
<?php
};
?>
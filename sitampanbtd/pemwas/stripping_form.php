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


        if(isset($_POST['submit1'])) // jika tombol editsubmit ditekan
	{ 
                
            $id=$_POST['id'];
            $status_permohonan='Permohonan Lengkap';
            $yalengkap=$_POST['yalengkap'];
            $Catatan_hanggar=$_POST['Catatan_hanggar'];
            $user_permohonan=$_SESSION['nip_baru'];
            $tgl_lengkap=date('Y-m-d H:i:s');
            
                $sql = "SELECT * FROM suratmasukstripping where idbcf15='$id' ";
                $query = mysql_query($sql);
                $cek=mysql_numrows($query);
                if($cek>0){
                    $edit = mysql_query("UPDATE suratmasukstripping SET
                                        yalengkap='$yalengkap',
                                        Catatan_hanggar='$Catatan_hanggar',
                                        status_permohonan='$status_permohonan',
                                        tgl_lengkap='$tgl_lengkap'
                        
                                WHERE idbcf15='$id'");
                     echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15pemwas&pilih=formstriping&id=$id'</script>";
                }
                                
                else
                {
                    
                    
                }
        }
        elseif(isset($_POST['setstrip'])){
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
            $lokasistriping=$_POST['lokasistriping'];
            $nipinputperset=$_SESSION['nip_baru'];
            
            $tglrekam_setujustrip=date('Y-m-d H:i:s');
            $edit = mysql_query("UPDATE suratmasukstripping SET
                            
                                        setujustrip='$setujustrip',
                                        nopersetujuanstriping='$nopersetujuanstriping',
                                        tgpersetujuanstriping='$tgpersetujuanstriping',
                                        nonhp='$nonhp',
                                        tglnhp='$tglnhp',
                                        lokasistriping='$lokasistriping',
                                        nipinputperset='$nipinputperset',
                                        tglrekam_setujustrip='$tglrekam_setujustrip',
                                        nocontainerbefore='$nocontainerbefore',
                                        nocontainerafter='$nocontainerafter'
                        
                                WHERE idbcf15='$id'");
                     echo "<script type='text/javascript'>window.location='index.php?hal=pagebcf15pemwas&pilih=formstriping&id=$id'</script>";
        }
        elseif(isset($_POST['setempty']))
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
        <form method="post" id="stripping" name="stripping" action="?hal=pagebcf15pemwas&pilih=formstriping">
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
                                  <li><a href="#tabs-1">Permohonan Striping</a></li>  
                                  <?php
                                  
                                  if($datastrip[setujustrip]=='1'){
                                      echo "<li><a href='#tabs-2'>Persetujuan Stripping</a></li>  ";
                                  }
                                  if($datastrip[setujuempty]=='1'){
                                      echo "<li><a href='#tabs-3'>Persetujuan Empty Cont</a></li>  ";
                                  }
                                  else{}
                                  ?>
                                  
                              </ul>
                        
                                <div id="tabs-1" >
                                    <table class="data isitabel">
                                        <tr>
                                            <td bgcolor="#d2d945" colspan="4">
                                                <span  style="text-decoration: none;color: #273372;font-size: 11pt; font-weight: bolder;font-family: verdana;">Cek Kelengkapan Permohonan Stripping</span> 
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">No Surat</td><td>:</td><td><input class="required" disabled type="text" size="50" name="nosrt" id="nosrt" value="<?php echo $datastrip['nosrt'] ?>" /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Tanggal</td><td>:</td><td><input class="required" disabled type="text" size="10" name="tglsrt" id="tglsrt" value="<?php echo my_ke_tgl($datastrip['tglsrt'])?>" />(DD-MM-YYYY)</td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">TPP</td><td>:</td>
                                            <td>
                                                <select class="required" id="idtpp" name="idtpp" disabled >
                                                    <option value = "" >--T P P--</option>
                                                    <?php
                                                        $sql = "SELECT * FROM tpp ORDER BY idtpp";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                            while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idtpp]==$bcf15[idtpp]) {
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
                                        <tr >
                                            <td class="isitabelnew">Agen Pengangkut</td><td>:</td>
                                            <td>
                                                <select class="required" id="idpelayaran" disabled name="idpelayaran" >
                                                    <option value = "" >--Pelayaran--</option>
                                                    <?php
                                                        $sql = "SELECT * FROM pelayaran ORDER BY idpelayaran";
                                                        $qry = @mysql_query($sql) or die ("Gagal query");
                                                            while ($data =mysql_fetch_array($qry)) {
                                                                if ($data[idpelayaran]==$bcf15[idpelayaran]) {
                                                                    $cek="selected";
                                                                    }
                                                               else {
                                                                    $cek="";
                                                                    }
                                                                    echo "<option value='$data[idpelayaran]' $cek>$data[nm_pelayaran]</option>";
                                                                }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Berkas Lengkap</td><td>:</td><td><input class="required"  type="checkbox"  name="yalengkap" id="yalengkap" value="1"  <?php  if($datastrip['yalengkap'] == '1'){echo 'checked="checked"';}?> /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Catatan Hanggar</td><td>:</td><td><textarea class="required"  type="text"  name="Catatan_hanggar" cols="50" rows="1" id="Catatan_hanggar" ><?php echo isset($datastrip['Catatan_hanggar']) ? $datastrip['Catatan_hanggar'] : '';?></textarea></td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td colspan="3"><input type="submit" name="submit1" value="Simpan" class="button putih " onclick="javascript:return confirm('Simpan ?')"  /></td>
                                        </tr>
                                        <?php
                                        $sql = "SELECT * FROM suratmasukstripping where idbcf15='$id' ";
                                        $query = mysql_query($sql);
                                        $cek=mysql_numrows($query);
                                        if($cek>0){
                                            echo "<tr height=50><td colspan=3 bgcolor='#eaecf6'>";
                                        
                                        ?>
                                            <table class="data isitabel">
                                                <tr class=highlight1>
                                                    <th class="isitabel" colspan="2">Tgl Dok Lengkap</th>
                                                    <th class="isitabel" colspan="2">Persetujuan Stripping</th>
                                                    <th class="isitabel" colspan="2">Persetujuan Empty</th>
                                                    <th class="isitabel" colspan="2">Arsip</th>
                                                    
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
                                                    <th class="isitabel">
                                                        Upload
                                                    </th>
                                                    <th class="isitabel">
                                                        Download
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
                                                    <td class="isitabel" align="center">
                                                        <a href="?hal=uploadstrip&id=<?php echo $datastrip[idbcf15]  ?>"><img src="images/new/upload.jpg" width="40" /></a>
                                                    </td>
                                                    <td class="isitabel" align="center">
                                                       <a href="?hal=uploadstrip&id=<?php echo $datastrip[idbcf15]  ?>#tabs-2"><img src="images/new/download.jpg" width="30" /></a>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php 
                                        echo "</td></tr>";
                                        
                                        };
                                        ?>
                                    </table>
                                                
                                    
                                </div>
                            <?php
                                if($datastrip[setujustrip]=='1'){
                            ?>
                            <div id="tabs-2" >
                                 <table class="data isitabel">
                                        <tr>
                                            <td bgcolor="#d2d945" colspan="4">
                                                <span  style="text-decoration: none;color: #273372;font-size: 11pt; font-weight: bolder;font-family: verdana;">Surat Pesetujuan Striping Container</span> 
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
                                        <tr >
                                            <td class="isitabelnew">No Container Asal *)</td><td>:</td><td><textarea class="required"  type="text"  name="nocontainerbefore" cols="50" rows="1" id="nocontainerbefore" ><?php echo isset($datastrip['nocontainerbefore']) ? $datastrip['nocontainerbefore'] : '';?></textarea></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Pindah Ke **)</td><td>:</td><td><textarea class="required"  type="text"  name="nocontainerafter" cols="50" rows="1" id="nocontainerafter" ><?php echo isset($datastrip['nocontainerafter']) ? $datastrip['nocontainerafter'] : '';?></textarea></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Lokasi Stripping</td><td>:</td><td><input class="required"  type="text" size="30" name="lokasistriping" id="lokasistriping" value="<?php echo $datastrip['lokasistriping'] ?>" /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Pemeriksa</td><td>:</td><td><input class="required"  type="text" size="30" name="nipinputperset" disabled id="nipinputperset" value="<?php echo $datastrip['nipinputperset'] ?>" /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Tgl Rekam</td><td>:</td><td><input class="required"  type="text" size="30" name="tglrekam_setujustrip" disabled id="tglrekam_setujustrip" value="<?php echo $datastrip['tglrekam_setujustrip'] ?>" /></td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="3"><input type="submit" name="setstrip" value="Simpan" class="button putih " onclick="javascript:return confirm('Simpan Persetujuan Stripping?')"  /></td>
                                        </tr>
                                       
                                    </table>
                            </div>
                            <?php 
                                }
                                if($datastrip[setujuempty]=='1'){
                                    
                            ?>
                           
                            
                            <div id="tabs-3" >
                                <table class="data isitabel">
                                        <tr>
                                            <td bgcolor="#d2d945" colspan="4">
                                                <span  style="text-decoration: none;color: #273372;font-size: 11pt; font-weight: bolder;font-family: verdana;">Persetujuan Pengeluaran Empty Container</span> 
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
                                        <tr >
                                            <td class="isitabelnew">Pemeriksa</td><td>:</td><td><input class="required"  type="text" size="30" name="niprekamempty" disabled id="niprekamempty" value="<?php echo $datastrip['niprekamempty'] ?>" /></td>
                                        </tr>
                                        <tr >
                                            <td class="isitabelnew">Tgl Rekam</td><td>:</td><td><input class="required"  type="text" size="30" name="tglrekamsetempty" disabled id="tglrekamsetempty" value="<?php echo $datastrip['tglrekamsetempty'] ?>" /></td>
                                        </tr>
                                        
                                        
                                        
                                        <tr>
                                            <td colspan="3"><input type="submit" name="setempty" value="Simpan" class="button putih " onclick="javascript:return confirm('Simpan ?')"  /></td>
                                        </tr>
                                       
                                    </table>
                            </div>
                              <?php 
                                }
                                ?>  
                            
                            
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
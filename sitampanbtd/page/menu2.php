
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title></title>
    <link type="text/css" href="themes/main.css" rel="stylesheet" />
    
    
   
<!--        <style type="text/css">
        * { margin:0;
            padding:0;
        }
        
        div#menu {
            margin:5px auto;
            width:1024;
        }
        div#copyright {
            margin:0 auto;
            width:1%;
            font:1px 'Trebuchet MS';
            color:#00000;
            text-indent:1px;
            padding:1px 0 0 0;
        }
        div#copyright a { color:#FFFFFF; }
        div#copyright a:hover { color:#FFFFFF; }
        </style>-->

</head>
<body>

<?php 
session_start();


if($_SESSION['level']=="admin") {
    echo "<div >
           
          
          <ul class='nav nav-tabs' >
          
              
          
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home'>Home</a>
                <ul>
                    <li><a href='?hal=chat' class='parent'><span>Chating</span></a> </li>  
                </ul>
          </li>
          <li ><a href='?hal=pageadmin'>Super Admin</a>
          <ul>
                  <li ><a href='?hal=pageadmin_data' >Impor / Ekspor Data</a></li>  
                  <li ><a href='?hal=pageadmin_data_perhari' >Update Data Perhari</a></li> 
                  
             </ul>
          </li>
          <li ><a href='#'>Setting Aplikasi</a>
              <ul>
                      <li ><a href='?hal=inputtgllibur' >Input Tgl Libur</a></li>  
                      <li ><a href='?hal=tbl_bcf15_browse' >Update Tabel BCF 1.5</a></li>
                      <li ><a href='?hal=add_event' >Tambah Event Kegiatan</a></li>
                      <li ><a href='?hal=daf_event' >Daftar Event Kegiatan</a></li>
                      

                 </ul>
          </li>
          
          <li ><a href='#' >BTD</a>
          <ul>
                  
                  <li><a href='?hal=newkonfirmasi' target='_blank'>Loket Konfirmasi</a></li>
                  <li><a href='?hal=newpembatalan' target='_blank'>Loket Pembatalan</a></li>
                  <li><a href='?hal=batal_btlbcf' target='_blank'>Batal Pembatalan BCF 15</a></li>
          </ul>
            </li>
            <li ><a href='sms/master.php' >Aplikasi SMS</a></li>
            <li ><a href='../sitampanfilemanager/index.php' >File Manager</a></li>
            
         
            
          </ul>
          
        </div>";
        
}
else if($_SESSION['level']=="manifest") {
    echo "<div >
         <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home'>Home</a></li>
          <li><a href='?hal=pagemanifest&pilih=addbcf15' >BCF 1.5</a></li>
          
            
            <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont' >Berdasarkan Container</a></li>
                 
                  
                </ul>
            </li>
            <li><a href='?hal=lap_bcfterbit'>REPORT</a></li>
            <li><a href='?hal=daftarsp'>Arsip SP</a></li>
        
       </ul>
     </div>";
}
else if($_SESSION['level']=="tpp3") {
    echo "<div >
            
          
          <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home'>Home</a></li>
          
          <li><a href='#'>Input</a>
                <ul>
                  <li><a href='?hal=suratpemberitahuan' target='_blank'>Surat Pemberitahuan</a></li>
                  <li><a href='?hal=suratpemberitahuanall' >Cetak Surat Pemberitahuan All</a></li>
                  <li><a href='?hal=suratpemberitahuanall_rgsurat' target='_blank'>Cetak Surat Pemberitahuan All Berdasarkan No Surat</a></li>
                  <li><a href='?hal=cetakamplop' target='_blank'>Cetak Amplop Pemberitahuan All</a></li>
                  <li><a href='?hal=ekspedisi' target='_blank'>Cetak Ekspedisi Surat Pemberitahuan</a></li>
                  <li><a href='?hal=sptahu_balik_bro' >Surat Pemberitahuan Yang Balik Pos</a></li>
                </ul>
         </li>
          
          
         <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari' target='_blank'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont' target='_blank'>Berdasarkan Container</a></li>
                  <li><a href='?hal=daftararsip'><img src=images/new/view.png /> Tracking Arsip</a></li>
                </ul>
         </li>
         <li><a href='#'>Blokir </a>
                <ul>
                  <li><a href='?hal=blokir' >Daftar Blokir</a></li>
                  <li><a href='?hal=input_blokir' >Input</a></li>
                  
                </ul>
         </li>
         <li><a href='#'>Upload Dokumen </a>
                <ul>
                  <li><a href='?hal=redressbrowse' target='_self'>Redress</a></li>
                  <li><a href='?hal=set_reeks_browse' target='_self'>Setuju Reekspor</a></li>
                  
                </ul>
         </li>
         <li><a href='#'>SMS CENTER </a>
                <ul>
                  <li><a href='?hal=sms_piket' >PEMBERITAHUAN PIKET</a></li>
                  
                </ul>
         </li>
             </ul>
               
                </div>";
}
else if($_SESSION['level']=="seksitpp3") {
    echo "<div > 
          
          <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home'>Home</a></li>
          
          
         <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari' >BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont' >Berdasarkan Container</a></li>
                  <li><a href='?hal=daftararsip'><img src=images/new/view.png /> Tracking Arsip</a></li>
                </ul>
         </li>
         <li><a href='?hal=lap_bcfterbit'>REPORT</a></li>
         <li ><a href='../sitampanfilemanager/index.php' >File Manager</a></li>
         
             
             </ul>   
                </div>";
}
else if($_SESSION['level']=="tpp2") {
    echo "<div>
          
         <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home'>Home</a>
            <ul>
                  <li><a href='page/chat/index.php'>Chatting</a></li>
                  <li><a href='?hal=colorpic'>Olah Warna</a></li>
                </ul>
            </li>
          
          
         <li><a href='?hal=pagemonitoring' >Monitoring</a></li>
         <li><a href='#'>Tunda Lelang </a>
                <ul>
                  <li><a href='?hal=tundalelang'>Daftar Permohonan Tunda Lelang</a></li>
                  <li><a href='?hal=daf_intundalelang'>Input Tunda Lelang</a></li>
                  
                </ul>
         </li>
         
         <li><a href='#'>Tutup Pos BCF 1.5 </a>
                <ul>
                  <li><a href='?hal=tutuposbcf15'>Daftar BCF 1.5 Yang ditutup</a></li>
                  <li><a href='?hal=daf_intutuppos'>Input Tutup POS BCF 1.5</a></li>
                  
                </ul>
         </li>
         
         
         <li><a href='#'>Upload Dokumen </a>
                <ul>
                  <li><a href='?hal=redressbrowse' target='_self'>Redress</a></li>
                  <li><a href='?hal=set_reeks_browse' target='_self'>Setuju Reekspor</a></li>
                  
                </ul>
         </li>
         <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont'>Berdasarkan Container</a></li>
                  <li><a href='?hal=daftararsip'><img src=images/new/view.png /> Tracking Arsip</a></li>
                </ul>
         </li>
         <li><a href='?hal=lap_bcfterbit'>REPORT</a></li>
          <li><a href='#'>BPK </a>
                <ul>
                  <li><a href='?hal=lap_bpk_allbcf15'>ALL BCF 1.5</a></li>
                  
                </ul>
         </li>
         
        
         </div>";
}

else if($_SESSION['level']=="adminmanifest") {
    echo "<div >
          
        <ul class='nav nav-tabs' >
                <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
                <li ><a href='?hal=home'>Home</a></li>
                <li ><a href='?hal=pageadminman'>Admin</a></li>
                <li ><a href='?hal=pagebcf15'>BCF 1.5</a></li>
                <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont'>Berdasarkan Container</a></li>
                  
                </ul>
         </li>

          </ul>
         </div>";
}
else if($_SESSION['level']=="seksimanifest") {
    echo "<div>
          
         <ul class='nav nav-tabs' >
                <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
                <li ><a href='?hal=home'>Home</a></li>
                
                <li ><a href='?hal=pagebcf15'>BCF 1.5</a></li>
                <li><a >Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont'>Berdasarkan Container</a></li>
                  
                </ul>
         </li>

          </ul>
         </div>";
}
else if($_SESSION['level']=="seksitpp2") {
    echo "<div>
          
          <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home'>Home</a></li>
          
          
         <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont'>Berdasarkan Container</a></li>
                  
                </ul>
         </li>
         
         </ul> 
         
         
             
             
                </div>";
}

else if($_SESSION['level']=="loket") {
    echo "<div >
          
          <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home' target='_self'>Home</a></li>
          
          <li><a href='#'>Input Surat Masuk </a>
                <ul>
                  <li><a href='?hal=addsuratmasuk' target='_self' >Surat Masuk Umum</a></li>
                  <li><a href='?hal=pagefront' target='_self'>Surat Masuk Pembatalan BCF 1.5</a></li>
                  <li><a href='?hal=suratmasukok' target='_self'>Cari Surat Masuk</a></li>
                  
                </ul>
         </li>
         <li><a href='#'>Konfirmasi </a>
                <ul>
   
                  <li><a href='?hal=newkonfirmasi' target='_self'>Konfirmasi KonsepBaru</a></li>
                  
                </ul>
         </li>
         <li><a href='#'>Pembatalan </a>
                <ul>
                  
                  <li><a href='?hal=newpembatalan' target='_self'>Pembatalan KonsepBaru</a></li>
                  <li><a href='?hal=cetak_buku_batal' target='_self'>Cetak Buku Agenda</a></li>
                  
                </ul>
         </li>
          
         
         <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari' target='_self'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont' target='_self'>Berdasarkan Container</a></li>
                  <li><a href='?hal=daftararsip'><img src=images/new/view.png /> Tracking Arsip</a></li>
                </ul>
         </li>
         <li><a href='#' >Lainnya </a>
                <ul>
                  <li><a href='?hal=loketbatarik' target='_self'>Input BA Penarikan</a></li>
                  <li><a href='?hal=redressbrowse' target='_self'>Redress</a></li>
                  <li><a href='?hal=loketpecahpos' target='_self'>Pecah Pos</a></li>
                  <li><a href='?hal=lap_belumpindahtpp' target='_self'>Lamp Ke Duktek</a></li>
                  
                </ul>
         </li>
         <li><a href='?hal=lap_bcfterbit'>REPORT</a></li>
        
       
                 
       
              </ul>   
        
        </div>";
}
else if($_SESSION['level']=="front") {
    echo "<div >
          
          <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home' target='_self'>Home</a></li>
          
         <li><a href='?hal=addsuratmasuk' target='_self' >Surat Masuk Umum</a></li>
         <li><a href='?hal=suratmasukok' target='_self'>Cari Surat Masuk</a></li>
         <li><a href='?hal=pagefront' target='_self'>Permohonan Batal BCF 1.5</a></li>
         
         
         
         <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari' target='_self'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont' target='_self'>Berdasarkan Container</a></li>
                  
                </ul>
         </li>
          <li><a href='?hal=chat' class='parent'><span>Chating</span></a> </li> 
          
                 
       
              </ul>   
        
        </div>";
}



else if($_SESSION['level']=="pemwastpp") {
    echo "<div >
          
          <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home'>Home</a></li>
          
          <li><a href='?hal=pagebcf15pemwas'>BTD</a></li>
          <li><a href='bmn/index.php'>BMN</a></li>
         <li><a href='#'>Download </a>
                <ul>
                  
                  <li><a href='?hal=downloadtoexcelbtd'>Saldo BTD</a></li>
                  
                </ul>
         </li>
        
        <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont'>Berdasarkan Container</a></li>
                  <li><a href='?hal=daftararsip'><img src=images/new/view.png /> Tracking Arsip</a></li>
                </ul>
         </li>
        
         <li><a href='#'>Report </a>
                <ul>
                  <li><a href='?hal=lap_bcfterbit'>REPORT</a></li>
                  <li><a href='?hal=lap_data'>Resume Data Base</a></li>
                  
                </ul>
         </li>
         <li ><a href='../sitampanfilemanager/index.php' >File Manager</a></li>
        
         
         
         </ul>   
        
        </div>";
}
else if($_SESSION['level']=="adminp2") {
    echo "<div >
          
        <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home'>Home</a></li>
          <li><a href='?hal=berita' target='_blank'><blink>Berita</blink></a></li>
          <li><a href='#'>Admin</a>
                <ul>                   
                   <li><a href='?hal=addseksip2' >Input Seksi P2</a></li>
                   <li><a href='?hal=browseseksip2' >View Seksi P2</a></li>
                   <li><a href='?hal=adduserp2' >Input User P2</a></li>
                   <li><a href='?hal=browseuserp2' >View User P2</a></li>
                   
                </ul>
          </li>
        
        <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont'>Berdasarkan Container</a></li>
                  
                </ul>
         </li>
        <li><a href='?hal=lap_bcfterbit'>REPORT</a></li>
        
         </ul>   
        
        </div>";
}
else if($_SESSION['level']=="stafp2") {
    echo "<div>
       <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home'>Home</a></li>
          
          <li><a  href='?hal=daftarconf'>Konfirmasi BCF 1.5 </a>
           <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont'>Berdasarkan Container</a></li>
                  
                </ul>
         </li>     
         </li>
        
        
        
         </ul>   
        
        </div>";

}
else if($_SESSION['level']=="view") {
     echo "<div>
       <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home'>Home</a></li>
          
          
           <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont'>Berdasarkan Container</a></li>
                  
                </ul>
         </li>   
         <li><a href='#'>Download Data </a>
                <ul>
                  <li><a href='?hal=lap_bpk_allbcf15'>ALL BCF 1.5</a></li>
                  
                </ul>
         </li>
         </li>
        
        
        
         </ul>   
        
        </div>";
}
else if($_SESSION['level']=="kabidppc") {
     echo "<div >
       <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=home'>Home</a></li>
          
          
          <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont'>Berdasarkan Container</a></li>
                  
                </ul>
         </li>

         <li ><a href='?hal=saldobtdkabid'>Saldo BTD</a></li>
         
         <li><a href='?hal=lap_bcfterbit'>REPORT</a></li>
        
        
        
         </ul>   
        
        </div>";
}
else if($_SESSION['level']=="hanggar") {
    echo "<div >
         <ul class='nav nav-tabs' >
          <li ><a href='?hal=logout'><span>Log Out&nbsp;: ".$_SESSION['nm_lengkap']."</span></a></li>
          <li ><a href='?hal=ubahlevel&id=$_SESSION[iduser]'><span>Ubah Level</span></a></li>
          <li ><a href='?hal=home'>Home</a></li>
          <li><a href='#'>Download</a>
                <ul>
                  <li><a href='?hal=down_bcftrbt' >ALL DATA</a></li>
                  
                  
                </ul>
         </li>
         <li><a href='#'>Upload</a>
                <ul>
                  
                  <li><a href='?hal=upload_hgr' >BA dan Cont Masuk</a></li>
                  <li><a href='?hal=upload_hgrout' >BCF dan Cont Keluar</a></li>
                  <li><a href='?hal=upload_out_valid' >Validasi Upload</a></li>
                </ul>
         </li>
          
            
            <li><a href='#'>Pencarian </a>
                <ul>
                  <li><a href='?hal=bcf15cari'>BCF 1.5</a></li>
                  <li><a href='?hal=caribcf_cont' >Berdasarkan Container</a></li>
                 
                  
                </ul>
            </li>
        
       </ul>
     </div>";
}


?>




</body>

</html>



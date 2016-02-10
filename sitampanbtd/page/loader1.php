<?php 
session_start();
switch($_REQUEST['hal'])
{
case '':$page = include 'page/dashboard.php';break;//default
case 'login':$page=  include 'login.php';break;
case 'logintest':$page=  include 'login_test.php';break;
case 'loginsubmit':$page=  include 'loginsubmit.php';break;
case 'logout' :$page=  include 'logout.php';break;
case 'logoutalluser' :$page=  include 'logoutall.php';break;
case 'gantipass' :$page=  include 'gantipassword.php';break;
case 'updatepass' :$page=  include 'updatepass.php';break;
case 'updateuser' :$page=  include 'updateuser.php';break;
case 'home':$page = include 'page/home.php';break;
case 'berita':$page = include '';break;
case 'artikel':$page = include 'berita/index.php';break;
case 'inputberita':$page = include '/page/dinding/index.php';break;
case 'user_info':$page = include 'page/userinfo.php';break;
case 'edit_user':$page = include 'useredit.php';break;
case 'ubahlevel':$page = include 'ubahlevelakses.php';break;


case 'bcf15cont':$page=  include 'manifest/cobainputcont.php';break;

case 'bcf15contdel':$page=  include 'manifest/input_bcf15contdel.php';break;
case 'bcf15view':$page=  include 'manifest/bcfview.php';break;
case 'bcf15viewcari':$page=  include 'manifest/bcfview.php';break;

case 'bcf15edit':$page=  include 'manifest/bcfedit.php';break;
case 'bcfedit':$page=  include 'manifest/bcfedit.php';break;
case 'maneditcont':$page=  include 'manifest/editcontainer.php';break;
case 'manincont':$page=  include 'manifest/insertcontainer.php';break;
case 'mandelcont':$page=  include 'manifest/mandelcont.php';break;
case 'bcf15del':$page=  include 'manifest/bcf15del.php';break;
case 'manifest':$page=  include 'manifest/manifest.php';break;
case 'advancecari':$page=  include 'manifest/advancesearch.html';break;
case 'allbcf15':$page=  include 'manifest/allbcf15.php';break;
case 'grafik_bukapos':$page=  include 'report/lap_kinerja/chart_garis_bukaposbc11.php';break;

case 'spcetak':$page=  include 'manifest/suratpengantarcetak.php';break;
case 'pagemanifest':$page=  include 'manifest/pagemanifest.php';break;

case 'seksiadd':$page=  include 'adminseksimanifest/inputseksi.php';break;
case 'usermanadd':$page=  include 'adminseksimanifest/inputuser.php';break;
case 'tpsadd':$page=  include 'adminseksimanifest/inputtps.php';break;
case 'tppadd':$page=  include 'adminseksimanifest/inputtpp.php';break;
case 'browsetps':$page=  include 'adminseksimanifest/tps.html';break;
case 'browsetpp':$page=  include 'adminseksimanifest/tpp.html';break;
case 'browseseksi':$page=  include 'adminseksimanifest/seksi.php';break;
case 'seksiedit':$page=  include 'adminseksimanifest/seksiedit.php';break;
case 'browseuser':$page=  include 'adminseksimanifest/user.php';break;
case 'browsebcf15':$page=  include 'adminseksimanifest/bcf15.php';break;
case 'useredit':$page=  include 'adminseksimanifest/useredit.php';break;
case 'userdel':$page=  include 'adminseksimanifest/userdel.php';break;
case 'helpadminmanifest':$page=  include 'adminseksimanifest/help.html';break;
case 'pageadminman':$page=  include 'adminseksimanifest/pageadmin.php';break;
case 'pagebcf15':$page=  include 'adminseksimanifest/pagebcf15.php';break;
//case 'pageadminman_data':$page=  include 'adminseksimanifest/pageadmin_data.php';break;

case 'browsevalidbcf15':$page=  include 'seksi/validasibcf15.php';break;
case 'validasi':$page=  include 'seksi/validasiedit.php';break;
case 'pagevalidasi':$page=  include 'seksi/pagevalidasi.php';break;


case 'bcf15edittpp2':$page=  include '_stpp2/bcfedit.php';break;
case 'stpp2':$page=  include '_stpp2/stpp2.php';break;
case 'suratperintah':$page=  include '_stpp2/suratperintah.php';break;
case 'suratperintahview':$page=  include '_stpp2/suratperintahview.php';break;
case 'sprint':$page=  include '_stpp2/editsprint.php';break;
case 'sprintview':$page=  include '_stpp2/bcfview.php';break;
case 'bapenarikan':$page=  include '_stpp2/bapenarikan.php';break;

case 'browsebatarikview':$page=  include '_stpp2/bapenarikanbrowseview.php';break;
case 'masihditps':$page=  include '_stpp2/bcfmasihditps.php';break;
case 'browsecetaksprint':$page=  include '_stpp2/cetaksprint.php';break;
case 'browsebukasegelview':$page=  include '_stpp2/browsebukasegelview.php';break;
case 'bukasegel':$page=  include '_stpp2/editbukasegel.php';break;
case 'browsebataltps':$page=  include '_stpp2/bataltps.php';break;
case 'konfirmasip2tps':$page=  include '_stpp2/ndkonfirmasi.php';break;
case 'suratbataltps':$page=  include '_stpp2/suratbataltps.php';break;
case 'browseseksitpp2':$page=  include '_stpp2/seksi/browseksitp2.php';break;
case 'viewsprintseksi':$page=  include '_stpp2/seksi/viewsprintseksi.php';break;
case 'browsesuratmasuktpp2':$page=  include '_stpp2/seksi/suratmasuk.php';break;
case 'disposisisurattpp2':$page=  include '_stpp2/seksi/suratmasukubah.php';break;
case 'browsendbukasegelseksi':$page=  include '_stpp2/seksi/browsendbukasegelseksi.php';break;
case 'viewndbukasegelseksi':$page=  include '_stpp2/seksi/viewndbukasegelseksi.php';break;
case 'validasitpp2':$page=  include '_stpp2/seksi/validasi.php';break;
case 'cetakbukasegelok':$page=  include 'report/bukasegel.php';break;
case 'downloadtoexcel':$page=  include 'report/export/exporttoexcel.php';break;
case 'lap_progres_penarikan':$page=  include '_stpp2/lap_tpp2_progrespenarikan.php';break;

case 'bataltarikedit':$page=  include '_stpp2/bataltarikedit.php';break;
case 'editcon':$page=  include '_stpp2/editcontainer.php';break;
case 'delcon':$page=  include '_stpp2/delcontainer.php';break;

case 'pecahposdetil':$page=  include '_stpp2/pecahposbcf15.php';break;
case 'pagetpp2':$page=  include '_stpp2/pagetpp2.php';break;
case 'pagemonitoring':$page=  include '_stpp2/pagemonit.php';break;



case 'suratpemberitahuan':$page=  include '_stpp3/suratpemberitahuan.php';break;
case 'suratpemberitahuanview':$page=  include '_stpp3/suratpemberitahuanview.php';break;
case 'suratpemberitahuanall':$page=  include '_stpp3/cetaksuratpemberitahuanall.php';break;
case 'suratpemberitahuanall_rgsurat':$page=  include '_stpp3/cetaksuratpemberitahuanall_rgsurat.php';break;

//rekam surat balik
case 'sptahu_balik_rek':$page=  include '_stpp3/suratpemberitahuan_balikpos_input.php';break;
case 'sptahu_balik_bro':$page=  include '_stpp3/suratpemberitahuan_balikpos_browse.php';break;

case 'cetakamplop':$page=  include '_stpp3/cetakpemberitahuanall_amplop.php';break;
case 'cetakpemberitahuanall':$page=  include 'report/cetakpemberitahuanall.php';break;
case 'sptahuview':$page=  include '_stpp3/sptahueditview.php';break;
case 'sptahu':$page=  include '_stpp3/sptahuedit.php';break;
case 'ekspedisi':$page=  include '_stpp3/ekspedisisurat.php';break;
case 'sptahucetak':$page=  include 'report/sptahu.php';break;
case 'sptahucetaklama':$page=  include 'report/sptahulama.php';break;
case 'browsesptahuseksi':$page=  include '_stpp3/seksi/browsesptahuseksi.php';break;
case 'sekbrowsaldositbun':$page=  include '_stpp3/seksi/sekbrowsaldositbun.php';break;
case 'sekdetailstatusakhir':$page=  include '_stpp3/seksi/detailstatusakhir.php';break;
case 'browsesuratmasuktpp3':$page=  include '_stpp3/seksi/suratmasuk.php';break;
case 'disposisisurattpp3':$page=  include '_stpp3/seksi/suratmasukubah.php';break;
case 'validkonf':$page=  include '_stpp3/seksi/browsekonfirmasi.php';break;
case 'validasitpp3':$page=  include '_stpp3/seksi/validasi.php';break;
case 'validasitpp3edit':$page=  include '_stpp3/seksi/validasiedit.php';break;
case 'detailsuratmasuk':$page=  include 'surat/detailsurat.php';break;
case 'inputpel':$page=  include '_stpp3/inputpel.php';break;
case 'daf_pelayaran':$page=  include '_stpp3/daf_pelayaran.php';break;
case 'edit_pelayaran':$page=  include '_stpp3/edit_pelayaran.php';break;
case 'pagetpp3':$page=  include '_stpp3/pagetpp3.php';break;


case 'animasi':$page=  include 'spritelymenu/bukit.php';break;

case 'bcf15report':$page=  include 'report/bcf15php.php';break;

case 'sprintok':$page=  include 'report/sprintbcf15.php';break;

case 'browsehistory':$page=  include 'history/bcf15.php';break;
case 'historybcf15':$page=  include 'history/historybcf15.php';break;

//atas untuk merubah isian yang ada pada tabel BCF 1.5
case 'tbl_bcf15_update':$page=  include 'admin/tbl_bcf15_edit.php';break;
case 'tbl_bcf15_browse':$page=  include 'admin/tbl_bcf15_browse.php';break;
//pembatalan batal bcf 15 dikarenakan adanya pembatalan reekspor dll
case 'batal_btlbcf':$page=  include 'admin/batal_batalbcf15/daftar_btlbcf15.php';break;
case 'form_batal_btlbcf':$page=  include 'admin/batal_batalbcf15/form_batal_batalbcf15.php';break;
//bawah 
case 'adminbrowseuser':$page=  include 'admin/user.php';break;
case 'addlevel':$page=  include 'admin/userlevel_add.php';break;
case 'dellevel':$page=  include 'admin/userlevel_del.php';break;
case 'adminuseredit':$page=  include 'admin/useredit.php';break;
case 'adminuserdel':$page=  include 'admin/userdel.php';break;
case 'adminuserundel':$page=  include 'admin/userundodel.php';break;
case 'resetpass':$page=  include 'admin/resetpass.php';break;

case 'inputtgllibur':$page=  include 'admin/input_tgl_libur.php';break;
case 'deltgllibur':$page=  include 'admin/input_tgl_libur_del.php';break;
case 'tppdel':$page=  include 'admin/tpp_del.php';break;
case 'adminbrowseseksi':$page=  include 'admin/seksi.php';break;
case 'importupdatedata':$page=  include 'admin/importupdatedata.php';break;
case 'importproses':$page=  include 'admin/importdataproses.php';break;
case 'importupdateproses':$page=  include 'admin/importupdatedataproses.php';break;
case 'importdatacontproses':$page=  include 'admin/importdatacontproses.php';break;
case 'pageadmin':$page=  include 'admin/pageadmin.php';break;
case 'pageadmin_data':$page=  include 'admin/pageadmin_data.php';break;
case 'pageadmin_data_perhari':$page=  include 'admin/pageadmin_data_perhari.php';break;

case 'import_loket':$page=  include 'admin/importupdate_loket_proses.php';break;
case 'colorpic':$page=  include 'page/colorpic/colorpic.html';break;
case 'chat':$page=  include 'page/chat/index.php';break;
case 'downloadtoexcelbtd':$page=  include 'report/export/exporttoexcelsaldo.php';break;


case 'addsuratmasuk':$page=  include 'loket/suratmasuk.php';break;
case 'suratmasukok':$page=  include 'loket/suratmasukok.php';break;
case 'suratmasukokbtlbcf':$page=  include 'loket/suratmasuk_btlbcf.php';break;
case 'suratmasukedit':$page=  include 'loket/suratmasukubah.php';break;
case 'suratmasukbtledit':$page=  include 'loket/suratmasukbtlubah.php';break;
case 'suratmasukdel':$page=  include 'loket/suratmasukdel.php';break;
case 'suratmasukbtldel':$page=  include 'loket/suratmasukbtldel.php';break;


case 'bukaposbc11':$page=  include 'loket/daf_bukaposbc11ceisa_que.php';break;
case 'bukaposbc11view':$page=  include 'loket/daf_bukaposbc11ceisa_view.php';break;
case 'cetak_np':$page=  include 'report/cetaknp_pre.php';break;

case 'mohonbatal':$page=  include 'loketfront/permohonanbatal.php';break;
case 'mohonbatalcont':$page=  include 'loketfront/permohonanbatal_cont.php';break;
case 'mohonbataledit':$page=  include 'loketfront/permohonanbataledit.php';break;
case 'inputmohonbatal':$page=  include 'loketfront/inppermhnbtlbcf15.php';break;
case 'editmohonbatal':$page=  include 'loketfront/edtpermhnbtlbcf15.php';break;
case 'suratpenolakan':$page=  include 'loketfront/suratpenolakan.php';break;
case 'suratpenerimaan':$page=  include 'loketfront/suratpenerimaan.php';break;
case 'pagefront':$page=  include 'loketfront/pagefront.php';break;
case 'daftardoklengkap':$page=  include 'loketfront/daftardoklengkap.php';break;

case 'konfirmasip2tpp':$page=  include 'loket/konfirmasi.php';break;
case 'ndkonfirmasip2tpp':$page=  include 'loket/ndkonfirmasi.php';break;
case 'ndkonfirmasip2tppok':$page=  include 'report/konfirmasi.php';break;
case 'ndkonfirmasiword':$page=  include 'report/doc/ndkonfirmasi.php';break;
case 'bataltpp':$page=  include 'loket/batal.php';break;
case 'suratbataltpp':$page=  include 'loket/suratbatalbcf15.php';break;
case 'pageloket':$page=  include 'loket/pageloket.php';break;
case 'pagekonfirmasi':$page=  include 'loket/lama_konfirmasi.php';break;
case 'ndreekspormanifest':$page=  include 'loket/reeksporkonfirmasi.php';break;
case 'ndreekspormanifestinput':$page=  include 'loket/reeksporkonfirmasi_input.php';break;
case 'ndreekspormanifestque':$page=  include 'loket/reeksporkonfirmasi_query.php';break;

//new konfirmasi
case 'newkonfirmasi':$page=  include 'loket/newkonfirmasi.php';break;

//new pembatalan
case 'newpembatalan':$page=  include 'loket/newpembatalan.php';break;

//case 'pagebatal':$page=  include 'loket/pagepembatalan.php';break;
case 'pagebatal':$page=  include 'loket/lama_pembatalan.php';break;

//lainnya
case 'loketbatarik':$page=  include 'loket/bapenarikanbrowse.php';break;
case 'loketin_batarik':$page=  include 'loket/bapenarikan.php';break;
case 'loketpecahpos':$page=  include 'loket/pecahposbcf15browse.php';break;
case 'loketin_pecahpos':$page=  include 'loket/pecahposbcf15.php';break;
case 'loketeditbcf15':$page=  include 'loket/bcfedit.php';break;
case 'loketin_cont':$page=  include 'loket/insertcontainer.php';break;
case 'loketedit_cont':$page=  include 'loket/editcontainer.php';break;
case 'loketdel_cont':$page=  include 'loket/delcontainer.php';break;


case 'lap_belumpindahtpp':$page=  include 'loket/lap_belumpindahtpp.php';break;
case 'cetak_buku_batal':$page=  include 'loket/cet_buku_agenda.php';break;

case 'suratbataltppok':$page=  include 'report/suratbataltpp.php';break;

case 'saldobcf15':$page=  include 'pemwas/bcf15saldo.html';break;
case 'pagebcf15pemwas':$page=  include 'pemwas/pagebcf15.php';break;
case 'rep_kons_lelangI':$page=  include 'report/skep_btd.php';break;





case 'bcf15cari':$page=  include 'cari/bcf15cari.php';break;
case 'caribcf_cont' :$page=  include 'cari/bcf15cari_cont.php';break;
case 'caribcf_brg' :$page=  include 'cari/bcf15cari_brg.php';break;
case 'caribcf_sppb' :$page=  include 'cari/bcf15cari_sppb.php';break;
case 'caribcf15' :$page=  include 'cari/index.php';break;

case 'detailstatusakhirman':$page=  include 'cari/detail.php';break;
case 'detailstatusakhir_tarik':$page=  include 'cari/detailstatusakhir_penarikan.php';break;
case 'detailstatusakhir_bc11':$page=  include 'cari/detailstatusakhir_bukaposbc11.php';break;
case 'detailstatusakhir_btlbcf15':$page=  include 'cari/detailstatusakhir_pembatalan.php';break;

case 'grafikall' :$page=  include 'report/grafik/grafikall.php';break;
case 'pie' :$page=  include 'report/grafik/pie.php';break;

case 'suratmasukumum' :$page=  include 'surat/suratmasukumum.php';break;
case 'suratmasukdetail' :$page=  include 'surat/suratmasukdetail.php';break;


//Admin Penindakan
case 'addseksip2' :$page=  include 'adminp2/inputseksi.php';break;
case 'browseseksip2' :$page=  include 'adminp2/seksi.php';break;
case 'adduserp2' :$page=  include 'adminp2/inputuser.php';break;
case 'browseuserp2' :$page=  include 'adminp2/user.php';break;


//staf penindakan
case 'daftarconf' :$page=  include 'penindakan/daftarkonf.php';break;
//case 'konfirmasiproses' :$page=  include 'penindakan/konfirmasiproses.php';break;
case 'viewkonf' :$page=  include 'penindakan/viewkonfirmasi.php';break;



//cuti
case 'mohoncuti' :$page=  include 'app_pegawai/in_cuti.php';break;
case 'delcuti' :$page=  include 'app_pegawai/del_cuti.php';break;
case 'editcuti' :$page=  include 'app_pegawai/edit_cuti.php';break;
case 'cetakcuti' :$page=  include 'app_pegawai/cetak_pre.php';break;

case 'in_roling' :$page=  include 'app_pegawai/roling/in_roling.php';break;
case 'edit_roling' :$page=  include 'app_pegawai/roling/edit_roling.php';break;
case 'in_roling_det' :$page=  include 'app_pegawai/roling/in_roling_detail.php';break;


//lembur
case 'in_lembur' :$page=  include 'app_pegawai/lembur/in_lembur.php';break;
case 'edit_lembur' :$page=  include 'app_pegawai/lembur/edit_lembur.php';break;
case 'del_lembur' :$page=  include 'app_pegawai/lembur/del_lembur.php';break;
case 'indet_lembur' :$page=  include 'app_pegawai/lembur/in_pegawai.php';break;
case 'deldet_lembur' :$page=  include 'app_pegawai/lembur/del_pegawai.php';break;
case 'cet_lembur' :$page=  include 'app_pegawai/lembur/ndlembur.php';break;

//daftar pegawai
case 'in_pegawaitpp' :$page=  include 'app_pegawai/pegawai/in_pegawaitpp.php';break;
case 'edit_pegawaitpp' :$page=  include 'app_pegawai/pegawai/edit_pegawaitpp.php';break;
case 'del_pegawaitpp' :$page=  include 'app_pegawai/pegawai/del_pegawaitpp.php';break;
//arsip sp BCF 1.5
case 'page_arsip' :$page=  include 'arsip/pagearsip.php';break;
case 'btl_input' :$page=  include 'arsip/btlbcf/btl_input.php';break;

//tutuppos BCF 1.5
case 'tutuposbcf15' :$page=  include 'tutuppos/bcf15/daf_bcf15.php';break;
case 'daf_intutuppos' :$page=  include 'tutuppos/bcf15/daf_inputtutuppos.php';break;
case 'intutuposbcf15' :$page=  include 'tutuppos/bcf15/in_tutuppos.php';break;

//tunda lelang BCF 1.5
case 'tundalelang' :$page=  include 'tundalelang/daf_tundalelang.php';break;
case 'daf_intundalelang' :$page=  include 'tundalelang/daf_inputtundalelang.php';break;
case 'input_tundalelang' :$page=  include 'tundalelang/in_tundalelang.php';break;

//blokir perusahaan
case 'blokir' :$page=  include 'blokir_perusahaan/daf_blokir.php';break;
case 'input_blokir' :$page=  include 'blokir_perusahaan/in_blokir.php';break;
case 'edit_blokir' :$page=  include 'blokir_perusahaan/edit_blokir.php';break;
case 'buka_blokir' :$page=  include 'blokir_perusahaan/buka_blokir.php';break;

//laporan bcf15terbit
case 'lap_bcf15terbit' :$page=  include 'report/laporan/bcf15terbit.php';break;

//laporan kinerja
case 'lap_kinerja' :$page=  include 'report/lap_kinerja/lap_kinerja.php';break;
case 'in_lap_kinerja' :$page=  include 'report/lap_kinerja/input_lap_kinerja.php';break;
case 'del_lap_kinerja' :$page=  include 'report/lap_kinerja/lap_kinerja_del.php';break;


case 'rekap_capaian_kinerja' :$page=  include 'report/lap_kinerja/rekap_capaian_kinerja.php';break;
case 'lap_data' :$page=  include 'report/lap_kinerja/rekap_capaian_database.php';break;

case 'edit_lap_kinerja_bcf15' :$page=  include 'report/lap_kinerja/lap_kinerja_edit_bcf15.php';break;
case 'edit_lap_kinerja_btdlelang' :$page=  include 'report/lap_kinerja/lap_kinerja_edit_btdlelang.php';break;
case 'edit_lap_kinerja_musnah' :$page=  include 'report/lap_kinerja/lap_kinerja_edit_musnah.php';break;
case 'edit_lap_kinerja_bmn' :$page=  include 'report/lap_kinerja/lap_kinerja_edit_bmn.php';break;

//grafik penarikan
case 'grafik_kinerja_penarikan' :$page=  include 'report/lap_kinerja/chart_garis_monitoringtarik_all.php';break;
case 'lap_bcfterbit' :$page=  include 'report/laporan/lap_bcf15terbit.php';break;
case 'lap_contmasuktpp' :$page=  include 'report/laporan/lap_containertariktpppertahun.php';break;
case 'laporan' :$page=  include 'report/laporan/laporan_bcf15.php';break;
case 'laporanterbitperbulan' :$page=  include 'report/lap_kinerja/perbulan_terbitbcf_chart.php';break;
case 'laporanmasukperbulan' :$page=  include 'report/lap_kinerja/perbulan_masuk_chart.php';break;
case 'laporantdkmasukperbulan' :$page=  include 'report/lap_kinerja/perbulan_tdkmasuk_chart.php';break;
case 'downtdkmasukperbulan' :$page=  include 'report/export/lap_chart_belummasuk.php';break;

//redres bc 11
case 'redressbrowse':$page=  include 'redressbc11/redress_browse.php';break;
case 'redressinput':$page=  include 'redressbc11/redress_input.php';break;
case 'redressupload':$page=  include 'redressbc11/uploadscan.php';break;

//arsip sp
case 'daftarsp':$page=  include 'arsip/sp/daf_sp_view.php';break;
case 'daftarsptahu':$page=  include 'arsip/pemberitahuan/daf_sptahu_view.php';break;
case 'daftarbtlbcf':$page=  include 'arsip/btlbcf/daf_btl_view.php';break;
case 'daftarreekspor':$page=  include 'arsip/reekspor/reekspor_browse_view.php';break;
case 'daftarredress':$page=  include 'redressbc11/redress_browse_view.php';break;
case 'daftararsip':$page=  include 'arsip/daftararsip.php';break;

//arsip stripping
case 'uploadstrip':$page=  include 'arsip/stripping/strip_input.php';break;

//catatankaki petugas
case 'cat_petugas':$page=  include 'catatankaki/catatankaki_proses.php';break;

//Upload Scan SetujuReekspor 
case 'set_reeks_browse':$page=  include 'arsip/reekspor/reekspor_browse.php';break;
case 'set_reeks_input':$page=  include 'arsip/reekspor/reekspor_input.php';break;
case 'set_reeks_upload':$page=  include 'arsip/reekspor/uploadscan.php';break;

//menu kabid
case 'saldobtdkabid':$page=  include 'kabid/saldobtdkabid.php';break;
case 'lap_bcf_tdkmasuktpp':$page=  include 'kabid/lap_bcf_tdkmasuktpp.php';break;


//event musnah,lelang dan hibah
case 'add_event':$page=  include 'event/tambah_event.php';break;
case 'daf_event':$page=  include 'event/daftar_event.php';break;
case 'edit_event':$page=  include 'event/edit_event.php';break;
case 'add_eventalluser':$page=  include 'event/daftar_event_alluser.php';break;

case 'add_fotoevent':$page=  include 'event/tambah_foto_event.php';break;
case 'add_lampevent':$page=  include 'event/tambah_lamp_event.php';break;
case 'edit_foto_ket':$page=  include 'event/tambah_foto_event_ket.php';break;
case 'viewevent':$page=  include 'event/view_event_alluser.php';break;

//lporan buat BPK
case 'lap_bpk_allbcf15':$page=  include 'bpk/lap_allbcf15.php';break;


//download buat hanggar TPP
case 'down_bcftrbt':$page=  include 'hanggar/bcf15_download.php';break;

//upload BCF MASUK dari hanggar TPP
case 'upload_hgr':$page=  include 'hanggar/bcf15_upload.php';break;
case 'upload_hgr_proses':$page=  include 'hanggar/bcf15_upload_proses.php';break;

//upload  Cont Masuk dari hanggar TPP
case 'upload_cont':$page=  include 'hanggar/upload_masukcont.php';break;
case 'upload_cont_proses':$page=  include 'hanggar/upload_masukcont_proses.php';break;

//upload BCF dan Cont Keluar dari hanggar TPP
case 'upload_hgrout':$page=  include 'hanggar/bcf15out_upload.php';break;
case 'upload_hgrout_proses':$page=  include 'hanggar/bcf15out_upload_proses.php';break;
case 'upload_contout':$page=  include 'hanggar/upload_outcont.php';break;
case 'upload_contout_proses':$page=  include 'hanggar/upload_outcont_proses.php';break;
case 'upload_out_valid':$page=  include 'hanggar/bcf15out_validasipetugas.php';break;
case 'validbcf15out':$page=  include 'hanggar/bcf15out_valproses.php';break;
case 'validcontout':$page=  include 'hanggar/contout_valproses.php';break;

//sms Center
case 'sms_piket':$page=  include 'sms/piket/input_piket.php';break;
case 'sms_piketbrowse':$page=  include 'sms/piket/browse_piket.php';break;
case 'sms_piketbrowsetrkrm':$page=  include 'sms/piket/browse_piket_trkirim.php';break;
case 'sms_pikethapus':$page=  include 'sms/piket/hapus.php';break;
case 'delpbk':$page=  include 'sms/piket/delpbk.php';break;
case 'editpbk':$page=  include 'sms/piket/editpbk.php';break;
case 'addpbk':$page=  include 'sms/piket/addpbk.php';break;
case 'addgroup':$page=  include 'sms/piket/addgroup.php';break;


};
?>


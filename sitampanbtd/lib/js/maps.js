function GScript(src) {document.write('<' + 'script src="' + src + '"' +' type="text/javascript"><' + '/script>');}function GBrowserIsCompatible() {return true;}function GApiInit() {if (GApiInit.called) return;GApiInit.called = true;window.GAddMessages && GAddMessages({160: '\x3cH1\x3eKesalahan Server\x3c/H1\x3eAda kesalahan sementara pada server sehingga tidak dapat menyelesaikan permintaan Anda. \x3cp\x3eCoba kembali beberapa menit lagi.\x3c/p\x3e',1415: '.',1416: ',',1547: 'mi',1616: 'km',4100: 'm',4101: 'm',10018: 'Memuat...',10021: 'Perbesar',10022: 'Perkecil',10024: 'Tarik untuk zoom',10029: 'Kembali ke hasil terakhir',10049: 'Peta',10050: 'Satelit',10093: 'Syarat Penggunaan',10111: 'Peta',10112: 'Sat',10116: 'Hibrida',10117: 'Hib',10120: 'Maaf, kami tidak punya peta dengan tingkat pembesaran ini untuk wilayah ini.\x3cp\x3eCoba perkecil agar tampilannya lebih luas.\x3c/p\x3e',10121: 'Maaf, kami tidak punya citra dengan tingkat zoom ini untuk wilayah ini.\x3cp\x3eCoba perkecil agar tampilannya lebih luas.\x3c/p\x3e',10507: 'Telusur ke kiri',10508: 'Telusur ke kanan',10509: 'Telusur ke atas',10510: 'Telusur ke bawah',10511: 'Tunjukkan peta jalan',10512: 'Tunjukkan citra satelit',10513: 'Tunjukkan citra dengan nama jalan',10806: 'Klik untuk melihat area ini di Google Maps',10807: 'Lalu Lintas',12150: '%1$s pada %2$s',12151: '%1$s pada %2$s di %3$s',12152: '%1$s pada %2$s antara %3$s dan %4$s',11089: '\x3ca href\x3d\x22javascript:void(0);\x22\x3ePerbesar\x3c/a\x3e untuk melihat lalu lintas untuk wilayah ini',11259: 'Layar penuh',11751: 'Tunjukkan peta jalan berikut medan',11752: 'Gaya:',11757: 'Ubah gaya peta',11758: 'Medan',11759: 'Med',11794: 'Tunjukkan label',11274: 'Untuk menggunakan Street View, Anda memerlukan Adobe Flash Player versi %1$d atau yang lebih baru.',11382: 'Dapatkan Flash Player terbaru.',11314: 'Maaf, Street View saat ini tidak tersedia karena banyaknya permintaan.\x3cbr\x3eCoba sekali lagi nanti!',1559: 'N',1560: 'S',1561: 'W',1562: 'E',1608: 'BL',1591: 'TL',1605: 'BD',1606: 'TENG',11907: 'Gambar ini tidak lagi tersedia',12471: 'Lokasi Saat Ini',12492: 'Earth',12915: 'Tingkatkan peta',12916: 'Google, Europa Technologies',13171: 'Hybrid 3D',14738: 'Laporkan masalah',0: ''});}var GLoad;(function() {GLoad = function(apiCallback) {var callee = arguments.callee;GApiInit();var opts = {export_legacy_names:true,jsmain:"http://maps.gstatic.com/intl/id_ALL/mapfiles/450c/maps2.api/main.js",bcp47_language_code:"id",obliques_urls:["http://khm0.googleapis.com/kh?v=77\x26src=app\x26","http://khm1.googleapis.com/kh?v=77\x26src=app\x26"],token:"778132553",jsmodule_base_url:"http://maps.gstatic.com/intl/id_ALL/mapfiles/450c/maps2.api",generic_tile_urls:["http://mt0.googleapis.com/vt?hl=id\x26src=apiv2\x26","http://mt1.googleapis.com/vt?hl=id\x26src=apiv2\x26"],ignore_auth:false,v2_key:"ABQIAAAAc7lSUDkG68XSf6IVBOO5CRRi_j0U6kJrkFvY4-OX2XYmEAa76BTJQuttRJw3fldGrX5Db2bh6excJQ",sv_host:"http://cbk0.google.com"};apiCallback(["http://mt0.googleapis.com/vt/lyrs\x3dm@219000000\x26hl\x3did\x26src\x3dapiv2\x26","http://mt1.googleapis.com/vt/lyrs\x3dm@219000000\x26hl\x3did\x26src\x3dapiv2\x26"], ["http://khm0.googleapis.com/kh/v\x3d131\x26src\x3dapp\x26","http://khm1.googleapis.com/kh/v\x3d131\x26src\x3dapp\x26"], ["http://mt0.googleapis.com/vt/lyrs\x3dh@219000000\x26hl\x3did\x26src\x3dapiv2\x26","http://mt1.googleapis.com/vt/lyrs\x3dh@219000000\x26hl\x3did\x26src\x3dapiv2\x26"],"ABQIAAAAc7lSUDkG68XSf6IVBOO5CRRi_j0U6kJrkFvY4-OX2XYmEAa76BTJQuttRJw3fldGrX5Db2bh6excJQ"  ,""  ,""  ,true,"google.maps.",opts,["http://mt0.googleapis.com/vt/lyrs\x3dt@131,r@219000000\x26hl\x3did\x26src\x3dapiv2\x26","http://mt1.googleapis.com/vt/lyrs\x3dt@131,r@219000000\x26hl\x3did\x26src\x3dapiv2\x26"]);if (!callee.called) {callee.called = true;}}})();function GUnload() {if (window.GUnloadApi) {GUnloadApi();}}var _mIsRtl = false;var _mHost = "http://maps.google.com";var _mUri = "/maps";var _mDomain = "google.com";var _mStaticPath = "http://maps.gstatic.com/intl/id_ALL/mapfiles/";var _mJavascriptVersion = G_API_VERSION = "450c";var _mTermsUrl = "http://www.google.com/intl/id_ALL/help/terms_maps.html";var _mLocalSearchUrl = "http://www.google.com/uds/solutions/localsearch/gmlocalsearch.js";var _mHL = "id";var _mGL = "";var _mTrafficEnableApi = true;var _mTrafficTileServerUrls = ["http://mt0.google.com/mapstt","http://mt1.google.com/mapstt","http://mt2.google.com/mapstt","http://mt3.google.com/mapstt"];var _mCityblockLatestFlashUrl = "http://maps.google.com/local_url?dq=&amp;q=http://www.adobe.com/shockwave/download/download.cgi%3FP1_Prod_Version%3DShockwaveFlash&amp;s=ANYYN7mXnmnnPX46-ZensHLDnZNF10UWkQ";var _mCityblockFrogLogUsage = false;var _mCityblockInfowindowLogUsage = false;var _mCityblockUseSsl = false;var _mSatelliteToken = "fzwq2qhDoe1KUrSVjfc3SM4zqG5CUYdpQuYQHw";var _mMapCopy = "Data peta \x26#169;2013";var _mSatelliteCopy = "Citra \x26#169;2013";var _mGoogleCopy = "\x26#169;2013 Google";var _mPreferMetric = false;var _mDirectionsEnableApi = true;var _mLayersTileBaseUrls = ['http://mt0.google.com/mapslt','http://mt1.google.com/mapslt','http://mt2.google.com/mapslt','http://mt3.google.com/mapslt'];var _mLayersFeaturesBaseUrl = "http://mt0.google.com/vt/ft";function GLoadMapsScript() {if (!GLoadMapsScript.called && GBrowserIsCompatible()) {GLoadMapsScript.called = true;GScript("http://maps.gstatic.com/intl/id_ALL/mapfiles/450c/maps2.api/main.js");}}(function() {if (!window.google) window.google = {};if (!window.google.maps) window.google.maps = {};var ns = window.google.maps;ns.BrowserIsCompatible = GBrowserIsCompatible;ns.Unload = GUnload;})();GLoadMapsScript();
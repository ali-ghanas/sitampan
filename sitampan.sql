-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sitampan
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `app_notifikasi`
--

DROP TABLE IF EXISTS `app_notifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_notifikasi` (
  `idapp_notifikasi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(45) NOT NULL,
  `nip_admin` varchar(45) NOT NULL,
  `tglrekam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tglmulainotif` date NOT NULL,
  `tglakhirnotif` date NOT NULL,
  `notifikasiadmin` text NOT NULL,
  `statusnotif` char(10) NOT NULL,
  PRIMARY KEY (`idapp_notifikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_notifikasi`
--

LOCK TABLES `app_notifikasi` WRITE;
/*!40000 ALTER TABLE `app_notifikasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_notifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arsip_btl`
--

DROP TABLE IF EXISTS `arsip_btl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arsip_btl` (
  `idarsip_btl` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nobacth` varchar(45) NOT NULL,
  `tglbacth` date NOT NULL,
  `lokasi_arsip` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  `status` varchar(45) NOT NULL,
  `kode_arsip` varchar(45) NOT NULL DEFAULT 'BATAL BCF 1.5',
  PRIMARY KEY (`idarsip_btl`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arsip_btl`
--

LOCK TABLES `arsip_btl` WRITE;
/*!40000 ALTER TABLE `arsip_btl` DISABLE KEYS */;
/*!40000 ALTER TABLE `arsip_btl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arsip_btl_detail`
--

DROP TABLE IF EXISTS `arsip_btl_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arsip_btl_detail` (
  `idarsip_btl_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idarsip_btl` int(10) unsigned NOT NULL,
  `nobtl` varchar(45) NOT NULL,
  `tglbtl` date NOT NULL,
  `bcf15no` varchar(200) NOT NULL,
  `idtpp` varchar(45) NOT NULL,
  `tglinput` datetime NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  `tahun_btl` year(4) NOT NULL,
  `bulan_btl` varchar(45) NOT NULL,
  `idbcf15` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`idarsip_btl_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=16053 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arsip_btl_detail`
--

LOCK TABLES `arsip_btl_detail` WRITE;
/*!40000 ALTER TABLE `arsip_btl_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `arsip_btl_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arsip_dok_pemeriksa`
--

DROP TABLE IF EXISTS `arsip_dok_pemeriksa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arsip_dok_pemeriksa` (
  `idarsip_dok_pemeriksa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` varchar(45) NOT NULL,
  `jenis_dok` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `tglupload` datetime NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idarsip_dok_pemeriksa`)
) ENGINE=InnoDB AUTO_INCREMENT=1440 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arsip_dok_pemeriksa`
--

LOCK TABLES `arsip_dok_pemeriksa` WRITE;
/*!40000 ALTER TABLE `arsip_dok_pemeriksa` DISABLE KEYS */;
/*!40000 ALTER TABLE `arsip_dok_pemeriksa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arsip_loket_pembatalan`
--

DROP TABLE IF EXISTS `arsip_loket_pembatalan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arsip_loket_pembatalan` (
  `idarsip_loket_pembatalan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` int(10) unsigned NOT NULL,
  `jenis_dok` int(10) unsigned NOT NULL,
  `no_dok` varchar(45) NOT NULL,
  `tgl_dok` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(45) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idarsip_loket_pembatalan`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arsip_loket_pembatalan`
--

LOCK TABLES `arsip_loket_pembatalan` WRITE;
/*!40000 ALTER TABLE `arsip_loket_pembatalan` DISABLE KEYS */;
/*!40000 ALTER TABLE `arsip_loket_pembatalan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arsip_sp`
--

DROP TABLE IF EXISTS `arsip_sp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arsip_sp` (
  `idarsip_sp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nobacth` varchar(45) NOT NULL,
  `tglbacth` date NOT NULL,
  `lokasi_arsip` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  `status` varchar(45) NOT NULL,
  `kode_arsip` varchar(45) NOT NULL DEFAULT 'SP',
  PRIMARY KEY (`idarsip_sp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arsip_sp`
--

LOCK TABLES `arsip_sp` WRITE;
/*!40000 ALTER TABLE `arsip_sp` DISABLE KEYS */;
/*!40000 ALTER TABLE `arsip_sp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arsip_sp_detail`
--

DROP TABLE IF EXISTS `arsip_sp_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arsip_sp_detail` (
  `idarsip_sp_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idarsip_sp` int(10) unsigned NOT NULL,
  `nosp` varchar(45) NOT NULL,
  `tglsp` date NOT NULL,
  `det_nobcf` varchar(200) NOT NULL,
  `Keterangan` varchar(45) NOT NULL,
  `idtpp` varchar(45) NOT NULL,
  `tglarsip` datetime NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  `jumlah_bcf15` varchar(45) NOT NULL,
  `tahun_sp` year(4) NOT NULL,
  `bulan_sp` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `size` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idarsip_sp_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=2823 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arsip_sp_detail`
--

LOCK TABLES `arsip_sp_detail` WRITE;
/*!40000 ALTER TABLE `arsip_sp_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `arsip_sp_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arsip_sptahu`
--

DROP TABLE IF EXISTS `arsip_sptahu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arsip_sptahu` (
  `idarsip_sptahu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_sptahu` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `tglupload` datetime NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `tahun_sptahu` char(4) NOT NULL,
  PRIMARY KEY (`idarsip_sptahu`)
) ENGINE=InnoDB AUTO_INCREMENT=663 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arsip_sptahu`
--

LOCK TABLES `arsip_sptahu` WRITE;
/*!40000 ALTER TABLE `arsip_sptahu` DISABLE KEYS */;
/*!40000 ALTER TABLE `arsip_sptahu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arsip_stripping`
--

DROP TABLE IF EXISTS `arsip_stripping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arsip_stripping` (
  `idarsip_stripping` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idsuratmasukstripping` int(11) NOT NULL,
  `idbcf15` int(10) unsigned NOT NULL,
  `jenis_dok` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(45) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idarsip_stripping`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arsip_stripping`
--

LOCK TABLES `arsip_stripping` WRITE;
/*!40000 ALTER TABLE `arsip_stripping` DISABLE KEYS */;
/*!40000 ALTER TABLE `arsip_stripping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batal_pembatalanbcf15`
--

DROP TABLE IF EXISTS `batal_pembatalanbcf15`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batal_pembatalanbcf15` (
  `batal_pembatalanbcf15` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` int(10) unsigned NOT NULL,
  `setujubatalno` varchar(45) NOT NULL,
  `setujubataldate` date NOT NULL,
  `alasan_dibatalkan` text NOT NULL,
  `dasar_no_srt_batal` varchar(45) NOT NULL,
  `dasar_tgl_srt_batal` date NOT NULL,
  `ip_user` varchar(45) NOT NULL,
  `tgl_action` datetime NOT NULL,
  `dasar_surat` varchar(45) NOT NULL,
  `nip_user` varchar(45) NOT NULL,
  PRIMARY KEY (`batal_pembatalanbcf15`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batal_pembatalanbcf15`
--

LOCK TABLES `batal_pembatalanbcf15` WRITE;
/*!40000 ALTER TABLE `batal_pembatalanbcf15` DISABLE KEYS */;
/*!40000 ALTER TABLE `batal_pembatalanbcf15` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcf15`
--

DROP TABLE IF EXISTS `bcf15`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcf15` (
  `idbcf15` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `bcf15no` varchar(30) NOT NULL,
  `bcf15tgl` date NOT NULL,
  `bc11no` varchar(20) NOT NULL,
  `bc11tgl` date NOT NULL,
  `bc11pos` varchar(20) NOT NULL,
  `bc11subpos` varchar(10) NOT NULL,
  `blno` text CHARACTER SET utf8 NOT NULL,
  `bltgl` date NOT NULL,
  `saranapengangkut` varchar(45) NOT NULL,
  `voy` varchar(10) NOT NULL,
  `amountbrg` varchar(40) NOT NULL,
  `satuanbrg` varchar(50) NOT NULL,
  `diskripsibrg` varchar(200) NOT NULL,
  `consignee` varchar(200) NOT NULL,
  `consigneeadrress` varchar(200) NOT NULL,
  `consigneekota` varchar(50) NOT NULL,
  `notify` varchar(200) NOT NULL,
  `notifyadrress` varchar(200) NOT NULL,
  `notifykota` varchar(50) NOT NULL,
  `idtps` varchar(100) NOT NULL,
  `idtpp` int(11) NOT NULL,
  `idtypecode` int(11) NOT NULL,
  `DokumenCode` int(11) DEFAULT NULL,
  `suratpengantarno` varchar(20) DEFAULT NULL,
  `suratpengantartgl` date DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `DokumenNo` varchar(50) DEFAULT NULL,
  `DokumenDate` date DEFAULT NULL,
  `Dokumen2Code` int(11) DEFAULT NULL,
  `Dokumen2No` varchar(50) DEFAULT NULL,
  `Dokumen2Date` date DEFAULT NULL,
  `BatalTarik` char(1) DEFAULT '2',
  `BatalTarikNo` varchar(50) DEFAULT NULL,
  `BatalTarikNo2` varchar(50) DEFAULT NULL,
  `BatalTarikDate` date DEFAULT NULL,
  `BatalTarikKet` varchar(250) DEFAULT NULL,
  `masuk` char(1) DEFAULT '2',
  `bamasukno` varchar(50) DEFAULT NULL,
  `bamasukdate` date DEFAULT NULL,
  `bamasukdatetrx` date DEFAULT NULL,
  `keluar` char(1) DEFAULT '2',
  `BAKeluarDateTrx` date DEFAULT NULL,
  `pemberitahuan` char(1) DEFAULT '2',
  `suratno` varchar(50) DEFAULT NULL,
  `idtp3` int(10) unsigned DEFAULT '1',
  `suratdate` date DEFAULT NULL,
  `idseksitp3` int(11) NOT NULL,
  `Pelayaran` int(10) unsigned DEFAULT NULL,
  `PelayaranNo` varchar(50) DEFAULT NULL,
  `Pelayarandate` date DEFAULT NULL,
  `perintah` char(1) DEFAULT '2',
  `suratperintahno` varchar(50) DEFAULT NULL,
  `idtp2` int(10) unsigned DEFAULT '1',
  `suratperintahdate` date DEFAULT NULL,
  `idseksitp2` int(11) DEFAULT NULL,
  `CacahType` varchar(50) DEFAULT NULL,
  `Cacah` char(1) DEFAULT NULL,
  `NDCacahNo` varchar(50) DEFAULT NULL,
  `NDCacahDate` date DEFAULT NULL,
  `CacahNo` varchar(50) DEFAULT NULL,
  `CacahDate` date DEFAULT NULL,
  `NHP` char(1) DEFAULT NULL,
  `ReqBatal` char(1) DEFAULT '2',
  `Batal` char(1) DEFAULT '2',
  `SuratBatalNo` varchar(50) DEFAULT NULL,
  `SuratBatalDate` date DEFAULT NULL,
  `Pemohon` varchar(200) DEFAULT NULL,
  `AlamatPemohon` varchar(250) DEFAULT NULL,
  `bukaposbc11ceisa` int(11) DEFAULT NULL,
  `nobukaposbc11ceisa` varchar(45) DEFAULT NULL,
  `tglbukaposbc11ceisa` date DEFAULT NULL,
  `idseksibukaposbc11ceisa` int(11) DEFAULT NULL,
  `ndkonfirmasito` char(1) DEFAULT NULL,
  `ndkonfirmasino` varchar(50) DEFAULT NULL,
  `ndkonfirmasino2` varchar(50) DEFAULT NULL,
  `ndkonfirmasidate` date DEFAULT NULL,
  `idseksindkonfirmasi` int(11) DEFAULT NULL,
  `ndkonfirmasijawaban` int(10) unsigned DEFAULT '2',
  `jawabanp2Ket` varchar(250) DEFAULT NULL,
  `jawabanp2` varchar(50) DEFAULT NULL,
  `jawabanp2date` date DEFAULT NULL,
  `idseksip2ndkonfjwb` int(11) NOT NULL,
  `jawabanndkonfirmasi` int(10) unsigned NOT NULL,
  `idp2` int(10) unsigned DEFAULT NULL,
  `segel` int(11) NOT NULL DEFAULT '2',
  `ndsegelno` varchar(50) DEFAULT NULL,
  `ndsegeldate` date DEFAULT NULL,
  `idseksitp2bukgel` int(11) NOT NULL,
  `SetujuBatalNo` varchar(50) DEFAULT NULL,
  `SetujuBatalNo2` varchar(50) DEFAULT NULL,
  `SetujuBatalDate` date DEFAULT NULL,
  `shipper` varchar(150) NOT NULL,
  `negaraasal` varchar(150) DEFAULT NULL,
  `tonage_groos` varchar(50) DEFAULT NULL,
  `tonage_netto` varchar(50) DEFAULT NULL,
  `Pecahpos` char(1) DEFAULT '2',
  `PecahPosdate` date NOT NULL,
  `idpelayaran` int(11) DEFAULT NULL,
  `PelayaranAddress` varchar(250) DEFAULT NULL,
  `PelayaranAlasan` varchar(250) DEFAULT NULL,
  `recordstatus` tinyint(3) unsigned DEFAULT NULL,
  `idmanifest` int(10) unsigned DEFAULT NULL,
  `idseksi` int(10) unsigned DEFAULT NULL,
  `idstatusakhir` varchar(200) NOT NULL,
  `NoKepStatus_Akhr` varchar(100) NOT NULL,
  `BA_Pemusnahan` varchar(100) NOT NULL,
  `TGL_Pemusnahan` date NOT NULL,
  `KetBA_Penarikan` varchar(200) NOT NULL,
  `jalur` int(10) unsigned NOT NULL,
  `nhp_lelang` int(11) NOT NULL,
  `NHPLelangNo` varchar(45) NOT NULL,
  `NHPLelangDate` date NOT NULL,
  `CacahLelangNo` varchar(45) NOT NULL,
  `CacahLelangNo2` varchar(45) NOT NULL,
  `CacahLelangDate` varchar(45) NOT NULL,
  `BalaiLelangCode` int(10) unsigned NOT NULL,
  `KepLelang1No` varchar(45) NOT NULL,
  `KepLelang1Date` date NOT NULL,
  `KepLimit1No` varchar(45) NOT NULL,
  `KepLimit1Date` date NOT NULL,
  `risalahlelang1` varchar(50) NOT NULL,
  `SuratSewaGudang1No` varchar(45) NOT NULL,
  `SuratSewaGudang1Date` date NOT NULL,
  `JawabanSewaGudang1No` varchar(45) NOT NULL,
  `JawabanSewaGudang1Date` date NOT NULL,
  `StatusLelang1Code` int(10) unsigned NOT NULL,
  `StatusLelang1Date` date NOT NULL,
  `KepLelang2No` varchar(45) NOT NULL,
  `KepLelang2Date` date NOT NULL,
  `KepLimit2No` varchar(45) NOT NULL,
  `KepLimit2Date` date NOT NULL,
  `risalahlelang2` varchar(50) NOT NULL,
  `SuratSewaGudang2No` varchar(45) NOT NULL,
  `SuratSewaGudang2Date` date NOT NULL,
  `JawabanSewaGudang2No` varchar(45) NOT NULL,
  `JawabanSewaGudang2Date` varchar(45) NOT NULL,
  `StatusLelang2Code` varchar(45) NOT NULL,
  `StatusLelang2Date` date NOT NULL,
  `SuratKePusatNo` varchar(45) NOT NULL,
  `SuratKePusatDate` date NOT NULL,
  `UsulanKePusatCode` int(10) unsigned NOT NULL,
  `JawabanPusatNo` varchar(45) NOT NULL,
  `JawabanPusatDate` date NOT NULL,
  `JawabanPusatCode` int(10) unsigned NOT NULL,
  `PersetujuanMenkeuNo` varchar(45) NOT NULL,
  `PersetujuanMenkeuDate` date NOT NULL,
  `PersetujuanMenkeuCode` int(10) unsigned NOT NULL,
  `KepMusnahNo` varchar(45) NOT NULL,
  `KepMusnahDate` date NOT NULL,
  `TempatMusnah` varchar(45) NOT NULL,
  `PenanggungJawabBiaya` varchar(45) NOT NULL,
  `SuratTugasNo` varchar(45) NOT NULL,
  `SuratTugasDate` date NOT NULL,
  `KepBMNNo` varchar(45) NOT NULL,
  `KepBMNDate` date NOT NULL,
  `ApraisalNo` varchar(45) NOT NULL,
  `ApraisalDate` date NOT NULL,
  `JawabanApraisalNo` varchar(45) NOT NULL,
  `JawabanApraisalDate` date NOT NULL,
  `NilaiApraisal` varchar(45) NOT NULL,
  `SuratSewaTempatNo` varchar(45) NOT NULL,
  `SuratSewaTempatDate` date NOT NULL,
  `JawabanSewaTempatNo` varchar(45) NOT NULL,
  `JawabanSewaTempatDate` date NOT NULL,
  `UsulanBMNKePusatNo` varchar(45) NOT NULL,
  `UsulanBMNKePusatDate` date NOT NULL,
  `UsulanBMNKePusatCode` int(10) unsigned NOT NULL,
  `JawabanBMNPusatNo` varchar(45) NOT NULL,
  `JawabanBMNPusatDate` date NOT NULL,
  `JawabanBMNPusatCode` int(10) unsigned NOT NULL,
  `PersetujuanMKNo` varchar(45) NOT NULL,
  `PersetujuanMKDate` date NOT NULL,
  `PersetujuanMKCode` int(10) unsigned NOT NULL,
  `idseksisetujubatal` int(10) unsigned NOT NULL,
  `setujubatal` int(10) unsigned NOT NULL DEFAULT '2',
  `ndkonfirmasi` int(10) unsigned NOT NULL DEFAULT '2',
  `recordstatuskonf` tinyint(3) unsigned NOT NULL,
  `jawabanstatuskonfirmasip2` varchar(45) NOT NULL,
  `validasibcf15baru` varchar(45) NOT NULL,
  `tglvalidasibcf15` datetime NOT NULL,
  `perlukonf` tinyint(3) unsigned NOT NULL,
  `idpemeriksa_tpp` int(10) unsigned NOT NULL,
  `konsep_skepbtd` int(10) unsigned NOT NULL,
  `konsep_skepbmn` int(10) unsigned NOT NULL,
  `konsep_skepmusnah` int(10) unsigned NOT NULL,
  `idkepala_kantor_skep_btd` int(10) unsigned NOT NULL,
  `redress` int(10) unsigned NOT NULL,
  `nosuratredress` varchar(45) NOT NULL,
  `tglsuratredress` date NOT NULL,
  `uraianredress` varchar(200) NOT NULL,
  `reekspor` int(10) unsigned NOT NULL,
  `nondmanifestreekspor` varchar(45) NOT NULL,
  `tglndmanifestreekspor` date NOT NULL,
  `jawabanndreekspor` int(10) unsigned NOT NULL,
  `jawabanndreeksporno` varchar(45) NOT NULL,
  `jawabanndreeksportgl` date NOT NULL,
  `idseksijawabanndreekspor` int(10) unsigned NOT NULL,
  `tundalelang` int(10) unsigned DEFAULT NULL,
  `nosuratpermohonan` varchar(45) DEFAULT NULL,
  `tglsuratpermohonan` date DEFAULT NULL,
  `asalsuratpermohonan` varchar(45) DEFAULT NULL,
  `alasantundalelang` varchar(200) DEFAULT NULL,
  `tutuppos` int(10) unsigned DEFAULT NULL,
  `nosurattutuppos` varchar(45) DEFAULT NULL,
  `tglsurattutuppos` date DEFAULT NULL,
  `alasantutuppos` varchar(200) DEFAULT NULL,
  `jawaban_bukaposbc11` int(10) NOT NULL,
  `jawaban_bukaposbc11no` varchar(100) NOT NULL,
  `jawaban_bukaposbc11tgl` date NOT NULL,
  `jawaban_bukaposbc11seksi` int(10) unsigned NOT NULL,
  `jawaban_bukaposbc11ket` varchar(200) NOT NULL,
  `kirim_tpsol` int(10) unsigned NOT NULL,
  `jmlCont` varchar(45) NOT NULL,
  `nip_rekam` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `kd_tpsol` char(10) NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `longstay_tps` int(5) unsigned NOT NULL,
  `idbmn` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idbcf15`),
  KEY `bcf15no` (`bcf15no`),
  KEY `tahun` (`tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=164713 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcf15`
--

LOCK TABLES `bcf15` WRITE;
/*!40000 ALTER TABLE `bcf15` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcf15` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcf15_batalbcf`
--

DROP TABLE IF EXISTS `bcf15_batalbcf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcf15_batalbcf` (
  `idbcf15_batalbcf` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` int(10) unsigned NOT NULL,
  `bcf15no` varchar(45) NOT NULL,
  `bcf15tgl` date NOT NULL,
  `validasihanggar` char(6) NOT NULL,
  `validasihanggardate` datetime NOT NULL,
  `nm_hanggar` varchar(45) NOT NULL,
  `nip_hanggar` varchar(45) NOT NULL,
  `validasigate` char(6) NOT NULL,
  `validasigatedate` datetime NOT NULL,
  `nm_gate` varchar(45) NOT NULL,
  `nip_gate` varchar(45) NOT NULL,
  `arsip` char(9) NOT NULL,
  `bulanarsip` varchar(45) NOT NULL,
  `nomorbatch` varchar(45) NOT NULL,
  `nomorarsip` varchar(45) NOT NULL,
  `tglarsip` datetime NOT NULL,
  `update_sitampan` varchar(45) NOT NULL,
  `tgl_update` datetime NOT NULL,
  `nm_update` varchar(45) NOT NULL,
  PRIMARY KEY (`idbcf15_batalbcf`)
) ENGINE=InnoDB AUTO_INCREMENT=7762 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcf15_batalbcf`
--

LOCK TABLES `bcf15_batalbcf` WRITE;
/*!40000 ALTER TABLE `bcf15_batalbcf` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcf15_batalbcf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcf15_masuktpp`
--

DROP TABLE IF EXISTS `bcf15_masuktpp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcf15_masuktpp` (
  `idbcf15_masuktpp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` varchar(45) NOT NULL,
  `nobcf15` varchar(45) NOT NULL,
  `tahun` varchar(45) NOT NULL,
  `masuk` char(5) NOT NULL,
  `bamasukno` varchar(100) NOT NULL,
  `bamasukdate` date NOT NULL,
  `tglinputba` datetime NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  `nipuser` varchar(45) NOT NULL,
  `nmuser` varchar(80) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `tglaksi` datetime NOT NULL,
  PRIMARY KEY (`idbcf15_masuktpp`)
) ENGINE=InnoDB AUTO_INCREMENT=8023 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcf15_masuktpp`
--

LOCK TABLES `bcf15_masuktpp` WRITE;
/*!40000 ALTER TABLE `bcf15_masuktpp` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcf15_masuktpp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcf15_sp_balikpos`
--

DROP TABLE IF EXISTS `bcf15_sp_balikpos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcf15_sp_balikpos` (
  `idbcf15_sp_balikpos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` int(10) unsigned NOT NULL,
  `bcf15no` varchar(45) NOT NULL,
  `bcf15tgl` date NOT NULL,
  `nosuratpemberitahuan` varchar(45) NOT NULL,
  `tglsuratpemberitahuan` date NOT NULL,
  `kembali_pilihan` varchar(45) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `alasan_kembali` text NOT NULL,
  `tgl_rekam_kembali` datetime NOT NULL,
  `nm_user` varchar(45) NOT NULL,
  `nip_user` varchar(45) NOT NULL,
  `tindak_lanjut` varchar(100) NOT NULL,
  `keterangan_tindaklanjut` text NOT NULL,
  `nmuser_tindaklanjut` varchar(45) NOT NULL,
  `nipuser_tindaklanjut` varchar(45) NOT NULL,
  `tgl_proses_tl` datetime NOT NULL,
  PRIMARY KEY (`idbcf15_sp_balikpos`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcf15_sp_balikpos`
--

LOCK TABLES `bcf15_sp_balikpos` WRITE;
/*!40000 ALTER TABLE `bcf15_sp_balikpos` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcf15_sp_balikpos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcf15_suratperintah_tegas`
--

DROP TABLE IF EXISTS `bcf15_suratperintah_tegas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcf15_suratperintah_tegas` (
  `idbcf15_suratperintah_tegas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` int(10) unsigned NOT NULL,
  `sprint_bcf15no` varchar(45) NOT NULL,
  `sprint_bcf15tgl` date NOT NULL,
  `sprint_tahun` year(4) NOT NULL,
  `sprint_idtpp` varchar(45) NOT NULL,
  `sprint_idtps` varchar(45) NOT NULL,
  `tgl_rekam` datetime NOT NULL,
  `user_nip` varchar(45) NOT NULL,
  `user_nama` varchar(45) NOT NULL,
  `user_ip` varchar(45) NOT NULL,
  `idseksitpp2` int(10) unsigned NOT NULL,
  `alasan_dipaksakantarik` varchar(100) NOT NULL,
  `no_surat` varchar(45) NOT NULL,
  `tgl_surat` date NOT NULL,
  PRIMARY KEY (`idbcf15_suratperintah_tegas`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcf15_suratperintah_tegas`
--

LOCK TABLES `bcf15_suratperintah_tegas` WRITE;
/*!40000 ALTER TABLE `bcf15_suratperintah_tegas` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcf15_suratperintah_tegas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcf15_tidaklakulelang2`
--

DROP TABLE IF EXISTS `bcf15_tidaklakulelang2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcf15_tidaklakulelang2` (
  `idbcf15_tidaklakulelang2` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` int(10) unsigned NOT NULL,
  `bcf15no` varchar(45) NOT NULL,
  `bcf15tgl` date NOT NULL,
  `kep_lelang1no` varchar(100) NOT NULL,
  `kep_lelang1date` date NOT NULL,
  `status_L1` varchar(45) NOT NULL,
  `kep_lelang2no` varchar(100) NOT NULL,
  `kep_lelang2date` date NOT NULL,
  `status_L2` varchar(45) NOT NULL,
  `usulan_kpuno` varchar(100) NOT NULL,
  `usulan_kpudate` date NOT NULL,
  `usulankpu` varchar(45) NOT NULL,
  `jwb_mkno` varchar(100) NOT NULL,
  `jwb_mkdate` date NOT NULL,
  `status_jwbmk` varchar(45) NOT NULL,
  `dokumenpenutup` varchar(45) NOT NULL,
  `dokumenpenutupno` varchar(45) NOT NULL,
  `dokumenpenutuptgl` date NOT NULL,
  `tgltutup` datetime NOT NULL,
  `idusertutup` varchar(45) NOT NULL,
  `namauser` varchar(45) NOT NULL,
  `status_usulan` varchar(45) NOT NULL,
  PRIMARY KEY (`idbcf15_tidaklakulelang2`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcf15_tidaklakulelang2`
--

LOCK TABLES `bcf15_tidaklakulelang2` WRITE;
/*!40000 ALTER TABLE `bcf15_tidaklakulelang2` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcf15_tidaklakulelang2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcf15all`
--

DROP TABLE IF EXISTS `bcf15all`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcf15all` (
  `tahun` year(4) DEFAULT NULL,
  `bcf15no` varchar(30) DEFAULT NULL,
  `bc11no` varchar(20) DEFAULT NULL,
  `bc11pos` varchar(20) DEFAULT NULL,
  `blno` text,
  `amountbrg` varchar(40) DEFAULT NULL,
  `satuanbrg` varchar(50) DEFAULT NULL,
  `diskripsibrg` varchar(200) DEFAULT NULL,
  `consignee` varchar(200) DEFAULT NULL,
  `notify` varchar(200) DEFAULT NULL,
  `nm_tpp` varchar(45) DEFAULT NULL,
  `nocontainer` varchar(20) DEFAULT NULL,
  `idsize` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcf15all`
--

LOCK TABLES `bcf15all` WRITE;
/*!40000 ALTER TABLE `bcf15all` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcf15all` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcf15redress`
--

DROP TABLE IF EXISTS `bcf15redress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcf15redress` (
  `idbcf15redress` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` varchar(45) NOT NULL,
  `bcf15no` varchar(45) NOT NULL,
  `bcf15tgl` date NOT NULL,
  `tahun` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `uraian_redress` varchar(45) NOT NULL,
  PRIMARY KEY (`idbcf15redress`)
) ENGINE=InnoDB AUTO_INCREMENT=803 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcf15redress`
--

LOCK TABLES `bcf15redress` WRITE;
/*!40000 ALTER TABLE `bcf15redress` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcf15redress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcf15view`
--

DROP TABLE IF EXISTS `bcf15view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcf15view` (
  `idbcf15` int(11) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bcf15no` varchar(30) DEFAULT NULL,
  `bcf15tgl` date DEFAULT NULL,
  `bc11no` varchar(20) DEFAULT NULL,
  `bc11tgl` date DEFAULT NULL,
  `bc11pos` varchar(20) DEFAULT NULL,
  `bc11subpos` varchar(10) DEFAULT NULL,
  `blno` text,
  `bltgl` date DEFAULT NULL,
  `saranapengangkut` varchar(45) DEFAULT NULL,
  `voy` varchar(10) DEFAULT NULL,
  `amountbrg` varchar(40) DEFAULT NULL,
  `satuanbrg` varchar(50) DEFAULT NULL,
  `diskripsibrg` varchar(200) DEFAULT NULL,
  `consignee` varchar(200) DEFAULT NULL,
  `consigneeadrress` varchar(200) DEFAULT NULL,
  `consigneekota` varchar(50) DEFAULT NULL,
  `notify` varchar(200) DEFAULT NULL,
  `notifyadrress` varchar(200) DEFAULT NULL,
  `notifykota` varchar(50) DEFAULT NULL,
  `idtps` varchar(100) DEFAULT NULL,
  `idtpp` int(11) DEFAULT NULL,
  `idtypecode` int(11) DEFAULT NULL,
  `DokumenCode` int(11) DEFAULT NULL,
  `suratpengantarno` varchar(20) DEFAULT NULL,
  `suratpengantartgl` date DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `DokumenNo` varchar(50) DEFAULT NULL,
  `DokumenDate` date DEFAULT NULL,
  `Dokumen2Code` int(11) DEFAULT NULL,
  `Dokumen2No` varchar(50) DEFAULT NULL,
  `Dokumen2Date` date DEFAULT NULL,
  `BatalTarik` char(1) DEFAULT NULL,
  `BatalTarikNo` varchar(50) DEFAULT NULL,
  `BatalTarikNo2` varchar(50) DEFAULT NULL,
  `BatalTarikDate` date DEFAULT NULL,
  `BatalTarikKet` varchar(250) DEFAULT NULL,
  `masuk` char(1) DEFAULT NULL,
  `bamasukno` varchar(50) DEFAULT NULL,
  `bamasukdate` date DEFAULT NULL,
  `bamasukdatetrx` date DEFAULT NULL,
  `keluar` char(1) DEFAULT NULL,
  `pemberitahuan` char(1) DEFAULT NULL,
  `idtp3` varchar(50) DEFAULT NULL,
  `suratdate` date DEFAULT NULL,
  `idseksitp3` int(11) DEFAULT NULL,
  `Pelayaran` int(10) unsigned DEFAULT NULL,
  `PelayaranNo` varchar(50) DEFAULT NULL,
  `Pelayarandate` date DEFAULT NULL,
  `perintah` char(1) DEFAULT NULL,
  `suratperintahno` varchar(50) DEFAULT NULL,
  `idtp2` int(10) unsigned DEFAULT NULL,
  `suratperintahdate` date DEFAULT NULL,
  `idseksitp2` int(11) DEFAULT NULL,
  `CacahType` varchar(50) DEFAULT NULL,
  `Cacah` char(1) DEFAULT NULL,
  `NDCacahNo` varchar(50) DEFAULT NULL,
  `NDCacahDate` date DEFAULT NULL,
  `CacahNo` varchar(50) DEFAULT NULL,
  `CacahDate` date DEFAULT NULL,
  `NHP` char(1) DEFAULT NULL,
  `ReqBatal` char(1) DEFAULT NULL,
  `Batal` char(1) DEFAULT NULL,
  `SuratBatalNo` varchar(50) DEFAULT NULL,
  `SuratBatalDate` date DEFAULT NULL,
  `Pemohon` varchar(200) DEFAULT NULL,
  `AlamatPemohon` varchar(250) DEFAULT NULL,
  `ndkonfirmasito` char(1) DEFAULT NULL,
  `ndkonfirmasino` varchar(50) DEFAULT NULL,
  `ndkonfirmasidate` varchar(50) DEFAULT NULL,
  `idseksindkonfirmasi` int(11) DEFAULT NULL,
  `ndkonfirmasijawaban` int(10) unsigned DEFAULT NULL,
  `jawabanp2Ket` varchar(250) DEFAULT NULL,
  `jawabanp2` varchar(50) DEFAULT NULL,
  `jawabanp2date` date DEFAULT NULL,
  `idseksip2ndkonfjwb` int(11) DEFAULT NULL,
  `jawabanndkonfirmasi` int(10) unsigned DEFAULT NULL,
  `idp2` int(10) unsigned DEFAULT NULL,
  `segel` int(11) DEFAULT NULL,
  `ndsegelno` varchar(50) DEFAULT NULL,
  `ndsegeldate` date DEFAULT NULL,
  `idseksitp2bukgel` int(11) DEFAULT NULL,
  `SetujuBatalNo` varchar(50) DEFAULT NULL,
  `SetujuBatalNo2` varchar(50) DEFAULT NULL,
  `SetujuBatalDate` date DEFAULT NULL,
  `shipper` varchar(150) DEFAULT NULL,
  `negaraasal` varchar(150) DEFAULT NULL,
  `tonage_groos` varchar(50) DEFAULT NULL,
  `tonage_netto` varchar(50) DEFAULT NULL,
  `Pecahpos` char(1) DEFAULT NULL,
  `idpelayaran` int(11) DEFAULT NULL,
  `PelayaranAddress` varchar(250) DEFAULT NULL,
  `PelayaranAlasan` varchar(250) DEFAULT NULL,
  `recordstatus` tinyint(3) unsigned DEFAULT NULL,
  `idmanifest` int(10) unsigned DEFAULT NULL,
  `idseksi` int(10) unsigned DEFAULT NULL,
  `idstatusakhir` varchar(200) DEFAULT NULL,
  `jalur` int(10) unsigned DEFAULT NULL,
  `nhp_lelang` int(11) DEFAULT NULL,
  `NHPLelangNo` varchar(45) DEFAULT NULL,
  `NHPLelangDate` date DEFAULT NULL,
  `CacahLelangNo` varchar(45) DEFAULT NULL,
  `CacahLelangNo2` varchar(45) DEFAULT NULL,
  `CacahLelangDate` varchar(45) DEFAULT NULL,
  `idseksisetujubatal` int(10) unsigned DEFAULT NULL,
  `setujubatal` int(10) unsigned DEFAULT NULL,
  `ndkonfirmasi` int(10) unsigned DEFAULT NULL,
  `recordstatuskonf` tinyint(3) unsigned DEFAULT NULL,
  `jawabanstatuskonfirmasip2` varchar(45) DEFAULT NULL,
  `validasibcf15baru` varchar(45) DEFAULT NULL,
  `tglvalidasibcf15` datetime DEFAULT NULL,
  `perlukonf` tinyint(3) unsigned DEFAULT NULL,
  `idpemeriksa_tpp` int(10) unsigned DEFAULT NULL,
  `redress` int(10) unsigned DEFAULT NULL,
  `nosuratredress` varchar(45) DEFAULT NULL,
  `tglsuratredress` date DEFAULT NULL,
  `uraianredress` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcf15view`
--

LOCK TABLES `bcf15view` WRITE;
/*!40000 ALTER TABLE `bcf15view` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcf15view` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcfcontainer`
--

DROP TABLE IF EXISTS `bcfcontainer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcfcontainer` (
  `idcontainer` int(11) NOT NULL AUTO_INCREMENT,
  `idbcf15` int(11) NOT NULL,
  `nocontainer` varchar(20) NOT NULL,
  `idsize` int(11) NOT NULL,
  `bcf15no` varchar(45) NOT NULL,
  `tahun` varchar(45) NOT NULL,
  `segelpelayaran_man` varchar(80) NOT NULL,
  `segelpelayaran_fisik` varchar(80) NOT NULL,
  `tg_masuk` date NOT NULL,
  `tgl_input_masuk` datetime NOT NULL,
  `nm_petugas_masuk` varchar(45) NOT NULL,
  `ip_petugas_masuk` varchar(45) NOT NULL,
  `catatan_masuk` varchar(25) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `tglinput_keluar` datetime NOT NULL,
  `nm_petugas_keluar` varchar(45) NOT NULL,
  `ip_petugas_keluar` varchar(45) NOT NULL,
  `catatan_keluar` varchar(250) NOT NULL,
  `statussegelp2` varchar(45) NOT NULL,
  `statuspintu` varchar(45) NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `nm_upload` varchar(45) NOT NULL,
  PRIMARY KEY (`idcontainer`),
  KEY `FK_idbcf15` (`idbcf15`)
) ENGINE=InnoDB AUTO_INCREMENT=260464 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcfcontainer`
--

LOCK TABLES `bcfcontainer` WRITE;
/*!40000 ALTER TABLE `bcfcontainer` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcfcontainer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcfl4`
--

DROP TABLE IF EXISTS `bcfl4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcfl4` (
  `tahun` year(4) DEFAULT NULL,
  `jumbcf` bigint(21) DEFAULT NULL,
  `idtpp` int(11) unsigned DEFAULT NULL,
  `nm_tpp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcfl4`
--

LOCK TABLES `bcfl4` WRITE;
/*!40000 ALTER TABLE `bcfl4` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcfl4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcfmsa`
--

DROP TABLE IF EXISTS `bcfmsa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcfmsa` (
  `tahun` year(4) DEFAULT NULL,
  `jumbcf` bigint(21) DEFAULT NULL,
  `idtpp` int(11) unsigned DEFAULT NULL,
  `nm_tpp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcfmsa`
--

LOCK TABLES `bcfmsa` WRITE;
/*!40000 ALTER TABLE `bcfmsa` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcfmsa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcftranscon`
--

DROP TABLE IF EXISTS `bcftranscon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcftranscon` (
  `tahun` year(4) DEFAULT NULL,
  `jumbcf` bigint(21) DEFAULT NULL,
  `idtpp` int(11) unsigned DEFAULT NULL,
  `nm_tpp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcftranscon`
--

LOCK TABLES `bcftranscon` WRITE;
/*!40000 ALTER TABLE `bcftranscon` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcftranscon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bcftripandu`
--

DROP TABLE IF EXISTS `bcftripandu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcftripandu` (
  `tahun` year(4) DEFAULT NULL,
  `jumbcf` bigint(21) DEFAULT NULL,
  `idtpp` int(11) unsigned DEFAULT NULL,
  `nm_tpp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcftripandu`
--

LOCK TABLES `bcftripandu` WRITE;
/*!40000 ALTER TABLE `bcftripandu` DISABLE KEYS */;
/*!40000 ALTER TABLE `bcftripandu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `berita` (
  `idberita` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` varchar(45) NOT NULL,
  `waktu` datetime NOT NULL,
  `berita` longtext NOT NULL,
  `jenis` varchar(45) NOT NULL,
  `judul` varchar(45) NOT NULL,
  `kop` varchar(45) NOT NULL,
  `gbr` varchar(45) NOT NULL,
  `klik` int(3) unsigned NOT NULL,
  `ses` varchar(45) NOT NULL,
  `gbr2` varchar(45) NOT NULL,
  PRIMARY KEY (`idberita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blokir_perusahaan`
--

DROP TABLE IF EXISTS `blokir_perusahaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blokir_perusahaan` (
  `idblokir_perusahaan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_perusahaan` varchar(45) NOT NULL,
  `npwp_perusahaan` varchar(45) NOT NULL,
  `alamat_perusahaan` varchar(45) NOT NULL,
  `sebab_blokir` text NOT NULL,
  `surat_blokir` varchar(45) NOT NULL,
  `tgl_blokir` varchar(45) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `nip_petugasrekam` varchar(45) NOT NULL,
  `nama_petugasrekam` varchar(45) NOT NULL,
  `tgl_buka_blokir` date NOT NULL,
  `tgl_rekam_buka` datetime NOT NULL,
  `status_blokir` varchar(45) NOT NULL,
  `Ket_buka_blokir` varchar(200) NOT NULL,
  `no_suratbukablokir` varchar(45) NOT NULL,
  PRIMARY KEY (`idblokir_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blokir_perusahaan`
--

LOCK TABLES `blokir_perusahaan` WRITE;
/*!40000 ALTER TABLE `blokir_perusahaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `blokir_perusahaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmn`
--

DROP TABLE IF EXISTS `bmn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmn` (
  `idbmn` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` varchar(45) NOT NULL,
  `idbdn` varchar(45) NOT NULL,
  `nokepbm` varchar(45) NOT NULL,
  `tglkepbmn` date NOT NULL,
  `tahun_kep` char(6) NOT NULL,
  `kpu` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idbmn`)
) ENGINE=InnoDB AUTO_INCREMENT=9644 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmn`
--

LOCK TABLES `bmn` WRITE;
/*!40000 ALTER TABLE `bmn` DISABLE KEYS */;
/*!40000 ALTER TABLE `bmn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmn_dok_brg`
--

DROP TABLE IF EXISTS `bmn_dok_brg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmn_dok_brg` (
  `idbmn_dok_brg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbmn_dok` int(10) unsigned NOT NULL,
  `jml_brg` varchar(45) NOT NULL,
  `jns_brg` varchar(250) NOT NULL,
  `kondisi_brg` varchar(50) NOT NULL,
  `container_lcl` varchar(50) NOT NULL,
  `nilai_brg` varchar(45) NOT NULL,
  `ket_nilaibrg` varchar(45) NOT NULL,
  `nilai_brg_total` int(10) unsigned NOT NULL,
  `no_usulan_penetapan` varchar(45) NOT NULL,
  `tgl_usulan_penetapan` date NOT NULL,
  `jenis_dok` int(10) unsigned NOT NULL,
  `usulan_penetapan_untuk` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idbmn_dok_brg`)
) ENGINE=InnoDB AUTO_INCREMENT=2419 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmn_dok_brg`
--

LOCK TABLES `bmn_dok_brg` WRITE;
/*!40000 ALTER TABLE `bmn_dok_brg` DISABLE KEYS */;
/*!40000 ALTER TABLE `bmn_dok_brg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmn_dokasal`
--

DROP TABLE IF EXISTS `bmn_dokasal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmn_dokasal` (
  `idbmn_dokasal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbmn` int(10) unsigned NOT NULL,
  `jenis_dokasal` char(10) NOT NULL,
  `nodokasal` varchar(45) NOT NULL,
  `tgldokasal` date NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `idtpp` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idbmn_dokasal`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmn_dokasal`
--

LOCK TABLES `bmn_dokasal` WRITE;
/*!40000 ALTER TABLE `bmn_dokasal` DISABLE KEYS */;
/*!40000 ALTER TABLE `bmn_dokasal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bmn_usulan_penetapan`
--

DROP TABLE IF EXISTS `bmn_usulan_penetapan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bmn_usulan_penetapan` (
  `idbmn_usulan_penetapan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbmn_brg` int(10) unsigned NOT NULL,
  `jenis_dok_update` int(10) unsigned NOT NULL,
  `nodokupdate` varchar(45) NOT NULL,
  `tgldokupdate` varchar(45) NOT NULL,
  `nilaibrgyangdiajukan` varchar(45) NOT NULL,
  `usulan_penetapan_untuk` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idbmn_usulan_penetapan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bmn_usulan_penetapan`
--

LOCK TABLES `bmn_usulan_penetapan` WRITE;
/*!40000 ALTER TABLE `bmn_usulan_penetapan` DISABLE KEYS */;
/*!40000 ALTER TABLE `bmn_usulan_penetapan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bukaposbc11`
--

DROP TABLE IF EXISTS `bukaposbc11`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bukaposbc11` (
  `idbukaposbc11` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_surat_bukapos` varchar(45) NOT NULL,
  `tgl_surat_bukapos` date NOT NULL,
  `tgl_input` datetime NOT NULL,
  `nm_petugas_rekam` varchar(45) NOT NULL,
  `nip_petugas_rekam` varchar(45) NOT NULL,
  `ip_petugas_rekam` varchar(45) NOT NULL,
  `nm_pemohon` varchar(100) NOT NULL,
  `idbcf15` varchar(45) NOT NULL,
  `bcf15no` varchar(45) NOT NULL,
  `bcf15tgl` date NOT NULL,
  `tahun` char(5) NOT NULL,
  `nosuratpermohonanbatalbcf15` varchar(45) NOT NULL,
  `tglsuratpermohonanbatalbcf15` varchar(45) NOT NULL,
  `nm_pemohon_batal` varchar(100) NOT NULL,
  `tgl_input_permohonan` datetime NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`idbukaposbc11`)
) ENGINE=InnoDB AUTO_INCREMENT=14092 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bukaposbc11`
--

LOCK TABLES `bukaposbc11` WRITE;
/*!40000 ALTER TABLE `bukaposbc11` DISABLE KEYS */;
/*!40000 ALTER TABLE `bukaposbc11` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catatan_kaki`
--

DROP TABLE IF EXISTS `catatan_kaki`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catatan_kaki` (
  `idcatatan_kaki` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` varchar(45) NOT NULL,
  `iduser` varchar(45) NOT NULL,
  `catatan_kaki` varchar(250) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `idstatusakhir` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `type` varchar(45) NOT NULL,
  `tglupload` datetime NOT NULL,
  PRIMARY KEY (`idcatatan_kaki`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catatan_kaki`
--

LOCK TABLES `catatan_kaki` WRITE;
/*!40000 ALTER TABLE `catatan_kaki` DISABLE KEYS */;
/*!40000 ALTER TABLE `catatan_kaki` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuti`
--

DROP TABLE IF EXISTS `cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuti` (
  `idcuti` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_cuti_awal` date NOT NULL,
  `tgl_cuti_akhir` date NOT NULL,
  `alasan_cuti` varchar(100) NOT NULL,
  `kota_cuti` varchar(45) NOT NULL,
  `nmatasanlangsung` varchar(100) NOT NULL,
  `nipatasanlangsung` varchar(45) NOT NULL,
  `jabatanatasanlangsung` varchar(45) NOT NULL,
  `nmpejabatberwenang` varchar(100) NOT NULL,
  `nippejabatberwenang` varchar(45) NOT NULL,
  `jabatanpejabatberwenang` varchar(45) NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  `tahuncuti` varchar(45) NOT NULL,
  `lamacuti` varchar(45) NOT NULL,
  `tglinput` date NOT NULL,
  `seksi` varchar(45) NOT NULL,
  `bidang` varchar(45) NOT NULL,
  PRIMARY KEY (`idcuti`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuti`
--

LOCK TABLES `cuti` WRITE;
/*!40000 ALTER TABLE `cuti` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daemons`
--

DROP TABLE IF EXISTS `daemons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daemons`
--

LOCK TABLES `daemons` WRITE;
/*!40000 ALTER TABLE `daemons` DISABLE KEYS */;
/*!40000 ALTER TABLE `daemons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disposisi`
--

DROP TABLE IF EXISTS `disposisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disposisi` (
  `iddisposisi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_disposisi` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nip_lama` varchar(45) NOT NULL,
  `nip_baru` varchar(45) NOT NULL,
  PRIMARY KEY (`iddisposisi`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disposisi`
--

LOCK TABLES `disposisi` WRITE;
/*!40000 ALTER TABLE `disposisi` DISABLE KEYS */;
/*!40000 ALTER TABLE `disposisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokumen`
--

DROP TABLE IF EXISTS `dokumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dokumen` (
  `iddokumen` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dokumenname` varchar(80) NOT NULL,
  `jenis` varchar(45) NOT NULL,
  PRIMARY KEY (`iddokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokumen`
--

LOCK TABLES `dokumen` WRITE;
/*!40000 ALTER TABLE `dokumen` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ekspedisi_surat`
--

DROP TABLE IF EXISTS `ekspedisi_surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ekspedisi_surat` (
  `idekspedisi_surat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(85) NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `alamat_1` varchar(250) DEFAULT NULL,
  `alamat_2` varchar(250) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `tanggal_kirim` date NOT NULL,
  `dari` varchar(45) NOT NULL,
  PRIMARY KEY (`idekspedisi_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=1515 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ekspedisi_surat`
--

LOCK TABLES `ekspedisi_surat` WRITE;
/*!40000 ALTER TABLE `ekspedisi_surat` DISABLE KEYS */;
/*!40000 ALTER TABLE `ekspedisi_surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `idevent` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idevenkategori` char(2) NOT NULL,
  `uraian` text NOT NULL,
  `tgl_pelaksanaan` varchar(45) NOT NULL,
  `tgl_selesai` varchar(45) NOT NULL,
  `publish` char(2) NOT NULL,
  `iduser` int(10) unsigned NOT NULL,
  `tglpublish` datetime NOT NULL,
  `judulevent` varchar(100) NOT NULL,
  `tglselesaipublish` date NOT NULL,
  PRIMARY KEY (`idevent`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventfoto`
--

DROP TABLE IF EXISTS `eventfoto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventfoto` (
  `ideventfoto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idevent` int(5) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `tglupload` varchar(45) NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `keterangan_gbr` varchar(200) NOT NULL,
  PRIMARY KEY (`ideventfoto`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventfoto`
--

LOCK TABLES `eventfoto` WRITE;
/*!40000 ALTER TABLE `eventfoto` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventfoto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventkategori`
--

DROP TABLE IF EXISTS `eventkategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventkategori` (
  `ideventkategori` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(45) NOT NULL,
  PRIMARY KEY (`ideventkategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventkategori`
--

LOCK TABLES `eventkategori` WRITE;
/*!40000 ALTER TABLE `eventkategori` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventkategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventlamp`
--

DROP TABLE IF EXISTS `eventlamp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventlamp` (
  `ideventlamp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idevent` int(5) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `tglupload` varchar(45) NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `keterangan_gbr` varchar(200) NOT NULL,
  PRIMARY KEY (`ideventlamp`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventlamp`
--

LOCK TABLES `eventlamp` WRITE;
/*!40000 ALTER TABLE `eventlamp` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventlamp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frei_banned_users`
--

DROP TABLE IF EXISTS `frei_banned_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frei_banned_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frei_banned_users`
--

LOCK TABLES `frei_banned_users` WRITE;
/*!40000 ALTER TABLE `frei_banned_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `frei_banned_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frei_chat`
--

DROP TABLE IF EXISTS `frei_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frei_chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `from_name` varchar(30) NOT NULL,
  `to` int(11) NOT NULL,
  `to_name` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  `time` double(15,4) NOT NULL,
  `GMT_time` bigint(20) NOT NULL,
  `message_type` int(11) NOT NULL DEFAULT '0',
  `room_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=287 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frei_chat`
--

LOCK TABLES `frei_chat` WRITE;
/*!40000 ALTER TABLE `frei_chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `frei_chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frei_config`
--

DROP TABLE IF EXISTS `frei_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frei_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(30) DEFAULT 'NULL',
  `cat` varchar(20) DEFAULT 'NULL',
  `subcat` varchar(20) DEFAULT 'NULL',
  `val` varchar(500) DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frei_config`
--

LOCK TABLES `frei_config` WRITE;
/*!40000 ALTER TABLE `frei_config` DISABLE KEYS */;
/*!40000 ALTER TABLE `frei_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frei_rooms`
--

DROP TABLE IF EXISTS `frei_rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frei_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_author` varchar(100) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `room_type` tinyint(4) NOT NULL,
  `room_password` varchar(100) NOT NULL,
  `room_created` int(11) NOT NULL,
  `room_last_active` int(11) NOT NULL,
  `room_order` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `room_name` (`room_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frei_rooms`
--

LOCK TABLES `frei_rooms` WRITE;
/*!40000 ALTER TABLE `frei_rooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `frei_rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frei_session`
--

DROP TABLE IF EXISTS `frei_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frei_session` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `time` int(100) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `permanent_id` int(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `status_mesg` varchar(100) NOT NULL,
  `guest` tinyint(3) NOT NULL,
  `in_room` int(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permanent_id` (`permanent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frei_session`
--

LOCK TABLES `frei_session` WRITE;
/*!40000 ALTER TABLE `frei_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `frei_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frei_smileys`
--

DROP TABLE IF EXISTS `frei_smileys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frei_smileys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `symbol` varchar(10) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frei_smileys`
--

LOCK TABLES `frei_smileys` WRITE;
/*!40000 ALTER TABLE `frei_smileys` DISABLE KEYS */;
/*!40000 ALTER TABLE `frei_smileys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frei_video_session`
--

DROP TABLE IF EXISTS `frei_video_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frei_video_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL COMMENT 'unique room id',
  `from_id` int(11) NOT NULL,
  `msg_type` varchar(10) NOT NULL,
  `msg_label` int(2) NOT NULL,
  `msg_data` varchar(3000) NOT NULL,
  `msg_time` decimal(15,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frei_video_session`
--

LOCK TABLES `frei_video_session` WRITE;
/*!40000 ALTER TABLE `frei_video_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `frei_video_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frei_webrtc`
--

DROP TABLE IF EXISTS `frei_webrtc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frei_webrtc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frm_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `participants_id` int(11) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frei_webrtc`
--

LOCK TABLES `frei_webrtc` WRITE;
/*!40000 ALTER TABLE `frei_webrtc` DISABLE KEYS */;
/*!40000 ALTER TABLE `frei_webrtc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gammu`
--

DROP TABLE IF EXISTS `gammu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gammu`
--

LOCK TABLES `gammu` WRITE;
/*!40000 ALTER TABLE `gammu` DISABLE KEYS */;
/*!40000 ALTER TABLE `gammu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grafiktotalbcf`
--

DROP TABLE IF EXISTS `grafiktotalbcf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grafiktotalbcf` (
  `tahun` year(4) DEFAULT NULL,
  `jumbcf` bigint(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grafiktotalbcf`
--

LOCK TABLES `grafiktotalbcf` WRITE;
/*!40000 ALTER TABLE `grafiktotalbcf` DISABLE KEYS */;
/*!40000 ALTER TABLE `grafiktotalbcf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grafiktotalbcfmasuk`
--

DROP TABLE IF EXISTS `grafiktotalbcfmasuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grafiktotalbcfmasuk` (
  `tahun` year(4) DEFAULT NULL,
  `masuktpp` bigint(21) DEFAULT NULL,
  `masuk` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grafiktotalbcfmasuk`
--

LOCK TABLES `grafiktotalbcfmasuk` WRITE;
/*!40000 ALTER TABLE `grafiktotalbcfmasuk` DISABLE KEYS */;
/*!40000 ALTER TABLE `grafiktotalbcfmasuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grafiktotaltidakmasuktpp`
--

DROP TABLE IF EXISTS `grafiktotaltidakmasuktpp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grafiktotaltidakmasuktpp` (
  `tahun` year(4) DEFAULT NULL,
  `masuktpp` bigint(21) DEFAULT NULL,
  `masuk` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grafiktotaltidakmasuktpp`
--

LOCK TABLES `grafiktotaltidakmasuktpp` WRITE;
/*!40000 ALTER TABLE `grafiktotaltidakmasuktpp` DISABLE KEYS */;
/*!40000 ALTER TABLE `grafiktotaltidakmasuktpp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_admin`
--

DROP TABLE IF EXISTS `history_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history_admin` (
  `idhistory_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uraian_admin` varchar(45) NOT NULL,
  `waktu_klik` datetime NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `nama_user` varchar(45) NOT NULL,
  PRIMARY KEY (`idhistory_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_admin`
--

LOCK TABLES `history_admin` WRITE;
/*!40000 ALTER TABLE `history_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historybcf15`
--

DROP TABLE IF EXISTS `historybcf15`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historybcf15` (
  `idhistorybcf15` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namaaksi` varchar(45) NOT NULL,
  `tanggalaksi` date NOT NULL,
  `bcf15no` varchar(45) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nama_user` varchar(45) NOT NULL,
  `nip_user` varchar(100) NOT NULL,
  `dokupdate` varchar(45) NOT NULL,
  `tgldokupdate` date NOT NULL,
  `idbcf15` int(10) unsigned NOT NULL,
  `userdiupdate` varchar(45) NOT NULL,
  `nipuserdiupdate` varchar(45) NOT NULL,
  `keterangan` varchar(45) NOT NULL,
  `noagenda` varchar(45) NOT NULL,
  `tanggalagenda` date NOT NULL,
  `nosurat` varchar(45) NOT NULL,
  `hal` varchar(100) NOT NULL,
  `asalsurat` varchar(45) NOT NULL,
  PRIMARY KEY (`idhistorybcf15`)
) ENGINE=InnoDB AUTO_INCREMENT=174214 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historybcf15`
--

LOCK TABLES `historybcf15` WRITE;
/*!40000 ALTER TABLE `historybcf15` DISABLE KEYS */;
/*!40000 ALTER TABLE `historybcf15` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historykonfirmasi`
--

DROP TABLE IF EXISTS `historykonfirmasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historykonfirmasi` (
  `idhistorykonfirmasi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` int(10) unsigned NOT NULL,
  `nondkonfirmasi` varchar(45) NOT NULL,
  `tglndkonfirmasi` date NOT NULL,
  `namauserinputnd` varchar(45) NOT NULL,
  `nipuserinputnd` varchar(45) NOT NULL,
  `tanggalinput` datetime NOT NULL,
  `validasiseksi` varchar(45) NOT NULL,
  `tanggalvalidasiseksi` datetime NOT NULL,
  `namaseksivalidasi` varchar(45) NOT NULL,
  `nipseksivalidasi` varchar(45) NOT NULL,
  `jawabanp2` varchar(45) NOT NULL,
  `alasan` varchar(45) NOT NULL,
  `namauserp2` varchar(45) NOT NULL,
  `nipuserp2` varchar(45) NOT NULL,
  `tgljawabp2` datetime NOT NULL,
  `validasiseksip2` varchar(45) NOT NULL,
  `namaseksip2valid` varchar(45) NOT NULL,
  `nipseksivalidp2` varchar(45) NOT NULL,
  `tanggalvalidseksip2` datetime NOT NULL,
  PRIMARY KEY (`idhistorykonfirmasi`)
) ENGINE=InnoDB AUTO_INCREMENT=1521 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historykonfirmasi`
--

LOCK TABLES `historykonfirmasi` WRITE;
/*!40000 ALTER TABLE `historykonfirmasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `historykonfirmasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` varchar(160) NOT NULL DEFAULT '',
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inbox`
--

LOCK TABLES `inbox` WRITE;
/*!40000 ALTER TABLE `inbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `inbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jalur`
--

DROP TABLE IF EXISTS `jalur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jalur` (
  `idjalur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jalur` varchar(45) NOT NULL,
  PRIMARY KEY (`idjalur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jalur`
--

LOCK TABLES `jalur` WRITE;
/*!40000 ALTER TABLE `jalur` DISABLE KEYS */;
/*!40000 ALTER TABLE `jalur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jawabankonfirmasi`
--

DROP TABLE IF EXISTS `jawabankonfirmasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jawabankonfirmasi` (
  `idjawabankonfirmasi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_jawaban` varchar(45) NOT NULL,
  PRIMARY KEY (`idjawabankonfirmasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jawabankonfirmasi`
--

LOCK TABLES `jawabankonfirmasi` WRITE;
/*!40000 ALTER TABLE `jawabankonfirmasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `jawabankonfirmasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kapal_autocomp`
--

DROP TABLE IF EXISTS `kapal_autocomp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kapal_autocomp` (
  `idkapal_autocomp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_kapal` varchar(45) NOT NULL,
  PRIMARY KEY (`idkapal_autocomp`)
) ENGINE=InnoDB AUTO_INCREMENT=782 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kapal_autocomp`
--

LOCK TABLES `kapal_autocomp` WRITE;
/*!40000 ALTER TABLE `kapal_autocomp` DISABLE KEYS */;
/*!40000 ALTER TABLE `kapal_autocomp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kapalvoy_autocomp`
--

DROP TABLE IF EXISTS `kapalvoy_autocomp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kapalvoy_autocomp` (
  `idkapalvoy_autocomp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `voy` varchar(45) NOT NULL,
  PRIMARY KEY (`idkapalvoy_autocomp`)
) ENGINE=InnoDB AUTO_INCREMENT=2228 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kapalvoy_autocomp`
--

LOCK TABLES `kapalvoy_autocomp` WRITE;
/*!40000 ALTER TABLE `kapalvoy_autocomp` DISABLE KEYS */;
/*!40000 ALTER TABLE `kapalvoy_autocomp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kemasan_autocomp`
--

DROP TABLE IF EXISTS `kemasan_autocomp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kemasan_autocomp` (
  `idkemasan_autocomp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_kemasan` varchar(45) NOT NULL,
  PRIMARY KEY (`idkemasan_autocomp`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kemasan_autocomp`
--

LOCK TABLES `kemasan_autocomp` WRITE;
/*!40000 ALTER TABLE `kemasan_autocomp` DISABLE KEYS */;
/*!40000 ALTER TABLE `kemasan_autocomp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kepala_kantor`
--

DROP TABLE IF EXISTS `kepala_kantor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kepala_kantor` (
  `idkepala_kantor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_kepala_kantor` varchar(45) NOT NULL,
  `nip_kepala_kantor` varchar(45) NOT NULL,
  `status_record` varchar(45) NOT NULL,
  `plh` varchar(45) NOT NULL,
  PRIMARY KEY (`idkepala_kantor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kepala_kantor`
--

LOCK TABLES `kepala_kantor` WRITE;
/*!40000 ALTER TABLE `kepala_kantor` DISABLE KEYS */;
/*!40000 ALTER TABLE `kepala_kantor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kofirmasi_p2`
--

DROP TABLE IF EXISTS `kofirmasi_p2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kofirmasi_p2` (
  `idkofirmasi_p2` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` int(10) unsigned NOT NULL,
  `konf_bcf15no` varchar(45) NOT NULL,
  `konf_bcf15tgl` date NOT NULL,
  `konf_tahun` varchar(45) NOT NULL,
  `konf_bc11no` varchar(45) NOT NULL,
  `konf_bc11tgl` date NOT NULL,
  `konf_bc11pos` varchar(45) NOT NULL,
  `konf_bc11psubpos` varchar(45) NOT NULL,
  `nohp_pemohon` varchar(40) NOT NULL,
  `nm_consignee` varchar(100) NOT NULL,
  `npwp_consignee` varchar(100) NOT NULL,
  `konf_tglkonftpp` datetime NOT NULL,
  `konf_btstgl` datetime NOT NULL,
  `nm_usertpp` varchar(45) NOT NULL,
  `nip_usertpp` varchar(45) NOT NULL,
  `ip_usertpp` varchar(20) NOT NULL,
  `konf_tglkonfp2` varchar(45) NOT NULL,
  `konf_stsblokir` char(6) NOT NULL,
  `konf_stssegel` char(6) NOT NULL,
  `konf_stsnhi` char(6) NOT NULL,
  `status_ket` varchar(100) NOT NULL,
  `nm_userp2` varchar(45) NOT NULL,
  `nip_userp2` varchar(45) NOT NULL,
  `ip_userp2` varchar(45) NOT NULL,
  `catatan_userp2` varchar(45) NOT NULL,
  `konf_lewatjam` int(11) NOT NULL DEFAULT '0',
  `konf_tglkonfotoma` datetime NOT NULL,
  `konf_manualhc` int(11) NOT NULL DEFAULT '0',
  `konf_nondtpp` varchar(45) NOT NULL,
  `konf_tglndtpp` date NOT NULL,
  `nm_usertppmanual` varchar(45) NOT NULL,
  `nip_usertppmanual` varchar(45) NOT NULL,
  `ip_usertppmanual` varchar(45) NOT NULL,
  `idseksitpp` int(10) unsigned NOT NULL,
  `konf_tglinputndtpp` datetime NOT NULL,
  `konf_jwabanmanualhc` int(11) NOT NULL DEFAULT '0',
  `konf_nondp2` varchar(45) NOT NULL,
  `konf_tglndp2` date NOT NULL,
  `nm_userp2manual` varchar(45) NOT NULL,
  `nip_userp2manual` varchar(45) NOT NULL,
  `ip_userp2manual` varchar(45) NOT NULL,
  `idseksip2` int(10) unsigned NOT NULL,
  `konf_tglinputndp2` varchar(45) NOT NULL,
  `Catatan_manual_p2` varchar(200) NOT NULL,
  `konf_statusakhir` varchar(45) NOT NULL,
  `tglrekam_batal` datetime NOT NULL,
  `niprekam_batal` varchar(45) NOT NULL,
  `nmrekam_batal` varchar(45) NOT NULL,
  `idseksirekam_batal` int(10) unsigned NOT NULL,
  `iprekam_batal` varchar(45) NOT NULL,
  PRIMARY KEY (`idkofirmasi_p2`),
  KEY `idbcf15` (`idbcf15`),
  KEY `konf_bcf15no` (`konf_bcf15no`),
  KEY `konf_tahun` (`konf_tahun`),
  KEY `konf_bc11no` (`konf_bc11no`)
) ENGINE=InnoDB AUTO_INCREMENT=12522 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kofirmasi_p2`
--

LOCK TABLES `kofirmasi_p2` WRITE;
/*!40000 ALTER TABLE `kofirmasi_p2` DISABLE KEYS */;
/*!40000 ALTER TABLE `kofirmasi_p2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konf_p2_kembali`
--

DROP TABLE IF EXISTS `konf_p2_kembali`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `konf_p2_kembali` (
  `idkonf_p2_kembali` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idkonf_p2` varchar(45) NOT NULL,
  `idbcf15` varchar(45) NOT NULL,
  `catatanpenimbunan` text NOT NULL,
  `status_nhi` varchar(45) NOT NULL,
  `status_segel` varchar(45) NOT NULL,
  `status_blokir` varchar(45) NOT NULL,
  `nm_petugaspenimbunan` varchar(45) NOT NULL,
  `nip_petugaspenimbunan` varchar(45) NOT NULL,
  `tgl_responpenimbunan` datetime NOT NULL,
  `catatanp2` text NOT NULL,
  `nm_petugasp2` varchar(45) NOT NULL,
  `nip_petugasp2` varchar(45) NOT NULL,
  `tgl_responp2` datetime NOT NULL,
  PRIMARY KEY (`idkonf_p2_kembali`)
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konf_p2_kembali`
--

LOCK TABLES `konf_p2_kembali` WRITE;
/*!40000 ALTER TABLE `konf_p2_kembali` DISABLE KEYS */;
/*!40000 ALTER TABLE `konf_p2_kembali` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konfirmasi_p2_tgllibur`
--

DROP TABLE IF EXISTS `konfirmasi_p2_tgllibur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `konfirmasi_p2_tgllibur` (
  `idkonfirmasi_p2_tgllibur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_libur` date NOT NULL,
  `keterangan_libur` varchar(200) NOT NULL,
  `user_input` varchar(45) NOT NULL,
  `nip_user` varchar(45) NOT NULL,
  `tglinput` datetime NOT NULL,
  `lamanya` char(1) NOT NULL,
  PRIMARY KEY (`idkonfirmasi_p2_tgllibur`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konfirmasi_p2_tgllibur`
--

LOCK TABLES `konfirmasi_p2_tgllibur` WRITE;
/*!40000 ALTER TABLE `konfirmasi_p2_tgllibur` DISABLE KEYS */;
/*!40000 ALTER TABLE `konfirmasi_p2_tgllibur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lap_kinerja`
--

DROP TABLE IF EXISTS `lap_kinerja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lap_kinerja` (
  `idlap_kinerja` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_input` date NOT NULL,
  `bulan` char(3) NOT NULL,
  `Tahun` char(4) NOT NULL,
  `lap_tap_bcf15` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_sprint` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_pemberitahuan` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_bcf15_masuk` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_bcf15_tidak_masuk` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_cacah_batal` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_cacah_lelang` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_ndkondirmasip2` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_setujubatalbcf15` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_suratmohonbatal` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_kepBDN` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_kepBMN` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tot_bcf_to_bmn` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tot_bdn_to_bmn` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_kepmusnah` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tot_bcf_musnah` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tot_bdn_musnah` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tot_bmn_musnah` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_kepbtdklelang` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tot_bcf_kepbtdklelang` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_kegiatan_pelaksanaanmusnah` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_kegiatan_lelang_btd` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_jumlah_lotlelang_btd` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_jumlah_lotlelanglaku_btd` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_jumlah_limit_lelang_btd` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_jumlah_hrgterbentuk_lelang_btd` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_kegiatan_lelang_bmn` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_jumlah_lotlelang_bmn` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_jumlah_lotlelanglaku_bmn` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_jumlah_limit_lelang_bmn` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_jumlah_hrgterbentuk_lelang_bmn` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_jumlah_peserta_lelang_btd` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_jumlah_peserta_lelang_bmn` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_pembatalan_bdn` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_pembatalan_bmn` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_20_terbit` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_40_terbit` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_45_terbit` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_lcl_terbit` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_20_masuktpp` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_40_masuktpp` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_45_masuktpp` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_lcl_masuktpp` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_20_keluar` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_40_keluar` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_45_keluar` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_LCL_keluar` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_20_musnah` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_40_musnah` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_45_musnah` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_cont_lcl_musnah` decimal(10,0) NOT NULL DEFAULT '0',
  `lap_tap_tot_bamusnah` decimal(10,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idlap_kinerja`),
  KEY `bulan` (`bulan`),
  KEY `Tahun` (`Tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lap_kinerja`
--

LOCK TABLES `lap_kinerja` WRITE;
/*!40000 ALTER TABLE `lap_kinerja` DISABLE KEYS */;
/*!40000 ALTER TABLE `lap_kinerja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lap_kinerja_bulan`
--

DROP TABLE IF EXISTS `lap_kinerja_bulan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lap_kinerja_bulan` (
  `idlap_kinerja_bulan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_bulan` char(5) NOT NULL,
  `nm_bulan_lengkap` varchar(45) NOT NULL,
  PRIMARY KEY (`idlap_kinerja_bulan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lap_kinerja_bulan`
--

LOCK TABLES `lap_kinerja_bulan` WRITE;
/*!40000 ALTER TABLE `lap_kinerja_bulan` DISABLE KEYS */;
/*!40000 ALTER TABLE `lap_kinerja_bulan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `idlog` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `jamin` varchar(100) NOT NULL,
  `jamout` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `ip` varchar(45) NOT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB AUTO_INCREMENT=11461 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (11452,'admin','2015-12-06','07:59:08','09:02:39','offline','111.94.83.91'),(11453,'admin','2015-12-06','08:00:42','09:02:39','offline','111.94.83.91'),(11454,'admin','2015-12-07','20:52:35','09:02:39','offline','114.125.48.220'),(11455,'admin','2015-12-09','07:53:19','09:02:39','offline','202.62.18.80'),(11456,'admin','2015-12-11','01:34:39','09:02:39','offline','114.125.13.193'),(11457,'admin','2015-12-12','12:37:21','09:02:39','offline','114.125.11.137'),(11458,'admin','2015-12-15','07:10:47','09:02:39','offline','114.125.12.164'),(11459,'admin','2015-12-15','11:55:32','09:02:39','offline','114.125.12.164'),(11460,'admin','2015-12-16','09:02:29','09:02:39','offline','114.125.12.164');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log1`
--

DROP TABLE IF EXISTS `log1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log1` (
  `idlog` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `jamin` varchar(100) NOT NULL,
  `jamout` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `ip` varchar(45) NOT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB AUTO_INCREMENT=4556 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log1`
--

LOCK TABLES `log1` WRITE;
/*!40000 ALTER TABLE `log1` DISABLE KEYS */;
/*!40000 ALTER TABLE `log1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manifest`
--

DROP TABLE IF EXISTS `manifest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manifest` (
  `idmanifest` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_manifest` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmanifest`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manifest`
--

LOCK TABLES `manifest` WRITE;
/*!40000 ALTER TABLE `manifest` DISABLE KEYS */;
/*!40000 ALTER TABLE `manifest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ndlembur`
--

DROP TABLE IF EXISTS `ndlembur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ndlembur` (
  `idndlembur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nond` varchar(45) NOT NULL,
  `tglnd` date NOT NULL,
  `idseksi` int(10) unsigned NOT NULL,
  `waktu_lembur` date NOT NULL,
  PRIMARY KEY (`idndlembur`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ndlembur`
--

LOCK TABLES `ndlembur` WRITE;
/*!40000 ALTER TABLE `ndlembur` DISABLE KEYS */;
/*!40000 ALTER TABLE `ndlembur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ndlembur_detail`
--

DROP TABLE IF EXISTS `ndlembur_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ndlembur_detail` (
  `idndlembur_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpegawai` int(10) unsigned NOT NULL,
  `idndlembur` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idndlembur_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=539 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ndlembur_detail`
--

LOCK TABLES `ndlembur_detail` WRITE;
/*!40000 ALTER TABLE `ndlembur_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `ndlembur_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ndroling`
--

DROP TABLE IF EXISTS `ndroling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ndroling` (
  `idndroling` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nond` varchar(45) NOT NULL,
  `tglnd` date NOT NULL,
  `hal_roling` varchar(200) NOT NULL,
  `kepada` varchar(200) NOT NULL,
  `darind` varchar(45) NOT NULL,
  `idseksi` int(10) unsigned NOT NULL,
  `tmt_roling` date NOT NULL,
  `nd_manual` varchar(45) NOT NULL,
  `tgl_nd_manual` date NOT NULL,
  `hal_manual` varchar(45) NOT NULL,
  `tglinput_roling` datetime NOT NULL,
  `tglinput_manual` datetime NOT NULL,
  PRIMARY KEY (`idndroling`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ndroling`
--

LOCK TABLES `ndroling` WRITE;
/*!40000 ALTER TABLE `ndroling` DISABLE KEYS */;
/*!40000 ALTER TABLE `ndroling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ndroling_detail`
--

DROP TABLE IF EXISTS `ndroling_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ndroling_detail` (
  `idndroling_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpegawai` int(10) unsigned NOT NULL,
  `tlama` varchar(200) NOT NULL,
  `tbaru` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tglinput` date NOT NULL,
  `idndroling` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idndroling_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ndroling_detail`
--

LOCK TABLES `ndroling_detail` WRITE;
/*!40000 ALTER TABLE `ndroling_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `ndroling_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhp`
--

DROP TABLE IF EXISTS `nhp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nhp` (
  `idnhp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` int(10) unsigned NOT NULL,
  `bcf15no` varchar(45) NOT NULL,
  `bcf15tgl` date NOT NULL,
  `nonhp` varchar(45) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(45) NOT NULL,
  `jenisbrg` varchar(45) NOT NULL,
  `kondisi` varchar(45) NOT NULL,
  `negaraasal` varchar(45) NOT NULL,
  `tahun` varchar(45) NOT NULL,
  PRIMARY KEY (`idnhp`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhp`
--

LOCK TABLES `nhp` WRITE;
/*!40000 ALTER TABLE `nhp` DISABLE KEYS */;
/*!40000 ALTER TABLE `nhp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outbox`
--

DROP TABLE IF EXISTS `outbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` varchar(160) NOT NULL DEFAULT '',
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`)
) ENGINE=MyISAM AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outbox`
--

LOCK TABLES `outbox` WRITE;
/*!40000 ALTER TABLE `outbox` DISABLE KEYS */;
INSERT INTO `outbox` VALUES ('2015-12-09 13:00:39','2015-12-09 13:00:39','2015-12-09 13:00:39',NULL,'08116111681','Default_No_Compression',NULL,-1,'Test',148,'false',-1,NULL,'2015-12-09 13:00:39','yes','system');
/*!40000 ALTER TABLE `outbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outbox_multipart`
--

DROP TABLE IF EXISTS `outbox_multipart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` varchar(160) DEFAULT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outbox_multipart`
--

LOCK TABLES `outbox_multipart` WRITE;
/*!40000 ALTER TABLE `outbox_multipart` DISABLE KEYS */;
/*!40000 ALTER TABLE `outbox_multipart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p2`
--

DROP TABLE IF EXISTS `p2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `p2` (
  `idp2` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_p2` varchar(45) NOT NULL,
  `kd_p2` varchar(45) NOT NULL,
  PRIMARY KEY (`idp2`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p2`
--

LOCK TABLES `p2` WRITE;
/*!40000 ALTER TABLE `p2` DISABLE KEYS */;
/*!40000 ALTER TABLE `p2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pbk`
--

DROP TABLE IF EXISTS `pbk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pbk` (
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pbk`
--

LOCK TABLES `pbk` WRITE;
/*!40000 ALTER TABLE `pbk` DISABLE KEYS */;
/*!40000 ALTER TABLE `pbk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pbk_groups`
--

DROP TABLE IF EXISTS `pbk_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pbk_groups`
--

LOCK TABLES `pbk_groups` WRITE;
/*!40000 ALTER TABLE `pbk_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `pbk_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pecahpos`
--

DROP TABLE IF EXISTS `pecahpos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pecahpos` (
  `idpecahpos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` varchar(45) NOT NULL,
  `nobcf15_new` varchar(45) NOT NULL,
  `tglbcf15_new` date NOT NULL,
  `nobc11_new` varchar(45) NOT NULL,
  `tglbc11_new` date NOT NULL,
  `pos_new` varchar(45) NOT NULL,
  `subpos_new` varchar(45) NOT NULL,
  `consignee_new` varchar(45) NOT NULL,
  `notify_new` varchar(45) NOT NULL,
  `idtps` varchar(45) NOT NULL,
  `idtpp` varchar(45) NOT NULL,
  `jum_new` varchar(45) NOT NULL,
  `satuan_new` varchar(45) NOT NULL,
  `uraian_new` varchar(200) NOT NULL,
  `tahun` varchar(45) NOT NULL,
  `blno_new` varchar(45) NOT NULL,
  `bltgl_new` date NOT NULL,
  `no_surat_pecah` varchar(45) NOT NULL,
  `tgl_surat_pecah` date NOT NULL,
  PRIMARY KEY (`idpecahpos`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pecahpos`
--

LOCK TABLES `pecahpos` WRITE;
/*!40000 ALTER TABLE `pecahpos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pecahpos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `idpegawai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_pegawai` varchar(100) NOT NULL,
  `nip_baru` varchar(45) NOT NULL,
  `nip_lama` varchar(45) NOT NULL,
  `Pangkat` varchar(45) NOT NULL,
  `golongan` varchar(45) NOT NULL,
  `jabatan` varchar(45) NOT NULL,
  `no_hp` varchar(45) NOT NULL,
  `tempat_tugas` varchar(200) NOT NULL,
  PRIMARY KEY (`idpegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelayaran`
--

DROP TABLE IF EXISTS `pelayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelayaran` (
  `idpelayaran` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_pelayaran` varchar(45) NOT NULL,
  `alamat_pelayaran` varchar(200) NOT NULL,
  `alamat_pelayaran_2` varchar(200) DEFAULT NULL,
  `kota` varchar(45) NOT NULL,
  `Telp` varchar(45) DEFAULT NULL,
  `Fax` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpelayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelayaran`
--

LOCK TABLES `pelayaran` WRITE;
/*!40000 ALTER TABLE `pelayaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemeriksa_tpp`
--

DROP TABLE IF EXISTS `pemeriksa_tpp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pemeriksa_tpp` (
  `idpemeriksa_tpp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_pemeriksa` varchar(45) NOT NULL,
  `nip_pemeriksa` varchar(45) NOT NULL,
  `tampilkan` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idpemeriksa_tpp`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemeriksa_tpp`
--

LOCK TABLES `pemeriksa_tpp` WRITE;
/*!40000 ALTER TABLE `pemeriksa_tpp` DISABLE KEYS */;
/*!40000 ALTER TABLE `pemeriksa_tpp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesan` (
  `idpesan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `waktu` varchar(20) NOT NULL,
  `dari` varchar(100) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `sudahbaca` varchar(1) NOT NULL,
  PRIMARY KEY (`idpesan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesan`
--

LOCK TABLES `pesan` WRITE;
/*!40000 ALTER TABLE `pesan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '0',
  `Signal` int(11) NOT NULL DEFAULT '0',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phones`
--

LOCK TABLES `phones` WRITE;
/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pib_importir`
--

DROP TABLE IF EXISTS `pib_importir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pib_importir` (
  `idpib_importir` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `npwp` varchar(45) NOT NULL,
  `nm_importir` varchar(100) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  PRIMARY KEY (`idpib_importir`)
) ENGINE=InnoDB AUTO_INCREMENT=3583 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pib_importir`
--

LOCK TABLES `pib_importir` WRITE;
/*!40000 ALTER TABLE `pib_importir` DISABLE KEYS */;
/*!40000 ALTER TABLE `pib_importir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seksi`
--

DROP TABLE IF EXISTS `seksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seksi` (
  `idseksi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_seksi` varchar(45) NOT NULL,
  `nip` varchar(45) NOT NULL,
  `jabatan` varchar(45) NOT NULL,
  `bidang` varchar(45) NOT NULL,
  `status_seksi` varchar(45) NOT NULL,
  `plh` varchar(45) NOT NULL,
  `kdseksi` varchar(45) NOT NULL,
  PRIMARY KEY (`idseksi`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seksi`
--

LOCK TABLES `seksi` WRITE;
/*!40000 ALTER TABLE `seksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `seksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sentitems`
--

DROP TABLE IF EXISTS `sentitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` varchar(160) NOT NULL DEFAULT '',
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`,`SequencePosition`),
  KEY `sentitems_date` (`DeliveryDateTime`),
  KEY `sentitems_tpmr` (`TPMR`),
  KEY `sentitems_dest` (`DestinationNumber`),
  KEY `sentitems_sender` (`SenderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sentitems`
--

LOCK TABLES `sentitems` WRITE;
/*!40000 ALTER TABLE `sentitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `sentitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_kegiatan_tpp`
--

DROP TABLE IF EXISTS `sms_kegiatan_tpp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_kegiatan_tpp` (
  `idsms_kegiatan_tpp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_pegawai` varchar(45) NOT NULL,
  `noHp_pegawai` varchar(45) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `Jen_kegiatan` varchar(100) NOT NULL,
  `status_sms` varchar(45) NOT NULL,
  `tglsms` date NOT NULL,
  PRIMARY KEY (`idsms_kegiatan_tpp`)
) ENGINE=InnoDB AUTO_INCREMENT=370 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_kegiatan_tpp`
--

LOCK TABLES `sms_kegiatan_tpp` WRITE;
/*!40000 ALTER TABLE `sms_kegiatan_tpp` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms_kegiatan_tpp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_kirim_kegiatan`
--

DROP TABLE IF EXISTS `sms_kirim_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_kirim_kegiatan` (
  `nm_pegawai` varchar(45) NOT NULL,
  `noHp_pegawai` varchar(45) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `Jen_kegiatan` varchar(100) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `waktu_kirim` time NOT NULL,
  PRIMARY KEY (`nm_pegawai`,`noHp_pegawai`,`tgl_kegiatan`,`Jen_kegiatan`,`tgl_kirim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_kirim_kegiatan`
--

LOCK TABLES `sms_kirim_kegiatan` WRITE;
/*!40000 ALTER TABLE `sms_kirim_kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms_kirim_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sprint_tps`
--

DROP TABLE IF EXISTS `sprint_tps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sprint_tps` (
  `kode` varchar(15) NOT NULL,
  `gudang` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sprint_tps`
--

LOCK TABLES `sprint_tps` WRITE;
/*!40000 ALTER TABLE `sprint_tps` DISABLE KEYS */;
/*!40000 ALTER TABLE `sprint_tps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusakhir`
--

DROP TABLE IF EXISTS `statusakhir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statusakhir` (
  `idstatusakhir` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `statusakhirname` varchar(60) NOT NULL,
  PRIMARY KEY (`idstatusakhir`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusakhir`
--

LOCK TABLES `statusakhir` WRITE;
/*!40000 ALTER TABLE `statusakhir` DISABLE KEYS */;
/*!40000 ALTER TABLE `statusakhir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuslelang`
--

DROP TABLE IF EXISTS `statuslelang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuslelang` (
  `idstatuslelang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `namastatus` varchar(45) NOT NULL,
  `keterangan` varchar(45) NOT NULL,
  PRIMARY KEY (`idstatuslelang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuslelang`
--

LOCK TABLES `statuslelang` WRITE;
/*!40000 ALTER TABLE `statuslelang` DISABLE KEYS */;
/*!40000 ALTER TABLE `statuslelang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suratmasuk`
--

DROP TABLE IF EXISTS `suratmasuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suratmasuk` (
  `idsuratmasuk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `noagenda` varchar(20) NOT NULL,
  `tglagenda` date NOT NULL,
  `nosurat` varchar(45) NOT NULL,
  `tanggalsurat` date NOT NULL,
  `perihal` varchar(45) NOT NULL,
  `asalsurat` varchar(45) NOT NULL,
  `noidbcf15` int(10) unsigned NOT NULL,
  `agendakabid` varchar(45) NOT NULL,
  `tglagendakabid` date NOT NULL,
  `iddisposisi` int(10) unsigned NOT NULL,
  `atthagr_setujudilayani` int(10) unsigned NOT NULL,
  `atthgr_attjumlahjenis` int(10) unsigned NOT NULL,
  `atthgr_koordp2` int(10) unsigned NOT NULL,
  `atthgr_lap` int(10) unsigned NOT NULL,
  `atthgr_unpencacahan` int(10) unsigned NOT NULL,
  `attpem_unpencacahan` int(10) unsigned NOT NULL,
  `attpem_jumjen` int(10) unsigned NOT NULL,
  `attpem_koordp2` int(10) unsigned NOT NULL,
  `attpem_lap` int(10) unsigned NOT NULL,
  `attumum` varchar(200) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'open',
  `seksipenimbunan` varchar(45) NOT NULL,
  `tahun` varchar(45) NOT NULL,
  `jenissurat` varchar(45) NOT NULL,
  `kkfrondes` varchar(45) NOT NULL,
  `product` varchar(100) NOT NULL,
  `catatan` varchar(250) NOT NULL,
  PRIMARY KEY (`idsuratmasuk`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suratmasuk`
--

LOCK TABLES `suratmasuk` WRITE;
/*!40000 ALTER TABLE `suratmasuk` DISABLE KEYS */;
/*!40000 ALTER TABLE `suratmasuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suratmasukpembatalanbcf15`
--

DROP TABLE IF EXISTS `suratmasukpembatalanbcf15`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suratmasukpembatalanbcf15` (
  `idsuratmasuk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `noagenda` varchar(20) NOT NULL COMMENT 'np',
  `tglagenda` date NOT NULL,
  `nosurat` varchar(45) NOT NULL,
  `tanggalsurat` date NOT NULL,
  `perihal` varchar(45) NOT NULL,
  `asalsurat` varchar(45) NOT NULL,
  `noidbcf15` int(10) unsigned NOT NULL,
  `agendakabid` varchar(45) NOT NULL,
  `tglagendakabid` date NOT NULL,
  `iddisposisi` int(10) unsigned NOT NULL,
  `atthagr_setujudilayani` int(10) unsigned NOT NULL,
  `atthgr_attjumlahjenis` int(10) unsigned NOT NULL,
  `atthgr_koordp2` int(10) unsigned NOT NULL,
  `atthgr_lap` int(10) unsigned NOT NULL,
  `atthgr_unpencacahan` int(10) unsigned NOT NULL,
  `attpem_unpencacahan` int(10) unsigned NOT NULL,
  `attpem_jumjen` int(10) unsigned NOT NULL,
  `attpem_koordp2` int(10) unsigned NOT NULL,
  `attpem_lap` int(10) unsigned NOT NULL,
  `attumum` varchar(200) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'open',
  `seksipenimbunan` varchar(45) NOT NULL,
  `tahun` varchar(45) NOT NULL,
  `jenissurat` varchar(45) NOT NULL,
  `no_agd_fr` varchar(45) NOT NULL,
  `tgl_agd_fr` date NOT NULL,
  `cek_nhp` int(10) unsigned NOT NULL,
  `cek_sppb` int(10) unsigned NOT NULL,
  `cek_st` int(10) unsigned NOT NULL,
  `cek_sk` int(10) unsigned NOT NULL,
  `cek_doklkp` int(10) unsigned NOT NULL,
  `cek_idcard` int(11) NOT NULL,
  `cek_suratpermohonan` int(11) NOT NULL,
  `cek_pib` int(11) NOT NULL,
  `cek_bc12` int(11) NOT NULL,
  `cek_bc30` int(11) NOT NULL,
  `cek_tutuppu` int(11) NOT NULL,
  `cek_lainnya` int(11) NOT NULL,
  `cek_lainnya_char` varchar(100) NOT NULL,
  `lengkap` int(10) unsigned NOT NULL,
  `tglajudok` datetime NOT NULL,
  `tgllengkap` datetime NOT NULL,
  `nm_petugas_cek` varchar(45) NOT NULL,
  `nip_petugas_cek` varchar(45) NOT NULL,
  `keterangan_cek` varchar(250) NOT NULL,
  `nm_st` varchar(100) NOT NULL,
  `nm_ambil` varchar(100) NOT NULL,
  `tglambil` datetime NOT NULL,
  `nohp_ambil` varchar(45) NOT NULL,
  `statussurat` varchar(45) NOT NULL,
  `keteranganstatus` varchar(200) NOT NULL,
  `tgltapstatus` datetime NOT NULL,
  `nm_petugastapstatus` varchar(45) NOT NULL,
  PRIMARY KEY (`idsuratmasuk`)
) ENGINE=InnoDB AUTO_INCREMENT=19304 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suratmasukpembatalanbcf15`
--

LOCK TABLES `suratmasukpembatalanbcf15` WRITE;
/*!40000 ALTER TABLE `suratmasukpembatalanbcf15` DISABLE KEYS */;
/*!40000 ALTER TABLE `suratmasukpembatalanbcf15` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suratmasukstripping`
--

DROP TABLE IF EXISTS `suratmasukstripping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suratmasukstripping` (
  `idsuratmasukstripping` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` int(11) NOT NULL,
  `idtpp` int(11) NOT NULL,
  `idpelayaran` int(11) NOT NULL,
  `nosrt` varchar(45) NOT NULL,
  `tglsrt` date NOT NULL,
  `user_permohonan` varchar(50) NOT NULL,
  `tgl_ajupermohonan` datetime NOT NULL,
  `status_permohonan` varchar(50) NOT NULL,
  `tgl_lengkap` datetime NOT NULL,
  `yalengkap` int(11) NOT NULL,
  `Catatan_hanggar` varchar(250) NOT NULL,
  `setujustrip` int(11) NOT NULL,
  `nopersetujuanstriping` varchar(45) NOT NULL,
  `tgpersetujuanstriping` date NOT NULL,
  `nipinputperset` varchar(45) NOT NULL,
  `tglrekam_setujustrip` datetime NOT NULL,
  `nobastrip` varchar(45) NOT NULL,
  `tglbastrip` date NOT NULL,
  `nonhp` varchar(45) NOT NULL,
  `tglnhp` date NOT NULL,
  `nocontainerbefore` varchar(200) NOT NULL,
  `nocontainerafter` varchar(200) NOT NULL,
  `lokasistriping` varchar(100) NOT NULL,
  `nosetujuempty` varchar(100) NOT NULL,
  `tglsetujuempty` date NOT NULL,
  `setujuempty` int(10) unsigned NOT NULL,
  `niprekamempty` varchar(45) NOT NULL,
  `tglrekamsetempty` datetime NOT NULL,
  PRIMARY KEY (`idsuratmasukstripping`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suratmasukstripping`
--

LOCK TABLES `suratmasukstripping` WRITE;
/*!40000 ALTER TABLE `suratmasukstripping` DISABLE KEYS */;
/*!40000 ALTER TABLE `suratmasukstripping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tahun`
--

DROP TABLE IF EXISTS `tahun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tahun` (
  `tahun` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tahun`
--

LOCK TABLES `tahun` WRITE;
/*!40000 ALTER TABLE `tahun` DISABLE KEYS */;
/*!40000 ALTER TABLE `tahun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp2`
--

DROP TABLE IF EXISTS `tp2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp2` (
  `idtp2` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_tp2` varchar(45) NOT NULL,
  PRIMARY KEY (`idtp2`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp2`
--

LOCK TABLES `tp2` WRITE;
/*!40000 ALTER TABLE `tp2` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tp3`
--

DROP TABLE IF EXISTS `tp3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tp3` (
  `idtp3` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kd_tp3` varchar(45) NOT NULL,
  PRIMARY KEY (`idtp3`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tp3`
--

LOCK TABLES `tp3` WRITE;
/*!40000 ALTER TABLE `tp3` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tpp`
--

DROP TABLE IF EXISTS `tpp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tpp` (
  `idtpp` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nm_tpp` varchar(45) NOT NULL,
  `alamat_tpp` varchar(200) NOT NULL,
  `kota_tpp` varchar(45) NOT NULL,
  `npwp_tpp` varchar(45) NOT NULL,
  `alamat_kantor` varchar(45) NOT NULL,
  `nm_pemilik` varchar(45) NOT NULL,
  `alamat_pemilik` varchar(100) NOT NULL,
  `ket_lainnya` text NOT NULL,
  PRIMARY KEY (`idtpp`),
  UNIQUE KEY `uq_tpp_nm_tpp` (`nm_tpp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tpp`
--

LOCK TABLES `tpp` WRITE;
/*!40000 ALTER TABLE `tpp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tppfoto`
--

DROP TABLE IF EXISTS `tppfoto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tppfoto` (
  `idtppfoto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtpp` int(5) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `tglupload` varchar(45) NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `keterangan_gbr` varchar(200) NOT NULL,
  PRIMARY KEY (`idtppfoto`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tppfoto`
--

LOCK TABLES `tppfoto` WRITE;
/*!40000 ALTER TABLE `tppfoto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tppfoto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tps`
--

DROP TABLE IF EXISTS `tps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tps` (
  `idtps` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nm_tps` varchar(45) NOT NULL,
  `alamat_tps` varchar(200) NOT NULL,
  `kd_tps` varchar(45) NOT NULL,
  `p2-pengawas` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idtps`),
  UNIQUE KEY `uq_tps_nm_tps` (`nm_tps`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tps`
--

LOCK TABLES `tps` WRITE;
/*!40000 ALTER TABLE `tps` DISABLE KEYS */;
/*!40000 ALTER TABLE `tps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutuppos_bcf15`
--

DROP TABLE IF EXISTS `tutuppos_bcf15`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutuppos_bcf15` (
  `idtutuppos_bcf15` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idbcf15` int(10) unsigned NOT NULL,
  `keterangan_penutupan` varchar(100) NOT NULL,
  `iduser` varchar(45) NOT NULL,
  `tgltutup` date NOT NULL,
  PRIMARY KEY (`idtutuppos_bcf15`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutuppos_bcf15`
--

LOCK TABLES `tutuppos_bcf15` WRITE;
/*!40000 ALTER TABLE `tutuppos_bcf15` DISABLE KEYS */;
/*!40000 ALTER TABLE `tutuppos_bcf15` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typecode`
--

DROP TABLE IF EXISTS `typecode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typecode` (
  `idtypecode` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_type` varchar(80) NOT NULL,
  `ket` varchar(45) NOT NULL,
  PRIMARY KEY (`idtypecode`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typecode`
--

LOCK TABLES `typecode` WRITE;
/*!40000 ALTER TABLE `typecode` DISABLE KEYS */;
/*!40000 ALTER TABLE `typecode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `nm_lengkap` varchar(45) NOT NULL,
  `nip_baru` varchar(45) NOT NULL,
  `jabatan` varchar(45) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'nophoto.jpg',
  `tgl_lahir` date NOT NULL,
  `kota_lahir` varchar(45) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `seksi` varchar(45) NOT NULL,
  `status_user` varchar(45) NOT NULL DEFAULT 'aktif',
  `iduser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idtpp` int(10) unsigned NOT NULL,
  `pangkat` varchar(45) NOT NULL,
  `gol` varchar(45) NOT NULL,
  `admin` char(2) NOT NULL DEFAULT '0',
  `oa` char(2) NOT NULL DEFAULT '0',
  `btd` char(2) NOT NULL DEFAULT '0',
  `bdn` char(2) NOT NULL DEFAULT '0',
  `bmn` char(2) NOT NULL DEFAULT '0',
  `insertbdn` char(2) NOT NULL DEFAULT '0',
  `updatebdn` char(2) NOT NULL DEFAULT '0',
  `deletebdn` char(2) NOT NULL DEFAULT '0',
  `uploadbdn` char(2) NOT NULL DEFAULT '0',
  `viewbdn` char(2) NOT NULL DEFAULT '0',
  `idunit` tinyint(3) unsigned NOT NULL,
  `nipsiap` varchar(45) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin','9c7ab29c3f65961a059f1d967954facf','admin','admin','1000000000000','admin','nophoto.jpg','2012-01-01','siantar','surga','081111111111','0811111111','admin','aktif',1,1,'admin','10A','1','1','1','1','1','1','1','1','1','1',1,'1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userhak`
--

DROP TABLE IF EXISTS `userhak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userhak` (
  `iduserhak` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` int(10) unsigned NOT NULL,
  `iduserlevel` int(10) unsigned NOT NULL,
  PRIMARY KEY (`iduserhak`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userhak`
--

LOCK TABLES `userhak` WRITE;
/*!40000 ALTER TABLE `userhak` DISABLE KEYS */;
INSERT INTO `userhak` VALUES (1,1,1);
/*!40000 ALTER TABLE `userhak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userlevel`
--

DROP TABLE IF EXISTS `userlevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userlevel` (
  `iduserlevel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(45) NOT NULL,
  `nm_level` varchar(45) NOT NULL,
  PRIMARY KEY (`iduserlevel`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userlevel`
--

LOCK TABLES `userlevel` WRITE;
/*!40000 ALTER TABLE `userlevel` DISABLE KEYS */;
INSERT INTO `userlevel` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `userlevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usulan`
--

DROP TABLE IF EXISTS `usulan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usulan` (
  `idusulan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_usulan` varchar(45) NOT NULL,
  PRIMARY KEY (`idusulan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usulan`
--

LOCK TABLES `usulan` WRITE;
/*!40000 ALTER TABLE `usulan` DISABLE KEYS */;
/*!40000 ALTER TABLE `usulan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_bcf15all`
--

DROP TABLE IF EXISTS `v_bcf15all`;
/*!50001 DROP VIEW IF EXISTS `v_bcf15all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_bcf15all` (
  `tahun` tinyint NOT NULL,
  `bcf15no` tinyint NOT NULL,
  `bc11no` tinyint NOT NULL,
  `bc11pos` tinyint NOT NULL,
  `blno` tinyint NOT NULL,
  `amountbrg` tinyint NOT NULL,
  `satuanbrg` tinyint NOT NULL,
  `diskripsibrg` tinyint NOT NULL,
  `consignee` tinyint NOT NULL,
  `notify` tinyint NOT NULL,
  `nm_tpp` tinyint NOT NULL,
  `nocontainer` tinyint NOT NULL,
  `idsize` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_bcf15view`
--

DROP TABLE IF EXISTS `v_bcf15view`;
/*!50001 DROP VIEW IF EXISTS `v_bcf15view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_bcf15view` (
  `idbcf15` tinyint NOT NULL,
  `tahun` tinyint NOT NULL,
  `bcf15no` tinyint NOT NULL,
  `bcf15tgl` tinyint NOT NULL,
  `bc11no` tinyint NOT NULL,
  `bc11tgl` tinyint NOT NULL,
  `bc11pos` tinyint NOT NULL,
  `bc11subpos` tinyint NOT NULL,
  `blno` tinyint NOT NULL,
  `bltgl` tinyint NOT NULL,
  `saranapengangkut` tinyint NOT NULL,
  `voy` tinyint NOT NULL,
  `amountbrg` tinyint NOT NULL,
  `satuanbrg` tinyint NOT NULL,
  `diskripsibrg` tinyint NOT NULL,
  `consignee` tinyint NOT NULL,
  `consigneeadrress` tinyint NOT NULL,
  `consigneekota` tinyint NOT NULL,
  `notify` tinyint NOT NULL,
  `notifyadrress` tinyint NOT NULL,
  `notifykota` tinyint NOT NULL,
  `idtps` tinyint NOT NULL,
  `idtpp` tinyint NOT NULL,
  `idtypecode` tinyint NOT NULL,
  `DokumenCode` tinyint NOT NULL,
  `suratpengantarno` tinyint NOT NULL,
  `suratpengantartgl` tinyint NOT NULL,
  `keterangan` tinyint NOT NULL,
  `DokumenNo` tinyint NOT NULL,
  `DokumenDate` tinyint NOT NULL,
  `Dokumen2Code` tinyint NOT NULL,
  `Dokumen2No` tinyint NOT NULL,
  `Dokumen2Date` tinyint NOT NULL,
  `BatalTarik` tinyint NOT NULL,
  `BatalTarikNo` tinyint NOT NULL,
  `BatalTarikNo2` tinyint NOT NULL,
  `BatalTarikDate` tinyint NOT NULL,
  `BatalTarikKet` tinyint NOT NULL,
  `masuk` tinyint NOT NULL,
  `bamasukno` tinyint NOT NULL,
  `bamasukdate` tinyint NOT NULL,
  `bamasukdatetrx` tinyint NOT NULL,
  `keluar` tinyint NOT NULL,
  `pemberitahuan` tinyint NOT NULL,
  `idtp3` tinyint NOT NULL,
  `suratdate` tinyint NOT NULL,
  `idseksitp3` tinyint NOT NULL,
  `Pelayaran` tinyint NOT NULL,
  `PelayaranNo` tinyint NOT NULL,
  `Pelayarandate` tinyint NOT NULL,
  `perintah` tinyint NOT NULL,
  `suratperintahno` tinyint NOT NULL,
  `idtp2` tinyint NOT NULL,
  `suratperintahdate` tinyint NOT NULL,
  `idseksitp2` tinyint NOT NULL,
  `CacahType` tinyint NOT NULL,
  `Cacah` tinyint NOT NULL,
  `NDCacahNo` tinyint NOT NULL,
  `NDCacahDate` tinyint NOT NULL,
  `CacahNo` tinyint NOT NULL,
  `CacahDate` tinyint NOT NULL,
  `NHP` tinyint NOT NULL,
  `ReqBatal` tinyint NOT NULL,
  `Batal` tinyint NOT NULL,
  `SuratBatalNo` tinyint NOT NULL,
  `SuratBatalDate` tinyint NOT NULL,
  `Pemohon` tinyint NOT NULL,
  `AlamatPemohon` tinyint NOT NULL,
  `ndkonfirmasito` tinyint NOT NULL,
  `ndkonfirmasino` tinyint NOT NULL,
  `ndkonfirmasidate` tinyint NOT NULL,
  `idseksindkonfirmasi` tinyint NOT NULL,
  `ndkonfirmasijawaban` tinyint NOT NULL,
  `jawabanp2Ket` tinyint NOT NULL,
  `jawabanp2` tinyint NOT NULL,
  `jawabanp2date` tinyint NOT NULL,
  `idseksip2ndkonfjwb` tinyint NOT NULL,
  `jawabanndkonfirmasi` tinyint NOT NULL,
  `idp2` tinyint NOT NULL,
  `segel` tinyint NOT NULL,
  `ndsegelno` tinyint NOT NULL,
  `ndsegeldate` tinyint NOT NULL,
  `idseksitp2bukgel` tinyint NOT NULL,
  `SetujuBatalNo` tinyint NOT NULL,
  `SetujuBatalNo2` tinyint NOT NULL,
  `SetujuBatalDate` tinyint NOT NULL,
  `shipper` tinyint NOT NULL,
  `negaraasal` tinyint NOT NULL,
  `tonage_groos` tinyint NOT NULL,
  `tonage_netto` tinyint NOT NULL,
  `Pecahpos` tinyint NOT NULL,
  `idpelayaran` tinyint NOT NULL,
  `PelayaranAddress` tinyint NOT NULL,
  `PelayaranAlasan` tinyint NOT NULL,
  `recordstatus` tinyint NOT NULL,
  `idmanifest` tinyint NOT NULL,
  `idseksi` tinyint NOT NULL,
  `idstatusakhir` tinyint NOT NULL,
  `jalur` tinyint NOT NULL,
  `nhp_lelang` tinyint NOT NULL,
  `NHPLelangNo` tinyint NOT NULL,
  `NHPLelangDate` tinyint NOT NULL,
  `CacahLelangNo` tinyint NOT NULL,
  `CacahLelangNo2` tinyint NOT NULL,
  `CacahLelangDate` tinyint NOT NULL,
  `idseksisetujubatal` tinyint NOT NULL,
  `setujubatal` tinyint NOT NULL,
  `ndkonfirmasi` tinyint NOT NULL,
  `recordstatuskonf` tinyint NOT NULL,
  `jawabanstatuskonfirmasip2` tinyint NOT NULL,
  `validasibcf15baru` tinyint NOT NULL,
  `tglvalidasibcf15` tinyint NOT NULL,
  `perlukonf` tinyint NOT NULL,
  `idpemeriksa_tpp` tinyint NOT NULL,
  `redress` tinyint NOT NULL,
  `nosuratredress` tinyint NOT NULL,
  `tglsuratredress` tinyint NOT NULL,
  `uraianredress` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_bcfl4`
--

DROP TABLE IF EXISTS `v_bcfl4`;
/*!50001 DROP VIEW IF EXISTS `v_bcfl4`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_bcfl4` (
  `tahun` tinyint NOT NULL,
  `jumbcf` tinyint NOT NULL,
  `idtpp` tinyint NOT NULL,
  `nm_tpp` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_bcfmsa`
--

DROP TABLE IF EXISTS `v_bcfmsa`;
/*!50001 DROP VIEW IF EXISTS `v_bcfmsa`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_bcfmsa` (
  `tahun` tinyint NOT NULL,
  `jumbcf` tinyint NOT NULL,
  `idtpp` tinyint NOT NULL,
  `nm_tpp` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_bcftranscon`
--

DROP TABLE IF EXISTS `v_bcftranscon`;
/*!50001 DROP VIEW IF EXISTS `v_bcftranscon`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_bcftranscon` (
  `tahun` tinyint NOT NULL,
  `jumbcf` tinyint NOT NULL,
  `idtpp` tinyint NOT NULL,
  `nm_tpp` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_bcftripandu`
--

DROP TABLE IF EXISTS `v_bcftripandu`;
/*!50001 DROP VIEW IF EXISTS `v_bcftripandu`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_bcftripandu` (
  `tahun` tinyint NOT NULL,
  `jumbcf` tinyint NOT NULL,
  `idtpp` tinyint NOT NULL,
  `nm_tpp` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_grafiktotalbcf`
--

DROP TABLE IF EXISTS `v_grafiktotalbcf`;
/*!50001 DROP VIEW IF EXISTS `v_grafiktotalbcf`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_grafiktotalbcf` (
  `tahun` tinyint NOT NULL,
  `jumbcf` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_grafiktotalbcfmasuk`
--

DROP TABLE IF EXISTS `v_grafiktotalbcfmasuk`;
/*!50001 DROP VIEW IF EXISTS `v_grafiktotalbcfmasuk`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_grafiktotalbcfmasuk` (
  `tahun` tinyint NOT NULL,
  `masuktpp` tinyint NOT NULL,
  `masuk` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_grafiktotaltidakmasuktpp`
--

DROP TABLE IF EXISTS `v_grafiktotaltidakmasuktpp`;
/*!50001 DROP VIEW IF EXISTS `v_grafiktotaltidakmasuktpp`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_grafiktotaltidakmasuktpp` (
  `tahun` tinyint NOT NULL,
  `masuktpp` tinyint NOT NULL,
  `masuk` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_bcf15all`
--

/*!50001 DROP TABLE IF EXISTS `v_bcf15all`*/;
/*!50001 DROP VIEW IF EXISTS `v_bcf15all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`timit`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_bcf15all` AS select `bcf15`.`tahun` AS `tahun`,`bcf15`.`bcf15no` AS `bcf15no`,`bcf15`.`bc11no` AS `bc11no`,`bcf15`.`bc11pos` AS `bc11pos`,`bcf15`.`blno` AS `blno`,`bcf15`.`amountbrg` AS `amountbrg`,`bcf15`.`satuanbrg` AS `satuanbrg`,`bcf15`.`diskripsibrg` AS `diskripsibrg`,`bcf15`.`consignee` AS `consignee`,`bcf15`.`notify` AS `notify`,`tpp`.`nm_tpp` AS `nm_tpp`,`bcfcontainer`.`nocontainer` AS `nocontainer`,`bcfcontainer`.`idsize` AS `idsize` from ((`bcf15` join `bcfcontainer`) join `tpp`) where ((`bcf15`.`idbcf15` = `bcfcontainer`.`idbcf15`) and (`bcf15`.`idtpp` = `tpp`.`idtpp`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_bcf15view`
--

/*!50001 DROP TABLE IF EXISTS `v_bcf15view`*/;
/*!50001 DROP VIEW IF EXISTS `v_bcf15view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`timit`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_bcf15view` AS select `bcf15`.`idbcf15` AS `idbcf15`,`bcf15`.`tahun` AS `tahun`,`bcf15`.`bcf15no` AS `bcf15no`,`bcf15`.`bcf15tgl` AS `bcf15tgl`,`bcf15`.`bc11no` AS `bc11no`,`bcf15`.`bc11tgl` AS `bc11tgl`,`bcf15`.`bc11pos` AS `bc11pos`,`bcf15`.`bc11subpos` AS `bc11subpos`,`bcf15`.`blno` AS `blno`,`bcf15`.`bltgl` AS `bltgl`,`bcf15`.`saranapengangkut` AS `saranapengangkut`,`bcf15`.`voy` AS `voy`,`bcf15`.`amountbrg` AS `amountbrg`,`bcf15`.`satuanbrg` AS `satuanbrg`,`bcf15`.`diskripsibrg` AS `diskripsibrg`,`bcf15`.`consignee` AS `consignee`,`bcf15`.`consigneeadrress` AS `consigneeadrress`,`bcf15`.`consigneekota` AS `consigneekota`,`bcf15`.`notify` AS `notify`,`bcf15`.`notifyadrress` AS `notifyadrress`,`bcf15`.`notifykota` AS `notifykota`,`bcf15`.`idtps` AS `idtps`,`bcf15`.`idtpp` AS `idtpp`,`bcf15`.`idtypecode` AS `idtypecode`,`bcf15`.`DokumenCode` AS `DokumenCode`,`bcf15`.`suratpengantarno` AS `suratpengantarno`,`bcf15`.`suratpengantartgl` AS `suratpengantartgl`,`bcf15`.`keterangan` AS `keterangan`,`bcf15`.`DokumenNo` AS `DokumenNo`,`bcf15`.`DokumenDate` AS `DokumenDate`,`bcf15`.`Dokumen2Code` AS `Dokumen2Code`,`bcf15`.`Dokumen2No` AS `Dokumen2No`,`bcf15`.`Dokumen2Date` AS `Dokumen2Date`,`bcf15`.`BatalTarik` AS `BatalTarik`,`bcf15`.`BatalTarikNo` AS `BatalTarikNo`,`bcf15`.`BatalTarikNo2` AS `BatalTarikNo2`,`bcf15`.`BatalTarikDate` AS `BatalTarikDate`,`bcf15`.`BatalTarikKet` AS `BatalTarikKet`,`bcf15`.`masuk` AS `masuk`,`bcf15`.`bamasukno` AS `bamasukno`,`bcf15`.`bamasukdate` AS `bamasukdate`,`bcf15`.`bamasukdatetrx` AS `bamasukdatetrx`,`bcf15`.`keluar` AS `keluar`,`bcf15`.`pemberitahuan` AS `pemberitahuan`,`bcf15`.`suratno` AS `idtp3`,`bcf15`.`suratdate` AS `suratdate`,`bcf15`.`idseksitp3` AS `idseksitp3`,`bcf15`.`Pelayaran` AS `Pelayaran`,`bcf15`.`PelayaranNo` AS `PelayaranNo`,`bcf15`.`Pelayarandate` AS `Pelayarandate`,`bcf15`.`perintah` AS `perintah`,`bcf15`.`suratperintahno` AS `suratperintahno`,`bcf15`.`idtp2` AS `idtp2`,`bcf15`.`suratperintahdate` AS `suratperintahdate`,`bcf15`.`idseksitp2` AS `idseksitp2`,`bcf15`.`CacahType` AS `CacahType`,`bcf15`.`Cacah` AS `Cacah`,`bcf15`.`NDCacahNo` AS `NDCacahNo`,`bcf15`.`NDCacahDate` AS `NDCacahDate`,`bcf15`.`CacahNo` AS `CacahNo`,`bcf15`.`CacahDate` AS `CacahDate`,`bcf15`.`NHP` AS `NHP`,`bcf15`.`ReqBatal` AS `ReqBatal`,`bcf15`.`Batal` AS `Batal`,`bcf15`.`SuratBatalNo` AS `SuratBatalNo`,`bcf15`.`SuratBatalDate` AS `SuratBatalDate`,`bcf15`.`Pemohon` AS `Pemohon`,`bcf15`.`AlamatPemohon` AS `AlamatPemohon`,`bcf15`.`ndkonfirmasito` AS `ndkonfirmasito`,`bcf15`.`ndkonfirmasino` AS `ndkonfirmasino`,`bcf15`.`ndkonfirmasino2` AS `ndkonfirmasidate`,`bcf15`.`idseksindkonfirmasi` AS `idseksindkonfirmasi`,`bcf15`.`ndkonfirmasijawaban` AS `ndkonfirmasijawaban`,`bcf15`.`jawabanp2Ket` AS `jawabanp2Ket`,`bcf15`.`jawabanp2` AS `jawabanp2`,`bcf15`.`jawabanp2date` AS `jawabanp2date`,`bcf15`.`idseksip2ndkonfjwb` AS `idseksip2ndkonfjwb`,`bcf15`.`jawabanndkonfirmasi` AS `jawabanndkonfirmasi`,`bcf15`.`idp2` AS `idp2`,`bcf15`.`segel` AS `segel`,`bcf15`.`ndsegelno` AS `ndsegelno`,`bcf15`.`ndsegeldate` AS `ndsegeldate`,`bcf15`.`idseksitp2bukgel` AS `idseksitp2bukgel`,`bcf15`.`SetujuBatalNo` AS `SetujuBatalNo`,`bcf15`.`SetujuBatalNo2` AS `SetujuBatalNo2`,`bcf15`.`SetujuBatalDate` AS `SetujuBatalDate`,`bcf15`.`shipper` AS `shipper`,`bcf15`.`negaraasal` AS `negaraasal`,`bcf15`.`tonage_groos` AS `tonage_groos`,`bcf15`.`tonage_netto` AS `tonage_netto`,`bcf15`.`Pecahpos` AS `Pecahpos`,`bcf15`.`idpelayaran` AS `idpelayaran`,`bcf15`.`PelayaranAddress` AS `PelayaranAddress`,`bcf15`.`PelayaranAlasan` AS `PelayaranAlasan`,`bcf15`.`recordstatus` AS `recordstatus`,`bcf15`.`idmanifest` AS `idmanifest`,`bcf15`.`idseksi` AS `idseksi`,`bcf15`.`idstatusakhir` AS `idstatusakhir`,`bcf15`.`jalur` AS `jalur`,`bcf15`.`nhp_lelang` AS `nhp_lelang`,`bcf15`.`NHPLelangNo` AS `NHPLelangNo`,`bcf15`.`NHPLelangDate` AS `NHPLelangDate`,`bcf15`.`CacahLelangNo` AS `CacahLelangNo`,`bcf15`.`CacahLelangNo2` AS `CacahLelangNo2`,`bcf15`.`CacahLelangDate` AS `CacahLelangDate`,`bcf15`.`idseksisetujubatal` AS `idseksisetujubatal`,`bcf15`.`setujubatal` AS `setujubatal`,`bcf15`.`ndkonfirmasi` AS `ndkonfirmasi`,`bcf15`.`recordstatuskonf` AS `recordstatuskonf`,`bcf15`.`jawabanstatuskonfirmasip2` AS `jawabanstatuskonfirmasip2`,`bcf15`.`validasibcf15baru` AS `validasibcf15baru`,`bcf15`.`tglvalidasibcf15` AS `tglvalidasibcf15`,`bcf15`.`perlukonf` AS `perlukonf`,`bcf15`.`idpemeriksa_tpp` AS `idpemeriksa_tpp`,`bcf15`.`redress` AS `redress`,`bcf15`.`nosuratredress` AS `nosuratredress`,`bcf15`.`tglsuratredress` AS `tglsuratredress`,`bcf15`.`uraianredress` AS `uraianredress` from `bcf15` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_bcfl4`
--

/*!50001 DROP TABLE IF EXISTS `v_bcfl4`*/;
/*!50001 DROP VIEW IF EXISTS `v_bcfl4`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`timit`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_bcfl4` AS select `bcf15`.`tahun` AS `tahun`,count(`bcf15`.`bcf15no`) AS `jumbcf`,`tpp`.`idtpp` AS `idtpp`,`tpp`.`nm_tpp` AS `nm_tpp` from (`bcf15` join `tpp`) where ((`bcf15`.`idtpp` = `tpp`.`idtpp`) and (`tpp`.`idtpp` = _utf8'4')) group by `bcf15`.`tahun` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_bcfmsa`
--

/*!50001 DROP TABLE IF EXISTS `v_bcfmsa`*/;
/*!50001 DROP VIEW IF EXISTS `v_bcfmsa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`timit`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_bcfmsa` AS select `bcf15`.`tahun` AS `tahun`,count(`bcf15`.`bcf15no`) AS `jumbcf`,`tpp`.`idtpp` AS `idtpp`,`tpp`.`nm_tpp` AS `nm_tpp` from (`bcf15` join `tpp`) where ((`bcf15`.`idtpp` = `tpp`.`idtpp`) and (`tpp`.`idtpp` = _utf8'3')) group by `bcf15`.`tahun` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_bcftranscon`
--

/*!50001 DROP TABLE IF EXISTS `v_bcftranscon`*/;
/*!50001 DROP VIEW IF EXISTS `v_bcftranscon`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`timit`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_bcftranscon` AS select `bcf15`.`tahun` AS `tahun`,count(`bcf15`.`bcf15no`) AS `jumbcf`,`tpp`.`idtpp` AS `idtpp`,`tpp`.`nm_tpp` AS `nm_tpp` from (`bcf15` join `tpp`) where ((`bcf15`.`idtpp` = `tpp`.`idtpp`) and (`tpp`.`idtpp` = _utf8'2')) group by `bcf15`.`tahun` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_bcftripandu`
--

/*!50001 DROP TABLE IF EXISTS `v_bcftripandu`*/;
/*!50001 DROP VIEW IF EXISTS `v_bcftripandu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`timit`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_bcftripandu` AS select `bcf15`.`tahun` AS `tahun`,count(`bcf15`.`bcf15no`) AS `jumbcf`,`tpp`.`idtpp` AS `idtpp`,`tpp`.`nm_tpp` AS `nm_tpp` from (`bcf15` join `tpp`) where ((`bcf15`.`idtpp` = `tpp`.`idtpp`) and (`tpp`.`idtpp` = _utf8'1')) group by `bcf15`.`tahun` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_grafiktotalbcf`
--

/*!50001 DROP TABLE IF EXISTS `v_grafiktotalbcf`*/;
/*!50001 DROP VIEW IF EXISTS `v_grafiktotalbcf`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`timit`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_grafiktotalbcf` AS select `bcf15`.`tahun` AS `tahun`,count(`bcf15`.`bcf15no`) AS `jumbcf` from `bcf15` group by `bcf15`.`tahun` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_grafiktotalbcfmasuk`
--

/*!50001 DROP TABLE IF EXISTS `v_grafiktotalbcfmasuk`*/;
/*!50001 DROP VIEW IF EXISTS `v_grafiktotalbcfmasuk`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`timit`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_grafiktotalbcfmasuk` AS select `bcf15`.`tahun` AS `tahun`,count(`bcf15`.`masuk`) AS `masuktpp`,`bcf15`.`masuk` AS `masuk` from `bcf15` where (`bcf15`.`masuk` = _latin1'1') group by `bcf15`.`tahun`,`bcf15`.`masuk` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_grafiktotaltidakmasuktpp`
--

/*!50001 DROP TABLE IF EXISTS `v_grafiktotaltidakmasuktpp`*/;
/*!50001 DROP VIEW IF EXISTS `v_grafiktotaltidakmasuktpp`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`timit`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_grafiktotaltidakmasuktpp` AS select `bcf15`.`tahun` AS `tahun`,count(`bcf15`.`masuk`) AS `masuktpp`,`bcf15`.`masuk` AS `masuk` from `bcf15` where ((`bcf15`.`masuk` = _latin1'2') or (`bcf15`.`masuk` = _latin1'0')) group by `bcf15`.`tahun`,`bcf15`.`masuk` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-18  8:04:27

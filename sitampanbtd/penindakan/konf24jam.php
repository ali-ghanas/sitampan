<?php
include "../lib/koneksi.php";
include "../lib/function.php";
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
 

                                                    $now1=date('Y-m-d');
                                                    $sql = "select idbcf15,bcf15no,ndkonfirmasito,ndkonfirmasino,ndkonfirmasidate,jawabanp2,jawabanndkonfirmasi,jawabanp2date FROM bcf15  where  recordstatuskonf='2' and ndkonfirmasijawaban='2' and datediff('$now1',ndkonfirmasidate) > '1'"; // memanggil data dengan id yang ditangkap tadi
                                                            $query = mysql_query($sql);
                                                            $i=1;
                                                            while ($bcf15 = mysql_fetch_array($query)){

                                                            $bcf15no=$bcf15['bcf15no'];
                                                            $ndkonfirmasino=$bcf15['ndkonfirmasino'];
                                                            $ndkonfirmasidate=$bcf15['ndkonfirmasidate'];
                                                            $ndkonfirmasidateviee=viewstrip($ndkonfirmasidate);

                                                            $jawabanp2=$bcf15['jawabanp2'];
                                                            $jawabanp2date=$bcf15['jawabanp2date'];

                                                            echo "<tr><td><input type='hidden' name='bcf15".$i."' value='".$bcf15['idbcf15']."' />
                                                                <input type='hidden' name='bcf15no".$i."' value='".$bcf15['bcf15no']."' /><input type='hidden' name='ndkonfirmasidate".$i."' value='".$bcf15['ndkonfirmasidate']."' /></td></tr>";
                                                            $i++;

                                                            }

                                                            $jumBcf = $i-1;

                                                            $jumlah1 = mysql_num_rows ($sql);
                                                            $jumBcf;
                                                            if($jumBcf>0)
                                                                {

                                                                // membaca nim mahasiswa ke-i, i = 1, 2, 3, ..., n
                                                                $now=date('Y-m-d');
                                                                   // update bcf15 ke-i, i = 1, 2, 3, ..., n
                                                                $query = "UPDATE bcf15 SET ndkonfirmasijawaban='1',jawabanndkonfirmasi='2' WHERE recordstatuskonf='2' and ndkonfirmasijawaban='2' and datediff('$now',ndkonfirmasidate) > '1'";
                                                                mysql_query($query);
                                                                echo "<hr><h5>Ada $jumBcf berkas konfirmasi BCF 1.5 yang telah melewati 1x24 jam untuk dibalas, Seksi Tempat Penimbunan Segera mengirimkan hardcopy konfirmasi BCF 1.5 dimaksud. Silahkan lihat kolom konfirmasi tidak disetujui.</h5>";
                                                                }
                                                                else 
                                                                {
                                                                   echo "<hr><h5>Segera Jawab Konfirmasi BCF 1.5 diatas karena 1x24 jam tidak dikonfirmasi Seksi Tempat Penimbunan akan mengirimkan hardcopy Konfirmasi BCF 1.5 dimaksud</h5>" ;
                                                                }
       
?>

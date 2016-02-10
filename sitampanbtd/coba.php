<?php
include 'lib/function.php';
$now=date('Y-m-d H:i:s');
                                            $tanggal = "$now"; // tgl yang akan dicari nama harinya

                                            $query = "SELECT datediff('$tanggal', CURDATE()) as selisih";
                                            $hasil = mysql_query($query);
                                            $data  = mysql_fetch_array($hasil);

                                            $selisih = $data['selisih'];

                                            $x  = mktime(0, 0, 0, date("m"), date("d")+$selisih, date("Y"));
                                            $namahari = date("l", $x);

                                            if ($namahari == "Friday") {
                                                
                                                $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 3, date("Y"));
                                                $konf_btstgl1=date("d-m-Y", $nexttgl);
                                                $konf_btstgl=sql($konf_btstgl1);
                    
                                            }
                                            elseif ($namahari == "Saturday") {
                                                
                                                $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 2, date("Y"));
                                                $konf_btstgl1=date("d-m-Y", $nexttgl);
                                                $konf_btstgl=sql($konf_btstgl1);
                                            }
                                            else {
                                                
                                                $nexttgl=mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
                                                $konf_btstgl1=date("d-m-Y", $nexttgl);
                                                $konf_btstgl=sql($konf_btstgl1);
                                            }
                                                
?>

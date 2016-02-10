<table width="100%" >
                       <tr>
                           <td class="judulbreadcrumb" colspan="2">Aplikasi Pegawai</td> 

                       </tr>
                       <tr >
                           <td>
                               <img src="images/bcf15.png" width="20" /> 
                           </td>
                           <td>
                               <a id="a" href="?hal=mohoncuti">Permohonan Cuti </a>
                           </td>
                       </tr>
                       <?php 
                        if ($_SESSION['level']=="tpp2") {
                            echo "<tr ><td><img src='images/new/bc1.png' width='20' />";
                            echo "</td><td><a id='a' href='?hal=in_roling'>ND Roling</a></td></tr>";
                            echo "<tr ><td><img src='images/new/bc1.png' width='20' />";
                            echo "</td><td><a id='a' href='?hal=in_lembur'>ND Lembur PPC</a></td></tr>";
                            echo "<tr ><td><img src='images/new/bc1.png' width='20' />";
                            echo "</td><td><a id='a' href='?hal=page_arsip'>Arsip</a></td></tr>";
                            
                        }
                        elseif ($_SESSION['level']=="tpp3") {
                            echo "<tr ><td><img src='images/new/bc1.png' width='20' />";
                            echo "</td><td><a id='a' href='?hal=in_roling'>ND Roling</a></td></tr>";
                            echo "<tr ><td><img src='images/new/bc1.png' width='20' />";
                            echo "</td><td><a id='a' href='?hal=in_lembur'>ND Lembur PPC</a></td></tr>";
                            echo "<tr ><td><img src='images/new/bc1.png' width='20' />";
                            echo "</td><td><a id='a' href='?hal=page_arsip'>Arsip</a></td></tr>";
                            
                        }
                        
                       
                       ?>
<!--                       <tr >
                           <td>
                               <img src="images/new/bc1.png" width="20" /> 
                           </td>
                           <td>
                               <a href="?hal=mohoncuti">Piket Pengganti </a>
                           </td>
                           
                       </tr>
                       <tr >
                           <td>
                               <img src="images/new/mtk.png" width="20" /> 
                           </td>
                           <td>
                               <a href="?hal=mohoncuti">Permohonan Ijin </a>
                           </td>
                           
                       </tr>-->
                       

                </table>

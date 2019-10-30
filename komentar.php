<?php
	$sqlkomen = mysql_query("select * from komentar where idproduk='$_GET[idp]' order by tglkomentar desc");
	$rowkom = mysql_num_rows($sqlkomen);
		
		if($rowkom > 0){
			
			echo "<h3>KOMENTAR $rowkom</h3>";
			echo "<table border='0' cellpadding='10' cellspacing='10'>";
			
			while ($rkomen = mysql_fetch_array($sqlkomen)){
				$sqla = mysql_query( "select * from anggota where idanggota='$rkomen[idanggota]'");
				$ra = mysql_fetch_array($sqla); 
					echo "	<tr>
							<td valign='top' align='justify'><b>$ra[namalengkap]</b><br><small><i> pada $rkomen[tglkomentar] WIB </i></small><p>$rkomen[komentar]<br></td>
						</tr>";
			}
			echo "</table>";
		}else{
			echo "";
		}
?>
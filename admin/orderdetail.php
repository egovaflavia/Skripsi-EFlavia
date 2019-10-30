<?php 
	include "koneksi.php";
		
		// Tampilkan Status Pesanan
		$sqlo = mysql_query("select * from orders where idorder = '$_GET[ido]'");
		$ro = mysql_fetch_array($sqlo);
			
		// Tampilkan Rincian Produk yang di pesan
		$sqlpr = mysql_query("select * from orderdetail, produk where orderdetail.idproduk=produk.idproduk and orderdetail.idorder='$_GET[ido]'");
		
		echo "<h3>No Order : $ro[idorder]</h3>";
		
		$pilstatus = array('Baru', 'Lunas', 'Dikirim');
		$pilpesan = '';
				
		echo "<h3>Detail Pesanan : </h3>";
		echo "<table border='0' width='100%'>
			<tr>
				<th>No. </th>
				<th>Foto</th>
				<th>Nama Produk</th>
				<th>Jumlah</th>
				<th width='15%'>Harga</th>
				<th width='15%'>Sub Total</th>
			</tr>";
		$no = 1;
		while($rpr = mysql_fetch_array($sqlpr)){
			foreach($pilstatus as $status){
				$pilpesan .= "<option value=$status";
				if($status == $rpr['statusorder']){
					$pilpesan .= " selected";		
				}	
				$pilpesan .= ">$status</option>\r\n";
			}
			$disk = ($rpr['diskon'] * $rpr['hargaproduk']) / 100;
			$hrgbaru = $rpr['hargaproduk'] - $disk;
			$subtotal = $rpr['jumlahbeli'] * $hrgbaru;
			$tot = $tot + $subtotal;
			$brt = $rpr['jumlahbeli'] * $rpr['berat'];
			$berat = $berat + $brt;
			$st = number_format($subtotal);
			$hrg = number_format($rpr["hargaproduk"]);
			  $hrgbr = number_format($hrgbaru);
			  if($rpr['diskon']>0){
				  $diskon = "Diskon <font color='#FF0000'> $rpr[diskon]% </font>";
				  $hrglama = "<font style='text-decoration:line-through'>IDR $hrg</font>";
			  }else{	  	
				  $diskon = "";
				  $hrglama = "";
			  }	
			echo "<tr>";
				echo "<td>$no 
				<input type='hidden' name='idorder' value='$ro[idorder]'>
				<input type='hidden' name='idproduk' value='$rpr[idproduk]'></td>";
				echo "<td><img src='../fotoproduk/$rpr[foto1]' width='100px'></td>";
				echo "<td><b>$rpr[namaproduk]</b><br><b>$rp[namatoko]</b><br> $diskon $hrglama</td>";
				echo "<td align='center'>$rpr[jumlahbeli]</td>";
				echo "<td align='right'>Rp. $hrgbr</td>";
				echo "<td align='right'>Rp. $st</td>";
				echo "</tr>";
			$no++;
			$sqlj = mysql_query("select * from jasakirim where idjasa='$rpr[idjasa]'");
			$rj = mysql_fetch_array($sqlj);
			$tarif = $berat * $rj["tarif"];
			$trf = number_format($tarif);
			$total = $tot + $tarif;	
			$t = number_format($total);
		}
	//	echo "<tr>
		//	<td colspan='5' align='right'>Berat</td>
		//	<td align='right'><b>$berat</b> Kg</td>
		// </tr>";
		//echo "<tr>
			//<td colspan='5' align='right'>Jasa Pengiriman : <b>$rj[namajasa]</b></td>
			//<td align='right'>Rp. <b>$trf</b></td>
		//</tr>";
		echo "<tr>
			<td colspan='5' align='right'>TOTAL</td>
			<td align='right'>Rp. <b>$t</b></td>
		</tr>";
	echo "</table>";
	
	// Tampilkan data Pembeli yang Pesan
		$sqla = mysql_query("select * from anggota where idanggota='$ro[idanggota]'");
		$ra = mysql_fetch_array($sqla);
		echo "<h3>Data Pemesan :</h3>";
		echo "<table border='0' width='100%'>
				<tr>
					<th width='30%'>Nama Pembeli</th>
					<td>$ra[namalengkap]</td>
				</tr>
				<tr>
					<th>Alamat Rumah</th>
					<td>$ra[alamat]</td>
				</tr>
				<tr>
					<th>Alamat Pengiriman</th>
					<td>$ro[alamatkirim]</td>
				</tr>
				<tr>
					<th>No Handphone</th>
					<td>$ra[nohp]</td>
				</tr>
			</table>";
			
		
?>
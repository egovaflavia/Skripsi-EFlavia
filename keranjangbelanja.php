<div id="view">
<fieldset>
<?php
  include "koneksi.php";
  $sqla = mysql_query("select * from anggota where username='$_SESSION[userag]'");
  $ra = mysql_fetch_array($sqla);

  $sqlc = mysql_query("select * from cart where idanggota='$ra[idanggota]'");
  echo "<form action='?p=keranjangedit' method='post' enctype='multipart/form-data'>";
  echo "<table border='0' width='100%' cellpadding='10px'>";
  echo "<tr>";
  echo "<th>No. <input type='hidden' name='ida' value='$ra[idanggota]'></th>";
  echo "<th>Foto</th>";
  echo "<th>Nama Produk</th>";
  echo "<th>Jumlah</th>";
  echo "<th width='15%'>Harga</th>";
  echo "<th width='15%'>Sub Total</th>";
  echo "<th>Aksi</th>";
  echo "</tr>";
  $no = 1;
  while($rc = mysql_fetch_array($sqlc)){
	$sqlpr = mysql_query("select * from produk where idproduk='$rc[idproduk]'");
	$rpr = mysql_fetch_array($sqlpr);
	$disk = ($rpr['diskon'] * $rpr['hargaproduk']) / 100;
	$hrgbaru = $rpr['hargaproduk'] - $disk;
	$subtotal = $hrgbaru*$rc["jumlahbeli"];
	$total = $total + $subtotal;
	//$brt = $rc["jumlahbeli"]*$rpr["berat"];
    //$berat = $berat + $brt;
	if($rpr['diskon']>0){
	  $diskon = "Diskon <font color='#FF0000'> $rpr[diskon]% </font>";
	  $hrglama = "<font style='text-decoration:line-through'>Rp $rpr[hargaproduk]</font>";
	}else{	  	
	  $diskon = "";
	  $hrglama = "";
	}
	echo "<tr>";
	echo "<td>$no <input type='hidden' name='id[$no]' value='$rc[idcart]'>";
	echo "<td><img src='fotoproduk/$rpr[foto1]' width='100px'></td>";
	echo "<td><b>$rpr[namaproduk]</b><br> $diskon $hrglama</td>";
	echo "<td><input type='text' name='jml[$no]' value='$rc[jumlahbeli]' size='5' style='text-align:center'></td>";
	echo "<td align='right'>Rp. $hrgbaru</td>";
	echo "<td align='right'>Rp. $subtotal <input type='hidden' name='total[$no]' value='$subtotal'></td>";
	echo "<td align='center'><a href='?p=keranjangdel&idc=$rc[idcart]'><button type='button' class='btn btn-more'>Hapus</button></a></td>";
	echo "</tr>";
	$no++;
  }

  echo "<tr>
	<td colspan='5' align='right'>TOTAL</td>
	<td align='right'>Rp. <b>$total</b><input type='hidden' name='total' value='$total'></td>
	<td>&nbsp;</td>
  </tr>";
  echo "</table>";
  echo "<div class='dh4'>
	<a href='?p=beranda'><button type='button' class='btn btn-more'>Lanjut Belanja</button></a>
  </div>";
  echo "<div class='dh4' align='center'>
	<input type='submit' value='Edit Keranjang' class='btn btn-more'>
  </div>";
  echo "<div class='dh4' align='right'>
	<a href='?p=selesaibelanja'><button type='button' class='btn btn-more'>Selesai Belanja</button></a>
  </div>";
  echo "</form>";
?>
</fieldset>
</div>
<style type="text/css" media="all">
<!--
@import url("selesaibelanja.css");
-->
</style>
<div id="formadd">
<fieldset>
<h3>PROSES CHECKOUT</h3>
<form name="form1" method="post" action="<?php echo "?p=selesaibelanjaaksi"; ?>">
  <input type="hidden" name="ida" value="<?php echo "$ra[idanggota]"; ?>" />
<p>
<label> Nama :</label>
  <input name="namalengkap" type="text" readonly="readonly" value="<?php echo "$ra[namalengkap]"; ?>">
<p>
<label> Alamat :</label>  
  <textarea name="alamat" readonly="readonly" rows="2"><?php echo "$ra[alamat]"; ?></textarea>
<p>
<label> No. Hp :</label>  
  <input name="nohp" type="text" readonly="readonly" value="<?php echo "$ra[nohp]"; ?>">
<p>
<label> Alamat Lengkap Pengiriman :</label>  
  <textarea name="alamatkirim" rows="5" placeholder="Alamat Lengkap Pengiriman"></textarea>
  
<?php
	//$sqlj = mysql_query("select * from jasakirim order by namajasa asc");
	//echo "<select name='idjasa'>";
	//echo "<option value='$rj[idjasa]'>Pilih Jasa Pengiriman</option>";
	//while($rj = mysql_fetch_array($sqlj)){
		//echo "<option value='$rj[idjasa]'>$rj[namajasa]</option>";		
	//}
	//echo "</select>";
 // ?> 

  
  <input name="checkout" type="submit"  value="CHECKOUT">
</form>
</fieldset>
</div>
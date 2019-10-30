<style type="text/css" media="all">
<!--
@import url("reg.css");
-->
</style>

<div id="formadd">
<fieldset>
<h3>FORM REGISTRASI MEMBER</h3>
<form name="form1" method="post" action="">
<p>
<label> User Name :</label>
  <input name="username" type="text" id="username" placeholder="Username">
</p>
<p>
<label> Password :</label>
  <input name="password" type="text" id="password" placeholder="Password">
</p>
<p>
<label> Nama Lengkap :</label>
  <input name="namalengkap" type="text" id="namalengkap" placeholder="Nama Lengkap">
</p>
<p>Jenis Kelamin :
  <input name="jk" type="radio" value="P"> Pria
  <input name="jk" type="radio" value="W"> Wanita
</style>
<p>
<label> Tanggal Lahir :</label>
<input name="tgllahir" type="date" class="tgllahir" id="tgllahir" >
</p>
<label> Alamat :</label>
  <textarea name="alamat" rows="5" id="alamat" placeholder="Alamat Lengkap"></textarea>
</p>
<p>
<label> Nomor HP :</label>
  <input name="nohp" type="text" id="nohp" placeholder="No. Handphone">
</p>
  <input name="register" type="submit" id="register" value="REGISTER">
</p>
</form>
<?php
include "koneksi.php";
if(isset($_POST["register"])){
  $sqla = mysql_query("insert into anggota (username, password, namalengkap, jk, tgllahir, alamat, nohp, tgldaftar) values ('$_POST[username]', '$_POST[password]', '$_POST[namalengkap]', '$_POST[jk]', '$_POST[tgllahir]', '$_POST[alamat]', '$_POST[nohp]', NOW())");
  if($sqla){
    echo "Proses Registrasi Berhasil";
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=login'>";
  }else{
    echo "Proses Registrasi Gagal";
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=register'>";
  }
}
?>
</fieldset>
</div>
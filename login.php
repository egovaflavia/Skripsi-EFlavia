<div id="login">
<fieldset>
<form name="form1" method="post" action="" enctype="multipart/form-data">
 <h3>ANGGOTA</h3>
 <input name="username" type="text" id="username" placeholder="Username">
 <input name="password" type="password" id="password" placeholder="Password">
 <input name="login" type="submit" value="LOGIN ANGGOTA">
</form>

<?php
if($_POST["login"]){
  $sqla = mysql_query("select * from anggota where username='$_POST[username]' and password='$_POST[password]'");
  $ra = mysql_fetch_array($sqla);
  $row  = mysql_num_rows($sqla);
  if($row > 0){
	session_start();
	$_SESSION["userag"] = $ra["username"];
	$_SESSION["passag"] = $ra["password"];
	echo "<b>Login Berhasil</b>";
  }else{
	echo "<b>Login Gagal</b>";
  }
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>

</fieldset>
</div>

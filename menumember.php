<?php
if(!empty($_SESSION["userag"]) and !empty($_SESSION["passag"])){
  echo "Selamat Datang, <b>$ra[namalengkap]</b> | ";
  echo "<a href='?p=keranjangbelanja&ida=$ra[idanggota]'><b>Keranjang Saya</b></a> | ";
  echo "<a href='?p=order&ida=$ra[idanggota]'><b>Pesanan Saya</b></a> | ";
  echo "<a href='?p=konfirmasi&ida=$ra[idanggota]'><b>Konfirmasi Pembayaran</b></a> | ";
  echo "<a href='?p=chatbatua'><b>Live Chat</b></a> | ";
  echo "<a href='?p=logout'><b>Logout</b></a>";
}else{

  echo "<a href='?p=login'><b>Login</b></a> | ";

  echo "<a href='?p=register'><b>Register</b></a>";
}
?>

<?php
  include "koneksi.php";
  mysql_query("delete from cart where idcart='$_GET[idc]'");
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=keranjangbelanja&ida=$_GET[ida]'>";
?>
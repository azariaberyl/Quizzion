<?php
include "../model/conf.php";
if (isLogin()) {

/* Digunakan untuk mendapatkan nama tabel yang digunakan user*/
$user = getLogin();

/* $id adalah id yang dihapus dalam dashboard */
$id = get('id');
print_r($id);

/* Delete
$conn, 
$user sebagai nama userTable yang digunakan
$id yang akan duhapus
*/
delTable($conn, $user, $id);

header("location:../view/dashboard.php");
} else {
  echo "Anda belum login";
}

?>
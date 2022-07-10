<?php
include "../model/conf.php";
$username = post('username');
$pass = post("pass");

// Can do better with fetch user and password
$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$data = $stmt->fetchAll();
// print_r($data);
foreach ($data as $key) {
  if ($username == $key['username'] && $pass == $key['pass']){
    $_SESSION["login"] = $key;
    // print_r($_SESSION["login"]);
    header("location:../view/dashboard.php");
  }
}
echo "Password salah silahkan kembali ke halaman login";
?>
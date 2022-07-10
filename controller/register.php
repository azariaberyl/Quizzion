<?php
include "../model/conf.php";
$username = post('username');
$pass = post("pass");
$connTemp = $conn;
try {
  $sql = "INSERT INTO users (username, pass) VALUES (\"$username\", \"$pass\")";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
  $conn = $connTemp;
  header("location:../view/login.html");
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  echo "Register gagal silahkan coba lagi";
}
$conn = $connTemp;

?>
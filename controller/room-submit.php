<?php
include "../model/conf.php";
if(isLogin()){

$post = isset($_POST['submit'])? $_POST : null;
$value = array_slice($post,2,count($post)-3);
$columns = array_keys($value);
$participant = post('participant')+1;
// print_r($participant);
$kode = post('kode');

/* Mengambil id dari pembuat pertanyaan */
$id = explode("x", $kode)[0];
/* Menagmbil id dari penjawab pertanyaan */
$userId = $_SESSION['login']['id'];

print_r($post);
echo "<br>";
echo implode("', '", $columns);
echo "<br>";
echo implode(", ", $value);
echo "<br>";
echo $participant;
echo "<br>";
echo $userId;
saveUserAnswer(
  $conn, "p$kode", implode(", ", $columns), $userId, implode(", ", $value), getUserById($conn, $id), $participant, $kode
);
header("location:../index.php");
} else{echo "Silahkan login";}
?>
<?php
include "../model/conf.php";
if(isLogin()){
try {


/* Id dari data yang mau dihapus */
$id = get('id');

/* Database yang dipake user */
$user = getLogin();

/* Data dari editing */
$data = $_POST;
$key = array_keys($data);
print_r($data);
print_r("<br>");
print_r($key);

/* Mendapatkan lastId 
digunakan untuk mendapatkan id terakhir yang di database
digunakan untuk menambah data pada tabel participant agar pertanyaan dan id sama
pertanyaan$lastId+1
0 sebagai nilai awal
*/
$lastId = getTableP($conn, getSingleTableDatabase($conn, getLogin(), $id)[0]);
$lastId = $lastId[count($lastId)-1]["id"];
echo "<br>Last id: $lastId<br>";

/* Edit judulnya */
$judul = $data['title'];
editJudul($conn, $user,$judul, $id);

/* table yang diedit saat ini
table yang berdasarkan kode / sebuah pertanyaan2 / tableP
*/
$tableName= getSingleTableDatabase($conn, $user, $id)[0];
echo $tableName;

/* Batasan loop */
$batasan = count($data)-3;



/* Update data 
Update di TableP
*/
for ($i=1; $i < $batasan; $i+=6) {
  $id = $data[$key[$i]];
  $pertanyaan = $data[$key[$i+1]];
  $optiona = $data[$key[$i+2]];
  $optionb = $data[$key[$i+3]];
  $optionc = $data[$key[$i+4]];
  $optiond = $data[$key[$i+5]];

  if($id != ""){
    
    echo "<br>ID: $id<br>";
    echo "Pertanyaan: $pertanyaan<br>";
    echo "A: $optiona<br>";
    echo "B: $optionb<br>";
    echo "C: $optionc<br>";
    echo "D: $optiond<br>";
    updateTableP($conn, $tableName, $id, $pertanyaan, $optiona, $optionb, $optionc, $optiond);
  } 

  /* Menambahkan data yang sebelumnya belum ada 
  menambahkan di TableP
  */
  elseif ($data[$key[$i]] == "") {
    $lastId++;
    echo "<br>ID: $lastId<br>";
    echo "Pertanyaan: $pertanyaan<br>";
    echo "A: $optiona<br>";
    echo "B: $optionb<br>";
    echo "C: $optionc<br>";
    echo "D: $optiond<br>";
    echo "ID Diatas kosong<br> ID terakhir adalah ". $lastId-1 . "<br>";
    insertTableP($conn, $tableName, $pertanyaan, $optiona, $optionb, $optionc, $optiond);
    updateColTableParticipant($conn, $tableName, $lastId);
  }
}

/* Hapus data pertanyaan dari tabel p 
$deleted adalah array dari id yang akan dihapus
*/
if (isset($data["deleted"])){
  $deleted = $data["deleted"];
  print_r($deleted);
  foreach ($deleted as $key => $value) {
    delTableP($conn, $tableName, $value);
    delParticipantTable($conn, "p$tableName", $value);
    echo "Berhasil menghapus id: $value";
  }
}
} finally{
  header("location:../view/dashboard.php");
}

}else {
  echo "Silahkan login";
}
?>
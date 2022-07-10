<?php
include "../model/conf.php";
if(isLogin()){

/* Id dari data yang mau dihapus */
$id = get('id');

/* table yang diedit saat ini
table yang berdasarkan kode / sebuah pertanyaan2
*/
$tableRow = getSingleTableDatabase($conn, getLogin(), $id);

/* Data pertanyaan2 */
$data = json_encode(getTableP($conn, $tableRow[0]));
// print_r($data);
// echo "{$tableRow['judul']}";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style.css" />
  <title>Quizion</title>
</head>
<body style="background-color: #f7f9fa">
<div class="container" style="width: 85%">
  <!-- Form -->
  <div class="question-container">
    <form id="form" action="../controller/edit-proses.php?id=<?php echo $id ?>" method="post">
      <!-- Judul -->
      <h1 class="judul">Judul</h1>
      <input
        type="text"
        name="title"
        class="title"
        placeholder="Ketikan judul"
        value = "<?php echo "{$tableRow['judul']}"?>"
      />

      <?php
      
      ?>
      <!-- Question -->
      <div id="question-content">
        
      </div>

      <div id="tambah" class="end-container">
        <a onClick="tambahPertanyaan()" class="button2">Tambah</a>
      </div>
      <div class="end-container" style="background-color: rgba(0, 0, 0, 0)">
        <a href="dashboard.php" class="button2" style="font-size: 1em; border: none; font-weight: 600">Batalkan</a>
        <input
          type="submit"
          class="button2"
          name="simpan"
          style="font-size: 1em; border: none; font-weight: 600"
          value="Simpan"
        />
      </div>
    </form>
  </div>
  <!-- Button Create -->
</div>
<script src="form-create.js"></script>
<script>
  const data = <?php print_r($data) ?>;
  let pertanyaan = 0;

  data.forEach(element => {
    pertanyaan = element[0];
    console.log(element);
    tambahPertanyaane(element[0],element[1], element[2], element[3], element[4], element[5]);
  });
  pertanyaan = data.length;
  // console.log(pertanyaan);
</script>
</body>
<?php } ?>
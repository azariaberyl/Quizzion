<?php
include '../model/conf.php';
if (isLogin()){
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
  <nav style="background-color: white">
    <ul>
      <li class="button1"><a href="../index.php">Home</a></li>
      <li class="button1"><a href="dashboard.php">Dashboard</a></li>
    </ul>
    <ul>
      <li class="button1"><a href="../controller/logout.php">Logout</a></li>
    </ul>
  </nav>

  <div class="container" style="width: 85%">
    <!-- Form -->
    <div class="question-container">
      <form action="../controller/form-create-proses.php" method="post">
        <!-- Judul -->
        <h1 class="judul">Judul</h1>
        <input
          type="text"
          name="title"
          class="title"
          placeholder="Ketikan judul"
        />

        <!-- Question -->
        <div id="question-content">
          <div class="question">
            <input type="hidden" name="id" value="">
            <div class="end-container">
              <a onClick="deleteQuestion(this)" class="button2">Delete</a>
            </div>
            <!-- Type Soal -->
            <!-- <input type="hidden" name="type" id="type" value="radio" /> -->
            <!-- Soal -->
            <input class="title" type="text" name="pertanyaan0" placeholder="Masukan pertanyaan">
            <!-- Jawaban -->
            <div class="pilihan">
              <label for="00">A</label>
              <input type="text" name="pilihan00" id="00" placeholder="Masukan opsi A" />
            </div>
            <div class="pilihan">
              <label for="10">B</label>
              <input type="text" name="pilihan10" id="10" placeholder="Masukan opsi B" />
            </div>
            <div class="pilihan">
              <label for="20">C</label>
              <input type="text" name="pilihan20" id="20" placeholder="Masukan opsi C" />
            </div>
            <div class="pilihan">
              <label for="30">D</label>
              <input type="text" name="pilihan30" id="30" placeholder="Masukan opsi D" />
            </div>
          </div>
        </div>

        <div id="tambah" class="end-container">
          <a onClick="tambahPertanyaan()" class="button2">Tambah</a>
        </div>
        <div class="end-container" style="background-color: rgba(0, 0, 0, 0)">
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
    let pertanyaan = 0;
    function deleteQuestion(e) {
      const parent = e.parentElement.parentElement;
      parent.remove();
    }
  </script>
</body>
</html>
<?php
} else {
  echo "Anda belum login";
}
?>
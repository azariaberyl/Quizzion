<?php
include "../model/conf.php";
$login = $_SESSION["login"];
$userTableDatas = [];
if (isset($_SESSION["login"])){
  $userTablDatabase = getLogin();
  // print_r($userTablDatabase);
  if (!tableExists($conn, $userTablDatabase)){
    // echo "Table telah dibuat";
    createTableDatabase($conn, $userTablDatabase);
  }
  $datas = getTableDatabase($conn, $userTablDatabase);
?>

<!DOCTYPE html>
<html lang="id">
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
      <!-- Profile overview -->
      <div id="profile-overview">
        <p><?php echo "{$login['username']}" ?></p>
        <p>Room</p>
      </div>
      <!-- Create room button -->
      <div class="end-container">
        <a href="form-create.php" class="button2">Buat</a>
      </div>
      <!-- Table overview -->
      <?php
      foreach ($datas as $key => $value) {
        echo "<div class='table-overview'>
          <div>
            <a href=\"edit-form.php?id={$value['id']}\" class='button2'> Edit</a>
            <a href=\"../controller/hapus.php?id={$value['id']}\" class='button2'> Hapus</a>
          </div>
          <div class='bottom'>
            <h3>{$value['judul']}</h3>
            <h4><a href=participant.php?p={$value['kode']}>Participant: {$value['participant']}</a></h4>
          </div>
          <h3 style='margin: 5px;' >{$value['kode']}</h3>
        </div>";
      }
      ?>
    </div>
  </body>
</html>
<?php
}
else {
  echo "Login gagal";
}
?>
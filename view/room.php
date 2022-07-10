<?php
include "../model/conf.php";
if(isLogin()){
$tableName = get("room");
$pertanyaans = getTableP($conn, $tableName);
// print_r($pertanyaans);
// print_r($tableName);
// print_r($pertanyaans);
/* Mengambil database pembuat pertanyaan */
$userTable = getUserById($conn, explode("x",$tableName)[0]);
/* Mengambil judul dan participant */
try {
  $connTemp = $conn;
  $stmt = $conn->prepare("SELECT judul, participant FROM $userTable WHERE kode=\"$tableName\"");
  $stmt->execute();

  // set the resulting array to associative
  $user = $stmt->fetch();
  $conn = $connTemp;
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
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
    <?php if (isLogin()){
  echo '<li class="button1"><a href="dashboard.php">Dashboard</a></li>';
    }?>
  </ul>
  <ul>
  <?php if (isLogin()){ ?>
    <li class="button1"><a href="../controller/logout.php">Logout</a></li>
  <?php
    } else {
  ?>
  <li class="button1"><a href="login.html">Login</a></li>
  <li class="button1"><a href="register.html">Register</a></li>
  <?php }?>
  </ul>
</nav>

<div class="container" style="width: 85%">
  <!-- Form -->
  <div class="question-container">
    <form action="../controller/room-submit.php" method="post">
      <!-- Judul -->
      <h1 class="judul"><?php echo $user['judul']?></h1>
      <input type="hidden" name="participant" value= "<?php echo $user['participant']?>">
      <input type="hidden" name="kode" value= "<?php echo $tableName?>">

      <!-- Question -->
      <?php
      foreach ($pertanyaans as $key => $value) {
        // print_r($key);
      ?>
      <div class="question" style="overflow:hidden">
        <div class="kode-judul" ><?php echo $value[1] ?></div>

        <div class="kode-pilihan">
          <input 
          type="radio" 
          name="pertanyaan<?php echo $value[0] ?>" 
          id="0<?php echo $key ?>" 
          value="0" />
          <label for="0<?php echo $key ?>"><?php echo $value[2] ?></label>
        </div>
        <div class="kode-pilihan">
          <input 
          type="radio" 
          name="pertanyaan<?php echo $value[0] ?>" 
          id="1<?php echo $key ?>" 
          value="1" />
          <label for="1<?php echo $key ?>"><?php echo $value[3] ?></label>
        </div>
        <div class="kode-pilihan">
          <input 
          type="radio" 
          name="pertanyaan<?php echo $value[0] ?>" 
          id="2<?php echo $key ?>" 
          value="2" />
          <label for="2<?php echo $key ?>"><?php echo $value[4] ?></label>
        </div>
        <div class="kode-pilihan">
          <input 
          type="radio" 
          name="pertanyaan<?php echo $value[0] ?>" 
          id="3<?php echo $key ?>" 
          value="3" />
          <label for="3<?php echo $key ?>"><?php echo $value[5] ?></label>
        </div>
      </div>
      <?php } ?>

      <div class="end-container" style="background-color: rgba(0, 0, 0, 0)">
        <input
          type="submit"
          class="button2"
          name="submit"
          style="font-size: 1em; border: none; font-weight: 600"
          value="Submit"
        />
      </div>
    </form>
  </div>
  <!-- Button Create -->
</div>
</body>
</html>
<?php }
else{
  echo "Silahkan login dahulu";
}?>
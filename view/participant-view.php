<?php
include "../model/conf.php";
if(isLogin()){

$tableName = get('p');
$id = get('id');
$pertanyaans = getTableP($conn, $tableName);
$participant = getParticipantById($conn, $tableName, $id);
// print_r($participant);

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
      <!-- Judul -->
      <h1 class="judul"><?php echo $user['judul']?></h1>
      <input type="hidden" name="participant" value= "<?php echo $user['participant']?>">
      <input type="hidden" name="kode" value= "<?php echo $tableName?>">

      <!-- Question -->
      <?php
      foreach ($pertanyaans as $key => $value) {
        $checkeda = "";
        $checkedb = "";
        $checkedc = "";
        $checkedd = "";
        switch ($participant["pertanyaan{$value['id']}"]) {
          case 0:
            $checkeda = "checked";
            break;
          case 1:
            $checkedb = "checked";
            break;
          case 2:
            $checkedc = "checked";
            break;
          case 3:
            $checkedd = "checked";
            break;
        }
      ?>
      <div class="question" style="overflow:hidden">
        <div class="kode-judul" ><?php echo $value[1] ?></div>

        <div class="kode-pilihan">
          <input 
          type="radio" 
          name="pertanyaan<?php echo $key+1 ?>" 
          id="0<?php echo $key ?>" 
          value="0" 
          disabled
          <?php echo $checkeda ?>
          />
          <label for="0<?php echo $key ?>"><?php echo $value[2] ?></label>
        </div>
        <div class="kode-pilihan">
          <input 
          type="radio" 
          name="pertanyaan<?php echo $key+1 ?>" 
          id="1<?php echo $key ?>" 
          value="1" 
          disabled
          <?php echo $checkedb ?>
          />
          <label for="1<?php echo $key ?>"><?php echo $value[3] ?></label>
        </div>
        <div class="kode-pilihan">
          <input 
          type="radio" 
          name="pertanyaan<?php echo $key+1 ?>" 
          id="2<?php echo $key ?>" 
          value="2" 
          disabled
          <?php echo $checkedc ?>
          />
          <label for="2<?php echo $key ?>"><?php echo $value[4] ?></label>
        </div>
        <div class="kode-pilihan">
          <input 
          type="radio" 
          name="pertanyaan<?php echo $key+1 ?>" 
          id="3<?php echo $key ?>" 
          value="3" 
          disabled
          <?php echo $checkedd ?>
          />
          <label for="3<?php echo $key ?>"><?php echo $value[5] ?></label>
        </div>
      </div>
      <?php } ?>

  </div>
  <!-- Button Create -->
</div>
</body>
</html>
<?php }
else{
  echo "Silahkan login dahulu";
}?>
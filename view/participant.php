<?php
include "../model/conf.php";
if (isLogin()){

$tableName = get("p");
$data = getParticipant($conn, $tableName);

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
      <?php foreach ($data as $key => $value) { 
        $user = getDataUserById($conn, $value["userId"]);
        // print_r($user);
      ?>
        <div class="participant">
          <a 
          href="participant-view.php?p=<?php echo $tableName?>&id=<?php echo $value['userId'] ?>">
          <?php echo $user['username']?></a>
        </div>
      <?php } ?>
    </div>
  </body>
</html>
<?php
}
else {
  echo "Login gagal";
}
?>
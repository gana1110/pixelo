<?php
  $host_name = 'db5010891188.hosting-data.io';
  $database = 'dbs9209676';
  $user_name = 'dbu2984489';
  $password = 'pixeldu26!';
  $dbh = null;

  try {
    $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  } catch (PDOException $e) {
    echo "Erreur!:" . $e->getMessage() . "<br/>";
    die();
  }
?>

<?php
    $colorText = $_GET['currentColor'];
    $color = 1;

    if($colorText == 'black'){
      $color = 1;
    }
    else if($colorText == 'red'){
      $color = 2;
    }
    else if($colorText == 'green'){
      $color = 3;
    }
    else if($colorText == 'yellow'){
      $color = 4;
    }
    else if($colorText == 'blue'){
      $color = 5;
    }
    $currentCase = $_GET['currentCase'];
    $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE idCase = :idCase';
    $allData = $dbh->prepare($sqlQuery);
    $allData->execute([
        'color' => $color,
        'idCase' => $currentCase,
    ]);
?>
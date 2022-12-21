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
                $type = $_GET['q'];
                echo($type);

                $sqlQuery = "UPDATE `coin` SET `:typecoin` = 1";

                $allData = $dbh->prepare($sqlQuery);
 
                $allData->execute([
                    'typecoin' => $type,
                ]);
            ?>
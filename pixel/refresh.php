<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

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
    //
    $sqlQuery = 'SELECT CaseValue FROM pixelgame';
    $allData = $dbh->prepare($sqlQuery);
    $allData->execute();
    $users = $allData->fetchAll();
    foreach ($users as $user){  
      echo($user['CaseValue']);
    }
?>

</body>
</html>

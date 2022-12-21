
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
    $evolution = 2147483641;

    $colorText = $_GET['q'];
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

    echo($color);

    for ($i=0; $i < $evolution ; $i++) { 
        $sqlQuery = 'SELECT * FROM pixelgame';
        $allData = $dbh->prepare($sqlQuery);
        $allData->execute();
        $users = $allData->fetchAll();
        foreach ($users as $user){             
            if($user['CaseValue'] == 0)
            {
                if($users[$user['idCase']][1] == $color)
                {

                    $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                    $allData = $dbh->prepare($sqlQuery);

                    $allData->execute([
                        'string' => $user['idCase'],
                        'color' => $color,
                    ]);
                }
                
                else if($users[$user['idCase'] - 21 ][1] == $color)
                {
                    
                    $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                    $allData = $dbh->prepare($sqlQuery);

                    $allData->execute([
                        'string' => $user['idCase'],
                        'color' => $color,
                    ]);
                }
                
                else if($users[$user['idCase'] - 2 ][1] == $color)
                {
                    $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color  WHERE pixelgame.idCase = :string';

                    $allData = $dbh->prepare($sqlQuery);
    
                    $allData->execute([
                        'string' => $user['idCase'],
                        'color' => $color,
                    ]);
                }
                
                else if($users[$user['idCase'] + 19][1] == $color)
                {
                    $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                    $allData = $dbh->prepare($sqlQuery);
    
                    $allData->execute([
                        'string' => $user['idCase'],
                        'color' => $color,
                    ]);
                }
            }
        }
        sleep(3);
    }        sleep(3);

?>
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
                $currentCaseC = $_GET['q'] + 1;
                $colorText = $_GET['currentColor'];

                echo($currentCaseC);
                echo($colorText);

                $color = 2;
                
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
                $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                $allData = $dbh->prepare($sqlQuery);

                $allData->execute([
                    'string' => $currentCaseC,
                    'color' => $color
                ]);

                $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                $allData = $dbh->prepare($sqlQuery);

                $allData->execute([
                    'string' => $currentCaseC + 1,
                    'color' => $currentColor

                ]);
                $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                $allData = $dbh->prepare($sqlQuery);

                $allData->execute([
                    'string' => $currentCaseC + 20,
                    'color' => $currentColor

                ]);
                $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                $allData = $dbh->prepare($sqlQuery);

                $allData->execute([
                    'string' => $currentCaseC - 1,
                    'color' => $currentColor

                ]);
                $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                $allData = $dbh->prepare($sqlQuery);

                $allData->execute([
                    'string' => $currentCaseC - 20,
                    'color' => $currentColor

                ]);
                $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                $allData = $dbh->prepare($sqlQuery);

                $allData->execute([
                    'string' => $currentCaseC - 21,
                    'color' => $currentColor

                ]);
                $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                $allData = $dbh->prepare($sqlQuery);

                $allData->execute([
                    'string' => $currentCaseC - 19,
                    'color' => $currentColor

                ]);
                $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                $allData = $dbh->prepare($sqlQuery);

                $allData->execute([
                    'string' => $currentCaseC + 1,
                    'color' => $currentColor

                ]);
                $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                $allData = $dbh->prepare($sqlQuery);

                $allData->execute([
                    'string' => $currentCaseC + 19,
                    'color' => $currentColor

                ]);
                $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                $allData = $dbh->prepare($sqlQuery);

                $allData->execute([
                    'string' => $currentCaseC + 21,
                    'color' => $currentColor

                ]);
                $sqlQuery = 'UPDATE pixelgame SET CaseValue = :color WHERE pixelgame.idCase = :string';

                $allData = $dbh->prepare($sqlQuery);

                $allData->execute([
                    'string' => $currentCaseC + 20,
                    'color' => $currentColor

                ]);
            ?>
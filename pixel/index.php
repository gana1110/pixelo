<!DOCTYPE html>
<html>
<head>
  <title>Pixelo</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" type="image/jpg" href="favicon.jpg"/>

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
    session_start();
?>


  <h1 id = 'title'>Pixelo</h1>

    <div id = 'color'>
        <div class ='select' id = 'select'>Select your color: </div>
        <table class = 'tableselect'>
            <tr>
                <td id = 'red' style="background-color:red"></td>
                <td id = 'green' style="background-color:green"></td>
                
            </tr>
            <tr>
                <td id = 'yellow' style="background-color:yellow"></td>
                <td id = 'blue' style="background-color:blue"></td>
            </tr>
        </table>
    </div> 
    <div>
        <img id = 'start'src="start.png" onclick="start()"></img>
    </div>

  <script>
    let color = '';
    document.getElementById('red').addEventListener("click", function() {
        color = 'red';
        document.getElementById('start').src = "start2.png"
        document.getElementById('title').style.color = 'red';
        document.getElementById('select').style.color = 'red';
        document.getElementById("red").style.border = "solid 3px #FFA500";
        document.getElementById("green").style.border = "solid 3px black";
        document.getElementById("yellow").style.border = "solid 3px black";
        document.getElementById("blue").style.border = "solid 3px black";        
    });
    document.getElementById('green').addEventListener("click", function() {
        color = 'green';
        document.getElementById('start').src = "start2.png"
        document.getElementById('title').style.color = 'green';
        document.getElementById('select').style.color = 'green';
        document.getElementById("red").style.border = "solid 3px black"
        document.getElementById("green").style.border = "solid 3px #32de84";
        document.getElementById("yellow").style.border = "solid 3px black";
        document.getElementById("blue").style.border = "solid 3px black";        
    });
    document.getElementById('yellow').addEventListener("click", function() {
        color = 'yellow';
        document.getElementById('start').src = "start2.png"
        document.getElementById('title').style.color = 'yellow';
        document.getElementById('select').style.color = 'yellow';
        document.getElementById("red").style.border = "solid 3px black";
        document.getElementById("green").style.border = "solid 3px black";  
        document.getElementById("yellow").style.border = "solid 3px #40E0D0";
        document.getElementById("blue").style.border = "solid 3px black";  
    });
    document.getElementById('blue').addEventListener("click", function() {
        color = 'blue';
        document.getElementById('start').src = "start2.png"
        document.getElementById('title').style.color = 'blue';
        document.getElementById('select').style.color = 'blue';
        document.getElementById("red").style.border = "solid 3px black";
        document.getElementById("green").style.border = "solid 3px black"; 
        document.getElementById("yellow").style.border = "solid 3px black";
        document.getElementById("blue").style.border = "solid 3px #DDA0DD";  
    });
    document.getElementById('start').addEventListener("mouseover", over, false);
    document.getElementById('start').addEventListener("mouseout", out, false);
    document.getElementById("red").addEventListener("mouseover", overColorR, false);
    document.getElementById("red").addEventListener("mouseout", outColorR, false);
    document.getElementById("green").addEventListener("mouseover", overColorG, false);
    document.getElementById("green").addEventListener("mouseout", outColorG, false);
    document.getElementById("yellow").addEventListener("mouseover", overColorY, false);
    document.getElementById("yellow").addEventListener("mouseout", outColorY, false);
    document.getElementById("blue").addEventListener("mouseover", overColorB, false);
    document.getElementById("blue").addEventListener("mouseout", outColorB, false);

    function outColorY(){
        document.getElementById('yellow').style.backgroundColor = 'yellow';
    }
    function overColorY(){
        document.getElementById('yellow').style.backgroundColor = '#f3f582';
    }
    function outColorB(){
        document.getElementById('blue').style.backgroundColor = 'blue';
    }
    function overColorB(){
        document.getElementById('blue').style.backgroundColor = '#3a52f0';
    }
    function outColorG(){
        document.getElementById('green').style.backgroundColor = 'green';
    }
    function overColorG(){
        document.getElementById('green').style.backgroundColor = '#009c1a';
    }
    function outColorR(){
        document.getElementById('red').style.backgroundColor = 'red';
    }
    function overColorR(){
        document.getElementById('red').style.backgroundColor = '#fa4b4b';
    }

    function over(){
        if(color != ''){
        document.getElementById('start').src = "start3.png"
        }
    }
    function out(){
        if(color != ''){
            document.getElementById('start').src = "start2.png"
        }
        else{
            document.getElementById('start').src = "start.png"

        }
    }
    function start(){
        if(color != ''){
            document.cookie = 'color = ' + color;
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                window.open("https://pixel.dasheo.fr/pixelgame.php");
            }
            xhttp.open("GET", "https://pixel.dasheo.fr/pixelgame.php?q=" + color);
            xhttp.send();
        }  
    }

</script>
</body>
</html>
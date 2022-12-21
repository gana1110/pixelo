<!DOCTYPE html>
<html>
<head>
<title>Pixelo</title>
<link rel="stylesheet" href="style.css">
<link rel="shortcut icon" type="image/jpg" href="favicon.jpg"/>
</head>

<body>
<h1 id = 'title'>Pixelo</h1>


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

 

<script>
    let currentColor = readCookie('color');
    console.log(currentColor);
    
    function readCookie(cname) {
        var name = cname + "=";
        var decoded_cookie = decodeURIComponent(document.cookie);
        var carr = decoded_cookie.split(';');
        for(var i=0; i<carr.length;i++){
        var c = carr[i];
        while(c.charAt(0)==' '){
            c=c.substring(1);
        }
        if(c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
        }
        return "";
    }
</script>

<table id = 'map'>
    <?php                
            $sqlQuery = 'SELECT * FROM pixelgame';
            $allData = $dbh->prepare($sqlQuery);
            $allData->execute();
            $users = $allData->fetchAll();
            $id = 0;
            $idtr = 0;
            foreach ($users as $user){
                if ($id % 20 == 0)
                {
                    echo "<tr id = $idtr>";
                    $idtr++;
                }
                $compteur = 0;
                echo "<th id = case$id>".$user['CaseValue']."</th>";
                $compteur++;
                if ($id % 20 == 0 && $compteur % 19 == 0)
                {
                    echo "</tr>";
  
                }
                $id++;
            }
            ?>
</table>

<script>
    // Script afficher couleur des cases
    let numCase = 399;
    while (numCase >= 0){
        if(document.getElementById('case' + numCase).innerText == 0){
            document.getElementById('case' + numCase).style.backgroundColor = "white";
        }
        else if(document.getElementById('case' + numCase).innerText == 1){
            document.getElementById('case' + numCase).style.backgroundColor = "black";
        }
        else if(document.getElementById('case' + numCase).innerText == 2){
            document.getElementById('case' + numCase).style.backgroundColor = "red";
        }
        else if(document.getElementById('case' + numCase).innerText == 3){
            document.getElementById('case' + numCase).style.backgroundColor = "green";
        }
        else if(document.getElementById('case' + numCase).innerText == 4){
            document.getElementById('case' + numCase).style.backgroundColor = "yellow";
        }
        else if(document.getElementById('case' + numCase).innerText == 5){
            document.getElementById('case' + numCase).style.backgroundColor = "blue";
        }
        else if(document.getElementById('case' + numCase).innerText == 7){
            document.getElementById('case' + numCase).style.backgroundImage = "url('bonus.png')";
            document.getElementById('case' + numCase).style.backgroundSize = "12px 12px";
        }
        else if(document.getElementById('case' + numCase).innerText == 8){
            document.getElementById('case' + numCase).style.backgroundImage = "url('mush.png')";
            document.getElementById('case' + numCase).style.backgroundSize = "12px 12px";
        }
        else if(document.getElementById('case' + numCase).innerText == 9){
            document.getElementById('case' + numCase).style.backgroundImage = "url('coin.png')";
            document.getElementById('case' + numCase).style.backgroundSize = "12px 12px";
        }
        else{
            document.getElementById('case' + numCase).style.backgroundColor = "blue";
        }
        numCase--;
    }
</script>


<script>
    // Script Naviguer entre case
    let currentCase = 0;
    document.getElementById('case' + currentCase).style.borderColor = "#009809";
    document.getElementById('case' + currentCase).style.borderWidth = "1.5px";
    document.addEventListener('keypress', (event) => {
        var name = event.key;
        
        if(name == 'w'){
            document.getElementById('case' + currentCase).style.borderColor = "black";
            document.getElementById('case' + currentCase).style.borderWidth = "1px";
            currentCase = currentCase - 20;
        }
        else if(name == 'a'){
            document.getElementById('case' + currentCase).style.borderColor = "black";
            document.getElementById('case' + currentCase).style.borderWidth = "1px";
            currentCase = currentCase - 1;
        }
        else if(name == 's'){
            document.getElementById('case' + currentCase).style.borderColor = "black";
            document.getElementById('case' + currentCase).style.borderWidth = "1px";
            currentCase = currentCase + 20;
        }
        else if(name == 'd'){
            document.getElementById('case' + currentCase).style.borderColor = "black";
            document.getElementById('case' + currentCase).style.borderWidth = "1px";
            currentCase = currentCase + 1;
        }

        document.cookie = "cname = " + currentCase;

        document.getElementById('case' + currentCase).style.borderColor = "#009809";
        document.getElementById('case' + currentCase).style.borderWidth = "1.5px";
        //
        move(currentCase + 1);
       
        function move(str) {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
            }
            xhttp.open("GET", "https://pixel.dasheo.fr/ajax.php?currentCase="+ str + "&currentColor=" + currentColor);
            xhttp.send();
        }
    }, false);
   

</script>

<script>

    let coins = 0;
    window.addEventListener("keyup", bomb);

    function bomb(){
        console.log(document.getElementById('case' + currentCase).innerText);
        if(document.getElementById('case' + currentCase).innerText == 7){
            const xhttp = new XMLHttpRequest();

            xhttp.onload = function() {
            }
            xhttp.open("GET", "https://pixel.dasheo.fr/bomb.php?q=" + currentCase) + '&currentColor=' + currentColor;
            xhttp.send();
        }
        else if (document.getElementById('case' + currentCase).innerText == 8){
        
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'mush.php');

            xhr.onreadystatechange = function () {
            const DONE = 4; // readyState 4 means the request is done.
            const OK = 200; // status 200 is a successful return.

            if (xhr.readyState === DONE) {
                if (xhr.status === OK) {
                    }   
                } 
            }
        }
        else if (document.getElementById('case' + currentCase).innerText == 9){
        
            coins++;
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'mush.php?q=' + currentColor );

            xhr.onreadystatechange = function () {
            const DONE = 4; // readyState 4 means the request is done.
            const OK = 200; // status 200 is a successful return.

            if (xhr.readyState === DONE) {
                if (xhr.status === OK) {
                    }   
                } 
            }
        }

        if(currentColor == 'black'){
            document.getElementById('case' + currentCase).innerText = 1;
            document.getElementById('case' + currentCase).style.backgroundColor ="black";
            document.getElementById('case' + currentCase).style.backgroundImage = "";
        }
        else if(currentColor == 'red'){
            document.getElementById('case' + currentCase).innerText = 2;
            document.getElementById('case' + currentCase).style.backgroundColor ="red";
            document.getElementById('case' + currentCase).style.backgroundImage = "";
        }
        else if(currentColor == 'green'){
            document.getElementById('case' + currentCase).innerText = 3;
            document.getElementById('case' + currentCase).style.backgroundColor ="green";
            document.getElementById('case' + currentCase).style.backgroundImage = "";
        }
        else if(currentColor == 'yellow'){
            document.getElementById('case' + currentCase).innerText = 4;
            document.getElementById('case' + currentCase).style.backgroundColor ="yellow";
            document.getElementById('case' + currentCase).style.backgroundImage = "";
        }
        else if(currentColor == 'blue'){
            document.getElementById('case' + currentCase).innerText = 5;
            document.getElementById('case' + currentCase).style.backgroundColor ="blue";
            document.getElementById('case' + currentCase).style.backgroundImage = "";
        }
        
    }

    

</script>
<script>
setInterval(displayHello, 250);

function displayHello(){

    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'refresh.php');

    xhr.onreadystatechange = function () {
	const DONE = 4; // readyState 4 means the request is done.
	const OK = 200; // status 200 is a successful return.

	if (xhr.readyState === DONE) {
		if (xhr.status === OK) {
            let newDiv = xhr.responseText;		
            let final = newDiv.replace(/\D/g, '');
            for (let index = 0; index < final.length; index++) {
                document.getElementById('case' + index).innerText = final[index];
                if(document.getElementById('case' + index).innerText == 0)
                {
                    document.getElementById('case' + index).style.backgroundColor ="white";
                }
                else if(document.getElementById('case' + index).innerText == 1)
                {
                    document.getElementById('case' + index).style.backgroundColor ="black";
                }
                else if(document.getElementById('case' + index).innerText == 2){
                    document.getElementById('case' + index).style.backgroundColor = "red";
                }
                else if(document.getElementById('case' + index).innerText == 3){
                    document.getElementById('case' + index).style.backgroundColor = "green";
                }
                else if(document.getElementById('case' + index).innerText == 4){
                    document.getElementById('case' + index).style.backgroundColor = "yellow";
                }
                else if(document.getElementById('case' + index).innerText == 5){
                    document.getElementById('case' + index).style.backgroundColor = "blue";
                }
                else if(document.getElementById('case' + numCase).innerText == 7){
                    document.getElementById('case' + numCase).style.backgroundImage = "url('bonus.png')";
                    document.getElementById('case' + numCase).style.backgroundSize = "12px 12px";
                }
                else if(document.getElementById('case' + numCase).innerText == 8){
                    document.getElementById('case' + numCase).style.backgroundImage = "url('mush.png')";
                    document.getElementById('case' + numCase).style.backgroundSize = "12px 12px";
                }
                else if(document.getElementById('case' + numCase).innerText == 9){
                    document.getElementById('case' + numCase).style.backgroundImage = "url('coin.png')";
                    document.getElementById('case' + numCase).style.backgroundSize = "12px 12px";
                }
            }   
        } 
        else {
			console.log('Error: ' + xhr.status); // An error occurred during the request.
		}
	}
   
};
xhr.send(null);
}

</script>
<div>
    <a>
    <img src="reset.png" id='resetbutton' onClick = 'reset()' w/>
    </a>
    <a href = 'https://pixel.dasheo.fr'> 
    <img src="home.png" id='home' />
    </a>
</div>
<script>
    document.getElementById('home').addEventListener("mouseover", home, false);
    document.getElementById('home').addEventListener("mouseout", homeout, false);


    function home(){
        document.getElementById('home').src = 'home2.png';
    }
    function homeout(){
        document.getElementById('home').src = 'home.png';
    }
    function reset(){

        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'reset.php');

        xhr.onreadystatechange = function () {
        const DONE = 4; // readyState 4 means the request is done.
        const OK = 200; // status 200 is a successful return.

        if (xhr.readyState === DONE) {
            if (xhr.status === OK) {
                window.location.reload();

            
            } 
            else {
                console.log('Error: ' + xhr.status); // An error occurred during the request.
            }
        }

        };
        xhr.send(null);
    }

    setInterval(checkEnd, 1000);

    var div = document.createElement('div');
    document.body.appendChild(div);
    div.id = 'myDiv';
    div.style.visibility = 'hidden';

    function checkEnd(){
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'refresh.php');

            xhr.onreadystatechange = function () {
                const DONE = 4; // readyState 4 means the request is done.
                const OK = 200; // status 200 is a successful return.

                if (xhr.readyState === DONE) {
                    if (xhr.status === OK) {
                        let newDiv = xhr.responseText;		
                        let final = newDiv.replace(/\D/g, '');

                        let numCase = 399;
                        let num = true;
                        let black = 0;
                        let red = 0;
                        let green = 0;
                        let yellow = 0;
                        let blue = 0;


                        while (numCase >= 0 && num == true){
                            if(final[numCase] == 0){

                                num = false;
                            }
                            else if(final[numCase] == 1){
                                black++;
                            }
                            else if(final[numCase] == 2){
                                red++;
                            }
                            else if(final[numCase] == 3){
                                green++;
                            }
                            else if(final[numCase] == 4){
                                yellow++;
                            }
                            else if(final[numCase] == 5){
                                blue++;
                            }
                            numCase--;
                        }

                        if(num == true){
                            let max = Math.max(red, green, yellow, blue);
                            let arr = [red, green, yellow, blue];
                            let array = ['red', 'green', 'yellow', 'blue'];

                            let winner;
                            div.innerText = 'Score: \n  Red : ' + red + ' cases - ' + (red / 400) * 100 + ' % ' +' \n '+ ' Green : ' + green + ' cases - ' + (green / 400) * 100 + ' %' + ' \n' + ' Yellow : ' + yellow + ' cases - ' + (yellow / 400) * 100 + ' %' + ' \n' +' Blue : ' + blue + ' cases - ' + (blue / 400) * 100 +' %' ;
                            div.style.textAlign = "center";
                            div.style.fontFamily = "ninja";
                            div.style.visibility = 'visible';
                            for (let index = 0; index < arr.length; index++) {
                                if (arr[index] === max) {
                                    winner = array[index];
                                }
                            }
                            div.innerText += ' \n \n  The winner is: ' + winner;

                            let position = 5;
                           
                            if(winner == 'red'){
                                let insertAtFunc = (div, subStr, position) => `${div.slice(0, position)}${subStr}${div.slice(position)}`;
                                document.getElementById('myDiv').innerText += insertAtFunc(div, 'test', position);
                            }
                        }
                    }
                } 
            };
            xhr.send(null);
    }
    
</script>
<script>
const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
    }   
    xhttp.open("GET", "https://pixel.dasheo.fr/evolution.php?q=" + currentColor);
    xhttp.send();
</script>
<script>

    function outreset(){
        document.getElementById('resetbutton').src = 'reset.png';
    }
    function overreset(){
        document.getElementById('resetbutton').src = 'reset2.png';
    }
    document.getElementById('resetbutton').addEventListener("mouseover", overreset, false);
    document.getElementById('resetbutton').addEventListener("mouseout", outreset, false);

</script>

</body>

</html>
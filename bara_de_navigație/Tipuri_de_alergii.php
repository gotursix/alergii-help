<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Alergii Help</title>

<link rel="stylesheet" href="../css/css.css">
<link rel="stylesheet" href="../css/style.css"> 

</head>
<body>
       <!-- începutul optiunilor setări cont -->
     <?php
    
           include '../panou_mod_account/panoul_administratirului.php';

?>
        
     <!-- sfțrșitul optiunilor setări cont -->
    

    <?php

     include 'bara_navigatie.php';

?>
    
<div class="container">
  <div class="row tipuri-def">
    <div class="col-lg-9 col-md-12" >
<div class="row">
    
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail">
            <div class="caption">
              <h3> Cauzele alergiilor:</h3>
              <p> O alergie începe atunci când sistemul imunitar greșește o substanță inofensivă pentru un invadator periculos. Sistemul imunitar produce apoi anticorpi care răman în alertă pentru acel alergen anume. Când sunteți expus alergenului din nou, acești anticorpi pot elibera un număr de substanțe chimice ale sistemului imunitar, cum ar fi histamină, care cauzează simptome alergice.</p>
</div>
          </div>
        </div> 
    
    
    
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail">
            <div class="caption">
              <h3> Frecvențele alergice includ:</h3>
              <p> Alergeni aeropurari, cum ar fi polenul, părul animal, acarienii de praf și mucegaiul Anumite alimente, în special arahide, nuci de copac, grâu, soia, pește, crustacee, ouă și lapte Tulpini de insecte, cum ar fi de la o albină sau o viespe Medicamente, în special antibiotice pe bază de penicilină sau pe bază de penicilină Latexul sau alte substanțe pe care le atingi, care pot provoca reacții alergice cutanate </p>
</div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-md-offset-3 col-lg-offset-0">
  
   <iframe src="https://www.meteoblue.com/en/weather/widget/three?geoloc=detect&nocurrent=0&noforecast=0&noforecast=1&days=4&tempunit=CELSIUS&windunit=METER_PER_SECOND&layout=image"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" class="forecast"></iframe>
    
    </div>
    
        </div>

        
   </div>

  </div>
<div class="tipuri" >
    <h3>Tipuri de alergii</h3>
<input id="myInput" onkeyup="myFunction()" placeholder="Caută alergia..." title="Type in a name" type="text">
                        
<ul id="myUL" >
   
   
   
 <?php

$servername = "mysql.hostinger.com";
$username = "u784726611_teze";
$password = "b567c63b567c63";
$dbname = "u784726611_teze";

$mysqli = new mysqli($servername, $username, $password, $dbname);


if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$aproved='1';   

$stmt = $mysqli->prepare("SELECT * FROM tda WHERE aproved = ?");
$stmt->bind_param("s", $aproved);
$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows === 0) 
exit('No rows');


while($row = $result->fetch_assoc())
{

  echo "  <li>
     
     
          <a href='../reportaje/tda.php?title=".$row['d_title']."&date=".$row['d_dat']."&hmm=".$row['d_id']."'>
                       
            ".$row['d_title']."
             
             </a>
             </li>";

}

$mysqli->close();
$stmt->close();
   ?>
   
   
   
   
<?php
    session_start();

    if (isset($_SESSION["email"]) || isset($_SESSION["loggedIn"])) 
          {
           echo ' <div class="center upb">Puteți adauga o categorie apăsând pe butonul de mai jos <br>
           <a href="../login/tda.php"> <button class="btn btn-info">Adaugă</button> </a>
           </div></div><br>';
}
?> 
    </ul>
</div>
    </div>
              <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>     
<script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
</script>

<script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>
</body>
</html>
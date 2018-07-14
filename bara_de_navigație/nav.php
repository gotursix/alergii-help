<?php
    session_start();

    if (isset($_SESSION["email"]) || isset($_SESSION["loggedIn"])) 
     {
         
        if($_SESSION['picture'] == ""){
  
             echo ' <div class="dropdown">
  <div class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <li class="nav-account"> '.$_SESSION['username'].'
   <img class="nav-img" src="https://alergii-help.xyz/images/default.jpg" alt="Default Profile Pic"> </li>
  </div>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <li><a href="https://alergii-help.xyz/panou_mod_account/profilul_meu.php" class="black">Profilul meu</a></li>
    <li><a href="https://alergii-help.xyz/login/logout.php" class="red">Deconectați-vă</a></li>
      <li><a class="black"><span class="pointer" onclick="openNav()">&#9776; Setări</span>
</a></li>
  </div>
</div> ' ;}
else 
{
     echo ' <div class="dropdown">
  <div class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <li class="nav-account">'.$_SESSION['username'].'
   <img class="nav-img" src="https://alergii-help.xyz/images/'.$_SESSION["picture"].'" alt="Profile Pic"></li>
  </div>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <li><a href="https://alergii-help.xyz/panou_mod_account/profilul_meu.php" class="black">Profilul meu</a></li>
    <li><a href="https://alergii-help.xyz/login/logout.php" class="red">Deconectați-vă</a></li>
      <li><a class="black"><span class="pointer" onclick="openNav()">&#9776; Setări</span>
</a></li>
  </div>
</div> ' ; }      
}
else
 {
 echo '<li><a href="https://alergii-help.xyz/login/login.php" class="green">Conectați-vă</a></li>';
 }

?>  
   
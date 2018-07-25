<?php

session_start();


$server = "mysql.hostinger.com";
        $username = "u784726611_teze";
        $password = "b567c63b567c63";
        $dbname = "u784726611_teze";
        $dbcon = mysqli_connect($server,$username, $password, $dbname);

$password1 = mysqli_real_escape_string($dbcon, $_POST['newPassword']);

$password2 = mysqli_real_escape_string($dbcon, $_POST['confirmPassword']);

$email = mysqli_real_escape_string($dbcon, $_SESSION['email']);


if ($password1 <> $password2)
if($password1 <> '')
if($password2 <> '')
{
    echo  "<div class='alert'>
              <span class='closebtn'>&times;</span>  
              Parolele nu corespund!
              </div>

<script>
var close = document.getElementsByClassName('closebtn');
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = '0';
        setTimeout(function(){ div.style.display = 'none'; }, 600);
    }
}
</script>";
}


if ($password1 == $password2)
   if($password1 <> '')
      if($password2 <> '')
{     
    
    $password1 = sha1($password1);
    $password2 = sha1($password2);
    
     if (mysqli_query($dbcon, "UPDATE users SET password='$password1' WHERE email='$email'"))
       {
         header("../login/logout.php");
       }
       
    else
{
   mysqli_error($dbcon);
}
mysqli_close($dbcon);
}


?>


  
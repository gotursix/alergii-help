<?php
	if (isset($_POST["submit"])) {
	    
	    
	    	session_start();
    
		$name = $_SESSION["username"];
		$email = $_SESSION["email"] ;
		$text = $_POST['name'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'My site'; 
		$to = 'admin@alergii-help.xyz'; 
		$subject = 'Adauga stire ';
		
		$body ="From: $name\n E-Mail: $email\n TDA: $message \n Titlu: $text";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Va rugam introduceti titlul';
		}
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Va rugam introduceti stirea';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Anti-spam este incorect';
		}

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Mulțumim! Știrea va fi verificată de un administrator, apoi va fi postată.</div>';
	} else {
		$result='<div class="alert alert-danger">A aparut o eroare la trimiterea știrii. Vă rugăm încercați mai târziu.</div>';
	}
}
	}
?>
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

           include '../bara_de_navigație/bara_navigatie.php';
?>
      
  	<div class="container up">
  		<div class="row">
  				<h1 class="center">Adaugă o știre</h1>
  				
				<form role="form" method="post" action="">
					
						<label for="email">Titlu</label>
							<input placeholder="Introduceți titlul știrii" type="text" id="email" name="name" required>
							
					
						<label for="message">Textul</label>
                    
							<textarea placeholder="Introduceți textul articolului" rows="4" name="message" required><?php echo htmlspecialchars($_POST['message']);?></textarea>
                    
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
							
				<label for="human">2 + 3 = ?</label>
                    
							<input type="text" id="human" name="human" placeholder="Răspuns"
							required>
                    
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
				
							
                            <input id="submit" name="submit" type="submit" value="Trimiteți știrea" >
        
                    <?php echo $result; ?>
							
				</form> 
            </div>
        </div>

<script src="../js/jq.js"></script> 
<script src="../js/js.js"></script>

</body>
</html>

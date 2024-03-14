<?php
/**
 * Application Name:        RIMES Assignment 
 * Author:   				Ahsan Gul <ahsan_ansian@yahoo.com>
 * Description:            	User registration and login system where users can publish articles or news.<br>
 * 							Chart is displayed based on letters 'r', 'i', 'm', 'e', and 's' occurances in articles.
 * 
**/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>Login to RIMES</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Email</label>
     	<input type="email" name="email" placeholder="Your registered email address" required><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Your password for this account" required><br>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
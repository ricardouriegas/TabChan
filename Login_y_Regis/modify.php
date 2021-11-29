<?php  include("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modificaciones</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		
		.global{
		  padding: 5px;
		}

		body {
			overflow-x: hidden;
			background-color:  #4a4a4a;
			color: #00a693;

		}

		.buttons {
		    background-color:#1b1b1b;
		    border-radius: 12px;
		}

		.textarea{
		    border-radius: 6px;
		}

	</style>

	<?php session_start(); 
		if ($_SESSION['session']) {
	?>

    <div class="form" align="center">
		<form method="post" action="modify.php">
		  <h2>Modificaciones</h2>
		  <hr>

		  <h4>Informacion antigua</h4>
		  <input class="textarea" type="text" name="username" placeholder="Usuario" required><br>
		  <input class="textarea" type="password" name="password" placeholder="Contraseña" required><br><br>


		  <h4>Nueva Contraseña</h4>
		  <input class="textarea" type="password" name="Newpassword" placeholder="Nueva Contraseña" required><br>

		  <hr>

		  <input class="buttons" name="btn" type="submit" value="Modificar"><br><br>

		</form>
    </div>

    <?php

    	if($_SERVER['REQUEST_METHOD'] == "POST") {

    		//vieja
    		$username = $_POST['username'];
    		$password = $_POST['password'];
    		//nueva
    		$NPass = $_POST['Newpassword'];

    		$query = "update USUARIO set contra = '$NPass' where username = '$username' and contra = '$password'";
			mysqli_query($con, $query) or die("<p style=color:aqua;> *Algo esta mal con la nueva contraseña 🧐 </p>");
			header("Location: http://localhost/Cbtis/ProyectSubABP/");
    	}
    ?>

</body>
</html>

<?php  
	}else{
		echo "<h1 align=center>Que haces aqui pa? 🤨</h1>";
	}

?>
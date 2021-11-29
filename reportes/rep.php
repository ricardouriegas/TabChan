<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reportar</title>

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
		<form action="rep.php" method="post" >
    		<h4>Reporte</h4>
    		<input class="textarea" type="number" name="number" placeholder="Num. de Usuario" required><br><br>
    		<textarea class="textarea" type="text" rows="6" cols="35" maxlength="100" autocomplete="off" tabindex="1" name="razRep" placeholder="Razon o motivo por el cual se desea reportar" required></textarea>

    	    <p><input class="buttons" name="btn" type="submit"></p><br>
	    </form>
    </div>

    <?php

    	$host="localhost";
    	$user="root";
    	$password="";
    	$db="TabChan";

    	if(!$con = mysqli_connect($host,$user,$password,$db)) { die("Failed to connect!"); }

    	if(isset($_POST['btn'])) {
    		$numUsuario = $_POST['number'];
    		$razonReporte = $_POST['razRep'];
    		$sql = "insert into REPORTES (razRep) values ('$razonReporte')";
    		$result = mysqli_query($con, $sql);

    		if ($result) {
    	    	header("Location: http://localhost/Cbtis/ProyectSubABP/");
    		} else {
    	  	echo "Algo esta mal :/";
    		}

    	}
    ?>

</body>
</html>

<?php  
	}else{
		echo "<h1 align=center>No puedes reportar a alguien si no tienes una cuenta</h1>";
	}

?>
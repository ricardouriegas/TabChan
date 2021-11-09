<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reportes</title>

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
    <div class="form" align="center">
		<h1>Reporte de Usuario</h1>
		<form action="rep.php" method="post" >
	        <!-- Form para subir algo al tablon -->
    		<h4>Usuario</h4>
    	    <input class="textarea" id="username" type="text" size="25" maxlength="35" autocomplete="off" tabindex="1" name="username" placeholder="Username" required>
    	    <p><input class="buttons" name="btnUsu" type="submit"></p><br>
	    </form>

	    <form>
    		<h4>Falla o problema</h4>
    	    <textarea class="textarea" name="text" id="text" rows="6" cols="35" tabindex="3" placeholder="Comentar alguna falla (bug) o problema" required></textarea>

    		<p><input class="buttons" name="btnBug" type="submit"></p>
    	</form>
    </div>

    <?php

    	$host="localhost";
    	$user="root";
    	$password="";
    	$db="TABCHAN";

    	if(!$con = mysqli_connect($host,$user,$password,$db)) { die("Failed to connect!"); }

    	if(isset($_POST['btnUsu'])) {

    	  $username = $_POST['username'];

    	  $sql = "insert into REPORTES (username) values ('$username')";

    	  $result = mysqli_query($con, $sql);

    	  if ($result) {
    	    header("Location: http://localhost/Cbtis/ProyectSubABP/");
    	  } else {
    	  	echo "Algo esta mal :/";
    	  }

    	}

    	if(isset($_POST['btnBug'])) {

    	  $text = $_POST['text'];

    	  $sql = "insert into REPORTES (bug) values ('$text')";

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
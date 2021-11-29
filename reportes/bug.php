<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bug</title>

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
		<form action="bug.php" method="post" >
    		<h4>Falla o Bug</h4>
    	    <textarea class="textarea" name="text" id="text" rows="6" cols="35" tabindex="3" maxlength="600" placeholder="Explica aqui la falla o bug encontrado" required></textarea>

    		<p><input class="buttons" name="btnBug" type="submit"></p>
    	</form>
    </div>

    <?php

    	$host="localhost";
    	$user="root";
    	$password="";
    	$db="TabChan";

    	if(!$con = mysqli_connect($host,$user,$password,$db)) { die("Failed to connect!"); }

    	if(isset($_POST['btnBug'])) {
    	  $bug = $_POST['text'];
    	  $sql = "insert into BUG (bug) values ('$bug')";
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
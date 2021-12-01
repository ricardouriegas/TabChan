	<?php include("connection.php");

	session_start(); 
	$a = $_SESSION['session'];

	if ($_SESSION['session'] == "admin") {
	?>    
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

	<h2 align="center">Admin page</h2>
	<hr>

    <?php
        $queryREP = "select * from `REPORTES`";
        $resultREP = mysqli_query($con, $queryREP) or die("Algo malo paso");

        echo "<div class='col-lg-12'>"; // start a table tag in the HTML

        while($rowR = mysqli_fetch_array($resultREP)){   //Creates a loop to loop through results
            echo "<div class='op'>";

                echo "<p> Reporte: " . $rowR['idRep'] . " / Usuario: " . $rowR['idUsu'] ."</p>"; 

                // print($row['imagen']);
                echo " <p>" . $rowR['razRep'] . "</p>"; 

            echo "</div>";   
        }

        echo "</div>"; //Close the table in HTML


        $queryBUG = "select * from `BUG`";
        $resultBUG = mysqli_query($con, $queryBUG);

        echo "<div class='col-lg-12'>";
        while($rowB = mysqli_fetch_array($resultBUG)){   //Creates a loop to loop through results
            echo "<div class='op'>";

                echo "<p> Bug: " . $rowB['idBug'] . "</p>"; 

                // print($row['imagen']);
                echo " <p>" . $rowB['bug'] . "</p>"; 

            echo "</div>";   
        }
        echo "</div>";
    ?>

</body>
</html>

<?php  
	}else{
		echo "<h1 align=center>Que haces aqui pa? 🤨</h1>";
	}

?>
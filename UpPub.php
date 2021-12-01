<!DOCTYPE html>
<html>
<head>
<?php 
	if($_SERVER['REQUEST_METHOD'] == "POST") {
	include("connection.php");
	session_start();


	$a = $_SESSION["session"];

	$codeSQL = "select * from USUARIO where username = '$a' limit 1";
	$result = mysqli_query($con, $codeSQL);
	$row = mysqli_fetch_array($result);
	$idUsu = $row['idUsu'];

	//conection
	$titulo = $_POST['titulo'];
	$text = $_POST['text'];
	
	//info de la imagen
	$directorio = "img/";
	$file = $directorio . $_FILES['archivo']['name'];
	$a = explode('.', $file);

	$Newfile = $a[0] . date("h_i_sa") . date("Y_m_d_") . $idUsu . "." . $a[count($a)-1];
	//subimos la imagen
	move_uploaded_file($_FILES['archivo']['tmp_name'], $Newfile);


	if ($_SESSION['session']) {
		$query = "insert into PUBLICACIONES (titulo, texto, imagen, idUsu) values ('$titulo','$text', '$Newfile', '$idUsu')";
		mysqli_query($con, $query) or die("Algo esta mal");
	} 
?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Publicacion</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- css -->
    <link href="css/style.css" rel="stylesheet">

	<script type="text/javascript">
		function expand (img) {
                img.style.width = '400px';
        }
	</script>
</head>
<body>

	<div class="row">
	        <div id="top"><a href="top"></a></div>
	        <div id="boardNav" class=" boardlist col-lg-12 text-center"> <!--  nav de boards -->
	            <!--<span>
	    			[
	    			<a href="#">Pokemon </a> /
	    			<a href="#">Random </a> /
	    			<a href="#">Tecnologia </a> /
	    			<a href="#">Bimbo </a> /
	    			<a href="#">Videojuegos</a> 
	    			]
	    		</span><br><br>-->
	        </div>
	        <div class="col-lg-12 text-center"><!-- banner -->
	            <img id="banner" src="img/ness_walking.gif">
	        </div>
	        <div class="col-lg-12 text-center"><!-- main title -->
	            <div class="h1"><strong> /tm/ - Team 3 </strong></div>
	            <div class="h4">
	                <small>"Algunas veces hablar no esta mal :]"</small>
	            </div>
	        </div>

	    </div>

	    <div class="topb">
			<span>
				<a href="index.php">[Regresar]</a>
			</span>
	    </div>

	    <div class="col-lg-12 ">
                <div class="op"> 

                	<p><?php echo "usuario: " . $idUsu;?></p>
                    <h4><?php echo $titulo . "<br>";?></h4>

                    <?php echo "<img class='images' onclick='expand(this);' src='" . $Newfile . "'>"; ?>

                    <p><?php echo $text; ?></p>

                </div>
        </div> 

	    <div class="topb">
			<span>
				<a href="#top">[Top]</a>
			</span>
	    </div>

</body>
</html>
<?php  
} else {
	echo "Que haces aqui pa?? 🤨";
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
		//conection
		include("connection.php");
		$titulo = $_POST['titulo'];
		$text = $_POST['text'];
		$file = $_POST['file'];

		//if theres no image then the dog is put it on it
		if (isset($file)) {
			$file = "img/dog:0.jpg";
		}
		
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			if ($_SESSION['user']= true) {
				$query = "insert into PUBLICACIONES (titulo, texto) values ('$titulo','$text')";
				mysqli_query($con, $query);
			}
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

                    <h4><?php echo $titulo; ?></h4>
                    <img class="images" src="<?php echo $file; ?>" onclick="expand(this);">
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
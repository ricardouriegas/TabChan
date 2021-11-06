
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bienvenido</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- link a un css que centra y acopla las cosas a la pantalla -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- css -->
    <link href="css/style.css" rel="stylesheet">
    
    <script type="text/javascript">
        
        function expand (img) {
                img.style.width = '400px';
        }

        function check () {
            titulo = document.getElementById('titulo').value;
            text = document.getElementById('text').value;

            if (!titulo.replace(/\s/g, '').length && !text.replace(/\s/g, '').length) {
                alert('Algo anda mal con el titulo o texto');
                return false;
            } else {
                return true;
            }
        }

    </script>

</head>

<body>

    <div class="row">
        <div id="top"><a href="top"></a> </div>
        <div id="boardNav" class=" boardlist col-lg-12 text-center"> <!--  nav de boards -->
            <span>
    			[
    			<a href="#">Pokemon </a> /
    			<a href="#">Random </a> /
    			<a href="#">Tecnologia </a> /
    			<a href="#">Bimbo </a> /
    			<a href="#">Videojuegos</a> 
    			]
    		</span><br><br>
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

    <form action="UpPub.php" method="post">
        <!-- Form para subir algo al tablon -->
        <div class="form">
            <table class="form-post">
                <form id="form">
                    <tbody>
                    <tr>
                        <td class="thicc">Titulo</td>
                        <td>
                            <input class="textarea" id="titulo" type="text" size="25" maxlength="35" autocomplete="off" tabindex="1" name="titulo" required>
                            <input class="buttons" type="submit" onclick="return check();">
                        </td>
                    </tr>
                    <tr>
                        <td class="thicc">Comentario</td>
                        <td>
                            <textarea class="textarea" name="text" id="text" rows="6" cols="35" tabindex="3" required></textarea>

                            <input id="file" class="buttons" type="file" name="file" value="" accept="image/jpg, image/gif, image/png, image/jpeg">
                            <input class="buttons" type="button" name="name" value="Remover Archivo" onclick="document.getElementById('file').value = ''">
                        </td>
                    </tr>
                    </tbody>
                </form>
            </table>
        </div>
    </form>

    <div class="topb">
		<span>
			<a href="#top">[Top]</a> / <a href="Login_y_Regis/login.php">[Iniciar Sesion]</a>
		</span>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="op">
                <div id="op-header">
                    <h4>Bienvenida</h4>
                    <img class="images" src="img/dog:0.jpg" onclick="expand(this);" />
                    <p>Bienvenido a la pagina principal, puedes comentar lo que quieras ;)</p>
                </div>
            </div>
        </div>
    </div>

<?php include("connection.php"); ?>
    <?php 
        $query = "select * from TEXTO";
        $result = mysqli_query($con, $query);

    ?>

    
        
                 
                    
    <?php
        echo "<div class='col-lg-12'>"; // start a table tag in the HTML

                while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
            echo "<div class='op'>";
                echo "<p> <h4>" . $row['titulo'] . "</h4></p> <p>" . $row['texto'] . "</p>";  //$row['index'] the index here is a field name
            echo "</div>";   
                }

        echo "</div>"; //Close the table in HTML
    ?>
    
    
    <div class="topb">
        <span>
            <a href="#top">[Top]</a> <a href="reportes/rep.html">[Reports]</a>
        </span>
    </div>
</body>


</html>


<!-- Llevamos aproximadamente un 70 - 80 %, solamente nos faltaria actualizar unas correcciones de la base de datos y agregar las sesiones lo cual es relativamente rapido -->
<?php include("connection.php"); session_start();?>

<!DOCTYPE html>
<html>
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
        <div id="boardNav" class=" boardlist col-lg-12 text-center">
            <!--<span>
    			[
    			<a href="#">S</a> /
    			<a href="#">R </a> /
    			<a href="#">P </a>
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

    <?php if($_SESSION['session']){;?>
            
            <form action="UpPub.php" method="post" enctype="multipart/form-data">
                <!-- Form to upload something to the page -->
                <div class="form">
                    <table class="form-post">
                       <form id="form">
                            <tbody>
                            <tr>
                                <td class="thicc">Titulo</td>
                                <td>
                                    <input class="textarea" id="titulo" type="text" size="25" maxlength="100" autocomplete="off" tabindex="1" name="titulo" required>
                                    <input class="buttons" type="submit" onclick="return check();">
                                </td>
                            </tr>
                            <tr>
                                <td class="thicc">Comentario</td>
                                <td>
                                    <textarea class="textarea" name="text" id="text" maxlength="600" rows="6" cols="35" tabindex="3" required></textarea>

                                    <input type="hidden" name="MAX_FILE_SIZE" value="10240000">
                                    <input class="buttons" type="file" name="archivo" value="" accept="image/jpg, image/gif, image/png, image/jpeg" required>
                                    <input class="buttons" type="button" name="name" value="Remover Archivo" onclick="document.getElementById('file').value = ''">
                                </td>
                            </tr>
                            </tbody>
                        </form>
                    </table>
                </div>
            </form>
    <?php }else{echo "<h4 align=center>Para hacer publicaciones debes de estar registrado</h4>";}?>

    <div class="topb">
		<span>
            <a href="#top">[Top]</a> 
            <?php if($_SESSION['session']){?><!-- Se pone cerrar sesion si hay una sesion abierta -->
                / <a href="Login_y_Regis/CloseSession.php">[Cerrar Sesion]</a> / <a href="Login_y_Regis/modify.php">[Modificaciones]</a>

            <?php }else{ ?><!-- Se pone Login si no hay una sesion inciada -->
                / <a href="Login_y_Regis/login.php">[Iniciar Sesion]</a>
            <?php } ?>


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

    
    <?php 
        $query = "select * from `PUBLICACIONES`";
        $result = mysqli_query($con, $query);
    ?>             
                    
    <?php
        echo "<div class='col-lg-12'>"; // start a table tag in the HTML

        while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
            echo "<div class='op'>";

                echo "<p> usuario: ". $row['idUsu'] ." </p>" . "<p> <h4>" . $row['titulo'] . "</h4></p>"; 

                echo "<img class='images' onclick='expand(this);' src='" . $row['imagen'] . "'>";

                // print($row['imagen']);
                echo " <p>" . $row['texto'] . "</p>"; 

            echo "</div>";   
        }

        echo "</div>"; //Close the table in HTML
    ?>
    
    
    <div class="topb">
        <span>
            <a href="#top">[Top]</a> <a href="reportes/rep.php">[Reportes]</a> <a href="reportes/bug.php">[Bug]</a>
        </span>
    </div>

</body>


</html>


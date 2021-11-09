
<html>
<head>
  <title>Eliminando Cuenta</title>
</head>
<body>

  <link rel="stylesheet" type="text/css" href="">
  <style type="text/css">

    body {
      overflow-x: hidden;
      background-color:  #4a4a4a;

    }
    
    .text{

      height: 25px;
      border-radius: 5px;
      padding: 4px;
      border: #1b1b1b;
      border-radius: 12px;
      width: 100%;
      color: #00a693;
    }

    #button{
      background-color:#burlywood;
      color: #darkblue;
      border-radius: 10px;
    }

    #box{

      background-color: darkgrey;
      margin: auto;
      width: 400px;
      padding: 40px;
      border-radius: 12px;
    }

  </style> 

  <script type="text/javascript">

    function check () {
        titulo = document.getElementById('username').value;
        text = document.getElementById('password').value;

        if (!titulo.replace(/\s/g, '').length && !text.replace(/\s/g, '').length) {
            alert('Algo anda mal con el Usuario o Clave');
            return false;
        } else {
            return true;
        }
    }

  </script>

  <div id="box">
    
    <form method="post" action="eliminateAcc.php">
      <div style="font-size: 20px;margin: 10px;color: black;">Eliminar cuenta</div>

      <input class="text" type="text" name="username" onclick="return check();" placeholder="Nombre de Usuario" required>
      <br><br>
      <input class="text" type="password" name="password" onclick="return check();" placeholder="Contraseña" required>
      <br><br>

      <input id="button" type="submit" value="Aceptar">
      <br><br>

    </form>
  </div>
</body>
</html>

<?php 

    include("connection.php");

      if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "delete from USUARIO where username = '$username' and contra = '$password' limit 1";

        $result = mysqli_query($con, $sql) or die("Algo esta mal con los datos");

        if ($result) {
          header("Location: http://localhost/Cbtis/ProyectSubABP/");
        }
      }

?>
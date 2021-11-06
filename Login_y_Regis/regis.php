<html>
<head>
  <title>Registro</title>
</head>
<body>

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
    
    <form method="post" action="regis.php">
      <div style="font-size: 20px;margin: 10px;color: black;">Registrarse</div>

      <input class="text" type="text" name="username" required><br><br>
      <input class="text" type="password" name="password" required><br><br>

      <input id="button" type="submit" value="Aceptar" onclick="return check();"><br><br>

      <a href="login.php">Ya tengo cuenta</a><br><br>
    </form>
  </div>
</body>
</html>

<?php 
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    include("connection.php");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "insert into USUARIO (username, contra) values ('$username','$password')";
    mysqli_query($con, $query);
    header("Location: login.php");
  }

?>
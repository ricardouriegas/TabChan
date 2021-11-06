
<html>
<head>
  <title>Inicio de Sesion</title>
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
    
    <form method="post" action="login.php">
      <div style="font-size: 20px;margin: 10px;color: black;">Iniciar Sesion</div>

      <input class="text" type="text" name="username" onclick="return check();" required>
      <br><br>
      <input class="text" type="password" name="password" onclick="return check();" required>
      <br><br>

      <input id="button" type="submit" value="Aceptar">
      <br><br>

      <a href="regis.php">No tengo cuenta</a><br><br>
    </form>
  </div>
</body>
</html>

<?php 
  include("connection.php");

  if($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sqlUser = "select username from USUARIO where username = $username and contra = $password limit 1";
  $sqlContra = "select contra from USUARIO where username = $username and contra = $password limit 1";

  $resultU = mysqli_query($con, $sqlUser);
  $resultC = mysqli_query($con, $sqlContra);

  if ($resultU = $username && $resultC = $password) {
    header("Location: http://localhost/Cbtis/ProyectSubABP/");
  } else {
    echo "Algo esta mal con los datos :/";
  }

  // if(mysqli_num_rows($result)===1){
  //   $row =mysqli_fetch_assoc($result);
  //   if($row['username']== $username && $row['contra'] == $password){
  //     echo "Sesion Iniciada";
  //     $_SESSION['username'] = $row['username'];
  //     $_SESSION['id'] = $row['id'];
  //     header("Location: index.php");
  //       exit();
  //   }
  //   else{
  //       echo("Incorrect username or password");
  //       exit();
  //     }
  // }
  // else{
  //     exit();
  // }
}

//solo nos faltaria completar el login y saber porque el css falla solo con el UpPub.php

// if($_SERVER['REQUEST_METHOD'] == "POST") {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
/*
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysql_real_escape_string($username);  
    $password = mysql_real_escape_string($password); 
*/

    // include("connection.php");

    // //codigo sql
    // $query = "select * from USUARIO where username = '$username' and contra = '$password'";
    // $result = mysql_query($con, $query) or die("Algo esta mal :/");

    // if ($result) {
    //   echo "asd";
    //   //header("Location: ProyectSubABP/index.php");
    // } else {
    //   echo "Algo esta mal";
    // }
/*
    $row = mysql_fetch_array($result);

    if ($row['username'] == $username && $row['contra'] == $password) {
        echo "Se a iniciado sesion";
        //header("Location: ProyectSubABP/index.php");
      } else {
        echo "Algo esta mal :/";
      }*/



?>
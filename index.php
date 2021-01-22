<?php
require_once "classes/User.php";
require_once "classes/Session.php";
$session = Session::getSession();

if(@!$session->checkSession())header("Location:profile.php");
$errorLogin = $_GET["errorLogin"] ?? false;
$expiraSession = $_GET["expiraSession"] ?? false;
$cierraSession = $_GET["cierraSession"] ?? false;
$modificaPerfil = $_GET["modificaPerfil"] ?? false;
$email = $_POST["email"]??false;
$pass = $_POST["pass"]??false;
if($email){
$user = new User;
if($user->login($_POST["email"], $_POST["pass"])){
  $session = Session::getSession();
Session::startSession();
$session->saveDataUser($user);
header("Location:profile.php");

}else{
  header("Location:index.php?errorLogin=true");
}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    
    <form  action="index.php" method="POST" class="d-flex justify-content-center  flex-column align-items-center mt-5 p-3">
        <img src="imagenes/loginOutlaws.png" alt="imagenOutlaws">
        <div class="mb-3 w-25 ">
          <label for="email" class="form-label"></label>
          <input type="email" name='email' placeholder="introduce email" class="form-control" id="email" aria-describedby="emailHelp">
          
        </div>
        <div class="mb-3 w-25">
          <label for="pass" class="form-label "></label>
          <input type="password" name='pass' placeholder="introduce contraseña" class="form-control" id="pass">
        </div>
       
        <button type="submit" class="btn btn-danger w-25">Entrar</button>
      </form>
      <p class="d-flex justify-content-center"><?php if($errorLogin)echo"no se ha podido iniciar sesión"?></p>
      <p class="d-flex justify-content-center"><?php if($expiraSession)echo"La sesión ha expirado"?></p>
      <p class="d-flex justify-content-center"><?php if($cierraSession)echo"La sesión se ha cerrado"?></p>
      <p class="d-flex justify-content-center"><?php if($modificaPerfil)echo"Se han modificado sus datos, vuelva a iniciar sesión"?></p>
</body>
</html>
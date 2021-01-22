<?php
require_once '../classes/Session.php';
require_once '../classes/User.php';
require_once '../classes/Mensaje.php';

$session = Session::getSession();
$salir = $_GET["salir"]??false;

if($session->checkSession())header("Location:../index.php?expiraSession=true");

//datos usuario
$dataUser = $session->getDataUser();
$msg = new Mensaje();

// enviar email
$pass1 = $_POST["pass"] ?? 0;
$pass2 = $_POST["pass2"] ?? 1;


    if(!empty($_POST)) {
        if($pass1 == $pass2){
        $user = new User;
        var_dump($_POST["email"], $_POST["nombre"], $_POST["apellidos"], $_POST["pass"]);
        if($user->updateUser($_POST["email"], $_POST["nombre"], $_POST["apellidos"], $_POST["pass"]))header("Location:../closeSession.php?modificaPerfil=true");
        echo "Error : no se ha podido modificar el perfil";
    }else {
        echo "<p class='d-flex justify-content-center font-weight-bold text-danger '>las contraseñas no coinciden </p>";
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
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js"></script>
</head>
<body>
<div class="d-flex justify-space-between">  

<div class="d-flex justify-content-center  flex-column w-25 h-25 align-items-center" >
    <img src="../imagenes/<?=$dataUser->getFoto()?>" alt="foto" class="p-3 w-75" > 
    <h3 class="">Outlaws Mail</h3>
    <p>Bienvenido/a <?=$dataUser->getNombre()?></p>
    <p><?=$dataUser->getApellidos()?></p>
    <p><?=$dataUser->getEmail()?></p>
    <div class="d-flex justify-content-center  flex-column w-50 h-25 align-items-center" >
    <a href="../enviarEmail/enviarEmail.php" type="button" class="btn btn-danger w-100 mt-3">Enviar Email</a>
    <a href="../profile.php" type="button" class="btn btn-warning w-100 mt-3">Mensajes</a>
    <a href="../closeSession.php" type="button" class="btn btn-dark w-100 mt-3">Salir</a>
    </div>
    
    
    </div> 
    <form class="w-100 d-flex  flex-column " id="form" action="perfilUsuario.php" method="POST" >
    <h2>Perfil de Usuario</h2>
  <div class="mb-3 ">
    <label for="email" class="form-email">Email:</label>
    <input type="email" placeholder="dirección de email" value="<?=$dataUser->getEmail()?>" readonly class="form-control" id="email" name="email" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>
  <div class="mb-3">
    <label for="apellidos" class="form-label">Apellidos:</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos">
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Nueva Contraseña:</label>
    <input type="password" class="form-control" id="pass" name="pass">
  </div>
  <div class="mb-3">
    <label for="pass2" class="form-label">Repite Contraseña:</label>
    <input type="password" class="form-control" id="pass2" name="pass2">
  </div>
 
<div class="d-flex  justify-content-end w-100" >
  <button form="form" type="submit" class="btn btn-info m-2 w-25 ">enviar</button>
  <a href="../profile.php" type="button" class="btn btn-dark  w-25 m-2 ">cancelar</a>
  </div>
</form>
</div>
    <?php


    ?>
  
      </div>

    

</body>
</html>




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

if(!empty($_POST)) {
    $email = new Mensaje;
    if($email->sendEmail($dataUser->getIdUsu(), $_POST["email"], $_POST["asunto"], $_POST["texto"]))header("Location:../profile.php");
    echo "no se ha podido enviar el mensaje";
}
$respondeUsuario = new User;
$emailUser = $respondeUsuario->getEmailUser($_GET["idOri"]);
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
    <button type="button" class="btn btn-danger w-100 mt-3">Enviar Email</button>
    <a href="../perfilUsuario/perfilUsuario.php" type="button" class="btn btn-info w-100 mt-3">Perfil</a >
    <a href="../closeSession.php" type="button" class="btn btn-dark w-100 mt-3">Salir</a>
    </div>
    
    
    </div> 
    <form class="w-100 d-flex  flex-column " id="form" action="responder.php" method="POST" >
    <h2>Redactar nuevo email</h2>
  <div class="mb-3 ">
    <label for="email" class="form-email">Para:</label>
    <input type="email" placeholder="dirección de email" value="<?=$emailUser?>" readonly class="form-control" id="email" name="email" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="asunto" class="form-label">Asunto:</label>
    <input type="text" class="form-control" id="asunto" name="asunto">
  </div>
  <div class="form-floating">
  <textarea class="form-control " style="height:50vh"placeholder="Leave a comment here" id="texto" name="texto" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Mensaje</label>
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




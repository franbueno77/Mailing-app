<?php
require_once '../classes/Session.php';
require_once '../classes/User.php';
require_once '../classes/Mensaje.php';
$msgType =$_GET["msgType"] ?? false;
$session = Session::getSession();
$salir = $_GET["salir"]??false;
$msgEnviado = $_GET["msgEnviado"] ?? "";
if($session->checkSession())header("Location:index.php?expiraSession=true");


$dataUser = $session->getDataUser();
$idMen = $_GET["idMen"] ?? 0;

if($idMen) {


    $msg = new Mensaje();
    $msg->mensajeLeido($idMen);
    if(!$msgEnviado){
        // mensajes recibidos
        $leerMensaje = $msg->leerMensaje($idMen);
    }else{
        // mensajes enviados
        $leerMensaje = $msg->leerMensaje($idMen, true);
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
    <a href="enviarEmail/enviarEmail.php" type="button" class="btn btn-danger w-100 mt-3">Enviar Email</a>
    <a href="perfilUsuario/perfilUsuario.php" type="button" class="btn btn-info w-100 mt-3">Perfil</a >
    <a href="closeSession.php" type="button" class="btn btn-dark w-100 mt-3">Salir</a>
    </div>
    
    </div> 
    
    <div class="d-flex justify-content-center  flex-column w-100 h-25 align-items-center" >  
    <p class="w-25 d-flex justify-content-around" >

    
    
   <?php
   if($msgEnviado){
       ?>
    <div class="alert alert-warning w-100" role="alert">
    <p>mensaje para : <?=$msg->getNombreOri()?> </p>
    <p>Asunto : <?=$msg->getAsunto()?></p>
    <p><?=$msg->getFecha()?></p>

    <?php
   }else{
    ?> 

    <div class="alert alert-success w-100" role="alert">
    <p>mensaje enviado por : <?=$msg->getNombreOri()?> </p>
    <p>Asunto : <?=$msg->getAsunto()?></p>
    <p><?=$msg->getFecha()?></p>

    <?php
   }
   ?>
    
</div>
<div class="form-floating">
  <textarea class="form-control " readonly style="height:50vh;width:80vw" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?=$msg->getTexto()?></textarea>
  
</div>
<div class="d-flex  justify-content-end w-100" >
<?php
if(!$msgEnviado){
    ?>

  <a href="../enviarEmail/enviarEmail.php?idOri=<?=$msg->getIdOri()?>" type="submit" class="btn btn-info m-2 w-25 ">Responder</a>
 

  <?php
}
  ?>
    <a href="../profile.php" type="button" class="btn btn-dark  w-25 m-2 ">volver</a>
  </div>
    
    

  
      </div>
      
    

</body>
</html>




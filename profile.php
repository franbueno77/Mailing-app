<?php
require_once 'classes/Session.php';
require_once 'classes/User.php';
require_once 'classes/Mensaje.php';
require_once 'classes/Etiqueta.php';
$msgType =$_GET["msgType"] ?? false;
$session = Session::getSession();
$salir = $_GET["salir"]??false;

if($session->checkSession())header("Location:index.php?expiraSession=true");


$dataUser = $session->getDataUser();
$msg = new Mensaje();


$dataMsgR = $msg->mensajesRecibidos($dataUser->getIdUsu());
$dataMsgE = $msg->mensajesEnviados($dataUser->getIdUsu());



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
    <img src="imagenes/<?=$dataUser->getFoto()?>" alt="foto" class="p-3 w-75" > 
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

    <a href="profile.php?msgType=0" style="<?php if(!$msgType)echo "pointer-events: none; text-decoration: none;color:black ";
    else{echo "pointer-events: auto; text-decoration: underline;color:blue ";
    }?>">mensajes recibidos</a>

    <a href="profile.php?msgType=true"  style="<?php if($msgType)echo "pointer-events: none; text-decoration: none;color:black ";
    else{echo "pointer-events: auto; text-decoration: underline;color:blue ";
    }?>">mensajes enviados</a></p>
    
    <?php
    if(!$msgType){ 
    foreach($dataMsgR as $rMsg){
        $tag = new Etiqueta;
$tag->mostrarEtiqueta($rMsg->getIdMen());
        ?>
        
        
        
        <div class="alert alert-<?php if($rMsg->getLeido()){
            echo "danger";
            }else{
                echo "secondary";
            }
            ?> w-100" role="alert">
      <p>mensaje de <?=$rMsg->getNombreOri()."  ".$rMsg->getFecha()?> </p>
      <p class="d-flex justify-content-between"><span>asunto: <a href="leerMensaje/leermensaje.php?idMen=<?=$rMsg->getIdMen()?>"><?=$rMsg->getAsunto()?></a>
      
      <span class="badge" style="background-color:<?=$tag->getColor()?>"><?=$tag->getEtiqueta()?></span>
      </span>
       <a href="delete/deleteMensaje.php?delete=<?=$rMsg->getIdMen()?>">
       <i class="fas fa-trash px-3"></i></a></p>
      
    </div>
<?php
    }
}else{

    foreach($dataMsgE as $eMsg){
        $tag = new Etiqueta;
        $tag->mostrarEtiqueta($eMsg->getIdMen());
        ?>
  
        <div class="alert alert-danger w-100" role="alert">
      <p>mensaje para <?=$eMsg->getNombreOri()."  ".$eMsg->getFecha()?> </p>
      <p class="d-flex justify-content-between"><span>asunto: <a href="leerMensaje/leerMensaje.php?msgEnviado=true&idMen=<?=$eMsg->getIdMen()?>"><?=$eMsg->getAsunto()?></a>
      
      <span class="badge" style="background-color:<?=$tag->getColor()?>"><?=$tag->getEtiqueta()?></span>
      </span> <a href="delete/deleteMensaje.php?delete=<?=$eMsg->getIdMen()?>&msgType=true"> <i class="fas fa-trash px-3"></i></a></p>

      
    </div>
<?php
    }
}
    ?>
  
      </div>

    

</body>
</html>




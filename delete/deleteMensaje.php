<?php
require_once "../classes/Mensaje.php";
$msg = new Mensaje();
$msg->deleteMensaje($_GET["delete"]);
$msgType = $_GET['msgType']??0;
header("Location:../profile.php?msgType=$msgType");
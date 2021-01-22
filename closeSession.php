<?php
require_once 'classes/Session.php';
$session = Session::getSession();
$session->closeSession();
$modificaPerfil =$_GET["modificaPerfil"]??0;
header("Location:index.php?cierraSession=true&modificaPerfil=$modificaPerfil");
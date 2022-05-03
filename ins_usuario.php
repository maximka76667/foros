<?php

session_start();
  extract($_POST);
  $isError = false;

  if(!isset($correo) || $correo == null 
  || !isset($nick) || $nick == null
  || !isset($clave) || $clave == null
  || !isset($nforos) || $nforos == null) {
    $isError = true;
    die("Rellena todas las filas obligatorias");
  }

  if(strlen($nick) < 3 || strlen($nick) > 20) {
    $isError = true;
  }

  if(strlen($correo) < 5 || strlen($correo) > 320 || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $isError = true;
    die("Correo electrónico inválido");
  }

  if(strlen($clave) < 5 || strlen($clave) > 20) {
    $isError = true;
    die("Clave inválido");
  }

  if($clave !== $repe_clave) {
    $isError = true;
    die("Clave y repetir clave deben ser iguales");
  }

  if(!is_integer($nforos)) {
    $isError = true;
    die("NForos deben ser solo digitos");
  }

  if(!$isError) {
    $connection = mysqli_connect("localhost", "root", "root", "session2") or die("Connection error: " . mysqli_connect_error());
    $query = "INSERT INTO `usuarios` VALUES('$nick', sha1('$clave'), '$correo', $nforos";
    $result = mysqli_query($connection, $query) or die("Query error: " . mysqli_error($connection));;
    $_SESSION['email'] = $correo;
    $_SESSION['nick'] = $nick;
    header("location:index.php");
  }
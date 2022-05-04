<?php

  session_start();
  extract($_POST);
  $isError = false;

  if(!isset($nick) || $nick == null
  || !isset($clave) || $clave == null) {
    $isError = true;
    die("Rellena todas las filas obligatorias");
  }

  if(!$isError) {
    $connection = mysqli_connect("localhost", "root", "root", "sesiones2") or die("Connection error: " . mysqli_connect_error());
    $query = "SELECT * FROM `usuarios` WHERE `nick` = '$nick' AND `clave` = sha1('$clave')";
    $result = mysqli_query($connection, $query) or die("Query error: " . mysqli_error($connection));
    if($result && mysqli_num_rows($result) == 1) {
      $_SESSION['nick'] = $nick;
      $fetch = mysqli_fetch_array($result);
      $_SESSION['correo'] = $fetch['correo'];
    }
    header("location:index.php");
  }
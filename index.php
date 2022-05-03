<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
</head>
<body>
  <header class="header">
    <?php
      session_start();
      if(isset($_SESSION['correo'])) {
        echo "
          <span>" . $_SESSION['nick'] . "</span>
          <button>Cerrar sessión</button>";
      } else {
        "<form></form";
      }
    ?>

    <h1>Foros Informatica</h1>
  </header>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header">
    <?php
      session_start();
      if(isset($_SESSION['correo'])) {
        echo "
          <form method='POST' action='logout.php'>
            <span>" . $_SESSION['nick'] . "</span>
            <button class='logout__submit-button'>Cerrar sessión</button>
          </form>
          ";
      } else {
        echo "<form method='POST' action='login.php' class='login'>
          <table>
            <tr>
              <td>
                <input class='login__input' name='nick' maxlength='20' placeholder='Nickname' />
              </td>
              <td rowspan='2'>
                <button class='login__submit-button' type='submit'>Entrar</button>
              </td>
            </tr>
            <tr>
              <td>
                <input class='login__input' name='clave' maxlength='20' placeholder='Password' />
              </td>
            </tr>
            <tr>
              <td colspan='2'>
                <a class='login__register-link' href='registro.html'>Registrarse</a>
              </td>
            </tr>
          </table>
        </form>";
      }
    ?>

    <h1>Foros Informatica</h1>
  </header>
  <main>
    <table class="foros">
      <tr class="foros__tr">
        <th class="foros__th">Nombre del Foro</th>
        <th class="foros__th">Mensajes</th>
        <th class="foros__th">Último mensaje</th>
      </tr>
      <tr class="foros__tr">
        <td class="foros__td">Nombre</td>
        <td class="foros__td">Mensajes</td>
        <td class="foros__td">Ultimo</td>
      </tr>
    </table>
  </main>
</body>
</html>
<!doctype html>
<html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Becap - Becas según tu perfil académico</title>
        
        <meta name="description" content="La forma más sencilla de encontrar BECAS. Becas académicas según tu perfil">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/b.png">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/animate.css">
        <script src="js/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body>

      <script> 
              function revisar() { 
              if(formulario.nombre == "") { alert('Debes poner el nombre') ; return false ; } 
              if(formulario.pais == "") { alert('Debes poner el país') ; return false ; } 
              if(formulario.email == "") { alert('Debes poner el email') ; return false ; } 
              } 
      </script> 

      <form name="formulario" method="post" action="" onsubmit="return revisar()"> 
      Nombre:<br> 
      <input type="text" name="nombre" required><br> 
      País:<br> 
      <input type="text" name="pais" required><br> 
      Email:<br> 
      <input type="text" name="edad" required><br><br> 
      <input type="submit" value="Enviar"> 
      </form> 
       

      <script>window.jQuery || document.write('<script src="vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <script src="js/bootstrap-notify.js"></script>
      <script>
        $.notify('Enter: Fade In and DownExit: Fade Out and Up');
      </script>
    </body>
</html>

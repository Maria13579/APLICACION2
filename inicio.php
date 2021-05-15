<?php
 session_start();
 require 'datausuario.php';

 if(!empty($_POST['usuario'] ) && !empty($_POST['contrasela']))
 {
     $records = $conect->prepare('SELECT usuario, contraseña FROM datos WHERE usuario=:usuario' );
     $records -> bindParam(':usuario', $_POST['usuario']);
     $records ->execute();
     $results = $records->fetch(PDO::FETCH_ASSOC);

     $message = '';

     if(count($results)>0 && password_verify($_POST['contraseña'], $results['password'])){
         $_SESSION['datos_usuario'] = $results['usuario'];
         header("Location:inventario.php");
     }
     else{
         $message = 'Usuario o Contraseña incorrecto';
     }
 }

?>
<html>
    <head>
      <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">     
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

     <title>Inicio Sesion</title>
    </head>
    <body>
        <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
        <?php endif; ?>
        <div class="card-panel teal lighten-2 "><h1 class="center-align">Inicie Sesion</h1> </div>
        <br/><br/>
            <div align = "center">
                <form action="inicio.php" method="post">
                    <input class ="left" type="text" name="usuario" placeholder="Ingrese su Usuario">   
                    <br/><br/>
                    <input type="password" name="contraseña" placeholder="Ingrese su Contraseña">
                    <br/><br/>
                    <input class="waves-effect waves-light btn " type= "submit" value="Ingresar">
                </form>
         </div>
      
    

       <script type="text/javascript" src ="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    </body>


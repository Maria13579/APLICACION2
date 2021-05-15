<?php
 require 'datausuario.php';

 $message='';

 if(!empty($_POST['usuario']) && !empty($_POST['contraseña']))
 {
     $sql = "INSERT INTO datos (usuario, contraseña) VALUES (:usuario, :contraseña)";
     $stmt= $conect->prepare($sql);
     $stmt->bindParam(':usuario', $_POST['usuario']);
     $password = password_hash($_POST['contraseña'] , PASSWORD_BCRYPT);
     $stmt->bindParam(':contraseña', $password);
     
     if($stmt->execute())
     {
         $message='Usuario creado correctamente';
     }
     else{
         $message ='lo siento el usuario no se pudo crear';
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
     <title>Registrarse</title>
 </head>
 <body>
 <?php if(!empty($message)): ?>
  <p><?= $message   ?></p>
  <?php endif;   ?>
  
 <div class="card-panel teal lighten-2 "><h1 class="center-align">Registrarse</h1><div class ="center"><span> o <a href="inicio.php">Inicio</a> </div> </div>
   
    <br/><br/>
    <div align = "center">
      <form action="registarse.php" method="post">
         <input class ="left" type="text" name="usuario" placeholder="Ingrese su Usuario">   
         <br/><br/>
         <input type="password" name="contraseña" placeholder="Ingrese su Contraseña">
         <br/><br/>
         <input type="password" name="confir_contraseña" placeholder="Ingrese su Contraseña">
         <br/><br/>
         <input class="waves-effect waves-light btn " type= "submit" value="Enviar">
      </form>
   </div>
        <script type="text/javascript" src ="https://code.jquery.com/jquery-2.1.1.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
 </body>
 </html>


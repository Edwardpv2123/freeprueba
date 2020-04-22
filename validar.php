<?php
include 'cn.php';
//Recibe y almacena en variables
$correo = $_POST['correo'];
$clave = $_POST['pass1'];
//CONSULTA PARA INSERTAR
$insertar = "INSERT INTO usuarios(correo, clave) VALUES ('$correo', '$clave')";

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
if(mysqli_num_rows($verificar_correo)>0){
    echo '<script>
          alert("CORREO YA REGISTRADO INTENTELO DE NUEVO");
          window.history.go(-1);
          </script>';
          
    exit;
}

//Ejecuta Consulta
$resultado = mysqli_query($conexion, $insertar);
if(!$resultado) {
    echo '<script>
          alert("ERROR AL REGISTRARSE INTENTELO DE NUEVO");
          window.history.go(-1);
          </script>';
} else{
    echo header("location:inicio.html");
         '<script>
          alert("REGISTRADO EXITOSAMENTE");
          </script>';
    
}
//Cierra Conexion
mysqli_close($conexion);


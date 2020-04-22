<?php
include 'cn.php';

$correo=$_POST['correo'];
$clave=$_POST['clave'];


$consulta="SELECT * FROM usuarios WHERE correo='$correo' and clave='$clave'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
if($filas>0){
    echo header("location:inicio.html");
}
else {
    echo '<script>
          alert("ERROR AL INGRESAR INTENTELO DE NUEVO");
          window.history.go(-1);
          </script>';
}
mysqli_free_result($resultado);
mysqli_close($conexion);
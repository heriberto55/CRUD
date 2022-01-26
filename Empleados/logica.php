<?php
//print_r($POST);

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellidoPaterno=(isset($_POST['txtApellidoPaterno']))?$_POST['txtApellidoPaterno']:"";
$txtApellidoMaterno=(isset($_POST['txtApellidoMaterno']))?$_POST['txtApellidoMaterno']:"";
$txtTelefono=(isset($_POST['txtTelefono']))?$_POST['txtTelefono']:"";
$txtDepartamento=(isset($_POST['txtDepartamento']))?$_POST['txtDepartamento']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";


$error=array();

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;


include ("../Conexion/conexion.php");

switch($accion){
    case "btnAgregar":

      
        $sentencia=$pdo->prepare("INSERT INTO empleados(Nombre,ApellidoPaterno,ApellidoMaterno,Telefono,Departamento,Correo)
        VALUES (:Nombre,:ApellidoPaterno,:ApellidoMaterno,:Telefono,:Departamento,:Correo)");

        $sentencia->bindParam(':Nombre',$txtNombre);
        $sentencia->bindParam(':ApellidoPaterno',$txtApellidoPaterno);
        $sentencia->bindParam(':ApellidoMaterno',$txtApellidoMaterno);
        $sentencia->bindParam(':Telefono',$txtTelefono);
        $sentencia->bindParam(':Departamento',$txtDepartamento);
        $sentencia->bindParam(':Correo',$txtCorreo);
        $sentencia->execute();

        echo $txtID;
        echo"";
        header('Location: index.php');
        break;
        
 case "btnModificar":

            $sentencia=$pdo->prepare(" UPDATE empleados SET 
            Nombre=:Nombre,
            ApellidoPaterno=:ApellidoPaterno,
            ApellidoMaterno=:ApellidoMaterno,
            Telefono=:Telefono,
            Departamento=:Departamento,
            Correo=:Correo WHERE
            id=:id");
    
            $sentencia->bindParam(':Nombre',$txtNombre);
            $sentencia->bindParam(':ApellidoPaterno',$txtApellidoPaterno);
            $sentencia->bindParam(':ApellidoMaterno',$txtApellidoMaterno);
            $sentencia->bindParam(':Telefono',$txtTelefono);
            $sentencia->bindParam(':Departamento',$txtDepartamento);
            $sentencia->bindParam(':Correo',$txtCorreo);
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();

            header('Location: index.php');

            echo $txtID;
            echo "Presionaste btnModificar";
         break;
 case "btnEliminar":

            $sentencia=$pdo->prepare(" DELETE FROM empleados WHERE id=:id");    
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
            header('Location: index.php');

            echo $txtID;
            echo "Presionaste btnEliminar";
         break;

case "btnCancelar":
            header('Location: index.php');
            echo $txtID;
            echo "Presionaste btnCancelar";
            break;

        case "Seleccionar":
            $accionAgregar="disabled";
            $accionModificar=$accionEliminar=$accionCancelar="";
            $mostrarModal=true;
            $sentencia=$pdo->prepare(" SELECT * FROM empleados WHERE id=:id");    
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
            $empleado=$sentencia->fetch(PDO::FETCH_LAZY);

            $txtNombre=$empleado['Nombre'];
            $txtApellidoPaterno=$empleado['ApellidoPaterno'];
            $txtApellidoMaterno=$empleado['ApellidoMaterno'];
            $txtTelefono=$empleado['Telefono'];
            $txtDepartamento=$empleado['Departamento'];
            $txtCorreo=$empleado['Correo'];


            break;
}

$sentencia= $pdo->prepare("SELECT * FROM `empleados` WHERE 1");
$sentencia->execute();
$listaEmpleados=$sentencia->fetchALL(PDO::FETCH_ASSOC);

//print_r($listaEmpleados);


?>


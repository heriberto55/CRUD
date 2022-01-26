<?php
 require 'logica.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="css/style.php">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>


</head>
<body>
<h1>Sistema CRUD</h1>
    <div class="container"></div>
    <form action="" method="post"  enctype="multipart/form-data">



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <input type="hidden" name="txtID" required value="<?php echo $txtID;?>"placeholder="" id="txt1" require="">
        
<div class="form-group col-md-12">
 <laber>Nombre(s):</laber>
 <input type="text" class="form-control" name="txtNombre" required value="<?php echo $txtNombre;?>" placeholder="" id="txtNombre" require="">
 <br>
</div>
<div class="form-group col-md-6">
 <laber>Apellido Paterno:</laber>
 <input type="text"class="form-control" name="txtApellidoPaterno" required value="<?php echo $txtApellidoPaterno;?>"placeholder="" id="txtApellidoPaterno" require="">
 <br>
</div>
 <div class="form-group col-md-6">
 <laber>Apellido Materno:</laber>
 <input type="text"class="form-control" name="txtApellidoMaterno" required value="<?php echo $txtApellidoMaterno;?>"placeholder="" id="txtApellidoMaterno" require="">
 <br>
 </div>
 <laber>Telefono:</laber>
 <input type="text" class="form-control" name="txtTelefono" required value="<?php echo $txtTelefono;?>"placeholder="" id="txtTelefono" require="">
 <br>

 <laber>Departamento:</laber>
 <input type="text" class="form-control" name="txtDepartamento" required value="<?php echo $txtDepartamento;?>" placeholder="" id="txtDepartamento" require="">
 <br>

 <laber>Correo:</laber>
 <input type="email" class="form-control" name="txtCorreo" required value="<?php echo $txtCorreo;?>" placeholder="" id="txtCorreo" require="">
 <br>

      </div>
      </div>
      <div class="modal-footer">
      <button value="btnAgregar" <?php echo $accionAgregar;?> class="btn btn-success" type="submit" name="accion">Agregar</button>
    <button value="btnModificar"  <?php echo $accionModificar;?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
    <button value="btnEliminar"  onclick="return Confirmar('¿Realmente deseas Borar?');" <?php echo $accionEliminar;?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
    <button value="btnCancelar"  <?php echo $accionCancelar;?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<br/>
<br/>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Registro +
</button>
<br>
<br>
</form>

<div class="row">
    <table class="table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
             <th>Nombre Completo</th>
             <th>Departamento</th>
             <th>Telefono</th>
             <th>Correo</th>
             <th>Accciones</th>
            </tr>
        </thead> 
<?php foreach($listaEmpleados as $empleado){ ?>

    <tr>
        <td><?php echo $empleado['Nombre']; ?> <?php echo $empleado['ApellidoPaterno']; ?> <?php echo $empleado['ApellidoMaterno']; ?></td>
        <td><?php echo $empleado['Departamento']; ?></td>
        <td><?php echo $empleado['Telefono']; ?></td>
        <td><?php echo $empleado['Correo']; ?></td>
        <td>
            
        <form action="" method="post">

        <input type="hidden" name="txtID" value="<?php echo $empleado['ID']; ?>">
        <input type="submit" value="Seleccionar" class="btn btn-info"name="accion">
        <button value="btnEliminar" onclick="return Confirmar('¿Realmente deseas Borar?');" type="submit"  class="btn btn-danger" name="accion">Eliminar</button>
        </form>
    </td>
    
    </tr>

<?php } ?>


</table>

</div>
<?php if($mostrarModal){?>
    <script>
        $('#exampleModal').modal('show');
    </script>
<?php } ?>
<script>
   function Confirmar(Mensaje){
 return (confirm(Mensaje))?true:false;
   } 
   </script>
</div>
</body>
</html>
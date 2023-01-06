<!DOCTYPE html>
<?php

session_start();

if($_SESSION['cuenta']){

}else{
	header("Location:index.php");
}

?>
<html lang="en">



<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PANEL | ADMIN</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<?php
	header('Access-Control-Allow-Origin: *');

	$curl = curl_init(); //inicia la sesión cURL
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://192.168.1.73:8080/ServidorRESTBanco/webresources/Aplicacion/listarUsuarios", //url a la que se conecta
		CURLOPT_RETURNTRANSFER => true, //devuelve el resultado como una cadena del tipo curl_exec
		CURLOPT_FOLLOWLOCATION => true, //sigue el encabezado que le envíe el servidor
		CURLOPT_ENCODING => "", // permite decodificar la respuesta y puede ser"identity", "deflate", y "gzip", si está vacío recibe todos los disponibles.
		CURLOPT_MAXREDIRS => 10, // Si usamos CURLOPT_FOLLOWLOCATION le dice el máximo de encabezados a seguir
		CURLOPT_TIMEOUT => 30, // Tiempo máximo para ejecutar
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, // usa la versión declarada
		CURLOPT_CUSTOMREQUEST => "GET", // el tipo de petición, puede ser PUT, POST, GET o Delete dependiendo del servicio
	)); //curl_setopt_array configura las opciones para una transferencia cURL

	$response = curl_exec($curl); // respuesta generada
	$err = curl_error($curl); // muestra errores en caso de existir

	curl_close($curl);
	$objeto = null;


	if ($err) {
		echo "cURL Error #:" . $err; // mostramos el error

	} else {
		$objeto = json_decode($response, true);
	}

	?>


<body>
	<div class="container" style="background-color: #EBEBEB;">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row" style="background-color: #01d28e;">
					<div class="col-sm-6">
						<h2>Clientes | <b>Banco El Confianzas</b></h2>
					</div>
					<div class="col-sm-6 m-3" style="margin-top: 15px;">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar nuevo cliente</span></a>
						<a href="cerrarSesion.php" class="btn btn-danger"><i class="material-icons">&#xE15A;</i> <span>Cerrar sesion</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Rol</th>
						<th>Usuario</th>
						<th>Estado</th>
						<th>Núm. Cuenta</th>
						<th>NIP</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$estado = "";
					foreach ($objeto as $index => $usuario) {
						if ($usuario["estado"] == "1") {
							$estado = "ACTIVO";
						} else {
							$estado = "BAJA";
						}
					?>
						<tr>

							<td><?php echo $usuario["nombre"] ?></td>
							<td><?php echo $usuario["apellido_paterno"] ?></td>
							<td><?php echo $usuario["apellido_materno"] ?></td>
							<td><?php echo $usuario["rol"] ?></td>
							<td><?php echo $usuario["username"] ?></td>
							<td><?php echo $estado ?></td>
							<td id="cuenta"><?php echo $usuario["numero_cuenta"] ?></td>
							<td><?php echo $usuario["nip"] ?></td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="editar()"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Register Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="registrar.php" method="GET">
					<div class="modal-header">
						<h4 class="modal-title">Agregar nuevo cliente</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" class="form-control" placeholder="Ingrese el nombre" required id="nombreR" name="nombreR">
						</div>
						<div class="form-group">
							<label>Apellido Paterno</label>
							<input type="text" class="form-control" placeholder="Ingrese los apellidos" required id="apellido_paternoR" name="apellido_paternoR">
						</div>
						<div class="form-group">
							<label>Apellido Materno</label>
							<input type="text" class="form-control" placeholder="Ingrese los apellidos" required id="apellido_maternoR" name="apellido_maternoR">
						</div>
						<div class="form-group">
							<label>Nombre de usuario</label>
							<input type="text" class="form-control" placeholder="Registre un nombre de usuario" required id="usernameR" name="usernameR">
						</div>
						<div class="form-group">
							<label>NIP</label>
							<input type="number" class="form-control" placeholder="Ingrese el NIP" required id="nipR" name="nipR">
						</div>
						<div class="form-group">
							<label>Seleccione el rol</label>
							<select name="rolR" id="rolR" class="form-control">
								<option value="Cliente">Cliente</option>
							</select>
						</div>
						<div class="form-group">
							<label>Numero de cuenta</label>
							<input type="number" class="form-control" placeholder="556789344" required id="numero_cuentaR" name="numero_cuentaR" maxlength="9">
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cacelar">
						<input type="submit" class="btn btn-success" value="Registrar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="update.php" method="GET">
					<div class="modal-header">
						<h4 class="modal-title">Actualizar información del cliente</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" class="form-control" placeholder="Ingrese el nombre" required id="nombre" name="nombre">
						</div>
						<div class="form-group">
							<label>Apellido Paterno</label>
							<input type="text" class="form-control" placeholder="Ingrese los apellidos" required id="apellido_paterno" name="apellido_paterno">
						</div>

						<div class="form-group">
							<label>Apellido Materno</label>
							<input type="text" class="form-control" placeholder="Ingrese su apellido materno" required name="apellido_materno" id="apellido_materno">
						</div>

						<div class="form-group">
							<label>Nombre de usuario</label>
							<input type="text" class="form-control" placeholder="Registre un nombre de usuario" required id="username" name="username">
						</div>
						<div class="form-group">
							<label>Número de cuenta</label>
							<input type="text" class="form-control" placeholder="34565789" readonly name="numero_cuenta" id="numero_cuenta">
						</div>
						<div class="form-group">
							<label>NIP</label>
							<input type="number" class="form-control" placeholder="Ingrese el NIP" required id="nip" name="nip">
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cacelar">
						<input type="submit" class="btn btn-success" value="Actualizar">
					</div>
				</form>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">BAJA DEL USUARIO</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>¿Estas seguro que deseas dar de baja a este usuario?</p>
						<p class="text-warning"><small>Esta acción se puede revertir despues.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="CANCELAR">
						<input type="submit" class="btn btn-danger" value="BAJA">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$("table tbody tr").click(function() {
		var nombre = $(this).find("td:eq(0)").text();
		var apellido_paterno = $(this).find("td:eq(1)").text();
		var apellido_materno = $(this).find("td:eq(2)").text();
		var username = $(this).find("td:eq(4)").text();
		var numero_cuenta = $(this).find("td:eq(6)").text();
		var nip = $(this).find("td:eq(7)").text();
		
		document.getElementById("nombre").value = nombre;
		document.getElementById("apellido_paterno").value = apellido_paterno;
		document.getElementById("apellido_materno").value = apellido_materno;
		document.getElementById("username").value = username;
		document.getElementById("numero_cuenta").value = numero_cuenta;
		document.getElementById("nip").value = nip;
	});
</script>

</html>
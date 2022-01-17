<!doctype html>
<html lang="en">

<head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="./../../assets/css/slate-bootstrap.min.css">
</head>

<body>
	<div class="contanier-fluid">
		<div class="container">
			<br>
			<div class="row table-responsive">
				<form id="add_data" action="" method="post">
					<table class="table table-sm">
						<tbody>
							<tr class="text-center">
								<th>Reporte</th>
								<th>Fecha Inicio</th>
								<th>Fecha Termino</th>
								<th>Campaña</th>
							</tr>
							<tr>
								<td>
									<input class="form-control" type="text" name="reporte" id="reporte">
								</td>
								<td>
									<input class="form-control" type="date" name="fecha_inicio" id="fecha_inicio">
								</td>
								<td>
									<input class="form-control" type="date" name="fecha_temino" id="fecha_termino">
								</td>
								<td>
									<input class="form-control" type="text" name="campania" id="campania">
								</td>
							</tr>
							<tr class="text-center">
								<th>Grupo</th>
								<th>Prefijo</th>
								<th>Tipo</th>
								<th>Consumo</th>
							</tr>
							<tr>
								<td>
									<input class="form-control" type="text" name="grupo" id="grupo">
								</td>
								<td>
									<input class="form-control" type="text" name="prefijo" id="prefijo">
								</td>
								<td>
									<input class="form-control" type="text" name="tipo" id="tipo">
								</td>
								<td>
									<input class="form-control" type="text" name="consumo" id="consumo">
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr class="text-center">
								<td colspan="4">
									<input type="button" value="agregar" id="agregar" class="btn btn-secondary btn-lg">
								</td>
							</tr>
						</tfoot>
					</table>
				</form>
			</div>
			<hr>
			<div id="resultado" class="bg-secondary" style="height: 500px;">

			</div>
		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		/**Obtener datos telefonía*/
		$('#agregar').click(function() {
			$.ajax({
				url: '../clases/add_miss_data.php',
				type: 'POST',
				data: $('#add_data').serialize(),
				beforeSend: function() {
					$("#resultado").html("<div style='text-align:center;'><samp>Calculando registros consumidos...</samp><br><img src='../../img/gif/ajax-loader.gif'></div>");
				},
				success: function(res) {
					$('#resultado').html(res);
				}
			});
		});
	</script>
</body>

</html>



<?php
// require '../clases/conexion.php';

// $conexion = conexion_db_local("Telefonia","127.0.0.1");

// $reporte= $_POST[''];
// $fecha_inicio= $_POST[''];
// $fecha_termino= $_POST[''];
// $campania= $_POST[''];
// $grupo= $_POST[''];
// $prefijo= $_POST[''];
// $tipo= $_POST[''];
// $consumo= $_POST[''];


/*INSERT INTO `reporte_telefonia`
    (`id_consumo`, `reporte`, `fecha_inicio`, `fecha_termino`, `campania`, `grupo`, `prefijo`, `tipo`, `consumo`, `fecha_registro`)
VALUES (NULL, '10.9.2.35', '2021-11-01 00:00:00', '2021-11-01 23:59:59', '0001', 'HSBC-SEGUROS', '15', 'movil', '26', current_timestamp()); */





?>
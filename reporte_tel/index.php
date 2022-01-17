<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="Edgar Dueñas" content="telefonia">
	<meta name="keyword" content="">
	<!-- Favicons -->
	<link rel="shortcut icon" href="../img/favicon/calendar.ico" type="image/x-icon">
	<title>Telefonia</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<style>
		#resultado {
			height: 780px;
			/*background: rgb(112, 128, 144,0.2);*/
			overflow-y: scroll;
		}
	</style>
	<script type="text/javascript">
		function addData(URL) {
		    window.open("http://127.0.0.1/definitivo/reporte_tel/datos/add_missing_data.php", 'Agregar datos faltantes', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=600,height=400,left = 390,top = 50');
		}
	</script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div id="content" class="col-lg-12">
				<nav class="navbar navbar-light">
					<button id="btn_marcatel_logo" class="navbar-brand btn btn-outline-dark">
						<img src="../img/logos/btn-marcatel.png" alt="Marcatel">
					</button>
					<button id="btn_mcm_logo" class="navbar-brand btn btn-outline-light">
						<img src="../img/logos/btn-mcm.png" alt="MCM">
					</button>
					<button id="btn_ipcom_logo" class="navbar-brand btn btn-outline-light">
						<img src="../img/logos/btn-ipcom.png" alt="Ipcom">
					</button>
					<button id="btn_hazz_logo" class="navbar-brand btn btn-outline-light">
						<img src="../img/logos/btn-hazz.png" alt="Haz">
					</button>
					<button id="btn_voices_logo" class="navbar-brand btn btn-outline-light">
						<img src="../img/logos/btn-voices.png" alt="Voices">
					</button>
				</nav>
				<!-- START FORMULARIOS -->
				<div>
					<form id="form_obt_datos-marcatel" method="POST">
						<table id="tbl_form_marcatel" class="table" style="background-color: rgb(114, 96, 158);">
							<tbody class="text-center form-group">
								<tr>
									<td>
										<input type="text" id="carrier" name="carrier" class="form-control" value="Marcatel">
									</td>
									<td>
										<input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control">
									</td>
									<td>
										<svg class="icon icon-tabler icon-tabler-arrow-right" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<line x1="5" y1="12" x2="19" y2="12" />
											<line x1="13" y1="18" x2="19" y2="12" />
											<line x1="13" y1="6" x2="19" y2="12" />
										</svg>
									</td>
									<td>
										<input id="fecha_termino" name="fecha_termino" type="date" class="form-control">
									</td>
									<td>
										<input id="btn-marcatel" name="btn-marcatel" type="button" class="btn btn-outline-light" value="Porcesar">
									</td>
								</tr>
							</tbody>
						</table>
					</form>
					<form id="form_obt_datos_mcm" method="POST">
						<table id="tbl_form_mcm" class="table" style="background-color: rgb(116, 159, 97);">
							<tbody class="text-center form-group">
								<tr>
									<td>
										<input type="text" id="carrier" name="carrier" class="form-control" value="MCM">
									</td>
									<td>
										<input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control">
									</td>
									<td>
										<svg class="icon icon-tabler icon-tabler-arrow-right" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<line x1="5" y1="12" x2="19" y2="12" />
											<line x1="13" y1="18" x2="19" y2="12" />
											<line x1="13" y1="6" x2="19" y2="12" />
										</svg>
									</td>
									<td>
										<input id="fecha_termino" name="fecha_termino" type="date" class="form-control">
									</td>
									<td>
										<input id="btn-mcm" name="btn-mcm" type="button" class="btn btn-outline-light" value="Porcesar">
									</td>
								</tr>
							</tbody>
						</table>
					</form>
					<form id="form_obt_datos_ipcom" method="POST">
						<table id="tbl_form_ipcom" class="table" style="background-color: rgb(84, 135, 180);">
							<tbody class="text-center form-group">
								<tr>
									<td>
										<input type="text" id="carrier" name="carrier" class="form-control" value="Ipcom">
									</td>
									<td>
										<input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control">
									</td>
									<td>
										<svg class="icon icon-tabler icon-tabler-arrow-right" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<line x1="5" y1="12" x2="19" y2="12" />
											<line x1="13" y1="18" x2="19" y2="12" />
											<line x1="13" y1="6" x2="19" y2="12" />
										</svg>
									</td>
									<td>
										<input id="fecha_termino" name="fecha_termino" type="date" class="form-control">
									</td>
									<td>
										<input id="btn-ipcom" name="btn-ipcom" type="button" class="btn btn-outline-light" value="Porcesar">
									</td>
								</tr>
							</tbody>
						</table>
					</form>
					<form id="form_obt_datos_hazz" method="POST">
						<table id="tbl_form_hazz" class="table" style="background-color: rgb(184, 77, 77);">
							<tbody class="text-center form-group">
								<tr>
									<td>
										<input type="text" id="carrier" name="carrier" class="form-control" value="Hazz">
									</td>
									<td>
										<input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control">
									</td>
									<td>
										<svg class="icon icon-tabler icon-tabler-arrow-right" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<line x1="5" y1="12" x2="19" y2="12" />
											<line x1="13" y1="18" x2="19" y2="12" />
											<line x1="13" y1="6" x2="19" y2="12" />
										</svg>
									</td>
									<td>
										<input id="fecha_termino" name="fecha_termino" type="date" class="form-control">
									</td>
									<td>
										<input id="btn-hazz" name="btn-hazz" type="button" class="btn btn-outline-light" value="Porcesar">
									</td>
								</tr>
							</tbody>
						</table>
					</form>
					<form id="form_obt_datos_voices" method="POST">
						<table id="tbl_form_voices" class="table" style="background-color: rgb(159, 159, 159);">
							<tbody class="text-center form-group">
								<tr>
									<td>
										<input type="text" id="carrier" name="carrier" class="form-control" value="Voices">
									</td>
									<td>
										<input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control">
									</td>
									<td>
										<svg class="icon icon-tabler icon-tabler-arrow-right" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<line x1="5" y1="12" x2="19" y2="12" />
											<line x1="13" y1="18" x2="19" y2="12" />
											<line x1="13" y1="6" x2="19" y2="12" />
										</svg>
									</td>
									<td>
										<input id="fecha_termino" name="fecha_termino" type="date" class="form-control">
									</td>
									<td>
										<input id="btn-voices" name="btn-voices" type="button" class="btn btn-outline-light" value="Porcesar">
									</td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
				<!-- END FORMULARIOS -->
				<div id="resultado">

				</div>
				<div class="row">
					<div class="container-fluid">
						<div class="container ">
							<a href="javascript:addData('ventana.html')">
								<svg class="icon icon-tabler icon-tabler-code-plus" width="32" height="32" viewBox="0 0 24 24" stroke-width="1" stroke="#fd0061" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M9 12h6" />
									<path d="M12 9v6" />
									<path d="M6 19a2 2 0 0 1 -2 -2v-4l-1 -1l1 -1v-4a2 2 0 0 1 2 -2" />
									<path d="M18 19a2 2 0 0 0 2 -2v-4l1 -1l-1 -1v-4a2 2 0 0 0 -2 -2" />
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		/*Control oculto */
		$('#tbl_form_marcatel').hide();
		$('#tbl_form_mcm').hide();
		$('#tbl_form_ipcom').hide();
		$('#tbl_form_hazz').hide();
		$('#tbl_form_voices').hide();

		$('#btn_marcatel_logo').click(function() {
			$('#tbl_form_marcatel').show(700);
			$('#tbl_form_mcm').hide(40);
			$('#tbl_form_ipcom').hide(40);
			$('#tbl_form_hazz').hide(40);
			$('#tbl_form_voices').hide(40);
			$('#consulta_MCM').hide(40);
			$('#consulta_Ipcom').hide(40);
			$('#consulta_Hazz').hide(40);
		});
		$('#btn_mcm_logo').click(function() {
			$('#tbl_form_mcm').show(700);
			$('#tbl_form_marcatel').hide(40);
			$('#tbl_form_ipcom').hide(40);
			$('#tbl_form_hazz').hide(40);
			$('#tbl_form_voices').hide(40);
			$('#consulta_Marcatel').hide(40);
			$('#consulta_Ipcom').hide(40);
			$('#consulta_Hazz').hide(40);
		});
		$('#btn_ipcom_logo').click(function() {
			$('#tbl_form_ipcom').show(700);
			$('#tbl_form_marcatel').hide(40);
			$('#tbl_form_mcm').hide(40);
			$('#tbl_form_hazz').hide(40);
			$('#tbl_form_voices').hide(40);
			$('#consulta_Marcatel').hide(40);
			$('#consulta_MCM').hide(40);
			$('#consulta_Hazz').hide(40);
		});
		$('#btn_hazz_logo').click(function() {
			$('#tbl_form_hazz').show(700);
			$('#tbl_form_marcatel').hide(40);
			$('#tbl_form_mcm').hide(40);
			$('#tbl_form_ipcom').hide(40);
			$('#tbl_form_voices').hide(40);
			$('#consulta_Marcatel').hide(40);
			$('#consulta_MCM').hide(40);
			$('#consulta_Ipcom').hide(40);
		});
		$('#btn_voices_logo').click(function() {
			$('#tbl_form_voices').show(700);
			$('#tbl_form_hazz').hide(40);
			$('#tbl_form_marcatel').hide(40);
			$('#tbl_form_mcm').hide(40);
			$('#tbl_form_ipcom').hide(40);
			$('#consulta_Marcatel').hide(40);
			$('#consulta_MCM').hide(40);
			$('#consulta_Ipcom').hide(40);
		});
		/**Obtener datos telefonía*/
		$('#btn-marcatel').click(function() {
			$.ajax({
				url: 'datos/datos.php',
				type: 'POST',
				data: $('#form_obt_datos-marcatel').serialize(),
				beforeSend: function() {
					$("#resultado").html("<div style='text-align:center;'><samp>Calculando registros consumidos...</samp><br><img src='../img/gif/loading.gif' alt='vicidial'></div>");
				},
				success: function(res) {
					$('#resultado').html(res);
				}
			});
		});
		$('#btn-mcm').click(function() {
			$.ajax({
				url: 'datos/datos.php',
				type: 'POST',
				data: $('#form_obt_datos_mcm').serialize(),
				beforeSend: function() {
					$("#resultado").html("<div style='text-align:center;'><samp>Calculando registros consumidos...</samp><br><img src='../img/gif/loading.gif' alt='vicidial'></div>");
				},
				success: function(res) {
					$('#resultado').html(res);
				}
			});
		});
		$('#btn-ipcom').click(function() {
			$.ajax({
				url: 'datos/datos.php',
				type: 'POST',
				data: $('#form_obt_datos_ipcom').serialize(),
				beforeSend: function() {
					$("#resultado").html("<div style='text-align:center;'><samp>Calculando registros consumidos...</samp><br><img src='../img/gif/loading.gif' alt='vicidial'></div>");
				},
				success: function(res) {
					$('#resultado').html(res);
				}
			});
		});
		$('#btn-hazz').click(function() {
			$.ajax({
				url: 'datos/datos.php',
				type: 'POST',
				data: $('#form_obt_datos_hazz').serialize(),
				beforeSend: function() {
					$("#resultado").html("<div style='text-align:center;'><samp>Calculando registros consumidos...</samp><br><img src='../img/gif/loading.gif' alt='vicidial'></div>");
				},
				success: function(res) {
					$('#resultado').html(res);
				}
			});
		});
		$('#btn-voices').click(function() {
			$.ajax({
				url: 'datos/datos.php',
				type: 'POST',
				data: $('#form_obt_datos_voices').serialize(),
				beforeSend: function() {
					$("#resultado").html("<div style='text-align:center;'><samp>Calculando registros consumidos...</samp><br><img src='../img/gif/loading.gif' alt='vicidial'></div>");
				},
				success: function(res) {
					$('#resultado').html(res);
				}
			});
		});
	</script>
</body>

</html>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>OldTelephone

     </title>
     <!-- Favicons -->
	<link href="../../img/favicon/vicidial.ico" rel="icon">
	<!-- CSS externo-->
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/augmented-ui@2/augmented-ui.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"><!-- Estilos personalizados para esta plantilla -->
	<link href="css1/style.css" rel="stylesheet">
	<link href="css1/style-responsive.css" rel="stylesheet">
	<!-- Bootstrap core CSS -->
	<script>
		function btn_vicis(url) {
			open(url, '', 'top=300,left=300,width=480,height=540');
		}
	</script>
</head>
<style>
	.weather {
		background: url(../../assets/img/mapamundi.jpg) no-repeat center top;
		text-align: center;
		background-position: center center;
	}

	.weather1 {
		background: url(../../assets/img/weather.jpg) no-repeat center top;
		text-align: left;
		background-position: left center;
	}

	.pn1,
	.pn-grafica {
		height: 400px;
		box-shadow: 0 2px 10px rgba(147, 149, 151);
	}

	.pn2 {
		height: 250px;
		box-shadow: 0 2px 10px rgba(147, 149, 151);
	}


	.columna {
		width: 20%;
	}

	.title {
		padding: .10px;
	}

	.my-custom-scrollbar {
		position: relative;
		height: 330px;
		overflow: auto;
		margin-top: 12px;
		margin-left: 5px;
	}

	.table-wrapper-scroll-y {
		display: block;
		width: 98.8%;
	}

	/*Área css para scroll tabla de resultados*/
	.my-custom-scrollbar1 {
		position: relative;
		height: 100vh;
		overflow: auto;
		margin-top: 12px;
		margin-left: 5px;
	}

	.table-wrapper-scroll-y1 {
		display: block;
	}

	/*Área css para scroll tabla de resultados*/
	.contenedor1 {
		margin-top: 20px;
		height: 100vh;
	}

	.disable-scroll {
		position: relative;
		height: 340px;
		overflow: hidden;
		margin-top: 12px;
	}

	.calendar-month-header {
		background: #2e3440;
		color: #ffffff;
	}

	.myButton {
		box-shadow: inset 0px 1px 0px 0px #E4E7EB;
		background: linear-gradient(to bottom, #E4E7EB 5%, #9AA5B1 100%);
		background-color: #E4E7EB;
		display: inline-block;
		cursor: pointer;
		color: #3E4C59;
		font-family: Arial;
		font-size: 15px;
		font-weight: bold;
		padding: 6px 24px;
		text-decoration: none;
	}

	.myButton:hover {
		background: linear-gradient(to bottom, rgb(226, 234, 242) 5%, rgb(182, 203, 223) 100%);
		background-color: rgb(133, 169, 202);
		color: #3E4C59;
	}

	.myButton:active {
		position: relative;
		top: 1px;
	}

	.wrapper1 {
		display: inline-block;
		margin-top: 60px;
		padding-left: 15px;
		padding-right: 15px;
		padding-bottom: 15px;
		padding-top: 0px;
		width: 100%;
	}

	.col-lg-9 {
		float: left;
	}

	.col-lg-3 {
		float: right;
	}

	.mdb-illuminating {
		background-color: rgb(245, 223, 77);
	}

	.mdb-ultimate-gray {
		background-color: rgba(147, 149, 151);
	}

	.mdb-ultimate-gray-medio {
		background-color: rgba(147, 149, 151, 0.5);
	}

	.mdb-ultimate-red {
		background-color: rgb(255, 43, 43);
	}

	.text-size-head {
		font-size: 3em;
	}

	/*INICIO NAVBAR*/
	nav {
		margin-bottom: 10px;
	}


	#menu {
		background: #f5df4d;
		border-radius: 10px;
		color: #fff;
		font-size: 14px;
		height: 41px;
		padding-left: 18px;
		position: fixed;
		width: 100%;
		z-index: 100;
	}

	#menu ul,
	#menu li {
		margin: 0 auto;
		padding: 0;
		list-style: none;
	}

	#menu ul {
		width: 100%;
	}

	#menu li {
		float: left;
		display: inline;
		position: relative;
	}

	#menu a {
		display: block;
		line-height: 41px;
		padding: 0 12px;
		text-decoration: none;
		color: #000000;
		font-size: 16px;
	}

	#menu a.dropdown-arrow:after {
		content: "\25BE";
		margin-left: 5px;
	}

	#menu li a:hover {
		color: #0099cc;
		background: #f2f2f2;
	}

	#menu input {
		display: none;
		margin: 0;
		padding: 0;
		height: 41px;
		width: 100%;
		opacity: 0;
		cursor: pointer;
	}

	#menu label {
		display: none;
		line-height: 41px;
		text-align: center;
		position: absolute;
		left: 35px;
	}

	#menu label:before {
		font-size: 12px;
		content: "\2261";
		margin-left: 20px;
	}

	#menu ul.sub-menus {
		height: auto;
		overflow: hidden;
		width: 170px;
		background: #949597;
		position: absolute;
		z-index: 99;
		display: none;
	}

	#menu ul.sub-menus li {
		display: block;
		width: 100%;
	}

	#menu ul.sub-menus a {
		color: #f5df4d;
		font-size: 12px;
	}

	#menu li:hover ul.sub-menus {
		display: block;
	}

	#menu ul.sub-menus a:hover {
		background: #f2f2f2;
		color: #444444;
	}

	@media screen and (max-width: 800px) {
		#menu {
			position: relative;
		}

		#menu ul {
			background-color: #e5e9f0;
			position: absolute;
			top: 100%;
			right: 0;
			left: 0;
			z-index: 3;
			height: auto;
			display: none;
		}

		#menu ul.sub-menus {
			width: 100%;
			position: static;
		}

		#menu ul.sub-menus a {
			padding-left: 30px;
		}

		#menu li {
			display: block;
			float: none;
			width: auto;
		}

		#menu input,
		#menu label {
			position: absolute;
			top: 0;
			left: 0;
			display: block;
		}

		#menu input {
			z-index: 4;
		}

		#menu input:checked+label {
			color: white;
		}

		#menu input:checked+label:before {
			content: "\00d7";
		}

		#menu input:checked~ul {
			display: block;
		}
	}

	/*FIN NAVBAR*/
	.contenedor-formulario {
		height: 80%;
	}

	.contenedor-botones-form {
		height: 20%;
		text-align: center;
	}

	#obt_nuevas_tablas,
	#tabla-consumo-por-server,
	#tabla-consumo-administrativo {
		width: 90%;
		margin: auto;
	}

	#btn-consumo-telefonia,
	#btn-consumo-por-server,
	#btn-consumo-administrativo {
		width: 33%;
	}
</style>
 </head>

 <body>
     <section id="container">
         <!--main content start-->
         <section class="wrapper1">
             <div class="row">
                 <!-- TELEFONIA -->
                 <div class="col-lg-12">
                     <!-- Buscar datos telefonia tablas nuevas-->
                     <a name="telefonia_mensual">
                         <div class="border-head">
                             <h3>Telefonía Mensual nuevas tablas</h3>
                         </div>
                     </a>
                     <div class="row">

                         <div class="col-md-4 mb styleme" data-augmented-ui="tl-clip tr-clip br-clip-x bl-clip-x inlay">
                             <div class="weather pn1">
                                 <div class="row contenedor-formulario">
                                     <form id="obt_nuevas_tablas" method="POST" name="form_datos_gral">
                                         <table id="tabla-consumo-telefonia" class="table table-borderless">
                                             <!--caption class="text-center text-white">Ing. Edgar M. Dueñas Alfaro</caption-->
                                             <thead class="text-white">
                                                 <tr>
                                                     <th>Consumo Mensual</th>
                                                 </tr>
                                             </thead>
                                             <tbody class="text-center">
                                                 <tr>
                                                     <td colspan="2">
                                                         <select class="form-control form-control-sm" id="servidor_telefonia_mensual" name="servidor_telefonia_mensual">
                                                             <?php
                                                                $servidores = array("5", "6", "8", "9", "11", "14", "15", "22", "27", "28", "29", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "201");
                                                                $tamanio_array = count($servidores);
                                                                for ($x = 0; $x < $tamanio_array; $x++) {
                                                                    $servidor_gral = $servidores[$x];
                                                                    echo "<option value='" . $servidor_gral . "'>Servidor " . $servidor_gral . "</option>";
                                                                }
                                                                ?>
                                                         </select>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="2">
                                                         <select class="form-control form-control-sm" id="carrier_telefonia_mensual" name="carrier_telefonia_mensual">
                                                             <?php
                                                                $carrieres = array("Directo", "Hazz", "Ipcom", "Marcatel", "Mcm");
                                                                $tamanio_array = count($carrieres);
                                                                for ($x = 0; $x < $tamanio_array; $x++) {
                                                                    $carrier = $carrieres[$x];
                                                                    echo "<option value='" . $carrier . "'>" . $carrier . "</option>";
                                                                }
                                                                ?>
                                                         </select>
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="2">
                                                         <input class="form-control form-control-sm" id="fecha_inicio_telefonia" name="fecha_inicio_telefonia" type="date">
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="2">
                                                         <input class="form-control form-control-sm" id="fecha_termino_telefonia" name="fecha_termino_telefonia" type="date">
                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="2">
                                                         <input class="form-control form-control-sm btn-info" id="btn_consumo_telefonia" name="btn_consumo_telefonia" type="button" value="Consumo telefonía">
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </form>
                                 </div>
                                 <div class="row contenedor-botones-form">
                                     <button id="btn-consumo-telefonia" class="btn btn-sm myButton" type="radio" name="options" checked>
                                         Mensual
                                     </button>
                                     <button id="btn-consumo-por-server" class="btn btn-sm myButton" type="radio" class="d-none d-sm-none" name="options">
                                         Server
                                     </button>
                                     <button id="btn-consumo-administrativo" class="btn btn-sm myButton" type="radio" class="d-none" name="options">
                                         Admin
                                     </button>
                                 </div>
                             </div>
                         </div>
                         <!-- Buscar datos telefonia -->
                         <!-- Panel de resultados telefonia -->
                         <div class="col-md-8 mb" data-augmented-ui="tl-clip tr-clip br-clip bl-clip inlay">
                             <div class="message-p pn1">
                                 <div class="message-header">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                         <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                         <rect x="9" y="3" width="6" height="4" rx="2" />
                                         <path d="M9 17v-5" />
                                         <path d="M12 17v-1" />
                                         <path d="M15 17v-3" />
                                     </svg>
                                 </div>
                                 <div id="resultado_consumo_telefonia" class="row table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                                     <!-- Área donde se muestran los resultados de las busquedas nuevas tablas-->

                                 </div>
                             </div>
                         </div>
                         <!-- /Panel de resultados-->
                     </div>
                     <!-- Fin telefonia general nuevas tablas-->




                     <!-- Inicio telefonia general-->
                     <a name="telefonia_mensual">
                         <div class="border-head">
                             <h3>Telefonía Mensual</h3>
                         </div>
                     </a>
                     <div class="row">
                         <!-- Buscar datos telefonia -->
                         <div class="col-md-4 mb styleme" data-augmented-ui="tl-clip tr-clip br-clip-x bl-clip-x inlay">
                             <div class="weather1 pn1">
                                 <form id="obt_datos_gral" method="POST" name="form_datos_gral">
                                     <table class="table table-borderless">
                                         <!--caption class="text-center text-white">Ing. Edgar M. Dueñas Alfaro</caption-->
                                         <tbody class="text-center">
                                             <tr>
                                                 <td colspan="2">
                                                     <select id="servidor_gral" name="servidor_gral" class="form-control form-control-sm">
                                                         <?php
                                                            $servidores = array("5", "6", "8", "9", "11", "14", "22", "27", "28", "29", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "201");
                                                            $tamanio_array = count($servidores);
                                                            for ($x = 0; $x < $tamanio_array; $x++) {
                                                                $servidor_gral = $servidores[$x];
                                                                echo "<option value='" . $servidor_gral . "'>Servidor " . $servidor_gral . "</option>";
                                                            }
                                                            ?>
                                                     </select>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td colspan="2">
                                                     <select id="carrier_gral" name="carrier_gral" class="form-control form-control-sm">
                                                         <?php
                                                            $carrieres = array("Directo", "Hazz", "Ipcom", "Marcatel", "Mcm");
                                                            $tamanio_array = count($carrieres);
                                                            for ($x = 0; $x < $tamanio_array; $x++) {
                                                                $carrier = $carrieres[$x];
                                                                echo "<option value='" . $carrier . "'>" . $carrier . "</option>";
                                                            }
                                                            ?>
                                                     </select>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="tam" colspan="2">
                                                     <input id="fecha_inicio_gral" name="fecha_inicio_gral" type="date" class="form-control form-control-sm">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="tam" colspan="2">
                                                     <input id="fecha_termino_gral" name="fecha_termino_gral" type="date" class="form-control form-control-sm">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="text-center tam">
                                                     <input id="btn-gral" name="btn-gral" type="button" class="myButton" value="Telefonía">
                                                 </td>
                                                 <td class="text-center tam">
                                                     <input id="btn-totales" name="btn-totales_servidor" type="button" class="myButton" value="Totales">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td class="text-center tam" colspan="2">
                                                     <input id="btn-administrativos" name="btn-totales_administrativos" type="button" class="myButton" value="Admin">
                                                 </td>
                                         </tbody>
                                     </table>
                                 </form>
                             </div>
                         </div>
                         <!-- Buscar datos telefonia -->
                         <!-- Panel de resultados telefonia -->
                         <div class="col-md-8 mb" data-augmented-ui="tl-clip tr-clip br-clip bl-clip inlay">
                             <div class="message-p pn1">
                                 <div class="message-header">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-analytics" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                         <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                         <rect x="9" y="3" width="6" height="4" rx="2" />
                                         <path d="M9 17v-5" />
                                         <path d="M12 17v-1" />
                                         <path d="M15 17v-3" />
                                     </svg>
                                 </div>
                                 <div id="resultado_gral" class="row table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                                     <!-- Área donde se muestran los resultados de las busquedas-->

                                 </div>
                             </div>
                         </div>
                         <!-- /Panel de resultados-->
                     </div>
                     <!-- Fin telefonia general-->


                 </div>

             </div>
         </section>
     </section> <!-- cierre de contnedor general-->
     <!-- js placed at the end of the document so the pages load faster -->
     <script src="lib1/jquery/jquery.min.js"></script>
     <script src="lib1/bootstrap/js/bootstrap.min.js"></script>
     <script class="include" type="text/javascript" src="lib1/jquery.dcjqaccordion.2.7.js"></script>
     <script src="lib1/jquery.scrollTo.min.js"></script>
     <script src="lib1/jquery.nicescroll.js" type="text/javascript"></script>
     <script src="lib1/jquery.sparkline.js"></script>
     <!--common script for all pages-->
     <script src="lib1/common-scripts.js"></script>
     <script type="text/javascript" src="lib1/gritter/js/jquery.gritter.js"></script>
     <script type="text/javascript" src="lib1/gritter-conf.js"></script>
     <!--script for this page-->
     <script src="lib1/sparkline-chart.js"></script>
     <script src="lib1/zabuto_calendar.js"></script>
     <script type="text/javascript">
         $(document).ready(function() {
             var unique_id = $.gritter.add({
                 // (string | mandatory) the heading of the notification
                 title: 'Bienvenido Namaste! 🕉️',
                 // (string | mandatory) the text inside the notification
                 text: 'Aum saha nAvavatu, saha nau bhunaktu, saha vIryam karavavahai, tejasvinAv adhItamastu, ma vidvishAvahai, Aum shantih, shantih, shantih. <a href="https://www.himalayanacademy.com/media/books/amoroso-ganesha_es/web/lg_ch-11.html" target="_blank" style="color:#4ECDC4">Shri Ganesh</a>.',
                 // (string | optional) the image to display on the left
                 image: 'img/iconos/perfil.png',
                 // (bool | optional) if you want it to fade out on its own or just sit there
                 sticky: false,
                 // (int | optional) the time you want it to be alive for before fading out
                 time: 2000,
                 // (string | optional) the class name you want to apply to that specific message
                 class_name: 'my-sticky-class'
             });

             return false;
         });
     </script>
     <script type="application/javascript">
         $(document).ready(function() {
             $("#date-popover").popover({
                 html: true,
                 trigger: "manual"
             });
             $("#date-popover").hide();
             $("#date-popover").click(function(e) {
                 $(this).hide();
             });

             $("#my-calendar").zabuto_calendar({
                 action: function() {
                     return myDateFunction(this.id, false);
                 },
                 action_nav: function() {
                     return myNavFunction(this.id);
                 },
                 ajax: {
                     url: "show_data.php?action=1",
                     modal: true
                 },
                 legend: [{
                         type: "text",
                         label: "Special event",
                         badge: "00"
                     },
                     {
                         type: "block",
                         label: "Regular event",
                     }
                 ]
             });
         });

         function myNavFunction(id) {
             $("#date-popover").hide();
             var nav = $("#" + id).data("navigation");
             var to = $("#" + id).data("to");
             console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
         }
     </script>
     <!-- Script propios -->
     <!-- Obtener datos de telefonia -->
     <script>
         /**Obtener datos telefonía*/
         $('#btn-gral').click(function() {
             $.ajax({
                 url: 'obt_general.php',
                 type: 'POST',
                 data: $('#obt_datos_gral').serialize(),
                 beforeSend: function() {
                     $("#resultado_gral").html("<div style='text-align:center;'><samp>Calculando registros consumidos...</samp><br><img src='img/gif/loading.gif' alt='vicidial'></div>");
                 },
                 success: function(res) {
                     $('#resultado_gral').html(res);
                 }

             });
         });
     </script>

     <!-- Obtener datos de tablas filtradas -->
     <script>
         $('#btn_consumo_telefonia').click(function() {
             $.ajax({
                 url: '../obt_general_2.php',
                 type: 'POST',
                 data: $('#obt_nuevas_tablas').serialize(),
                 beforeSend: function() {
                     $("#resultado_consumo_telefonia").html("<div style='text-align:center;'><samp>Calculando registros consumidos...</samp><br><img src='img/gif/loading.gif' alt='vicidial'></div>");
                 },
                 success: function(res) {
                     $('#resultado_consumo_telefonia').html(res);
                 }

             });
         });
     </script>
     <!-- Script Nav Bar -->
     <script>
         function updatemenu() {
             if (document.getElementById('responsive-menu').checked == true) {
                 document.getElementById('menu').style.borderBottomRightRadius = '0';
                 document.getElementById('menu').style.borderBottomLeftRadius = '0';
             } else {
                 document.getElementById('menu').style.borderRadius = '15px';
             }
         }
     </script>
     <!-- Gráfica barra todos los carrier -->
     <script>
         /**Grafica pastel todos */
         var ctx = document.getElementById("myChart").getContext("2d");
         var myChart = new Chart(ctx, {
             type: "horizontalBar",
             /*opciones de grafica "line, doughnut, pie, horizontalBar"*/
             data: {
                 labels: ['Marcatel', 'MCM', 'Ipcom', 'Hazz'],
                 datasets: [{
                     label: '<?php echo "$total"; ?>',
                     data: [<?php echo "$marcatel_pesos"; ?>, <?php echo "$mcm_pesos"; ?>,
                         <?php echo "$ipcom_pesos"; ?>, <?php echo "$hazz_pesos"; ?>
                     ],
                     backgroundColor: [
                         'rgb(75, 0, 130)',
                         'rgb(0, 100, 0)',
                         'rgb(70, 130, 180)',
                         'rgb(139, 0, 0)'
                     ]
                 }]
             },
             options: {
                 scales: {
                     yAxes: [{
                         ticks: {
                             beginAtZero: true
                         }
                     }]
                 }
             }
         });
     </script>
     <script>
         $('#tabla-consumo-telefonia').hide();
         $('#tabla-consumo-por-server').hide();
         $('#tabla-consumo-administrativo').hide();
         $('#graficas_consumo').hide();
         $('#personal_vici').hide();
         $('#telefonia_araceli').hide();


         $('#btn-consumo-telefonia').click(function() {
             $('#tabla-consumo-telefonia').show(700);
             $('#tabla-consumo-por-server').hide(50);
             $('#tabla-consumo-administrativo').hide(50);
         });
         $('#btn-consumo-por-server').click(function() {
             $('#tabla-consumo-por-server').show(700);
             $('#tabla-consumo-telefonia').hide(50);
             $('#tabla-consumo-administrativo').hide(50);
         });
         $('#btn-consumo-administrativo').click(function() {
             $('#tabla-consumo-administrativo').show(700);
             $('#tabla-consumo-telefonia').hide(50);
             $('#tabla-consumo-por-server').hide(50);
         });
     </script>

 </body>

 </html>
<?php
require '../reporte_tel/clases/conexion.php';
$conexion   =   conexion_db_local("telefonia", "127.0.0.1");
?>

<!DOCTYPE html>
<html lang="en">  

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
    <style>
        #resultadoCentrosInternos {
            /*height: 933px;*/
            overflow-y: scroll;
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
        .hide_scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .hide_scrollbar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>

<body style="background-color: #ffffff;">
    <section class="container">
            <div class="container-fluid">
                <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                    <form id="formulario" class="row g-3 needs-validation" novalidate>
                        <table class="table table-striped table-bordered table-primary">
                            <thead class="table-active">
                                <tr>
                                    <!-- <th>Interno-Externo</th>
                                    <th>Sucursal</th> -->
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fín</th>
                                    <th>Buscar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <!-- <td>
                                        <select class="form-select" id="internoExternoAll" name="internoExternoAll" required>
                                            <option value="0">Selecciona una opcion</option>
                                            <option value="i">Interno</option>
                                            <option value="e">Externo</option>
                                            <option value="i','e">All</option>
                                        </select>
                                    </td> -->
                                    <!-- <td>
                                        <div id="tipoCentro"></div>
                                    </td> -->
                                    <td>
                                        <input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control" required>
                                    </td>
                                    <td>
                                        <input id="fecha_termino" name="fecha_termino" type="date" class="form-control" required>
                                    </td>
                                    <td>
                                        <input id="buscar" name="buscar" type="button" class="btn btn-secondary btn-lg" value="Buscar">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
    </section>
    <section class="container p-2">
            <div class="container-fluid">

                <div id="resultado" class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|} p-2">
                    <label for="floatingInputValue">Datos por día</label>
                </div>
                <hr>
                <div id="resultado-dividido" class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|} p-2">
                    <label for="floatingInputValue">Datos desglosados por carrier</label>
                </div>
                <hr>
                <div id="resultadoCentrosInternos" class="hide_scrollbar row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|} p-2">
                    <label for="floatingInputValue">Datos por Centro Interno</label>
                </div>
                <hr>
                <div id="resultadoCentrosExternos" class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|} p-2">
                    <label for="floatingInputValue">Datos por Centro Externo</label>
                </div>

            </div>
    </section>
    <footer class="text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Copyright:
            <a class="text-dark" href="10.9.2.116">STO CONTACT CENTER</a>
            </div>
            <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script type="text/javascript">
        
        /**START LLENADO DE SELECT */
        $(document).ready(function() {
            $('#internoExternoAll').val('interno');
            recargarLista();

            $('#internoExternoAll').change(function() {
                recargarLista();
            });
        })

        function recargarLista() {
            $.ajax({
                type: "POST",
                url: "./class/select_sucursal.php",
                data: "tipo=" + $('#internoExternoAll').val(),
                success: function(r) {
                    $('#tipoCentro').html(r);
                }
            });
        }
        /*END LLENADO DE SELECT */
        /****seccion view data****/
        $('#buscar').click(function() {
            $.ajax({
                url: './view/view_data.php',
                type: 'POST',
                data: $('#formulario').serialize(),
                beforeSend: function() {
                    $("#resultado").html("<div style='text-align:center;'><samp>Calculando registros esto puede tardar unos segundos...</samp><br><img src='../img/gif/loading.gif' alt='vicidial'></div>");
                },
                success: function(res) {
                    $('#resultado').html(res);
                }
            });
        });
        /****seccion view data por carrier****/
        $('#buscar').click(function() {
            $.ajax({
                url: './view/view_data_carrier.php',
                type: 'POST',
                data: $('#formulario').serialize(),
                beforeSend: function() {
                    $("#resultado-dividido").html("<div style='text-align:center;'><samp>Calculando registros esto puede tardar unos segundos...</samp><br><img src='../img/gif/loading.gif' alt='vicidial'></div>");
                },
                success: function(res) {
                    $('#resultado-dividido').html(res);
                }
            });
        });
        /****seccion view data Centros internos****/
        $('#buscar').click(function() {
            $.ajax({
                url: './view/view_sucursales_internas.php',
                type: 'POST',
                data: $('#formulario').serialize(),
                beforeSend: function() {
                    $("#resultadoCentrosInternos").html("<div style='text-align:center;'><samp>Calculando registros esto puede tardar unos segundos...</samp><br><img src='../img/gif/loading.gif' alt='vicidial'></div>");
                },
                success: function(res) {
                    $('#resultadoCentrosInternos').html(res);
                }
            });
        });
        /****seccion view data Centros externos****/
        $('#buscar').click(function() {
            $.ajax({
                url: './view/view_sucursales_externas.php',
                type: 'POST',
                data: $('#formulario').serialize(),
                beforeSend: function() {
                    $("#resultadoCentrosExternos").html("<div style='text-align:center;'><samp>Calculando registros esto puede tardar unos segundos...</samp><br><img src='../img/gif/loading.gif' alt='vicidial'></div>");
                },
                success: function(res) {
                    $('#resultadoCentrosExternos').html(res);
                }
            });
        });
    </script>
</body>

</html>
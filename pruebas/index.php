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
    <link rel="stylesheet" href="../css/slate.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body class="bg-light">
    <section class="container">
        <div class="container-fluid">
            <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                <form id="formulario" class="row g-3 needs-validation" novalidate>
                    <table class="table table-striped table-bordered table-primary">
                        <thead class="table-active">
                            <tr>
                                <th>Interno-Externo</th>
                                <th>Sucursal</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fín</th>
                                <th>Buscar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>
                                    <select class="form-select" id="internoExternoAll" name="internoExternoAll" required>
                                        <option value="0">Selecciona una opcion</option>
                                        <option value="i">Interno</option>
                                        <option value="e">Externo</option>
                                        <option value="i','e">All</option>
                                    </select>
                                </td>
                                <td>
                                    <div id="tipoCentro"></div>
                                </td>
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
    <section class="container">
        <div class="container-fluid">

            <div id="resultado" class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}" style="height:677px;">
            </div>

            <div id="resultado-dividido" class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|} bg-primary" style="height:350px;">
            </div>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script type="text/javascript">
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
        /****seccion view data carrier****/
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
    </script>
</body>

</html>
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
</head>

<body>
    



    <div>
        <form id="form_obt_datos-marcatel" method="POST">
            <table id="tbl_form_marcatel" class="table">
                <tbody class="text-center form-group">
                    <tr>
                        <td>
                            <select id="vicidial" name="vicidial" class="form-control">
                                <?php
                                $query_vici = "SELECT reporte FROM vicis
                                    WHERE estado='Y';";
                                $ans_vicis = $conexion->query($query_vici);
                                while ($row_vicis = $ans_vicis->fetch_object()) {
                                    $row_vicis->reporte;
                                ?>
                                    <option value="<?php echo $row_vicis->reporte; ?>"><?php echo $row_vicis->reporte; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control">
                        </td>
                        <td>
                            <input id="fecha_termino" name="fecha_termino" type="date" class="form-control">
                        </td>
                        <td>
                            <input id="btn-busqueda" name="btn-busqueda" type="button" class="btn btn-outline-light" value="Porcesar">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div id="resultado">

    </div>
    <script>
        $('#btn-busqueda').click(function() {
            $.ajax({
                url: './script.php',
                type: 'POST',
                data: $('#form_obt_datos-marcatel').serialize(),
                beforeSend: function() {
                    $("#resultado").html("<div style='text-align:center;'><samp>Calculando registros consumidos...</samp><br><img src='../img/gif/loading.gif' ></div>");
                },
                success: function(res) {
                    $('#resultado').html(res);
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>

</html>
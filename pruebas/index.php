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
    <form class="row g-3 needs-validation" novalidate>

        <div class="col-md-3">
            <label for="" class="form-label">Tipo</label>
            <select class="form-select" id="internoExternoAll" name="internoExternoAll" required>
                <option value="0">Selecciona una opcion</option>
                <option value="i">Interno</option>
                <option value="e">Externo</option>
                <option value="a">All</option>
            </select>
        </div>

        <div class="col-md-3" id="tipoCentro">
            
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>






    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#internoExternoAll').val('interno');
            recargarLista();

            $('#internoExternoAll').change(function(){
                recargarLista();
            });
        })

        function recargarLista(){
            $.ajax({
                type:"POST",
                url:"script.php",
                data:"tipo=" + $('#internoExternoAll').val(),
                success:function(r){
                    $('#tipoCentro').html(r);
                }
            });
        }
    </script>
</body>

</html>
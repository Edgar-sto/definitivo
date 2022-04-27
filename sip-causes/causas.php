<?php
/*$server     ="localhost";
$usuario    ="root";
$pwd        ="";
$database   ="soporte";
$conexion   =mysqli_connect($server,$usuario,$pwd,$database);
if (!$conexion) {
    die("!Servidor no encontrado !".mysqli_connect_error());
}
else {
    /*echo"conexion exitosa";
    echo"<br>";
    echo"$server";
} */
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Edgar Dueñas</title>
	<!-- MDB icon -->
	<link rel="icon" href="../img/favicon/sip-call-failed.ico" type="image/x-icon">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="../css/mdb.min.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="../css/style.css">
	<!--Envio de datos -->
    <style>
        .mdb-illuminating {
    background-color: #f5df4d !important
}
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="table-responsive ">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm mdb-illuminating text-black text-center"><h2>#</h2></th>
                        <th class="th-sm mdb-illuminating text-black text-center"><h2>Error</h2></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Error SIP 100 -->
                    <tr>
                    <td class="rgba-stylish-strong text-white text-center" colspan="2">Causas Error</td>
                    </tr>
                    <tr>
                        <td>Cause 1</td>
                        <td >Número no asignado (no asignado): esta causa indica que no se puede localizar a la parte llamada porque, aunque el número de la parte llamada está en un formato válido, no está actualmente asignado (asignado).</td>
                    </tr>
                    <tr>
                        <td>Cause 2</td>
                        <td>Sin ruta a la red de tránsito especificada: esta causa indica que el equipo que envía esta causa ha recibido una solicitud para enrutar la llamada a través de una red de tránsito en particular que no reconoce. El equipo que envía esta causa no reconoce la red de tránsito ya sea porque la red de tránsito no existe o porque esa red de tránsito en particular, mientras existe, no atiende al equipo que envía esta causa. Esta causa depende de la red.</td>
                    </tr>
                    <tr>
                        <td>Cause 3</td>
                        <td>Sin ruta al destino: esta causa indica que no se puede llegar a la parte llamada porque la red a través de la cual se enruta la llamada no sirve al destino deseado. Esta causa depende de la red.</td>
                    </tr>
                    <tr>
                        <td>Cause 4</td>
                        <td>Enviar tono de información especial: esta causa indica que la parte llamada no puede ser localizada por razones que son de naturaleza a largo plazo y que el tono de información especial debe devolverse a la parte llamante.</td>
                    </tr>
                    <tr>
                        <td>Cause 5</td>
                        <td>Prefijo de troncal mal marcado: no se han especificado procedimientos para las redes de EE. UU.</td>
                    </tr>
                    <tr>
                        <td>Cause 8</td>
                        <td>Preemption - This cause indicates that the call is being preempted.</td>
                    </tr>
                    <tr>
                        <td>Cause 9</td>
                        <td>Preferencia: circuito reservado para reutilización. Esta causa indica que la llamada se está apropiando y el circuito está reservado para ser reutilizado por la central de apropiación.</td>
                    </tr>
                    <tr>
                        <td>Cause 16</td>
                        <td>Liberación de llamada normal: esta causa indica que la llamada se libera porque uno de los usuarios involucrados en la llamada ha solicitado que se libere la llamada. En situaciones normales, la fuente de esta causa no es la red.</td>
                    </tr>
                    <tr>
                        <td>Cause 17</td>
                        <td>Usuario ocupado: esta causa se utiliza para indicar que la parte llamada no puede aceptar otra llamada porque se ha encontrado la condición de usuario ocupado. Este valor de causa puede ser generado por el usuario llamado o por la red. En el caso de usuario ocupado determinado por el usuario, se observa que el equipo de usuario es compatible con la llamada.</td>
                    </tr>
                    <tr>
                        <td>Cause 18</td>
                        <td>Ningún usuario responde: esta causa se utiliza cuando una parte llamada no responde a un mensaje de establecimiento de llamada con una alerta o una indicación de conexión dentro del período de tiempo prescrito asignado.</td>
                    </tr>
                    <tr>
                        <td>Cause 19</td>
                        <td>Sin respuesta del usuario (usuario alertado): este valor se utiliza cuando se ha alertado a la parte llamada pero no responde con una indicación de conexión dentro de un período de tiempo prescrito. Nota - Esta causa no la generan necesariamente los procedimientos Q.93l, pero puede ser generada por los temporizadores de la red interna.</td>
                    </tr>
                    <tr>
                        <td>Cause 20</td>
                        <td>Abonado ausente: este valor de causa se utiliza cuando una estación móvil se ha desconectado, no se obtiene contacto por radio con una estación móvil o si un usuario de telecomunicaciones personal no es accesible temporalmente en ninguna interfaz usuario-red.</td>
                    </tr>
                    <tr>
                        <td>Cause 21</td>
                        <td>Llamada rechazada - Esta causa indica que el equipo que envía esta causa no desea aceptar esta llamada, aunque podría haber aceptado la llamada porque el equipo que envía esta causa no está ocupado ni es incompatible. La red también puede generar esta causa, indicando que la llamada fue liberada debido a una restricción del servicio suplementario. El campo de diagnóstico puede contener información adicional sobre el servicio suplementario y el motivo del rechazo.</td>
                    </tr>
                    <tr>
                        <td>Cause 22</td>
                        <td>Número cambiado: esta causa se devuelve a la parte que llama cuando el número de la parte llamada indicado por la parte que llama ya no está asignado. El nuevo número de la parte llamada puede incluirse opcionalmente en el campo de diagnóstico. Si una red no admite este valor de causa, se utilizará la causa número 1, número no asignado (no asignado).</td>
                    </tr>
                    <tr>
                        <td>Cause 27</td>
                        <td>Destino fuera de servicio: esta causa indica que no se puede llegar al destino indicado por el usuario porque la interfaz al destino no está funcionando correctamente. El término "no funciona correctamente" indica que no se pudo entregar un mensaje de señalización a la parte remota; por ejemplo, una falla de la capa física o de la capa de enlace de datos en la parte remota, o el equipo del usuario fuera de línea.</td>
                    </tr>
                    <tr>
                        <td>Cause 28</td>
                        <td>Formato de número no válido (dirección incompleta): esta causa indica que no se puede localizar a la parte llamada porque el número de la parte llamada no tiene un formato válido o no está completo.</td>
                    </tr>
                    <tr>
                        <td>Cause 29</td>
                        <td>Facilidad rechazada: esta causa se devuelve cuando la red no puede proporcionar un servicio suplementario solicitado por el usuario.</td>
                    </tr>
                    <tr>
                        <td>Cause 30</td>
                        <td>Normal, sin especificar: esta causa se utiliza para informar un evento normal solo cuando no se aplica ninguna otra causa de la clase normal.</td>
                    </tr>
                    <!-- Error SIP 300 -->
                    <tr>
                    <td class="rgba-stylish-strong text-white text-center" colspan="2">Clase de recurso no disponible</td>
                    </tr>
                    <tr>
                        <td>Cause 34</td>
                        <td>No hay circuito / canal disponible: esta causa indica que no hay un circuito / canal apropiado disponible actualmente para manejar la llamada.</td>
                    </tr>
                    <tr>
                        <td>Cause 38</td>
                        <td>Red fuera de servicio: esta causa indica que la red no está funcionando correctamente y que es probable que la condición dure un período de tiempo relativamente largo, por ejemplo, no es probable que reintentar inmediatamente la llamada tenga éxito.</td>
                    </tr>
                    <tr>
                        <td>Cause 41</td>
                        <td>Fallo temporal: esta causa indica que la red no está funcionando correctamente y que es poco probable que la condición dure mucho tiempo, por ejemplo, el usuario puede querer intentar otro intento de llamada casi de inmediato.</td>
                    </tr>
                    <tr>
                        <td>Cause 42</td>
                        <td>Congestión del equipo de conmutación: esta causa indica que el equipo de conmutación que genera esta causa está experimentando un período de alto tráfico.</td>
                    </tr>
                    <tr>
                        <td>Cause 43</td>
                        <td>Información de acceso descartada: esta causa indica que la red no pudo entregar la información de acceso al usuario remoto según lo solicitado, es decir, información de usuario a usuario, compatibilidad de capa baja, compatibilidad de capa alta o subdirección, como se indica en el diagnóstico. Se observa que el tipo particular de información de acceso descartada se incluye opcionalmente en el diagnóstico.</td>
                    </tr>
                    <tr>
                        <td>Cause 44</td>
                        <td>Circuito / canal solicitado no disponible: esta causa se devuelve cuando el circuito o canal indicado por la entidad solicitante no puede ser proporcionado por el otro lado de la interfaz.</td>
                    </tr>
                    <tr>
                        <td>Cause 46</td>
                        <td>Llamada de precedencia bloqueada: esta causa indica que no hay circuitos sustituibles o que el usuario llamado está ocupado con una llamada de nivel preferente igual o superior.</td>
                    </tr>
                    <tr>
                        <td>Cause 47</td>
                        <td>Recurso no disponible, no especificado: esta causa se utiliza para informar un evento de recurso no disponible solo cuando no se aplica ninguna otra causa en la clase de recurso no disponible.</td>
                    </tr>
    
                    <!-- Error SIP 400 -->
                    <tr>
                        <td class="rgba-stylish-strong text-white text-center" colspan="2">SERVICIO U OPCIÓN CLASE NO DISPONIBLE</td>
                    </tr>
                    <tr>
                        <td>Cause 50</td>
                        <td>Facilidad solicitada no suscrita - Esta causa indica que el usuario ha solicitado un servicio suplementario que es implementado por el equipo que generó esta causa, pero el usuario no está autorizado para usar.</td>
                    </tr>
                    <tr>
                        <td>Cause 53</td>
                        <td>Llamadas salientes prohibidas dentro de CUG: no se ha especificado ningún procedimiento para las redes estadounidenses.</td>
                    </tr>
                    <tr>
                        <td>Cause 55</td>
                        <td>Llamadas entrantes bloqueadas dentro de CUG - No se especifica ningún procedimiento para las redes de EE. UU.</td>
                    </tr> 
                    <tr>
                        <td>Cause 57</td>
                        <td>Capacidad portadora no autorizada - Esta causa indica que el usuario ha solicitado una capacidad portadora que es implementada por el equipo que generó esta causa, pero el usuario no está autorizado a usar.</td>
                    </tr>

                    <tr>
                        <td>Cause 58</td>
                        <td>Capacidad portadora no disponible actualmente - Esta causa indica que el usuario ha solicitado una capacidad portadora implementada por el equipo que generó esta causa pero que no está disponible en este momento.</td>
                    </tr>
                    <tr>
                        <td>Cause 62</td>
                        <td>Inconsistency in designated outgoing access information and subscriber class - Esta causa indica que hay una incoherencia en la información de acceso saliente designada y la clase de abonado.</td>
                    </tr>
                    <tr>
                        <td>Cause 63</td>
                        <td>Servicio u opción no disponible, sin especificar: esta causa se utiliza para informar un evento de servicio u opción no disponible solo cuando no se aplica ninguna otra causa en la clase de servicio u opción no disponible.</td>
                    </tr>
                    <tr>
                        <td class="rgba-stylish-strong text-white text-center" colspan="2">SERVICIO / OPCIÓN NO IMPLEMENTADA CLASE</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script> 
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "paging": false // false to disable pagination (or any other option)
  });
  $('.dataTables_length').addClass('bs-select');
});
    </script>
  

</body>
</html>
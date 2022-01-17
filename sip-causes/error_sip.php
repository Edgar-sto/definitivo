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
    <link rel="stylesheet" href="../css/vicis.css">
</head>
<body>
    <div class="container-fluid ">
        <div class="container">
            <div class="table-responsive ">
                <table id="dtBasicExample" class="jetbrains-normal table table-striped table-bordered table-sm table-warning text-dark" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm rgba-black-strong  text-center">
                                <h5># Error</h5>
                            </th>
                            <th class="th-sm rgba-black-strong  text-center">
                                <h5>Error</h5>
                            </th>
                            <th class="th-sm rgba-black-strong  text-center">
                                <h5>Descripción de error</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Error SIP 100 -->
                        <tr>
                            <td class="jetbrains-bold  text-center" colspan="3">1xx = Respuestas Informativas SIP</td>
                        </tr>
                        <tr>
                            <td>100</td>
                            <td>Tratando</td>
                            <td>Búsqueda extendida en proceso, un proxy de bifurcación debe enviar una respuesta “100 Tratando”.</td>
                        </tr>
                        <tr>
                            <td>180</td>
                            <td>Teléfono sonando</td>
                            <td>El Agente de Usuario de Destino ha recibido el mensaje INVITE y está alertando al usuario de la llamada.</td>
                        </tr>
                        <tr>
                            <td>181</td>
                            <td>Llamada está siendo redireccionada</td>
                            <td>Opcional, enviado por el servidor para indicar que una llamada esta siendo redireccionada.</td>
                        </tr>
                        <tr>
                            <td>182</td>
                            <td>Encolada</td>
                            <td>El destino no estaba disponible, el servidor ha encolado la llamada hasta que el destino este disponible.</td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Progreso de Sesión</td>
                            <td>Esta respuesta puede ser utilizada para enviar información adicional para una llamada que todavía se está estableciendo.</td>
                        </tr>
                        <tr>
                            <td>199</td>
                            <td>Diálogo Previo Terminado</td>
                            <td>Enviado por el Agente de Usuario del Servidor para indicar que un diálogo previo ha terminado.</td>
                        </tr>
                        <!-- Error SIP 200 -->
                        <tr>
                            <td class="jetbrains-bold  text-center" colspan="3">2xx = Respuestas de Éxito</td>
                        </tr>
                        <tr>
                            <td>200</td>
                            <td>OK</td>
                            <td>Muestra que la solicitud fue exitosa</td>
                        </tr>
                        <tr>
                            <td>202</td>
                            <td>Aceptada</td>
                            <td>Indica que la solicitud ha sido aceptada para procesar, se utiliza principalmente para referencia.</td>
                        </tr>
                        <tr>
                            <td>204</td>
                            <td>Sin Notificación</td>
                            <td>Indica que la solicitud fue exitosa pero no se recibirá respuesta</td>
                        </tr>
                        <!-- Error SIP 300 -->
                        <tr>
                            <td class="jetbrains-bold  text-center" colspan="3">3xx = Respuestas de Redirección</td>
                        </tr>
                        <tr>
                            <td>300</td>
                            <td>Múltiples Opciones</td>
                            <td>La dirección resuelta a una de las diferentes opciones para que el usuario o cliente elija.</td>
                        </tr>
                        <tr>
                            <td>301</td>
                            <td>Movido Permanentemente</td>
                            <td>La solicitud original URI ya no es válida, la nueva dirección se da en la cabecera de Contacto.</td>
                        </tr>
                        <tr>
                            <td>302</td>
                            <td>Movido Temporalmente</td>
                            <td>El cliente debería tratar a la dirección en el campo Contacto.</td>
                        </tr>
                        <tr>
                            <td>305</td>
                            <td>Utiliza Proxy</td>
                            <td>El campo del Contacto detalla un proxy que se debe utilizar para acceder al destino solicitado.</td>
                        </tr>
                        <tr>
                            <td>380</td>
                            <td>Servicio Alternativo</td>
                            <td>La llamada falló, pero las alternativas son detalladas en el cuerpo del mensaje.</td>
                        </tr>
                        <!-- Error SIP 400 -->
                        <tr>
                            <td class="jetbrains-bold  text-center" colspan="3">4xx = Errores de Solicitud</td>
                        </tr>
                        <tr>
                            <td>400</td>
                            <td>Solicitud Errónea</td>
                            <td>La solicitud no pudo ser entendida debido a sintaxis incorrecta.</td>
                        </tr>
                        <tr>
                            <td>401</td>
                            <td>No Autorizado</td>
                            <td>La solicitud requiere autenticación de usuario. Esta respuesta es emitida por los UASs y los registradores.</td>
                        </tr>
                        <tr>
                            <td>402</td>
                            <td>Pago Requerido</td>
                            <td>(Reservado para uso futuro).</td>
                        </tr>
                        <tr>
                            <td>403</td>
                            <td>Prohibido</td>
                            <td>El servidor entendió la solicitud, pero se rechaza el cumplimiento.</td>
                        </tr>
                        <tr>
                            <td>404</td>
                            <td>No Encontrado</td>
                            <td>El servidor tiene información definitiva de que el usuario no existe (Usuario no encontrado).</td>
                        </tr>
                        <tr>
                            <td>405</td>
                            <td>Método No Permitido</td>
                            <td>El método especificado en la Linea de Solicitud se entendió, pero no se permitió.</td>
                        </tr>
                        <tr>
                            <td>406</td>
                            <td>No aceptable</td>
                            <td>El recurso sólo es capaz de generar respuestas con contenido inaceptable.</td>
                        </tr>
                        <tr>
                            <td>407</td>
                            <td>Autenticación de Proxy Requerida</td>
                            <td>La solicitud requiere autenticación de usuario.</td>
                        </tr>
                        <tr>
                            <td>408</td>
                            <td>Expiración de Solicitud</td>
                            <td>No se pudo encontrar el usuario a tiempo.</td>
                        </tr>
                        <tr>
                            <td>409</td>
                            <td>Conflicto</td>
                            <td>Usuario ya registrado (en desuso)</td>
                        </tr>
                        <tr>
                            <td>410</td>
                            <td>Ido</td>
                            <td>El usuario existió una vez, pero no está más disponible acá.</td>
                        </tr>
                        <tr>
                            <td>411</td>
                            <td>Longitud Requerida</td>
                            <td>El servidor no aceptará la solicitud sin una longitud de contenido válida (obsoleto).</td>
                        </tr>
                        <tr>
                            <td>412</td>
                            <td>Petición Condicional Fallida</td>
                            <td>La condición preestablecida no se ha cumplido.</td>
                        </tr>
                        <tr>
                            <td>413</td>
                            <td>Entidad de Solicitud Demasiado Larga</td>
                            <td>Cuerpo de la solicitud demasiado grande.</td>
                        </tr>
                        <tr>
                            <td>414</td>
                            <td>Solicitud URI Demasiado Larga</td>
                            <td>El servidor rechaza atender la solicitud, la Solicitud-URI es más larga de lo que el servidor puede interpretar.</td>
                        </tr>
                        <tr>
                            <td>415</td>
                            <td>Tipo de Medio No Soportado</td>
                            <td>Solicitud del cuerpo está en un formato no soportado.</td>
                        </tr>
                        <tr>
                            <td>416</td>
                            <td>Esquema URI No Soportado</td>
                            <td>Solicitud-URI es desconocida para el servidor.</td>
                        </tr>
                        <tr>
                            <td>417</td>
                            <td>Prioridad del Recurso Desconocida</td>
                            <td>Hubo una etiqueta de opción de recursos con prioridad, pero no hay cabecera de Recursos con Prioridad.</td>
                        </tr>
                        <tr>
                            <td>420</td>
                            <td>Extensión Inválida</td>
                            <td>Extensión utilizada de Protocolo SIP Inválida , no es entendida por el servidor.</td>
                        </tr>
                        <tr>
                            <td>421</td>
                            <td>Extensión Requerida</td>
                            <td>El servidor necesita una extensión específica no listada en la cabecera Soportada.</td>
                        </tr>
                        <tr>
                            <td>422</td>
                            <td>Intervalo de Sesión Demasiado Pequeña</td>
                            <td>La solicitud contiene un campo de cabecera de Expiración de Sesión con una duración por debajo del mínimo.</td>
                        </tr>
                        <tr>
                            <td>423</td>
                            <td>Intervalo Muy Corto</td>
                            <td>Tiempo de expiración del recurso es demasiado corta.</td>
                        </tr>
                        <tr>
                            <td>424</td>
                            <td>Información de Ubicación Invalida</td>
                            <td>El contenido de la ubicación de la solicitud fue mal formado o insatisfactorio.</td>
                        </tr>
                        <tr>
                            <td>428</td>
                            <td>Usar Encabezado de Identidad</td>
                            <td>La política del servidor requiere una identidad de cabecera, y no sido proporcionado.</td>
                        </tr>
                        <tr>
                            <td>429</td>
                            <td>Proporcionar Identidad Referente</td>
                            <td>El servidor no recibió un clave referida válida en la solicitud.</td>
                        </tr>
                        <tr>
                            <td>430</td>
                            <td>Falla en Flujo</td>
                            <td>Un flujo específico a un agente de usuario ha fallado, aunque otros flujos pueden ser exitosos.</td>
                        </tr>
                        <tr>
                            <td>433</td>
                            <td>Anonimato No Permitido</td>
                            <td>La solicitud ha sido rechazada porque era anónima.</td>
                        </tr>
                        <tr>
                            <td>436</td>
                            <td>Info de Identidad Invalida La solicitud tiene un encabezado de Identidad</td>
                            <td>Info y el esquema URI contenido no puede ser de-referenciado.</td>
                        </tr>
                        <tr>
                            <td>437</td>
                            <td>Certificado No Compatible</td>
                            <td>El servidor no ha podido validar un certificado para el dominio que firmó la solicitud .</td>
                        </tr>
                        <tr>
                            <td>438</td>
                            <td>Cabecera de Identidad Inválida</td>
                            <td>El servidor obtuvo un certificado válido utilizado para firmar una solicitud, pero no se pudo comprobar la firma.</td>
                        </tr>
                        <tr>
                            <td>439</td>
                            <td>Primer Salto Carece de Soporte de Salida</td>
                            <td>El primer proxy de salida no admite la función de “salida”.</td>
                        </tr>
                        <tr>
                            <td>440</td>
                            <td>Amplitud Máxima Superada</td>
                            <td>Si un SIP proxy determina un contexto de respuesta que no cuenta con suficiente amplitud máxima para llevar a cabo el fork paralelo deseado y el proxy no puede compensar el fork en serie o envía una redirección, ese proxy DEBE regresar una respuesta 440. Un cliente que recibe una respuesta 440 puede que su petición no alcanzó todos los destinos posibles.</td>
                        </tr>
                        <tr>
                            <td>469</td>
                            <td>Paquete de Información Incorrecto</td>
                            <td>Si un UA SIP recibe una solicitud INFO asociada con la Información del Paquete que el UA no indicó desea recibir, el UA DEBE enviar una respuesta 469, la cual contiene un campo de cabecera Recv-Info con la Información del Paquete por la cual el UA espera recibir las peticiones INFO.</td>
                        </tr>
                        <tr>
                            <td>470</td>
                            <td>Consentimiento Necesario</td>
                            <td>La fuente de la solicitud no tenía permiso del destinatario para realizar dicha solicitud.</td>
                        </tr>
                        <tr>
                            <td>480</td>
                            <td>Temporalmente No Disponible</td>
                            <td>Destinatario no disponible en este momento.</td>
                        </tr>
                        <tr>
                            <td>481</td>
                            <td>Llamada/Transacción No Existe</td>
                            <td>El servidor recibe una solicitud que no coincide con ningún diálogo o transacción.</td>
                        </tr>
                        <tr>
                            <td>482</td>
                            <td>Bucle Detectado</td>
                            <td>El servidor ha detectado un bucle.</td>
                        </tr>
                        <tr>
                            <td>483</td>
                            <td>Demasiados Saltos</td>
                            <td>El encabezado de Reenvios-Máximos (Max-Forwards) ha alcanzado el valor “0”.</td>
                        </tr>
                        <tr>
                            <td>484</td>
                            <td>Dirección Incompleta</td>
                            <td>Solicitud-URI incompleta.</td>
                        </tr>
                        <tr>
                            <td>485</td>
                            <td>Ambiguo</td>
                            <td>Solicitud-URI ambigua</td>
                        </tr>
                        <tr>
                            <td>486</td>
                            <td>Ocupado acá</td>
                            <td>Destinatario está ocupado</td>
                        </tr>
                        <tr>
                            <td>487</td>
                            <td>Solicitud Terminada</td>
                            <td>Solicitud ha terminado por bye o cancelar</td>
                        </tr>
                        <tr>
                            <td>488</td>
                            <td>No Aceptable Aquí</td>
                            <td>Algunos aspectos de la descripción de la sesión de la Solicitud URI no son aceptables.</td>
                        </tr>
                        <tr>
                            <td>489</td>
                            <td>Evento Inválido</td>
                            <td>El servidor no ha comprendido un paquete de evento especificado en un campo de cabecera “Evento”.</td>
                        </tr>
                        <tr>
                            <td>491</td>
                            <td>Solicitud Pendiente</td>
                            <td>El servidor tiene alguna solicitud pendiente desde el mismo diálogo.</td>
                        </tr>
                        <tr>
                            <td>493</td>
                            <td>Indescifrable</td>
                            <td>Solicitud Indescifrable contiene un cuerpo MIME cifrado, que el destinatario no puede descifrar.</td>
                        </tr>
                        <tr>
                            <td>494</td>
                            <td>Acuerdo de Seguridad Requerido</td>
                            <td>El servidor ha recibido una solicitud que requiere un mecanismo de seguridad negociado.</td>
                        </tr>
                        <!-- Error SIP 500 -->
                        <tr>
                            <td class="jetbrains-bold  text-center" colspan="3">5xx = Errores de Servidor</td>
                        </tr>
                        <tr>
                            <td>500</td>
                            <td>Error Interno del Servidor</td>
                            <td>El servidor no ha podido cumplir con la solicitud debido a alguna condición inesperada</td>
                        </tr>
                        <tr>
                            <td>501</td>
                            <td>No Implementado</td>
                            <td>El método de solicitud SIP no se ha implementado acá.</td>
                        </tr>
                        <tr>
                            <td>502</td>
                            <td>Gateway Inválido</td>
                            <td>​El servidor, recibió una respuesta inválida de un servidor aguas abajo al intentar cumplir con una solicitud.</td>
                        </tr>
                        <tr>
                            <td>503</td>
                            <td>Servicio No Disponible</td>
                            <td>El servidor está en mantenimiento o está sobrecargado temporalmente y no puede procesar la solicitud.</td>
                        </tr>
                        <tr>
                            <td>504</td>
                            <td>Expiración de Servidor</td>
                            <td>El servidor trató de acceder a otro servidor mientras intentaba procesar una solicitud, no hay respuesta a tiempo.</td>
                        </tr>
                        <tr>
                            <td>505</td>
                            <td>Versión No Soportada</td>
                            <td>La versión del protocolo SIP en la solicitud no es soportada por el servidor.</td>
                        </tr>
                        <tr>
                            <td>513</td>
                            <td>Mensaje Demasiado Largo</td>
                            <td>La longitud del mensaje de solicitud es más largo que lo que el servidor puede procesar.</td>
                        </tr>
                        <tr>
                            <td>555</td>
                            <td>Servicio de Notificación Push No Soportado</td>
                            <td>El servidor no soporta el servicio de notificación push recibido especificado en el parámetro de pn-provider SIP URI.</td>
                        </tr>
                        <tr>
                            <td>580</td>
                            <td>Falla de Pre condición</td>
                            <td>El servidor no puede o no quiere cumplir algunas restricciones especificadas en la oferta.</td>
                        </tr>
                        <!-- Error SIP 600 -->
                        <tr>
                            <td class="jetbrains-bold  text-center" colspan="3">6xx = Errores Globales</td>
                        </tr>
                        <tr>
                            <td>600</td>
                            <td>Ocupado en Todas Partes</td>
                            <td>Todos los posibles destinos están ocupados.</td>
                        </tr>
                        <tr>
                            <td>603</td>
                            <td>Declinación</td>
                            <td>El destinatario no puede / no quiere participar de la llamada, no hay destinos alternativos.</td>
                        </tr>
                        <tr>
                            <td>604</td>
                            <td>No Existe en Ninguna Parte</td>
                            <td>El servidor tiene información fidedigna de que el usuario solicitado no existe en ninguna parte.</td>
                        </tr>
                        <tr>
                            <td>606</td>
                            <td>No Aceptable</td>
                            <td>El agente del usuario fue contactado con éxito pero algunos aspectos de la descripción de la sesión no eran aceptables.</td>
                        </tr>
                        <tr>
                            <td>607</td>
                            <td>No Deseado</td>
                            <td>La parte a la cual ha llamado no desea recibir la llamada desde la parte que llama. Es muy probable que los intentos futuros desde la parte que llamada sean rechazados de forma similar.</td>
                        </tr>
                        <tr>
                            <td>610</td>
                            <td>Bloqueo por intentos</td>
                            <td>El erro aparece cuando la llamada sale por IPCOM.</td>
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
        $(document).ready(function() {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
        $(document).ready(function() {
            $('#dtBasicExample').DataTable({
                "paging": false // false to disable pagination (or any other option)
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>


</body>
</html>
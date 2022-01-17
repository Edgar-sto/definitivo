
<?php

$ftp_server = "10.9.2.20";
$ftp_user = "vicihsbc";
$ftp_pass = "HsBc18.vici";





// establecer una conexión o finalizarla
$conn_id = ftp_connect($ftp_server) or die("No se pudo conectar a $ftp_server");

// intentar iniciar sesión
if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
    echo "Conectado como $ftp_user@$ftp_server\n";

    //OBTENER DIRECTORIO ACTUAL
    echo "Directorio actual: " . ftp_pwd($conn_id) . "\n";

    // intenta cambiar el directorio a somedir
        if (ftp_chdir($conn_id, "SRV.34")) {
            echo "El directorio actual es: " . ftp_pwd($conn_id) . "\n";

            // Obtener los archivos contenidos en el directorio actual
            $contents = ftp_nlist($conn_id, ".");

            foreach ($contents as $archivo ) {
                $archivo;

                //NOMBRE DE ARCHIVO A BUSCAR
                $server_file = $archivo;
                //nombre de archivo a descargar
                $local_file = $server_file;

                // intenta descargar $server_file y guardarlo en $local_file
                if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
                    echo "Se ha guardado satisfactoriamente en $local_file\n";
                } else {
                    echo "Ha habido un problema\n";
                }
            }//CIERRE FOREACH
        } else { 
            echo "No se pudo cambiar al directorio\n";
        }//CIERRE IF CAMBIO DE DIRECTORIO





    // $dir = 'www';
    // if (ftp_mkdir($conn_id, $dir)) {
    //     echo "creado con éxito $dir\n";
    // } else {
    //     echo "Ha habido un problema durante la creación de $dir\n";
    // }

} else {
    echo "No se pudo conectar como $ftp_user\n";
}//CIERRE IF DE LOGEO

// cerrar la conexión ftp
ftp_close($conn_id);



// $email  = 'name@example.com';
// $domain = strstr($email, '@');
// echo $domain; // mostrará @example.com

// $user = strstr($email, '@', true); // Desde PHP 5.3.0
// echo $user; // mostrará name



// $texto = 'Este es un texto Simple.';

// // esto imprime "e es un texto Simple." ya que 'e' coincide primero
// echo strpbrk($texto, 'me');

// // esto imprime "Simple." ya que los caracteres son sensibles a mayúsculas/minúsculas
// echo strpbrk($texto, 'S');
?>
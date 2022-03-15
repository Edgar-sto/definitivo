<?php
require 'conexion.php';
$conexion = conexion_dc_centos("telefonia", "127.0.0.1");
$sucursales = $_POST['tipo'];

if($sucursales=='i'||$sucursales=='e'){
    $query = " SELECT DISTINCT sucursal,vici FROM sucu_campa_grup  WHERE tipo='{$sucursales}' GROUP BY sucursal;";
    $answer = $conexion->query($query);
    ?>
    <select class="form-select" id="sucursal" name="sucursal" required>
        <?php
        while ($row = $answer->fetch_object()) {
            $row->sucursal;
            $row->vici;
            echo "<option value='{$row->sucursal}'>{$row->sucursal}</option>";
        }
        ?>
    </select>
    <?php
} else {
    $query = " SELECT DISTINCT sucursal,vici FROM sucu_campa_grup  WHERE tipo IN ('{$sucursales}') GROUP BY sucursal;";
    $answer = $conexion->query($query);
    ?>
    <select class="form-select" id="sucursal" name="sucursal" required>
    <?php
    while ($row = $answer->fetch_object()) {
        $row->sucursal;
        $row->vici;
        echo "<option value='{$row->sucursal}'>{$row->sucursal}</option>";
    }
    ?>
    </select>
    <?php
}
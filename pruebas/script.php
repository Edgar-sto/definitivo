<?php
require '../reporte_tel/clases/conexion.php';
$conexion = conexion_dc_centos("telefonia", "127.0.0.1");
$sucursales=$_POST['tipo'];


$query="SELECT DISTINCT sucursal,vici FROM sucu_campa_grup  WHERE tipo='{$sucursales}';";
$answer=$conexion->query($query);
?>
    <label for="validationCustom04" class="form-label">Sucursales y vici</label>
        <select class="form-select" id="sucursal" required>

<?php

while ($row=$answer->fetch_object()) {
    $row->sucursal;
    $row->vici;
        echo "<option value='{$row->sucursal}'>{$row->sucursal}</option>";
}
?>
    </select>
    <div class="invalid-feedback">
        Please select a valid state.
    </div>

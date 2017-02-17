<?php
$path = "/weather/proyects/";
?>
<h2>Agregar nuevo cliente</h2>
<form id="nuevoc" name="nuevoc" action="<?=$path?>insertanuevo/" method="post">
    <label>Introduzca el nombre comercial del nuevo cliente</label>
    <br>
    <input type="text" id="clienten" name="clienten"/>
    <p>Recuerde que antes de ejectutar el proyecto, debe llenar los datos completos de este cliente.</p>
    <button id="cancelador" onclick="">Regresar</button>
    <input type="submit" value="Agregar nuevo"/>
</form>

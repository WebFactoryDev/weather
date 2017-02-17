<?php
        if($id_cliente<0){
            $id_cliente = -$id_cliente;
            $texto = "El cliente $ncliente con id=$id_cliente ya existe<br>";
        } else{
            $texto = "El cliente $ncliente se ha insertado con id=$id_cliente";
        }

?>
<label><?=$texto?></label>
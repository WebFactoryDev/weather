<?php
$selclientes = $Arreglo['selclientes'];
$tiposp = $Arreglo['tipos'];
$instruc = $Arreglo['instr'];
$path = "/weather/proyects/";
    echo $this->Html->script(array(
                                        'https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js',   'https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js'
    ));
?>

<h2>
Creación de proyectos.
</h2>
<div>
    <form id="fcreaproyecto" name="fcreaproyecto" action="<?=$path?>proyespecifica/" method="post">
        <div>
            <?=$selclientes?>
        </div><br><br>
        <div>
            <button id="nuevocl" onclick="abreventana();">Agregar Cliente</button>
        </div><br><br>
        <div>
            <?=$tiposp?>
        </div><br>
        <div>
            <?=$instruc?>
        </div><br>
        <div>
            <label>¿Preguntas en orden aleatorio?</label><br>
            <input type="radio" name="aleatorio" value='0' checked />No<br>
            <input type="radio" name="aleatorio" value='1' />Si<br>
        </div>
        <br>
        <div>
            <button id="btagrega" onclick="validador();">Agregar</button>
        </div>
        
    </form>
</div>
<script>
    $(document).ready(function(){
        
    });
</script>
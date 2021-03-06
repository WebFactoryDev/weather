

<?= $this->Html->css(['assets/widgets/input-switch/inputswitch.css','assets/widgets/input-switch/inputswitch-alt.css']) ?>
<?php 

    // print_r($tipos);
 ?>


<?= $this->Html->script(['widgets/datepicker/datepicker.js','widgets/input-switch/inputswitch.js','dpicker_mx.js']) ?>

<script>
    $(function() {
        $.datepicker.setDefaults($.datepicker.regional['es-MX']);

        $('.bootstrap-datepicker').datepicker({
                        setDate: '25/02/2013'
                        , altField: '#fecha_texto'
                        , altFormat: "DD, d 'de' MM 'de' yy"
                    });
    });
</script>
<!-- EMPIEZA HTML -->

<div id="page-content-wrapper">
    <div id="page-content">
                    
        <div class="container">

<div id="page-title">
    <h2>Proyectos</h2>
    <!-- <p>Nuevo</p> -->
          
</div>

<div class="panel">
    <div class="panel-body">

        <h3 class="title-hero">
            Nuevo
        </h3>

        <div class="example-box-wrapper">

            <form class="form-horizontal bordered-row">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Cliente</label>
                    <div class="col-sm-4">
                       
                        <input class="form-control" id="cliente" name="cliente">
                       
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <button class="btn btn-purple">Agregar nuevo cliente</button>
                    </div>

                </div>

                <div class="form-group">
                        <label class="col-sm-3 control-label">Tipo</label>
                        <div class="col-sm-6">
                            <?php
                                for($k=0;$k<count($tipos);$k++){
                                    $idtipo = $tipos[$k]->id;
                                    $nombre = $tipos[$k]->tipo;
                                    $idname = "ck$idtipo";
                            ?>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="ck[]" id="<?=$idname?>" value="<?=$idtipo?>">
                                <?=$nombre?>
                            </label>
                            <?php
                                }
                            ?>
                        </div>
                </div>
                <?php
                   
                    $primerlabel = "Instrucciones";
                    $primerbr = "";
                    for($k=0;$k<count($tipos);$k++){
                        $idtipo = $tipos[$k]->id;
                        $nombre = $tipos[$k]->tipo;
                        
                ?>
                <div class="form-group">
        
                        <label class="col-sm-3 control-label"><?=$primerlabel?></label>
                        <div class="col-sm-6">
                            <?=$nombre?>
                            <textarea id="tx<?=$idtipo?>" name="tx<?=$idtipo?>" rows="3" class="form-control textarea-no-resize" disabled></textarea>
                        </div>

                </div>
                <?php
                    
                        $primerlabel = "";
                    }
                    
                ?>
                <div class="form-group">
                    
                        <label class="col-sm-3 control-label">Reemplazo en preguntas</label>
                        <div class="col-sm-4">
                            Sustituir palabra clave por (&lt;clave&gt;) por:
                            <br>
                            <label class="radio-inline">
                                <input type="radio" id="" name="clave" value="corto">
                                Nombre corto cliente
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="" name="clave" value="personalizado">
                                Personalizado
                            </label>
                        
                        </div>
                        <div class="col-sm-2">
                                <input id="txClave" type="text" name="txClave" class="form-control" disabled>
                        </div>
                </div>
                <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Duración de ejecución</label>

                            <div class="col-sm-2">
                            Desde
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">
                                        <i class="glyph-icon icon-calendar"></i>
                                    </span>
                                    <input name="desde" type="text" class="bootstrap-datepicker form-control" value="" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                            <div class="col-sm-2">
                            Hasta
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">
                                        <i class="glyph-icon icon-calendar"></i>
                                    </span>
                                    <input name="hasta" type="text" class="bootstrap-datepicker form-control" value="" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Orden aleatorio en encuestas</label>
                    <div class="col-sm-3">
                        
                        <input id="random" name="random" type="checkbox" class="input-switch-alt" value="si">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-2">
                        <button id="cancelar" class="btn btn-danger"><i class="glyph-icon icon-times-circle" onclick="goBack()"></i> Cancelar</button>
                    </div>
                    <div class="col-sm-5">
                        <button id="guardar" class="btn btn-primary"><i class="glyph-icon icon-save"></i> Guardar</button>
                    </div>
                </div>
                
                 <input id="cliente_id" name="cliente_id" type="hidden">
                <input id="cliente_clv" name="cliente_clv" type="hidden">
            </form>
            
        </div>

    </div> <!-- Fin container -->
</div>

        </div> <!-- Fin container -->
    </div> <!-- Fin page-content -->
</div> <!-- fin page-content-wrapper -->



<!-- FIN HTML -->


<script type="text/javascript">
    /* Datepicker bootstrap */
    
    $(function() { "use strict";
        $('.bootstrap-datepicker').bsdatepicker({
            format: 'yyyy-mm-dd'

        });
    });

</script>
<script type="text/javascript">
    /* Input switch */

    $(function() { "use strict";
        $('.input-switch').bootstrapSwitch();
    });

    function goBack() { 
        window.history.back();
    }

</script>

<script type="text/javascript">
    $(document).ready(function(){
        
        // Omar170221: Hay que resolver la cuestion de que es lento
        // igual es la velocidad adecuada para meter mas caracteres
        // O puede ser porque el sistema cakePHP distribuye el controlador
        // lentamente, o haya que usar otro modo de llamar a ajax/json.
        
        $( "#cliente" ).autocomplete({
            source: "/projects/obtenclientes",
            focus: function(ev, ui){
                //$("#cliente").val(ui.item.label);
                return false;
            },
            select: function(ev, ui){
                $("#cliente").val(ui.item.label);
                $("#cliente_id").val(ui.item.value);
                $("#cliente_clv").val(ui.item.clave);
                return false;
            }
        });

        <?php
            // OSG170220: No estoy de acuerdo con esto pero las voy a
            // generar asi.
            for($k=0;$k<count($tipos);$k++){
                $idtipo = $tipos[$k]->id;
                echo "\$(\"#ck$idtipo\").change(function(){
                    if(this.checked) {
                    \$('#tx$idtipo').prop('disabled', false);
                    }
                    else if(!(this.checked)){
                    \$('#tx$idtipo').prop('disabled', true);
                    \$('#tx$idtipo').val('');
                    }
                });
                ";
            }
        ?>

        $("switch-on").change(function(){
            $('#random').prop('checked', true);
        });

        $('input:radio[name="clave"]').change(function(){
            if($(this).val() == 'personalizado'){
               $('#txClave').prop('disabled', false);
            }
            else
            {
                $('#txClave').prop('disabled', true);
            }
        });

        $("#guardar").click(function(){
            
            var formData = new FormData($("#newProjectForm")[0]);

                   $.ajax({
                        url : "/projects/creaProyectos",
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    })
                    .done(function(msg){

                        if(msg==1)
                        {
                            bootbox.alert("Se ha agregado correctamente");
                            window.location.reload();
                        }
                        else
                        {
                            bootbox.alert("Algo sali&oacute; mal, intenta m&aacute;s tarde");
                        }
                    });
                    
                
        });
           
    });

 
</script>

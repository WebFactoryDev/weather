

<?= $this->Html->css(['assets/widgets/input-switch/inputswitch.css','assets/widgets/input-switch/inputswitch-alt.css']) ?>
<?php 

    // print_r($tipos);
 ?>
    <div id="page-content-wrapper">
        <div id="page-content">
                    
            <div class="container">
                <div id="page-title">
                    <h2>Proyectos</h2>
                    <p>Nuevo</p>
                    <div id="theme-options" class="admin-options">
                    </div>
                </div>
            </div>


        <div class="panel">
        <form id="newProjectForm" enctype="multipart/form-data" method="post">
            <div class="example-box-wrapper">  
            <br>  
                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <label class="col-sm-1 control-label">Cliente</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="cliente">
                            <option></option>

                            <?php foreach ($clientes as $key => $value) { ?>
                                <option value="<?= $value->id.'*'.$value->nombre_comercial; ?>"><?= $value->nombre_comercial; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <button class="btn btn-purple">Agregar nuevo cliente</button>
                    </div>

                </div>
                <br><br><br>
                <div class="form-group">
                    <div class="col-sm-1"></div>
                        <label class="col-sm-1 control-label">Tipo</label>
                        <div class="col-sm-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="ckClima" id="ckClima" value="<?= $tipos[0]->id; ?>">
                                CLIMA ORGANIZACIONAL
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="ckLider" id="ckLider" value="<?= $tipos[1]->id; ?>">
                                LIDERAZGO
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="ckCompetencia" id="ckCompetencia" value="<?= $tipos[2]->id; ?>">
                                COMPETENCIAS
                            </label>
                          
                        </div>
                </div>
                <br><br><br>
                <div class="form-group">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 control-label">Instrucciones</label>
                        <div class="col-sm-6">
                            Clima Organizacional
                            <textarea id="txClima" name="txClima" rows="3" class="form-control textarea-no-resize" disabled></textarea>
                        </div>

                </div>
                <br><br><br><br><br>
                <div class="form-group">
                    <div class="col-sm-2"></div>
                        <label class="col-sm-1 control-label"></label>
                        <div class="col-sm-6">
                            Liderazgo
                            <textarea id="txLider" name="txLider" rows="3" class="form-control textarea-no-resize" disabled></textarea>
                        </div>
                </div>
                <br><br><br><br><br>
                <div class="form-group">
                    <div class="col-sm-2"></div>
                        <label class="col-sm-1 control-label"></label>
                        <div class="col-sm-6">
                            Competencias
                            <textarea id="txCompetencia" name="txCompetencia" rows="3" class="form-control textarea-no-resize" disabled></textarea>
                        </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                 <div class="form-group">
                    
                        <label class="col-sm-2 control-label">Reemplazo en preguntas</label>
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
                                <input type="text" name="txClave" class="form-control">
                        </div>
                </div>
                <br>
                <br>
                <br>
                <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Duración de ejecución</label>

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
                <br>
                <br>
                <br>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Orden aleatorio en encuestas</label>
                    <div class="col-sm-3">
                        
                        <input id="random" name="random" type="checkbox" class="input-switch-alt" value="si">
                    </div>
                </div>

            </div>
        </form>
            <br>
            <br>
            <br>
            <div class="col-sm-8"></div>
            <div class="col-sm-3"><button id="guardar" class="btn btn-purple"><i class="glyph-icon icon-save"></i> Guardar</button></div>
            <br>
        <div class="panel-body">
            

        </div>
        </div>
         
        
       

</div>
</div>
    

<?= $this->Html->script(['widgets/datepicker/datepicker.js','widgets/input-switch/inputswitch.js']) ?>

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
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $("#ckClima").change(function(){
            if(this.checked) {
                $('#txClima').prop('disabled', false);
            }
            else if(!(this.checked)){
                $('#txClima').prop('disabled', true);
                $('#txClima').val('');
            }
        });

        $("#ckLider").change(function(){
            if(this.checked) {
                $('#txLider').prop('disabled', false);
            }
            else if(!(this.checked)){
                $('#txLider').prop('disabled', true);
                $('#txLider').val('');
            }
        });

        $("#ckCompetencia").change(function(){
            if(this.checked) {
                $('#txCompetencia').prop('disabled', false);
            }
            else if(!(this.checked)){
                $('#txCompetencia').prop('disabled', true);
                $('#txCompetencia').val('');
            }
        });

        $("switch-on").change(function(){
            $('#random').prop('checked', true);
        });

        $("#guardar").click(function(){
            
            var formData = new FormData($("#newProjectForm")[0]);

                bootbox.confirm({
                    message: "¿Estás seguro de guardar el nuevo proyecto?",
                    buttons: {
                        confirm: {
                            label: 'Sí',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'No',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        $.ajax({
                            url : "/weather/projects/creaProyectos",
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
                    }
                });
        });
           
    });

 
</script>
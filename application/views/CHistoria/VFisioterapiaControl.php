<style type="text/css">
fieldset {
    border: 1px ridge #0f0fef;
    /* Borde */
}

legend {
    text-align: left;
    /* Puedes cambiarlo por center o right */
    width: inherit;
    /* Or auto */
    padding: 0 10px;
    /* To give a bit of padding on the left and right */
    border-bottom: none;
    font-size: 16px;
}
</style>
<div class="bg-white">
<div class="mx-auto" style="width: 1300px;">
    <h5 style="color: blue;">HISTORIA CLINICA FISIOTERAPIA CONTROL PROGRAMA DE GESTION DEL RIESGO CARDIORENAL- <?= $detalles_cita[0]->citFecha ?></h5>
    <form name="formulario" method="post" action="<?php echo site_url('CHistoria/guardar'); ?>">
        <?php foreach ($historia as $h) { ?>
            <input hidden="" name='id' value='<?= $cita ?>' />
            <input type="text" name="idHistoria" id="idHistoria" required="" value="<?= $idHistoria ?>" hidden>
            <fieldset>
                <legend>DATOS PACIENTE</legend>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-2">
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $detalles_cita[0]->nom_abreviacion . " " . $detalles_cita[0]->pacDocumento . "<br>";
                        
                        echo $detalles_cita[0]->pacNombre . " " . $detalles_cita[0]->pacNombre2 . " " . $detalles_cita[0]->pacApellido. " " . $detalles_cita[0]->pacApellido2; 
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $detalles_cita[0]->pacFecNacimiento . "<br>";
                        list($anio, $mes, $dia) = explode("-", $detalles_cita[0]->pacFecNacimiento);
                        $anio_dif = date("Y") - $anio;
                        $mes_dif = date("m") - $mes;
                        $dia_dif = date("d") - $dia;

                        if ($dia_dif < 0 || $mes_dif < 0) {
                            $anio_dif--;
                            //return $anio_dif;
                        }

                        echo $anio_dif . "Años";
                        ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>SEXO</strong><br>
                        <?php if ($detalles_cita[0]->pacSexo == "M") {
                            echo "MASCULINO";
                        } else {
                            echo "FEMENINO";
                        } ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>ESTADO CIVIL</strong><br>
                        <?php echo $detalles_cita[0]->pacEstCivil; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>TELÉFONO</strong><br>
                        <?php echo $detalles_cita[0]->pacTelefono; ?>
                    </div>
                    <div class="form-group col-md-2">
                        <strong>DIRECCIÓN</strong><br>
                        <?php
                        echo $detalles_cita[0]->depNombre . " - " . $detalles_cita[0]->munNombre . "<br>" . $detalles_cita[0]->pacDireccion; ?>
                    </div>
                </div>
                <div class="form-row" style="text-align:center">
                    <div class="form-group col-md-3">
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $detalles_cita[0]->empNombre; ?>
                    </div>

                    <div class="form-group col-md-3">
                        <strong>RÉGIMEN</strong><br>
                        <?php echo $detalles_cita[0]->regNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>OCUPACIÓN</strong><br>
                        <?php echo $detalles_cita[0]->ocuNombre; ?>
                    </div>
                    <div class="form-group col-md-3">
                        <strong>BRIGADA</strong><br>
                        <?php echo $detalles_cita[0]->zonNombre; ?>
                    </div>
                </div>

            </fieldset><br>
          
            <fieldset>
                <legend>ACUDIENTE</legend>
                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-4">
                        <strong>NOMBRE ACOMPAÑANTE</strong>
                        <input class="form-control input-sm" name="acompanante" id="acompanante" type="text" placeholder="Nombre" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <strong>PARENTESCO</strong>
                        <input class="form-control input-sm" name="parentesco" id="parentesco" type="text" placeholder="Parentesco" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <strong>TELÉFONO</strong>
                        <input class="form-control input-sm" name="telefono" id="telefono" type="text" required="" placeholder="Telefono">
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>MOTIVO CONSULTA</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                      
                        <strong>MOTIVO CONSULTA</strong>
                            <textarea class="form-control" name="motivo_complementaria" rows="2" required="" placeholder="Motivo consulta" id="motivo_complementaria"></textarea>
                        </div>
                     
                </div>
            </fieldset><br>
      
            <fieldset>
            <legend>DATOS FISICOS</legend>
            <div class="form-row"style="margin: 10px;">
                   
                
                    <div class="form-group col-md-6">
                        <strong>PESO KG</strong>
                        <input type="number" name="peso" id="peso" class="form-control" required="" placeholder="Peso KG" onchange="calcular_imc();">
                    </div>
                    <div class="form-group col-md-6">
                        <strong>TALLA CM</strong>
                        <input class="form-control" name="talla" id="talla" required="" type="number" placeholder="1.73" onchange="calcular_imc();">
                    </div>
                </div>
                <div style="margin: 10px;">
                    <div class="form-row">

                    <div class="form-group col-md-6">
                        <strong>IMC</strong>
                        <input type="number" name="imc" id="imc" class="form-control" required="" placeholder="IMC" readonly="">
                    </div>
                    <div class="form-group col-md-6">
                        <strong>PERIMETRO ABDOMINAL</strong>
                        <input class="form-control" name="perimetro_abdominal" id="perimetro_abdominal" required="" type="number" value="0">
                    </div>
                </div>
                </fieldset><br>    

    
           <fieldset>
           <legend>PLAN DE TRATAMIENTO</legend>
                        <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <textarea class="form-control" name="plan_seguir" placeholder="Plan de tratamiento" required="" rows="2" id="plan_seguir"></textarea>
                    </div>
                </div>
            </div><br>

    </fieldset><br>
    <fieldset>        
         <legend>OBSERVACIONES</legend>
         <div style="margin: 10px;">
     <div class="form-row">
         <div class="form-group col-md-6">
         <textarea class="form-control" name="observaciones_generales" placeholder="Observaciones generales" required="" rows="2" id="observaciones_generales"></textarea>
     </div>
 </div>
</div><br>

  </fieldset>
  <br>


<fieldset>
<legend>REMISIÓN</legend>
<div style="margin: 10px;">
<div class="row">
<div class="col-sm-12">
    <div id="mens_remision"></div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="6">
                    <center>FORMATO DE REMISIÓN</center>
                </th>
            </tr>
            <tr>
                <th>REMISIÓN</th>
                <th>OBSERVACIÓN</th>
                <th>OPCIÓN</th>
            </tr>
        </thead>
        <tr>
            <form>
                <td>
                    <input type="text" name="idRemision" id="idRemision" hidden="">
                    <input type="text" id="remision" name="remision" onKeyUp="buscar_remision();" class="form-control" placeholder="Remisión" />
                    <div id="lista_nombre_remision" style="display: none;"></div>
                </td>
                <td>
                    <input type="text" class="form-control" name="remObservacion" id="remObservacion" placeholder="Observación" />
                </td>
                <td>
                    <a id="add_remision" class="btn btn-outline-info">Agregar</a>
                </td>
            </form>
        </tr>
    </table>
    <br><br>
    <table class="table table-bordered" id="data1">
        <thead>
            <tr>
                <th colspan="7">
                    <center>FORMULA DE REMISIÓN <?php echo date("Y-m-d", time()); ?></center>
                </th>
            </tr>
            <tr>
                <th> 
                    <input type="checkbox" id="remisionTodos" class="checkRedondo"> SELECCIONAR
                </th>
                <th>CÓDIGO</th>
                <th>REMISIÓN</th>
                <th>OBSERVACIÓN</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($remision_historia as $r) {
                echo "<tr>";
                echo "<td><input type='checkbox' class='checkEliminar checkRemision' value='{$r->id_his_rem}' style='border-radius: 50%;'></td>";
                echo "<td>". $r->remCodigo . "</td>";
                echo "<td>" . $r->remNombre . "</td>";
                echo "<td>" . $r->remObservacion . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="modal-footer">
        <a class="btn btn-outline-danger" id="botonEliminarRemisiones" style="border-radius: 50px;">Eliminar</a>
    </div>
</div>
</div>
</div>
</fieldset>
<br>




<fieldset>
<legend>DIAGNÓSTICO</legend>
<div class="form-row" style="margin: 10px;">
<div class="col-sm-12">
<div id="mens_diagnostico"></div>
</div>
<!-- Diagnóstico principal -->
<div class="form-group col-md-2">
<strong>Diagnóstico</strong><br>
<em>Principal</em>
</div>
<div class="form-group col-md-2">
<strong>Código</strong>
<input class="form-control input-sm" type="text" placeholder="Buscar por código" onKeyUp="buscar_codigo();" id="codigo" name="codigo">
<div id="lista_codigo_diagnostico" style="display: none;"></div>
</div>
<div class="form-group col-md-4">
<strong>Nombre</strong>
<input type="text" name="idDiagnostico" id="idDiagnostico" hidden="">
<input type="text" name="tipo_item" id="tipo_item" hidden="" value="PRINCIPAL">
<input type="text" id="diagnostico" name="diagnostico" onKeyUp="buscar_diagnostico();" class="form-control" placeholder="Buscar por nombre">
<div id="lista_nombre_diagnostico" style="display: none;"></div>
</div>
<div class="form-group col-md-3">
<strong>TIPO DIAGNÓSTICO</strong>
<select name="tipo_diagnostico" id="tipo_diagnostico" required="" class="form-control input-sm">
    <option value="CONFIRMADO NUEVO">CONFIRMADO NUEVO</option>
    <option value="REPETIDO">REPETIDO</option>
    <option value="IMPRESION DIAGNOSTICA">IMPRESIÓN DIAGNÓSTICA</option>
</select>
</div>
<div class="form-group col-md-1"><br>
<a id="add_diagnostico" class="btn btn-outline-primary">Guardar</a>
</div>

<!-- Diagnóstico Dx 1 -->
<div class="form-group col-md-2">
<strong>Diagnóstico</strong><br>
<em>Dx 1</em>
</div>
<div class="form-group col-md-2">
<strong>Código</strong>
<input class="form-control input-sm" type="text" placeholder="Buscar por código" onKeyUp="buscar_codigo1();" id="codigo1">
<div id="lista_codigo_diagnostico1" style="display: none;"></div>
</div>
<div class="form-group col-md-4">
<strong>Nombre</strong>
<input type="text" name="idDiagnostico1" id="idDiagnostico1" hidden="">
<input type="text" name="tipo_item1" id="tipo_item1" hidden="" value="TIPO">
<input type="text" id="diagnostico1" name="diagnostico1" onKeyUp="buscar_diagnostico1();" class="form-control" placeholder="Buscar por nombre">
<div id="lista_nombre_diagnostico1" style="display: none;"></div>
</div>
<div class="form-group col-md-3">
<strong>TIPO DIAGNÓSTICO</strong>
<select name="tipo_diagnostico1" id="tipo_diagnostico1" required="" class="form-control input-sm">
    <option value="CONFIRMADO NUEVO">CONFIRMADO NUEVO</option>
    <option value="REPETIDO">REPETIDO</option>
    <option value="IMPRESION DIAGNOSTICA">IMPRESIÓN DIAGNÓSTICA</option>
</select>
</div>
<div class="form-group col-md-1"><br>
<a id="add_diagnostico1" class="btn btn-outline-primary">Guardar</a>
</div>

<!-- Tabla de Diagnósticos -->
<div id="data3">
<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="7">
                <center>FORMATO DIAGNÓSTICO <?php echo date("Y-m-d", time()); ?></center>
            </th>
        </tr>
        <tr>
            <th><input type="checkbox" id="diagnosticoTodos" class="checkRedondo"> SELECCIONAR</th>
            <th>CÓDIGO</th>
            <th>DIAGNÓSTICO</th>
            <th>CLASIFICACIÓN</th>
            <th>TIPO</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($diagnostico_historia as $dh) {
            echo "<tr>";
            echo "<td><input type='checkbox' class='checkEliminar' value='{$dh->id_his_dia}' style='border-radius: 50%;'></td>";
            echo "<td>" . $dh->diaCodigo . "</td>";
            echo "<td>" . $dh->diaNombre . "</td>";
            echo "<td>" . $dh->his_dia_tipo . "</td>";
            echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
            echo "</tr>";
        }
        $contador = count($diagnostico_historia);
        ?>
    </tbody>
</table>
<div class="modal-footer">
    <a class="btn btn-outline-danger" id="botonEliminarDiagnosticos" style="border-radius: 50px;">Eliminar</a>
</div>
</div>

<!-- Causa Externa -->
<div class="form-group col-md-6">
<strong>CAUSA EXTERNA</strong>
<select name="causa_externa" required="" class="form-control input-sm">
    <option value="ACCIDENTE DE TRABAJO">ACCIDENTE DE TRABAJO</option>
    <option value="ACCIDENTE DE TRANSITO">ACCIDENTE DE TRÁNSITO</option>
    <option value="ACCIDENTE RABICO">ACCIDENTE RÁBICO</option>
    <option value="ACCIDENTE OFIDICO">ACCIDENTE OFÍDICO</option>
    <option value="OTRO TIPO DE ACCIDENTE">OTRO TIPO DE ACCIDENTE</option>
    <option value="EVENTO CATASTROFICO">EVENTO CATASTRÓFICO</option>
    <option value="LESION POR AGRESION">LESIÓN POR AGRESIÓN</option>
    <option value="LESION AUTO INFLIGIDA">LESIÓN AUTO INFLIGIDA</option>
    <option value="SOSPECHA DE MALTRATO FISICO">SOSPECHA DE MALTRATO FÍSICO</option>
    <option value="SOSPECHA DE ABUSO SEXUAL">SOSPECHA DE ABUSO SEXUAL</option>
    <option value="SOSPECHA DE VIOLENCIA SEXUAL">SOSPECHA DE VIOLENCIA SEXUAL</option>
    <option value="SOSPECHA DE MALTRATO EMOCIONAL">SOSPECHA DE MALTRATO EMOCIONAL</option>
    <option value="ENFERMEDAD GENERAL">ENFERMEDAD GENERAL</option>
    <option value="ENFERMEDAD PROFESIONAL">ENFERMEDAD PROFESIONAL</option>
    <option value="OTRA">OTRA</option>
</select>
</div>
</div>
</fieldset>
<br>




    <div style="border: ridge #0f0fef 1px;">
        <div class="form-row" style="margin: 10px;">
            <div class="form-group col-md-12">
                <strong>FINALIDAD</strong>
                <input class="form-control input-sm" name="finalidad" type="text" required="" value="NO APLICA" readonly="">
            </div>
        </div>
    </div><br>




    <div style="border: ridge #0f0fef 1px;">
        <div class="form-row" style="margin: 10px; text-align:center;">
            <div class="form-group col-md-6">
                <?php

                echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($detalles_cita[0]->usuFirma) . '"/>'; ?><br>
                <strong>FIRMA DIGITAL</strong><br>
                <strong>PROFESIONAL: </strong>
                <em><?= $detalles_cita[0]->usuNombre . " " . $detalles_cita[0]->usuApellido; ?><br>RM: <?= $detalles_cita[0]->usuRegistroProfesional; ?></em>
            </div>
            <div class="form-group col-md-6"><br><br><br><br><br>
                <strong>FIRMA PACIENTE: </strong>
                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
            </div>
        </div>
    </div><br>

    <?php  } 
        ?>

        <div id="contador">
            <input type="button" class="btn btn-primary" onclick="pregunta('<?php echo $contador; ?>')" value="Enviar">
        </div>
    </form>
</div>




<script type="text/javascript">
    window.history.forward(1);

    function pregunta(contador) {

        //console.log(data.length);

        //alert(contador)

      

         if (document.formulario.peso.value == "") {

            alert("Tiene que escribir el peso del paciente")
            document.formulario.peso.focus()


        } else if (document.formulario.talla.value == "") {

            alert("Tiene que escribir la talla de la persona")
            document.formulario.talla.focus()

      
            

        } else if (contador < 1) {

            alert("Tiene que agregar como minimo un diagnostico")
            document.formulario.codigo.focus()
            return 0;

        } else {

            if (confirm('¿Estas seguro de enviar este formulario?')) {
                document.formulario.submit()
            }
        }
    }


    function calcular_imc() {

        var peso = $("input#peso").val();
        var talla = $("input#talla").val();


        if (talla % 1 == 0 && talla != "") {
            alert("Digite un valor decimal ej: 1.73");
            $("#talla").val("");
        } else {
            TotalImc = parseInt(peso) / (parseFloat(talla) * parseFloat(talla));
            Imc = (TotalImc).toFixed(1);

            $("#imc").val(Imc);

            if (Imc < 18.5 && talla != "") {
                $("#clasificacion").val("Bajo peso");

            } else if (Imc >= 18.5 && Imc <= 24.9 && talla != "") {
                $("#clasificacion").val("Adecuado");
            } else if (Imc >= 25.0 && Imc <= 29.9 && talla != "") {
                $("#clasificacion").val("Sobrepeso");
            } else if (Imc >= 30.0 && Imc <= 34.9 && talla != "") {
                $("#clasificacion").val("Obesidad grado 1");

            } else if (Imc >= 35.0 && Imc <= 39.9 && talla != "") {
                $("#clasificacion").val("Obesidad grado 2");
            } else if (Imc > 40 && talla != "") {
                $("#clasificacion").val("Obesidad grado 3");
            }
        }
    }

    $("#actualizar_medicamento").click(function() {

        cantidad = $("#editar_cantidad").val();
        dosis = $("#editar_dosis").val();
        id_his_med_actualizacion = $("#id_his_med_actualizacion").val();

        //alert(cantidad +" - "+ dosis)


        //console.log(cantidad);



        if (cantidad != "" && dosis != "" && id_his_med_actualizacion != "") {

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/actualizar_medicamento'; ?>",
                type: 'POST',
                data: {
                    cantidad: cantidad,
                    dosis: dosis,
                    id_his_med_actualizacion: id_his_med_actualizacion
                },

                success: function(result) {

                    //console.log(result);
                    $("#mens").html(result);
                    $("#modal_medicamento").hide();

                    $("#modal_medicamento").modal('hide'); //ocultamos el modal
                    /*$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
                    $('.modal-backdrop').remove();*/
                    $("#data").load(" #data");

                }
            });

        } else {

            html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $("#mens_actualizacion_medicamento").html(html);

        }

    });

    $(document).on("click", ".btn-view-medicamento", function() {
        id_his_med = $(this).val();


        //alert(id_his_med)
        $.ajax({
            url: "<?php echo base_url() . 'index.php/CHistoria/consultar_medicamento'; ?>",
            method: 'post',
            data: {
                id_his_med: id_his_med
            },
            dataType: 'json',
            success: function(data) {


                $("#id_his_med_actualizacion").val(data[0].id_his_med);
                $("#editar_cantidad").val(data[0].hisMedCantidad);
                $("#editar_dosis").val(data[0].hisMedDosis);


                $("#modal_medicamento .modal-body").show();
            }
        });
    });

    function buscar_codigo() {
        var codigo = $("input#codigo").val();

        if (codigo != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_codigo") ?>", {
                codigo: codigo

            }, function(mensaje) {
                $('#lista_codigo_diagnostico').show();
                $("#lista_codigo_diagnostico").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico').val("");
            $('#diagnostico').val("");
            $('#codigo').val("");
            $('#lista_codigo_diagnostico').hide();
        }

    };

    function buscar_codigo1() {
        var codigo = $("input#codigo1").val();

        if (codigo != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_codigo1") ?>", {
                codigo: codigo

            }, function(mensaje) {
                $('#lista_codigo_diagnostico1').show();
                $("#lista_codigo_diagnostico1").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico1').val("");
            $('#diagnostico1').val("");
            $('#codigo1').val("");
            $('#lista_codigo_diagnostico1').hide();
        }

    };

    function buscar_codigo2() {
        var codigo = $("input#codigo2").val();

        if (codigo != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_codigo2") ?>", {
                codigo: codigo

            }, function(mensaje) {
                $('#lista_codigo_diagnostico2').show();
                $("#lista_codigo_diagnostico2").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico2').val("");
            $('#diagnostico2').val("");
            $('#codigo2').val("");
            $('#lista_codigo_diagnostico2').hide();
        }

    };

    function buscar_codigo3() {
        var codigo = $("input#codigo3").val();

        if (codigo != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_codigo3") ?>", {
                codigo: codigo

            }, function(mensaje) {
                $('#lista_codigo_diagnostico3').show();
                $("#lista_codigo_diagnostico3").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico3').val("");
            $('#diagnostico3').val("");
            $('#codigo3').val("");
            $('#lista_codigo_diagnostico3').hide();
        }

    };

    function elemento_selecionado_diagnostico(object) {
        dato_cups = (object.id).split('&');

        idDiagnostico = dato_cups[0];
        diaNombre = dato_cups[1];
        diaCodigo = dato_cups[2];

        $('#idDiagnostico').val(idDiagnostico);
        $('#diagnostico').val(diaNombre);
        $('#codigo').val(diaCodigo);
        $('#lista_nombre_diagnostico').hide();
        $('#lista_codigo_diagnostico').hide();

    }

    function elemento_selecionado_diagnostico1(object) {
        dato_cups = (object.id).split('&');

        idDiagnostico = dato_cups[0];
        diaNombre = dato_cups[1];
        diaCodigo = dato_cups[2];


        $('#idDiagnostico1').val(idDiagnostico);
        $('#diagnostico1').val(diaNombre);
        $('#codigo1').val(diaCodigo);
        $('#lista_nombre_diagnostico1').hide();
        $('#lista_codigo_diagnostico1').hide();
    }

    function elemento_selecionado_diagnostico2(object) {
        dato_cups = (object.id).split('&');

        idDiagnostico = dato_cups[0];
        diaNombre = dato_cups[1];
        diaCodigo = dato_cups[2];

        $('#idDiagnostico2').val(idDiagnostico);
        $('#diagnostico2').val(diaNombre);
        $('#codigo2').val(diaCodigo);
        $('#lista_nombre_diagnostico2').hide();
        $('#lista_codigo_diagnostico2').hide();
    }

    function elemento_selecionado_diagnostico3(object) {
        dato_cups = (object.id).split('&');

        idDiagnostico = dato_cups[0];
        diaNombre = dato_cups[1];
        diaCodigo = dato_cups[2];


        $('#idDiagnostico3').val(idDiagnostico);
        $('#diagnostico3').val(diaNombre);
        $('#codigo3').val(diaCodigo);
        $('#lista_nombre_diagnostico3').hide();
        $('#lista_codigo_diagnostico3').hide();
    }



    $("#add_diagnostico3").click(function() {

        idDiagnostico = $("#idDiagnostico3").val();
        diagnostico = $("#diagnostico3").val();
        idHistoria = $("#idHistoria").val();
        tipo_item = $("#tipo_item3").val();
        tipo_diagnostico3 = $("#tipo_diagnostico3").val();


        if (idDiagnostico != "" && diagnostico != "" && tipo_item != "" && tipo_diagnostico3 != "") {

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/agregar_diagnostico3'; ?>",
                type: 'POST',
                data: {
                    idDiagnostico: idDiagnostico,
                    diagnostico: diagnostico,
                    idHistoria: idHistoria,
                    tipo_item: tipo_item,
                    tipo_diagnostico3: tipo_diagnostico3
                },

                success: function(result) {

                    //console.log(result);
                    $('#idDiagnostico3').val("");
                    tipo_diagnostico1
                    $('#diagnostico3').val("");
                    $('#codigo3').val("");
                    $("#mens_diagnostico").html(result);
                    $("#data3").load(" #data3");

                }
            });

        } else {

            html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $("#mens_diagnostico").html(html);

        }

    });

    $("#add_diagnostico2").click(function() {

        idDiagnostico = $("#idDiagnostico2").val();
        diagnostico = $("#diagnostico2").val();
        idHistoria = $("#idHistoria").val();
        tipo_item = $("#tipo_item2").val();
        tipo_diagnostico2 = $("#tipo_diagnostico2").val();


        if (idDiagnostico != "" && diagnostico != "" && tipo_item != "" && tipo_diagnostico2 != "") {

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/agregar_diagnostico2'; ?>",
                type: 'POST',
                data: {
                    idDiagnostico: idDiagnostico,
                    diagnostico: diagnostico,
                    idHistoria: idHistoria,
                    tipo_item: tipo_item,
                    tipo_diagnostico2: tipo_diagnostico2
                },

                success: function(result) {

                    //console.log(result);
                    $('#idDiagnostico2').val("");
                    $('#diagnostico2').val("");
                    $('#codigo2').val("");
                    $("#mens_diagnostico").html(result);
                    $("#data3").load(" #data3");

                }
            });

        } else {

            html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $("#mens_diagnostico").html(html);

        }

    });

    $("#add_diagnostico1").click(function() {

        idDiagnostico = $("#idDiagnostico1").val();
        diagnostico = $("#diagnostico1").val();
        idHistoria = $("#idHistoria").val();
        tipo_item = $("#tipo_item1").val();
        tipo_diagnostico1 = $("#tipo_diagnostico1").val();


        if (idDiagnostico != "" && diagnostico != "" && tipo_item != "" && tipo_diagnostico1 != "") {

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/agregar_diagnostico1'; ?>",
                type: 'POST',
                data: {
                    idDiagnostico: idDiagnostico,
                    diagnostico: diagnostico,
                    idHistoria: idHistoria,
                    tipo_item: tipo_item,
                    tipo_diagnostico1: tipo_diagnostico1
                },

                success: function(result) {

                    //console.log(result);
                    $('#idDiagnostico1').val("");
                    $('#diagnostico1').val("");
                    $('#codigo1').val("");
                    $("#mens_diagnostico").html(result);
                    $("#data3").load(" #data3");
                    $("#contador").load(" #contador");

                }
            });

        } else {

            html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $("#mens_diagnostico").html(html);

        }

    });

    $("#add_diagnostico").click(function() {

        idDiagnostico = $("#idDiagnostico").val();
        diagnostico = $("#diagnostico").val();
        idHistoria = $("#idHistoria").val();
        tipo_item = $("#tipo_item").val();
        tipo_diagnostico = $("#tipo_diagnostico").val();


        if (idDiagnostico != "" && diagnostico != "" && tipo_item != "" && tipo_diagnostico != "") {

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/agregar_diagnostico'; ?>",
                type: 'POST',
                data: {
                    idDiagnostico: idDiagnostico,
                    diagnostico: diagnostico,
                    idHistoria: idHistoria,
                    tipo_item: tipo_item,
                    tipo_diagnostico: tipo_diagnostico
                },

                success: function(result) {

                    $('#idDiagnostico').val("");
                    $('#diagnostico').val("");
                    $('#codigo').val("");
                    $("#mens_diagnostico").html(result);
                    //$("#data_diagnostico").load(" #data_diagnostico");
                    $("#data3").load(" #data3");
                    $("#contador").load(" #contador");

                }
            });

        } else {

            html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $("#mens_diagnostico").html(html);

        }

    });

    function buscar_codigo() {
        var codigo = $("input#codigo").val();

        if (codigo != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_codigo") ?>", {
                codigo: codigo

            }, function(mensaje) {
                $('#lista_codigo_diagnostico').show();
                $("#lista_codigo_diagnostico").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico').val("");
            $('#diagnostico').val("");
            $('#codigo').val("");
            $('#lista_codigo_diagnostico').hide();
        }

    };

    function buscar_codigo1() {
        var codigo = $("input#codigo1").val();

        if (codigo != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_codigo1") ?>", {
                codigo: codigo

            }, function(mensaje) {
                $('#lista_codigo_diagnostico1').show();
                $("#lista_codigo_diagnostico1").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico1').val("");
            $('#diagnostico1').val("");
            $('#codigo1').val("");
            $('#lista_codigo_diagnostico1').hide();
        }

    };

    function buscar_codigo2() {
        var codigo = $("input#codigo2").val();

        if (codigo != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_codigo2") ?>", {
                codigo: codigo

            }, function(mensaje) {
                $('#lista_codigo_diagnostico2').show();
                $("#lista_codigo_diagnostico2").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico2').val("");
            $('#diagnostico2').val("");
            $('#codigo2').val("");
            $('#lista_codigo_diagnostico2').hide();
        }

    };

    function buscar_codigo3() {
        var codigo = $("input#codigo3").val();

        if (codigo != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_codigo3") ?>", {
                codigo: codigo

            }, function(mensaje) {
                $('#lista_codigo_diagnostico3').show();
                $("#lista_codigo_diagnostico3").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico3').val("");
            $('#diagnostico3').val("");
            $('#codigo3').val("");
            $('#lista_codigo_diagnostico3').hide();
        }

    };


    function buscar_diagnostico() {
        var diagnostico = $("input#diagnostico").val();

        if (diagnostico != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_diagnostico") ?>", {
                diagnostico: diagnostico

            }, function(mensaje) {
                $('#lista_nombre_diagnostico').show();
                $("#lista_nombre_diagnostico").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico').val("");
            $('#diagnostico').val("");
            $('#lista_nombre_diagnostico').hide();
        }

    };

    function buscar_diagnostico1() {
        var diagnostico = $("input#diagnostico1").val();

        if (diagnostico != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_diagnostico1") ?>", {
                diagnostico: diagnostico

            }, function(mensaje) {
                $('#lista_nombre_diagnostico1').show();
                $("#lista_nombre_diagnostico1").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico1').val("");
            $('#diagnostico1').val("");
            $('#lista_nombre_diagnostico1').hide();
        }

    };

    function buscar_diagnostico2() {
        var diagnostico = $("input#diagnostico2").val();

        if (diagnostico != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_diagnostico2") ?>", {
                diagnostico: diagnostico

            }, function(mensaje) {
                $('#lista_nombre_diagnostico2').show();
                $("#lista_nombre_diagnostico2").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico2').val("");
            $('#diagnostico2').val("");
            $('#lista_nombre_diagnostico2').hide();
        }

    };

    function buscar_diagnostico3() {
        var diagnostico = $("input#diagnostico3").val();

        if (diagnostico != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_diagnostico3") ?>", {
                diagnostico: diagnostico

            }, function(mensaje) {
                $('#lista_nombre_diagnostico3').show();
                $("#lista_nombre_diagnostico3").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idDiagnostico3').val("");
            $('#diagnostico3').val("");
            $('#lista_nombre_diagnostico3').hide();
        }

    };

    $(document).ready(function() {
    // Delegación de eventos para seleccionar/deseleccionar todos los checkboxes de diagnósticos
    $('#diagnosticoTodos').on('click', function() {
        // Seleccionar o deseleccionar todos los checkboxes de la clase checkEliminar
        $('.checkEliminar').prop('checked', this.checked);
    });

    // Función para eliminar diagnósticos al confirmar la acción
    $('#botonEliminarDiagnosticos').on('click', function() {
        eliminarDiagnosticos();  // Llamar a la función para eliminar los diagnósticos seleccionados
    });

    // Función para eliminar diagnósticos
    function eliminarDiagnosticos() {
        var seleccionados = [];

        // Iterar sobre los checkboxes de diagnósticos seleccionados
        $('.checkEliminar:checked').each(function() {
            seleccionados.push($(this).val());  // Añadir el valor del checkbox (ID del diagnóstico) a la lista de seleccionados
        });

        // Verificar si hay diagnósticos seleccionados y confirmar la acción
        if (seleccionados.length > 0 && confirm('¿Desea eliminar los diagnósticos seleccionados?')) {
            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/eliminar_diagnostico'; ?>",
                type: 'POST',
                data: {
                    id_his_dia: seleccionados  // Enviar la lista de IDs de diagnósticos a eliminar
                },
                success: function(result) {
                    $("#mens_diagnostico").html(result);  // Mostrar mensaje de éxito o error
                    // Recargar la tabla de diagnósticos para reflejar los cambios
                    $("#data3").load(" #data3");
                }
            });
        }
    }
});


    // Función para seleccionar o deseleccionar todos los checkboxes de remisiones
    $('#remisionTodos').on('click', function() {
    $('.checkRemision').prop('checked', this.checked);
});

// Función para eliminar remisiones al confirmar la acción
function eliminarRemisiones() {
    var seleccionados = [];

    // Iterar sobre los checkboxes de remisiones seleccionadas
    $('.checkRemision:checked').each(function() {
        seleccionados.push($(this).val()); // Añadir el valor del checkbox a la lista de seleccionados
    });

    if (seleccionados.length > 0 && confirm('¿Desea eliminar las remisiones seleccionadas?')) {
        $.ajax({
            url: "<?php echo base_url() . 'index.php/CHistoria/eliminar_remision'; ?>",
            type: 'POST',
            data: {
                id_his_rem: seleccionados // Enviar la lista de IDs a eliminar
            },
            success: function(result) {
                $("#mens").html(result);
                $("#data1").load(" #data1");
            }
        });
    }
}

// Asociar la función eliminarRemisiones() al evento click del botón de eliminar remisiones
$('#botonEliminarRemisiones').on('click', function() {
    eliminarRemisiones();
});

    
    

    $(document).ready(function() {

        $("#add_cups").click(function() {

            idCups = $("#idCups").val();
            idHistoria = $("#idHistoria").val();
            cup = $("#cup").val();
            observacion = $("#cupObservacion").val();

            if (idCups != "" && cup != "") {

                //alert(idCups +"__"+ cup)

                $.ajax({
                    url: "<?php echo base_url() . 'index.php/CHistoria/agregar_cups'; ?>",
                    type: 'POST',
                    data: {
                        idCups: idCups,
                        idHistoria: idHistoria,
                        observacion: observacion
                    },

                    success: function(result) {

                        $('#idCups').val("");
                        $('#cup').val("");
                        $('#cupObservacion').val("");
                        $("#mens_cups").html(result);
                        $("#data2").load(" #data2");

                    }
                });

            } else {

                html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $("#mens_cups").html(html);

            }

        });

        $("#add_remision").click(function() {

            idRemision = $("#idRemision").val();
            idHistoria = $("#idHistoria").val();
            remision = $("#remision").val();
            observacion = $("#remObservacion").val();

            if (idRemision != "" && remision != "") {

                $.ajax({
                    url: "<?php echo base_url() . 'index.php/CHistoria/agregar_remision'; ?>",
                    type: 'POST',
                    data: {
                        idRemision: idRemision,
                        idHistoria: idHistoria,
                        observacion: observacion
                    },

                    success: function(result) {

                        $('#idRemision').val("");
                        $('#remision').val("");
                        $('#remObservacion').val("");
                        $("#mens_remision").html(result);
                        $("#data1").load(" #data1");

                    }
                });

            } else {

                html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $("#mens_remision").html(html);

            }

        });

        $("#add").click(function() {

            idMedicamento = $("#idMedicamento").val();
            cantidad = $("#cantidad").val();
            idHistoria = $("#idHistoria").val();
            dosis = $("#dosis").val();
            medicamento = $("#medicamento").val();

            if (cantidad != "" && dosis != "" && medicamento != "") {

                if (idMedicamento == "") {

                    var idMedicamento = 0;

                }

                $.ajax({
                    url: "<?php echo base_url() . 'index.php/CHistoria/agregar_medicamento'; ?>",
                    type: 'POST',
                    data: {
                        idMedicamento: idMedicamento,
                        cantidad: cantidad,
                        idHistoria: idHistoria,
                        dosis: dosis,
                        medicamento: medicamento
                    },

                    success: function(result) {

                        $('#idMedicamento').val("");
                        $('#medicamento').val("");
                        $('#cantidad').val("0");
                        $('#dosis').val("");
                        $("#mens").html(result);
                        $("#data").load(" #data");

                    }
                });

            } else {

                html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $("#mens").html(html);

            }

        });

    });

    function buscar() {
        var medicamento = $("input#medicamento").val();

        if (medicamento != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_medicamento") ?>", {
                medicamento: medicamento

            }, function(mensaje) {
                $('#lista_nombre').show();
                $("#lista_nombre").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idMedicamento').val("");
            $('#medicamento').val("");
            $('#lista_nombre').hide();
        }

    };

    function buscar_cups() {
        var cups = $("input#cup").val();

        if (cups != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_cups") ?>", {
                cups: cups

            }, function(mensaje) {
                $('#lista_nombre_cups').show();
                $("#lista_nombre_cups").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idCups').val("");
            $('#cup').val("");
            $('#lista_nombre_cups').hide();
        }

    };

    function buscar_remision() {
        var remision = $("input#remision").val();

        if (remision != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_remision") ?>", {
                remision: remision

            }, function(mensaje) {
                $('#lista_nombre_remision').show();
                $("#lista_nombre_remision").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idRemision').val("");
            $('#remision').val("");
            $('#lista_nombre_remision').hide();
        }

    };


    function elemento_selecionado_cups(object) {
        dato_cups = (object.id).split('&');

        idCups = dato_cups[0];
        cupNombre = dato_cups[1];

        $('#idCups').val(idCups);
        $('#cup').val(cupNombre);
        $('#lista_nombre_cups').hide();
    }

    function elemento_selecionado(object) {
        dato_medicamento = (object.id).split('&');

        idMedicamento = dato_medicamento[0];
        medNombre = dato_medicamento[1];

        $('#idMedicamento').val(idMedicamento);
        $('#medicamento').val(medNombre);
        $('#lista_nombre').hide();
    }

    function elemento_selecionado_remision(object) {
        dato_remision = (object.id).split('&');

        idRemision = dato_remision[0];
        remNombre = dato_remision[1];

        $('#idRemision').val(idRemision);
        $('#remision').val(remNombre);
        $('#lista_nombre_remision').hide();
    }
</script>
<!-- Counter view of patient care by date range -->
<div class="container">
    <hr>
    <h5 style="color: white;">CONTADOR DE CITAS POR DOCUMENTO PACIENTE</h5>
    <hr>
    <div class="form-row">
        <label class="col-sm-2 col-form-label text-white">Fecha Inicio:</label>
        <div class="input-group col-sm-4">
            <input class="form-control" type="date" id="fecha_inicio">
        </div>
        <label class="col-sm-2 col-form-label text-white">Fecha Fin:</label>
        <div class="input-group col-sm-4">
            <input class="form-control" type="date" id="fecha_fin">
        </div>
    </div>
    <br>
    <div class="form-row">
        <label class="col-sm-2 col-form-label text-white">Documento:</label>
        <div class="input-group col-sm-10">
            <input class="form-control" type="text" id="documento" placeholder="Documento" required="" onkeyup="buscar_paciente1()">
        </div>
    </div>
    <br>
  
    <div id="resultado" style="display: none;"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type='text/javascript'>
    function buscar_paciente1() {
        var documento = $('#documento').val();
        var fechaInicio = $('#fecha_inicio').val(); // Obtener valor de fecha de inicio
        var fechaFin = $('#fecha_fin').val(); // Obtener valor de fecha de fin

        $.post("<?= base_url("index.php/CHistorial/buscar_paciente1") ?>", {
            documento: documento,
            fecha_inicio: fechaInicio, // Pasar fecha de inicio como parámetro
            fecha_fin: fechaFin // Pasar fecha de fin como parámetro
        }, function(data) {
            $('#resultado').show();
            $("#resultado").html(data);
        });
    }
</script>

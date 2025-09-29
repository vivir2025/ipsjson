<!DOCTYPE html>
<html>
<head>
    <title>Generar Reporte de Historias Clínicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2><i class="fas fa-file-medical"></i> Generar Reporte de Historias Clínicas</h2>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-triangle"></i> <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('warning')): ?>
            <div class="alert alert-warning alert-dismissible fade show">
                <i class="fas fa-exclamation-circle"></i> <?php echo $this->session->flashdata('warning'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <form action="<?php echo site_url('reportes1/generar_pdf'); ?>" method="post" id="form_reporte">
            
            <!-- Selector de tipo de filtro -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-filter"></i> Seleccionar Tipo de Filtro</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_filtro" id="filtro_fechas" value="fechas" checked>
                                <label class="form-check-label" for="filtro_fechas">
                                    <i class="fas fa-calendar-alt"></i> <strong>Filtrar por rango de fechas</strong>
                                    <br><small class="text-muted">Obtener todas las historias clínicas en un período específico</small>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo_filtro" id="filtro_documentos" value="documentos">
                                <label class="form-check-label" for="filtro_documentos">
                                    <i class="fas fa-users"></i> <strong>Filtrar por documentos de pacientes (MASIVO)</strong>
                                    <br><small class="text-muted">Obtener historias de pacientes específicos usando sus números de cédula</small>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filtros por fecha -->
            <div id="filtros_fecha" class="card mb-4">
                <div class="card-header">
                    <h5><i class="fas fa-calendar-alt"></i> Filtro por Fechas</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="fecha_inicio" class="form-label">Fecha Inicio *</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                        </div>
                        <div class="col-md-6">
                            <label for="fecha_fin" class="form-label">Fecha Fin *</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filtro por documentos múltiples -->
            <div id="filtro_documentos_section" class="card mb-4" style="display: none;">
                <div class="card-header">
                    <h5><i class="fas fa-users"></i> Filtro Masivo por Documentos de Pacientes</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <label for="documentos_pacientes" class="form-label">Números de Documento *</label>
                            <textarea class="form-control" id="documentos_pacientes" name="documentos_pacientes" rows="8" 
                                placeholder="Ingrese los números de cédula separados por comas, saltos de línea o punto y coma.&#10;&#10;Ejemplos:&#10;200, 300, 400&#10;&#10;200&#10;300&#10;400&#10;&#10;200; 300; 400"></textarea>
                            <div class="form-text">
                                <i class="fas fa-info-circle"></i> Puede ingresar múltiples documentos separados por: comas (,), saltos de línea, punto y coma (;)
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Validación de Documentos</label>
                            <div id="validacion_documentos" class="border rounded p-3" style="min-height: 200px;">
                                <div class="text-center text-muted">
                                    <i class="fas fa-search fa-2x mb-2"></i>
                                    <p>Ingrese documentos para validar</p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="btn_validar">
                                <i class="fas fa-check-circle"></i> Validar Documentos
                            </button>
                        </div>
                    </div>

                    <!-- Fechas opcionales para filtro por documento -->
                    <hr>
                    <h6><i class="fas fa-calendar-plus"></i> Filtros de Fecha Opcionales</h6>
                    <p class="text-muted small">Deje en blanco para obtener todas las historias clínicas de los pacientes especificados</p>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="fecha_inicio_opt" class="form-label">Fecha Inicio (Opcional)</label>
                            <input type="date" class="form-control" id="fecha_inicio_opt" name="fecha_inicio">
                        </div>
                        <div class="col-md-6">
                            <label for="fecha_fin_opt" class="form-label">Fecha Fin (Opcional)</label>
                            <input type="date" class="form-control" id="fecha_fin_opt" name="fecha_fin">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botón generar -->
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg" id="btn_generar">
                    <i class="fas fa-file-pdf"></i> Generar PDF de Historias Clínicas
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('Script cargado correctamente'); // Para debug
            
            // Cambiar entre tipos de filtro
            $('input[name="tipo_filtro"]').change(function() {
                console.log('Cambio de filtro:', $(this).val()); // Para debug
                if ($(this).val() === 'fechas') {
                    $('#filtros_fecha').show();
                    $('#filtro_documentos_section').hide();
                    $('#fecha_inicio').prop('required', true);
                    $('#fecha_fin').prop('required', true);
                    $('#documentos_pacientes').prop('required', false);
                } else {
                    $('#filtros_fecha').hide();
                    $('#filtro_documentos_section').show();
                    $('#fecha_inicio').prop('required', false);
                    $('#fecha_fin').prop('required', false);
                    $('#documentos_pacientes').prop('required', true);
                }
            });

            // Validar documentos
            $('#btn_validar').on('click', function() {
                console.log('Botón validar clickeado'); // Para debug
                var documentos = $('#documentos_pacientes').val().trim();
                if (documentos.length > 0) {
                    validarDocumentos(documentos);
                } else {
                    alert('Debe ingresar al menos un documento para validar');
                }
            });

            // También validar al salir del textarea
            $('#documentos_pacientes').on('blur', function() {
                var documentos = $(this).val().trim();
                if (documentos.length > 0) {
                    validarDocumentos(documentos);
                } else {
                    $('#validacion_documentos').html(`
                        <div class="text-center text-muted">
                            <i class="fas fa-search fa-2x mb-2"></i>
                            <p>Ingrese documentos para validar</p>
                        </div>
                    `);
                }
            });

            // Función para validar documentos
            function validarDocumentos(documentos) {
                console.log('Validando documentos:', documentos); // Para debug
                
                $('#validacion_documentos').html(`
                    <div class="text-center">
                        <i class="fas fa-spinner fa-spin fa-2x mb-2"></i>
                        <p>Validando documentos...</p>
                    </div>
                `);

                $.ajax({
                    url: '<?php echo base_url("index.php/reportes1/validar_documentos"); ?>', // CAMBIAR URL a reportes1
                    type: 'POST',
                    data: { documentos: documentos },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Respuesta AJAX:', response); // Para debug
                        
                        if (response.success) {
                            var html = `
                                <div class="mb-2">
                                    <strong><i class="fas fa-chart-pie"></i> Resumen:</strong>
                                </div>
                                <div class="mb-2">
                                    <span class="badge bg-primary">${response.total_documentos} Total</span>
                                    <span class="badge bg-success">${response.total_encontrados} Encontrados</span>
                                    <span class="badge bg-warning">${response.total_no_encontrados} No encontrados</span>
                                </div>
                            `;

                            if (response.pacientes_encontrados.length > 0) {
                                html += `<div class="mb-2"><strong><i class="fas fa-check-circle text-success"></i> Pacientes encontrados:</strong></div>`;
                                response.pacientes_encontrados.forEach(function(paciente) {
                                    var nombre = (paciente.pacNombre || '') + ' ' + (paciente.pacNombre2 || '') + ' ' + (paciente.pacApellido || '') + ' ' + (paciente.pacApellido2 || '');
                                    html += `<small class="d-block text-success">• ${paciente.pacDocumento}: ${nombre.trim()}</small>`;
                                });
                            }

                            if (response.documentos_no_encontrados.length > 0) {
                                html += `<div class="mt-2 mb-2"><strong><i class="fas fa-exclamation-triangle text-warning"></i> No encontrados:</strong></div>`;
                                response.documentos_no_encontrados.forEach(function(doc) {
                                    html += `<small class="d-block text-warning">• ${doc}</small>`;
                                });
                            }

                            $('#validacion_documentos').html(html);
                        } else {
                            $('#validacion_documentos').html(`
                                <div class="text-center text-danger">
                                    <i class="fas fa-exclamation-triangle fa-2x mb-2"></i>
                                    <p>${response.message}</p>
                                </div>
                            `);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error AJAX:', xhr.responseText); // Para debug
                        $('#validacion_documentos').html(`
                            <div class="text-center text-danger">
                                <i class="fas fa-times-circle fa-2x mb-2"></i>
                                <p>Error al validar documentos: ${error}</p>
                                <small>Verifique la consola para más detalles</small>
                            </div>
                        `);
                    }
                });
            }

            // Validación del formulario
            $('#form_reporte').submit(function(e) {
                var tipo_filtro = $('input[name="tipo_filtro"]:checked').val();
                
                if (tipo_filtro === 'fechas') {
                    if (!$('#fecha_inicio').val() || !$('#fecha_fin').val()) {
                        e.preventDefault();
                        alert('Debe seleccionar ambas fechas');
                        return false;
                    }
                } else if (tipo_filtro === 'documentos') {
                    if (!$('#documentos_pacientes').val().trim()) {
                        e.preventDefault();
                        alert('Debe ingresar al menos un número de documento');
                        return false;
                    }
                }
                
                // Mostrar mensaje de carga
                $('#btn_generar').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Generando PDF...');
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Archivo Paraclínico</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .upload-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 50px;
            padding: 30px;
        }
        
        .upload-header {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        
        .upload-area:hover {
            border-color: #667eea;
            background: #e3f2fd;
        }
        
        .upload-area.dragover {
            border-color: #667eea;
            background: #e3f2fd;
            transform: scale(1.02);
        }
        
        .file-input {
            display: none;
        }
        
        .upload-btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        .upload-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            background: linear-gradient(45deg, #5a67d8, #6b46c1);
        }
        
        .upload-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        
        .progress-container {
            margin-top: 20px;
            display: none;
        }
        
        .file-info {
            background: #e9ecef;
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            display: none;
        }
        
        .loading-spinner {
            display: none;
            margin: 10px 0;
        }
        
        .success-animation {
            animation: bounce 0.6s ease-in-out;
        }
        
        @keyframes bounce {
            0%, 20%, 60%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            80% { transform: translateY(-5px); }
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            padding: 15px 20px;
            margin-top: 20px;
        }
        
        .alert-success {
            background: linear-gradient(45deg, #48bb78, #38a169);
            color: white;
        }
        
        .alert-danger {
            background: linear-gradient(45deg, #f56565, #e53e3e);
            color: white;
        }

        .format-info {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }

        .format-info h6 {
            color: #1976d2;
            margin-bottom: 10px;
        }

        .format-info ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        .format-info li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="upload-container">
                    <!-- Header -->
                    <div class="upload-header">
                        <h3 class="mb-0">
                            <i class="fas fa-file-medical me-2"></i>
                            Cargar Archivo Paraclínico
                        </h3>
                        <small>Selecciona un archivo Excel compatible con PhpSpreadsheet</small>
                    </div>
                    
                    <!-- Información de formato -->
                    <div class="format-info">
                        <h6><i class="fas fa-info-circle me-2"></i>Formatos Compatibles</h6>
                        <ul class="mb-2">
                            <li><strong>.xlsx</strong> - Excel 2007+ (Recomendado)</li>
                            <li><strong>.xls</strong> - Excel 97-2003</li>
                            <li><strong>.csv</strong> - Valores separados por comas</li>
                            <li><strong>.ods</strong> - OpenDocument Spreadsheet</li>
                        </ul>
                        <small class="text-muted">
                            <i class="fas fa-lightbulb me-1"></i>
                            Usa formato .xlsx para mejor compatibilidad con PhpSpreadsheet
                        </small>
                    </div>
                    
                    <!-- Mensajes de estado -->
                    <div id="upload-messages"></div>
                    
                    <!-- Área de carga -->
                    <div class="upload-area" id="uploadArea">
                        <div class="mb-3">
                            <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                            <h5>Arrastra tu archivo aquí o haz clic para seleccionar</h5>
                            <p class="text-muted mb-0">Formatos soportados: .xlsx, .xls, .csv, .ods</p>
                        </div>
                        
                        <input type="file" 
                               id="uploadFile" 
                               name="uploadFile" 
                               class="file-input" 
                               accept=".xlsx,.xls,.csv,.ods">
                        
                        <button type="button" 
                                class="btn upload-btn" 
                                onclick="document.getElementById('uploadFile').click()">
                            <i class="fas fa-folder-open me-2"></i>
                            Seleccionar Archivo
                        </button>
                    </div>
                    
                    <!-- Información del archivo seleccionado -->
                    <div id="fileInfo" class="file-info">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-file-excel text-success me-2" id="fileIcon"></i>
                            <div class="flex-grow-1">
                                <strong id="fileName"></strong>
                                <div class="small text-muted" id="fileSize"></div>
                                <div class="small text-info" id="fileType"></div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="clearFile()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Barra de progreso -->
                    <div id="progressContainer" class="progress-container">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Subiendo archivo...</span>
                            <span class="small text-muted" id="progressText">0%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                 role="progressbar" 
                                 id="progressBar" 
                                 style="width: 0%; background: linear-gradient(45deg, #667eea, #764ba2);"></div>
                        </div>
                    </div>
                    
                    <!-- Spinner de carga -->
                    <div id="loadingSpinner" class="loading-spinner text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>
                        <p class="mt-2 text-muted">Procesando archivo con PhpSpreadsheet...</p>
                    </div>
                    
                    <!-- Botón de carga -->
                    <div class="text-center mt-4">
                        <button type="button" 
                                id="btnUpload" 
                                class="btn upload-btn btn-lg" 
                                disabled>
                            <i class="fas fa-upload me-2"></i>
                            Cargar Archivo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        $(document).ready(function() {
            let selectedFile = null;
            
            // Configurar drag & drop
            const uploadArea = $('#uploadArea');
            const fileInput = $('#uploadFile');
            
            uploadArea.on('dragover', function(e) {
                e.preventDefault();
                $(this).addClass('dragover');
            });
            
            uploadArea.on('dragleave', function(e) {
                e.preventDefault();
                $(this).removeClass('dragover');
            });
            
            uploadArea.on('drop', function(e) {
                e.preventDefault();
                $(this).removeClass('dragover');
                
                const files = e.originalEvent.dataTransfer.files;
                if (files.length > 0) {
                    handleFileSelect(files[0]);
                }
            });
            
            // Manejar selección de archivo
            fileInput.on('change', function() {
                if (this.files.length > 0) {
                    handleFileSelect(this.files[0]);
                }
            });
            
            // Función para manejar archivo seleccionado
            function handleFileSelect(file) {
                // Validar tipo de archivo - Formatos compatibles con PhpSpreadsheet
                const allowedTypes = [
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                    'application/vnd.ms-excel', // .xls
                    'text/csv', // .csv
                    'application/csv', // .csv (alternativo)
                    'application/vnd.oasis.opendocument.spreadsheet' // .ods
                ];
                
                const fileExtension = file.name.split('.').pop().toLowerCase();
                const validExtensions = ['xlsx', 'xls', 'csv', 'ods'];
                
                if (!allowedTypes.includes(file.type) && !validExtensions.includes(fileExtension)) {
                    showMessage('error', 'Tipo de archivo no válido. Formatos permitidos: .xlsx, .xls, .csv, .ods');
                    return;
                }
                
                // Validar tamaño (máximo 15MB para PhpSpreadsheet)
                if (file.size > 15 * 1024 * 1024) {
                    showMessage('error', 'El archivo es demasiado grande. Máximo 15MB permitido.');
                    return;
                }
                
                selectedFile = file;
                
                // Determinar tipo de archivo y icono
                let fileTypeInfo = getFileTypeInfo(file.name, file.type);
                
                // Mostrar información del archivo
                $('#fileName').text(file.name);
                $('#fileSize').text(formatFileSize(file.size));
                $('#fileType').text(fileTypeInfo.description);
                $('#fileIcon').removeClass().addClass('fas ' + fileTypeInfo.icon + ' me-2');
                $('#fileInfo').slideDown();
                
                // Habilitar botón de carga
                $('#btnUpload').prop('disabled', false);
                
                // Limpiar mensajes anteriores
                $('#upload-messages').empty();
                
                showMessage('success', `Archivo ${fileTypeInfo.description} seleccionado correctamente`);
            }
            
            // Función para obtener información del tipo de archivo
            function getFileTypeInfo(fileName, mimeType) {
                const extension = fileName.split('.').pop().toLowerCase();
                
                const typeMap = {
                    'xlsx': { icon: 'fa-file-excel text-success', description: 'Excel 2007+ (.xlsx)' },
                    'xls': { icon: 'fa-file-excel text-warning', description: 'Excel 97-2003 (.xls)' },
                    'csv': { icon: 'fa-file-csv text-info', description: 'CSV (.csv)' },
                    'ods': { icon: 'fa-file-alt text-primary', description: 'OpenDocument (.ods)' }
                };
                
                return typeMap[extension] || { icon: 'fa-file text-muted', description: 'Archivo de hoja de cálculo' };
            }
            
            // Función para limpiar archivo
            window.clearFile = function() {
                selectedFile = null;
                fileInput.val('');
                $('#fileInfo').slideUp();
                $('#btnUpload').prop('disabled', true);
                $('#upload-messages').empty();
            }
            
            // Manejar clic en botón de carga
            $('#btnUpload').click(function() {
                if (!selectedFile) {
                    showMessage('error', 'Por favor selecciona un archivo primero.');
                    return;
                }
                
                uploadFile();
            });
            
            // Función principal de carga
            function uploadFile() {
                const formData = new FormData();
                formData.append("uploadFile", selectedFile);
                
                // Si tienes el campo idHistoria, descoméntalo
                // formData.append("idHistoria", $("#idHistoria").val());
                
                // Agregar información sobre el tipo de archivo
                formData.append("fileType", selectedFile.name.split('.').pop().toLowerCase());
                
                // Mostrar indicadores de carga
                showLoadingState();
                
                $.ajax({
                    url: "<?php echo base_url() . 'index.php/CHistoria/importar_excel1'; ?>",
                    data: formData,
                    type: "POST",
                    contentType: false,
                    processData: false,
                    cache: false,
                    dataType: "json",
                    timeout: 300000, // 5 minutos timeout para archivos grandes
                    xhr: function() {
                        const xhr = new window.XMLHttpRequest();
                        // Monitorear progreso de subida
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                const percentComplete = Math.round((evt.loaded / evt.total) * 100);
                                updateProgress(percentComplete);
                            }
                        }, false);
                        return xhr;
                    },
                    success: function(result) {
                        console.log('Respuesta del servidor:', result);
                        hideLoadingState();
                        
                        if (result && result.success === true) {
                            showMessage('success', result.message || '¡Archivo procesado exitosamente con PhpSpreadsheet!');
                            clearFile();
                            
                            // Mostrar información adicional si está disponible
                            if (result.info) {
                                showAdditionalInfo(result.info);
                            }
                            
                            // Recargar datos si existe el elemento
                            if ($("#data_paraclinico").length) {
                                $("#data_paraclinico").load(location.href + " #data_paraclinico");
                            }
                            
                        } else {
                            const errorMsg = result && result.message ? result.message : 'Error al procesar el archivo con PhpSpreadsheet.';
                            showMessage('error', errorMsg);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error AJAX:', {xhr, status, error});
                        hideLoadingState();
                        
                        // Intentar parsear la respuesta
                        let parsedResponse = null;
                        try {
                            parsedResponse = JSON.parse(xhr.responseText);
                        } catch (e) {
                            console.log('No se pudo parsear como JSON:', e);
                        }
                        
                        if (parsedResponse && typeof parsedResponse === 'object') {
                            if (parsedResponse.success === true) {
                                showMessage('success', parsedResponse.message || '¡Archivo procesado exitosamente!');
                                clearFile();
                                
                                if ($("#data_paraclinico").length) {
                                    $("#data_paraclinico").load(location.href + " #data_paraclinico");
                                }
                                return;
                            } else if (parsedResponse.success === false) {
                                showMessage('error', parsedResponse.message || 'Error al procesar el archivo.');
                                return;
                            }
                        }
                        
                        // Manejar errores específicos
                        let errorMsg = 'Error de conexión. ';
                        if (xhr.status === 413) {
                            errorMsg = 'El archivo es demasiado grande para el servidor.';
                        } else if (xhr.status === 500) {
                            errorMsg = 'Error interno del servidor. Verifica que PhpSpreadsheet esté correctamente instalado y el formato del archivo sea válido.';
                        } else if (xhr.status === 0) {
                            errorMsg = 'No se pudo conectar con el servidor.';
                        } else if (status === 'timeout') {
                            errorMsg = 'El archivo tardó demasiado en procesarse. Intenta con un archivo más pequeño.';
                        } else {
                            errorMsg += `Código de error: ${xhr.status}`;
                        }
                        
                        showMessage('error', errorMsg);
                    }
                });
            }
            
            // Mostrar información adicional del procesamiento
            function showAdditionalInfo(info) {
                if (info.rows_processed || info.columns_found) {
                    let infoHtml = '<div class="alert alert-info mt-2">';
                    infoHtml += '<i class="fas fa-info-circle me-2"></i>';
                    infoHtml += '<strong>Información del procesamiento:</strong><br>';
                    
                    if (info.rows_processed) {
                        infoHtml += `• Filas procesadas: ${info.rows_processed}<br>`;
                    }
                    if (info.columns_found) {
                        infoHtml += `• Columnas encontradas: ${info.columns_found}<br>`;
                    }
                    if (info.sheet_name) {
                        infoHtml += `• Hoja procesada: ${info.sheet_name}`;
                    }
                    
                    infoHtml += '</div>';
                    $('#upload-messages').append(infoHtml);
                }
            }
            
            // Mostrar estado de carga
            function showLoadingState() {
                $('#btnUpload').prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Procesando...');
                $('#progressContainer').show();
                $('#loadingSpinner').show();
                updateProgress(0);
            }
            
            // Ocultar estado de carga
            function hideLoadingState() {
                $('#btnUpload').prop('disabled', false).html('<i class="fas fa-upload me-2"></i>Cargar Archivo');
                $('#progressContainer').hide();
                $('#loadingSpinner').hide();
            }
            
            // Actualizar barra de progreso
            function updateProgress(percent) {
                $('#progressBar').css('width', percent + '%');
                $('#progressText').text(percent + '%');
            }
            
            // Mostrar mensajes
            function showMessage(type, message) {
                let alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
                let icon = type === 'success' ? 'check-circle' : 'exclamation-triangle';
                
                const html = `
                    <div class="alert ${alertClass} alert-dismissible fade show ${type === 'success' ? 'success-animation' : ''}" role="alert">
                        <i class="fas fa-${icon} me-2"></i>
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                
                $('#upload-messages').html(html);
                
                // Auto-ocultar mensajes de éxito después de 5 segundos
                if (type === 'success') {
                    setTimeout(() => {
                        $('.alert-success').fadeOut();
                    }, 5000);
                }
            }
            
            // Formatear tamaño de archivo
            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }
        });
    </script>
</body>
</html>
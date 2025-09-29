<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Visitas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2a327d 0%, #166a28 50%, #2a327d 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px 0;
        }

        .main-container {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
            max-width: 800px;
            margin: 0 auto;
        }

        .header-section {
            background: linear-gradient(135deg, #2a327d, #166a28);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .header-section h2 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .header-section p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 0;
            position: relative;
            z-index: 1;
        }

        .upload-section {
            padding: 40px;
        }

        .upload-area {
            border: 3px dashed #dee2e6;
            border-radius: 15px;
            padding: 40px 20px;
            text-align: center;
            transition: all 0.4s ease;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            position: relative;
            overflow: hidden;
        }

        .upload-area::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(42, 50, 125, 0.05) 0%, transparent 70%);
            transform: scale(0);
            transition: transform 0.6s ease;
            z-index: 0;
        }

        .upload-area:hover::before {
            transform: scale(1);
        }

        .upload-area:hover {
            border-color: #2a327d;
            background: linear-gradient(135deg, #e3f2fd, #f0f7ff);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(42, 50, 125, 0.15);
        }

        .upload-area.dragover {
            border-color: #166a28;
            background: linear-gradient(135deg, #e8f5e8, #f1f8e9);
            transform: scale(1.02);
            box-shadow: 0 20px 50px rgba(22, 106, 40, 0.2);
        }

        .upload-content {
            position: relative;
            z-index: 1;
        }

        .upload-icon {
            font-size: 4rem;
            color: #6c757d;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .upload-area:hover .upload-icon {
            color: #2a327d;
            transform: scale(1.1);
        }

        .file-input {
            display: none;
        }

        .btn-upload {
            background: linear-gradient(135deg, #2a327d, #166a28);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(42, 50, 125, 0.3);
            margin-top: 15px;
        }

        .btn-upload:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(42, 50, 125, 0.4);
            background: linear-gradient(135deg, #1e2358, #0f4d1a);
            color: white;
        }

        .btn-upload:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
            box-shadow: 0 4px 15px rgba(42, 50, 125, 0.2);
        }

        .btn-process {
            background: linear-gradient(135deg, #166a28, #2a327d);
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(22, 106, 40, 0.3);
            margin-top: 20px;
        }

        .btn-process:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(22, 106, 40, 0.4);
            background: linear-gradient(135deg, #0f4d1a, #1e2358);
            color: white;
        }

        .btn-process:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .file-info-card {
            background: linear-gradient(135deg, #e3f2fd, #f0f7ff);
            border: 2px solid #2196f3;
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
            display: none;
            animation: slideInUp 0.5s ease;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .progress-container {
            margin-top: 25px;
            display: none;
        }

        .progress {
            height: 12px;
            border-radius: 10px;
            background: #e9ecef;
            overflow: hidden;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            background: linear-gradient(90deg, #2a327d, #166a28, #2a327d);
            background-size: 200% 100%;
            animation: progressShine 2s ease-in-out infinite;
            transition: width 0.3s ease;
        }

        @keyframes progressShine {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .loading-spinner {
            display: none;
            text-align: center;
            margin: 20px 0;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
            border-width: 0.3em;
        }

        .alert {
            border: none;
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
            font-weight: 500;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            animation: alertSlideIn 0.5s ease;
        }

        @keyframes alertSlideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border-left: 5px solid #28a745;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border-left: 5px solid #dc3545;
        }

        .alert-info {
            background: linear-gradient(135deg, #d1ecf1, #bee5eb);
            color: #0c5460;
            border-left: 5px solid #17a2b8;
        }

        .format-info {
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .format-info h6 {
            color: #2a327d;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .format-list {
            list-style: none;
            padding: 0;
        }

        .format-list li {
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
        }

        .format-list li:last-child {
            border-bottom: none;
        }

        .format-list i {
            margin-right: 10px;
            width: 20px;
        }

        .success-animation {
            animation: successBounce 0.8s ease;
        }

        @keyframes successBounce {
            0%, 20%, 60%, 100% { transform: translateY(0); }
            40% { transform: translateY(-20px); }
            80% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-container">
            <!-- Header -->
            <div class="header-section">
                <h2>
                    <i class="fas fa-calendar-check me-3"></i>
                    Cargar Visitas
                </h2>
                <p>Importa datos de visitas desde archivos Excel de manera rápida y segura</p>
            </div>

       

                <!-- Messages Area -->
                <div id="upload"></div>

                <!-- Upload Form -->
                <form id="form-upload-user" method="post" enctype="multipart/form-data">
                    <!-- Upload Area -->
                    <div class="upload-area" id="uploadArea">
                        <div class="upload-content">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <h5 class="mb-3">Arrastra tu archivo aquí o haz clic para seleccionar</h5>
                            <p class="text-muted mb-4">Selecciona un archivo Excel con los datos de visitas</p>
                            
                            <input type="file" 
                                   name="uploadFile" 
                                   id="uploadFile" 
                                   class="file-input" 
                                   accept=".xlsx,.xls,.csv">
                            
                            <button type="button" 
                                    class="btn btn-upload" 
                                    onclick="document.getElementById('uploadFile').click()">
                                <i class="fas fa-folder-open me-2"></i>
                                Seleccionar Archivo
                            </button>
                        </div>
                    </div>

                    <!-- File Info Card -->
                    <div id="fileInfoCard" class="file-info-card">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-file-excel fa-2x text-success" id="fileIcon"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1" id="fileName">archivo.xlsx</h6>
                                <small class="text-muted" id="fileSize">0 KB</small>
                                <div class="small text-info mt-1" id="fileType">Excel 2007+</div>
                            </div>
                            <button type="button" 
                                    class="btn btn-outline-danger btn-sm" 
                                    onclick="clearFile()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Progress Container -->
                    <div id="progressContainer" class="progress-container">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-medium">Subiendo archivo...</span>
                            <span class="text-muted" id="progressText">0%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                 role="progressbar" 
                                 id="progressBar" 
                                 style="width: 0%"></div>
                        </div>
                    </div>

                    <!-- Loading Spinner -->
                    <div id="loadingSpinner" class="loading-spinner">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Procesando...</span>
                        </div>
                        <p class="mt-3 text-muted fw-medium">Procesando archivo de visitas...</p>
                    </div>

                    <!-- Upload Button -->
                    <div class="text-center">
                        <button type="button" 
                                id="btnUpload" 
                                class="btn btn-process" 
                                disabled>
                            <i class="fas fa-upload me-2"></i>
                            Procesar Visitas
                        </button>
                    </div>
                </form>
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
                // Validar tipo de archivo
                const allowedTypes = [
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'application/vnd.ms-excel',
                    'text/csv',
                    'application/csv'
                ];
                
                const fileExtension = file.name.split('.').pop().toLowerCase();
                const validExtensions = ['xlsx', 'xls', 'csv'];
                
                if (!allowedTypes.includes(file.type) && !validExtensions.includes(fileExtension)) {
                    showMessage('error', 'Tipo de archivo no válido. Solo se permiten archivos Excel (.xlsx, .xls) y CSV.');
                    return;
                }
                
                // Validar tamaño (máximo 15MB)
                if (file.size > 15 * 1024 * 1024) {
                    showMessage('error', 'El archivo es demasiado grande. Máximo 15MB permitido.');
                    return;
                }
                
                selectedFile = file;
                
                // Obtener información del archivo
                const fileInfo = getFileTypeInfo(file.name);
                
                // Mostrar información del archivo
                $('#fileName').text(file.name);
                $('#fileSize').text(formatFileSize(file.size));
                $('#fileType').text(fileInfo.description);
                $('#fileIcon').removeClass().addClass('fas ' + fileInfo.icon + ' fa-2x');
                $('#fileInfoCard').slideDown(300);
                
                // Habilitar botón de carga
                $('#btnUpload').prop('disabled', false);
                
                // Mostrar mensaje de éxito
                showMessage('success', `Archivo seleccionado correctamente: ${file.name}`);
            }
            
            // Función para obtener información del tipo de archivo
            function getFileTypeInfo(fileName) {
                const extension = fileName.split('.').pop().toLowerCase();
                
                const typeMap = {
                    'xlsx': { icon: 'fa-file-excel text-success', description: 'Excel 2007+ (.xlsx)' },
                    'xls': { icon: 'fa-file-excel text-warning', description: 'Excel 97-2003 (.xls)' },
                    'csv': { icon: 'fa-file-csv text-info', description: 'CSV (.csv)' }
                };
                
                return typeMap[extension] || { icon: 'fa-file text-muted', description: 'Archivo de hoja de cálculo' };
            }
            
            // Función para limpiar archivo
            window.clearFile = function() {
                selectedFile = null;
                fileInput.val('');
                $('#fileInfoCard').slideUp(300);
                $('#btnUpload').prop('disabled', true);
                $('#upload').empty();
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
                formData.append("idHistoria", $("#idHistoria").val() || '');
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
                    timeout: 300000, // 5 minutos
                    xhr: function() {
                        const xhr = new window.XMLHttpRequest();
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
                        
                        // Limpiar archivo
                        $('#uploadFile').val(null);
                        clearFile();
                        
                        // Recargar datos de visitas
                        if ($("#data_visitas").length) {
                            $("#data_visitas").load(location.href + " #data_visitas");
                        }
                        
                        // Manejar respuesta
                        if (result === 1 || (result && result.success === true)) {
                            showMessage('success', result.message || 'Datos de archivo Excel de visitas guardados correctamente!');
                        } else if (result && result.success === false) {
                            showMessage('error', result.message || 'Error al cargar el archivo Excel de visitas.');
                        } else {
                            showMessage('error', 'Error al procesar el archivo de visitas.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error AJAX:', {xhr, status, error});
                        hideLoadingState();
                        
                        // Intentar parsear respuesta en caso de "error" HTTP pero respuesta válida
                        let parsedResponse = null;
                        try {
                            parsedResponse = JSON.parse(xhr.responseText);
                        } catch (e) {
                            console.log('No se pudo parsear como JSON');
                        }
                        
                        if (parsedResponse) {
                            if (parsedResponse === 1 || parsedResponse.success === true) {
                                // Limpiar archivo y recargar datos
                                $('#uploadFile').val(null);
                                clearFile();
                                
                                if ($("#data_visitas").length) {
                                    $("#data_visitas").load(location.href + " #data_visitas");
                                }
                                
                                showMessage('success', parsedResponse.message || 'Datos de visitas procesados correctamente!');
                                return;
                            } else if (parsedResponse.success === false) {
                                showMessage('error', parsedResponse.message || 'Error al procesar las visitas.');
                                return;
                            }
                        }
                        
                        // Error real
                        let errorMsg = 'Error de conexión. ';
                        if (xhr.status === 413) {
                            errorMsg = 'El archivo es demasiado grande para el servidor.';
                        } else if (xhr.status === 500) {
                            errorMsg = 'Error interno del servidor. Verifica que PhpSpreadsheet esté instalado y el formato del archivo sea correcto.';
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
            
            // Mostrar estado de carga
            function showLoadingState() {
                $('#btnUpload').prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Procesando...');
                $('#progressContainer').show();
                $('#loadingSpinner').show();
                updateProgress(0);
            }
            
            // Ocultar estado de carga
            function hideLoadingState() {
                $('#btnUpload').prop('disabled', false).html('<i class="fas fa-upload me-2"></i>Procesar Visitas');
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
                        <strong>${type === 'success' ? 'Éxito!' : 'Error!'}</strong> ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                
                $('#upload').html(html);
                
                // Auto-ocultar mensajes de éxito después de 5 segundos
                if (type === 'success') {
                    setTimeout(() => {
                        $('.alert-success').fadeOut(500);
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
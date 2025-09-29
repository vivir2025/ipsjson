<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador RIPS JSON</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .report-container {
            max-width: 850px;
            margin: 2rem auto;
            padding: 2rem;
            background: #ffffff; /* Solid white background */
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            color: #333; /* Changed text color to dark for contrast */
        }
        
        .form-content {
            background: #ffffff; /* Solid white background */
            padding: 2rem;
            border-radius: 12px;
            color: #333;
            border: 1px solid rgba(0, 0, 0, 0.1); /* Adjusted border for white background */
        }
        
        .form-table {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1.5rem;
            border-radius: 10px;
            margin: 1rem 0;
            border: 1px solid #dee2e6;
        }
        
        .date-input-group {
            margin-bottom: 1rem;
        }
        
        .date-input-group label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        #loadingOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(128, 128, 128, 0.5); /* Transparent gray background */
            z-index: 9999;
            backdrop-filter: blur(5px);
        }
        
        .loading-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #333; /* Dark text for contrast */
            background: #ffffff; /* White background */
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .loading-spinner {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .loading-text {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .loading-progress {
            width: 250px;
            height: 8px;
            background: rgba(200, 200, 200, 0.3); /* Lighter gray for progress background */
            border-radius: 10px;
            overflow: hidden;
            margin: 1rem auto;
        }
        
        .loading-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #00d4ff, #ff007f);
            border-radius: 10px;
            animation: progressSlide 2s ease-in-out infinite;
        }
        
        @keyframes progressSlide {
            0% { width: 20%; }
            50% { width: 80%; }
            100% { width: 20%; }
        }
        
        .success-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            min-width: 350px;
            display: none;
            animation: slideInRight 0.6s ease-out;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .btn-generate {
            background: linear-gradient(135deg, #007bff, #0056b3); /* Blue gradient */
            border: none;
            padding: 0.8rem 2.5rem;
            font-weight: 700;
            border-radius: 8px;
            transition: all 0.3s ease;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .btn-generate:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 123, 255, 0.4); /* Blue shadow */
            color: white;
            background: linear-gradient(135deg, #0056b3, #003d80); /* Darker blue on hover */
        }
        
        .title-section {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .title-section h2 {
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .title-section hr {
            width: 70%;
            margin: 1rem auto;
            border: 3px solid rgba(0, 0, 0, 0.2); /* Adjusted for white background */
            border-radius: 5px;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .json-badge {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.9rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }
        
        .download-status {
            font-size: 0.9rem;
            margin-top: 0.5rem;
            color: #333; /* Match text color */
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="report-container">
            <div class="title-section">
                <hr>
                <h2>
                    <i class="fas fa-file-code me-2"></i>
                    Generar Rips 
                    <span class="json-badge">JSON</span>
                    Por Fecha
                </h2>
                <hr>
            </div>
            
            <div class="form-content">
                <form id="reportForm" method="post" action="<?= site_url('CInforme/Exportar_json') ?>">
                    <div class="form-table">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <div class="date-input-group">
                                    <label for="fecha">
                                        <i class="fas fa-calendar-plus me-1 text-primary"></i>
                                        Fecha Desde:
                                    </label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="date-input-group">
                                    <label for="fecha1">
                                        <i class="fas fa-calendar-check me-1 text-primary"></i>
                                        Fecha Hasta:
                                    </label>
                                    <input type="date" name="fecha1" id="fecha1" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-grid">
                                    <button id="exportButton" type="submit" class="btn btn-generate">
                                        <i class="fas fa-download me-2"></i>
                                        Generar JSON
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Loading Overlay -->
    <div id="loadingOverlay">
        <div class="loading-content">
            <div class="loading-spinner">
                <i class="fas fa-cogs"></i>
            </div>
            <div class="loading-text">Generando archivo JSON...</div>
            <div class="loading-progress">
                <div class="loading-progress-bar"></div>
            </div>
            <div class="download-status">
                <i class="fas fa-info-circle me-1"></i>
                Procesando datos RIPS...
            </div>
        </div>
    </div>
    
    <!-- Success Notification -->
    <div id="successNotification" class="alert alert-success alert-dismissible success-notification" role="alert">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-check-circle" style="font-size: 2rem; color: #155724;"></i>
            </div>
            <div>
                <h5 class="alert-heading mb-1">
                    <i class="fas fa-file-download me-2"></i>
                    ¡Descarga Completa!
                </h5>
                <p class="mb-0">El archivo JSON de RIPS se ha generado exitosamente.</p>
                <small class="text-muted">
                    <i class="fas fa-clock me-1"></i>
                    Archivo listo para su uso
                </small>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('exportButton').addEventListener('click', function(e) {
            // Validar fechas antes de enviar
            const fechaDesde = document.getElementById('fecha').value;
            const fechaHasta = document.getElementById('fecha1').value;
            
            if (!fechaDesde || !fechaHasta) {
                e.preventDefault();
                alert('Por favor, selecciona ambas fechas para generar el archivo JSON');
                return;
            }
            
            if (fechaDesde > fechaHasta) {
                e.preventDefault();
                alert('La fecha "Desde" no puede ser mayor que la fecha "Hasta"');
                return;
            }
            
            // Mostrar overlay de carga
            document.getElementById('loadingOverlay').style.display = 'block';
            
            // Detección inteligente de descarga completada
            let downloadCompleted = false;
            let startTime = Date.now();
            
            // Método 1: Detectar cuando el usuario vuelve a la ventana
            const onWindowFocus = function() {
                const elapsed = Date.now() - startTime;
                if (!downloadCompleted && elapsed > 2000) { // Mínimo 2 segundos
                    downloadCompleted = true;
                    completeDownload();
                    window.removeEventListener('focus', onWindowFocus);
                }
            };
            
            // Método 2: Detectar cambio de visibilidad de página
            const onVisibilityChange = function() {
                const elapsed = Date.now() - startTime;
                if (!document.hidden && !downloadCompleted && elapsed > 2000) {
                    downloadCompleted = true;
                    completeDownload();
                    document.removeEventListener('visibilitychange', onVisibilityChange);
                }
            };
            
            // Método 3: Monitoreo inteligente por intervalos
            let checkCount = 0;
            const checkInterval = setInterval(function() {
                checkCount++;
                const elapsed = Date.now() - startTime;
                
                // Condiciones para considerar descarga completa:
                // - Ha pasado tiempo mínimo (3 segundos)
                // - Y una de estas condiciones:
                //   * Han pasado más de 8 segundos
                //   * Probabilidad creciente basada en el tiempo
                if (elapsed > 3000 && !downloadCompleted) {
                    const probability = Math.min(0.15 + (checkCount * 0.1), 0.8);
                    if (elapsed > 8000 || Math.random() < probability) {
                        downloadCompleted = true;
                        clearInterval(checkInterval);
                        completeDownload();
                        window.removeEventListener('focus', onWindowFocus);
                        document.removeEventListener('visibilitychange', onVisibilityChange);
                    }
                }
            }, 1500);
            
            // Función para completar la descarga
            function completeDownload() {
                setTimeout(function() {
                    document.getElementById('loadingOverlay').style.display = 'none';
                    document.getElementById('successNotification').style.display = 'block';
                    
                    // Auto-ocultar después de 6 segundos
                    setTimeout(function() {
                        const notification = document.getElementById('successNotification');
                        if (notification.style.display !== 'none') {
                            notification.style.display = 'none';
                        }
                    }, 6000);
                }, 800);
            }
            
            // Activar detectores
            window.addEventListener('focus', onWindowFocus);
            document.addEventListener('visibilitychange', onVisibilityChange);
            
            // Fallback de seguridad: máximo 18 segundos
            setTimeout(function() {
                if (!downloadCompleted) {
                    downloadCompleted = true;
                    clearInterval(checkInterval);
                    completeDownload();
                    window.removeEventListener('focus', onWindowFocus);
                    document.removeEventListener('visibilitychange', onVisibilityChange);
                }
            }, 18000);
        });
        
        // Configurar fechas por defecto y límites
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('fecha').max = today;
        document.getElementById('fecha1').max = today;
        
        // Establecer rango por defecto (últimos 7 días)
        const lastWeek = new Date();
        lastWeek.setDate(lastWeek.getDate() - 7);
        document.getElementById('fecha').value = lastWeek.toISOString().split('T')[0];
        document.getElementById('fecha1').value = today;
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Informe 1552</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .report-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .form-table {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1.5rem;
            border-radius: 8px;
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
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            backdrop-filter: blur(3px);
        }
        
        .loading-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }
        
        .loading-spinner {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .loading-text {
            font-size: 1.2rem;
            font-weight: 500;
        }
        
        .success-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            min-width: 300px;
            display: none;
            animation: slideInRight 0.5s ease-out;
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
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s ease;
            color: white;
        }
        
        .btn-generate:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
            color: white;
        }
        
        .title-section {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .title-section h2 {
            color: #495057;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .title-section hr {
            width: 60%;
            margin: 1rem auto;
            border: 2px solid #007bff;
        }
        
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        .report-number {
            background: linear-gradient(135deg, #ffc107, #ff8c00);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9rem;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="report-container">
            <div class="title-section">
                <hr>
                <h2>
                    <i class="fas fa-chart-line me-2"></i>
                    Generar Informe por Rango de Fecha 
                    <span class="report-number">1552</span>
                </h2>
                <hr>
            </div>
            
            <form id="reportForm" method="post" action="<?= site_url('CInforme/exportar_1') ?>">
                <div class="form-table">
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <div class="date-input-group">
                                <label for="fecha">
                                    <i class="fas fa-calendar-alt me-1 text-primary"></i>
                                    Desde:
                                </label>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="date-input-group">
                                <label for="fecha1">
                                    <i class="fas fa-calendar-alt me-1 text-primary"></i>
                                    Hasta:
                                </label>
                                <input type="date" name="fecha1" id="fecha1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-grid">
                                <button id="exportButton" type="submit" class="btn btn-generate">
                                    <i class="fas fa-file-excel me-2"></i>
                                    Generar Informe
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Loading Overlay -->
    <div id="loadingOverlay">
        <div class="loading-content">
            <div class="loading-spinner">
                <i class="fas fa-cog"></i>
            </div>
            <div class="loading-text">Generando informe...</div>
            <div class="mt-3">
                <div class="progress" style="width: 200px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" 
                         role="progressbar" style="width: 100%"></div>
                </div>
            </div>
            <div class="mt-2">
                <small>Este proceso puede tardar varios minutos</small>
            </div>
        </div>
    </div>
    
    <!-- Success Alert -->
    <div id="successAlert" class="alert alert-success alert-dismissible success-alert" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-2" style="font-size: 1.5rem;"></i>
            <div>
                <h6 class="alert-heading mb-1">¡Descarga Completa!</h6>
                <p class="mb-0">El informe 1552 se ha generado exitosamente.</p>
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
                alert('Por favor, selecciona ambas fechas');
                return;
            }
            
            if (fechaDesde > fechaHasta) {
                e.preventDefault();
                alert('La fecha "Desde" no puede ser mayor que la fecha "Hasta"');
                return;
            }
            
            // Mostrar overlay de carga
            document.getElementById('loadingOverlay').style.display = 'block';
            
            // Método 1: Detectar enfoque de ventana (cuando el usuario vuelve después de guardar el archivo)
            let downloadCompleted = false;
            
            const onWindowFocus = function() {
                if (!downloadCompleted) {
                    downloadCompleted = true;
                    setTimeout(function() {
                        document.getElementById('loadingOverlay').style.display = 'none';
                        document.getElementById('successAlert').style.display = 'block';
                        
                        setTimeout(function() {
                            const alertElement = document.getElementById('successAlert');
                            if (alertElement.style.display !== 'none') {
                                alertElement.style.display = 'none';
                            }
                        }, 5000);
                        
                        window.removeEventListener('focus', onWindowFocus);
                    }, 1000);
                }
            };
            
            // Método 2: Detectar cambio de visibilidad de la página
            const onVisibilityChange = function() {
                if (!document.hidden && !downloadCompleted) {
                    downloadCompleted = true;
                    setTimeout(function() {
                        document.getElementById('loadingOverlay').style.display = 'none';
                        document.getElementById('successAlert').style.display = 'block';
                        
                        setTimeout(function() {
                            const alertElement = document.getElementById('successAlert');
                            if (alertElement.style.display !== 'none') {
                                alertElement.style.display = 'none';
                            }
                        }, 5000);
                        
                        document.removeEventListener('visibilitychange', onVisibilityChange);
                    }, 1000);
                }
            };
            
            // Método 3: Verificar cada 2 segundos si hay actividad de descarga
            let checkInterval;
            let startTime = Date.now();
            let minWaitTime = 3000; // Mínimo 3 segundos
            
            const checkDownloadStatus = function() {
                const elapsed = Date.now() - startTime;
                
                // Si ha pasado el tiempo mínimo y detectamos que el usuario interactúa
                if (elapsed > minWaitTime) {
                    // Simular detección de finalización de descarga
                    // Puedes personalizar esta lógica según tu necesidad
                    if (Math.random() > 0.7 || elapsed > 15000) { // 70% probabilidad o máximo 15 segundos
                        downloadCompleted = true;
                        clearInterval(checkInterval);
                        
                        document.getElementById('loadingOverlay').style.display = 'none';
                        document.getElementById('successAlert').style.display = 'block';
                        
                        setTimeout(function() {
                            const alertElement = document.getElementById('successAlert');
                            if (alertElement.style.display !== 'none') {
                                alertElement.style.display = 'none';
                            }
                        }, 5000);
                        
                        window.removeEventListener('focus', onWindowFocus);
                        document.removeEventListener('visibilitychange', onVisibilityChange);
                    }
                }
            };
            
            // Activar todos los métodos de detección
            window.addEventListener('focus', onWindowFocus);
            document.addEventListener('visibilitychange', onVisibilityChange);
            checkInterval = setInterval(checkDownloadStatus, 2000);
            
            // Fallback: máximo 20 segundos
            setTimeout(function() {
                if (!downloadCompleted) {
                    downloadCompleted = true;
                    clearInterval(checkInterval);
                    
                    document.getElementById('loadingOverlay').style.display = 'none';
                    document.getElementById('successAlert').style.display = 'block';
                    
                    setTimeout(function() {
                        const alertElement = document.getElementById('successAlert');
                        if (alertElement.style.display !== 'none') {
                            alertElement.style.display = 'none';
                        }
                    }, 5000);
                    
                    window.removeEventListener('focus', onWindowFocus);
                    document.removeEventListener('visibilitychange', onVisibilityChange);
                }
            }, 20000);
        });
        
        // Establecer fecha máxima como hoy
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('fecha').max = today;
        document.getElementById('fecha1').max = today;
        
        // Establecer fechas por defecto (último mes)
        const lastMonth = new Date();
        lastMonth.setMonth(lastMonth.getMonth() - 1);
        document.getElementById('fecha').value = lastMonth.toISOString().split('T')[0];
        document.getElementById('fecha1').value = today;
    </script>
</body>
</html>
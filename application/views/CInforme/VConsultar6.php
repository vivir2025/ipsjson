<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Informes</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .report-container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 2rem;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .form-content {
            background: #ffffff;
            padding: 2rem;
            border-radius: 15px;
            color: #333;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .form-table {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 2rem;
            border-radius: 15px;
            margin: 1.5rem 0;
            border: 1px solid #dee2e6;
        }
        
        .input-group {
            margin-bottom: 1.5rem;
        }
        
        .input-group label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.8rem;
            display: block;
            font-size: 1rem;
        }

        .form-control, .form-select {
            padding: 12px 16px;
            border: 2px solid #e0e6ed;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-control:focus, .form-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }
        
        #loadingOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(102, 126, 234, 0.1);
            z-index: 9999;
            backdrop-filter: blur(10px);
        }
        
        .loading-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #333;
            background: #ffffff;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            min-width: 300px;
        }
        
        .loading-spinner {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            animation: spin 1s linear infinite;
            color: #667eea;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .loading-text {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2c3e50;
        }
        
        .loading-progress {
            width: 280px;
            height: 8px;
            background: rgba(200, 200, 200, 0.3);
            border-radius: 10px;
            overflow: hidden;
            margin: 1rem auto;
        }
        
        .loading-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #667eea, #764ba2);
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
            min-width: 380px;
            display: none;
            animation: slideInRight 0.6s ease-out;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
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
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            padding: 12px 30px;
            font-weight: 700;
            border-radius: 12px;
            transition: all 0.3s ease;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 16px;
        }
        
        .btn-generate:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
            color: white;
            background: linear-gradient(135deg, #5a6fd8, #6a42a0);
        }

        .btn-clear {
            background: #ecf0f1;
            color: #2c3e50;
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 16px;
        }

        .btn-clear:hover {
            background: #d5dbdb;
            transform: translateY(-2px);
            color: #2c3e50;
        }
        
        .title-section {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .title-section h2 {
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            color: #2c3e50;
            font-size: 2.5rem;
        }
        
        .title-section hr {
            width: 70%;
            margin: 1rem auto;
            border: 3px solid rgba(102, 126, 234, 0.3);
            border-radius: 5px;
        }
        
        .report-badge {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 0.4rem 1.2rem;
            border-radius: 25px;
            font-weight: bold;
            font-size: 1rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            display: inline-block;
            margin-left: 10px;
        }
        
        .download-status {
            font-size: 1rem;
            margin-top: 0.5rem;
            color: #666;
        }

        .date-inputs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .btn-group-custom {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-group-custom .btn {
            flex: 1;
        }

        .alert-custom {
            border-radius: 12px;
            border: none;
            padding: 20px;
            margin-top: 20px;
            display: none;
        }

        .alert-success-custom {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
        }

        .alert-error-custom {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
        }

        @media (max-width: 768px) {
            .report-container {
                margin: 1rem;
                padding: 1.5rem;
            }

            .date-inputs {
                grid-template-columns: 1fr;
            }

            .btn-group-custom {
                flex-direction: column;
            }

            .title-section h2 {
                font-size: 2rem;
            }

            .success-notification {
                min-width: 320px;
                right: 10px;
                left: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="report-container">
            <div class="title-section">
                <hr>
                <h2>
                    <i class="fas fa-chart-line me-3"></i>
                    Generador de Informes
                    <span class="report-badge">EXCEL</span>
                </h2>
                <hr>
                <p class="text-muted fs-5">Selecciona el tipo de informe y rango de fechas para descargar</p>
            </div>
            
            <div class="form-content">
                <form id="reportForm">
                    <div class="form-table">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="input-group">
                                    <label for="reportType">
                                        <i class="fas fa-file-alt me-2 text-primary"></i>
                                        Tipo de Informe:
                                    </label>
                                    <select id="reportType" class="form-select" required>
                                        <option value="">Selecciona un tipo de informe...</option>
                                        <option value="visitas_domiciliarias">📋 Visitas Domiciliarias</option>
                                        <option value="seguimientos">🔍 Seguimientos</option>
                                        <option value="evaluaciones">📊 Evaluaciones</option>
                                        <option value="actividades">📅 Actividades</option>
                                        <option value="pacientes">👥 Pacientes</option>
                                        <option value="procedimientos">🏥 Procedimientos</option>
                                        <option value="consultas">💬 Consultas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="fechaInicio">
                                        <i class="fas fa-calendar-plus me-2 text-primary"></i>
                                        Fecha Desde:
                                    </label>
                                    <input type="date" id="fechaInicio" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <label for="fechaFin">
                                        <i class="fas fa-calendar-check me-2 text-primary"></i>
                                        Fecha Hasta:
                                    </label>
                                    <input type="date" id="fechaFin" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group-custom">
                            <button type="button" class="btn btn-clear" onclick="limpiarFormulario()">
                                <i class="fas fa-broom me-2"></i>
                                Limpiar Campos
                            </button>
                            <button type="submit" class="btn btn-generate">
                                <i class="fas fa-download me-2"></i>
                                Generar y Descargar
                            </button>
                        </div>
                    </div>
                </form>

                <div class="alert alert-success-custom alert-custom" id="alertSuccess">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle me-3" style="font-size: 2rem;"></i>
                        <div>
                            <h5 class="mb-1">¡Descarga Completa!</h5>
                            <p class="mb-0">El archivo Excel se ha generado exitosamente.</p>
                        </div>
                    </div>
                </div>

                <div class="alert alert-error-custom alert-custom" id="alertError">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle me-3" style="font-size: 2rem;"></i>
                        <div>
                            <h5 class="mb-1">Error en la generación</h5>
                            <p class="mb-0" id="errorMessage">Ha ocurrido un error al generar el informe.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Loading Overlay -->
    <div id="loadingOverlay">
        <div class="loading-content">
            <div class="loading-spinner">
                <i class="fas fa-cogs"></i>
            </div>
            <div class="loading-text">Generando archivo Excel...</div>
            <div class="loading-progress">
                <div class="loading-progress-bar"></div>
            </div>
            <div class="download-status">
                <i class="fas fa-info-circle me-2"></i>
                Procesando datos del informe...
            </div>
        </div>
    </div>
    
    <!-- Success Notification -->
    <div id="successNotification" class="alert alert-success alert-dismissible success-notification" role="alert">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-check-circle" style="font-size: 2.5rem; color: #155724;"></i>
            </div>
            <div>
                <h5 class="alert-heading mb-1">
                    <i class="fas fa-file-excel me-2"></i>
                    ¡Descarga Exitosa!
                </h5>
                <p class="mb-0">El archivo Excel del informe se ha generado correctamente.</p>
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
        // Configuración de fechas por defecto
        document.addEventListener('DOMContentLoaded', function() {
            const hoy = new Date();
            const haceUnMes = new Date();
            haceUnMes.setMonth(hoy.getMonth() - 1);
            
            document.getElementById('fechaFin').value = hoy.toISOString().split('T')[0];
            document.getElementById('fechaInicio').value = haceUnMes.toISOString().split('T')[0];
            
            // Establecer límites máximos
            const today = hoy.toISOString().split('T')[0];
            document.getElementById('fechaInicio').max = today;
            document.getElementById('fechaFin').max = today;
        });

        // Manejador del formulario
        document.getElementById('reportForm').addEventListener('submit', function(e) {
            e.preventDefault();
            generarInforme();
        });

        function generarInforme() {
            const reportType = document.getElementById('reportType').value;
            const fechaInicio = document.getElementById('fechaInicio').value;
            const fechaFin = document.getElementById('fechaFin').value;

            // Validaciones
            if (!reportType || !fechaInicio || !fechaFin) {
                mostrarError('Por favor completa todos los campos requeridos.');
                return;
            }

            if (new Date(fechaInicio) > new Date(fechaFin)) {
                mostrarError('La fecha de inicio no puede ser mayor que la fecha de fin.');
                return;
            }

            // Mostrar loading
            mostrarCarga(true);
            ocultarAlertas();

            // Llamar a la función de Google Apps Script
            google.script.run
                .withSuccessHandler(onSuccess)
                .withFailureHandler(onFailure)
                .generarYDescargarInforme(reportType, fechaInicio, fechaFin);
        }

        function onSuccess(resultado) {
            let downloadCompleted = false;
            let startTime = Date.now();
            
            if (resultado.success) {
                // Detección inteligente de descarga completada
                const onWindowFocus = function() {
                    const elapsed = Date.now() - startTime;
                    if (!downloadCompleted && elapsed > 2000) {
                        downloadCompleted = true;
                        completeDownload();
                        window.removeEventListener('focus', onWindowFocus);
                    }
                };
                
                const onVisibilityChange = function() {
                    const elapsed = Date.now() - startTime;
                    if (!document.hidden && !downloadCompleted && elapsed > 2000) {
                        downloadCompleted = true;
                        completeDownload();
                        document.removeEventListener('visibilitychange', onVisibilityChange);
                    }
                };
                
                let checkCount = 0;
                const checkInterval = setInterval(function() {
                    checkCount++;
                    const elapsed = Date.now() - startTime;
                    
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
                
                function completeDownload() {
                    setTimeout(function() {
                        mostrarCarga(false);
                        mostrarExito();
                        document.getElementById('successNotification').style.display = 'block';
                        
                        setTimeout(function() {
                            const notification = document.getElementById('successNotification');
                            if (notification.style.display !== 'none') {
                                notification.style.display = 'none';
                            }
                        }, 6000);
                    }, 800);
                }
                
                window.addEventListener('focus', onWindowFocus);
                document.addEventListener('visibilitychange', onVisibilityChange);
                
                setTimeout(function() {
                    if (!downloadCompleted) {
                        downloadCompleted = true;
                        clearInterval(checkInterval);
                        completeDownload();
                        window.removeEventListener('focus', onWindowFocus);
                        document.removeEventListener('visibilitychange', onVisibilityChange);
                    }
                }, 18000);
                
            } else {
                mostrarCarga(false);
                mostrarError(resultado.message || 'Error desconocido al generar el informe.');
            }
        }

        function onFailure(error) {
            mostrarCarga(false);
            mostrarError('Error al procesar la solicitud: ' + error.message);
        }

        function limpiarFormulario() {
            document.getElementById('reportForm').reset();
            ocultarAlertas();
            
            // Restablecer fechas por defecto
            const hoy = new Date();
            const haceUnMes = new Date();
            haceUnMes.setMonth(hoy.getMonth() - 1);
            
            document.getElementById('fechaFin').value = hoy.toISOString().split('T')[0];
            document.getElementById('fechaInicio').value = haceUnMes.toISOString().split('T')[0];
        }

        function mostrarCarga(mostrar) {
            document.getElementById('loadingOverlay').style.display = mostrar ? 'block' : 'none';
        }

        function mostrarExito() {
            document.getElementById('alertSuccess').style.display = 'block';
            setTimeout(() => {
                document.getElementById('alertSuccess').style.display = 'none';
            }, 5000);
        }

        function mostrarError(mensaje) {
            document.getElementById('errorMessage').textContent = mensaje;
            document.getElementById('alertError').style.display = 'block';
        }

        function ocultarAlertas() {
            document.getElementById('alertSuccess').style.display = 'none';
            document.getElementById('alertError').style.display = 'none';
        }
    </script>
</body>
</html>
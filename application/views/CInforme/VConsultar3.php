<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Informe de Facturación</title>
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
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1rem 0;
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
        
        .success-message {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 1rem;
            display: none;
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .btn-generate {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        
        .btn-generate:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
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
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="report-container">
            <div class="title-section">
                <hr>
                <h2><i class="fas fa-file-invoice-dollar me-2"></i>Generar Informe de Facturación</h2>
                <hr>
            </div>
            
            <form id="reportForm" method="post" action="<?= site_url('CInforme/exportar3') ?>">
                <div class="form-table">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="date-input-group">
                                <label for="fecha"><i class="fas fa-calendar-alt me-1"></i>Fecha Desde:</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="date-input-group">
                                <label for="fecha1"><i class="fas fa-calendar-alt me-1"></i>Fecha Hasta:</label>
                                <input type="date" name="fecha1" id="fecha1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button id="exportButton" type="submit" class="btn btn-primary btn-generate">
                                <i class="fas fa-download me-2"></i>Generar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            
            <div id="successMessage" class="success-message">
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle me-3" style="font-size: 1.5rem;"></i>
                    <div>
                        <h5 class="mb-1">¡Descarga Completa!</h5>
                        <p class="mb-0">El informe se ha generado exitosamente.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Loading Overlay -->
    <div id="loadingOverlay">
        <div class="loading-content">
            <div class="loading-spinner">
                <i class="fas fa-spinner"></i>
            </div>
            <div class="loading-text">Generando informe...</div>
            <div class="mt-2">
                <small>Por favor, espera mientras procesamos tu solicitud</small>
            </div>
        </div>
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
            
            // Permitir que el formulario se envíe normalmente
            // El formulario seguirá su curso normal y descargará el archivo
            
            // Detectar cuando el usuario regrese al foco de la ventana (después de la descarga)
            let downloadTimer;
            let checkDownload = function() {
                downloadTimer = setTimeout(function() {
                    // Ocultar overlay de carga
                    document.getElementById('loadingOverlay').style.display = 'none';
                    
                    // Mostrar mensaje de éxito
                    document.getElementById('successMessage').style.display = 'block';
                    
                    // Ocultar mensaje de éxito después de 5 segundos
                    setTimeout(function() {
                        document.getElementById('successMessage').style.display = 'none';
                    }, 5000);
                }, 3000); // Esperar 3 segundos para que inicie la descarga
            };
            
            // Ejecutar el timer
            checkDownload();
            
            // Fallback: ocultar después de 15 segundos máximo
            setTimeout(function() {
                if (document.getElementById('loadingOverlay').style.display === 'block') {
                    document.getElementById('loadingOverlay').style.display = 'none';
                    document.getElementById('successMessage').style.display = 'block';
                    
                    setTimeout(function() {
                        document.getElementById('successMessage').style.display = 'none';
                    }, 5000);
                }
            }, 15000);
        });
        
        // Establecer fecha máxima como hoy
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('fecha').max = today;
        document.getElementById('fecha1').max = today;
        
        // Establecer fecha por defecto (último mes)
        const lastMonth = new Date();
        lastMonth.setMonth(lastMonth.getMonth() - 1);
        document.getElementById('fecha').value = lastMonth.toISOString().split('T')[0];
        document.getElementById('fecha1').value = today;
    </script>
</body>
</html>
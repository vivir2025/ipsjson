<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador RIPS JSON con Visitas Domiciliarias</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .report-container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 2rem;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .api-status {
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.8rem;
            font-weight: bold;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }
        
        .form-table {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1.5rem;
            border-radius: 10px;
            margin: 1rem 0;
            border: 1px solid #dee2e6;
        }
        
        .btn-generate {
            background: linear-gradient(135deg, #007bff, #0056b3);
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
            box-shadow: 0 8px 25px rgba(0, 123, 255, 0.4);
            color: white;
            background: linear-gradient(135deg, #0056b3, #003d80);
        }
        
        .json-badge {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.9rem;
        }
        
        #loadingOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(128, 128, 128, 0.5);
            z-index: 9999;
            backdrop-filter: blur(5px);
        }
        
        .loading-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #333;
            background: #ffffff;
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
    </style>
</head>
<body class="bg-light">
    <div class="container">
        <div class="report-container">
            <div class="title-section text-center">
                <hr>
                <h2>
                    <i class="fas fa-file-code me-2"></i>
                    Generar RIPS 
                    <span class="json-badge">JSON</span>
                    <small class="text-muted d-block mt-2" style="font-size: 0.7em;">
                        <i class="fas fa-home me-1"></i>
                        Incluye Visitas Domiciliarias desde API Laravel
                    </small>
                </h2>
                <hr>
            </div>
            
            <!-- Estado de la API -->
            <div class="text-center mb-3">
                <div class="api-status">
                    <i class="fas fa-wifi me-1"></i>
                    API Laravel Conectada - Visitas Domiciliarias Disponibles
                </div>
            </div>
            
            <div class="form-content">
                <form id="reportForm" method="post" action="<?= site_url('CInforme/Exportar_json') ?>">
                    <div class="form-table">
                        <div class="row align-items-end">
                            <div class="col-md-3">
                                <div class="date-input-group">
                                    <label for="fecha">
                                        <i class="fas fa-calendar-plus me-1 text-primary"></i>
                                        Fecha Desde:
                                    </label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="date-input-group">
                                    <label for="fecha1">
                                        <i class="fas fa-calendar-check me-1 text-primary"></i>
                                        Fecha Hasta:
                                    </label>
                                    <input type="date" name="fecha1" id="fecha1" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="sede-input-group">
                                    <label for="sede_id">
                                        <i class="fas fa-building me-1 text-success"></i>
                                        Sede (Opcional):
                                    </label>
                                    <select name="sede_id" id="sede_id" class="form-control">
                                        <option value="">Todas las sedes</option>
                                        <?php if (isset($sedes) && !empty($sedes)): ?>
                                            <?php foreach ($sedes as $sede): ?>
                                                <option value="<?= $sede['id'] ?>">
                                                    <?= htmlspecialchars($sede['nombresede']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="1">Cajibío</option>
                                            <option value="2">Piendamó</option>
                                            <option value="3">Morales</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-grid">
                                    <button id="exportButton" type="submit" class="btn btn-generate">
                                        <i class="fas fa-download me-2"></i>
                                        Generar JSON
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Información adicional -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <h6><i class="fas fa-info-circle me-2"></i>Información del Proceso:</h6>
                                    <ul class="mb-0">
                                        <li><strong>Datos Locales:</strong> Historia clínica, consultas y procedimientos</li>
                                        <li><strong>Visitas API:</strong> Visitas domiciliarias con código CUPS 890105</li>
                                        <li><strong>Filtros:</strong> Por rango de fechas y sede específica</li>
                                        <li><strong>Formato:</strong> JSON RIPS compatible con ADRES</li>
                                    </ul>
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
            <div class="download-status">
                <i class="fas fa-info-circle me-1"></i>
                Procesando datos locales y visitas domiciliarias desde API...
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('exportButton').addEventListener('click', function(e) {
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
            
            // Ocultar después de un tiempo
            setTimeout(() => {
                document.getElementById('loadingOverlay').style.display = 'none';
            }, 5000);
        });
        
        // Configurar fechas por defecto
        const today = new Date().toISOString().split('T')[0];
        const lastWeek = new Date();
        lastWeek.setDate(lastWeek.getDate() - 7);
        
        document.getElementById('fecha').value = lastWeek.toISOString().split('T')[0];
        document.getElementById('fecha1').value = today;
        document.getElementById('fecha').max = today;
        document.getElementById('fecha1').max = today;
    </script>
</body>
</html>

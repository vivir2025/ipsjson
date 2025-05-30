<!-- application/views/reportes/form_fechas.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Generar Reporte de Historias Clínicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Generar Reporte de Historias Clínicas</h2>
        <form action="<?php echo site_url('reportes/generar_pdf'); ?>" method="post">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                </div>
                <div class="col-md-6">
                    <label for="fecha_fin" class="form-label">Fecha Fin</label>
                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Generar PDF</button>
        </form>
    </div>
</body>
</html>
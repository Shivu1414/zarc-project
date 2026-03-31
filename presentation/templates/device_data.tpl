{load_presentation_object filename="device_pipelining" assign="obj"}

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Zarc</title>
</head>
<body>
    {include file="header.tpl"}

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold">📊 Device Data Dashboard</h3>
            <span class="badge bg-primary">Total Records: {$obj->deviceData|@count}</span>
        </div>
    
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <input type="text" id="searchInput" class="form-control" placeholder="Search by Device ID...">
            </div>
        </div>
    
        <div class="card shadow">
            <div class="card-body table-responsive">
    
                <table class="table table-hover table-striped align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Device ID</th>
                            <th>Temperature (°C)</th>
                            <th>Humidity (%)</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
    
                    <tbody id="deviceTable">
                        {foreach from=$obj->deviceData item=row}
                        <tr>
                            <td>{$row.id}</td>
    
                            <td>
                                <span class="badge bg-info text-dark">
                                    {$row.device_id}
                                </span>
                            </td>
    
                            <td>
                                {if $row.temperature > 40}
                                    <span class="badge bg-danger">{$row.temperature}°C</span>
                                {elseif $row.temperature > 30}
                                    <span class="badge bg-warning text-dark">{$row.temperature}°C</span>
                                {else}
                                    <span class="badge bg-success">{$row.temperature}°C</span>
                                {/if}
                            </td>
    
                            <td>
                                <span class="badge bg-secondary">
                                    {$row.humidity}%
                                </span>
                            </td>
    
                            <td>{$row.created_at}</td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
    
            </div>
        </div>
    </div>

    
</body>
</html>
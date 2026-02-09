<html>
    <head>

    </head>
    <body>
        <?php
include '../config.php';
requireLogin();

// Hanya user biasa yang bisa akses


// Ambil data statistik untuk user
try {
    // Total produk
    $total_products = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
    
    // Total stok
    $total_stock = $pdo->query("SELECT SUM(stock) FROM products")->fetchColumn();
    
    // Barang dengan stok rendah
    $low_stock = $pdo->query("SELECT COUNT(*) FROM products WHERE stock < 10")->fetchColumn();
    
    // Barang habis
    $out_of_stock = $pdo->query("SELECT COUNT(*) FROM products WHERE stock = 0")->fetchColumn();
    
    // Stok masuk hari ini
    $today_stock_in = $pdo->query("SELECT SUM(quantity) FROM stock_in WHERE date_in = CURDATE()")->fetchColumn() ?: 0;
    
    // Stok keluar hari ini
    $today_stock_out = $pdo->query("SELECT SUM(quantity) FROM stock_out WHERE date_out = CURDATE()")->fetchColumn() ?: 0;
    
} catch (Exception $e) {
    // Set default values jika error
    $total_products = $total_stock = $low_stock = $out_of_stock = 0;
    $today_stock_in = $today_stock_out = 0;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - Minimarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .stat-card {
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <div
  class="relative min-h-screen bg-cover bg-center bg-no-repeat"
  style="background-image: url('../kai-bg.jpg');"
>
     <!-- Navbar -->
    <?php include '../assets/css/navbar-user.php'; ?>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>
                        <i class="bi bi-speedometer2"></i> Dashboard User
                    </h2>
                    <div class="text-muted">
                        <i class="bi bi-calendar"></i> <?php echo date('l, d F Y'); ?>
                    </div>
                </div>
                
                <!-- Welcome Message -->
                <div class="alert alert-info">
                    <h5><i class="bi bi-person"></i> Selamat datang, <?php echo $_SESSION['username']; ?>!</h5>
                    <p class="mb-0">Anda login sebagai <strong>User</strong>. Anda dapat melihat data barang dan melakukan pencatatan stok.</p>
                </div>
            </div>
        </div>

        <!-- Statistik Utama -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h6 class="card-title text-muted mb-0">Total Barang</h6>
                                <h3 class="mt-2 mb-0"><?php echo number_format($total_products); ?></h3>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon-shape bg-primary text-white rounded-circle p-3">
                                    <i class="bi bi-box fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h6 class="card-title text-muted mb-0">Total Stok</h6>
                                <h3 class="mt-2 mb-0"><?php echo number_format($total_products); ?></h3>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon-shape bg-success text-white rounded-circle p-3">
                                    <i class="bi bi-archive fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h6 class="card-title text-muted mb-0">Stok Masuk Hari Ini</h6>
                                <h3 class="mt-2 mb-0"><?php echo number_format($today_stock_in); ?></h3>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon-shape bg-info text-white rounded-circle p-3">
                                    <i class="bi bi-arrow-down-circle fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card stat-card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h6 class="card-title text-muted mb-0">Stok Keluar Hari Ini</h6>
                                <h3 class="mt-2 mb-0"><?php echo number_format($today_stock_out); ?></h3>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon-shape bg-warning text-white rounded-circle p-3">
                                    <i class="bi bi-arrow-up-circle fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Stok -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h6 class="mb-0"><i class="bi bi-exclamation-triangle"></i> Status Stok</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center p-3 bg-light rounded">
                                    <div class="bg-primary rounded-circle p-3 me-3">
                                        <i class="bi bi-box text-white fs-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-0"><?php echo $total_products; ?></h4>
                                        <small class="text-muted">Total Barang</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center p-3 bg-light rounded">
                                    <div class="bg-warning rounded-circle p-3 me-3">
                                        <i class="bi bi-exclamation-triangle text-white fs-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-0"><?php echo $low_stock; ?></h4>
                                        <small class="text-muted">Stok Rendah</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <div class="d-flex align-items-center p-3 bg-light rounded">
                                    <div class="bg-danger rounded-circle p-3 me-3">
                                        <i class="bi bi-x-circle text-white fs-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-0"><?php echo $out_of_stock; ?></h4>
                                        <small class="text-muted">Stok Habis</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
       
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    </body>
</html>
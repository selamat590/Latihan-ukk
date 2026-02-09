<html>
    <head>

    </head>
    <body>
        <?php
include '../config.php';
requireLogin();

// Hanya admin yang bisa akses
if ($_SESSION['role'] !== 'admin') {
    header('Location: ../dashboard.php');
    exit();
}

// Ambil data statistik untuk admin
try {
    // Total produk
    $total_products = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
    
    // Total stok masuk
    $total_stock_in = $pdo->query("SELECT SUM(quantity) FROM stock_in")->fetchColumn();
    
    // Total stok keluar
    $total_stock_out = $pdo->query("SELECT SUM(quantity) FROM stock_out")->fetchColumn();
    
    // Stok saat ini
    $current_stock = $total_stock_in - $total_stock_out;
    
    // Total user
    $total_users = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    
    // Total kategori
    $total_categories = $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();
    
    // Barang dengan stok rendah (kurang dari 10)
    $low_stock = $pdo->query("SELECT COUNT(*) FROM products WHERE stock < 10")->fetchColumn();
    
    // Barang habis
    $out_of_stock = $pdo->query("SELECT COUNT(*) FROM products WHERE stock = 0")->fetchColumn();
    
    // Stok masuk hari ini
    $today_stock_in = $pdo->query("SELECT SUM(quantity) FROM stock_in WHERE date_in = CURDATE()")->fetchColumn() ?: 0;
    
    // Stok keluar hari ini
    $today_stock_out = $pdo->query("SELECT SUM(quantity) FROM stock_out WHERE date_out = CURDATE()")->fetchColumn() ?: 0;
    
} catch (Exception $e) {
    // Set default values jika error
    $total_products = $total_stock_in = $total_stock_out = $current_stock = 0;
    $total_users = $total_categories = $low_stock = $out_of_stock = 0;
    $today_stock_in = $today_stock_out = 0;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Minimarket</title>
   <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body>
    <div
  class="relative min-h-screen bg-cover bg-center bg-no-repeat"
  style="background-image: url('kai-bg.jpg');"
>
     <!-- Navbar -->
 <?php include '../assets/css/navbar-admin.php'; ?>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>
                        <i class="bi bi-speedometer2"></i> Dashboard Admin
                    </h2>
                    <div class="text-muted">
                        <i class="bi bi-calendar"></i> <?php echo date('l, d F Y'); ?>
                    </div>
                </div>
                
                <!-- Welcome Message -->
                <div class="alert alert-primary">
                    <h5><i class="bi bi-person-badge"></i> Selamat datang, <?php echo $_SESSION['username']; ?>!</h5>
                    <p class="mb-0">Anda login sebagai <strong>Administrator</strong>. Anda memiliki akses penuh ke semua fitur sistem.</p>
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
                                <h3 class="mt-2 mb-0"><?php echo number_format($current_stock); ?></h3>
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
                                <h6 class="card-title text-muted mb-0">Total User</h6>
                                <h3 class="mt-2 mb-0"><?php echo number_format($total_users); ?></h3>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon-shape bg-info text-white rounded-circle p-3">
                                    <i class="bi bi-people fs-4"></i>
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
                                <h6 class="card-title text-muted mb-0">Total Kategori</h6>
                                <h3 class="mt-2 mb-0"><?php echo number_format($total_categories); ?></h3>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon-shape bg-warning text-white rounded-circle p-3">
                                    <i class="bi bi-tags fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2: Alert Stok dan Aktivitas Hari Ini -->
        <div class="row mb-4">
            <!-- Alert Stok -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h6 class="mb-0"><i class="bi bi-exclamation-triangle"></i> Alert Stok</h6>
                    </div>
                    <div class="card-body">
                        <?php if ($low_stock > 0 || $out_of_stock > 0): ?>
                            <?php if ($out_of_stock > 0): ?>
                                <div class="alert alert-danger d-flex align-items-center">
                                    <i class="bi bi-x-circle fs-4 me-3"></i>
                                    <div>
                                        <strong><?php echo $out_of_stock; ?> barang habis!</strong>
                                        <div class="small">Segera lakukan restock</div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($low_stock > 0): ?>
                                <div class="alert alert-warning d-flex align-items-center">
                                    <i class="bi bi-exclamation-triangle fs-4 me-3"></i>
                                    <div>
                                        <strong><?php echo $low_stock; ?> barang stok rendah!</strong>
                                        <div class="small">Stok kurang dari 10</div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="alert alert-success d-flex align-items-center">
                                <i class="bi bi-check-circle fs-4 me-3"></i>
                                <div>
                                    <strong>Semua stok aman!</strong>
                                    <div class="small">Tidak ada barang dengan stok rendah</div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Aktivitas Hari Ini -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h6 class="mb-0"><i class="bi bi-activity"></i> Aktivitas Hari Ini</h6>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="border-end">
                                    <h4 class="text-success"><?php echo $today_stock_in; ?></h4>
                                    <small class="text-muted">Stok Masuk</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <h4 class="text-warning"><?php echo $today_stock_out; ?></h4>
                                    <small class="text-muted">Stok Keluar</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h6 class="mb-0"><i class="bi bi-lightning"></i> Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <a href="products.php" class="btn btn-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                    <i class="bi bi-box fs-2 mb-2"></i>
                                    <span>Kelola Barang</span>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="stock_in.php" class="btn btn-success w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                    <i class="bi bi-arrow-down-circle fs-2 mb-2"></i>
                                    <span>Stok Masuk</span>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="stock_out.php" class="btn btn-warning w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                    <i class="bi bi-arrow-up-circle fs-2 mb-2"></i>
                                    <span>Stok Keluar</span>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="categories.php" class="btn btn-info w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                    <i class="bi bi-tags fs-2 mb-2"></i>
                                    <span>Kelola Kategori</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    </body>
</html>
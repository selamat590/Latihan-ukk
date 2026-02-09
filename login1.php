<?php
include 'config.php';

// Jika sudah login, redirect ke dashboard
if (isLoggedIn()) {
    redirectToDashboard();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Di bagian login success - MASIH DALAM BLOK POST
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['logged_in'] = true;
        
        session_regenerate_id(true);
        
        // Redirect berdasarkan role
        if ($user['role'] === 'admin') {
            header('Location: admin/dashboard_admin.php');
        } else {
            header('Location: dashboard.php');
        }
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PT BUBUR DI ADUK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            background-image: url('assets/image/bg.jpg');
            height: 100vh;
            padding: 20%;
            display: flex;
            align-items: center;
              background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .container {
            background-color: rgba(0,0,0,0.2);
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 40px;
            align-content: center;
            border-radius: 15px;
            background-color: rgba(7, 7, 7, 0.51);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            color: #667eea;
            font-weight: bold;
        }
        .brand-text {
            color: #667eea;
            font-weight: bold;
            opacity: 100%;
        }
        .blm {
            color: #667eea;
            font-weight: bold;
        }
        .teks {
                        color: #667eea;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="login-container ">
                    <div class="text-center mb-6">
                        <i class="bi bi-shop fs-1 brand-text"></i>
                        <h2 class="brand-text mt-5">PT BUBUR DI ADUK</h2>
                        <p class="teks text-muted">Silakan login ke akun Anda</p>
                    </div>
                    
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle"></i> <?php echo $error; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST">
                        <div class=" mb-3">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" class="form-control" id="username" name="username" required 
                                       value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                                       placeholder="Masukkan username">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="password" required 
                                       placeholder="Masukkan password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p class="text-muted">
                            <p class="blm">Belum punya akun?</P> 
                            <a href="register.php" class="text-decoration-none">Daftar di sini</a>
                        </p>
                    </div>
                    
                    <!-- Demo Accounts Info 
                    <div class="mt-4 p-3 bg-light rounded">
                        <h6 class="text-center mb-2">Akun Demo:</h6>
                        <div class="row text-center">
                            <div class="col-6">
                                <small class="text-muted">
                                    <strong>Admin</strong><br>
                                    Username: <code>admin</code><br>
                                    Password: <code>password</code>
                                </small>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">
                                    <strong>User</strong><br>
                                    Username: <code>user1</code><br>
                                    Password: <code>password</code>
                                </small>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
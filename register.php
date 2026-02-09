<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validasi
    if ($password !== $confirm_password) {
        $error = "Password tidak cocok!";
    } else {
        // Cek apakah username sudah ada
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        
        if ($stmt->rowCount() > 0) {
            $error = "Username atau sudah digunakan!";
        } else {
            // Hash password dan simpan user
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare(
    "INSERT INTO users (username, password, role) VALUES (?, ?, ?)"
);

if ($stmt->execute([$username, $hashed_password, 'pelanggan'])) {
    $success = "Registrasi berhasil! Akun pelanggan siap dipakai.";
} else {
    $error = "Terjadi kesalahan saat registrasi.";
}

        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Minimarket</title>
    <style>

    </style>
</head>
<body>
        <head>
           <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
<body>
    <!-- Navbar -->

<div
  class="relative min-h-screen bg-cover bg-center bg-no-repeat"
  style="background-image: url('kai-bg.jpg');"
>

  <header class="absolute inset-x-0 top-0 z-50">
    <?php include '../assets/css/navbar-admin.php'; ?>
    <el-dialog>
      <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
        <div tabindex="0" class="fixed inset-0 focus:outline-none">
          <el-dialog-panel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-100/10">
            <div class="flex items-center justify-between">
              <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img src="kai.png" alt="" class="w-auto" />
              </a>
              <button type="button" command="close" commandfor="mobile-menu" class="-m-2.5 rounded-md p-2.5 text-gray-200">
                <span class="sr-only">Close menu</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                  <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </button>
            </div>
            <div class="mt-6 flow-root">
              <div class="-my-6 divide-y divide-white/10">
                <div class="space-y-2 py-6">
                  <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-black hover:bg-white/5 active:text-orange-400">Product</a>
                  <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-black hover:bg-white/5">Features</a>
                  <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-black hover:bg-white/5">Marketplace</a>
                  <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-black hover:bg-white/5">Company</a>
                </div>
                <div class="py-6">
                  <a href="login.php" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-white hover:bg-white/5">Log in</a>
                </div>
              </div>
            </div>
          </el-dialog-panel>
        </div>
      </dialog>
    </el-dialog>
  </header>

  <!-- register form -->
     <div class="flex items-center justify-center px-125 py-50">
    <div class="container rounded-2xl shadow-xl p-8 shadow-lg" style="background-color: rgb(255, 255, 255);">
        <div class="justify-center">
            <div class="col-md-6">
                <div class="register-container">
                    
                          <div class="text-center mb-6">
        <h2 class="text-4xl font-bold " style="color: rgb(21, 169, 255);">
          Selamat Datang
        </h2>
        <p class="text-lg font-bold text-gray-600 dark:text-black-400">Daftar</p>
      </div>
                    
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <?php if (isset($success)): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <form method="POST">
                        <div >
                            <label for="username" class="block text-l  text-black dark:text-gray-900 mb-2">Username</label>
                            <input type="text" class="w-full px-4 py-3 rounded-lg bg-gray-0 dark:bg-gray-300 text-gray-900 dark:text-black outline-none"
                             id="username" name="username" required>
                        </div>

                        <div >
                            <label for="password" class="block text-l text-gray-700 dark:text-gray-900 mb-2">Password</label>
                            <input type="password" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-0 dark:bg-gray-300 text-gray-900 dark:text-black outline-none"
                             id="password" name="password" required>
                        </div>
                        <div class="mb-3" >
                            <label for="confirm_password" class="block text-l text-gray-700 dark:text-gray-900 mb-2">Konfirmasi Password</label>
                            <input type="password" 
                            class="w-full px-4 py-3 rounded-lg bg-gray-0 dark:bg-gray-300 text-gray-900 dark:text-black outline-none"
                             id="confirm_password" name="confirm_password" required
                             >
                        </div>
                        <button type="submit" class="w-full bg-cyan-600 text-white py-3 rounded-lg hover:bg-cyan-700 transition">Daftar</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="login.php">Sudah punya akun? Login di sini</a>
                    </div>
                
            </div>
        </div>
    </div>
                    </div>
                    </div>
</body>
</html>
<html>
    <head>
           <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
<body>
    <!-- Navbar -->
<header class="border-b border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
  <div class="mx-auto flex h-16 max-w-7xl items-center gap-8 px-4 sm:px-6 lg:px-8">
    <a href="#" title="" class="flex text-xl">
      <span class="font-bold text-gray-700 dark:text-gray-200">DIGIDAWG</span>
      <span class="text-lime-600 dark:text-lime-500">.OWL</span>
    </a>

    <div class="flex flex-1 items-center justify-end md:justify-between">
      <nav aria-label="Global" class="hidden md:block">
        <ul class="flex items-center gap-6 text-sm">
          <li>
            <a class="border-b-2 border-lime-500 pb-5 text-sm font-medium text-gray-900 dark:border-lime-400 dark:text-white" href="index.php"> Dashboard </a>
          </li>

          <li>
            <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#"> Teams </a>
          </li>

          <li>
            <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#"> Projects </a>
          </li>

          <li>
            <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#"> Calendar </a>
          </li>
        </ul>
      </nav>

      <div class="flex items-center gap-4">
        <div class="hidden sm:flex sm:gap-4">

          <a href="#" class="block shrink-0">
            <span class="sr-only">Profile</span>
            <img alt="Man" src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" class="h-10 w-10 rounded-full object-cover" />
          </a>
        </div>

        <button class="block rounded bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 md:hidden dark:bg-gray-800 dark:text-white dark:hover:text-white/75">
          <span class="sr-only">Toggle menu</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</header>

<!-- Form Login -->
 <!-- Login Form -->
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 flex items-center justify-center px-4 py-12">
  <div class="max-w-md w-full">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
      <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-12 h-12 bg-lime-100 dark:bg-lime-900/40 rounded-xl mb-4">
          <svg class="w-6 h-6 text-lime-600 dark:text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
          </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">selamat datang kembali</h2>
        <p class="text-gray-600 dark:text-gray-400 mt-2">Masuk ke akun anda</p>
      </div>

      <form class="space-y-6">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Email address
          </label>
          <input
            id="email"
            name="email"
            type="email"
            autocomplete="email"
            required
            class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-lime-500 dark:focus:ring-lime-400 focus:border-lime-500 dark:focus:border-lime-400 outline-none transition-colors text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
            placeholder="example@digidawg.owl"
          >
        </div>

        <div>
          <div class="flex items-center justify-between mb-2">
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
              Sandi
            </label>
            <a href="#" class="text-sm font-medium text-lime-600 dark:text-lime-400 hover:text-lime-500 dark:hover:text-lime-300">
              Lupa Sandi?
            </a>
          </div>
          <input
            id="password"
            name="password"
            type="password"
            autocomplete="current-password"
            required
            class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-lime-500 dark:focus:ring-lime-400 focus:border-lime-500 dark:focus:border-lime-400 outline-none transition-colors text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
            placeholder="••••••••"
          >
        </div>

        <div class="flex items-center">
          <input
            id="remember-me"
            name="remember-me"
            type="checkbox"
            class="h-4 w-4 text-lime-600 dark:text-lime-400 focus:ring-lime-500 dark:focus:ring-lime-400 border-gray-300 dark:border-gray-600 rounded"
          >
          <label for="remember-me" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
            Ingat Saya
          </label>
        </div>

        <button
          type="submit"
          class="w-full bg-lime-600 dark:bg-lime-500 text-white py-3 px-4 rounded-lg font-medium hover:bg-lime-700 dark:hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 dark:focus:ring-offset-gray-800 transition-colors"
        >
          Masuk
        </button>
      </form>

      <div class="mt-6">
        <div class="relative">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">
              Or continue with
            </span>
          </div>
        </div>

        <div class="mt-6 grid grid-cols-2 gap-3">
          <button
            type="button"
            class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600"
          >
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
            </svg>
            Google
          </button>
          <button
            type="button"
            class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600"
          >
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 0c-6.626 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-3.862c0-1.881-2.002-1.722-2.002 0v3.862h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/>
            </svg>
            LinkedIn
          </button>
        </div>
      </div>

      <p class="mt-8 text-center text-sm text-gray-600 dark:text-gray-400">
        Belum Punya Akun?
        <a href="#" class="font-medium text-lime-600 dark:text-lime-400 hover:text-lime-500 dark:hover:text-lime-300">
          Daftar
        </a>
      </p>
    </div>
  </div>
</div>
<!-- footer -->
 <footer class="py-12 px-6 bg-gray-100 dark:bg-gray-900">
  <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-8">
    <div>
      <h3 class="text-gray-900 dark:text-white font-semibold mb-4">Product</h3>
      <ul class="space-y-2 text-gray-600 dark:text-gray-400">
        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">Features</a></li>
        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">Pricing</a></li>
        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">Changelog</a></li>
      </ul>
    </div>
    <div>
      <h3 class="text-gray-900 dark:text-white font-semibold mb-4">Company</h3>
      <ul class="space-y-2 text-gray-600 dark:text-gray-400">
        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">About</a></li>
        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">Blog</a></li>
        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">Careers</a></li>
      </ul>
    </div>
    <div>
      <h3 class="text-gray-900 dark:text-white font-semibold mb-4">Resources</h3>
      <ul class="space-y-2 text-gray-600 dark:text-gray-400">
        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">Documentation</a></li>
        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">Help Center</a></li>
        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">Guides</a></li>
      </ul>
    </div>
    <div>
      <h3 class="text-gray-900 dark:text-white font-semibold mb-4">contact</h3>
      <ul class="space-y-2 text-gray-600 dark:text-gray-400">
        <li><button class="group w-12 hover:w-54 h-12 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 relative rounded text-white duration-700 font-bold flex justify-start gap-2 items-center p-2 pr-6 before:absolute before:-z-10 before:left-8 before:hover:left-40 before:w-6 before:h-6 before:bg-pink-600 before:hover:bg-pink-600 before:rotate-45 before:duration-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8 shrink-0 fill-white">
                      <path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/>
                </svg>
                  <span class="origin-left inline-flex duration-100 group-hover:duration-300 group-hover:delay-500 opacity-0 group-hover:opacity-100 border-l-2 px-1 transform scale-x-0 group-hover:scale-x-100 transition-all">@Kaysan_nawfal_a</span>
            </button>
        </li>
        <li><button class="group w-12 hover:w-44 h-12 bg-gradient-to-r from-blue-600 to-blue-700 relative rounded text-white duration-700 font-bold flex justify-start gap-2 items-center p-2 pr-6 before:absolute before:-z-10 before:left-8 before:hover:left-40 before:w-6 before:h-6 before:bg-blue-500 before:hover:bg-blue-400 before:rotate-45 before:duration-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8 shrink-0 fill-white">
                 <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
                    <span class="origin-left inline-flex duration-100 group-hover:duration-300 group-hover:delay-500 opacity-0 group-hover:opacity-100 border-l-2 px-1 transform scale-x-0 group-hover:scale-x-100 transition-all">Facebook</span>
            </button>
        </li>
      </ul>
    </div>
  </div>
  <div class="max-w-6xl mx-auto mt-12 pt-8 border-t border-gray-200 dark:border-gray-800 text-center text-gray-600 dark:text-gray-400">
    <p>© 2024 Your Company. All rights reserved.</p>
  </div>
</footer>
</body>
</html>

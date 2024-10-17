<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List Wisata | Dashboard</title>
    <link rel="stylesheet" href="/css/user.css" />

    {{-- TOASTR --}}
    <link rel="stylesheet" href="path/to/toastr.css">

    <link rel="shortcut icon" href="/img/MITOUR.png" type="image/x-icon">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="overflow-y-auto">
    <nav class="sidebar text-white">
        <img src="/img/MITOUR.png" alt="Logo" class="logo w-20" />
        <div class="menu-content">
            <ul class="menu-items">
                <li class="menu-title text-xl py-4">Menu</li>
                {{-- DATA PEMESANAN --}}
                <li class="item">
                    <a href="/user/jadwal" class="block py-2">Jadwal Wisata</a>
                </li>

                <li class="item">
                    <a href="/user/dashboard" class="flex items-center py-2">
                        <i class="fas fa-arrow-left"></i>
                        <span class="loguot ml-2">Kembali</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar">
        <i class="fa-solid fa-bars" id="sidebar-close"></i>
    </nav>

    <main class="flex justify-center ml-28">
        @yield('content')
    </main>

    <script src="/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    {{-- TOASTR --}}
    <script src="path/to/toastr.js"></script>
</body>

</html>

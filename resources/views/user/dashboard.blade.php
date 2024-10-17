<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User | Dashboard</title>
    <link rel="stylesheet" href="/css/user.css" />

    {{-- TOASTR --}}
    <link rel="stylesheet" href="path/to/toastr.css">

    <link rel="shortcut icon" href="/img/MITOUR.png" type="image/x-icon">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    {{-- SWEET ALERT --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let loginSuccess = @json(session('loginSuccess', false));
            let userEmail = @json(session('userEmail', ''));

            if (loginSuccess) {
                // Extract username from email
                let username = userEmail.split('@')[0];

                // Display SweetAlert upon successful login
                Swal.fire({
                    title: "Success!",
                    text: `Welcome In MiTour, ${username}!`,
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Update the content of the main element with the welcome message
                        document.querySelector('.main').innerHTML = `
                            <h1 style="text-align: center; margin-right:400px; margin-bottom: 800;">
                                Welcome in MiTour <br>${username}
                            </h1>`;
                    }
                });
            }
        });
    </script>


</head>

<body>
    <nav class="sidebar">
        <img src="/img/MITOUR.png" alt="Logo" class="logo" width="100px">
        <div class="menu-content">
            <ul class="menu-items">
                <div class="menu-title">Menu</div>
                <li class="item">
                <li class="item">
                    <a href="{{ route('user.wisata') }}">
                        <label class="wisata-title">List Wisata</label>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </li>

                <li class="item">
                    <a href="#" class="logout-button" onclick="confirmLogout()">
                        <i class="fa-solid fa-arrow-left"></i>
                        <label for="" class="btn">Logout</label>
                    </a>
                </li>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar">
        <i class="fa-solid fa-bars" id="sidebar-close"></i>
    </nav>

    <main class="main" style="height: 100vh; display: flex; align-items: center; justify-content: center;">
        <h1 style="text-align: center; margin-right:400px; margin-bottom: 800;">
            Welcome to MiTour, <br>{{ explode('@', session('userEmail'))[0] }}
            </h3>
    </main>


    <script src="/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    {{-- TOASTR --}}
    <script src="path/to/toastr.js"></script>
    <!-- ... (kode HTML lainnya) ... -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- LOGOUT --}}
    <script>
        function confirmLogout() {
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Anda akan keluar dari halaman ini..",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Keluar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/index'; // Ganti dengan URL halaman home index yang sesuai
                }
            });
        }
    </script>
</body>

</html>

</body>

</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="/css/dashboard.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    {{-- SWEET ALERT --}}
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>

<body>
    @if(session('success'))
    <script>
        // Import SweetAlert library (pastikan sudah diinstal atau download)
        swal("Berhasil", "{{ session('success') }}", "success");
    </script>
@endif

    <nav class="sidebar">
        <img src="/img/MITOUR.png" alt="Logo" class="logo" width="100px">

        <div class="menu-content">
            <ul class="menu-items">
                <div class="menu-title">Menu</div>

                <li class="item">
                    <a href="/admin/wisata">Tambah Wisata</a>
                </li>

                <li class="item">
                    <a href="/admin/data">Bukti Pemesanan</a>
                </li>

                <li class="item">
                    <a href="/index">
                        <i class="fa-solid fa-arrow-left"></i>
                        <label for="">Logout</label>
                    </a>
                </li>

                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar">
        <i class="fa-solid fa-bars" id="sidebar-close"></i>
    </nav>

    <main class="main">
        <h1></h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Kota Wisata</th>
                    <th scope="col">Nama Wisata</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
    </main>

    <script src="/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    {{-- SWEET ALERT --}}
    <script src="sweetalert2.min.js"></script>
</body>

</html>

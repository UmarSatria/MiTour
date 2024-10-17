<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data User | Dashboard</title>
    <link rel="stylesheet" href="/css/dashboard.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="sidebar">
        <img src="/img/MITOUR.png" alt="Logo" class="logo" width="100px">

        <div class="menu-content">
            <ul class="menu-items">
                <div class="menu-title">Menu</div>

                <li class="item">
                    <a href="/admin/dashboard">
                        <i class="fa-solid fa-arrow-left"></i>
                        <label for="">Kembali</label>
                    </a>
                </li>

                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar">
        <i class="fa-solid fa-bars" id="sidebar-close"></i>
    </nav>

    <div class="main overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telephone</th>
                        <th scope="col">Harga Tiket</th>
                        <th scope="col">Jumlah Tiket</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemesanan as $pesan)
                        <tr>
                            <td scope="row">{{ $pesan->id }}</td>
                            <td scope="row">{{ $pesan->nama }}</td>
                            <td scope="row">{{ $pesan->alamat }}</td>
                            <td scope="row">-{{ $pesan->no_handphone }}</td>
                           <td scope="row">{{ 'Rp ' . number_format($pesan->admin->harga_tiket, 0, ',', '.') }}</td>
                            <td scope="row">{{ number_format($pesan->jumlah_tiket, 0, ',', '.') }} Tiket</td>
                            <td scope="row">Rp{{ number_format($pesan->total, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>


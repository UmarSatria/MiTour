<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal | Wisata</title>
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
                    <a href="/user/wisata">
                        <i class="fa-solid fa-arrow-left"></i>
                        <label for="">Kembali</label>
                    </a>
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
                        <th scope="col">Wisata</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Tanggal Buka</th>
                        <th scope="col">Jam Buka</th>
                        <th scope="col">Jam Tutup</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wisata as $ws)
                        <tr>
                            <td scope="row">{{ $ws->id }}</td>
                            <td scope="row">{{ $ws->nama_wisata }}</td>
                            <td scope="row">{{ $ws->lokasi_wisata }}</td>
                            <td scope="row">{{ $ws->desc_wisata }}</td>
                            @if ($ws->jadwal->isEmpty())
                                <td colspan="6">Tidak ada jadwal tersedia</td>
                            @else
                                @foreach ($ws->jadwal as $jadwal)
                                        <td scope="row">{{ $jadwal->hari }}</td>
                                        <td scope="row">{{ $jadwal->jam_buka }}</td>
                                        <td scope="row">{{ $jadwal->jam_tutup }}</td>
                                @endforeach
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

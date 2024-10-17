<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wisata | Dashboard</title>
    <link rel="stylesheet" href="/css/user.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="shortcut icon" href="/img/MITOUR.png" type="image/x-icon">
    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            </ul>
        </div>
    </nav>
    @foreach ($wisata as $ws)
        {{-- MODAL --}}
        <div class="modal fade" id="exampleModal-{{ $ws->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.wisata.update', $ws->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <label for="nama_wisata" class="">Nama Wisata:</label>
                            <input type="text" class="form-control" name="nama_wisata" value="{{ $ws->nama_wisata }}"
                                required placeholder="Masukkan Nama Wisata">

                            <label for="lokasi_wisata" class="">Lokasi Wisata:</label>
                            <textarea name="lokasi_wisata" class="form-control" cols="20" rows="2" required
                                placeholder="Masukkan Lokasi Wisata">{{ $ws->lokasi_wisata }}</textarea>

                            <label for="desc_wisata" class="">Deskripsi:</label>
                            <textarea name="desc_wisata" class="form-control" cols="30" rows="4" required
                                placeholder="Masukkan Deskripsi Wisata">{{ $ws->desc_wisata }}</textarea>

                            <label for="img_wisata" class="">Gambar:</label>
                            <div class="d-flex">
                                <input type="file" class="form-control" name="img_wisata"
                                    placeholder="Upload Gambar">
                                <img src="{{ asset('storage/img/' . $ws->img_wisata) }}" alt="{{ $ws->img_wisata }}"
                                    width="100" height="100">
                            </div>

                            <label for="jumlah_tiket" class="">Jumlah Tiket:</label>
                            <input type="number" class="form-control" name="jumlah_tiket"
                                value="{{ $ws->jumlah_tiket }}" required placeholder="Masukkan Jumlah Tiket">

                            <label for="harga_tiket" class="">Harga Tiket:</label>
                            <input type="number" class="form-control" name="harga_tiket" value="{{ $ws->harga_tiket }}"
                                required placeholder="Masukkan Harga Tiket">
                    </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal 2-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jadwal Wisata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.jadwal.store') }}" method="POST">
                        @csrf
                            <div class="mb-3">
                                <label for="hari" class="form-label">Hari:</label>
                                <input type="date" name="hari" class="form-control"
                                    value="">
                                @error('hari')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jam_buka" class="form-label">Jam Buka:</label>
                                <input type="time" name="jam_buka" class="form-control"
                                    value="">
                                @error('jam_buka')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jam_tutup" class="form-label">Jam Tutup:</label>
                                <input type="time" name="jam_tutup" class="form-control"
                                    value="">
                                @error('jam_tutup')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar">
        <i class="fa-solid fa-bars" id="sidebar-close"></i>
    </nav>
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: "Success",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif

    <div class="main" style="width: 100%">
        <a href="/admin/create" class="btn btn-success" text-decoration: none; color: #fff;">Tambah</a>
        {{-- <button class="btn btn-outline-primary" idata-to   ggle="modal" data-target="#exampleModal">tambah</button> --}}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Wisata</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga Tiket</th>
                    <th scope="col">Jumlah Tiket</th>
                    <th scope="col">Tambah Jadwal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wisata as $no => $ws)
                    <tr>
                        <td scope="row">{{ ++$no }}</td>
                        <td scope="row">{{ $ws->nama_wisata }}</td>
                        <td scope="row">{{ $ws->lokasi_wisata }}</td>
                        <td scope="row">
                            <img src="{{ asset('storage/img/' . $ws->img_wisata) }}" alt="" width="100"
                                height="100">
                        </td>
                        <td scope="row">{{ $ws->desc_wisata }}</td>
                        <td scope="row">Rp{{ $ws->harga_tiket }}</td>
                        <td scope="row">{{ $ws->jumlah_tiket }}</td>
                        <td scope="row">

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2" onclick="showUpdateModal2()">
                                Tambah
                            </button>
                            </a>
                        </td>
                        <td scope="row">
                            <div class="d-flex justify-content-header gap2">
                                <div class="">
                                    <button type="button" class="btn btn-warning pr-2"
                                        onclick="showUpdateModal({{ $ws->id }})">Update</button>
                                </div>
                                <div class="">
                                    <form id="deleteForm-{{ $ws->id }}"
                                        action="/admin/delete/{{ $ws->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger ms-2"
                                            onclick="confirmDelete('deleteForm-{{ $ws->id }}')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Pemanggilan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- BOOTSTRAP --}}
    <script>
        function confirmDelete(formId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }

        function showUpdateModal2() {
            $('#exampleModal2').modal('show');
        }

        function showUpdateModal(id) {
            $('#exampleModal-' + id).modal('show');
        }
    </script>
</body>

</html>

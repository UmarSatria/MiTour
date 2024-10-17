<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form | Tambah Wisata</title>
    <!-- LINK -->
    <link rel="stylesheet" href="css/create.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="..."
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="..." crossorigin="anonymous">
    <link rel="shortcut icon" href="/img/MITOUR.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/kai_bg.png" type="image/x-icon">
</head>

<body>
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="my-5 display-3 fw-bold ls-tight" style="font-size: 50px;">
                            Nyari Tempat Liburan? <br />
                            <span class="text">MiTour Solusinya!</span>
                        </h1>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            Temukan destinasi tempat wisata paling menakjubkan di dunia melalui MiTour.
                            Rasakan pesona alam yang tiada tara dan jelajahi kekayaan budaya di setiap perjalanan Anda.
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <form action="/admin/tambah" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')

                                    {{-- SELECT WISATA --}}
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="deskripsi">Nama Wisata:</label>
                                        <input type="text" class="form-control" name="nama_wisata">
                                        @error('nama_wisata')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <!-- Input LOKASI -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="lokasi_wisata">Lokasi Wisata</label>
                                        <textarea name="lokasi_wisata" cols="20" rows="2" class="form-control"></textarea>
                                        @error('lokasi_wisata')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="deskripsi">Deskripsi</label>
                                        <textarea id="deskripsi" name="desc_wisata" class="form-control" cols="40" rows="5"></textarea>
                                        @error('desc_wisata')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="gambar">Gambar</label>
                                        <input type="file" class="form-control" name="img_wisata">
                                        @error('img_wisata')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="gambar">Jumlah Tiket</label>
                                        <input type="text" class="form-control" name="jumlah_tiket">
                                        @error('jumlah_tiket')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="gambar">Harga Tiket</label>
                                        <input type="text" class="form-control" name="harga_tiket">
                                        @error('harga_tiket')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success" style="color: #fff">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="..."
        crossorigin="anonymous"></script>
</body>

</html>

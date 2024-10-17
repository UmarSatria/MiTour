<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form | Pemesanan</title>
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
                                <form action="/user/pesan/{{ $id }}" method="POST" id="pesanForm">
                                    @csrf
                                    @method('post')
                                    {{-- NAMA --}}
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama:</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                        @error('nama')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- ALAMAT --}}
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat:</label>
                                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                                        @error('alamat')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- NO HANDPHONE --}}
                                    <div class="mb-3">
                                        <label for="no_handphone" class="form-label">No. Handphone:</label>
                                        <input type="number" class="form-control" id="no_handphone"
                                            name="no_handphone">
                                        @error('no_handphone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- JUMLAH TIKET --}}
                                    <div class="mb-3">
                                        <label for="jumlah_tiket" class="form-label">Jumlah Tiket:</label>
                                        <input type="number" class="form-control" id="jumlah_tiket"
                                            name="jumlah_tiket">
                                        @error('jumlah_tiket')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                        <button type="submit" class="btn btn-success">Pesan</button>                                  </div>
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
    <!-- Add this script at the end of your blade view -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- ... -->
    <script>
        $(document).ready(function() {
            $('#pesanForm').submit(function(e) {
                e.preventDefault();

                var form = this;
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function() {
                        // Tampilkan SweetAlert pertama setelah berhasil order
                        Swal.fire({
                            title: "Selamat!",
                            text: "Anda berhasil Order!",
                            icon: "success",
                            showCancelButton: true,
                            confirmButtonText: 'Cetak',
                            cancelButtonText: 'Kembali'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Munculkan modal untuk tautan unduhan gambar
                                Swal.fire({
                                    title: "{{ $wisata->nama_wisata }}",
                                    text: "",
                                    imageUrl: "{{ asset('storage/img/' . $wisata->img_wisata) }}",
                                    imageWidth: 350,
                                    imageHeight: 200,
                                    imageAlt: "{{ $wisata->nama_wisata }}",
                                    showCancelButton: true,
                                    confirmButtonText: 'Download',
                                    cancelButtonText: 'Tutup'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Unduh gambar yang digabungkan
                                        downloadMergedImage(
                                            "{{ asset('storage/img/' . $wisata->img_wisata) }}",
                                            "{{ $wisata->nama_wisata }}",
                                           );
                                    }
                                    form.reset();
                                });
                            } else {
                                form.reset();
                            }
                        });
                    },
                    error: function() {
                    }
                });
            });

            // Fungsi untuk mengunduh gambar dari tautan
            function downloadImage(url, filename) {
                var a = document.createElement('a');
                a.href = url;
                a.download = filename;
                a.click();
            }

            function downloadMergedImage(url, namaWisata, namaPemesan) {
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');
                var img = new Image();
                img.crossOrigin = 'Anonymous';

                img.onload = function() {
                    // Menetapkan ukuran canvas sesuai dengan gambar
                    canvas.width = img.width;
                    canvas.height = img.height;

                    // Menggambar gambar ke canvas
                    ctx.drawImage(img, 0, 0);

                    // Menambahkan informasi ke canvas
                    ctx.fillStyle = '#ffffff';
                    ctx.font = '20px Arial';
                    ctx.fillText('Wisata: ' + namaWisata, 10, canvas.height - 50);
                    ctx.fillText('Pemesan: ' + namaPemesan, 10, canvas.height - 20);

                    // Unduh gambar yang digabungkan
                    downloadImage(canvas.toDataURL('image/png'), 'MiTour | Tiket.png');
                };

                img.src = url;
            }
        });
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form | Ulasan</title>
    <!-- LINK -->
    <link rel="stylesheet" href="css/create.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="..."
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="..." crossorigin="anonymous">
    <link rel="shortcut icon" href="/img/MITOUR.png" type="image/x-icon">
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
                                <form action="{{ route('user.ulasan.store', $id) }}" method="POST" id="ulasanForm"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="wisata_id" value="{{ $id }}">
                                    {{-- KOMENTAR --}}
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="alamat">Komentar:</label>
                                        <textarea name="komentar" cols="20" rows="2" class="form-control"></textarea>
                                        @error('komentar')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- RATING --}}
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="alamat">Rating</label>
                                        <input type="number" name="rating" class="form-control">
                                        @error('rating')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success" style="color: #fff">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONI --}}
    <section style="color: #000; background-color: #f3f2f2;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xl-8 text-center">
                    <h3 class="fw-bold mb-4">Testimoni</h3>
                    <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                        "Tingkatkan pengalaman liburan Anda dengan pemesanan destinasi wisata melalui layanan ini!
                        Pelayanan yang sangat memuaskan, informasi yang jelas, dan destinasi yang luar biasa membuat
                        perjalanan kami menjadi tak terlupakan.
                    </p>
                </div>
            </div>
            <div class="row text-center">
                @foreach ($wisata as $ws)
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="card bg-gray-500">
                            <div class="card-body py-4 mt-2">
                                <div class="d-flex justify-content-center mb-4">
                                    <img src="{{ asset('storage/img/' . $ws->img_wisata) }}"
                                        class="rounded-circle shadow-1-strong" width="100" height="100" />
                                </div>
                                <h6 class="font-weight-bold">{{ $ws->nama_wisata }}</h6>

                                {{-- NAMA PEMESAN --}}
                                <div class="mb-3">
                                    <label class="form-label">Dipesan oleh:</label>
                                    @if ($pemesanan)
                                        {{ $pemesanan->nama ?? 'Belum ada pemesan' }}
                                    @else
                                        Belum ada pemesan
                                    @endif
                                </div>

                                <ul class="list-unstyled d-flex justify-content-center">
                                    {{-- RATING --}}
                                    @if (isset($ulasan[$ws->id]))
                                        Rating: {{ $ulasan[$ws->id]->rating ?? 'Belum ada rating' }}
                                    @else
                                        Belum ada rating
                                    @endif
                                </ul>

                                <p class="mb-2">
                                    <i class="fas fa-quote-left pe-2">
                                        @if (isset($ulasan[$ws->id]))
                                            {{ $ulasan[$ws->id]->komentar ?? 'Belum ada ulasan' }}
                                        @else
                                            Belum ada ulasan
                                        @endif
                                    </i>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="..."
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.getElementById('ulasanForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const ratingInput = document.getElementsByName('rating')[0];
            if (isNaN(ratingInput.value) || ratingInput.value < 1 || ratingInput.value > 5) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Rating harus diisi dengan angka antara 1 - 5.',
                    icon: 'error'
                });
            } else {
                // Send an Ajax request to submit the form data
                const formData = new FormData(this);

                fetch(this.action, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: "Form | Ulasan",
                                text: "Anda berhasil menambahkan Komentar",
                                icon: "success"
                            }).then(function() {
                                // Reset the form after showing the success message
                                document.getElementById('ulasanForm').reset();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan dalam pengiriman data.',
                                icon: 'error'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan dalam pengiriman data.',
                            icon: 'error'
                        });
                    });
            }
        });
    </script>

</body>

</html>

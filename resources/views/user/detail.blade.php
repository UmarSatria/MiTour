<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Detail | Wisata</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/detail.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/img/MITOUR.png" type="image/x-icon">
</head>

<body>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/img/' . $wisata->img_wisata) }}"
                        alt="{{ $wisata->nama_wisata }}" alt="{{ $wisata->nama_wisata }}" width="700" height="500"
                        style="object-fit: cover;" />
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $wisata->nama_wisata }}</h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">Rp45.00</span>
                        {{-- HARGA --}}
                        <span>Rp{{ $wisata->harga_tiket }}</span>
                    </div>
                    {{-- DESKRIPSI --}}
                    <p class="lead">{{ $wisata->desc_wisata }}</p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                            style="max-width: 3rem" />
                        <a href="/user/pesan/{{ $wisata->id }}" style="margin-right: 6px;">
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Pesan
                            </button>
                        </a>

                        <a href="/user/ulasan/{{ $id }}">
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class=""></i>
                                Berikan Ulasan
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Wisata Lainnya</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                        </div>
                        <!-- Product image-->
                        <img class="card-img-top" src="{{$wisata->img_wisata}}"
                            alt="{{$wisata->nama_wisata}}" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$wisata->nama_wisata}}</h5>
                                <!-- Product price-->
                                <span class="text-muted">Rp{{$wisata->harga_tiket}}</span>

                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Tambah</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; MiTour
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>

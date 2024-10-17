<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- LINK -->
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="..."
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="..." crossorigin="anonymous">
    <link rel="shortcut icon" href="img/MITOUR.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/kai_bg.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
                                <form action="/login" method="POST">
                                    @csrf

                                    <!-- Input Email/Username -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email/Username</label>
                                        <input type="text" id="email" name="email" class="form-control" />
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Input Password -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" />
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-4">
                                        <label class="" for="form2Example33">
                                            Don't Have account? <a href="/register"
                                                style="text-decoration: none; color: #595555;">Register</a>
                                        </label>
                                    </div>

                                    <!-- Tombol Submit -->
                                    <button type="submit" class="btn btn-block mb-4"
                                        style="background: var(--text-color-third); color: white;">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="..."
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('LoginFailed'))
        <script>
            // Tampilkan SweetAlert saat login gagal
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('LoginFailed') }}',
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            // Tampilkan SweetAlert untuk setiap kesalahan validasi
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '@foreach ($errors->all() as $error){{ $error }}<br>@endforeach',
            });
        </script>
    @endif
</body>

</html>

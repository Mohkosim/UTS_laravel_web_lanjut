<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Produc</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        /* Warna untuk pesan success */
        .toast-success {
            background-color: #28a745;
            /* Warna hijau untuk success */
        }

        /* Warna untuk pesan error */
        .toast-error {
            background-color: #dc3545;
            /* Warna merah untuk error */
        }
    </style>
</head>

<body style="background: lightgray">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand">
                    <img src="{{ asset('gambar1/logo.png') }}" alt="" style="height: 50px;">
                    Toko Bunga
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mx-5 nav nav-underline">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page">Home page</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav me-4 ">
                        <li class="nav-item"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav me-end">

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('login') }}" method="GET" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-15">
                    <p class="text-start">
                    <h3>Welcome to our Flower Shop!</h3>
                    </p>
                    <div>
                        <h3 class="text-center my-4">
                            Detail Products</h3>
                        <hr>
                    </div>
                </div>



                <div class="row g-0 bg-body-secondary position-relative mx-auto" style="max-width: 1000px;">
                    <div class="col-md-5 mb-md-0 p-md-4">
                        <img src="{{ asset('storage/gambar/' . $tokos->gambar) }}" style="width: 300px; height: auto;"
                            class="card-img-top" alt="Gambar">
                    </div>
                    <div class="col-md-6 p-4 ps-md-0 ">
                        <h2 class="mt-0">{{ $tokos->nama_bunga }}</h2>
                        <p class="card-text">Stok Barang : {{ $tokos->stok }}</p>
                        <p class="card-text">Deskripsi Barang : {{ $tokos->description }}</p>
                        <h4 class="card-title">Rp{{ number_format($tokos->harga, 0, ',', '.') }}</h4>
                        <div class="d-flex justify-content-end align-items-end">
                            <a href="" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg> Buy
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        //message with toastr
        @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

</body>

</html>

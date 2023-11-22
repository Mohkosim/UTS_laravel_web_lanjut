<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Producpage</title>
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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
                            <a class="nav-link " href="{{ route('homepage') }}">Home page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page">product page</a>
                        </li>
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
                    <div>
                        <h3 class="text-center my-4">Data Toko Bunga</h3>
                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body"> <a href="{{ route('create') }}"
                                class="btn btn-md btn-success mb-3">TAMBAH</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama Bunga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody> @forelse ($tokos as $toko) <tr>
                                        <td>{{ $toko->nama_bunga }}</td>
                                        <td>{{ $toko->stok }}</td>
                                        <td>Rp{{ number_format($toko->harga, 0, ',', '.') }}</td>
                                        <td>{!! $toko->description !!}</td>
                                        <td>
                                            @if($toko->gambar)
                                            <img src="{{ asset('storage/gambar/' . $toko->gambar) }}" alt="Gambar"
                                                style="max-width: 200px; max-height: 200px;">

                                            @else
                                            <p>Tidak ada gambar yang tersedia</p>
                                            @endif
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('delete', $toko->id) }}" method="POST">
                                                <a href="{{ route('edit', $toko->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf @method('DELETE') <button type="submit"
                                                    class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr> @empty <div class="alert alert-danger"> Data Post belum Tersedia. </div>
                                    @endforelse </tbody>
                            </table>
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

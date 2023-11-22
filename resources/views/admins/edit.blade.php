<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                            <a class="nav-link "  href="{{ route('homepage') }}">Home page</a>
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
        <div class="col-md-12 mt-5">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('update', $tokos->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Menggunakan 'nama_bunga' sebagai nama input -->
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Bunga</label>
                            <input type="text" class="form-control @error('nama_bunga') is-invalid @enderror"
                                name="nama_bunga" value="{{ old('nama_bunga', $tokos->nama_bunga) }}" placeholder="Nama Bunga">
                            <!-- error message untuk 'nama_bunga' -->
                            @error('nama_bunga')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Menggunakan 'stok' sebagai nama input -->
                        <div class="form-group">
                            <label class="font-weight-bold">Stok</label>
                            <input type="text" class="form-control @error('stok') is-invalid @enderror"
                                name="stok" value="{{ old('stok', $tokos->stok) }}"
                                placeholder="stok">
                            <!-- error message untuk 'stok' -->
                            @error('stok')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Menggunakan 'harga' sebagai nama input -->
                        <div class="form-group">
                            <label class="font-weight-bold">Harga</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                name="harga" value="{{ old('harga', $tokos->harga) }}"
                                placeholder="Harga">
                            <!-- error message untuk 'harga' -->
                            @error('harga')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Menggunakan 'Description' sebagai nama input -->
                        <div class="form-group">
                            <label class="font-weight-bold">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                name="description"
                                placeholder="description">{{ old('description', $tokos->description) }}</textarea>

                            <!-- error message untuk 'Description' -->
                            @error('description')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Gambar</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                name="image">

                            @if(isset($tokos) && $tokos->gambar)
                            <div class="mt-2">
                                <strong>Current Image:</strong> {{ $tokos->gambar }}
                            </div>
                            @endif

                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

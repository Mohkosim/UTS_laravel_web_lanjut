<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
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
                        <h3 class="text-center my-4">Toko Bunga</h3>
                        <hr>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>Order Form</h3>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            @foreach($tokos as $toko)

                            <!-- Order form modal -->
                            <div class="modal fade" id="orderForm{{$toko->id}}" tabindex="-1"
                                aria-labelledby="orderForm{{$toko->id}}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderForm{{$toko->id}}Label">Order Form -
                                                {{$toko->nama_bunga}}</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Your order form content goes here -->
                                            <form action="{{ route('order.submit') }}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Your Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Your Address</label>
                                                    <textarea class="form-control" id="address" name="address" rows="3"
                                                        required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="quantity" class="form-label">Quantity</label>
                                                    <input type="number" class="form-control" id="quantity"
                                                        name="quantity" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Place Order</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        function updateFormFields() {
            var selectedProduct = document.getElementById("product");
            var selectedOption = selectedProduct.options[selectedProduct.selectedIndex];
            var price = selectedOption.getAttribute("data-price");

            // Display selected flower information
            var flowerInfoDiv = document.getElementById("flowerInfo");
            flowerInfoDiv.innerHTML = "<p>Selected Flower: " + selectedOption.text + "</p><p>Price: Rp" + Number(price).toLocaleString() + "</p>";
        }
    </script>

</body>

</html>

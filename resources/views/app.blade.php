<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8; /* Warna latar belakang yang lebih cerah */
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #007bff; /* Warna navbar */
        }
        .navbar-brand, .nav-link {
            color: white !important; /* Warna teks navbar putih */
        }
        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Efek hover pada link */
            border-radius: 5px; /* Menambahkan sudut melengkung pada link saat hover */
        }
        .header {
            background: linear-gradient(135deg, #007bff 30%, #00c6ff 100%);
            color: white;
            padding: 40px 0;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Menambahkan bayangan pada header */
        }
        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        .header p {
            font-size: 1.25rem;
        }
        .content {
            margin-top: 20px;
        }
        .footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .btn-primary {
            background-color: #0056b3; /* Warna tombol yang lebih gelap */
            border: none;
        }
        .btn-primary:hover {
            background-color: #003f7f; /* Warna tombol saat hover */
        }
        .table {
            margin-top: 20px;
            background-color: white; /* Latar belakang tabel putih */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Bayangan untuk tabel */
            border-radius: 8px; /* Sudut melengkung pada tabel */
            overflow: hidden; /* Untuk menghilangkan sudut tajam */
        }
        th {
            background-color: #007bff; /* Warna header tabel */
            color: white; /* Warna teks header tabel */
            padding: 15px; /* Padding yang lebih baik untuk header */
            font-size: 1.1rem; /* Ukuran font header tabel */
        }
        td {
            padding: 10px; /* Padding yang lebih baik untuk sel tabel */
            vertical-align: middle; /* Menjaga teks rata tengah */
            font-size: 1rem; /* Ukuran font sel tabel */
            color: #333; /* Warna teks sel tabel */
        }
        tr:hover {
            background-color: rgba(0, 123, 255, 0.1); /* Efek hover pada baris tabel */
        }
        /* Style untuk alert pesan */
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand mx-auto" href="#">Fish Store</a> <!-- Menambahkan mx-auto untuk menempatkan logo di tengah -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto"> <!-- Menambahkan mx-auto untuk menempatkan item navbar di tengah -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Beranda</a> <!-- Ganti dengan url('/') -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ikan.index') }}">Ikan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pesanan.index') }}">Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pemasok.index') }}">Pemasok</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="header">
        <h1>Selamat Datang di Fish Store</h1>
        <p>Temukan berbagai jenis ikan segar dan berkualitas</p>
    </div>

    <div class="container content">
        @yield('content')
    </div>

    <footer class="footer">
        <p>&copy; 2024 Fish Store. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>

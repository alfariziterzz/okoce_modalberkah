@extends('layouts.admin.app')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        .welcome-heading {
            margin-top: 50px; /* Adjust this value as needed */
        }
        .card-container {
            margin-top: 30px; /* Adjust this value as needed */
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .card {
            width: 30%; /* Adjust this value as needed */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow for shading effect */
            border-radius: 10px; /* Optional: Add border radius for rounded corners */
            overflow: hidden; /* Ensure content doesn't overflow */
            margin-bottom: 20px; /* Space between cards when wrapping */
        }
        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px; /* Adjust padding as needed */
        }
        .card img {
            width: 10cm; /* Set image width */
            height: 10cm; /* Set image height */
            align-items: center;
        }
        @media (max-width: 768px) {
            .card {
                width: 45%; /* Adjust for tablets */
            }
        }
        @media (max-width: 576px) {
            .card {
                width: 100%; /* Adjust for mobile phones */
            }
        }
    </style>
</head>
@section('content')
<body>
    <div class="container welcome-heading">
        <center><h2>Selamat Datang di Dashboard Admin CMS Modal Berkah</h2></center>
    </div>
    <div class="container card-container">
        <div class="card">
            <div class="card-body">
                <img src="https://png.pngtree.com/png-vector/20190508/ourmid/pngtree-gallery-vector-icon-png-image_1028015.jpg" alt="Galeri"> <!-- Replace with actual image URL -->
                <h5 class="card-title">Galeri</h5>
                <p class="card-text">Lihat dan kelola galeri di sini.</p>
                <a href="{{ url('/gallery-section') }}" class="btn btn-primary">Lihat Galeri</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <img src="https://png.pngtree.com/png-vector/20221102/ourmid/pngtree-breaking-news-vector-label-png-image_6413040.png" alt="Berita"> <!-- Replace with actual image URL -->
                <h2 class="card-title">Berita</h2>
                <p class="card-text">Lihat dan kelola berita di sini.</p>
                <a href="{{ url('/news-section') }}" class="btn btn-primary">Lihat Berita</a>
            </div>
        </div>
    </div>
</body>
@endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dayaday</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">Dayaday midterm exam pre-requisite</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">


                    </ul>
                </div>
            </div>
        </nav>

        <!-- React Component Placeholder -->
        <div class="container mt-5">
            <div id="example"></div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>

 <style>
            body {
                background-color: #121212;
                color: #e0e0e0;
                font-family: 'Nunito', sans-serif;
            }
            .navbar {
                background-color: #1f1f1f !important;
            }
            .navbar .nav-link {
                color: #e0e0e0 !important;
            }
            .navbar .nav-link:hover {
                color: #28a745 !important;
            }
            .card {
                background-color: #1e1e1e;
                border: 1px solid #333;
                color: #e0e0e0;
            }
            .btn-primary {
                background-color: #28a745;
                border: none;
            }
            .btn-primary:hover {
                background-color: #218838;
            }
        </style>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        :root {
            --primary: #0d6efd;
            --primary-dark: #0b5ed7;
            --accent: #fd7e14;
            --light-blue: #f0f7ff;
        }

        .navbar {
            background-color: var(--primary) !important;
            padding: 15px 0;
        }

        .order-section {
            background-color: var(--light-blue);
            min-height: 100vh;
            padding-top: 100px;
        }

        .carousel-item img {
            height: 60vh;
            object-fit: cover;
            filter: brightness(0.8);
        }

        .carousel-caption {
            background: rgba(13, 110, 253, 0.7);
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            bottom: 50%;
            transform: translateY(50%);
        }

        .card {
            border: none;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .car-image {
            height: 200px;
            object-fit: contain;
            padding: 1rem;
            background-color: white;
        }


        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(13, 110, 253, 0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: contain;
            padding: 1rem;
            background-color: var(--light-blue);
        }

        .card-title {
            color: var(--primary);
            font-weight: bold;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            width: 100%;
            padding: 10px;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .section-title {
            color: var(--primary);
            font-weight: bold;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: var(--accent);
        }

        .katalog-section {
            background-color: var(--light-blue);
            padding: 4rem 0;
            margin-top: 2rem;
        }

        .card-text {
            color: #666;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="js">


    <!-- Header -->
    @include('layouts.header')
    <!--/ End Header -->

    @yield('main-content')

    {{-- @include('frontend.layouts.footer') --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

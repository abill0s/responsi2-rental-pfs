@extends('layouts.master')
@section('main-content')
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" style="margin-top: 68px">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/carousel-1.jpg') }}" class="d-block w-100" alt="Mobil 1" />
                <div class="carousel-caption">
                    <h2 class="fw-bold">Selamat Datang di Rental Mobil Kami</h2>
                    <p>Solusi Transportasi Terpercaya untuk Perjalanan Anda</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel-2.jpg') }}" class="d-block w-100" alt="Mobil 2" />
                <div class="carousel-caption">
                    <h2 class="fw-bold">Armada Berkualitas</h2>
                    <p>Berbagai Pilihan Mobil untuk Kebutuhan Anda</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/carousel-3.jpg') }}" class="d-block w-100" alt="Mobil 3" />
                <div class="carousel-caption">
                    <h2 class="fw-bold">Harga Bersaing</h2>
                    <p>Dapatkan Penawaran Terbaik untuk Setiap Perjalanan</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <section class="katalog-section">
        <div class="container">
            <h2 class="text-center section-title">Katalog Mobil</h2>
            <div class="d-flex justify-content-center flex-wrap">
                @foreach ($cars as $car)
                    <!-- Mobil 1 -->
                    <div class="card h-100 my-2 me-4">
                        <img src="https://www.toyota.astra.co.id//sites/default/files/2020-10/1_innova-super-white-2_0.png"
                            class="card-img-top" alt="Toyota Avanza" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->model }} {{ $car->brand }}</h5>
                            <p class="card-text">
                                {{ $car->seat }} seat | {{ $car->fuel }} | {{ $car->transmission }}
                                <br />
                                Mulai dari Rp {{ $car->price }}/hari
                            </p>
                            <a href="{{ route('order', $car->id) }}" class="btn btn-primary">Pesan Sekarang</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

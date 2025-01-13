@extends('layouts.master')
@section('main-content')
    <!-- Order Section -->
    <section class="order-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title text-center mb-4">Form Pemesanan</h2>

                    <!-- Car Details -->
                    <div class="car-details">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img src="https://www.toyota.astra.co.id//sites/default/files/2023-09/2-avanza-gray-metallic.png"
                                    alt="Car Image" class="img-fluid car-image" />
                            </div>
                            <div class="col-md-6">
                                <h4 class="car-name">{{ $car->model }} {{ $car->brand }}</h4>
                                <p class="car-specs">
                                    {{ $car->seat }} seat | {{ $car->fuel }} | {{ $car->transmission }}
                                    <br />
                                    Harga per hari: Rp {{ $car->price }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Form -->
                    <div class="card">
                        <div class="card-body">
                            <form id="orderForm" method="POST" action="{{ route('order.create', $car->id) }}">
                                @csrf
                                {{-- hidden inputs --}}
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="car_id" value="{{ $car->id }}">

                                <div class="mb-3">
                                    <label for="customerName" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" required />
                                </div>

                                <div class="mb-3">
                                    <label for="duration" class="form-label">Durasi Sewa (Hari)</label>
                                    <input type="number" class="form-control" name="duration" id="duration" min="1"
                                        value="1" required />
                                </div>

                                <!-- Price Summary -->
                                <div class="price-summary">
                                    <h5 class="mb-3">Ringkasan Biaya</h5>
                                    <div class="row mb-2">
                                        <div class="col">Biaya Sewa Mobil</div>
                                        <div class="col text-end">
                                            Rp {{ $car->price }} x <span id="durationSummary">1</span> hari
                                        </div>
                                    </div>

                                    <input type="hidden" name="total_price" id="totalPriceInput" />

                                    <hr />
                                    <div class="row fw-bold">
                                        <div class="col">Total</div>
                                        <div class="col text-end" id="totalPrice" name="total_price">Rp 300.000</div>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Pesan Sekarang
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const durationInput = document.getElementById('duration'); // Duration input field
            const durationSummary = document.getElementById('durationSummary'); // Duration display
            const totalPrice = document.getElementById('totalPrice'); // Total price display
            const carPriceSummary = document.getElementById('carPriceSummary'); // Car price summary display
            const totalPriceInput = document.getElementById('totalPriceInput');

            // Function to calculate and update total price
            function updateTotalPrice() {
                const duration = parseInt(durationInput.value) || 1; // Get duration or default to 1
                const total = {{ $car->price }} * duration; // Calculate total price

                durationSummary.innerText = duration; // Update duration in the summary
                totalPrice.innerText = `Rp ${total.toLocaleString('id-ID')}`; // Update total price in the summary
                totalPriceInput.value = total;
            }

            durationInput.addEventListener('input', updateTotalPrice);
            updateTotalPrice();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

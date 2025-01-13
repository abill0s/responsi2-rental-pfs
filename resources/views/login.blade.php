@extends('layouts.master')
@section('main-content')
    <!-- Order Section -->
    <section class="order-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title text-center mb-4">Login</h2>
                    <!-- Order Form -->
                    <div class="card">
                        <div class="card-body">
                            <form id="orderForm" action="{{ route('user.login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" required />
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required />
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Login
                                    </button>
                                </div>
                            </form>

                            <div class="text-center mt-4">
                                <a href="{{ route('register') }}">Sign up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

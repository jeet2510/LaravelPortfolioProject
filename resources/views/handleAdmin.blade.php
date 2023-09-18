@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <div class="row">
            @include('dashboard.sidebar')
            
            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                <!-- Add your main content here -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Welcome to your dashboard!</h2>
                            <!-- Add your content here -->
                            <p>This is only for <strong>Laravel</strong> practice only!</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add your JS scripts here -->
    <!-- For example, you can include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card animated fadeInDown">
                <div class="card-header text-white bg-primary">{{ __('Welcome to my practice application for Laravel') }}</div>

                <div class="card-body">
                    <h2>{{ __('Laravel Practice Projects') }}</h2>
                    <ul class="list-group">
                        <li class="list-group-item">Projects 1: Dashboard for Admin
                        <br>
                        <p>Dashboard and Chart of Users. </p>
                        </li>
                        <li class="list-group-item">Projects 2: User Management Application
                        <br>
                        <p>Admin can manage, search, sort, change status, bulk-actions over users data. </p>
                        </li>
                        <li class="list-group-item">Projects 3: Data To Excel And PDF Files
                        <br>
                        <p>Admin can download data of users in PDF and Excel formats. </p>
                        </li>
                        
                        <li class="list-group-item">Projects 4: Ticker Genration application
                        <br>
                        <p>User can genrate tickets, While Adin can review and comment or close the tickets. </p>
                        </li>    
                        <!-- Add more tasks as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.main_layout')

@section('content')
<style>
        body {
            background-color: #121212; /* Dark background for the entire page */
            color: black; /* White text for better contrast */
        }

</style>
<div class="container mt-5 ">
    <div class="row">
        <!-- Basic Plan -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Basic Plan</h3>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">$10/month</h4>
                    <p class="card-text">Enjoy our basic features with this plan.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Feature 1</li>
                        <li class="list-group-item">Feature 2</li>
                        <li class="list-group-item">Feature 3</li>
                    </ul>
                    <a href="#" class="btn btn-primary mt-3">Subscribe</a>
                </div>
            </div>
        </div>

        <!-- Standard Plan -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white text-center">
                    <h3>Standard Plan</h3>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">$20/month</h4>
                    <p class="card-text">Get more features with the standard plan.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Feature 1</li>
                        <li class="list-group-item">Feature 2</li>
                        <li class="list-group-item">Feature 3</li>
                        <li class="list-group-item">Feature 4</li>
                    </ul>
                    <a href="#" class="btn btn-success mt-3">Subscribe</a>
                </div>
            </div>
        </div>

        <!-- Premium Plan -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header bg-danger text-white text-center">
                    <h3>Premium Plan</h3>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">$30/month</h4>
                    <p class="card-text">Unlock all features with our premium plan.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Feature 1</li>
                        <li class="list-group-item">Feature 2</li>
                        <li class="list-group-item">Feature 3</li>
                        <li class="list-group-item">Feature 4</li>
                        <li class="list-group-item">Feature 5</li>
                    </ul>
                    <a href="#" class="btn btn-danger mt-3">Subscribe</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.home')
@section('content')
    
    <section class="container">
        <div class="row mt-5 text-center mb-3">
            <h2 class="font-weight-bold">
                Wafi Payment App
            </h2>
        </div>
        <div class="row mb-3">
            <img style="width: 30%;" class="img-fluid shadow rounded m-auto" src="https://images.pexels.com/photos/6146929/pexels-photo-6146929.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
        </div>
        <div class="row text-center">
            <button style="width: 30%;" class="btn btn-success text-dark rounded m-auto">
                @auth
                <a class="text-dark fw-bold" style="text-decoration: none;" href="{{url('home')}}">
                    Go to your dashboard
                </a>
                @else
                <a class="text-dark fw-bold" style="text-decoration: none;" href="{{route('register')}}">
                    Get started
                </a>
                @endauth
            </button>
        </div>
    </section>

@endsection
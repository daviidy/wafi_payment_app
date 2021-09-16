@extends('layouts.home')
@section('content')
    
    <section class="container">
        <div class="row mb-3">
            <img class="img-fluid shadow rounded" src="https://images.pexels.com/photos/6146929/pexels-photo-6146929.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
        </div>
        <div class="row text-center">
            <button class="btn btn-success text-dark rounded">
                @auth
                <a href="{{url('home')}}">
                    Go to your dashboard
                </a>
                @else
                <a href="{{route('register')}}">
                    Get started
                </a>
                @endauth
            </button>
        </div>
    </section>

@endsection
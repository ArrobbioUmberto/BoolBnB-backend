@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card bool-card-dark" >
                <div class="card-header card-hd">{{ __('User Dashboard') }}</div>

                <div class="row p-5 gap-3 justify-content-center icon" >
                    <div class="col-lg-3 col-md-12 fs-1 text-center" >
                        <a href="{{ url('/apartments') }}">
                            <div class="card bool-card-dark p-3 dash">
                                <i class="fa-solid fa-house mb-3"></i>
                                <h5>I tuoi appartamenti</h5>   
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-12  fs-1 text-center">
                        <a href="{{ url('/messages') }}">
                            <div class="card bool-card-dark p-3 dash">
                                <i class="fa-solid fa-envelope mb-3 message"></i>
                                <h5>I tuoi messaggi</h5>  
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-12  fs-1 text-center">
                        <a href="{{ url('profile') }}">
                            <div class="card bool-card-dark p-3 dash">
                                <i class="fa-solid fa-user mb-3 user"></i>
                                <h5>Il tuo profilo</h5>  
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

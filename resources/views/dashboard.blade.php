@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header card-hd">{{ __('User Dashboard') }}</div>

                <div class="row p-5">
                    <div class="col-4 fs-1 text-center">
                        <a href="{{ url('/apartments') }}">
                            <div class="card bool-card p-3">
                                <i class="fa-solid fa-house"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 fs-1 text-center">
                        <a href="{{ url('/messages') }}">
                            <div class="card bool-card p-3">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 fs-1 text-center">
                        <a href="{{ url('profile') }}">
                            <div class="card bool-card p-3">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

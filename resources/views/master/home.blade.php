@extends('layouts.app')

@section('content')
<h1 class="fw-bold text-center">{{ $title }}</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</div>
@endsection

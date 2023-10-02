@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card  text-bg-primary">
                <div class="card-header text-light">{{ __('Dashboard') }}</div>

                <div class="card-body text-light">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Kamu sudah berhasil login!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

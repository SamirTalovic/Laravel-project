@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Potvrdite Email Adresu') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Svež verifikacioni kod je poslan na vašem emailu') }}
                        </div>
                    @endif

                    {{ __('Pre svega, proverite verifikacioni kod na vašem emailu.') }}
                    {{ __('Ako niste dobili email adresu ') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('kliknite ovde za drugu') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

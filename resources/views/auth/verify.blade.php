@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A link to confirm your email address has just been sent to your inbox. ') }}
                        </div>
                    @endif

                    {{ __('You must verify your email address before continuing.') }}
                    {{ __('Didn't get verification instructions?') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Resend') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

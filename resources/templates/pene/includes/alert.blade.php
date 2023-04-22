@if (session('status') == 'verification-link-sent')
    <div class="alert alert-success my-2">{{ __('A new verification link has been sent to the email address you provided during registration.') }}</div>
@endif

@if (session('status') && session('status') != 'verification-link-sent')
    <div class="alert alert-success my-2">
        {{ session('status') }}
    </div>
@endif

@if (session('message'))
    <div class="alert alert-success my-2">{{ session('message') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger my-2">{{ session('error') }}</div>
@endif

@extends(theme_path('layouts.app'))


@section('content')

<!-- Start Signup Area -->
<section class="signup-area">
    <div class="row m-0">
        <div class="col-lg-6 col-md-12 p-0">
            <div class="signup-image d-md-block d-none" style="background-image: url({{theme_asset()}}assets/img/main-banner2.jpg)">
                <img src="{{theme_asset()}}assets/img/main-banner2.jpg" alt="image">
            </div>
        </div>

        <div class="col-lg-6 col-md-12 p-0">
            <div class="signup-content">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="signup-form">
                            <div class="logo black-logo">
                                <x-application-logo-dark/>
                            </div>
                            <div class="logo white-logo">
                                <x-application-logo/>
                            </div>

                            <h3>Create New Bank Account</h3>
                            <p>Open a new account to save money</p>

                            @include(theme_path('includes.alert'))

                            <form method="POST" action="{{route('accounts.store')}}" class="position-relative">
                                @csrf

                                <div class="form-group">
                                    <input type="text" name="name" id="name" placeholder="Account Name" value="{{old('name', auth()->user()->name)}}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name') <span class="invalid-feedback">{{$message}}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <select name="type" id="type" class="form-control no-select mb-3 @error('type') is-invalid @enderror">
                                        <option selected disabled>Select Account Type</option>
                                        @foreach ($accountTypes as $type)
                                            <option value="{{$type}}">{{ucfirst($type)}}</option>
                                        @endforeach
                                    </select>
                                    @error('type') <span class="invalid-feedback">{{$message}}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <select name="currency" id="currency" class="form-control no-select @error('currency') is-invalid @enderror">
                                        <option selected disabled>Select Currency</option>
                                        @foreach (config('money') as $key => $currency)
                                        <option value="{{ strtoupper($key) }}">
                                            {{ "$key - {$currency['name']}" }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('currency') <span class="invalid-feedback">{{$message}}</span>@enderror
                                </div>

                                <div class="input-group gap-2 my-4">
                                    <input type="checkbox" class="form-check is-invalid" value="{{old('is_joint', true)}}" name="is_joint" id="is_joint">
                                    <label class="form-check-label ml-2 cursor-pointer" for="is_joint">Open as a joint account</label>
                                    @error('is_joint') <span class="invalid-feedback">{{$message}}</span>@enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Continue</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Login Area -->

@endsection

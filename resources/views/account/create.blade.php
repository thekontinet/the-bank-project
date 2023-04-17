@extends('layouts.form')

@section('title', 'Create A New Account')


@section('content')
<div class="card shadow-sm bg-white w-full max-w-2xl">
    <div class="card-body">
        <div class="py-4">
            <h3 class="font-medium text-lg card-title">Create A New Account</h3>
            <p class="text-sm">Open a new account to save your money</p>
        </div>
        <form class="space-y-4" action="{{route('accounts.store')}}" method="POST">
            @csrf
            <div class="form-control">
                <input type="text" name="name" placeholder="Enter Account Name" value="{{old('name', auth()->user()->name)}}" readonly class="input input-bordered w-full">
                @error('name')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="form-control">
                <select name="type" class="input input-bordered w-full">
                    <option disabled selected>Select Account Type</option>
                    @foreach (\App\Models\Account::TYPES as $type)
                        <option value="{{ $type }}">{{ ucfirst($type)}}</option>
                    @endforeach
                </select>
                @error('type')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="form-control">
                <select name="currency" class="input input-bordered w-full">
                    <option disabled selected>Select Currency</option>
                    @foreach (config('money') as $key => $currency)
                    <option value="{{ strtoupper($key) }}">
                        {{ "$key - {$currency['name']}" }}
                    </option>
                    @endforeach
                </select>
                @error('currency')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="form-control">
                <label class="label cursor-pointer">
                  <span class="label-text">Joint Account ?</span>
                  <input type="checkbox" name="is_joint" value="1" class="toggle toggle-primary toggle-lg"/>
                </label>
                @error('is_joint')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-6">
                <button class="btn w-full btn-primary">Create Account</button>
            </div>
        </form>
    </div>
</div>
@endsection

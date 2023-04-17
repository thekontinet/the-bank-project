@extends('layouts.form')

@section('title', 'Add Holders To Account')

@section('content')
    <div class="card bg-white w-full max-w-2xl shadow-sm">
        <div class="card-body">
            <div class="card-title">
                <h4 class="text-xl">Add Account Holders</h4>
            </div>
            <form x-data="accountForm" action="{{route('holders.update', $account)}}" method="POST">
                @csrf
                @method('put')
                <div class="space-y-2 py-6" x-show='!sole' x-transition.duration.500ms>
                    <p>Enter account holders emails and press the + button to add</p>
                    <p class="text-xs">
                        <strong>Note:</strong>
                        <ul class="text-xs">
                            <li>All account holders must be registered to our bank</li>
                            <li>Maximum of Three(3) holders per account</li>
                        </ul>
                    </p>
                    <div class="form-control">
                        <div class="input-group">
                            <input type="email" x-model="email" x-on:blur="addEmail(email)" placeholder="Holders Email" autocomplete="emails" class="input input-bordered w-full">
                            <button class="btn btn-accent" x-on:click.prevent="addEmail(email)">+</button>
                        </div>
                        @error('emails.*')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>

                    <template x-for="_email in emails">
                        <div class="input-group input-group-sm">
                            <input type="email" name="emails[]" x-bind:value="_email" autocomplete="email" readonly class="input input-bordered input-sm w-full">
                            <button class="btn btn-sm" x-on:click.prevent="removeEmail(_email)">X</button>
                        </div>
                    </template>

                    <div class="form-control">
                        <input type="password" name="password" placeholder="Enter Password" autocomplete="current-password" class="input input-bordered w-full">
                        @error('password')
                            <span class="text-red-500 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary">Add Holders to Account (<span x-text="emails.length"></span>)</button>
                <a class="block mt-3" href="{{route(auth()->user()->hasAdminRole() ? 'admin.accounts.show' : 'accounts.show', $account)}}">
                    Go Back
                </a>
            </form>
        </div>
    </div>
@endsection

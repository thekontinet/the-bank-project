<x-guest-layout>
    <div
    class="w-full min-h-screen pb-4 bg-gradient-to-r from-primary-500 via-primary-700 to-primary-900"
  >
    <!--Topbar-->
    <div class="w-full px-6 py-8">
      <div class="w-full max-w-6xl mx-auto">
        <div class="flex items-center justify-between w-full">
          <x-application-logo/>
          <a href="{{route('login')}}" class="flex items-center gap-2 text-white group">
            <span class="font-heading">Sign In</span>
            <i
              class="w-5 h-5 transition-transform duration-300 iconify group-hover:translate-x-1"
              data-icon="lucide:arrow-right"
            ></i>
          </a>
        </div>
      </div>
    </div>

    <!--Form-->
    <div class="w-full max-w-2xl px-6 mx-auto">
      <h2 class="mb-6 text-4xl text-white font-heading">Open a new account</h2>
      <form class="space-y-4" method="POST">
        @csrf
        <div class="grid gap-4 md:grid-cols-2">
            <!--Field-->
            <div>
                <x-text-input type='text' placeholder='Full Name' name='name' value="{{old('name')}}">
                    <x-slot name='icon'>
                        <i class="w-5 h-5 iconify" data-icon="lucide:user"></i>
                    </x-slot>
                </x-text-input>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!--Field-->
            <div>
                <x-text-input type='email' placeholder='Email Address' name='email' value="{{old('email')}}">
                    <x-slot name='icon'>
                        <i class="w-5 h-5 iconify" data-icon="lucide:mail"></i>
                    </x-slot>
                </x-text-input>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!--Field-->
            <div>
                <x-text-input list='country' placeholder='Country' name='country' value="{{old('country')}}">
                    <x-slot name='icon'>
                        <i class="w-5 h-5 iconify" data-icon="lucide:globe"></i>
                    </x-slot>
                </x-text-input>
                <datalist id="country">
                    @foreach (getCountries() as $country)
                        <option value="{{$country}}">
                    @endforeach
                </datalist>
                <x-input-error :messages="$errors->get('country')" class="mt-2" />
            </div>
            <!--Field-->
            <div>
                <x-text-input type='text' placeholder='State/City (optional)' name='state' value="{{old('state')}}">
                    <x-slot name='icon'>
                        <i class="w-5 h-5 iconify" data-icon="lucide:map"></i>
                    </x-slot>
                </x-text-input>
                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>
        </div>
        <!--Field-->
        <div>
            <x-text-input type='password' placeholder='Transaction Pin' name='pin' maxlength='4'>
                <x-slot name='icon'>
                    <i class="w-5 h-5 iconify" data-icon="lucide:key"></i>
                </x-slot>
            </x-text-input>
            <x-input-error :messages="$errors->get('pin')" class="mt-2" />
        </div>
        <!--Field-->
        <div>
            <x-text-input type='password' placeholder='Password' name='password'>
                <x-slot name='icon'>
                    <i class="w-5 h-5 iconify" data-icon="lucide:mail"></i>
                </x-slot>
            </x-text-input>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!--Field-->
        <div>
            <x-text-input type='password' placeholder='Confirm Password' name='password_confirmation'>
                <x-slot name='icon'>
                    <i class="w-5 h-5 iconify" data-icon="lucide:mail"></i>
                </x-slot>
            </x-text-input>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!--Field-->
        <div>
          <a href="#" class="flex justify-end text-white group">
            <span class="text-sm font-heading">Need Help?</span>
          </a>
        </div>
        <!--Field-->
        <div>
          <button
            type="submit"
            class="inline-flex items-center justify-center w-full h-12 px-4 py-2 text-sm text-white transition-colors duration-300 rounded-md font-heading bg-primary-500 hover:bg-primary-600"
          >
            Open Account
          </button>
        </div>
      </form>
    </div>
  </div>
</x-guest-layout>

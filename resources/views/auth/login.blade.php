<x-guest-layout>
    <div
    class="w-full min-h-screen pb-4 bg-gradient-to-r from-primary-500 via-primary-700 to-primary-900"
  >
    <!--Topbar-->
    <div class="w-full px-6 py-8">
      <div class="w-full max-w-6xl mx-auto">
        <div class="flex items-center justify-between w-full">
          <x-application-logo/>
          @if(Route::has('register'))
          <a href="{{route('register')}}" class="flex items-center gap-2 text-white group">
            <span class="font-heading">Sign up</span>
            <i
              class="w-5 h-5 transition-transform duration-300 iconify group-hover:translate-x-1"
              data-icon="lucide:arrow-right"
            ></i>
          </a>
          @endif
        </div>
      </div>
    </div>

    <!--Form-->
    <div class="w-full max-w-sm px-6 pt-20 mx-auto">
      <h2 class="mb-6 text-4xl text-white font-heading">Login</h2>
      <form class="space-y-4" method="POST" action="{{route('login')}}">
        @csrf
        <!--Field-->
        <div>
            <x-text-input type='email' placeholder='Email Address' name='email' value="{{old('email')}}">
                <x-slot name='icon'>
                    <i class="w-5 h-5 iconify" data-icon="lucide:mail"></i>
                </x-slot>
            </x-text-input>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div>
            <x-text-input type='password' placeholder='Password' name='password'>
                <x-slot name='icon'>
                    <i class="w-5 h-5 iconify" data-icon="lucide:lock"></i>
                </x-slot>
            </x-text-input>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        @if (Route::has('password.request'))
            <!--Field-->
            <div>
                <a href="{{route('password.request')}}" class="flex justify-end text-white group">
                    <span class="text-sm font-heading">Forgot Password?</span>
                </a>
          </div>
        @endif
        <!--Field-->
        <div>
          <button
            type="submit"
            class="inline-flex items-center justify-center w-full h-12 px-4 py-2 text-sm text-white transition-colors duration-300 rounded-md font-heading bg-primary-500 hover:bg-primary-600"
          >
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
</x-guest-layout>

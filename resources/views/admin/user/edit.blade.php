<x-admin-layout>
<div class="pt-10 pb-4" x-data>
    <header class="flex justify-between items-center">
        <h4 class="text-lg font-semibold">Update User Info</h4>
        <button class="btn btn-sm" onclick="document.forms['update-form'].submit()">Save</button>
    </header>

    <form name="update-form" class="space-y-4" action="{{route('admin.users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="flex justify-between items-center">
            <div x-data="{ imagePreview: '', fileInput: null }">
                <input name="avatar" type="file" class="hidden" x-ref="fileInput" @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                <div class="relative">
                    <button type="button" class="py-2 rounded" @click="$refs.fileInput.click()">
                        <img :src="imagePreview ? imagePreview : '{{$user->avatar}}'" class="w-16 h-16 object-cover rounded-full">
                    </button>
                </div>
                <x-primary-button x-show="imagePreview" class="mx-auto">Save</x-primary-button>
            </div>

            <div class="form-group border border-primary-500 rounded-full p-3">
                <div class="flex items-center gap-2">
                    <input type="checkbox" name='blocked' id="blocked" value="1" {{$user->blocked ? 'checked': ''}} class="checkbox" />
                    <label class="text-sm" for="blocked">Block account</label>
                </div>
                @error('blocked')
                    <span class="text-red-500 text-xs">{{$message}}</span>
                @enderror
            </div>
        </div>


        <div class="col-span-10 space-y-4">
            <div class="form-group">
                <label class="form-label" for="name">Fullname</label>
                <input type="text" name="name" placeholder="Enter User Name" value="{{old('name', $user->name)}}" class="input input-bordered w-full">
                @error('name')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" placeholder="Email Address" value="{{old('email', $user->email)}}" class="input input-bordered w-full">
                @error('email')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="phone">Phone</label>
                <input type="tel" name="phone" placeholder="Phone Number" value="{{old('phone', $user->phone)}}" class="input input-bordered w-full">
                @error('phone')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="country">Country</label>
                <input list="country" name="country" placeholder="Country" value="{{old('country', $user->country)}}" class="input input-bordered w-full">
                <datalist id="country">
                    @foreach (getCountries() as $country)
                        <option value="{{$country}}"/>
                    @endforeach
                </datalist>
                @error('country')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="state">State</label>
                <input type="text" name="state" placeholder="state/Province" value="{{old('state', $user->state)}}" class="input input-bordered w-full">
                @error('state')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="pin">4 Digit Pin</label>
                <input type="text" name="pin" placeholder="Transaction Pin" minlength="4" maxlength="4" value="{{old('pin', $user->pin)}}" class="input input-bordered w-full">
                @error('pin')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>

            <button class="btn btn-primary">Update User Profile</button>
        </div>
    </form>
</div>
</x-admin-layout>

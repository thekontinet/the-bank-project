<x-admin-layout>
<div class="col-span-12 md:col-span-5">
    <!--Welcome widget-->
    <div
        class="h-full p-10 bg-white border shadow-xl dark:bg-muted-1000 rounded-xl border-muted-200 dark:border-muted-800 shadow-muted-400/10 dark:shadow-muted-800/10"
    >
        <div>
            <h3 class="mb-4 text-2xl font-semibold dark:text-muted-200">Edit User Information</h3>
            <form class="grid gap-3 md:grid-cols-2" action="{{route('admin.users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="flex flex-col items-center text-center md:col-span-2">
                    <div x-data="{ imagePreview: '', fileInput: null }">
                        <input name="avatar" type="file" class="hidden" x-ref="fileInput" @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                        <div class="relative">
                            <button type="button" class="px-4 py-2 rounded" @click="$refs.fileInput.click()">
                                <img :src="imagePreview ? imagePreview : '{{$user->avatar}}'" class="object-cover w-24 h-24 rounded-full">
                            </button>
                        </div>
                        <x-primary-button x-show="imagePreview" class="mx-auto">Save</x-primary-button>
                    </div>
                </div>

                <!-- Field -->
                <div class="md:col-span-2">
                    <x-text-input name='name' type='text' placeholder="Name" value="{{$user->name}}">
                    <x-slot name='icon'>
                        <i class="w-5 h-5 iconify" data-icon="lucide:user"></i>
                    </x-slot>
                    </x-text-input>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Field -->
                <div>
                    <x-text-input name='email' type='email' placeholder="Email" value="{{$user->email}}">
                    <x-slot name='icon'>
                        <i class="w-5 h-5 iconify" data-icon="lucide:mail"></i>
                    </x-slot>
                    </x-text-input>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Field -->
                <div>
                    <x-text-input name='phone' type='tel' placeholder="+1 *** ***" value="{{$user->phone}}">
                    <x-slot name='icon'>
                        <i class="w-5 h-5 iconify" data-icon="lucide:phone"></i>
                    </x-slot>
                    </x-text-input>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <!-- Field -->
                <div>
                    <x-text-input name='country' type='text' placeholder="Country" value="{{$user->country}}">
                    <x-slot name='icon'>
                        <i class="w-5 h-5 iconify" data-icon="lucide:globe"></i>
                    </x-slot>
                    </x-text-input>
                    <x-input-error :messages="$errors->get('country')" class="mt-2" />
                </div>

                <!-- Field -->
                <div>
                    <x-text-input name='state' type='text' placeholder="State" value="{{$user->state}}">
                    <x-slot name='icon'>
                        <i class="w-5 h-5 iconify" data-icon="lucide:map"></i>
                    </x-slot>
                    </x-text-input>
                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                </div>

                <!-- Field -->
                <div>
                    <x-text-input name='pin' type='text' placeholder="Pin" value="{{$user->pin}}">
                    <x-slot name='icon'>
                        <i class="w-5 h-5 iconify" data-icon="lucide:key"></i>
                    </x-slot>
                    </x-text-input>
                    <x-input-error :messages="$errors->get('pin')" class="mt-2" />
                </div>

                <!-- Select -->
                <div>
                    <select name='blocked' type='text' class="w-full rounded-md">
                        <option value="0" {{$user->blocked ? '' : 'selected'}}>No</option>
                        <option value="1" {{!$user->blocked ? '' : 'selected'}}>Yes</option>
                    </select>
                    <x-input-error :messages="$errors->get('blocked')" class="mt-2" />
                </div>

                <div class="md:col-span-2">
                    <x-primary-button>Update</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>

</x-admin-layout>

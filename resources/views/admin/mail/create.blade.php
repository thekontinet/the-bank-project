<x-admin-layout>
    <header class="my-8">
        <h4 class="text-lg font-medium uppercase dark:text-muted-100">Send Mail</h4>
    </header>

    <form class="space-y-4" action="{{route('admin.mail.store')}}" method="POST">
        @csrf
        <div class="mb-4">
            <x-text-input type='email' placeholder='Email' name='email' value="{{old('email')}}" value="{{$email}}">
                <x-slot name='icon'>
                    <i class="w-5 h-5 iconify" data-icon="lucide:user"></i>
                </x-slot>
            </x-text-input>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div>
            <x-text-input type='text' placeholder='Title' name='title' value="{{old('title')}}">
                <x-slot name='icon'>
                    <i class="w-5 h-5 iconify" data-icon="lucide:book"></i>
                </x-slot>
            </x-text-input>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <div class="prose max-w-none">
                <textarea id="summernote" name="message" class="hidden w-full"></textarea>
                <div id="message-editor" class="bg-gray-100 shadow-sm min-h-[100px] dark:text-muted-100 dark:bg-muted-1000 focus-within:ring-blue-500 focus-within:ring-2">
                </div>
            </div>
            {{-- <div id="summernote"></div> --}}
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
        </div>
        <x-primary-button>Send</x-primary-button>
    </form>

    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @endpush

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            height:400
        })
    </script>
    @endpush
</x-admin-layout>

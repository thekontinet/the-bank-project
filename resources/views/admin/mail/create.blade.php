<x-admin-layout>
    <header class="my-8">
        <h4 class="text-3xl font-medium uppercase dark:text-muted-100">Send Mail</h4>
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
                <textarea id="message" name="message" class="hidden w-full"></textarea>
                <div id="message-editor" class="bg-gray-100 shadow-sm min-h-[100px] dark:text-muted-100 dark:bg-muted-1000 focus-within:ring-blue-500 focus-within:ring-2">
                </div>
            </div>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
        </div>
        <x-primary-button>Send</x-primary-button>
    </form>

    @push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endpush

    @push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var messageEditor = new Quill('#message-editor', {
          theme: 'snow',
          placeholder: 'Type your message here...',
          modules: {
            toolbar: [
              ['bold', 'italic', 'underline', 'strike'],
              [{ 'header': [1, 2, 3, 4, 5, 6, false] }]
            ]
          }
        });

        var messageInput = document.querySelector('#message');
        messageEditor.on('text-change', function(delta, oldDelta, source) {
          messageInput.value = messageEditor.root.innerHTML;
        });
      </script>
    @endpush
</x-admin-layout>

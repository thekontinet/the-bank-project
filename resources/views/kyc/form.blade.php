<x-guest-layout>
    <x-alert/>
    <div
        class="w-full min-h-screen grid place-items-center pb-4 bg-gradient-to-r from-primary-500 via-primary-700 to-primary-900">
        <div class="bg-white rounded-lg shadow-md w-full p-10 max-w-xl mx-auto">
            @foreach ($errors as $error)
                {{ $error->message }}
            @endforeach
            <div x-data="kyc">
                <form action="{{ route('kyc.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf()
                    <div class="mb-6">
                        <label for="document_type" class="block text-gray-700 font-bold mb-2">Document Type</label>
                        <select x-model="docType" name="document_type" id="document_type"
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" disabled selected>Select document type</option>
                            <option value="passport">Passport</option>
                            <option value="id">ID Card</option>
                            <option value="driver license">Driver License</option>
                        </select>
                        <x-input-error :messages="$errors->get('document_type')"/>
                    </div>
                    <div class="mb-6">
                        <label for="document_number" class="block text-gray-700 font-bold mb-2">Document Number</label>
                        <input x-model="docNumber" type="text" name="document_number" id="document_number"
                            class="block w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <x-input-error :messages="$errors->get('document_number')"/>
                    </div>
                    <div class="mb-6">
                        <div x-show="!frontImg"
                            class="text-gray-700 font-light mb-2 border-dotted border-4 grid place-items-center">
                            <label for="front_image" class="block py-10 w-full cursor-pointer hover:bg-slate-50">
                                <span class="block text-center font-semibold">Front Image</span>
                                <span class="block text-center">Click here to upload</span>
                            </label>
                        </div>
                        <input type="file" name="document_front_image" id="front_image"
                            x-on:change="frontImg = $event.target.files[0]"  hidden>
                        <img x-show="frontImg" :src="frontImg ? URL.createObjectURL(frontImg) : null" alt="Front Image"
                            class="mt-2 max-w-xs max-h-32">
                        <x-input-error :messages="$errors->get('document_front_image')"/>
                    </div>
                    <div class="mb-6">
                        <div x-show="!backImg"
                            class="text-gray-700 font-light mb-2 border-dotted border-4 grid place-items-center">
                            <label for="back_image" class=" block py-10 w-full cursor-pointer hover:bg-slate-50">
                                <span class="block text-center font-semibold">Back Image</span>
                                <span class="block text-center">Click here to upload</span>
                            </label>
                        </div>
                        <input type="file" name="document_back_image" id="back_image"
                            x-on:change="backImg = $event.target.files[0]"  hidden>
                        <img x-show="backImg" :src="backImg ? URL.createObjectURL(backImg) : null" alt="Back Image"
                            class="mt-2 max-w-xs max-h-32">
                        <x-input-error :messages="$errors->get('document_back_image')"/>
                    </div>
                    <x-primary-button>Upload</x-primary-button>
                    <x-secondary-button type='reset' x-on:click="reset">Reset</x-secondary-button>
                </form>
            </div>
        </div>
</x-guest-layout>

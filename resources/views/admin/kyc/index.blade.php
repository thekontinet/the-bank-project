<x-admin-layout>
    <h3 class="font-semibold text-xl my-6">Users KYC</h3>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <tr>
                <th class="px-10">User</th>
                <th class="px-10">Type</th>
                <th class="px-10">Document No.</th>
                <th class="px-10">Status</th>
                <th class="px-10">Document</th>
                <th class="px-10">Action</th>
            </tr>
            @foreach ($kycs as $kyc)
                <tr>
                    <td class="px-10">{{$kyc->user->id}}</td>
                    <td class="px-10">{{ucfirst($kyc->document_type)}}</td>
                    <td class="px-10">{{$kyc->document_number}}</td>
                    <td class="px-10">{{$kyc->isVerified() ? 'verified' : 'pending'}}</td>
                    <td class="px-10">
                        <div class="flex gap-2">
                            <a download="" href="/uploads/{{$kyc->document_front_image}}"><img class="w-14 h-14 border my-1" src="/uploads/{{$kyc->document_front_image}}" alt="photo"></a>
                        <a download="" href="/uploads/{{$kyc->document_back_image}}"><img class="w-14 h-14 border my-1" src="/uploads/{{$kyc->document_back_image}}" alt="photo"></a>
                        </div>
                    </td>
                    <td class="px-10">
                        <div class="flex gap-2">
                            <form action="{{route('admin.kyc.update', $kyc->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                @if ($kyc->isVerified())
                                    <x-secondary-button type='submit'>Undo</x-secondary-button>
                                    @else
                                    <x-primary-button>Verify</x-primary-button>
                                @endif
                            </form>
                            <form action="{{route('admin.kyc.destroy', $kyc->id)}}" method="post" onsubmit="return confirm('Are you sure of this delete action ?')">
                                @csrf
                                @method('DELETE')
                                <x-primary-button>Delete</x-primary-button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-admin-layout>

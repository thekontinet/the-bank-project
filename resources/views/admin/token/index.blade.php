<x-admin-layout>
<section class="container px-4 mx-auto mt-8">
        <header class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-medium dark:text-muted-100">Transaction Tokens</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">This tokens will be used to verify users transactions</p>
            </div>
            @if($user)
            <x-primary-button :href="route('admin.tokens.create', ['user_id' => $user->id])">Create New Token</x-primary-button>
            @endif
        </header>

        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="dark:text-muted-100 dark:bg-muted-800">
                                <tr>
                                    <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Account
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Token Name
                                    </th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Token Code</th>

                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">Message</th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-muted-900 text-muted-500">
                                @foreach ($tokens as $token)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <strong>{{$token->tokenable->name}}</strong> <br> {{$token->tokenable->number}}
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{$token->title}}</td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{$token->token}}</td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{$token->description}}</td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                            <form method="post" action="{{route('admin.tokens.destroy', $token->id)}}" onsubmit="return confirm('You are about to delete this token. Are you sure of this action')">
                                                @csrf
                                                @method('delete')
                                                <button class="flex items-center px-4 py-2 text-sm font-medium transition-colors rounded-md bg-primary-700 hover:bg-primary-600 duration-200 sm:text-base sm:px-6 dark:hover:bg-muted-800 text-muted-100 dark:text-gray-300 gap-x-3">
                                                    <i class="w-4 h-4 iconify" data-icon="lucide:trash"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>

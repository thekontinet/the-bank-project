<x-admin-layout>
    <div class="space-y-10">
        <!--Recepients-->
        <div class="w-full">
            <header class="flex items-center justify-between my-6">
                <h3 class="text-xl font-heading text-muted-800 dark:text-muted-200">
                    All Users
                </h3>
                <x-primary-button href="{{ route('admin.register') }}">Create New User</x-primary-button>
            </header>

            <div class="grid gap-5 md:grid-cols-3">
                @foreach ($users as $user)
                    <!--Grid item-->
                    <div
                        class="p-5 bg-white border rounded-lg dark:bg-muted-1000 border-muted-200 dark:border-muted-800">
                        <div class="flex items-start gap-2">
                            <div
                                class="flex items-center justify-center rounded-full h-14 w-14 ptablet:h-12 ptablet:w-12 bg-muted-100 dark:bg-muted-800">
                                <img class="object-cover rounded-full w-14 h-14" src="{{ $user->avatar }}"
                                    alt="avatar">
                            </div>
                            <div>
                                <h5
                                    class="font-sans text-base font-medium leading-none text-muted-500 dark:text-muted-300">
                                    {{ ucwords($user->name) }}
                                </h5>
                                <span class="text-xs dark:text-muted-300"">{{ $user->email }}</span>
                                <p class="font-sans text-sm text-muted-400">{{ $user->accounts_count }}
                                    {{ Str::of('Account')->plural($user->accounts_count) }}
                                <p>
                            </div>
                        </div>
                        <div class="flex flex-col justify-start gap-4 mt-4 divide-y">
                            <a class="flex items-center gap-2 pt-2" href='{{ route('admin.users.edit', $user->id) }}'
                                title='user settings'>
                                <i class="w-6 h-6 iconify text-slate-300" data-icon="lucide:user-cog"></i>
                                <span class="text-sm dark:text-muted-100">Update Profile</span>
                            </a>
                            <a class="flex items-center gap-2 pt-2"
                                href='{{ route('admin.accounts.index', ['user_id' => $user->id]) }}'
                                title='user accounts'>
                                <i class="w-6 h-6 iconify text-slate-300" data-icon="lucide:wallet"></i>
                                <span class="text-sm dark:text-muted-100">Accounts</span>
                            </a>
                            <a class="flex items-center gap-2 pt-2"
                                href='{{ route('admin.investments.index', ['user_id' => $user->id]) }}'
                                title='user loan'>
                                <i class="w-6 h-6 iconify text-slate-300" data-icon="lucide:rocket"></i>
                                <span class="text-sm dark:text-muted-100">Investment</span>
                            </a>
                            <a class="flex items-center gap-2 pt-2"
                                href='{{ route('admin.loans.create', ['user_id' => $user->id]) }}' title='user loan'>
                                <i class="w-6 h-6 iconify text-slate-300" data-icon="lucide:hand-coins"></i>
                                <span class="text-sm dark:text-muted-100">Loan</span>
                            </a>
                            <a class="flex items-center gap-2 pt-2"
                                href='{{ route('admin.tokens.index', ['user_id' => $user->id]) }}' title='tokens'>
                                <i class="w-6 h-6 iconify text-slate-300" data-icon="lucide:command"></i>
                                <span class="text-sm dark:text-muted-100">Transaction Tokens</span>
                            </a>
                            <a class="flex items-center gap-2 pt-2"
                                href='{{ route('admin.mail.create', ['user_id' => $user->id]) }}' title='send mail'>
                                <i class="w-6 h-6 iconify text-slate-300" data-icon="lucide:mail"></i>
                                <span class="text-sm dark:text-muted-100">Send Message</span>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post"
                                onsubmit="return confirm('Are you sure you want to delete {{ $user->name }}\'s account ?')">
                                @csrf
                                @method('delete')
                                <button class="flex items-center gap-2 pt-2"><i class="w-6 h-6 iconify text-slate-300"
                                        data-icon="lucide:trash"></i><span class="text-sm dark:text-muted-100">Delete
                                        Profile</span></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            {{ $users->links() }}
        </div>
    </div>
</x-admin-layout>

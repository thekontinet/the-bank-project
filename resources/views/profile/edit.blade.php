<!--Start Layout-->
<!DOCTYPE html>
<html lang="en" x-data="layout()" :class="{'dark': $store.app.isDark,'': !$store.app.isDark}" x-init="$store.app.isDark = JSON.parse(localStorage.getItem('dark'))">
@include('layouts.header')
<body class="w-full h-full bg-white dark:bg-muted-900">
    <!-- prettier-ignore -->

    <main class="w-full">
    <!-- Renders the page body -->

    <!--Nav-->
    <div x-cloak class="absolute top-0 left-0 w-full">
        <div class="w-full max-w-6xl px-4 mx-auto">
            <div class="flex items-center justify-between w-full py-5">
                <div class="flex items-center flex-1">
                    <x-application-logo-dark/>
                </div>
                <div class="grow">
                    <div class="flex items-center justify-center w-full">
                        <p class="font-heading text-muted-700 dark:text-muted-200">
                            Settings
                        </p>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-end">
                        <a href="/dashboard" class="text-center group">
                            <i class="w-8 h-8 transition-colors duration-300 iconify text-muted-800 dark:text-muted-500 dark:group-hover:text-muted-200"
                                data-icon="lucide:x"></i>
                            <span
                                class="block text-xs transition-colors duration-300 font-heading text-muted-400 dark:text-muted-400 dark:group-hover:text-muted-200">
                                Back
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Content-->
    <div class="w-full pt-32 pb-20">
        <div x-data="tabs()" class="w-full max-w-6xl px-4 mx-auto">
            <div class="grid w-full gap-8 md:grid-cols-12 md:gap-16">
                <!--Stepper column-->
                <div class="md:col-span-3 lg:col-span-3">
                    <!--Tabs-->
                    <div class="h-full border-r border-muted-200 dark:border-muted-800">
                        <ul class="-mr-0.5 xs:flex xs:gap-4">
                            <li>
                                <a class="
                                            flex
                                            w-full
                                            py-2
                                            font-heading
                                            text-sm
                                            cursor-pointer
                                            md:border-r-[3px]
                                            xs:border-b-[3px]
                                        "
                                    :class="activeTab === 'tab-1' ? 'text-muted-800 dark:text-muted-100 border-primary-500' :
                                        'text-muted-500 dark:text-muted-400 border-transparent'"
                                    data-tab="tab-1" @click.prevent="toggle($event)">
                                    Personal
                                </a>
                            </li>
                            <li>
                                <a class="
                                        flex
                                        w-full
                                        py-2
                                        font-heading
                                        text-sm
                                        cursor-pointer
                                        md:border-r-[3px]
                                        xs:border-b-[3px]
                                    "
                                    :class="activeTab === 'tab-2' ? 'text-muted-800 dark:text-muted-100 border-primary-500' :
                                        'text-muted-500 dark:text-muted-400 border-transparent'"
                                    data-tab="tab-2" @click.prevent="toggle($event)">
                                    Security
                                </a>
                            </li>
                            {{-- <li>
                                <a class="
                                        flex
                                        w-full
                                        py-2
                                        font-heading
                                        text-sm
                                        cursor-pointer
                                        md:border-r-[3px]
                                        xs:border-b-[3px]
                                    "
                                    data-tab="tab-3"
                                    :class="activeTab === 'tab-3' ? 'text-muted-800 dark:text-muted-100 border-primary-500' :
                                        'text-muted-500 dark:text-muted-400 border-transparent'"
                                    @click.prevent="toggle($event)">
                                    Notifications
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>

                <!--Steps column-->
                <div class="md:col-span-9 lg:col-span-9">
                    <!--Tab 1-->
                    <div x-show="activeTab === '{{$errors->updatePin->has('pin') ? 'false' : 'tab-1'}}'" class="py-6 space-y-10 divide-muted-200 dark:divide-muted-800">
                        <!--Statements-->
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <!--Tab 2-->
                    <div x-show="activeTab === '{{$errors->updatePin->has('pin') ? 'tab-1' : 'tab-2'}}'"
                        class="py-6 space-y-10 divide-muted-200 dark:divide-muted-800">
                        <!--Statements-->
                        @include('profile.partials.update-password-form')

                        <!--2 Factor-->
                        {{-- <!--TODO: Two factor authentication --> --}}

                    </div>

                    <!--Tab 3-->
                    {{-- <div x-show="activeTab === 'tab-3'"
                        class="py-6 space-y-10 divide-muted-200 dark:divide-muted-800">
                        <!--Statements-->
                        <div class="grid gap-8 md:grid-cols-12">
                            <!--Column-->
                            <div class="md:col-span-4">
                                <h3 class="mb-1 font-medium font-heading text-muted-800 dark:text-muted-100">
                                    Account activity
                                </h3>
                                <p class="text-sm font-heading text-muted-500 dark:text-muted-400">
                                    Customize what email notifications you want to receive about
                                    transactions on your account.
                                </p>
                            </div>
                            <!--Column-->
                            <div class="md:col-span-8">
                                <h3
                                    class="px-4 pb-4 text-xs border-b font-heading border-muted-200 dark:border-muted-800 text-muted-800 dark:text-muted-100">
                                    Activity
                                </h3>
                                <div class="flex flex-col divide-y divide-muted-200 dark:divide-muted-800">
                                    <!--Item-->
                                    <div class="group">
                                        <a href="#"
                                            class="flex items-center gap-4 p-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400 hover:bg-muted-100 dark:hover:bg-muted-800">
                                            <label for="switch-thin-2" class="flex items-center gap-4 cursor-pointer">
                                                <span class="relative block h-4">
                                                    <input id="switch-thin-2" type="checkbox"
                                                        class="absolute z-20 w-full h-full opacity-0 cursor-pointer peer"
                                                        checked />
                                                    <span
                                                        class="absolute flex items-center justify-center w-6 h-6 transition -translate-y-1/2 bg-white border rounded-full shadow dark:bg-slate-700 dark:border-slate-600 -left-1 top-1/2 peer-checked:-translate-y-1/2 peer-checked:translate-x-full"></span>
                                                    <span
                                                        class="block w-10 h-4 transition-all duration-300 rounded-full shadow-inner bg-slate-300 dark:bg-slate-600 peer-checked:bg-violet-400 peer-focus:ring-0 outline-1 outline-transparent peer-focus:outline-dashed peer-focus:outline-gray-300 dark:peer-focus:outline-gray-600 peer-focus:outline-offset-2"></span>
                                                </span>
                                                <div>
                                                    <h3 class="text-xs font-heading text-muted-400">Incoming</h3>
                                                    <span>Incoming transactions</span>
                                                </div>
                                            </label>
                                        </a>
                                    </div>
                                    <!--Item-->
                                    <div class="group">
                                        <a href="#"
                                            class="flex items-center gap-4 p-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400 hover:bg-muted-100 dark:hover:bg-muted-800">
                                            <label for="switch-thin-1" class="flex items-center gap-4 cursor-pointer">
                                                <span class="relative block h-4">
                                                    <input id="switch-thin-1" type="checkbox"
                                                        class="absolute z-20 w-full h-full opacity-0 cursor-pointer peer" />
                                                    <span
                                                        class="absolute flex items-center justify-center w-6 h-6 transition -translate-y-1/2 bg-white border rounded-full shadow dark:bg-slate-700 dark:border-slate-600 -left-1 top-1/2 peer-checked:-translate-y-1/2 peer-checked:translate-x-full"></span>
                                                    <span
                                                        class="block w-10 h-4 transition-all duration-300 rounded-full shadow-inner bg-slate-300 dark:bg-slate-600 peer-checked:bg-violet-400 peer-focus:ring-0 outline-1 outline-transparent peer-focus:outline-dashed peer-focus:outline-gray-300 dark:peer-focus:outline-gray-600 peer-focus:outline-offset-2"></span>
                                                </span>
                                                <div>
                                                    <h3 class="text-xs font-heading text-muted-400">Outgoing</h3>
                                                    <span>Outgoing transactions</span>
                                                </div>
                                            </label>
                                        </a>
                                    </div>
                                    <!--Item-->
                                    <div class="group">
                                        <a href="#"
                                            class="flex items-center gap-4 p-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400 hover:bg-muted-100 dark:hover:bg-muted-800">
                                            <label for="switch-thin-3" class="flex items-center gap-4 cursor-pointer">
                                                <span class="relative block h-4">
                                                    <input id="switch-thin-3" type="checkbox"
                                                        class="absolute z-20 w-full h-full opacity-0 cursor-pointer peer" />
                                                    <span
                                                        class="absolute flex items-center justify-center w-6 h-6 transition -translate-y-1/2 bg-white border rounded-full shadow dark:bg-slate-700 dark:border-slate-600 -left-1 top-1/2 peer-checked:-translate-y-1/2 peer-checked:translate-x-full"></span>
                                                    <span
                                                        class="block w-10 h-4 transition-all duration-300 rounded-full shadow-inner bg-slate-300 dark:bg-slate-600 peer-checked:bg-violet-400 peer-focus:ring-0 outline-1 outline-transparent peer-focus:outline-dashed peer-focus:outline-gray-300 dark:peer-focus:outline-gray-600 peer-focus:outline-offset-2"></span>
                                                </span>
                                                <div>
                                                    <h3 class="text-xs font-heading text-muted-400">Failed</h3>
                                                    <span>Failed transactions</span>
                                                </div>
                                            </label>
                                        </a>
                                    </div>
                                    <!--Item-->
                                    <div class="group">
                                        <a href="#"
                                            class="flex items-center gap-4 p-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400 hover:bg-muted-100 dark:hover:bg-muted-800">
                                            <label for="switch-thin-4" class="flex items-center gap-4 cursor-pointer">
                                                <span class="relative block h-4">
                                                    <input id="switch-thin-4" type="checkbox"
                                                        class="absolute z-20 w-full h-full opacity-0 cursor-pointer peer" />
                                                    <span
                                                        class="absolute flex items-center justify-center w-6 h-6 transition -translate-y-1/2 bg-white border rounded-full shadow dark:bg-slate-700 dark:border-slate-600 -left-1 top-1/2 peer-checked:-translate-y-1/2 peer-checked:translate-x-full"></span>
                                                    <span
                                                        class="block w-10 h-4 transition-all duration-300 rounded-full shadow-inner bg-slate-300 dark:bg-slate-600 peer-checked:bg-violet-400 peer-focus:ring-0 outline-1 outline-transparent peer-focus:outline-dashed peer-focus:outline-gray-300 dark:peer-focus:outline-gray-600 peer-focus:outline-offset-2"></span>
                                                </span>
                                                <div>
                                                    <h3 class="text-xs font-heading text-muted-400">Uncashed</h3>
                                                    <span>Uncashed cheques</span>
                                                </div>
                                            </label>
                                        </a>
                                    </div>
                                    <!--Item-->
                                    <div class="group">
                                        <a href="#"
                                            class="flex items-center gap-4 p-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400 hover:bg-muted-100 dark:hover:bg-muted-800">
                                            <label for="switch-thin-5" class="flex items-center gap-4 cursor-pointer">
                                                <span class="relative block h-4">
                                                    <input id="switch-thin-5" type="checkbox"
                                                        class="absolute z-20 w-full h-full opacity-0 cursor-pointer peer"
                                                        checked />
                                                    <span
                                                        class="absolute flex items-center justify-center w-6 h-6 transition -translate-y-1/2 bg-white border rounded-full shadow dark:bg-slate-700 dark:border-slate-600 -left-1 top-1/2 peer-checked:-translate-y-1/2 peer-checked:translate-x-full"></span>
                                                    <span
                                                        class="block w-10 h-4 transition-all duration-300 rounded-full shadow-inner bg-slate-300 dark:bg-slate-600 peer-checked:bg-violet-400 peer-focus:ring-0 outline-1 outline-transparent peer-focus:outline-dashed peer-focus:outline-gray-300 dark:peer-focus:outline-gray-600 peer-focus:outline-offset-2"></span>
                                                </span>
                                                <div>
                                                    <h3 class="text-xs font-heading text-muted-400">Payments</h3>
                                                    <span>Payment requests</span>
                                                </div>
                                            </label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Balance-->
                        <div class="grid gap-8 md:grid-cols-12">
                            <!--Column-->
                            <div class="md:col-span-4">
                                <h3 class="mb-1 font-medium font-heading text-muted-800 dark:text-muted-100">
                                    Low balance
                                </h3>
                                <p class="text-sm font-heading text-muted-500 dark:text-muted-400">
                                    We’ll email you when the balance on one of your accounts drops below the
                                    amount you set in your account.
                                </p>
                            </div>
                            <!--Column-->
                            <div class="md:col-span-8">
                                <h3
                                    class="px-4 pb-4 text-xs border-b font-heading border-muted-200 dark:border-muted-800 text-muted-800 dark:text-muted-100">
                                    Low balance
                                </h3>
                                <div class="flex flex-col divide-y divide-muted-200 dark:divide-muted-800">
                                    <!--Item-->
                                    <div class="group">
                                        <a href="#"
                                            class="flex items-center gap-4 p-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400 hover:bg-muted-100 dark:hover:bg-muted-800">
                                            <label for="switch-thin-6" class="flex items-center gap-4 cursor-pointer">
                                                <span class="relative block h-4">
                                                    <input id="switch-thin-6" type="checkbox"
                                                        class="absolute z-20 w-full h-full opacity-0 cursor-pointer peer"
                                                        checked />
                                                    <span
                                                        class="absolute flex items-center justify-center w-6 h-6 transition -translate-y-1/2 bg-white border rounded-full shadow dark:bg-slate-700 dark:border-slate-600 -left-1 top-1/2 peer-checked:-translate-y-1/2 peer-checked:translate-x-full"></span>
                                                    <span
                                                        class="block w-10 h-4 transition-all duration-300 rounded-full shadow-inner bg-slate-300 dark:bg-slate-600 peer-checked:bg-violet-400 peer-focus:ring-0 outline-1 outline-transparent peer-focus:outline-dashed peer-focus:outline-gray-300 dark:peer-focus:outline-gray-600 peer-focus:outline-offset-2"></span>
                                                </span>
                                                <div>
                                                    <h3 class="text-xs font-heading text-muted-400">Low alert</h3>
                                                    <span>Balance drops under $200.00</span>
                                                </div>
                                            </label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Updates-->
                        <div class="grid gap-8 md:grid-cols-12">
                            <!--Column-->
                            <div class="md:col-span-4">
                                <h3 class="mb-1 font-medium font-heading text-muted-800 dark:text-muted-100">
                                    Apollo updates
                                </h3>
                                <p class="text-sm font-heading text-muted-500 dark:text-muted-400">
                                    Stay up to date on cool new product features or events you might be
                                    interested in.
                                </p>
                            </div>
                            <!--Column-->
                            <div class="md:col-span-8">
                                <h3
                                    class="px-4 pb-4 text-xs border-b font-heading border-muted-200 dark:border-muted-800 text-muted-800 dark:text-muted-100">
                                    Updates
                                </h3>
                                <div class="flex flex-col divide-y divide-muted-200 dark:divide-muted-800">
                                    <!--Item-->
                                    <div class="group">
                                        <a href="#"
                                            class="flex items-center gap-4 p-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400 hover:bg-muted-100 dark:hover:bg-muted-800">
                                            <label for="switch-thin-7" class="flex items-center gap-4 cursor-pointer">
                                                <span class="relative block h-4">
                                                    <input id="switch-thin-7" type="checkbox"
                                                        class="absolute z-20 w-full h-full opacity-0 cursor-pointer peer"
                                                        checked />
                                                    <span
                                                        class="absolute flex items-center justify-center w-6 h-6 transition -translate-y-1/2 bg-white border rounded-full shadow dark:bg-slate-700 dark:border-slate-600 -left-1 top-1/2 peer-checked:-translate-y-1/2 peer-checked:translate-x-full"></span>
                                                    <span
                                                        class="block w-10 h-4 transition-all duration-300 rounded-full shadow-inner bg-slate-300 dark:bg-slate-600 peer-checked:bg-violet-400 peer-focus:ring-0 outline-1 outline-transparent peer-focus:outline-dashed peer-focus:outline-gray-300 dark:peer-focus:outline-gray-600 peer-focus:outline-offset-2"></span>
                                                </span>
                                                <div>
                                                    <h3 class="text-xs font-heading text-muted-400">Features</h3>
                                                    <span>New feature</span>
                                                </div>
                                            </label>
                                        </a>
                                    </div>
                                    <!--Item-->
                                    <div class="group">
                                        <a href="#"
                                            class="flex items-center gap-4 p-4 text-sm transition-colors duration-300 font-heading text-muted-600 dark:text-muted-400 hover:bg-muted-100 dark:hover:bg-muted-800">
                                            <label for="switch-thin-8" class="flex items-center gap-4 cursor-pointer">
                                                <span class="relative block h-4">
                                                    <input id="switch-thin-8" type="checkbox"
                                                        class="absolute z-20 w-full h-full opacity-0 cursor-pointer peer"
                                                        checked />
                                                    <span
                                                        class="absolute flex items-center justify-center w-6 h-6 transition -translate-y-1/2 bg-white border rounded-full shadow dark:bg-slate-700 dark:border-slate-600 -left-1 top-1/2 peer-checked:-translate-y-1/2 peer-checked:translate-x-full"></span>
                                                    <span
                                                        class="block w-10 h-4 transition-all duration-300 rounded-full shadow-inner bg-slate-300 dark:bg-slate-600 peer-checked:bg-violet-400 peer-focus:ring-0 outline-1 outline-transparent peer-focus:outline-dashed peer-focus:outline-gray-300 dark:peer-focus:outline-gray-600 peer-focus:outline-offset-2"></span>
                                                </span>
                                                <div>
                                                    <h3 class="text-xs font-heading text-muted-400">Offers</h3>
                                                    <span>Special offers</span>
                                                </div>
                                            </label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!--End Layout-->
    </main>
</body>

</html>

<div id="sidebar" x-data="sidebar()" x-cloak
    class="fixed top-0 left-0 z-50 h-full transition-all duration-300 bg-muted-100 dark:bg-muted-1000"
    :class="[
        $store.app.isLayoutCompact ? 'w-[80px]' : 'w-[250px]',
        $store.app.isMobileOpen ? 'translate-x-0 lg:translate-x-0' : '-translate-x-full lg:translate-x-0'
    ]">
    <!--Header-->
    <div class="flex items-center justify-between w-full h-20 px-6">
        <x-application-logo-dark />

        <!--Fold button-->
        <button type="button"
            class="items-center justify-center hidden w-10 h-10 transition-colors duration-300 cursor-pointer mask mask-blob hover:bg-muted-200 dark:hover:bg-muted-800 text-muted-700 dark:text-muted-400"
            :class="$store.app.isLayoutCompact ? 'hidden' : 'lg:flex'" @click="foldSidebar()">
            <i class="w-5 h-5 iconify" data-icon="ph:dots-nine-duotone"></i>
        </button>

        <!--Mobile button-->
        <button type="button"
            class="flex items-center justify-center w-10 h-10 transition-colors duration-300 cursor-pointer lg:hidden mask mask-blob hover:bg-muted-200 dark:hover:bg-muted-800 text-muted-700 dark:text-muted-400"
            @click="$store.app.isMobileOpen = false">
            <i class="w-5 h-5 iconify" data-icon="lucide:arrow-left"></i>
        </button>
    </div>
    <!--Body-->
    <div class="
    relative
    h-[calc(100%_-_10rem)]
    w-full
    overflow-y-auto
    slimscroll
    py-6
  "
        :class="$store.app.isLayoutCompact ? 'px-4' : 'px-6'">
        <!--Menu-->
        <ul id="sidebar-menu" class="space-y-3">
            <!--Menu item-->
            <li>
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center gap-4 py-3 transition-colors duration-300 rounded-lg text-muted-500 hover:bg-muted-200 dark:hover:bg-muted-900 hover:text-muted-600 dark:hover:text-muted-200"
                    :class="$store.app.isLayoutCompact ? 'px-1 justify-center' : 'px-4'">
                    <i class="w-6 h-6 iconify" data-icon="ph:users"></i>
                    <span class="font-sans text-sm" :class="$store.app.isLayoutCompact ? 'hidden' : 'block'">
                        Users
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.transactions.index') }}"
                    class="flex items-center gap-4 py-3 transition-colors duration-300 rounded-lg text-muted-500 hover:bg-muted-200 dark:hover:bg-muted-900 hover:text-muted-600 dark:hover:text-muted-200"
                    :class="$store.app.isLayoutCompact ? 'px-1 justify-center' : 'px-4'">
                    <i class="w-6 h-6 iconify" data-icon="ph:arrows-left-right-duotone"></i>
                    <span class="font-sans text-sm" :class="$store.app.isLayoutCompact ? 'hidden' : 'block'">
                        Transactions
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tokens.index') }}"
                    class="flex items-center gap-4 py-3 transition-colors duration-300 rounded-lg text-muted-500 hover:bg-muted-200 dark:hover:bg-muted-900 hover:text-muted-600 dark:hover:text-muted-200"
                    :class="$store.app.isLayoutCompact ? 'px-1 justify-center' : 'px-4'">
                    <i class="w-6 h-6 iconify" data-icon="lucide:scan"></i>
                    <span class="font-sans text-sm" :class="$store.app.isLayoutCompact ? 'hidden' : 'block'">
                        Tokens
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.assets.index') }}"
                    class="flex items-center gap-4 py-3 transition-colors duration-300 rounded-lg text-muted-500 hover:bg-muted-200 dark:hover:bg-muted-900 hover:text-muted-600 dark:hover:text-muted-200"
                    :class="$store.app.isLayoutCompact ? 'px-1 justify-center' : 'px-4'">
                    <i class="w-6 h-6 iconify" data-icon="ph:diamond-duotone"></i>
                    <span class="font-sans text-sm" :class="$store.app.isLayoutCompact ? 'hidden' : 'block'">
                        Assets
                    </span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center gap-4 py-3 transition-colors duration-300 rounded-lg text-muted-500 hover:bg-muted-200 dark:hover:bg-muted-900 hover:text-muted-600 dark:hover:text-muted-200"
                    :class="$store.app.isLayoutCompact ? 'px-1 justify-center' : 'px-4'">
                    <i class="w-6 h-6 iconify" data-icon="ph:credit-card-duotone"></i>
                    <span class="font-sans text-sm" :class="$store.app.isLayoutCompact ? 'hidden' : 'block'">
                        Cards
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.wallets.index') }}"
                    class="flex items-center gap-4 py-3 transition-colors duration-300 rounded-lg text-muted-500 hover:bg-muted-200 dark:hover:bg-muted-900 hover:text-muted-600 dark:hover:text-muted-200"
                    :class="$store.app.isLayoutCompact ? 'px-1 justify-center' : 'px-4'">
                    <i class="w-6 h-6 iconify" data-icon="ph:infinity-duotone"></i>
                    <span class="font-sans text-sm" :class="$store.app.isLayoutCompact ? 'hidden' : 'block'">
                        Wallets
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kyc.index') }}"
                    class="flex items-center gap-4 py-3 transition-colors duration-300 rounded-lg text-muted-500 hover:bg-muted-200 dark:hover:bg-muted-900 hover:text-muted-600 dark:hover:text-muted-200"
                    :class="$store.app.isLayoutCompact ? 'px-1 justify-center' : 'px-4'">
                    <i class="w-6 h-6 iconify" data-icon="lucide:fingerprint"></i>
                    <span class="font-sans text-sm" :class="$store.app.isLayoutCompact ? 'hidden' : 'block'">
                        KYC
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!--Footer-->
    @include('layouts.sidebar-footer')
</div>

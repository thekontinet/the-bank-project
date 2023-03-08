<div class="relative md:col-span-5 lg:col-span-5">
    <!--Tabs-->
    <div class="sticky top-20">
        <div
            class="
relative
w-full
h-[200px]
max-w-[315px]
mx-auto
rounded-xl
p-6
bg-white
dark:bg-muted-1000
border border-muted-200
dark:border-muted-800
shadow-xl shadow-muted-400/10
dark:shadow-muted-800/10
">
            <!--Card content-->
            <div class="flex flex-col h-full gap-3">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-muted-200 dark:bg-muted-700"></div>
                    <span class="font-sans text-sm text-muted-400" x-text="cardType">
                        New
                    </span>
                </div>
                <div class="mt-auto space-y-1">
                    <img class="mb-3 w-11" src="/img/illustrations/card-chip.svg" alt="Card chip" width="44"
                        height="31" />
                    <div>
                        <h5 class="text-sm font-heading text-muted-500" x-text="cardholder">
                            Name on Card
                        </h5>
                    </div>
                    <div>
                        <p class="text-xs font-heading text-muted-400">
                            •••• •••• ••••
                            <span x-text="cardAccountNumber">••••</span>
                        </p>
                    </div>
                    <div class="flex items-center w-full gap-2 text-xs font-heading text-muted-400">
                        <div class="flex items-center gap-2">
                            <span>EXP</span>
                            <span>••/••</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span>CVC</span>
                            <span>•••</span>
                        </div>
                    </div>
                </div>
            </div>

            <!--Mastercard-->
            <div class="absolute flex top-4 right-5">
                <div class="-mr-2 rounded-full h-9 w-9 bg-rose-500/60"></div>
                <div class="relative z-10 -ml-2 rounded-full h-9 w-9 bg-yellow-500/60"></div>
            </div>

            <!--Logo-->
            <div class="absolute flex bottom-7 right-5">
                <img src="/img/logo/logo-square-outline.svg" class="w-10 h-10 dark:invert" alt="App logo" width="48"
                    height="48" />
            </div>
        </div>
    </div>
</div>
</div>
</div>

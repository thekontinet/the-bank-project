<x-app-layout>
    <div class="py-12">
        <div class="flex items-center min-h-[450px]">
            <div class="flex items-center w-full">
                <div class="w-full max-w-md py-6 mx-auto text-center">
                  <div class="mx-auto mb-4 text-primary-500 w-14 h-14">
                    <svg
                      class="relative block rounded-full stroke-current stroke-2 w-14 h-14 animate-scale"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 52 52"
                      stroke-miterlimit="10"
                    >
                      <circle
                        class="stroke-current stroke-2 animate-circle"
                        cx="26"
                        cy="26"
                        r="25"
                        fill="none"
                        stroke-dasharray="166"
                        stroke-dashoffset="166"
                        stroke-miterlimit="10"
                      />
                      <path
                        class="stroke-current stroke-2 animate-check"
                        fill="none"
                        d="M14.1 27.2l7.1 7.2 16.7-16.8"
                        stroke-dasharray="48"
                        stroke-dashoffset="48"
                      />
                    </svg>
                  </div>
                  <h2
                    class="mb-2 text-2xl font-bold font-heading text-muted-800 dark:text-white"
                  >
                    Transaction Successfully Submitted
                  </h2>
                  <p class="mb-5 font-sans text-muted-500 dark:text-muted-400">
                    Amazing! Your transaction has been queued for processing. Thank you for trusting us.
                  </p>
                  <div class="flex justify-center">
                    <a
                      href="/dashboard"
                      class="inline-flex items-center justify-center w-48 h-10 px-6 py-2 font-sans text-sm text-white transition-all duration-300 rounded-full shadow-lg gap-x-2 bg-primary-500 shadow-primary-500/20 hover:shadow-xl tw-accessibility"
                    >
                      <span>Back to Dahboard</span>
                    </a>
                  </div>
                </div>
            </div>
        </div>
      </div>

      <x-transaction-loader limit="100"/>
</x-app-layout>

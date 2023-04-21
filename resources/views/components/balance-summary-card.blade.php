@props(['account', 'hasChart'])
<div class="grid gap-4 lg:grid-cols-2">
    @if ($account)
        <!--Blance widget-->
        <div
            class="border shadow-xl dark:bg-muted-1000 rounded-xl dark:border-muted-800 shadow-muted-400/10 dark:shadow-muted-800/10">
            @empty(!$hasChart)
             <div x-data='transaction_chart' class="py-4">
                <select class="select select-bordered select-primary block mx-auto" x-model='start'>
                    <option value="7">Last 7 days</option>
                    <option value="14">Last 14 days</option>
                    <option value="60">Last month</option>
                </select>
                <div x-ref='container'></div>
             </div>
             @else
             <p class="text-center font-light mt-4 text-green-500 bg-green-100 p-4 rounded-md">Not enough data to display chart</p>
            @endempty
        </div>
        <div
            class="border shadow-xl dark:bg-muted-1000 rounded-xl dark:border-muted-800 shadow-muted-400/10 dark:shadow-muted-800/10">
            @empty(!$hasChart)
            <div x-data='transaction_flow' class="py-4">
                <div x-ref='container'></div>
             </div>
             @else
             <p class="text-center font-light mt-4 text-green-500 bg-green-100 p-4 rounded-md">Not enough data to display chart</p>
            @endempty
        </div>
    @endif
</div>

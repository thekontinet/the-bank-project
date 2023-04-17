@props(['account', 'hasChart'])

@if ($account)
    <!--Blance widget-->
    <div
        class="bg-white border shadow-xl dark:bg-muted-1000 rounded-xl border-muted-200 dark:border-muted-800 shadow-muted-400/10 dark:shadow-muted-800/10">
        <div class="flex flex-col gap-4 px-8 pt-8 text-center">
            <h4 class="text-sm font-semibold uppercase font-heading text-muted-400">
                Account Balance
            </h4>
            <p class="font-sans text-sm font-medium text-muted-800 dark:text-white -mt-3">{{$account->number}}</p>
            <p class="first-letter:text-xl first-letter:inline-block first-letter:mr-2">
                <span class="font-sans text-4xl font-medium text-muted-800 dark:text-white">@money($account->balance, $account->currency)</span>
            </p>
            <div class="flex items-center justify-center gap-x-2">
                <span class="font-sans text-sm text-muted-400">
                    Today, {{now()->format('M d')}}
                </span>
            </div>
        </div>
        @empty(!$hasChart)
         <div id="transaction-chart"></div>
         @else
         <p class="text-center font-light mt-4 text-green-500 bg-green-100 p-4 rounded-md">Not enough data to display chart</p>
        @endempty
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            const chart = new ApexCharts(document.querySelector('#transaction-chart'), {
                chart: {
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                    width: '100%',
                    height: '200px'
                },
                grid: {
                    show: false,
                    padding: {
                        left: 0,
                        right: 0
                    }
                },
                series: [{
                    name: 'Transactions',
                    data: [],
                }, ],
                xaxis: {
                    type: 'datetime',
                },
                yaxis: {
                    show: false
                }
            });

            chart.render()

            fetch('/chart/transaction')
                .then((response) => response.json())
                .then((data) => {
                    chart.updateSeries([{
                        data: data,
                    }]);
                });
        </script>
    @endpush
@endif

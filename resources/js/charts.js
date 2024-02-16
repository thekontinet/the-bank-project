import ApexCharts from "apexcharts";
import moment from "moment/moment";
const chartContainer = document.querySelector('#transaction-chart')

const LineChartConfig = {
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
    },],
    xaxis: {
        type: 'datetime',
        labels: {
            formatter: function (value, timestamp, opts) {
                return moment(timestamp).format("MMMM D")
            }
        }
    },
    yaxis: {
        show: false
    },
    colors: ['#EF4444', '#000000', '#000000'],
}

const pieChartConfig = {
    chart: {
        type: 'donut',
        toolbar: {
            show: false
        },
        width: '100%',
        height: '300px'
    },
    plotOptions: {
        pie: {
            customScale: 1
        }
    },
    labels: ['Money In', 'Money Out'],
    colors: ['#EF4444', '#EF8244', '#000000'],
}


document.addEventListener('alpine:init', () => {
    window.Alpine.data('transaction_chart', () => ({
        chart: null,

        start: 7,

        end: moment().format(),

        init() {
            this.chart = new ApexCharts(this.$refs.container, LineChartConfig)
            this.chart.render()
            this.updateChart()
            this.$watch('start', () => this.updateChart())
        },

        updateChart() {
            const start = moment().subtract(this.start, 'days').format()
            fetch(`/chart/transaction?start=${start}`)
                .then((response) => response.json())
                .then((data) => {
                    this.chart.updateSeries([{
                        data: data,
                    }]);
                });
        }
    }))

    window.Alpine.data('transaction_flow', () => ({
        chart: null,

        init() {
            this.chart = new ApexCharts(this.$refs.container, pieChartConfig)
            this.chart.render()
            this.updateChart()
            // this.$watch('start', () => this.updateChart())
        },

        updateChart() {
            const start = moment().subtract(this.start, 'days').format()
            fetch(`/chart/transaction-flow`)
                .then((response) => response.json())
                .then((data) => {
                    this.chart.updateSeries([
                        data.total_deposit / 100,
                        data.total_withdrawal / 100,
                    ]);
                });
        }
    }))
})

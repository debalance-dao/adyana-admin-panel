<x-layout.default>
    <script defer src="/assets/js/apexcharts.js"></script>

    <div x-data="chart" class="panel">
        <h5 class="font-semibold text-lg dark:text-white-light">Welcome Adyana</h5>
        <div class="pt-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-2 gap-6 mb-6 text-white">
                <!-- Company -->
                <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
                    <div class="flex justify-between">
                        <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Project</div>
                    </div>
                    <div class="flex items-center mt-5">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> {{ $project }} </div>
                    </div>
                </div>

                <!-- Funds Total -->
                <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
                    <div class="flex justify-between">
                        <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Funds Total</div>
                    </div>
                    <div class="flex items-center mt-5">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> Ady
                            {{ number_format($funds, 0, ',', '.') }}
                        </div>
                    </div>
                </div>

            </div>

            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white">Funds</h5>
                </div>
                <div x-ref="areaChartFunds" class="bg-white dark:bg-black rounded-lg overflow-hidden"></div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("chart", () => ({
                // highlightjs
                areaChartFunds: null,

                init() {
                    isDark = this.$store.app.theme === "dark" || this.$store.app.isDarkMode ? true :
                        false;
                    isRtl = this.$store.app.rtlClass === "rtl" ? true : false;

                    setTimeout(() => {
                        this.areaChartFunds = new ApexCharts(this.$refs.areaChartFunds, this
                            .areaChartFundsOptions);
                        this.areaChartFunds.render();
                    }, 300);

                    this.$watch('$store.app.theme', () => {
                        this.refreshOptions();
                    })

                    this.$watch('$store.app.rtlClass', () => {
                        this.refreshOptions();
                    })

                },

                refreshOptions() {
                    isDark = this.$store.app.theme === "dark" || this.$store.app.isDarkMode ? true :
                        false;
                    isRtl = this.$store.app.rtlClass === "rtl" ? true : false;
                    this.areaChartFunds.updateOptions(this.areaChartFundsOptions);
                },

                get areaChartFundsOptions() {
                    return {
                        series: [{
                            name: 'Funds',
                            data: @json($chartData['funds'])
                        }],
                        chart: {
                            type: 'area',
                            height: 300,
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#805dca'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            width: 2,
                            curve: 'smooth'
                        },
                        xaxis: {
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -40 : 0,
                            }
                        },
                        labels: @json($chartData['project']),
                        legend: {
                            horizontalAlign: 'left'
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                        }
                    }
                },
            }));
        });
    </script>
</x-layout.default>

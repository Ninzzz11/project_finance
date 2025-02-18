<x-app-layout>
    <x-slot:head>
        Dashboard
    </x-slot:head>
    <x-slot:header>
        Dashboard
    </x-slot:header>

            <div class="row d-flex flex-sm-nowrap">

                <div class="col-xl-4 px-2">
                    <div class="card border-3 border-top border-top-primary mb-2">
                        <div class="card-body mb-4">
                            <h3 class="text-primary">Total Assets</h3>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-3">₱ 12,099</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 px-2">
                    <div class="card border-3 border-top border-top-primary mb-2">
                        <div class="card-body mb-4">
                            <h3 class="text-success">Net Income</h3>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-3">₱ 100,342</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 px-2">
                    <div class="card border-3 border-top border-top-primary mb-2">
                        <div class="card-body mb-4">
                            <h3 class="text-secondary">Total Expenses</h3>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-3">₱ 12,342</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <!-- ============================================================== -->
            <!-- end revenue year  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- profit and loss overview  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-lg-5 p-2">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body p-1">
                                <h3 class="card-header text-center">Profit and Loss overview</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title text-center mb-0 py-2 bg-primary">Last Month</h5>
                                        <div class="table-responsive-sm">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="ltr">Category</th>
                                                        <th scope="col" class="rtr">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Total Income</th>
                                                        <td>100,000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Cost of Sales</th>
                                                        <td>900,999</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gross Profit</th>
                                                        <td>900,999</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Expenses</th>
                                                        <td>900,999</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Net Earnings</th>
                                                        <td>900,999</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="card-title text-center mb-0 py-2 bg-primary">This year to date</h5>
                                        <div class="table-responsive-sm">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Category</th>
                                                        <th scope="col" class="text-end">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Total Income</th>
                                                        <td>100,000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Cost of Sales</th>
                                                        <td>900,999</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gross Profit</th>
                                                        <td>900,999</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total Expenses</th>
                                                        <td>900,999</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Net Earnings</th>
                                                        <td>900,999</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="col-lg-7 p-2">
                    <div class="card border-3 border-top border-top-primary ">
                        <div class="card-header">
                            Income Overview
                        </div>
                        <div class="card-body">
                            <!-- Chart container -->
                            <canvas id="incomeChart" style="min-height: 265px"></canvas>
                                <!-- Chart will be rendered here -->
                                <script>
                                    document.addEventListener("DOMContentLoaded",()=>{
                                        new Chart(document.querySelector("#incomeChart"),
                                        {
                                        type: 'line', // Change to desired chart type
                                        data: {
                                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                            datasets: [{
                                                label: 'Paid invoices',
                                                data: [12000, 15000, 8000, 19000, 22000, 18000, 25000], // Sample data
                                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                borderColor: 'rgba(54, 162, 235, 1)',
                                                pointRadius: 0,
                                                pointHoverRadius: 0,
                                                tension: 0.43
                                            },
                                            {
                                                label: 'Overdue invoices',
                                                data: [12000, 1300, 8000, 21000, 22000, 2000, 9000], // Sample data
                                                backgroundColor: 'rgba(244,67,70, 0.2)',
                                                borderColor: 'rgb(244,67,70)',
                                                pointRadius: 0,
                                                pointHoverRadius: 0,
                                                tension: 0.43
                                            },
                                            {
                                                label: 'Open invoices',
                                                data: [1000, 1300, 8000, 2300, 0, 1200, 2000], // Sample data
                                                backgroundColor: 'rgba(243,47,221, 0.2)',
                                                borderColor: 'rgba(243,47,221,1)',
                                                pointRadius: 0,
                                                pointHoverRadius: 0,
                                                tension: 0.43
                                            }
                                        ]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                    })
                                </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-5 p-2">
                    <div class="card">
                        <div class="card-body p-1">
                            <h3 class="card-header text-center">Balance sheet overview</h3>
                            <p class="card-header text-end bg-primary my-0 p-2">Period/Total</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Category</th>
                                            <th scope="col">Last month</th>
                                            <th scope="col">Month to date</th>
                                            <th scope="col">Year to date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Current Assets</th>
                                            <td>1000</td>
                                            <td>2000</td>
                                            <td>3000</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Long-term Assets</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Current Liabilities</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Non-current Liabilities</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Equity</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <!-- ============================================================== -->
                <!-- ap and ar balance  -->
                <!-- ============================================================== -->
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">AP Balance</h5>
                        <div class="card-body">
                            <canvas id="barChart" style="max-height: 200px"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded",() => {
                                    new Chart(document.querySelector("#barChart"),{
                                        type: 'bar',
                                        data: {
                                            labels:['Jan','Feb','Mar','Apr','May'],
                                            datasets: [{
                                                label: 'Bar Chart',
                                                data: [88,100000,22,44,55],
                                            }]
                                        }
                                    }
                                )
                                })
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">AR Balance</h5>
                        <div class="card-body">
                            <h1>Charts</h1>
                            <canvas id="chartjs_balance_bar"></canvas>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- end ap and ar balance  -->
                <!-- ============================================================== -->

            </div>


</x-app-layout>

<x-app-layout>
    <x-slot:header>
        Dashboard
    </x-slot:header>

            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body mb-4">
                            <h5 class="text-muted">Current Assets</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-3">₱ 12,099</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                            </div>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="#" class="card-link">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body mb-4">
                            <h5 class="text-muted">Current Assets</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-3">₱ 12,099</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                            </div>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="#" class="card-link">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body mb-4">
                            <h5 class="text-muted">Total Expenses</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-3">₱ 1,340</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
                            </div>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="#" class="card-link">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body mb-4">
                            <h5 class="text-muted">Current Assets</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-3">₱ 12,099</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                            </div>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="#" class="card-link">View Details</a>
                        </div>
                    </div>
                </div>

            <!-- ============================================================== -->
            <!-- end revenue year  -->
            <!-- ============================================================== -->

            <div class="row">

                <!-- ============================================================== -->
                <!-- ap and ar balance  -->
                <!-- ============================================================== -->
                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">AP Balance</h5>
                        <div class="card-body">
                            <h1>Charts</h1>
                            <canvas id="chartjs_balance_bar"></canvas>
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

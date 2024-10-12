<x-app-layout>
    <x-slot:header>
        Dashboard
    </x-slot:header>

            <div class="row">
                <div class="offset-xl-10 col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                    <form>
                        <div class="form-group">
                            <input class="form-control" type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
                        </div>
                    </form>
                </div>
            </div>
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
                            <canvas id="chartjs_balance_bar"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">AR Balance</h5>
                        <div class="card-body">
                            <canvas id="chartjs_balance_bar"></canvas>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- end ap and ar balance  -->
                <!-- ============================================================== -->

            </div>

            <div class="row">

                <!-- ============================================================== -->
                <!-- overdue invoices  -->
                <!-- ============================================================== -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Disputed vs Overdue Invoices</h5>
                        <div class="card-body">
                            <div class="ct-chart-invoice ct-golden-section"></div>
                            <div class="text-center m-t-40">
                                <span class="legend-item mr-3">
                                            <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full "></i></span><span class="legend-text">Disputed Invoices</span>
                                </span>
                                <span class="legend-item mr-3">
                                            <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full "></i></span><span class="legend-text">Overdue Invoices</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end overdue invoices  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- disputed invoices  -->
                <!-- ============================================================== -->
                <div class="col-xl-5 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Disputed Invoices</h5>
                        <div class="card-body">
                            <div class="ct-chart-line-invoice ct-golden-section"></div>
                            <div class="text-center m-t-10">
                                <span class="legend-item mr-3">
                                        <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Disputed Invoices</span>
                                </span>
                                <span class="legend-item mr-3">
                                        <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                <span class="legend-text">Avarage</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end disputed invoices  -->
                <!-- ============================================================== -->
            </div>
</x-app-layout>

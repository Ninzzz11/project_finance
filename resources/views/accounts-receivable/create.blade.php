<x-app-layout>
    <x-slot:header>
        Budget Management
    </x-slot:header>
            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header p-4">
                            <a class="pt-2 d-inline-block" href="#">Far East Cafe</a>

                            <div class="float-right"> <h3 class="mb-0">Invoice</h3>
                            Date: {{ date('Y-m-d') }}</div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h6 class="mb-2">From:</h6>
                                    <h3 class="text-dark mb-1">Far East Cafe</h3>

                                    <div>Address</div>
                                    <div>Email: fareastcafe@gmail.com</div>
                                    <div>Phone: +639123456789</div>
                                </div>
                            </div>
                            <div class="row mb-4 p-0">
                                <div class="col-xl">
                                    <h6 class="mb-2">Add Customer</h6>
                                    <form class="needs-validation" novalidate>
                                        <div class="row">
                                            <div class="col-xl-6 mb-2">
                                                <label class="label1" for="invoice_no">Customer</label>
                                                <input type="text" class="form-control" id="" name="customer" placeholder="" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label class="label1" for="invoice_no">Invoice no.</label>
                                                <input type="text" class="form-control" id="invoice_no" placeholder="" required>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label class="label1" for="invoice_no">Terms (NET)</label>
                                                <select class="form-control form-control-sm">
                                                    <option value="30">30</option>
                                                    <option value="60">60</option>
                                                    <option value="90">90</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label class="label1" for="invoice_no">Invoice date</label>
                                                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" />
                                                    <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label class="label1" for="invoice_no">Due date</label>
                                                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker" />
                                                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>Service</th>
                                            <th>Description</th>
                                            <th class="right">Unit Cost</th>
                                            <th class="center">Qty</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">1</td>
                                            <td class="left strong">Origin License</td>
                                            <td class="left">Extended License</td>
                                            <td class="right">$1500,00</td>
                                            <td class="center">1</td>
                                            <td class="right">$1500,00</td>
                                        </tr>
                                        <tr>
                                            <td class="center">2</td>
                                            <td class="left">Custom Services</td>
                                            <td class="left">Instalation and Customization (cost per hour)</td>
                                            <td class="right">$110,00</td>
                                            <td class="center">20</td>
                                            <td class="right">$22.000,00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Subtotal</strong>
                                                </td>
                                                <td class="right">$28,809,00</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">VAT (10%)</strong>
                                                </td>
                                                <td class="right">$2,304,00</td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Total</strong>
                                                </td>
                                                <td class="right">
                                                    <strong class="text-dark">$20,744,00</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex flex-row-reverse bd-highlight pt-2">
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/vendor/datepicker/moment.js')}}"></script>
        <script src="{{ asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
        <script src="{{ asset('assets/vendor/datepicker/datepicker.js')}}"></script>


</x-app-layout>

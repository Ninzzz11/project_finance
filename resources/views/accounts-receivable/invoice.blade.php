<x-app-layout>
    <x-slot:header>
        Account Receivables
    </x-slot:header>

        <form action="/ar-create" method="post">
            @csrf
            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header p-4">
                            <a class="pt-2 d-inline-block" href="#"><h2>Far East Cafe</h2></a>
                            <div class="float-right">
                                <h3 class="mb-0">Invoice</h3>
                                Date: {{ date('Y-m-d') }}
                            </div>
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
                                    <div class="row">
                                        <div class="col-xl-6 mb-2">
                                            <label class="label1" for="invoice_no">Customer</label>
                                            <input type="text" class="form-control" id="dropdownInput" name="customer" onfocus="toggleDropdown(true)" onblur="toggleDropdown(false)" autocomplete="off">
                                            <div class="dropdown-menu m-0 ml-3" id="dropdownMenu" style="width: 352px">
                                                <a class="dropdown-item" href="#">Create New Customer</a>
                                                <span class="dropdown-item" onclick="selectItem(this)">John Doe</span>
                                                <span class="dropdown-item" onclick="selectItem(this)">Jane Smith</span>
                                            </div>
                                            <x-error name="customer"/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="invoice_no">Invoice no.</label>
                                            <input type="text" class="form-control" id="invoice_no" name="invoice_no">
                                            <x-error name="invoice_no"/>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="terms">Terms</label>
                                            <select class="form-control form-control-sm" id="daysSelect" name="terms" onchange="calculateDueDate()">
                                                <option value="30">Net 30</option>
                                                <option value="60">Net 60</option>
                                                <option value="90">Net 90</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="startdate">Invoice date</label>
                                            <input type="date" name="start_date" class="form-control" id="startDate" onchange="calculateDueDate()">
                                            <x-error name="start_date"/>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="deuDate">Due date</label>
                                            <input type="date" name="due_date" class="form-control" id="dueDate" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped" id="calculationTable">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th class="left w-50">Description</th>
                                            <th class="right">Unit Cost</th>
                                            <th class="center">Qty</th>
                                            <th class="right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <td class="center">2</td>
                                            <td class="left"><input class="form-control" type="text" value="Custom Services"></td>
                                            <td class="left"><input class="form-control" type="text" value="Instalation and Customization (cost per hour)"></td>
                                            <td class="right"><input class="form-control" type="text" value="$110,00"></td>
                                            <td class="center"><input class="form-control" type="text" value="20"></td>
                                            <td class="right">$22.000,00</td>
                                        </tr> --}}
                                        <tr>
                                            <td class="center"><input type="text" name="services[0][id]" id="serviceId" class="form-control" value="1" readonly></td>
                                            <td class="left"><input type="text" name="services[0][description]" id="description" class="form-control" name="description" required>
                                                <x-error name="services[0][description]"/></td>
                                            <td class="right"><input type="text" name="services[0][amount]" id="amount" class="form-control" value="0" oninput="calculateResult()">
                                                <x-error name="services[0][amount]"/></td>
                                            <td class="center"><input type="number" name="services[0][quantity]" id="qty" class="form-control" value="1" oninput="calculateResult()">
                                                <x-error name="services[0][quantity]"/></td>
                                            <td class="right"><input type="text" name="services[0][total]" id="total" class="form-control" oninput="calculateResult()" readonly></td>
                                        </tr>
                                        <tr>
                                            <td class="center"><input type="text" name="services[1][id]" id="serviceId" class="form-control" value="2" @readonly(true)></td>
                                            <td class="left"><input type="text" name="services[1][description]" id="description1" class="form-control">
                                                <x-error name="services[1][description]"/></td>
                                            <td class="right"><input type="text" name="services[1][amount]" id="amount1" class="form-control" value="0" oninput="calculateResult()">
                                                <x-error name="services[1][amount]"/></td>
                                            <td class="center"><input type="number" name="services[1][quantity]" id="qty1" class="form-control" value="1" oninput="calculateResult()">
                                                <x-error name="services[1][quantity]"/></td>
                                            <td class="right"><input type="text" name="services[1][total]" id="total1" class="form-control" oninput="calculateResult()" readonly></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                    <button class="btn" onclick="addRow()" disabled>Add Row</button>
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Total</strong>
                                                </td>
                                                <td class="right">
                                                    <input type="number" name="grand_total" id="mainTotal" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                                <td class="left">
                                                    <strong class="text-dark">VAT (10%)</strong>
                                                </td>
                                                <td class="right"></td>
                                            </tr> --}}
                                            {{-- <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Total</strong>
                                                </td>
                                                <td class="right">
                                                    <strong class="text-dark"></strong>
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                    <div class="d-flex flex-row-reverse bd-highlight pt-2">
                                        <a href="/accounts-receivable" class="btn btn-light ml-2">Cancel</a>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script src="{{ asset('assets/libs/js/invoice_create.js')}}"></script>
        <script src="{{ asset('assets/vendor/datepicker/moment.js')}}"></script>
        <script src="{{ asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
        <script src="{{ asset('assets/vendor/datepicker/datepicker.js')}}"></script>




</x-app-layout>

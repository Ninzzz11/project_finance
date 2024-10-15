<x-app-layout>
    <x-slot:header>
        Account Receivables
    </x-slot:header>
        <form method="POST" action="/accounts-receivable/edit/{{ $invoices->id }}">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header p-4">
                            <a class="pt-2 d-inline-block" href="#"><h2>Far East Cafe</h2></a>
                            <div class="float-right">
                                <h3 class="mb-0">Invoice #{{ $invoices->invoice_no }}</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h6 class="mb-2">Customer:</h6>
                                    <input type="text" class="form-control" id="dropdownInput" name="customer" onfocus="toggleDropdown(true)" onblur="toggleDropdown(false)" value="{{ $invoices->customer }}" autocomplete="off">
                                    <div class="dropdown-menu m-0 ml-3" id="dropdownMenu" style="width: 352px">
                                        <a class="dropdown-item" href="#">Create New Customer</a>
                                        <span class="dropdown-item" onclick="selectItem(this)">John Doe</span>
                                        <span class="dropdown-item" onclick="selectItem(this)">Jane Smith</span>
                                    </div>
                                    <x-error name="customer"/>
                                </div>
                            </div>
                            <div class="row mb-4 p-0">
                                <div class="col-xl">
                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="terms">Terms</label>
                                            <select class="form-control form-control-sm" id="daysSelect" name="terms" value="{{ $invoices->terms }}" onchange="calculateDueDate()">
                                                <option value="30">Net 30</option>
                                                <option value="60">Net 60</option>
                                                <option value="90">Net 90</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="startdate">Invoice date</label>
                                            <input type="date" name="start_date" class="form-control" id="startDate" value="{{ $invoices->start_date }}" onchange="calculateDueDate()">
                                            <x-error name="start_date"/>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="deuDate">Due date</label>
                                            <input type="date" name="due_date" class="form-control" value="{{ $invoices->due_date }}" id="dueDate" readonly>
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
                                            <td class="left"><input type="text" name="services[0][description]" id="description" class="form-control" name="description" value="{{ $invoices->services[0]->description }}" required>
                                                <x-error name="services[0][description]"/></td>
                                            <td class="right"><input type="text" name="services[0][amount]" id="amount" class="form-control" value="{{ $invoices->services[0]->amount }}"  oninput="calculateResult()">
                                                <x-error name="services[0][amount]"/></td>
                                            <td class="center"><input type="number" name="services[0][quantity]" id="qty" class="form-control" value="{{ $invoices->services[0]->quantity }}" oninput="calculateResult()">
                                                <x-error name="services[0][quantity]"/></td>
                                            <td class="right"><input type="text" name="services[0][total]" id="total" class="form-control" value="{{ $invoices->services[0]->total }}" oninput="calculateResult()" readonly></td>
                                        </tr>
                                        <tr>
                                            <td class="center"><input type="text" name="services[1][id]" id="serviceId" class="form-control" value="2" @readonly(true)></td>
                                            <td class="left"><input type="text" name="services[1][description]" id="description1" class="form-control" value="{{ $invoices->services[1]->description }}">
                                                <x-error name="services[1][description]"/></td>
                                            <td class="right"><input type="text" name="services[1][amount]" id="amount1" class="form-control" value="{{ $invoices->services[1]->amount }}" oninput="calculateResult()">
                                                <x-error name="services[1][amount]"/></td>
                                            <td class="center"><input type="number" name="services[1][quantity]" id="qty1" class="form-control" value="{{ $invoices->services[1]->quantity }}" oninput="calculateResult()">
                                                <x-error name="services[1][quantity]"/></td>
                                            <td class="right"><input type="text" name="services[1][total]" id="total1" class="form-control" value="{{ $invoices->services[1]->total }}" oninput="calculateResult()" readonly></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Total</strong>
                                                </td>
                                                <td class="right">
                                                    <input type="number" name="grand_total" id="mainTotal" class="form-control" value="{{ $invoices->grand_total }}" readonly>
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
                                </div>
                            </div>
                            <div class="col-xl d-flex justify-content-end bd-highlight p-2">
                                <div><button class="btn btn-primary1 mr-3 px-4" type="submit">Save</button></div>
                                <div><a href="/accounts-receivable" class="btn btn-light">Go back</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if( $errors->any())
                <div>
                    @foreach ( $errors as $error)
                        <h3>{{ $error }}</h3>
                    @endforeach
                </div>
            @endif
        </form>


        <script src="{{ asset('assets/libs/js/invoice_create.js')}}"></script>

</x-app-layout>

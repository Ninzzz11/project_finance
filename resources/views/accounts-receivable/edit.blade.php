<x-app-layout>
    <x-slot:header>
        Account Receivables
    </x-slot:header>

        <form method="POST" action="/accounts-receivable/edit/{{ $invoices->id }}">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="offset-xl-2 col-xl-8">
                    @if(session()->has('message'))
                    <div class="col-sm-6 p-0">
                        <div id="message" class="alert alert-success alert-dismissible" role="alert">
                            <h5 class="m-0"><i class="fa-solid fa-check-to-slot m-2"></i>{{ session()->get('message') }}</h5>
                            <button type="button" class="close m-0" aria-label="Close" onclick="disposeAlert()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif
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
                                    <div>Bagong Silang Caloocan City</div>
                                    <div>{{ Auth::User()->email }}</div>
                                    <div>Phone: +639123456789</div>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="mb-2">To:</h6>
                                    <h3 class="text-dark mb-1" id="full_name">{{ $invoices->account->full_name }}</h3>
                                    <div id="customer_address">{{ $invoices->account->address }}</div>
                                    <div id="customer_email">{{ $invoices->account->email }}</div>
                                    <div id="customer_contact_no">{{ $invoices->account->contact_no }}</div>
                                </div>
                            </div>
                            <div class="row mb-4 p-0">
                                <div class="col-xl">
                                    <h6 class="mb-2">Add Customer</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-xl-6 mb-2 pr-2">
                                            <label class="label1" for="customerSelect">Customer</label>
                                            <div class="dropdown">
                                                <input type="text" name="customer" class="form-control" id="dropdownInput" onfocus="toggleDropdown(true)" onblur="toggleDropdown(false)" value="{{ $invoices->account->full_name }}" required>
                                                <div class="dropdown-menu m-0" id="dropdownMenu" style="width: 100%;">
                                                    @foreach($accounts as $account)
                                                        <span class="dropdown-item" onclick="selectCustomer({{ $account->id }})">{{ $account->full_name }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <x-error name="customer"/>
                                        </div>
                                        <div class="col-sm-1 mb-2 px-0">
                                            <label class="label1 ml-2" for="account_id">ID</label>
                                            <input type="text" class="form-control px-3" id="accounts_id" name="accounts_id" value="{{ $invoices->account->id }}" readonly>
                                            <x-error name="account_id"/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="status">Status</label>
                                            <select class="form-control form-control-md" id="invoice_no" name="status">
                                                <option value="Pending">Open</option>
                                                <option value="Paid">Paid</option>
                                            </select>
                                            <x-error name="status"/>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="terms">Terms</label>
                                            <select class="form-control form-control-md" id="daysSelect" name="terms" onchange="calculateDueDate()">
                                                <option value="30">Net 30</option>
                                                <option value="60">Net 60</option>
                                                <option value="90">Net 90</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="startdate">Invoice date</label>
                                            <input type="date" name="start_date" class="form-control" id="startDate" onchange="calculateDueDate()" value="{{ $invoices->start_date}}" required>
                                            <x-error name="start_date"/>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="deuDate">Due date</label>
                                            <input type="date" name="due_date" class="form-control" id="dueDate" value="{{ $invoices->due_date}}" readonly>
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
                                    <tbody id="servicesTableBody">
                                        {{-- <tr>
                                            <td class="center">2</td>
                                            <td class="left"><input class="form-control" type="text" value="Custom Services"></td>
                                            <td class="left"><input class="form-control" type="text" value="Instalation and Customization (cost per hour)"></td>
                                            <td class="right"><input class="form-control" type="text" value="$110,00"></td>
                                            <td class="center"><input class="form-control" type="text" value="20"></td>
                                            <td class="right">$22.000,00</td>
                                        </tr> --}}
                                        @foreach( $invoices->services as $index => $service )
                                        <tr>
                                            <td>
                                                <input type="text" name="service_id" id="serviceId" class="form-control" value="{{ $loop->iteration }}">
                                            </td>
                                            <td>
                                                <input type="text" name="services[{{ $index }}][description]"  class="form-control" value="{{ $service->description }}">
                                                <x-error name="services.{{$index}}.description"/>
                                            </td>
                                            <td>
                                                <input type="text" name="services[{{ $index }}][amount]"  class="form-control amount" value="{{ $service->amount }}" oninput="calculateResult()">
                                                <x-error name="services.{{$index}}.amount"/>
                                            </td>
                                            <td>
                                                <input type="number" name="services[{{ $index }}][quantity]"  class="form-control quantity" value="{{ $service->quantity }}" oninput="calculateResult()">
                                            </td>
                                            <td>
                                                <input type="number" name="services[{{ $index }}][total]"  class="form-control pr-1 total" value="{{ $service->total }}" readonly>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5 mt-1">
                                    <button class="btn" onclick="addRow()" type="button">Add Row</button>
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong class="text-dark">Total</strong>
                                                </td>
                                                <td class="right">
                                                    <input type="number" name="grand_total" id="mainTotal" class="form-control" readonly value="{{ $invoices->grand_total}}">
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script type="text/javascript">
            let dropdownVisible = false;

            function toggleDropdown(show) {
                if (show) {
                    $('#dropdownMenu').show();  // Show dropdown on input focus
                } else {
                    setTimeout(function() {
                        if (!dropdownVisible) {
                            $('#dropdownMenu').hide();  // Hide dropdown if nothing was clicked
                        }
                    }, 150); // Delay for blur event to allow time for item click
                }
            }

            function selectCustomer(customerId) {
                $.ajax({
                    url: '/accounts-receivable/invoice/' + customerId,  // Fetch customer details via AJAX
                    type: 'GET',
                    success: function(data) {
                        $('#dropdownInput').val(data.full_name); // Set customer name in input field
                        $('#accounts_id').val(data.id);
                        $('#full_name').text(data.full_name)
                        $('#customer_email').text(data.email); // Fill email
                        $('#customer_contact_no').text(data.contact_no); // Fill phone
                        $('#customer_address').text(data.address); // Fill address
                        $('#dropdownMenu').hide(); // Hide dropdown after selection
                    }
                });
            }
        </script>

</x-app-layout>

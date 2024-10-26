<x-app-layout>
    <x-slot:header>
        Accounts Payable
    </x-slot:header>

        <form action="#" method="POST">
            @csrf
            <div class="modal fade" id="accountsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="exampleModalLabel">Create new account</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <label for="full_name">Fullname</label>
                            <input type="text" class="form-control form-control-md"  name="full_name">
                            <x-error name="full_name"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_no">Contact No</label>
                            <input type="text" class="form-control" id="contact_no" name="contact_no" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create account</button>
                    </div>
                  </div>
                </div>
              </div>
        </form>

        <form action="#" method="POST">
            @csrf
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
                                    <h3 class="text-dark mb-1" id="full_name"></h3>
                                    <div id="customer_address"></div>
                                    <div id="customer_email"></div>
                                    <div id="customer_contact_no"></div>
                                </div>
                            </div>
                            <div class="row mb-4 p-0">
                                <div class="col-xl">
                                    <h6 class="mb-2">Add Client/Vendor</h6>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-xl-6 mb-2 pr-2">
                                            <label class="label1" for="customerSelect">Vendor</label>
                                            <div class="dropdown">
                                                <input type="text" name="customer" class="form-control" id="dropdownInput" onfocus="toggleDropdown(true)" onblur="toggleDropdown(false)" autocomplete="off" value="{{ old('customer')}}">
                                                <div class="dropdown-menu m-0" id="dropdownMenu" style="width: 100%;">
                                                    <!-- Modal trigger -->
                                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#accountsModal" >Create New Vendor</a>
                                                    <!-- Dynamically populated customer options -->
                                                    {{-- @foreach($customers as $customer)
                                                        <span class="dropdown-item" onclick="selectCustomer({{ $customer->id }})">{{ $customer->full_name }}</span>
                                                    @endforeach --}}
                                                </div>
                                            </div>
                                            <x-error name="customer"/>
                                        </div>
                                        <div class="col-sm-1 mb-2 px-0">
                                            <label class="label1 ml-2" for="account_id">ID</label>
                                            <input type="text" class="form-control px-3" id="accounts_id" name="accounts_id" readonly>
                                            <x-error name="account_id"/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label class="label1" for="status">Status</label>
                                            <select class="form-control form-control-md" id="invoice_no" name="status" readonly>
                                                <option value="Pending">Open</option>
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
                                            <th></th>
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
                                        <tr>
                                            <td class="center"><input type="text" name="services[0][id]" id="serviceId" class="form-control" value="1" readonly></td>
                                            <td class="left"><input type="text" name="services[0][description]" id="description" class="form-control">
                                                <x-error name="services[][description]"/></td>
                                            <td class="right"><input type="text" name="services[0][amount]" id="amount" class="form-control amount" oninput="calculateResult()">
                                                <x-error name="services[0][amount]"/></td>
                                            <td class="center"><input type="number" name="services[0][quantity]" id="qty" class="form-control quantity" value="1" oninput="calculateResult()">
                                                <x-error name="services[0][quantity]"/></td>
                                            <td class="right"><input type="text" name="services[0][total]" id="total" class="form-control total" readonly></td>
                                            <td class="right"><button type="button" onclick="deleteRow(this)"><i class="fa-solid fa-trash"></i></button></td>

                                        </tr>
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
                                        <a href="/accounts-payable" class="btn btn-light ml-2">Cancel</a>
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

            function remove(){}
        </script>



</x-app-layout>

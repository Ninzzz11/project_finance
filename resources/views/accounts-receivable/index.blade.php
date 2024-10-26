<x-app-layout>
    <x-slot:header>
        Accounts Receivable
    </x-slot:header>

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

            <div class="col-xl mb-5 p-0">
                <div class="pills-regular">
                    <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="home" aria-selected="true">Accounts Receivable</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-invoices" role="tab" aria-controls="profile" aria-selected="false">Invoices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-extra" role="tab" aria-controls="contact" aria-selected="false">Manage Accounts</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">

                        {{-- INVOICE AND ACCOUNTS INFORMATION --}}
                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="col-xl-12 p-0">
                                <div class="col-xl p-0 d-flex justify-content-end align-items-center ">
                                    <div class="search-holder mr-3">
                                        <i class="fas fa-search"></i>
                                        <input type="search" class="form-control p-2 px-5" placeholder="Search...">
                                    </div>
                                </div>
                                <div class="card p-0 my-3">
                                    <div class="card-body p-0">

                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>
                                                            <label class="custom-control custom-checkbox be-select-all">
                                                                <input class="custom-control-input chk_all" type="checkbox" name="chk_all"><span class="custom-control-label"></span>
                                                            </label>
                                                        </th> --}}
                                                        <th>#</th>
                                                        <th>CUSTOMER</th>
                                                        <th>CONTACT</th>
                                                        <th>EMAIL</th>
                                                        <th>AMOUNT</th>
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ( $clients as $client )
                                                    <tr>
                                                        {{-- <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one"><span class="custom-control-label"></span>
                                                            </label>
                                                        </td> --}}
                                                        <td>{{ $client->id }}</td>
                                                        <td>{{ $client->account->full_name }}</td>
                                                        <td>{{ $client->account->contact_no}}</td>
                                                        <td>{{ $client->account->email}}</td>
                                                        <td>₱ {{ $client->grand_total }}</td>
                                                        <td>{{ $client->status}}</td>
                                                        <td>
                                                            {{-- anchor tag --}}
                                                            <a href="/accounts-receivable/{{ $client->id }}" class="a-underline">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xl-12">
                                            {{ $clients->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- INVOICE SECTION --}}
                        <div class="tab-pane fade" id="pills-invoices" role="tabpanel" aria-labelledby="pills-invoice-tab">
                            <div class="col-xl-12 p-0">
                                <div class="col-xl p-0 d-flex justify-content-end align-items-center ">
                                    <div class="search-holder mr-3">
                                        <i class="fas fa-search"></i>
                                        <input type="search" class="form-control p-2 px-5" placeholder="Search...">
                                    </div>
                                    <div class="create-button">
                                        <a href="/accounts-receivable/invoice" class="btn btn-primary1">Create new</a>
                                    </div>
                                </div>
                                <div class="card p-0 my-3">
                                    <div class="card-body p-0">

                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>
                                                            <label class="custom-control custom-checkbox be-select-all">
                                                                <input class="custom-control-input chk_all" type="checkbox" name="chk_all"><span class="custom-control-label"></span>
                                                            </label>
                                                        </th> --}}
                                                        <th>#</th>
                                                        <th>CUSTOMER</th>
                                                        <th>DESCRIPTION</th>
                                                        <th>TERMS</th>
                                                        <th>AMOUNT</th>
                                                        <th>DATE</th>
                                                        <th>DUE DATE</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $clients as $client )
                                                    <tr>
                                                        {{-- <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one"><span class="custom-control-label"></span>
                                                            </label>
                                                        </td> --}}
                                                        <td>{{ $client->id }}</td>
                                                        <td>{{ $client->account->full_name }}</td>
                                                        <td>
                                                            {{ $client->services->pluck('description')->implode(', ')}}
                                                        </td>
                                                        <td>{{ $client->terms }}</td>
                                                        <td>₱ {{ $client->grand_total }}</td>
                                                        <td>{{ $client->start_date }}</td>
                                                        <td>{{ $client->due_date }}</td>
                                                        <td>
                                                            {{-- anchor tag --}}
                                                            <a href="/accounts-receivable/{{ $client->id }}" class="a-underline">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            {{ $clients->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ============================================================== -->
                        <!--  END SECOND TAB  -->
                        <!-- ============================================================== -->


                        {{-- MODAL FOR CREATE ACCOUNT --}}
                        <form action="{{ route('ar.accounts') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="modal fade" id="accountsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">Add Account</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" class="form-control form-control-md" name="full_name" required>
                                            <x-error name="full_name"/>
                                            <div class="invalid-feedback">
                                                Please provide a full name.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" required>
                                            <x-error name="email"/>
                                            <div class="invalid-feedback">
                                                Please provide a email.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_no">Contact No</label>
                                            <input type="text" class="form-control" id="contact_no" name="contact_no" required>
                                            <x-error name="contact_no"/>

                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                                            <x-error name="address"/>
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


                        {{-- DELETE THE ACCOUNT --}}
                        <form id="deleteForm" action="" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>

                        {{-- MANAGE CUSTOMER --}}
                        <div class="tab-pane fade" id="pills-extra" role="tabpanel" aria-labelledby="pills-extra-tab">
                            <div class="col-xl-12 p-0">
                                <div class="col-xl p-0 d-flex justify-content-end align-items-center ">
                                    <div class="create-button">
                                        <button class="btn btn-primary1" type="button" data-toggle="modal" data-target="#accountsModal" >Add Customer</button>
                                    </div>
                                </div>
                                <div class="card p-0 my-3">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>
                                                            <label class="custom-control custom-checkbox be-select-all">
                                                                <input class="custom-control-input chk_all" type="checkbox" name="chk_all"><span class="custom-control-label"></span>
                                                            </label>
                                                        </th> --}}
                                                        <th>ID</th>
                                                        <th>CUSTOMER</th>
                                                        <th>CONTACT</th>
                                                        <th>EMAIL</th>
                                                        <th>ADDRESS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $accounts as $account )
                                                    <tr>
                                                        {{-- <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one"><span class="custom-control-label"></span>
                                                            </label>
                                                        </td> --}}
                                                        <td>{{ $account->id }}</td>
                                                        <td>{{ $account->full_name }}</td>
                                                        <td>{{ $account->contact_no }}</td>
                                                        <td>{{ $account->email }}</td>
                                                        <td>{{ $account->address }}</td>
                                                        <td>
                                                            {{-- anchor tag --}}
                                                            <a href="accounts-receivable/account/{{ $account->id}}" class="a-underline">View</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            {{ $clients->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


</x-app-layout>

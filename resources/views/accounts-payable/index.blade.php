<x-app-layout>
    <x-slot:header>
        Accounts Payable
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
                            <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="home" aria-selected="true">Accounts Payable</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-invoices" role="tab" aria-controls="profile" aria-selected="false">Clients/Vendors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-extra" role="tab" aria-controls="contact" aria-selected="false">Extra</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="col-xl-12 p-0">
                                <div class="col-xl p-0 d-flex justify-content-end align-items-center ">
                                    <div class="search-holder mr-3">
                                        <i class="fas fa-search"></i>
                                        <input type="search" class="form-control p-2 px-5" placeholder="Search...">
                                    </div>
                                    <div class="create-button">
                                        <a href="/accounts-payable/invoice" class="btn btn-primary1">Create new</a>
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
                                                        <th>DATE</th>
                                                        <th>INVOICE NO.</th>
                                                        <th>CLIENT/VENDOR</th>
                                                        <th>DESCRIPTION</th>
                                                        <th>TERMS</th>
                                                        <th>AMOUNT</th>
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- BODY --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="pills-invoices" role="tabpanel" aria-labelledby="pills-invoice-tab">
                            HELLO
                        </div>
                        <div class="tab-pane fade" id="pills-extra" role="tabpanel" aria-labelledby="pills-extra-tab">
                            <p>Extra Tab</p>
                        </div>
                    </div>
                </div>
            </div>

    <script src="{{ asset('assets/libs/js/invoice_create.js')}}"></script>

</x-app-layout>

<x-app-layout>
    <x-slot:header>
        Accounts Payable
    </x-slot:header>
    <div class="col-xl p-0 m-0">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title border-bottom pb-2">INVOICE</h3>
                    <div class="col-xl p-0 d-flex flex-row-reverse">
                        <a href="/accounts-receivable/invoice" class="btn btn-primary1">Create new</a>
                    </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
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
                                            <th>DESCRIPTION</th>
                                            <th>VENDOR</th>
                                            <th>AMOUNT</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                {{-- {{ $clients->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>

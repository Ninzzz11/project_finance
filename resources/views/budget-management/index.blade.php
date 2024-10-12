<x-app-layout>
    <x-slot:header>
        Budget Management
    </x-slot:header>

        <div class="col-xl p-0 m-0">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title border-bottom pb-2">BUDGET MANAGEMENT</h3>
                    <a href="#" class="btn btn-primary1">Create new</a>
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
                                                <th>Date</th>
                                                <th>Department</th>
                                                <th>Purpose</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th>File</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                {{-- <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkboxes" type="checkbox" value="1" id="one"><span class="custom-control-label"></span>
                                                    </label>
                                                </td> --}}
                                                <td>03-24-22</td>
                                                <td>Core1</td>
                                                <td>payroll</td
                                                <td></td>
                                                <td>Budget</td>
                                                <td>6.000</td>
                                                <td></td>
                                                <td></td>
                                                <td><button>View</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>

<x-app-layout>
    <x-slot:head>
        Collection
    </x-slot:head>
    <x-slot:header>
        Collection
        @if ( Request::is('collection/payment-collection'))
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Payment Collection</a></li>
        @endif
    </x-slot:header>

    <div class="col-xl-12 p-0">
        <div class="card border-3 border-top border-top-primary mb-2">
            <div class="card-header">
                <h5 class="mb-0">Data Tables - Print, Excel, CSV, PDF Buttons</h5>
                <p>This example shows DataTables and the Buttons extension being used with the Bootstrap 4 framework providing the styling.</p>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>Receipt ID</th>
                                <th>Customer Name</th>
                                <th>Invoice No.</th>
                                <th>Due Date</th>
                                <th>Amount Paid</th>
                                <th>Payment Method</th>
                                <th>Payment Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>RC-1001</td>
                                <td>ABC Corp</td>
                                <td>INV-2024-002</td>
                                <td>2024-02-15</td>
                                <td>$600.00</td>
                                <td>Bank Transfer</td>
                                <td>2024-02-12</td>
                                <td class="text-center">
                                    <button class="btn btn-primary py-0 px-3 b-0">Collect</button>
                                </td>
                            </tr>
                            <tr>
                                <td>RC-1001</td>
                                <td>ABC Corp</td>
                                <td>INV-2024-002</td>
                                <td>2024-02-15</td>
                                <td>$600.00</td>
                                <td>Bank Transfer</td>
                                <td>2024-02-12</td>
                                <td>
                                    <button class="btn btn-primary py-0 px-3 b-0">Collect</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>

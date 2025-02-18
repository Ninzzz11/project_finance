<x-app-layout>
    <x-slot:head>
        Collection
    </x-slot:head>
    <x-slot:header>
        Collection
        @if ( Request::is('collection/payment-records'))
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Payment Reminder</a></li>
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
                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                        <thead>
                            <tr>
                                <th>Payment ID</th>
                                <th>Customer</th>
                                <th>Invoice No.</th>
                                <th>Due Date</th>
                                <th>Amount Paid</th>
                                <th>Payment Method</th>
                                <th>Payment Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PAY-1001</td>
                                <td>John Doe</td>
                                <td>INV-2024-001</td>
                                <td>2024-02-10</td>
                                <td>$500.00</td>
                                <td>Credit Card</td>
                                <td>2024-02-08</td>
                                <td>Paid</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

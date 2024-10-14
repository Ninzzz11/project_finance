<x-app-layout>
    <x-slot:header>
        Accounts Receivable
    </x-slot:header>

    <div class="col-xl p-0 m-0">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title border-bottom pb-2">INVOICE</h3>
                <a href="/accounts-receivable/invoice" class="btn btn-primary1">Create new</a>
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
                                            <th>CUSTOMER</th>
                                            <th>PAYMENT TERMS</th>
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
                                            <td>{{ $client->start_date }}</td>
                                            <td>{{ $client->invoice_no }}</td>
                                            <td>{{ $client->customer }}</td>
                                            <td>{{ $client->terms }}</td>
                                            <td>₱ {{ $client->grand_total }}</td>
                                            <td>Due on {{ $client->due_date }}</td>
                                            <td>Remind Costumer</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- SELECT ALL CHECKBOX --}}
    <script>
        $(document).ready(function() {

            // binding the check all box to onClick event
            $(".chk_all").click(function() {

                var checkAll = $(".chk_all").prop('checked');
                if (checkAll) {
                    $(".checkboxes").prop("checked", true);
                } else {
                    $(".checkboxes").prop("checked", false);
                }

            });

            // if all checkboxes are selected, then checked the main checkbox class and vise versa
            $(".checkboxes").click(function() {

                if ($(".checkboxes").length == $(".subscheked:checked").length) {
                    $(".chk_all").attr("checked", "checked");
                } else {
                    $(".chk_all").removeAttr("checked");
                }

            });

        });

    </script>

</x-app-layout>

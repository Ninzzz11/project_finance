<x-app-layout>
    <x-slot:header>
        Accounts Receivable
    </x-slot:header>

    <div class="col-xl p-0 m-0">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title border-bottom pb-2">INVOICE</h3>
                <a href="/accounts-receivable/create" class="btn btn-primary1">Create new</a>
                <x-table-layout/>
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

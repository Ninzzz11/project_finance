<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Dropdown with Input</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #printableDiv {
            padding: 20px;
            border: 1px solid #ccc;
            margin: 20px;
        }
        .dropdown-menu {
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="dropdown">
            <input type="text" class="form-control" id="dropdownInput" placeholder="Type to search..." onfocus="toggleDropdown(true)" onblur="toggleDropdown(false)" autocomplete="off">
            <div class="dropdown-menu" id="dropdownMenu">
                <span class="dropdown-item" onclick="selectItem(this)">John Doe</span>
                <span class="dropdown-item" onclick="selectItem(this)">Jane Smith</span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="https://example.com/create-customer">Create New Customer</a>
            </div>
        </div>
    </div>

    <div id="printableDiv">
        <h1>Printable Content</h1>
        <p>This content will be printed.</p>
    </div>
    <button onclick="printDiv()">Print</button>

    <div class="row">
        <form action="/file-upload" class="dropzone" id="my-awesome-dropzone">

        </form>
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

    <script>
        function printDiv() {
            const printContents = document.getElementById('printableDiv').innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>


    <script>
        const input = document.getElementById('dropdownInput');
        const menu = document.getElementById('dropdownMenu');

        input.addEventListener('input', function() {
            const filter = input.value.toUpperCase();
            const items = menu.getElementsByClassName('dropdown-item');

            Array.from(items).forEach(item => {
                if (item.innerText.toUpperCase().indexOf(filter) > -1 || item.tagName === 'A') {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        function toggleDropdown(show) {
            if (show) {
                menu.classList.add('show');
            } else {
                setTimeout(() => menu.classList.remove('show'), 200);
            }
        }

        function selectItem(item) {
            input.value = item.innerText;
            menu.classList.remove('show');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

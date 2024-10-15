<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Dropdown with Input</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
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

// // TABLE SECTION

function addRow() {
    // Get the table body where the rows are added
    let tableBody = document.getElementById('servicesTableBody');

    // Get the current number of rows to set the new index
    let rowCount = tableBody.getElementsByTagName('tr').length;

    // Create a new row element
    let newRow = document.createElement('tr');

    // Define the new HTML for the new row, using the incremented rowCount as the index
    newRow.innerHTML = `
        <td class="center">
            <input type="text" name="services[${rowCount}][id]" class="form-control" value="${rowCount + 1}" readonly>
        </td>
        <td class="left">
            <input type="text" name="services[${rowCount}][description]" class="form-control" autocomplete="off" required>
            <x-error name="services.${rowCount}.description"/>
        </td>
        <td class="right">
            <input type="text" name="services[${rowCount}][amount]" id="amount" class="form-control amount" oninput="calculateResult()" autocomplete="off" required>
            <x-error name="services.${rowCount}.amount"/>
        </td>
        <td class="center">
            <input type="number" name="services[${rowCount}][quantity]" id="qty" class="form-control quantity" value="1" oninput="calculateResult()" min="1" autocomplete="off" required>
        </td>
        <td class="right">
            <input type="text" name="services[${rowCount}][total]" id="total" class="form-control total" readonly>
        </td>
    `;

    // Append the new row to the table body
    tableBody.appendChild(newRow);
}

// AUTO CALCULATIONS
function calculateResult() {
let rows = document.querySelectorAll('#servicesTableBody tr');
let mainTotal = 0;


rows.forEach(function(row){
    let amount = parseFloat(row.querySelector('.amount').value) || 0;
    let quantity = parseFloat(row.querySelector('.quantity').value) || 0;

    let result = amount * quantity;

    row.querySelector('.total').value = result.toFixed(2);

    mainTotal += result;
});


document.getElementById('mainTotal').value = mainTotal.toFixed(2);

}


// DUE DATE CALCULATOR

function calculateDueDate() {
    const startDateInput = document.getElementById('startDate');
    const dueDateInput = document.getElementById('dueDate');
    const daysSelect = document.getElementById('daysSelect');

    const startDate = new Date(startDateInput.value);
    const daysToAdd = parseInt(daysSelect.value);

    if (!isNaN(startDate.getTime()) && !isNaN(daysToAdd)) {
        const dueDate = new Date(startDate);
        dueDate.setDate(dueDate.getDate() + daysToAdd);

        const formattedDate = dueDate.toISOString().split('T')[0];
        dueDateInput.value = formattedDate;
    }
}

// NAME DROP DOWN
// const input = document.getElementById('dropdownInput');
// const menu = document.getElementById('dropdownMenu');

// input.addEventListener('input', function() {
//     const filter = input.value.toUpperCase();
//     const items = menu.getElementsByClassName('dropdown-item');

//     Array.from(items).forEach(item => {
//         if (item.innerText.toUpperCase().indexOf(filter) > -1 || item.tagName === 'A') {
//             item.style.display = '';
//         } else {
//             item.style.display = 'none';
//         }
//     });
// });

// function toggleDropdown(show) {
//     if (show) {
//         menu.classList.add('show');
//     } else {
//         setTimeout(() => menu.classList.remove('show'), 200);
//     }
// }

// function selectItem(item) {
//     input.value = item.innerText;
//     menu.classList.remove('show');
// }

// ALERT DISPLAY
function disposeAlert() {
    const alert = document.getElementById('message');
    alert.classList.remove('show'); // Bootstrap class to fade out
    alert.classList.add('fade'); // Ensure fade out transition
    setTimeout(() => {
        alert.remove();
    }, 150); // Timeout to allow fade out transition
}

// MODAL VALIDATION
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

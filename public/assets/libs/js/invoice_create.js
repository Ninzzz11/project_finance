// // TABLE SECTION

// let rowCount = 0; // Counter for row IDs

// function makeEditable(td) {
//     if (td.querySelector('input')) return; // Prevent duplicate inputs
//     const originalText = td.textContent;
//     const input = document.createElement('input');
//     input.value = originalText;
//     // input.placeholder = 'Enter value';
//     // input.classList.add('form-control');
//     input.className = 'form-control form-control-sm w-50 m-0';
//     input.onblur = function() {
//         td.textContent = input.value;
//     };
//     td.textContent = '';
//     td.appendChild(input);
//     input.focus();
// }

// function addRow() {
//     const tableBody = document.getElementById('tableBody');
//     const newRow = tableBody.insertRow();

//     for (let i = 0; i < 6; i++) {
//         const newCell = newRow.insertCell(i);
//         newCell.textContent = '';
//         if (i === 0) {
//             newCell.id = `row-${++rowCount}`;
//             newCell.textContent = `${rowCount}`;
//         }
//         newCell.onclick = function() {
//             makeEditable(newCell);
//         };
//     }
// }

// window.onload = function() {
//     const tableBody = document.getElementById('tableBody');
//     for (let i = 0; i < tableBody.rows.length; i++) {
//         tableBody.rows[i].cells[0].id = `row-${++rowCount}`;
//     }
// }

// AUTO CALCULATIONS
function calculateResult() {
const amount = parseFloat(document.getElementById('amount').value) || 0;
const qty = parseFloat(document.getElementById('qty').value) || 0;
const amount1 = parseFloat(document.getElementById('amount1').value) || 0;
const qty1 = parseFloat(document.getElementById('qty1').value) || 0;

const result = amount * qty;
const result1 = amount1 * qty1;
const mainTotal = result + result1;

document.getElementById('total').value = result.toFixed(2);
document.getElementById('total1').value = result1.toFixed(2);

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

// ALERT DISPLAY
function disposeAlert() {
    const alert = document.getElementById('message');
    alert.classList.remove('show'); // Bootstrap class to fade out
    alert.classList.add('fade'); // Ensure fade out transition
    setTimeout(() => {
        alert.remove();
    }, 150); // Timeout to allow fade out transition
}

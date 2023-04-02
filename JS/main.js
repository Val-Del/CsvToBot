const tableSelects = document.querySelectorAll("._to_table");

tableSelects.forEach(tableSelect => {
  const columnSelect = tableSelect.parentElement.nextElementSibling.querySelector('select');

  updateColumnSelectOptions(tableSelect.value, columnSelect);

  tableSelect.addEventListener("change", () => {
    updateColumnSelectOptions(tableSelect.value, columnSelect);
  });
});

function updateColumnSelectOptions(selectedTable, columnSelect) {
  const options = columnSelect.querySelectorAll('option');
  options.forEach(option => {
    if (option.getAttribute('data-table') === selectedTable || option.getAttribute('data-table') === 'none') {
      option.classList.remove('hide');
    } else {
      option.classList.add('hide');
    }
  });
}



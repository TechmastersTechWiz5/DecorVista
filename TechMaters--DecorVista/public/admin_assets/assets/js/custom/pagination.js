// resources/js/pagination.js

$(document).ready(function() {
  function initializeDataTable(tableSelector, ajaxUrl, columnDefs) {
      $(tableSelector).DataTable({
          processing: true,
          serverSide: true,
          ajax: ajaxUrl,
          responsive: true,
          pageLength: 10, // Set number of entries per page
          columns: columnDefs,
          // Default DataTables pagination
      });
  }

  // Expose the function to the global scope
  window.initializeDataTable = initializeDataTable;
});



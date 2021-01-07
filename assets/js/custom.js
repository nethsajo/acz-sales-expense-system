/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */

function implement_employee_datatable() {
    $('#show-employee-table').DataTable({
        autoWidth: false,
        responsive: true,
        columnDefs: [{ 
            orderable: false,
            width: '30px',
            targets: [ 5, 6, 7]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search:</span> _INPUT_',
            searchPlaceholder: 'Search...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        }
    });
}

function implement_bank_datatable() {
    $('#show-banks-table').DataTable({
        autoWidth: false,
        responsive: true,
        columnDefs: [{ 
            orderable: false,
            width: '80px',
            targets: [ 0, 2, 3 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search:</span> _INPUT_',
            searchPlaceholder: 'Search...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        }
    });
}

function implement_expense_category_datatable() {
    $('#show-expense-category-table').DataTable({
        autoWidth: false,
        responsive: true,
        columnDefs: [{ 
            orderable: false,
            width: '80px',
            targets: [ 0, 2, 3 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search:</span> _INPUT_',
            searchPlaceholder: 'Search...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        }
    });
}

function implement_payee_datatable() {
    $('#show-expense-payee-table').DataTable({
        autoWidth: false,
        responsive: true,
        columnDefs: [{ 
            orderable: false,
            width: '80px',
            targets: [ 0, 2, 3 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search:</span> _INPUT_',
            searchPlaceholder: 'Search...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        }
    });
}

function implement_logs_datatable() {
    $('#show-logs-table').DataTable({
        autoWidth: false,
        responsive: true,
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
        }
    });
}

function implement_expense_datatable() {
    $('#show-expense-transactions-table').DataTable({
        autoWidth: false,
        columnDefs: [{ 
            orderable: false,
            targets: [0, 1, 2, 6, 7, 8, 9, 11, 12, 13, 14, 15, 16, 17, 18, 19, 21, 22, 23, 24]
        }],
        scrollX: true,
        scrollY: '400px',
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 3,
            rightColumns: 3
        },
        dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        }
    });
}

function implement_cm_table() {
    var table = $('#show-cm-table').DataTable({
        autoWidth: false,
        responsive: true,
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
        }
    });

    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#from').datepicker("getDate");
            var max = $('#to').datepicker("getDate");
            var startDate = new Date(data[0]);
            if (min == null && max == null) return true;
            if (min == null && startDate <= max) return true;
            if (max == null && startDate >= min) return true;
            if (startDate <= max && startDate >= min) return true;
            return false;
        }
    );

    $('#from').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
    $('#to').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });

    // Event listener to the two range filtering inputs to redraw on input
    $('#from, #to').change(function () {
        table.draw();
    });
}

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
        ordering: false,
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

function implement_cm_datatable() {
    $('#show-cm-table').DataTable({
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

function implement_emr_datatable() {
    $('#show-emr-table').DataTable({
        autoWidth: false,
        ordering: false,
        scrollX: true,
        scrollY: '400px',
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 3,
        },
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
        }
    });
}

function implement_sales_datatable() {
    $('#show-sales-table').DataTable({
        autoWidth: false,
        ordering: false,
        scrollX: true,
        scrollY: '450px',
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 4,
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

function implement_employee_sales_datatable() {
    $('#show-employee-sales-table').DataTable({
        autoWidth: false,
        ordering: false,
        scrollX: true,
        scrollY: '450px',
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 4,
            rightColumns: 2
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

function implement_payment_datatable() {
    $('#show-payment-table').DataTable({
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
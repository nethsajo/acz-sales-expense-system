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
        ordering: false,
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
        ordering: false,
        columnDefs: [{ 
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
        ordering: false,
        columnDefs: [{ 
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
        ordering: false,
        columnDefs: [{ 
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

function implement_media_datatable() {
    $('#show-media-table').DataTable({
        autoWidth: false,
        responsive: true,
        ordering: false,
        columnDefs: [{ 
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
        ordering: false,
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
        ordering: false,
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
        ordering: false,
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
        }
    });
}

function implement_soa_datatable() {
    $('#show-soa-table').DataTable({
        autoWidth: false,
        ordering: false,
        scrollX: true,
        scrollY: '350px',
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 4
        },
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
        }
    });
}

function implement_sales_report_datatable() {
    $('#show-sales_report-table').DataTable({
        autoWidth: false,
        responsive: true,
        ordering: false,
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Search</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
        }
    });
}

function implement_sales_daterange() {
    $('#sales_daterange').daterangepicker({
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2020',
        dateLimit: { days: 60 },
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'This Year': [moment().startOf('year'), moment().endOf('year')],
            'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
        },
        opens: 'right',
        drops: 'auto',
        applyClass: 'btn-sm bg-green',
        cancelClass: 'btn-sm btn-light'
    },
        function(start, end) {
            $('#sales_daterange span').html(start.format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + end.format('MMMM D, YYYY'));
        }
    );

    $('#sales_daterange').on('apply.daterangepicker', function(ev, picker) {
        $('input#start_date').val(picker.startDate.format('YYYY-MM-DD'));
        $('input#end_date').val(picker.endDate.format('YYYY-MM-DD'));
    });

    // Display date format
    $('#sales_daterange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + moment().format('MMMM D, YYYY'));
}

function implement_soa_datarange() {
    $('#soa_daterange').daterangepicker({
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2020',
        dateLimit: { days: 60 },
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'This Year': [moment().startOf('year'), moment().endOf('year')],
            'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
        },
        opens: 'right',
        drops: 'auto',
        applyClass: 'btn-sm bg-green',
        cancelClass: 'btn-sm btn-light'
    },
        function(start, end) {
            $('#soa_daterange span').html(start.format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + end.format('MMMM D, YYYY'));
        }
    );

    $('#soa_daterange').on('apply.daterangepicker', function(ev, picker) {
        $('input#from_soa').val(picker.startDate.format('YYYY-MM-DD'));
        $('input#to_soa').val(picker.endDate.format('YYYY-MM-DD'));
    });

    // Display date format
    $('#soa_daterange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + moment().format('MMMM D, YYYY'));
}

function implement_monitoring_daterange() {
    $('#monitoring_daterange').daterangepicker({
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2020',
        dateLimit: { days: 60 },
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'This Year': [moment().startOf('year'), moment().endOf('year')],
            'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
        },
        opens: 'right',
        drops: 'auto',
        applyClass: 'btn-sm bg-green',
        cancelClass: 'btn-sm btn-light'
    },
        function(start, end) {
            $('#monitoring_daterange span').html(start.format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + end.format('MMMM D, YYYY'));
        }
    );

    $('#monitoring_daterange').on('apply.daterangepicker', function(ev, picker) {
        $('input#from').val(picker.startDate.format('YYYY-MM-DD'));
        $('input#to').val(picker.endDate.format('YYYY-MM-DD'));
    });

    // Display date format
    $('#monitoring_daterange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + moment().format('MMMM D, YYYY'));
}

function implement_expense_daterange() {
    $('#expense_daterange').daterangepicker({
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2020',
        dateLimit: { days: 60 },
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'This Year': [moment().startOf('year'), moment().endOf('year')],
            'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
        },
        opens: 'right',
        drops: 'auto',
        applyClass: 'btn-sm bg-green',
        cancelClass: 'btn-sm btn-light'
    },
        function(start, end) {
            $('#expense_daterange span').html(start.format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + end.format('MMMM D, YYYY'));
        }
    );

    $('#expense_daterange').on('apply.daterangepicker', function(ev, picker) {
        $('input#expense_start_date').val(picker.startDate.format('YYYY-MM-DD'));
        $('input#expense_end_date').val(picker.endDate.format('YYYY-MM-DD'));
    });

    // Display date format
    $('#expense_daterange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' &nbsp; - &nbsp; ' + moment().format('MMMM D, YYYY'));
}
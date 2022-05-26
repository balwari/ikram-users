@push('styles')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.4/css/fixedColumns.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css"/>
@endpush
@push('scripts')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.4/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.12/sorting/datetime-moment.js"></script>

<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>

<script>
    $(document).ready(function () {
        $.fn.dataTable.moment('MM-DD-YYYY');
        $('#table').DataTable();
        $('#tables').DataTable();
        $('#table_team').DataTable();
        $('#table_timesheet').dataTable();
        $('#table-admin').dataTable();

    $('#table_project').dataTable( {
        stateSave: true,
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 5 ] }
        ]
    });

    $('#table-delegate').dataTable({
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 4,5 ] }
        ]
    });

    $('#table_paysheet_editors').dataTable({
        "aoColumnDefs": [
           { "bSortable": false, "aTargets": [1] }
       ],
        "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "pageLength": 25
    });
        
     var table_paysheets = $('#table_paysheets').DataTable( { 
        "aoColumnDefs": [
            { "width": "150", "aTargets": 3 },
            { "width": "70", "aTargets": 6 },
            { "width": "100", "aTargets": 7 },
            { "width": "100", "aTargets": 8 },
            { "width": "100", "aTargets": 9 },
            { "width": "100", "aTargets": 10 },
            { "width": "100", "aTargets": 11 },
            { "width": "150", "aTargets": 17 },
            { "bSortable": false, "aTargets": [ 1,18 ] }
        ],
        buttons : ['colvis'],
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:   {
            leftColumns: 2
        },
    } );

    table_paysheets.buttons().container().appendTo( '#table_paysheets_wrapper .col-md-6:eq(0)' );
     
    var table_ot_paysheets = $('#table_ot_paysheets').DataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 1,18 ] }
        ],
        // scrollX:        true,
        // scrollCollapse: true,
        // fixedColumns:   {
        //     leftColumns: 3
        // },
    } );

    $('#table_employees').dataTable( {
        "aoColumnDefs": [
                { "bSortable": false, "aTargets": [ 4 ] }
        ],
        "iDisplayLength": 7,
        "aLengthMenu": [
            [7, 25, 50, 100, -1], [7, 25, 50, 100, "All"]
            ]
    });

    $('#table_task').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 5 ] }
        ]
    });

    $('#table_time').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [5] }
        ],
        "order": [[ 0, "desc" ]]
    });

    $('#table_employee_timesheet').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [5] }
        ]
    });

    $('#tables_project_timesheet').dataTable( {
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [5] }
        ]
    });

   $('#table_users').dataTable( {
       "aoColumnDefs": [
           { "bSortable": false, "aTargets": [4] }
       ]
   });

   $('#table_delegation').dataTable( {
       "aoColumnDefs": [
           { "bSortable": false, "aTargets": [5] }
       ],
   });

   $('#table_delegation2').dataTable( {
       "aoColumnDefs": [
           { "bSortable": false, "aTargets": [5] }
       ],
   });

   $('#table_sms_report').dataTable({
        stateSave: true,
        "aoColumnDefs": [
           { "bSortable": false, "aTargets": [] }
       ],
        "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "pageLength": 25
    });
  
//    $('#table-projects').dataTable( {
//     rowReorder: {
//             selector: 'td:nth-child(2)'
//         },
//         responsive: true
//    });

});

</script>
@endpush

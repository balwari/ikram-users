
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css"/>
<!-- CHAYCE -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">


@endpush

@push('scripts')

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
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
<!-- CHAYCE ADDED FOR RESPONSIVENESS -->
<script src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

<!-- Rakesh ADDED FOR Timekeeper Reports: Export Functionality -->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
<script>
$(document).ready(function() {
    $.fn.dataTable.moment('MM-DD-YYYY');
    let table = $('#example').DataTable( {
        lengthChange: true,
        buttons: ['excel', 'pdf', 'colvis' ]
    } );
    
    let tableemployee = $('#table-employee').DataTable( {
        lengthChange: true,
        buttons: ['excel', 'pdf', 'colvis' ]
    } );
    tableemployee.buttons().container()
        .appendTo( '#table-employee_wrapper .col-md-6:eq(0)' );

    let fulldump = $('#table-fulldump').DataTable( {
        lengthChange: true,
        "order": [[ 5, "desc" ]],
        buttons: [{
                    extend: 'excel',
                    autoFilter: true,
                    title: 'Consolidated Report',
                    excelStyles: [ 
                        {                      
                        cells: "1",                         // to row 1
                            style: {                        // The style block
                                font: {                     // Style the font
                                    name: "Calibri",          // Font name
                                    size: "18",             // Font size
                                    color: "000000",        // Font Color
                                    b: true,               // Remove bolding from header row
                                },
                                fill: {                     // Style the cell fill (background)
                                    pattern: {              // Type of fill (pattern or gradient)
                                        color: "0066FF",    // Fill color
                                    }
                                }
                            }
                        },
                        {
                        cells: "A2:L2",                         // to row 2
                            style: {                        
                                font: {                     
                                    name: "Calibri",         
                                    size: "12",            
                                    color: "000000",        
                                    b: true,               
                                },
                                fill: {                     
                                    pattern: {              
                                        color: "4DC74F",    
                                    }
                                }
                            }
                        }
                    ],
                }, 
                {
                    extend: 'pdf',
                    title: 'Consolidated Report',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                }, 'colvis' ]
                // ,
                // rowReorder: {
                //     selector: 'td:nth-child(2)'
                // },
                // responsive: true             
    } );

    fulldump.buttons().container()
        .appendTo( '#table-fulldump_wrapper .col-md-6:eq(0)' );

    let daily = $('#daily').DataTable( {
        lengthChange: true,
        buttons: ['excel', 'pdf', 'colvis' ]
    } );
    daily.buttons().container()
        .appendTo( '#daily_wrapper .col-md-6:eq(0)' );

    let weekly = $('#weekly').DataTable( {
        lengthChange: true,
        buttons: ['excel', 'pdf', 'colvis' ]
    } ); 
    weekly.buttons().container()
        .appendTo( '#weekly_wrapper .col-md-6:eq(0)' );
     
    let monthly = $('#monthly').DataTable( {
        lengthChange: true,
        buttons: ['excel', 'pdf', 'colvis' ]
    } );
    monthly.buttons().container()
        .appendTo( '#monthly_wrapper .col-md-6:eq(0)' );

    let pending = $('#table-pending').DataTable( {
        lengthChange: true,
        buttons: ['excel', 'pdf', 'colvis' ]
    } );
    pending.buttons().container()
        .appendTo( '#table-pending_wrapper .col-md-6:eq(0)' );

    let projectslist = $('#table-projects').DataTable( {
       
        lengthChange: true,
        "order": [[ 3, "asc" ]],
        buttons: [{
                    extend: 'excel',
                    autoFilter: true,
                    title: 'Project Summary Report',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9,10]
                    },
                    excelStyles: [ 
                        {                      
                        cells: "1",                         // to row 1
                            style: {                        // The style block
                                font: {                     // Style the font
                                    name: "Calibri",          // Font name
                                    size: "18",             // Font size
                                    color: "000000",        // Font Color
                                    b: true,               // Remove bolding from header row
                                },
                                fill: {                     // Style the cell fill (background)
                                    pattern: {              // Type of fill (pattern or gradient)
                                        color: "0066FF",    // Fill color
                                    }
                                }
                            }
                        },
                        {
                            cells: "A2:K2",                // to row 2
                            style: {                        
                                font: {                     
                                    name: "Calibri",         
                                    size: "12",            
                                    color: "000000",        
                                    b: true,               
                                },
                                fill: {                     
                                    pattern: {              
                                        color: "4DC74F",    
                                    }
                                }
                            }
                        }
                    ],
                }, 
                {
                    extend: 'pdf',
                    title: 'Project Summary Report',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9,10]
                    }
                }, 'colvis' ]
        // WHEN I BRING IN BELOW CODE, BUTTONS AND TABLE DO NOT FULLY DISPLAY ON PAGE LOAD

        //         ,
        //         rowReorder: {
        //     selector: 'td:nth-child(2)'
        // },
        // responsive: true             
    } );
    projectslist.buttons().container()
      .appendTo( '#table-projects_wrapper .col-md-6:eq(0)' );
      //projectlist.buttons('export:name').disable();// commting to see buttons  -- rakesh
    //CHAYCE- CONSOLIDATIING BUTTONS    
    // projectslist.buttons('export:name').container()
    //     .appendTo( '.export-options' );


    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        
    let tasksummary = $('#tasksummary').DataTable( {
        lengthChange: true,
        
        buttons: [{
                    extend: 'excel',
                    autoFilter: true,
                    title: 'User Task Summary',
                    excelStyles: [ 
                        {                      
                        cells: "1",                         // to row 1
                            style: {                        // The style block
                                font: {                     // Style the font
                                    name: "Calibri",          // Font name
                                    size: "18",             // Font size
                                    color: "000000",        // Font Color
                                    b: true,               // Remove bolding from header row
                                },
                                fill: {                     // Style the cell fill (background)
                                    pattern: {              // Type of fill (pattern or gradient)
                                        color: "0066FF",    // Fill color
                                    }
                                }
                            }
                        },
                        {
                        cells: "2",                         // to row 2
                            style: {                        
                                font: {                     
                                    name: "Calibri",         
                                    size: "12",            
                                    color: "000000",        
                                    b: true,               
                                },
                                fill: {                     
                                    pattern: {              
                                        color: "4DC74F",    
                                    }
                                }
                            }
                        }
                    ],
                }, 
                {
                    extend: 'pdf',
                    title: 'User Task Summary'
                }, 'colvis' ]
    } );
    tasksummary.buttons().container()
        .appendTo( '#tasksummary_wrapper .col-md-6:eq(0)' );

    let taskdetails = $('#taskdetails').DataTable( {
        lengthChange: true,
        //stateSave: true,
        buttons: [{
                    extend: 'excel',
                    autoFilter: true,
                    title: 'Task Summary Report',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8]
                    },
                    excelStyles: [ 
                        {                      
                        cells: "1",                         // to row 1
                            style: {                        // The style block
                                font: {                     // Style the font
                                    name: "Calibri",          // Font name
                                    size: "18",             // Font size
                                    color: "000000",        // Font Color
                                    b: true,               // Remove bolding from header row
                                },
                                fill: {                     // Style the cell fill (background)
                                    pattern: {              // Type of fill (pattern or gradient)
                                        color: "0066FF",    // Fill color
                                    }
                                }
                            }
                        },
                        {
                        cells: "2",                         // to row 2
                            style: {                        
                                font: {                     
                                    name: "Calibri",         
                                    size: "12",            
                                    color: "000000",        
                                    b: true,               
                                },
                                fill: {                     
                                    pattern: {              
                                        color: "4DC74F",    
                                    }
                                }
                            }
                        }
                    ],
                }, 
                {
                    extend: 'pdf',
                    title: 'Task Summary Report',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8]
                    }
                }, 'colvis' ]
        // WHEN I BRING IN BELOW CODE, BUTTONS AND TABLE DO NOT FULLY DISPLAY ON PAGE LOAD
        //                 ,
        //         rowReorder: {
        //     selector: 'td:nth-child(2)'
        // },
        // responsive: true   
    } );
    taskdetails.buttons().container()
        .appendTo( '#taskdetails_wrapper .col-md-6:eq(0)' );
    
    let tasksubmit = $('#tasksubmit').DataTable( {
        lengthChange: true,
        "order": [[ 2, "asc" ]],
        buttons: [{
                    extend: 'excel',
                    autoFilter: true,
                    title: 'Submitted Timesheets Report',
                    excelStyles: [ 
                        {                      
                        cells: "1",                         // to row 1
                            style: {                        // The style block
                                font: {                     // Style the font
                                    name: "Calibri",          // Font name
                                    size: "18",             // Font size
                                    color: "000000",        // Font Color
                                    b: true,               // Remove bolding from header row
                                },
                                fill: {                     // Style the cell fill (background)
                                    pattern: {              // Type of fill (pattern or gradient)
                                        color: "0066FF",    // Fill color
                                    }
                                }
                            }
                        },
                        {
                        cells: "2",                         // to row 2
                            style: {                        
                                font: {                     
                                    name: "Calibri",         
                                    size: "12",            
                                    color: "000000",        
                                    b: true,               
                                },
                                fill: {                     
                                    pattern: {              
                                        color: "4DC74F",    
                                    }
                                }
                            }
                        }
                    ],
                }, 
                {
                    extend: 'pdf',
                    title: 'Submitted Timesheets Report'
                }, 'colvis' ]
    } );
    tasksubmit.buttons().container()
        .appendTo( '#tasksubmit_wrapper .col-md-6:eq(0)' );
    

    let unsubmit = $('#unsubmit').DataTable( {
        lengthChange: true,
        "order": [[ 2, "asc" ]],
        buttons: [{
                    extend: 'excel',
                    autoFilter: true,
                    title: 'Unsubmitted Timesheets Report',
                    excelStyles: [ 
                        {                      
                        cells: "1",                         // to row 1
                            style: {                        // The style block
                                font: {                     // Style the font
                                    name: "Calibri",          // Font name
                                    size: "18",             // Font size
                                    color: "000000",        // Font Color
                                    b: true,               // Remove bolding from header row
                                },
                                fill: {                     // Style the cell fill (background)
                                    pattern: {              // Type of fill (pattern or gradient)
                                        color: "0066FF",    // Fill color
                                    }
                                }
                            }
                        },
                        {
                        cells: "2",                         // to row 2
                            style: {                        
                                font: {                     
                                    name: "Calibri",         
                                    size: "12",            
                                    color: "000000",        
                                    b: true,               
                                },
                                fill: {                     
                                    pattern: {              
                                        color: "4DC74F",    
                                    }
                                }
                            }
                        }
                    ],
                }, 
                {
                    extend: 'pdf',
                    title: 'Unsubmitted Timesheets Report'
                }, 'colvis' ]
    } );
    unsubmit.buttons().container()
        .appendTo( '#unsubmit_wrapper .col-md-6:eq(0)' );

    let consolidatedreport = $('#consolidated-report').DataTable( {
        lengthChange: true,
        buttons: ['excel', 'pdf', 'colvis' ]
    } );
    consolidatedreport.buttons().container()
        .appendTo( '#consolidated-report_wrapper .col-md-6:eq(0)' );
        
    let submittmstreport = $('#submittmst-report').DataTable( {
        lengthChange: true,
        "order": [[3,"asc"]],
        buttons: [{
                    extend: 'excel',
                    autoFilter: true,
                    title: 'Submitted Timesheets Report',
                    excelStyles: [ 
                        {                      
                        cells: "1",                         // to row 1
                            style: {                        // The style block
                                font: {                     // Style the font
                                    name: "Calibri",          // Font name
                                    size: "18",             // Font size
                                    color: "000000",        // Font Color
                                    b: true,               // Remove bolding from header row
                                },
                                fill: {                     // Style the cell fill (background)
                                    pattern: {              // Type of fill (pattern or gradient)
                                        color: "0066FF",    // Fill color
                                    }
                                }
                            }
                        },
                        {
                        cells: "2",                         // to row 2
                            style: {                        
                                font: {                     
                                    name: "Calibri",         
                                    size: "12",            
                                    color: "000000",        
                                    b: true,               
                                },
                                fill: {                     
                                    pattern: {              
                                        color: "4DC74F",    
                                    }
                                }
                            }
                        }
                    ],
                }, 
                {
                    extend: 'pdf',
                    title: 'Submitted Timesheets Report'
                }, 'colvis' ]
    } );
    submittmstreport.buttons().container()
        .appendTo( '#submittmst-report-tam_wrapper .col-md-6:eq(0)' );
        
        let submittmstreporttam = $('#submittmst-report-tam').DataTable( {
        lengthChange: true,
        "order": [[5,"asc"]],
        buttons: [{
                    extend: 'excel',
                    autoFilter: true,
                    title: 'Submitted Timesheets Report',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,10]
                    },
                    excelStyles: [ 
                        {                      
                        cells: "1",                         // to row 1
                            style: {                        // The style block
                                font: {                     // Style the font
                                    name: "Calibri",          // Font name
                                    size: "18",             // Font size
                                    color: "000000",        // Font Color
                                    b: true,               // Remove bolding from header row
                                },
                                fill: {                     // Style the cell fill (background)
                                    pattern: {              // Type of fill (pattern or gradient)
                                        color: "0066FF",    // Fill color
                                    }
                                }
                            }
                        },
                        {
                        cells: "A2:J2",                         // to row 2
                            style: {                        
                                font: {                     
                                    name: "Calibri",         
                                    size: "12",            
                                    color: "000000",        
                                    b: true,               
                                },
                                fill: {                     
                                    pattern: {              
                                        color: "4DC74F",    
                                    }
                                }
                            }
                        }
                    ],
                }, 
                {
                    extend: 'pdf',
                    title: 'Submitted Timesheets Report',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,10]
                    }
                }, 'colvis' ]
    } );
    submittmstreporttam.buttons().container()
        .appendTo( '#submittmst-report-tam_wrapper .col-md-6:eq(0)' );

    let unsubmittam = $('#unsubmit-tam').DataTable( {
        lengthChange: true,
        "order": [[ 4, "asc" ]],
        buttons: [{
                    extend: 'excel',
                    autoFilter: true,
                    title: 'Unsubmitted Timesheets Report',
                    excelStyles: [ 
                        {                      
                        cells: "1",                         // to row 1
                            style: {                        // The style block
                                font: {                     // Style the font
                                    name: "Calibri",          // Font name
                                    size: "18",             // Font size
                                    color: "000000",        // Font Color
                                    b: true,               // Remove bolding from header row
                                },
                                fill: {                     // Style the cell fill (background)
                                    pattern: {              // Type of fill (pattern or gradient)
                                        color: "0066FF",    // Fill color
                                    }
                                }
                            }
                        },
                        {
                        cells: "2",                         // to row 2
                            style: {                        
                                font: {                     
                                    name: "Calibri",         
                                    size: "12",            
                                    color: "000000",        
                                    b: true,               
                                },
                                fill: {                     
                                    pattern: {              
                                        color: "4DC74F",    
                                    }
                                }
                            }
                        }
                    ],
                }, 
                {
                    extend: 'pdf',
                    title: 'Unsubmitted Timesheets Report'
                }, 'colvis' ]
    } );
    unsubmittam.buttons().container()
        .appendTo( '#unsubmit-tam_wrapper .col-md-6:eq(0)' );
        
        
   
   
    
    
    
} );
</script>
@endpush
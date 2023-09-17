$(document).ready(function(){
   
    $('#user-table').DataTable();
    $('#role-table').DataTable();
    $('#station-table').DataTable();
    $('#sub-station-table').DataTable();

    $('#marefTable').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            'pageLength',
        ]
    });
    $('#marsarTable').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            'pageLength',
        ]
    });
    $('#urban-marsar-table').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            'pageLength',
        ]
    });
    $('#marslec-table').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0,1,2,3 ]
                },
                customize: function (doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            'pageLength',
        ]
    });
    $('#marsar-table2').DataTable();
    $('#marsaf-table2').DataTable();
    $('#urban-marsar-table2').DataTable();
    $('#maref-table2').DataTable();
    $('#marslec-table2').DataTable();
});
@extends('layouts.admin')

@section('title')
Users
@endsection

@section('style')

<link href="{{ asset('/admin/vendor/datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('/admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" href="{{ asset('/admin/vendor/datatables/css/semanticui/2.3.1/semanticui.min.css')}}">
<link rel="stylesheet" href="{{ asset('/admin/vendor/datatables/css/semanticui/1.10.22/semanticui.min.css')}}">
<link rel="stylesheet" href="{{ asset('/admin/vendor/datatables/css/semanticui/buttons/semanticui.min.css')}}">
@endsection

@section('content')
<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            <h6 class="m-0 font-weight-bold text-primary">Total Users: {{ $count }}</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered nowrap table-tesponsive" id="user_datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Age Range</th>
                            <th>Registered</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')

{{-- Page level plugins --}}
<script src="{{ asset ('/admin/vendor/datatables/js/jquery.dataTables.min.js')}} "></script>
<script src="{{ asset ('/admin/vendor/datatables/js/dataTables.buttons.min.js')}} "></script>
<script src="{{ asset ('/admin/vendor/datatables/libs/jszip/3.1.3/jszip.min.js')}} "></script>
<script src="{{ asset ('/admin/vendor/datatables/libs/pdfmake/0.1.53/vfs_fonts.js')}} "></script>
<script src="{{ asset ('/admin/vendor/datatables/buttons/1.6.4/js/buttons.html5.min.js')}} "></script>
<script src="{{ asset ('/admin/vendor/datatables/buttons/1.6.4/js/buttons.print.min.js')}} "></script>
<script src="{{ asset ('/admin/vendor/datatables/buttons/1.6.4/js/buttons.colVis.min.js')}} "></script>
<script src="{{ asset ('/admin/vendor/datatables/buttons/1.6.4/js/buttons.flash.min.js')}} "></script>
<script src="{{ asset ('/admin/vendor/datatables/js/dataTables.semanticui.min.js')}} "></script>
<script src="{{ asset ('/admin/vendor/datatables/js/buttons.semanticui.min.js')}} "></script>
<script>
    $(document).ready(function () {
    var user_table = $('#user_datatable').DataTable({
        processing: true,
        serverSide: true,
        dom: 'Bfrtip',
        lengthMenu: [
            [25, 50, 100, -1],
            ['25 rows', '50 rows', '100 rows', 'Show all']
        ],
        buttons: [
            'pageLength',
            {
                extend: 'colvis',
                collectionLayout: 'two-column'
            },
            {
                extend: 'print',
                customize: function (win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:40%; left:40%;" />'
                        );

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                },
                exportOptions: {
                    columns: ':visible'
                },
                title: 'SOP User Data'

            },
            {
                extend: 'pdfHtml5',
                // orientation: 'landscape',
                // pageSize: 'LEGAL',
                download: 'open',
                exportOptions: {
                    columns: ':visible'
                },
                title: 'SOP User Data'
            },
            {
                extend: 'excelHtml5',
                autoFilter: true,
                sheetName: 'SOP User Data',
                exportOptions: {
                    columns: ':visible'
                }
            },
        ],
        select: true,
        ajax: "{{ url('backend/users') }}",
        deferRender: true,
        columns: [
            // {
            //     data: 'DT_RowIndex',
            //     name: 'DT_RowIndex'
            // },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'username',
                name: 'username'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'gender',
                name: 'gender'
            }, 
            {
                data: 'age_range',
                name: 'age_range'
            },

            {
                data: 'registered',
                name: 'registered',
                orderable: true,
                searchable: true
            },

            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    user_table.buttons().container()
        .appendTo($('div.eight.column:eq(0)', table.table().container()));
    });

</script>
@endsection

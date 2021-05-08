@extends('layouts.app')
@push('style')
    @push('style')
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    @endpush
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Truck Create') }}</div>

                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Auto brand</th>
                                <th>Year of manufacture</th>
                                <th>Owner's name and surname</th>
                                <th>Number of owners</th>
                                <th>Comments</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                {{--DATA Assign by ajax--}}
                            </tbody>
                            <tfood>
                                <tr>
                                    <th>Auto brand</th>
                                    <th>Year of manufacture</th>
                                    <th>Owner's name and surname</th>
                                    <th>Number of owners</th>
                                    <th>Comments</th>
                                </tr>
                            </tfood>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('index') !!}',
                columns: [
                    {
                        data: 'brand',
                        name: 'brand'
                    },
                    {
                        data: 'year_of_manufacture',
                        name: 'year_of_manufacture'
                    },
                    {
                        data: 'owner_s_name_and_surname',
                        name: 'owner_s_name_and_surname'
                    },
                    {
                        data: 'number_of_owners',
                        name: 'number_of_owners'
                    },
                    {
                        data: 'comments',
                        name: 'comments'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                            .on('change', function() {
                                column.search($(this).val(), false, false, true).draw();
                            });
                    });
                }
            });
        });
    </script>
@endpush

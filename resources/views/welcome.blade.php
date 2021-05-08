@extends('layouts.app')
@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Truck Create') }}</div>

                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Auto brand</th>
                                <th>Year of manufacture</th>
                                <th>Owner's name and surname</th>
                                <th>Number of owners</th>
                                <th>Comments</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trucks as $truck)
                               <tr>
                                   <td>{{ $truck->auto_brand }}</td>
                                   <td>{{ $truck->year_of_manufacture }}</td>
                                   <td>{{ $truck->owner_s_name_and_surname }}</td>
                                   <td>{{ $truck->number_of_owners }}</td>
                                   <td>{{ $truck->comments }}</td>
                               </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" defer></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@endpush

@extends('layouts.default')

@push('css')
<link href="{{ URL::asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Hasil Perangkingan</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="card mb-4">
        <div class="card-body table-responsive pr-2">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">NIM</th>
                        <th rowspan="2">Nama</th>
                        @foreach($kriterias as $key => $kriteria)
                        <th colspan="3">Kriteria {{ $kriteria->nama_kriteria}}</th>
                        @endforeach
                        <th rowspan="2">Total</th>
                    </tr>
                    <tr> 
                        @foreach($kriterias as $key => $kriteria)
                        <th>Normaliasi</th>
                        <th>Bobot</th>
                        <th>Hasil</th>
                        @endforeach
                        
                    </tr>
                </thead>

                <tbody>
                    @foreach($susunAlternatives as $key => $alternative)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $alternative['nim']}}</td>
                        <td>{{ $alternative['nama_lengkap']}}</td>
                        @foreach($alternative['nilai_bobot'] as $key => $bobot)
                        <td>{{ $alternative['nilai'][$key]}}</td>
                        <td>{{ $alternative['bobot'][$key]}}</td>
                        <td>{{ $bobot}}</td>
                        @endforeach
                        <td>{{ $alternative['nilai_total']}}</td>


                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</div>


@endsection

@push('scripts')
<script src="{{ URL::asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->

<script>
    $(document).ready(function() {
        $('#nav-perangkingan').addClass('active')


        $('#dataTable').DataTable();


        $('.delete-btn').click(function() {
            $('#delete-name').html($(this).data('name'))
            $('#delete-form').attr('action', $(this).data('route'))
        })
    })
</script>

@endpush
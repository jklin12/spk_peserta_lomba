@extends('layouts.default')

@push('css')
<link href="{{ URL::asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Kriteria</h1>
    </div>
    <a href="{{ route('kriteria.create')}}" class="btn btn-primary btn-icon-split mb-2">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Kriteria</span>
    </a>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot Kriteria</th> 
                        <th>Edit</th> 
                        <th>Delete</th> 
                    </tr>
                </thead>

                <tbody>
                    @foreach($kriterias as $key => $kriteria)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $kriteria->nama_kriteria}}</td>
                        <td>{{ $kriteria->bobot_kriteria}}</td>
                        <td class="text-center">
                            <a href="{{ route('kriteria.edit',$kriteria->id_kriteria) }}" class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="" class="btn btn-danger btn-sm delete-btn" data-toggle="modal" data-target="#delete-modal" data-route="{{ route('kriteria.destroy',$kriteria->id_kriteria) }}" data-name="{{ $kriteria->nama_kriteria}}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</div>

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin menghapus <strong id="delete-name"></strong></div>
            <form action="" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
            </form>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-danger" form="delete-form" type="submit">Ya</button>
            </div>
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
        $('#nav-kriteria').addClass('active')

         
            $('#dataTable').DataTable();
        

        $('.delete-btn').click(function(){
            $('#delete-name').html($(this).data('name'))
            $('#delete-form').attr('action',$(this).data('route'))
        })
    })
</script>

@endpush
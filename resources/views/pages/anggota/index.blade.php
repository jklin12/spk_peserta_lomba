@extends('layouts.default')

@push('css')
<link href="{{ URL::asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Anggota</h1>
    </div>
    <a href="{{ route('anggota.create')}}" class="btn btn-primary btn-icon-split mb-2">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Anggota</span>
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
                        <th>Nim</th>
                        <th>Nama Lengkap</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>No Telepon</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($anggotas as $key => $anggota)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $anggota->nim}}</td>
                        <td>{{ $anggota->nama_lengkap}}</td>
                        <td>{{ $anggota->tempat_lahir.', '.$anggota->tanggal_lahir}}</td>
                        <td>{{ $anggota->alamat}}</td>
                        <td>{{ $anggota->agama}}</td>
                        <td>{{ $anggota->no_telepon}}</td>
                        <td class="text-center">
                            <a href="{{ route('anggota.edit',$anggota->id_anggota) }}" class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="" class="btn btn-danger btn-sm delete-btn" data-toggle="modal" data-target="#delete-modal" data-route="{{ route('anggota.destroy',$anggota->id_anggota) }}" data-name="{{ $anggota->nama_lengkap}}">
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
        $('#nav-anggota').addClass('active')

         
            $('#dataTable').DataTable();
        

        $('.delete-btn').click(function(){
            $('#delete-name').html($(this).data('name'))
            $('#delete-form').attr('action',$(this).data('route'))
        })
    })
</script>

@endpush
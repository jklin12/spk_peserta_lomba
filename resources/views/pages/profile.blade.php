@extends('layouts.default')

@push('css')
<link href="{{ URL::asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    
    <div class="card shadow mb-4">

        <div class="card-body">
            <p>Email : lithfiadinana@gmail.com</p>
            <p>Nama : Lutfia Dinnana</p>
            <p>No Telpon : 08612336712</p>
            <p>Password : ***********</p>
            <!-- Circle Buttons (Default) -->
            <button type="button" class="btn btn-danger">Ganti Password</button>

        </div>
    </div>
     
    <!--<div class="card mb-4">
        <div class="card-header py-3">
            <h6>Data Logistik</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('kriteria.create')}}" class="btn btn-primary btn-icon-split mb-2">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Logistik</span>
            </a>
           
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>


                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sliping Bag</td>
                        <td>3</td>
                        <td><button type="button" class="btn btn-warning">Edit</button></td>
                        <td><button type="button" class="btn btn-danger">Hapus</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Beras</td>
                        <td>1 KG</td>
                        <td><button type="button" class="btn btn-warning">Edit</button></td>
                        <td><button type="button" class="btn btn-danger">Hapus</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tenda</td>
                        <td>1</td>
                        <td><button type="button" class="btn btn-warning">Edit</button></td>
                        <td><button type="button" class="btn btn-danger">Hapus</button></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>-->


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
        $('#nav-alternative').addClass('active')


        $('#dataTable').DataTable();


        $('.delete-btn').click(function() {
            $('#delete-name').html($(this).data('name'))
            $('#delete-form').attr('action', $(this).data('route'))
        })
    })
</script>

@endpush
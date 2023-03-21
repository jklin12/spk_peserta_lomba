@extends('layouts.default')

@push('css')
<link href="{{ URL::asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Data Alternative</h1>
    </div>
    <a href="" class="btn btn-primary btn-icon-split mb-2" data-toggle="modal" data-target="#add-modal">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah ALternative</span>
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
                        <th rowspan="2">No</th>
                        <th rowspan="2">NIM</th>
                        <th rowspan="2">Nama</th>
                        @foreach($kriterias as $key => $kriteria)
                        <th colspan="2">Kriteria {{ $kriteria->nama_kriteria}}</th>
                        @endforeach

                    </tr>
                    <tr>
                        @foreach($kriterias as $key => $kriteria)
                        <th>Nilai</th>
                        <th>Normaliasi</th>
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
                        <td>{{ $bobot}}</td>
                        @endforeach


                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</div>

<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="selectAnggota">Anggota</label>
                    <select class="form-control" id="selectAnggota" name="agama">
                        <option value=""></option>
                        @foreach($anggotas as $key => $value)
                        <option value="{{ $value->id_anggota}}">{{ $value->nama_lengkap}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            </div>
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
        $('#nav-alternative').addClass('active')
        $('#selectAnggota').change(function() {
            window.location.href = "<?= route('alternative.create', 'id=') ?>" + $(this).find(":checked").val();
        })

        $('#dataTable').DataTable();


        $('.delete-btn').click(function() {
            $('#delete-name').html($(this).data('name'))
            $('#delete-form').attr('action', $(this).data('route'))
        })
    })
</script>

@endpush
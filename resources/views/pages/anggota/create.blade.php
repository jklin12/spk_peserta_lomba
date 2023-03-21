@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Anggota</h1>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('anggota.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputNim">NIM</label>
                    <input type="text" class="form-control" id="inputNim" placeholder="Masukan NIM" name="nim" value="{{ old('nim') }}">
                </div>
                <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control" id="inputNama" placeholder="Masukan Nama" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                </div>
                <div class="form-group">
                    <label for="inputTempatLahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="inputTempatLahir" placeholder="Masukan Tempat Lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                </div>
                <div class="form-group">
                    <label for="inputTanggalLahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="inputTanggalLahir" placeholder="Masukan Tanggal Lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                </div>
                <div class="form-group">
                    <label for="inputAalamat">Alamat</label>
                    <input type="text" class="form-control" id="inputAalamat" placeholder="Masukan Alamat" name="alamat" value="{{ old('alamat') }}">
                </div>
                <div class="form-group">
                    <label for="inputAgama">Agama</label>
                    <select class="form-control" id="inputAgama" name="agama">
                        <option value="islam">Islam</option>
                        <option value="hindu">Hindu</option>
                        <option value="kristen">Kristen</option>
                        <option value="katolik">Katolik</option>
                        <option value="budha">Budha</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inpuNoTelpon">No Telepon</label>
                    <input type="text" class="form-control" id="inpuNoTelpon" placeholder="Masukan No Telpon" name="no_telepon" value="{{ old('no_telepon') }}">
                </div>
                <div class="d-sm-flex justify-content-center mb-2">
                    <button class="btn btn-primary btn-icon-split " type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>


    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#nav-anggota').addClass('active')
        })
    </script>
    @endpush

</div>
@endsection
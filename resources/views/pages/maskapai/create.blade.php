@extends('layouts.default')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Maskapai</h1>
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
            <form action="{{ route('maskapai.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputNim">Nama Maskapai</label>
                    <input type="text" class="form-control" id="inputNim" placeholder="Masukan Nama Maskapai" name="nama_maskapai" value="{{ old('nama_maskapai') }}">
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
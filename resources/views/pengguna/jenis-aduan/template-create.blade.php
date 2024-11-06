@extends('layouts.template-induk')

@section('isi-kandungan-utama')
<div class="container-fluid px-4">
    <h1 class="mt-4">Jenis Aduan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Jenis Aduan Baru</li>
    </ol>

    <div class="row">

        <div class="col-xl-12">

            <form method="POST" action="{{ route('jenis-aduan.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Jenis Aduan Baru
                    </div>
                    <div class="card-body">

                        @include('layouts.template-alerts')

                        <div class="row mb-3">
                            <div class="col-12">
                                <input
                                type="text"
                                name="nama"
                                class="form-control"
                                placeholder="Nama Jenis Aduan"
                                value="{{ old('nama') }}">
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>
@endsection
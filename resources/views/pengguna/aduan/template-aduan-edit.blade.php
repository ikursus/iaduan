@extends('layouts.template-induk')

@section('isi-kandungan-utama')
<div class="container-fluid px-4">
    <h1 class="mt-4">Aduan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kemaskini Aduan</li>
    </ol>

    <div class="row">

        <div class="col-xl-12">

            <form method="POST" action="{{ route('name.aduan.update', $aduan->id) }}" enctype="multipart/form-data">

                @csrf
                @method('PATCH')

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Kemaskini Aduan
                    </div>
                    <div class="card-body">

                        @include('layouts.template-alerts')

                        <div class="row mb-3">
                            <div class="col-12">
                                <select name="jenis_aduan_id" class="form-select">
                                    <option value="">--- Pilih Jenis Aduan ---</option>
                                    @foreach ($senaraiJenisAduan as $jenisAduan)

                                        <option
                                            value="{{ $jenisAduan->id }}"
                                            {{ (old('jenis_aduan_id') ?? $aduan->jenis_aduan_id) == $jenisAduan->id ? 'selected' : NULL }}>

                                            {{ $jenisAduan->nama }}

                                        </option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <input type="text" name="tajuk" class="form-control" placeholder="Tajuk Aduan" value="{{ old('tajuk') ?? $aduan->tajuk }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <textarea name="kandungan" class="form-control" placeholder="Butiran Aduan">{{ old('kandungan') ?? $aduan->kandungan }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <input type="file" name="lampiran" class="form-control" value="{{ old('lampiran') }}">
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

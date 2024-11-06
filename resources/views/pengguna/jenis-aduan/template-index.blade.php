@extends('layouts.template-induk')

@section('isi-kandungan-utama')
<div class="container-fluid px-4">
    <h1 class="mt-4">Jenis Aduan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Senarai Jenis Aduan</li>
    </ol>

    <div class="row">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Senarai Jenis Aduan
                </div>
                <div class="card-body">

                    @include('layouts.template-alerts')

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">BIL</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">TINDAKAN</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($senaraiJenisAduan AS $jenisAduan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jenisAduan->nama }}</td>
                                <td>

                                    <form method="POST" action="{{ route('jenis-aduan.destroy', $jenisAduan->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('jenis-aduan.edit', $jenisAduan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <button
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Anda pasti nak delete {{ $jenisAduan->nama }}?')">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $senaraiJenisAduan->links() }}

                </div>
            </div>

        </div>
    </div>

</div>
@endsection

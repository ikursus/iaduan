@extends('layouts.template-induk')

@section('isi-kandungan-utama')
<div class="container-fluid px-4">
    <h1 class="mt-4">Aduan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $pageTitle }}</li>
    </ol>

    <div class="row">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    {{ $pageTitle }}
                </div>
                <div class="card-body">

                    @include('layouts.template-alerts')

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Pengadu</th>
                            <th scope="col">Jenis Aduan</th>
                            <th scope="col">Tajuk</th>
                            <th scope="col">Kandungan</th>
                            <th scope="col">Lampiran</th>
                            <th scope="col">Tarikh</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($senaraiAduan AS $aduan)
                            <tr>
                                <td>{{ $aduan->id }}</td>
                                {{-- <td>{{ $aduan->nama_user }}</td> --}}
                                <td>{{ $aduan->rekodUser->name }}</td>
                                {{-- <td>{{ $aduan->jenis_aduan_id }}</td> --}}
                                {{-- <td>{{ $aduan->nama_jenis }}</td> --}}
                                <td>{{ $aduan->jenisAduan->nama }}</td>
                                <td>{{ $aduan->tajuk }}</td>
                                <td>{{ $aduan->kandungan }}</td>
                                <td>
                                    @if (!is_null($aduan->lampiran))
                                        <a href="{{ url('uploaded/' . $aduan->lampiran) }}" class="btn btn-primary btn-sm">Buka Dari Public</a>
                                        <a href="{{ route('name.aduan.download', $aduan->id) }}" class="btn btn-info btn-sm">Buka Dari Storage</a>
                                    @endif
                                </td>
                                <td>{{ $aduan->created_at }}</td>
                                <td>{{ $aduan->status }}</td>
                                <td>
                                    <form method="POST" action="{{ route('name.aduan.destroy', $aduan->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('name.aduan.edit', $aduan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <button
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Anda pasti nak delete {{ $aduan->tajuk }}?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $senaraiAduan->links() }}

                </div>
            </div>

        </div>
    </div>

</div>
@endsection

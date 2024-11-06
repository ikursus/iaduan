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

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection

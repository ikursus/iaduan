@extends('layouts.template-induk')

@section('isi-kandungan-utama')
<div class="container-fluid px-4">
    <h1 class="mt-4">Aduan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $pageTitle }}</li>
    </ol>
</div>

@foreach($senaraiAduan as $aduan)

<li>{{ $aduan['tajuk'] }}</li>

@endforeach


@endsection

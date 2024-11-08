@extends('layouts.template-induk')

@section('isi-kandungan-utama')
<div class="container-fluid px-4">
    <h1 class="mt-4">Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kemaskini</li>
    </ol>

    <div class="row">

        <div class="col-xl-12">

            <form method="POST" action="{{ route('name.profile.update') }}" enctype="multipart/form-data">

                <input type="hidden" name="_method" value="PATCH">
                @method('PATCH')
                @csrf

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Kemaskini Profile
                    </div>
                    <div class="card-body">

                        @include('layouts.template-alerts')

                        <div class="row mb-3">
                            <div class="col-12">
                                <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama Anda"
                                value="{{ old('name') ?? auth()->user()->name }}">

                                @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email Anda"
                                value="{{ old('email') ?? auth()->user()->email }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input
                                type="text"
                                name="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Telefon Anda"
                                value="{{ old('phone') ?? auth()->user()->phone }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password Anda">
                                @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                                <span class="text-muted">Biarkan kosong jika tidak ingin mengubah password</span>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Ulang Password Anda">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">

                                <select name="role" class="form-control @error('role') is-invalid @enderror">
                                    @foreach ($senaraiRole as $role)
                                    <option value="{{ $role->name }}" {{ (old('role') ?? auth()->user()->getRoleNames()->first() ) == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror

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

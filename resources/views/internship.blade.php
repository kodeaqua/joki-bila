@extends('layouts.app')

@section('content')
    <h1 class="fw-bold text-center">{{ $title }}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                @if (session('success'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger text-center" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="card card-body">
                    <form method="POST" action="{{ route('requestInternship') }}">
                        @csrf
                        <div class="col px-5">
                            <label for="name" class="col-md-4 col-form-label">{{ __('Nama Pengaju') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>

                        <div class="col px-5">
                            <label for="student_id" class="col-md-4 col-form-label">{{ __('ID Siswa/Mahasiswa') }}</label>
                            <input id="student_id" type="text"
                                class="form-control @error('student_id') is-invalid @enderror" name="student_id"
                                value="{{ old('student_id') }}" required autocomplete="student_id" autofocus>
                        </div>

                        <div class="col px-5">
                            <label for="telp" class="col-md-4 col-form-label">{{ __('Nomor Telpon') }}</label>
                            <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror"
                                name="telp" value="{{ old('telp') }}" required autocomplete="telp" autofocus>
                        </div>

                        <div class="col px-5">
                            <label for="birth" class="col-md-4 col-form-label">{{ __('Tempat, Tanggal lahir') }}</label>
                            <input id="birth" type="text" class="form-control @error('birth') is-invalid @enderror"
                                name="birth" value="{{ old('birth') }}" required autocomplete="birth" autofocus>
                        </div>

                        <div class="col px-5">
                            <label for="religion" class="col-md-4 col-form-label">{{ __('Agama') }}</label>
                            <input id="religion" type="text"
                                class="form-control @error('religion') is-invalid @enderror" name="religion"
                                value="{{ old('religion') }}" required autocomplete="religion" autofocus>
                        </div>

                        <div class="col px-5">
                            <label for="occupational" class="col-md-4 col-form-label">{{ __('Status Pekerjaan') }}</label>
                            <input id="occupational" type="text"
                                class="form-control @error('occupational') is-invalid @enderror" name="occupational"
                                value="{{ old('occupational') }}" required autocomplete="occupational" autofocus>
                        </div>

                        <div class="col px-5">
                            <label for="address" class="col-md-4 col-form-label">{{ __('Alamat') }}</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                        </div>

                        <div class="col px-5">
                            <label for="members" class="col-md-4 col-form-label">{{ __('Jumlah Peserta') }}</label>
                            <input id="members" type="text" class="form-control @error('members') is-invalid @enderror"
                                name="members" value="{{ old('members') }}" required autocomplete="members" autofocus>
                        </div>

                        <div class="col px-5">
                            <label for="purpose" class="col-md-4 col-form-label">{{ __('Maksud') }}</label>
                            <input id="purpose" type="text" class="form-control @error('purpose') is-invalid @enderror"
                                name="purpose" value="{{ old('purpose') }}" required autocomplete="purpose" autofocus>
                        </div>

                        <div class="col px-5">
                            <label for="description" class="col-md-4 col-form-label">{{ __('Untuk Keperluan') }}</label>
                            <input id="description" type="text"
                                class="form-control @error('description') is-invalid @enderror" name="description"
                                value="{{ old('description') }}" required autocomplete="description" autofocus>
                        </div>

                        <div class="col px-5">
                            <label for="location" class="col-md-4 col-form-label">{{ __('Lokasi') }}</label>
                            <input id="location" type="text"
                                class="form-control @error('location') is-invalid @enderror" name="location"
                                value="{{ old('location') }}" required autocomplete="location" autofocus>
                        </div>

                        <div class="col px-5 mb-3">
                            <label for="institution"
                                class="col-md-4 col-form-label">{{ __('Lembaga/instansi yang dituju') }}</label>
                            <input id="institution" type="text"
                                class="form-control @error('institution') is-invalid @enderror" name="institution"
                                value="{{ old('institution') }}" required autocomplete="institution" autofocus>
                        </div>

                        <div class="d-flex justify-content-center px-5">
                            <button type="submit" class="btn btn-primary flex-grow-1">
                                {{ __('Tambah') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

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

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Sekretaris</div>
                            {{ $secretary->name }}
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editSecretaryModal">
                            Ubah
                        </button>
                        <div class="modal fade" id="editSecretaryModal" tabindex="-1"
                            aria-labelledby="editSecretaryModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editSecretaryModalLabel">Ubah sekretaris</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <form action="{{ route('updateSecretary', $secretary->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="col px-5">
                                                <label for="name"
                                                    class="col-md-4 col-form-label">{{ __('Nama Sekretaris') }}</label>
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    autocomplete="name" autofocus placeholder="{{ $secretary->name }}">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col px-5">
                                                <label for="nip"
                                                    class="col-md-4 col-form-label">{{ __('NIP Sekretaris') }}</label>
                                                <input id="nip" type="text"
                                                    class="form-control @error('nip') is-invalid @enderror" name="nip"
                                                    autocomplete="nip" autofocus placeholder="{{ $secretary->nip }}">

                                                @error('nip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

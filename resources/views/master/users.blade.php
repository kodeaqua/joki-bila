@extends('layouts.app')

@section('content')
    <h1 class="fw-bold text-center">{{ $title }}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">

                <div class="d-flex justify-content-start">
                    <a class="btn btn-primary mb-3" data-bs-toggle="collapse" href="#addUser" role="button"
                        aria-expanded="false" aria-controls="addUser">
                        Tambah pegawai
                    </a>
                </div>

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


                <div class="collapse mb-3" id="addUser">
                    <div class="card card-body">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="col px-5">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Nama pegawai') }}</label>


                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col px-5">
                                <label for="email" class="col-md-4 col-form-label">{{ __('Alamat email') }}</label>


                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col px-5 mb-3">
                                <label for="password" class="col-md-4 col-form-label">{{ __('Kata sandi') }}</label>


                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="d-flex justify-content-center px-5">
                                <button type="submit" class="btn btn-primary flex-grow-1">
                                    {{ __('Tambah') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $value)
                                    <tr @if (Auth::user()->id == $value->id) class="table-active" @endif>
                                        <th scope="row">{{ $users->firstItem() + $key }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>
                                            @if ($value->has_super_access)
                                                Super Admin
                                            @else
                                                Admin/Pegawai
                                            @endif
                                        </td>
                                        @if (Auth::user()->id == $value->id)
                                            <td>
                                                Tidak tersedia

                                            </td>
                                        @else
                                            <td class="d-flex flex-row">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editUserModal{{ $users->firstItem() + $key }}">
                                                    Ubah
                                                </button>
                                                <div class="modal fade" id="editUserModal{{ $users->firstItem() + $key }}"
                                                    tabindex="-1"
                                                    aria-labelledby="editUserModalLabel{{ $users->firstItem() + $key }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5"
                                                                    id="editUserModalLabel$users->firstItem() + $key">Ubah
                                                                    pegawai</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                            </div>

                                                            <form method="POST"
                                                                action="{{ route('users.update', $value->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="col px-5">
                                                                        <label for="name"
                                                                            class="col-md-4 col-form-label">{{ __('Nama pegawai') }}</label>


                                                                        <input id="name" type="text"
                                                                            class="form-control @error('name') is-invalid @enderror"
                                                                            name="name"  autocomplete="name"
                                                                            autofocus placeholder="{{ $value->name }}">

                                                                        @error('name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror

                                                                    </div>

                                                                    <div class="col px-5">
                                                                        <label for="email"
                                                                            class="col-md-4 col-form-label">{{ __('Alamat email') }}</label>


                                                                        <input id="email" type="email"
                                                                            class="form-control @error('email') is-invalid @enderror"
                                                                            name="email"  autocomplete="email"
                                                                            placeholder="{{ $value->email }}">

                                                                        @error('email')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror

                                                                    </div>

                                                                    <div class="col px-5 mb-3">
                                                                        <label for="password"
                                                                            class="col-md-4 col-form-label">{{ __('Kata sandi') }}</label>


                                                                        <input id="password" type="password"
                                                                            class="form-control @error('password') is-invalid @enderror"
                                                                            name="password"
                                                                            autocomplete="new-password"
                                                                            placeholder="********">

                                                                        @error('password')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror

                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Simpan</button>
                                                                </div>
                                                            </form>




                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('users.destroy', $value->id) }}" method="POST"
                                                    onsubmit="return confirm('Apakah anda yakin?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                                    <th scope="col">Status Pekerjaan</th>
                                    <th scope="col">Maksud</th>
                                    <th scope="col">Telp</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($internships as $key => $value)
                                    <tr @if (Auth::user()->id == $value->id) class="table-active" @endif>
                                        <th scope="row">{{ $internships->firstItem() + $key }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->occupational }}</td>
                                        <td>{{ $value->purpose }}</td>
                                        <td>{{ $value->telp }}</td>
                                        <td class="d-flex flex-row">
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editUserModal{{ $internships->firstItem() + $key }}">
                                                Lihat
                                            </button>
                                            <div class="modal fade"
                                                id="editUserModal{{ $internships->firstItem() + $key }}" tabindex="-1"
                                                aria-labelledby="editUserModalLabel{{ $internships->firstItem() + $key }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="editUserModalLabel$internships->firstItem() + $key">
                                                                Pengajuan</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Tutup"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-group">
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">Nama Pengaju</div>
                                                                        {{ $value->name }}
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">ID Siswa/Mahasiswa</div>
                                                                        {{ $value->student_id }}
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">Nomor Telpon</div>
                                                                        {{ $value->telp }}
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">Tempat, Tanggal lahir</div>
                                                                        {{ $value->birth }}
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">Agama</div>
                                                                        {{ $value->religion }}
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">Status Pekerjaan</div>
                                                                        {{ $value->occupational }}
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">Alamat</div>
                                                                        {{ $value->address }}
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">Jumlah Peserta</div>
                                                                        {{ $value->members }}
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">Maksud</div>
                                                                        {{ $value->purpose }}
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">Untuk Keperluan</div>
                                                                        {{ $value->description }}
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">Lokasi</div>
                                                                        {{ $value->location }}
                                                                    </div>
                                                                </li>
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-start">
                                                                    <div class="ms-2 me-auto">
                                                                        <div class="fw-bold">Lembaga/instansi yang dituju
                                                                        </div>
                                                                        {{ $value->institution }}
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#printModal{{ $internships->firstItem() + $key }}">
                                                Cetak
                                            </button>

                                            <div class="modal fade" id="printModal{{ $internships->firstItem() + $key }}"
                                                tabindex="-1"
                                                aria-labelledby="printModal{{ $internships->firstItem() + $key }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="printModal{{ $internships->firstItem() + $key }}Label">
                                                                Lengkapi</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('updateAndPrintInternship', $value->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="col px-5">
                                                                    <label for="letter_number"
                                                                        class="col-md-4 col-form-label">{{ __('Nomor Surat') }}</label>


                                                                    <input id="letter_number" type="text"
                                                                        class="form-control @error('letter_number') is-invalid @enderror"
                                                                        name="letter_number" autocomplete="letter_number"
                                                                        autofocus placeholder="Misal: 1234/ABCD">

                                                                    @error('letter_number')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror

                                                                </div>

                                                                <div class="col px-5">
                                                                    <label for="acc_reason"
                                                                        class="col-md-4 col-form-label">{{ __('Alasan disetujui') }}</label>


                                                                    <input id="acc_reason" type="text"
                                                                        class="form-control @error('acc_reason') is-invalid @enderror"
                                                                        name="acc_reason" autocomplete="acc_reason"
                                                                        autofocus
                                                                        placeholder="Misal: Berdasarkan surat dekan ...">

                                                                    @error('acc_reason')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror

                                                                </div>

                                                                <div class="col px-5">
                                                                    <label for="start_intern"
                                                                        class="col-md-4 col-form-label">{{ __('Mulai magang') }}</label>


                                                                    <input id="start_intern" type="text"
                                                                        class="form-control @error('start_intern') is-invalid @enderror"
                                                                        name="start_intern" autocomplete="start_intern"
                                                                        autofocus placeholder="Misal: 28 Oktober 2022">

                                                                    @error('start_intern')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror

                                                                </div>

                                                                <div class="col px-5">
                                                                    <label for="end_intern"
                                                                        class="col-md-4 col-form-label">{{ __('Selesai magang') }}</label>


                                                                    <input id="end_intern" type="text"
                                                                        class="form-control @error('end_intern') is-invalid @enderror"
                                                                        name="end_intern" autocomplete="end_intern"
                                                                        autofocus placeholder="Misal: 10 November 2022">

                                                                    @error('end_intern')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror

                                                                </div>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-success">Simpan dan
                                                                    cetak</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <form action="{{ route('internships.destroy', $value->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah anda yakin?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $internships->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

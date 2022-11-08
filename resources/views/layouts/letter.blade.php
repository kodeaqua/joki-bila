<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: legal
        }
    </style>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script>
        window.print()
    </script>
</head>

<body class="legal">
    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">

        <!-- Write HTML just like a web page -->
        <article class="d-flex flex-column align-items-center">
            <h5>SURAT KETERANGAN</h5>
            <h5>Nomor: {{ $internship->letter_number }} - Kesbangpol</h5>
            <div class="text-start">
                <p>Yang bertanda tangan di bawah ini Kepala Badan Kesatuan Bangsa dan Politik Kota Bogor</p>
                <p>Berdasarkan Surat dari : {{ $internship->acc_reason }}</p>
                <p>Menerangkan bahwa :</p>
                <table class="table table-sm table-bordered border-dark">
                    <tbody>
                        <tr>
                            <th scope="row">a</th>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $internship->name }} ({{ $internship->student_id }})</td>
                        </tr>
                        <tr>
                            <th scope="row">b</th>
                            <td>Telepon/E-mail</td>
                            <td>:</td>
                            <td>{{ $internship->telp }}</td>
                        </tr>
                        <tr>
                            <th scope="row">c</th>
                            <td>Tempat / Tgl. Lahir</td>
                            <td>:</td>
                            <td>{{ $internship->birth }}</td>
                        </tr>
                        <tr>
                            <th scope="row">d</th>
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{ $internship->religion }}</td>
                        </tr>
                        <tr>
                            <th scope="row">e</th>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $internship->address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">f</th>
                            <td>Peserta</td>
                            <td>:</td>
                            <td>{{ $internship->members }}</td>
                        </tr>
                        <tr>
                            <th scope="row">g</th>
                            <td>Maksud</td>
                            <td>:</td>
                            <td>{{ $internship->purpose }}</td>
                        </tr>
                        <tr>
                            <th scope="row">h</th>
                            <td>Untuk keperluan</td>
                            <td>:</td>
                            <td>{{ $internship->description }}</td>
                        </tr>
                        <tr>
                            <th scope="row">i</th>
                            <td>Lokasi</td>
                            <td>:</td>
                            <td>{{ $internship->location }}</td>
                        </tr>
                        <tr>
                            <th scope="row">j</th>
                            <td>Lembaga/Instansi</br>Yang Dituju</td>
                            <td>:</td>
                            <td>{{ $internship->institution }}</td>
                        </tr>
                    </tbody>
                </table>
                <p>1. Sehubungan dengan maksud tersebut, dengan ini kami <b>terima</b> nama tersebut atas untuk
                    melaksanakan magang di Badan Kesatuan Bangsa dan Politik Kota Bogor.</p>
                <p>2. Mohon instansi tersebut dapat mengawasi / memonitor mahasiswa/i, siswa/i dalam pelaksanaan
                    kegiatan tersebut.</p>
                <p>3. Dosen/Guru Pembimbing bertanggungjawab agar ikut memberikan pengawasan dan pembinaan kepada
                    mahasiswa/i, siswa/i yang melaksanakan Pra-Riset/Penelitian/Permohonan
                    Data/</br>Observasi/PKL/Magang serta melaporkan perkembangannya kepada Kepala Badan
                    Kesatuan</br>Bangsa dan Politik Kota Bogor secara tertulis.</p>
                <p>4. Agar di dalam pelaksanaan kegiatannya tetap mengikuti Prosedur Protokol Kesehatan, selama masa
                    Pandemi Covid-19 di Kota Bogor</p>
                <p>5. Demikian Surat Keterangan ini dibuat untuk dipergunakan sebagaimana mestinya, dan berlaku dari
                    tanggal {{ $internship->start_intern }} sampai {{ $internship->end_intern }} .</p>
            </div>
            <div class="d-flex flex-column align-self-end align-items-center">
                <p></br>Bogor, {{ date("d M Y")  }}</p>
                <p>a. n. Kepala</p>
                <p class="pb-5">Sekretaris Badan</p>
                <p class="py-5"><u>{{ $secretary->name }}</u></p>
                <p style="margin-top: -40%">{{ $secretary->nip }}</p>
            </div>

        </article>

    </section>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>

<?php

use App\Models\Secretary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternshipsController;
use App\Http\Controllers\UsersController;
use App\Models\Internship;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('home'));
});

Route::get('/profile', function () {
    $title = "Profil";
    return view('profile', compact('title'));
})->name('profile');

Route::get('/organization', function () {
    $title = "Struktur Organisasi";
    return view('organization', compact('title'));
})->name('organization');

Route::get('/internship', function () {
    $title = "Pengajuan Magang";
    return view('internship', compact('title'));
})->name('internship');

Route::post('/internship/request', function (Request $request) {
    $internship = Internship::create([
        'name' => $request->name,
        'student_id' => $request->student_id,
        'telp' => $request->telp,
        'birth' => $request->birth,
        'religion' => $request->religion,
        'occupational' => $request->occupational,
        'address' => $request->address,
        'members' => $request->members,
        'purpose' => $request->purpose,
        'description' => $request->description,
        'location' => $request->location,
        'institution' => $request->institution,
    ]);

    if ($internship) {
        return redirect()->back()->with('success', 'Berhasil mengajukan!');
    }
})->name('requestInternship');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/master/users', UsersController::class);

Route::resource('/master/internships', InternshipsController::class);

Route::get('/master/settings', function () {
    if (Auth::user()->has_super_access != true) {
        return abort(404);
    }

    $title = "Pengaturan Lain";
    $secretary = Secretary::findOrFail(1);
    return view('master.settings', compact('title', 'secretary'));
})->middleware('auth')->name('settings');

Route::put('/master/settings/secretary/{id}', function (Request $request, $id) {
    if (Auth::user()->has_super_access != true) {
        return abort(404);
    }

    $secretary = Secretary::findOrFail($id);

    $validator = [];

    if ($request->name != $secretary->name && $request->name != "") {
        $validator = $request->validate([
            'name' => ['string', 'max:60'],
        ]);
        $secretary->update([
            'name' => $request->name
        ]);
    }

    if ($request->nip != $secretary->nip && $request->nip != "") {
        $validator = $request->validate([
            'nip' => ['string', 'max:32'],
        ]);
        $secretary->update([
            'nip' => $request->nip
        ]);
    }

    if ($secretary) {
        return redirect()->back()->with('success', 'Berhasil diubah!');
    } else {
        return redirect()->back()->withErrors($validator)->withInput();
    }
})->middleware('auth')->name('updateSecretary');

Route::get('/master/internships/print/{id}', function ($id) {
    $internship = Internship::findOrFail($id);
    $secretary = Secretary::findOrFail(1);
    return view('layouts.letter', compact('internship', 'secretary'));
})->middleware('auth')->name('printRequest');

Route::put('/master/internships/update/{id}', function (Request $request, $id) {
    $internship = Internship::findOrFail($id);
    $internship->update([
        'letter_number' => $request->letter_number,
        'acc_reason' => $request->acc_reason,
        'start_intern' => $request->start_intern,
        'end_intern' => $request->end_intern,
    ]);
    if ($internship) {
        return redirect(route('printRequest', $id));
    } else {
        return redirect()->back()->withErrors($internship)->withInput();
    }
})->middleware('auth')->name('updateAndPrintInternship');

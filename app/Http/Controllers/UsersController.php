<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->has_super_access != true) {
            return abort(404);
        }
        $title = "Atur Pegawai";
        $users = User::paginate(5);
        return view('master.users', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->has_super_access != true) {
            return abort(404);
        }

        $validator = $request->validate([
            'name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->back()->with('success', 'Berhasil menambahkan!');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->has_super_access != true) {
            return abort(404);
        }

        $validator = [];

        $user = User::findOrFail($id);

        if ($request->name != $user->name && $request->name != "") {
            $validator = $request->validate([
                'name' => ['string', 'max:60'],
            ]);
            $user->update([
                'name' => $request->name
            ]);
        }

        if ($request->email != $user->email && $request->email != "") {
            $validator = $request->validate([
                'email' => ['string', 'email', 'max:255', 'unique:users'],
            ]);
            $user->update([
                'email' => $request->email
            ]);
        }

        if (!Hash::check($request->password, $user->password) && $request->password != "") {
            $validator = $request->validate([
                'password' => ['string', 'min:8'],
            ]);
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        if ($user) {
            return redirect()->back()->with('success', 'Berhasil diubah!');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->has_super_access != true) {
            return abort(404);
        }

        $user = User::findOrFail($id);
        if ($user->delete()) {
            return redirect()->back()->with('success', 'Berhasil menghapus!');
        } else {
            return redirect()->back()->withErrors($user->delete())->withInput();
        }
    }
}

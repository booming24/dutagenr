<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
        $user = User::paginate(10);
        return view('admin.master.user.users', [
            'user' => $user,
        ]);
    }
    public function create()
    {
        $user = User::paginate(10);
        return view('admin.master.user.users', [
            'user' => $user,
        ]);
    }

    // insert data to table
    public function store(Request $request)
    {
        // dd($request->all());
        // data yg akan diterima function store
        $email = $request->email;
        $name = $request->name;
        $level = $request->level;
        $password = Hash::make($request->password);


        // validasi sebelum insert ke tabel
        $request->validate([
            'email' => 'required|min:3',
            'name' => 'required',
            'level' => 'required',
            'password' => 'required',
        ]);

        // buat object untuk simpan data ke table
        $user = new User();

        //kirim nilai2 yg didapat dari form ke table
        $user->email = $email;
        $user->name = $name;
        $user->level = $level;
        $user->password = $password;
        // simpan data yg telah diterima ke dalam table
        $user->save();

        // redirect ke halaman users
        return redirect('/user');
    }

    public function edit($id)
    {
        $user = User::find($id); // SELECT * FROM user WHERE id = $id
        // dd($user);

        // tampilkan form edit dan kirim datanya
        return view('admin.master.user.edit', compact('user'));
    }

    // update data selected
    public function update(Request $request)
    {
        // data yg akan diterima function store

        $id = $request->id;
        $email = $request->email;
        $name = $request->name;
        $level = $request->level;

        // buat object untuk simpan data ke table
        $user = User::find($id);

        if ($request->password) {
            $password = Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        //kirim nilai2 yg didapat dari form ke table
        $user->email = $email;
        $user->name = $name;
        $user->level = $level;
        $user->password = $password;

        // simpan data yg telah diterima ke dalam table
        // $user->save();

        $user->update();

        // redirect ke halaman users
        return redirect(route('user'));
    }

    public function delete($id)
    {
        // query/perintah hapus data berdasarkan id
        User::find($id)->delete();

        // kembalikan ke halaman users
        return redirect(route('user'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}

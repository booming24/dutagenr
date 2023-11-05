<?php

namespace App\Http\Controllers;

use File;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function landingPage()
    {
        $peserta = Peserta::all();
        dd($peserta);
        return view("frontend.voting", compact('peserta'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminPanel()
    {
        // $user = Auth::user();
        // if ($user->role == "alpha") {
        $peserta = Peserta::all();
        // } else if ($user->role == "admin") {
        //     $peserta = Peserta::all();
        // } else {
        //     redirect("frontend.landingpage");
        // }
        // dd($peserta);
        return view("backend.master.peserta.index", compact('peserta'));
    }

    public function laporanpeserta()
    {
        // $user = Auth::user();
        // if ($user->role == "alpha") {
        $peserta = Peserta::all();
        // } else if ($user->role == "admin") {
        //     $peserta = Peserta::all();
        // } else {
        //     redirect("frontend.landingpage");
        // }
        // dd($peserta);
        return view("backend.laporan.laporankandidat", compact('peserta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->foto->extension();

        $request->foto->move(public_path('peserta'), $imageName);
        $peserta = new Peserta();

        $peserta->no_peserta = $request->no_peserta;
        $peserta->nama_peserta = $request->nama_peserta;
        $peserta->foto = $imageName;
        $peserta->kategori = $request->kategori;
        $peserta->asal_instansi = $request->asal_instansi;
        $peserta->status = $request->status;

        $peserta->save();

        return redirect(route('peserta_admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // // hapus file
        // $peserta = Peserta::where('id', $id)->first();
        // $filePath = public_path("images/peserta") . "/" . $peserta->foto;

        // if (Storage::exists($filePath)) {
        //     Storage::delete($filePath);
        //     return "Foto berhasil dihapus.";
        // } else {
        //     return "Foto tidak ditemukan.";
        // }

        // // hapus data
        // Peserta::where('id', $id)->delete();

        // return redirect()->back();
        Peserta::find($id)->delete();
        return redirect('/peserta');
    }
}

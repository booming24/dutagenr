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
        $putra = Peserta::all()->where('periode', 'FINALIS');
        $putri = Peserta::all()->where('kategori', 'PUTRI');
        // dd($peserta);
        return view("landingpage.voting", compact('putra', 'putri'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = Peserta::all();
        return view("admin.master.peserta.index", compact('peserta'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view("admin.master.peserta.create");
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

        return redirect(route('peserta'));
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
    }
}

<?php

namespace App\Http\Controllers;

use File;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function landingPage()
    {
        $putra = Peserta::where('kategori', 'PUTRA')->orderBy('no_peserta', 'asc')->get();
        $putri = Peserta::where('kategori', 'PUTRI')->orderBy('no_peserta', 'asc')->get();
        $point_putra = Peserta::where('kategori', '=', 'PUTRA')
            ->orderBy('point_semifinal', 'desc')
            ->pluck('point_semifinal')
            ->toArray();
        $point_putri = Peserta::where('kategori', '=', 'PUTRI')
            ->orderBy('point_semifinal', 'desc')
            ->pluck('point_semifinal')
            ->toArray();
        $label_putra = Peserta::where('kategori', '=', 'PUTRA')
            ->orderBy('point_semifinal', 'desc')
            ->pluck('nama_peserta')
            ->toArray();
        $label_putri = Peserta::where('kategori', '=', 'PUTRI')
            ->orderBy('point_semifinal', 'desc')
            ->pluck('nama_peserta')
            ->toArray();
        $top_three_putra = Peserta::where('kategori', 'PUTRA')->orderBy('point_semifinal', 'desc')
            ->limit(3) // Mengambil 10 record pertama
            ->get();
        $top_three_putri = Peserta::where('kategori', 'PUTRI')->orderBy('point_semifinal', 'desc')
            ->limit(3) // Mengambil 10 record pertama
            ->get();
        return view("landingpage.voting", compact('putra', 'putri', 'point_putri', 'point_putra', 'label_putri', 'label_putra', 'top_three_putra', 'top_three_putri'));
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

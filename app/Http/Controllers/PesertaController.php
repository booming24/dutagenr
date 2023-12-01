<?php

namespace App\Http\Controllers;

use File;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function landingPage()
    {
        $putra = Peserta::where('kategori', 'PUTRA')
            ->where('status', 'FINALIS')
            ->orderBy('no_peserta', 'asc')
            ->get();
        $putri = Peserta::where('kategori', 'PUTRI')
            ->where('status', 'FINALIS')
            ->orderBy('no_peserta', 'asc')
            ->get();
        $point_putra = Peserta::select(
            DB::raw('100 * point_final / SUM(point_final) OVER () as percentage')
        )
            ->where('kategori', '=', 'PUTRA')
            ->where('status', '=', 'FINALIS')
            ->orderBy('point_final', 'desc') // You may remove this line if ordering is not necessary
            ->get()
            ->pluck('percentage')
            ->toArray();
        $point_putri = Peserta::select(
            DB::raw('100 * point_final / SUM(point_final) OVER () as percentage')
        )
            ->where('kategori', '=', 'PUTRI')
            ->where('status', '=', 'FINALIS')
            ->orderBy('point_final', 'desc') // You may remove this line if ordering is not necessary
            ->get()
            ->pluck('percentage')
            ->toArray();
        $label_putra = Peserta::where('kategori', '=', 'PUTRA')
            ->where('status', '=', 'FINALIS')
            ->orderBy('point_final', 'desc')
            ->pluck('nama_peserta')
            ->toArray();
        $label_putri = Peserta::where('kategori', '=', 'PUTRI')
            ->where('status', '=', 'FINALIS')
            ->orderBy('point_final', 'desc')
            ->pluck('nama_peserta')
            ->toArray();
        $top_three_putra = Peserta::where('kategori', 'PUTRA')
            ->where('status', '=', 'FINALIS')
            ->orderBy('point_final', 'desc')
            ->limit(3) // Mengambil 10 record pertama
            ->get();
        $top_three_putri = Peserta::where('kategori', 'PUTRI')
            ->where('status', '=', 'FINALIS')
            ->orderBy('point_final', 'desc')
            ->limit(3) // Mengambil 10 record pertama
            ->get();

        $expiredTime = strtotime('2023-12-2 10:00:00');
        $now = time();

        return view("landingpage.voting", compact('putra', 'putri', 'point_putri', 'point_putra', 'label_putri', 'label_putra', 'top_three_putra', 'top_three_putri', 'expiredTime', 'now'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPutera()
    {
        $data = Peserta::select(
            '*',
            DB::raw('100 * point_final / SUM(point_final) OVER () as percentage')
        )
            ->where('kategori', 'PUTRA')
            ->where('status', '=', 'FINALIS')
            ->orderBy('no_peserta', 'asc')
            ->get();

        $expiredTime = strtotime('2023-12-2 10:00:00');
        $now = time();
        return view("landingpage.peserta", compact('data', 'expiredTime', 'now'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPuteri()
    {
        $data = Peserta::select(
            '*',
            DB::raw('100 * point_final / SUM(point_final) OVER () as percentage')
        )
            ->where('kategori', 'PUTRI')
            ->where('status', '=', 'FINALIS')
            ->orderBy('no_peserta', 'asc')
            ->get();

        $expiredTime = strtotime('2023-12-2 10:00:00');
        $now = time();
        return view("landingpage.peserta", compact('data', 'expiredTime', 'now'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
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

            return redirect(route('peserta'))->with('success', 'Data peserta berhasil disimpan');
        } catch (\Exception $error) {
            return redirect(route('peserta'))->with('error', $error);
        }
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
        try {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $peserta = Peserta::find($id);

            if (!$peserta) {
                return redirect(route('peserta'))->with('error', 'Peserta tidak ditemukan');
            }

            if ($request->hasFile('foto')) {
                // Jika ada file foto yang diunggah, proses pembaruan foto
                $imageName = time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('peserta'), $imageName);
                $peserta->foto = $imageName;
            }

            // Update data peserta
            $peserta->no_peserta = $request->no_peserta;
            $peserta->nama_peserta = $request->nama_peserta;
            $peserta->kategori = $request->kategori;
            $peserta->asal_instansi = $request->asal_instansi;
            $peserta->status = $request->status;

            $peserta->save();

            return redirect(route('peserta'))->with('success', 'Data peserta berhasil diperbarui');
        } catch (\Exception $error) {
            return redirect(route('peserta'))->with('error', $error);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $peserta = Peserta::find($id);

            if (!$peserta) {
                return redirect(route('peserta'))->with('error', 'Peserta tidak ditemukan');
            }

            // Hapus foto dari direktori jika ada
            if ($peserta->foto) {
                $imagePath = public_path('peserta/') . $peserta->foto;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Hapus data peserta dari database
            $peserta->delete();

            return redirect(route('peserta'))->with('success', 'Data peserta berhasil dihapus');
        } catch (\Exception $error) {
            return redirect(route('peserta'))->with('error', $error);
        }
    }
}

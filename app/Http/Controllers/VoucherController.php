<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher = Voucher::where('is_used', 0)
            ->where('periode', 'FINAL')
            ->select(
                'vouchers.*',
                DB::raw('CONVERT_TZ(vouchers.created_at, "+00:00", "+07:00") as created_at_wib'),
                DB::raw('CONVERT_TZ(vouchers.updated_at, "+00:00", "+07:00") as updated_at_wib')
            )
            ->get();

        return view("admin.master.voucher.index", compact('voucher'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $data = [];
        $data['voucher_terjual'] = Voucher::all()->where('is_used', 1)->where('periode', 'FINAL')->sum('nominal');
        $data['voucher_tersedia'] = Voucher::all()->where('is_used', 0)->where('periode', 'FINAL')->sum('nominal');
        $data['point_putra'] = Peserta::where('kategori', '=', 'PUTRA')
            ->where('status', 'FINALIS')
            ->orderBy('point_final', 'desc')
            ->pluck('point_final')
            ->toArray();
        $data['point_putri'] = Peserta::where('kategori', '=', 'PUTRI')
            ->where('status', 'FINALIS')
            ->orderBy('point_final', 'desc')
            ->pluck('point_final')
            ->toArray();
        $data['label_putra'] = Peserta::where('kategori', '=', 'PUTRA')
            ->where('status', 'FINALIS')
            ->orderBy('point_final', 'desc')
            ->pluck('nama_peserta')
            ->toArray();
        $data['label_putri'] = Peserta::where('kategori', '=', 'PUTRI')
            ->where('status', 'FINALIS')
            ->orderBy('point_final', 'desc')
            ->pluck('nama_peserta')
            ->toArray();

        return view("admin.dashboard", compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function penjualan()
    {
        $voucher = Voucher::join('pesertas', 'vouchers.used_to', '=', 'pesertas.id')
            ->select(
                'vouchers.*',
                'pesertas.nama_peserta as nama_peserta',
                DB::raw('CONVERT_TZ(vouchers.created_at, "+00:00", "+07:00") as created_at_wib'),
                DB::raw('CONVERT_TZ(vouchers.updated_at, "+00:00", "+07:00") as updated_at_wib')
            )
            ->where('is_used', 1)
            ->where('periode', 'FINAL')
            ->get();

        return view("admin.laporan.laporanpenjualan", compact('voucher'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function peserta()
    {
        $peserta = Peserta::all()->where('status', 'FINALIS');
        return view("admin.laporan.laporankandidat", compact('peserta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        function generateRandomString($length = 12)
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $randomString = '';

            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }

            return $randomString;
        }
        $j = 0;
        $jumlah_voucher = $request->jumlah_voucher;

        for ($i = 0; $i < $jumlah_voucher; $i++) {
            do {
                $randomString = generateRandomString();
                $randomStringExists = Voucher::where('kode_voucher', $randomString)->exists();
                if (!$randomStringExists) {
                    $voucher = new Voucher();

                    $voucher->nominal = $request->nominal;
                    $voucher->periode = $request->periode;
                    $voucher->kode_voucher = $randomString;

                    $voucher->save();
                }
                $j++;
            } while ($randomStringExists && $j < 100);
        }

        return redirect()->route('voucher');
    }



    /**
     * Use voucher for vote.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function useVoucher(Request $request)
    {
        try {
            $expiredTime = strtotime('2023-12-2 10:00:00');
            $now = time();
            if ($now > $expiredTime) {
                throw new \Exception('Vote telah ditutup');
            }
            $request->validate([
                'kode_voucher' => 'required',
                'id_peserta' => 'required|numeric',
            ]);

            $kode_voucher = $request->kode_voucher;
            $id_peserta = $request->id_peserta;
            $voucher = Voucher::all()->where('kode_voucher', '=', $kode_voucher)->where('is_used', '=', 0)->where('periode', '=', 'FINAL')->first();

            if (!$voucher) {
                throw new \Exception('Voucher not found.');
            }

            $periode = $voucher->periode;
            $nominal = $voucher->nominal;
            $point = $nominal / 1000;

            $voucher->is_used = true;
            $voucher->used_to = $id_peserta;

            $peserta = Peserta::find($id_peserta);
            if ($periode == "FINAL") {
                $peserta->point_final = $point + $peserta->point_final;
            }

            DB::transaction(function () use ($voucher, $peserta) {
                $peserta->update();
                $voucher->update();
            });


            session(['nama_peserta' => $peserta->nama_peserta, 'nominal' => $nominal]);

            return redirect()->route('voting')->with('success', 'Voucher redeemed successfully.');
        } catch (\Exception $e) {
            return redirect()->route('voting')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher = Voucher::where('id', $id)->first();

        // hapus data
        $voucher->delete();

        return redirect()->back();
    }
}

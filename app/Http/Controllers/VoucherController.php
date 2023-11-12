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
        $voucher = Voucher::all();
        return view("admin.master.voucher.index", compact('voucher'));
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
            $request->validate([
                'kode_voucher' => 'required',
                'id_peserta' => 'required|numeric',
            ]);

            $kode_voucher = $request->kode_voucher;
            $id_peserta = $request->id_peserta;
            $voucher = Voucher::where('kode_voucher', $kode_voucher)->first();

            if (!$voucher) {
                throw new \Exception('Voucher not found.');
            }

            $periode = $voucher->periode;
            $nominal = $voucher->nominal;
            $point = 0;

            $pointMapping = [
                10000 => 10,
                20000 => 20,
                50000 => 50,
                100000 => 100,
            ];

            $point = $pointMapping[$nominal] ?? 0;

            $voucher->is_used = true;
            $voucher->used_to = $id_peserta;

            $peserta = Peserta::find($id_peserta);

            if ($periode == "SEMIFINAL") {
                $peserta->point_semifinal = $point + $peserta->point_semifinal;
            } else if ($periode == "FINAL") {
                $peserta->point_final = $point + $peserta->point_final;
            }

            DB::transaction(function () use ($voucher, $peserta) {
                $peserta->update();
                $voucher->update();
            });

            return redirect()->route('voting')->with('success', 'Voucher used successfully.');
        } catch (\Exception $e) {
            return redirect()->route('voting')->with('error', $e->getMessage());
        }
    }

    // public function useVoucher(Request $request)
    // {
    //     $kode_voucher = $request->kode_voucher;
    //     $id_peserta = $request->id_peserta;
    //     $voucher = Voucher::all()->where('kode_voucher', $kode_voucher)->first();
    //     if (!$voucher) {
    //         // Handle the case when the voucher is not found.
    //         return redirect()->route('voting')->with('error', 'Voucher not found.');
    //     }

    //     $periode = $voucher->periode;
    //     $nominal = $voucher->nominal;
    //     $pointMapping = [
    //         10000 => 10,
    //         20000 => 20,
    //         50000 => 50,
    //         100000 => 100,
    //     ];

    //     $point = $pointMapping[$nominal] ?? 0;

    //     if ($voucher) {
    //         $voucher->is_used = true;
    //         $voucher->used_to = $id_peserta;
    //         $peserta = Peserta::find($id_peserta);
    //         if ($periode == "SEMIFINAL") {
    //             $peserta->point_semifinal = $point + $peserta->point_semifinal;
    //         } else if ($periode == "FINAL") {
    //             $peserta->point_final = $point + $peserta->point_final;
    //         }
    //         $peserta->update();
    //         $voucher->update();
    //     }

    //     return redirect()->route('voting');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
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
        $voucher = Voucher::where('id', $id)->first();

        // hapus data
        $voucher->delete();

        return redirect()->back();
    }
}

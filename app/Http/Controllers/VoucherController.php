<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

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
        return view("frontend.voting", compact('voucher'));
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

        redirect("backend.laporanpenjualan");
    }

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

<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;
use App\Models\TransaksiHeader;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function list()
    {
        $trans = TransaksiHeader::all();
        return view('gudang.transaksi.list_transaksi', [
            'trans' => $trans
        ]);
    }

    public function konfirmasi($id)
    {
        try {
            $trans = TransaksiHeader::findOrFail($id);
            $trans->update([
                'status_transaksi' => 2,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil dikonfirmasi.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function batal(Request $request, $id)
    {
        try {
            $trans = TransaksiHeader::findOrFail($id);
            $trans->update([
                'status_transaksi' => 0,
                'deskripsi' => $request->description
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil dibatalkan.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function viewDetail($id)
    {
        $trans = TransaksiDetail::where('id_transaksi_header', $id)->get();
        return view('gudang.transaksi.list_transaksi_detail', [
            'trans' => $trans
        ]);
    }
}

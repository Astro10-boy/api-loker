<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lokers;
use Illuminate\Support\Facades\Validator;

class LokersController extends Controller
{

    //function get user
    public function index()
    {
        $loker = Lokers::all();

        return response()->json([
            'message' => 'Data user berhasil diambil',
            'data' => $loker
        ]);
    }

    //tambah loker
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_loker' => 'required|string',
            'status' => 'required|in:kosong,digunakan,pending,servis'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $loker = lokers::create([
            'nomor_loker' => $request->nomor_loker,
            'status' => $request->status
        ]);

        return response()->json([
            'message' => 'Loker berhasil ditambahkan',
            'data' => $loker],
            200);
    }
    // hapus loker berdasarkan id
public function destroy($id)
{
    $loker = Lokers::find($id);

    if (!$loker) {
        return response()->json([
            'message' => 'Loker tidak ditemukan'
        ], 404);
    }

    $loker->delete();

    return response()->json([
        'message' => 'Loker berhasil dihapus'
    ], 200);
}

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\penitipan;
use Illuminate\Support\Facades\Validator;

class PenitipanController extends Controller
{
    //get penitipan dengan data user dan loker
    public function index()
    {
        $penitipan = Penitipan::with(['user', 'loker'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Data penitipan berhasil diambil',
            'data' => $penitipan
        ]);
    }

    //tambah penitipan(post)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'loker_id' => 'required|exists:lokers,id',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'durasi_menit' => 'required|int',
            'biaya' => 'required|int',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $penitipan = Penitipan::create([
            'user_id' => $request->user_id,
            'loker_id' => $request->loker_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'durasi_menit' => $request->durasi_menit,
            'biaya' => $request->biaya,
        ]);

        return response()->json(['message' => 'Data penitipan berhasil ditambahkan', 'data' => $penitipan], 201);
    }
}

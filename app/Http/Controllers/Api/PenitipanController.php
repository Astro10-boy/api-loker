<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penitipan;
use Illuminate\Support\Facades\Validator;

class PenitipanController extends Controller
{
    // get penitipan dengan data loker (hilangkan user jika tidak ada)
    public function index()
    {
        $penitipan = Penitipan::with('loker')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data penitipan berhasil diambil',
            'data' => $penitipan
        ]);
    }

    // tambah penitipan (post)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'rfid' => 'required|string|max:255',
            'loker_id' => 'required|exists:lokers,id',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'durasi_menit' => 'required|integer',
            'biaya' => 'required|integer',
            // jangan validasi id, created_at, updated_at karena auto
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $penitipan = Penitipan::create([
            'nama' => $request->nama,
            'rfid' => $request->rfid,
            'loker_id' => $request->loker_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'durasi_menit' => $request->durasi_menit,
            'biaya' => $request->biaya,
        ]);

        return response()->json([
            'message' => 'Data penitipan berhasil ditambahkan',
            'data' => $penitipan
        ], 201);
    }
}

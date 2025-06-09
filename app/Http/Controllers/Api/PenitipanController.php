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
    'loker_id' => 'required|exists:lokers,id',
]);


    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $waktuMulai = now();
    $durasiDetik = 75; // Misalnya 75 detik untuk percobaan
    $waktuSelesai = (clone $waktuMulai)->addSeconds($durasiDetik);

    // Hitung biaya: tiap 30 detik = +1000
    $blok = ceil($durasiDetik / 30);
    $biaya = $blok * 1000;

    $penitipan = Penitipan::create([
        'nama' => $request->nama,
        'rfid' => '1234567890', // dummy
        'loker_id' => $request->loker_id,
        'waktu_mulai' => $waktuMulai,
        'waktu_selesai' => $waktuSelesai,
        'durasi_menit' => ceil($durasiDetik / 60), // boleh tetap pakai menit
        'biaya' => $biaya,
    ]);

    // Ubah status loker
    $penitipan->loker()->update(['status' => 'digunakan']);

    return response()->json([
        'message' => 'Data penitipan berhasil ditambahkan',
        'data' => $penitipan
    ], 201);
}
// Ambil semua penitipan berdasarkan loker_id
public function getByLoker($lokerId)
{
    $penitipan = Penitipan::where('loker_id', $lokerId)->orderBy('created_at', 'desc')->get();

    return response()->json([
        'success' => true,
        'message' => 'Riwayat penitipan berdasarkan loker',
        'data' => $penitipan
    ]);
}


}

<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\JenisAduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle  = 'Rekod Aduan';

        // Tarik data daripada table aduan menggunakan Model
        // $senaraiAduan = Aduan::paginate(5);
        // Tarik data daripada table aduan dan join dengan table jenis_aduan
        // $senaraiAduan = DB::table('aduan')->join();
        // $senaraiAduan = Aduan::join('jenis_aduan', 'aduan.jenis_aduan_id', '=', 'jenis_aduan.id')
        // ->join('users', 'aduan.user_id', '=', 'users.id')
        // ->select('aduan.*', 'jenis_aduan.nama as nama_jenis', 'users.name as nama_user', 'users.email') // Dapatkan semua data daripada table aduan DAN data nama daripada table jenis_aduan
        // ->paginate(5);
        $senaraiAduan = Aduan::with(['rekodUser', 'jenisAduan'])->paginate(5);

        // Cara 1 untuk attach / passing data untuk digunakan di dalam template - method with()
        // return view('pengguna.aduan.template-senarai-aduan')
        // ->with('senaraiAduan', $senaraiAduan)
        // ->with('pageTitle', $pageTitle);

        // Cara 2 untuk attach / passing data untuk digunakan di dalam template - method array()
        // return view('pengguna.aduan.template-senarai-aduan', [
        //     'senaraiAduan' => $senaraiAduan,
        //     'pageTitle' => $pageTitle
        // ]);

        // Cara 3 untuk attach / passing data untuk digunakan di dalam template - method compact()
        return view('pengguna.aduan.template-senarai-aduan', compact('senaraiAduan', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tarik data daripada table jenis_aduan menggunakan Query Builder
        $senaraiJenisAduan = DB::table('jenis_aduan')->select('id', 'nama')->get();

        return view('pengguna.aduan.template-aduan-baru', compact('senaraiJenisAduan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis_aduan_id' => 'required|integer|exists:jenis_aduan,id',
            'tajuk' => 'required',
            'kandungan' => 'required',
            'lampiran' => ['nullable', 'sometimes', 'file', 'mimes:pdf,docx,doc,png,jpg,jpeg', 'max:2048'],
        ]);

        // Cara 1 simpan data ke dalam table aduan menggunakan Model - method new object
        // $aduan = new Aduan;
        // $aduan->user_id = auth()->user()->id; // auth()->id()
        // $aduan->jenis_aduan_id = $data['jenis_aduan_id']; // $request->input('jenis_aduan_id');
        // $aduan->tajuk = $data['tajuk']; // $request->input('tajuk');
        // $aduan->kandungan = $data['kandungan']; // $request->input('kandungan');
        // $aduan->created_at = now();
        // $aduan->save();

        // Attach data user_id ke $data utama
        $data['user_id'] = auth()->user()->id; // auth()->id()

        // Semak jika ada lampiran yang perlu diupload?
        if ($request->hasFile('lampiran'))
        {
            // Contoh Upload file ke default storage iaitu local = storage/app/private
            // $data['lampiran'] = $request->file('lampiran')->store('attachments');

            // Contoh upload file ke custom storage disk iaitu public_uploaded
            $data['lampiran'] = $request->file('lampiran')->store('attachments', 'public_uploaded');
        }

        // Cara 2 simpan data ke dalam table aduan menggunakan Model - method create()
        Aduan::create($data);

        // Bagi respons ke halaman utama setelah data disimpan
        return redirect()->route('name.aduan.index')->with('mesej-sukses', 'Rekod berjaya disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function download(string $id)
    {
        // Dapatkan rekod download berdasarkan ID aduan
        $aduan = Aduan::findOrFail($id);

        // Download file daripada storage local
        return Storage::download($aduan->lampiran);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Dapatkan rekod aduan berdasarkan ID
        // $aduan = Aduan::where('id', '=', $id)->first(); // ->firstOrFail()
        // $aduan = Aduan::whereId($id)->first();
        // $aduan = Aduan::find($id); // Syarat guna find, hanya terpakai untuk carian nombor ID
        $aduan = Aduan::findOrFail($id);

        // Tarik data daripada table jenis_aduan menggunakan Query Builder
        $senaraiJenisAduan = JenisAduan::select('id', 'nama')->get();

        // Panggil template borang edit aduan dan pass / attach data aduan dan senaraiJenisAduan
        return view('pengguna.aduan.template-aduan-edit', compact('aduan', 'senaraiJenisAduan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'jenis_aduan_id' => 'required|integer|exists:jenis_aduan,id',
            'tajuk' => 'required',
            'kandungan' => 'required',
            'lampiran' => ['nullable', 'sometimes', 'file', 'mimes:pdf,docx,doc,png,jpg,jpeg', 'max:2048'],
        ]);

        // Dapatkan rekod aduan berdasarkan ID
        $aduan = Aduan::findOrFail($id);
        // $aduan->jenis_aduan_id = $data['jenis_aduan_id']; // $request->input('jenis_aduan_id');
        // $aduan->tajuk = $data['tajuk']; // $request->input('tajuk');
        // $aduan->kandungan = $data['kandungan']; // $request->input('kandungan');
        // $aduan->updated_at = now();
        // $aduan->save();

        $aduan->update($data);

        // Bagi respons ke halaman utama setelah data disimpan
        return redirect()->route('name.aduan.index')->with('mesej-sukses', 'Rekod berjaya disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Dapatkan rekod aduan berdasarkan ID
        $aduan = Aduan::findOrFail($id);
        $aduan->delete();

        // Bagi respons ke halaman utama setelah data disimpan
        return redirect()->route('name.aduan.index')->with('mesej-sukses', 'Rekod berjaya dihapus');
    }
}

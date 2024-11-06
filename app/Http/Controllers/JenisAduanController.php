<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisAduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Tarik data daripada table jenis_aduan
        $senaraiJenisAduan = DB::table('jenis_aduan')->paginate(5); // SELECT * FROM jenis_aduan

        return view('pengguna.jenis-aduan.template-index', compact('senaraiJenisAduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.jenis-aduan.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
        ]);

        DB::table('jenis_aduan')->insert($data);

        return redirect()->route('jenis-aduan.index')->with('mesej-sukses', 'Rekod berjaya disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // SELECT * FROM jenis_aduan WHERE id = $id LIMIT 1
        $jenisAduan = DB::table('jenis_aduan')->where('id', '=', $id)->first();

        return view('pengguna.jenis-aduan.template-edit', compact('jenisAduan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama' => 'required',
        ]);

        // Kemaskini rekod berdasarkan ID
        DB::table('jenis_aduan')->where('id', '=', $id)->update($data);

        return redirect()->route('jenis-aduan.index')->with('mesej-sukses', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('jenis_aduan')->where('id', '=', $id)->delete();

        return redirect()->route('jenis-aduan.index')->with('mesej-sukses', 'Rekod berjaya dihapuskan');
    }
}

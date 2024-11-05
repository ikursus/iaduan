<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle  = 'Rekod Aduan';

        // Contoh data senarai aduan
        $senaraiAduan = [
            ['id' => 1, 'tajuk' => 'Tajuk 1', 'kandungan' => 'Kandungan 1', 'tarikh' => '2024-11-01', 'status' => 'Selesai'],
            ['id' => 2, 'tajuk' => 'Tajuk 2', 'kandungan' => 'Kandungan 2', 'tarikh' => '2024-11-02', 'status' => 'Dalam Proses'],
            ['id' => 3, 'tajuk' => 'Tajuk 3', 'kandungan' => 'Kandungan 3', 'tarikh' => '2024-11-03', 'status' => 'Baru'],
            ['id' => 4, 'tajuk' => 'Tajuk 4', 'kandungan' => 'Kandungan 4', 'tarikh' => '2024-11-04', 'status' => 'Baru'],
            ['id' => 5, 'tajuk' => 'Tajuk 5', 'kandungan' => 'Kandungan 5', 'tarikh' => '2024-11-05', 'status' => 'Baru'],
        ];

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
        $senaraiJenisAduan = [
            'pokok' => 'Pokok',
            'sampah' => 'Sampah',
            'jalan' => 'Jalan',
            'bangunan' => 'Bangunan',
            'lain' => 'Lain-lain',
        ];

        return view('pengguna.aduan.template-aduan-baru', compact('senaraiJenisAduan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tajuk' => 'required',
            'kandungan' => 'required',
            'lampiran' => ['nullable', 'sometimes', 'file', 'mimes:pdf,docx,doc,png,jpg,jpeg', 'max:2048'],
        ]);

        dd($data);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

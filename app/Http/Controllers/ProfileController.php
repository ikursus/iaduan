<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    /**
     * Show the form for editing.
     */
    public function edit()
    {
        // Tarik data role
        $senaraiRole = Role::select('name')->get();

        return view('pengguna.template-profile', compact('senaraiRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Proses validasi
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|sometimes|digits_between:10,13',
            // 'password' => ['required', 'min:3', 'confirmed'],
            // 'role' => 'required',
        ]);

        // Semak jika ruang password diisi
        // Jika ada password diisi, maka buat validasi dan encrypt password
        // Kemudian attachkan $data password ke $data utama
        if ($request->filled('password')) {

            $request->validate([
                'password' => ['required', 'min:3', 'confirmed'],
            ]);

            $data['password'] = bcrypt($request->password);
        }

        // Cara 1 kemaskini data ke dalam table users menggunakan query builder
        // kemaskini data ke dalam table users
        DB::table('users')
        ->where('id', auth()->id()) // ->where('id', auth()->user()->id)
        ->update($data);

        // Dapatkan rekod user menerusi Model
        $user = User::find(auth()->id());
        // Update role akaun user ini.
        $user->syncRoles($request->input('role'));

        // Jika tiada sebarang masalah dengan proses kemaskini data, maka
        // redirect ke halaman edit profile bersama flash message sukses
        return redirect()->route('name.profile.edit')
        ->with('mesej-sukses', 'Profile telah dikemaskini.');
    }

}

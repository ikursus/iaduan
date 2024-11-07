<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    // Tetapkan nama table yang akan digunakan
    protected $table = 'aduan';

    // Tetapkan mass assignment
    protected $fillable = [
        'user_id',
        'jenis_aduan_id',
        'tajuk',
        'kandungan',
        'lampiran',
        'status',
    ];

    // Tetapkan relation diantara table aduan dan table jenis_aduan
    // Relation yang berlaku adalah one to one (reverse)
    public function jenisAduan()
    {
        // Jika ikut naming convention iaitu relation berlaku dari 'aduan' ke 'jenis_aduan'
        // menggunakan nama column 'jenis_aduan_id' di table aduan
        // dan nama column 'id' di table jenis_aduan
        // maka code relation belongsTo hanya perlu tulis seperti berikut
        // $this->belongsTo(JenisAduan::class);

        // Sekiranya relation berlaku dari 'jenis_aduan' ke 'aduan'
        // tidak mengikut naming convention, code relation belongsTo perlu ditulis seperti berikut
        // iaitu dengan menyatakan relation berlaku di column mana
        return $this->belongsTo(JenisAduan::class, 'jenis_aduan_id', 'id');
    }

    public function rekodUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

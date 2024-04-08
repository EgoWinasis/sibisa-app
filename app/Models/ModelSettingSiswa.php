<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSettingSiswa extends Model
{
    use HasFactory;

    protected $table = 'setting_siswa'; // Assuming the table name is 'setting_siswa'

    protected $fillable = ['id_tahun_ajaran','kelas'];

    public function students()
    {
        return $this->belongsToMany(Students::class, 'setting_data_siswa', 'id_tahun_ajaran', 'student_id');
    }
}

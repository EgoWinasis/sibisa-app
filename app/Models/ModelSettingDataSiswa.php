<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSettingDataSiswa extends Model
{
   
    use HasFactory;

    protected $table = 'setting_data_siswa'; // Assuming the table name is 'setting_data_siswa'

    protected $fillable = ['id_setting_siswa', 'id_student'];

    public function settingSiswa()
    {
        return $this->belongsTo(ModelSettingSiswa::class, 'id_setting_siswa', 'id');
    }
}

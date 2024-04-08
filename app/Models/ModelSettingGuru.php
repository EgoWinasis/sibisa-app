<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSettingGuru extends Model
{
    use HasFactory;
    protected $table = 'setting_guru'; // Specify the table name

    protected $fillable = [
        'id_tahun_ajaran',
        'id_guru1',
        'id_guru2',
        'id_guru3',
        'id_guru4',
        'id_guru5',
        'id_guru6',
    ];
}

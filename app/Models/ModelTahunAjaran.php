<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTahunAjaran extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajaran'; 
    protected $primaryKey = 'id'; 
    public $timestamps = true;

}

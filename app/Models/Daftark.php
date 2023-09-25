<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftark extends Model
{
    use HasFactory;
    protected $table = 'daftark';
    // protected $fillable = ['nama_karyawan','departemen','unit','posisi','status'];
    protected $guarded=[];

    public function jenjangkarir()
    {
        return $this->hasMany('App\Models\Jenjangkarir');
    }

    public function jenjangkarirTerbaru()
    {
        return $this->jenjangkarir->last();
    }
}

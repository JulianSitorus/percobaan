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

    public function kpi()
    {
        return $this->hasMany('App\Models\Kpi');
    }

    public function evaluasi()
    {
        return $this->hasMany('App\Models\Evaluasi');
    }

    public function jenjangkarir()
    {
        return $this->hasMany('App\Models\Jenjangkarir');
    }

    public function keahlian()
    {
        return $this->hasMany('App\Models\Keahlian');
    }

    public function pelatihan()
    {
        return $this->hasMany('App\Models\Pelatihan');
    }

    public function provinces()
    {
    	return $this->hasOne('App\Models\Province');
    }
    
}

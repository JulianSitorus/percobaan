<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjangkarir extends Model
{
    use HasFactory;
    protected $table = 'jenjangkarir';
    // protected $fillable = ['departemen','unit','posisi','tanggal_mulai','tanggal_selesai'];
    protected $guarded=[];

    public function daftark()
    {
        return $this->belongsTo('App\Models\Daftark');
    }

    public function departemen()
    {
        return $this->hasOne('App\Models\Departemen');
    }
}

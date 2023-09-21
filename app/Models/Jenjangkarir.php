<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjangkarir extends Model
{
    use HasFactory;
    protected $table = 'jenjangkarir';
    // protected $fillable = ['departemen','unit','posisi'];
    protected $guarded=[];

    public function daftark()
    {
        return $this->belongsTo('App\Models\Daftark');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    protected $table = 'departemen';
    protected $guarded=[];

    public function jenjangkarir()
    {
        return $this->belongsTo('App\Models\Jenjangkarir');
    }

    public function unit()
    {
        return $this->hasMany('App\Models\Unit');
    }
}

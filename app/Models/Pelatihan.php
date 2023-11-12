<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $table='pelatihan';
    protected $guarded=[];

    public function daftark()
    {
        return $this->belongsTo('App\Models\Daftark');
    }

    public function provinces()
    {
    	return $this->hasOne('App\Models\Province');
    }

    public function countries()
    {
    	return $this->hasOne('App\Models\Country');
    }
}

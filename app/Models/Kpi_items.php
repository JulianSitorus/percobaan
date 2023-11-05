<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi_items extends Model
{
    use HasFactory;
    protected $table='kpi_items';
    protected $guarded=[];

    public function kpi()
    {
        return $this->belongsTo('App\Models\Kpi');
    }
}

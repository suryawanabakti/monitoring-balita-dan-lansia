<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamKesehatan extends Model
{
    protected $guarded = ['id'];

    public $table = 'rekam_kesehatan';

    public function balita()
    {
        return $this->belongsTo(Balita::class);
    }
    public function lansia()
    {
        return $this->belongsTo(Lansia::class);
    }
}

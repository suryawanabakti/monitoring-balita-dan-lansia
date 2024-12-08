<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamKesehatan extends Model
{
    protected $guarded = ['id'];
    public $table = 'rekam_kesehatan';

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}

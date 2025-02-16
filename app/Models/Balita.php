<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    protected $guarded = ['id'];
    public $table = 'balita';

    public function rekamkesehatan()
    {
        return $this->hasMany(RekamKesehatan::class, 'pasien_id', 'pasien_id');
    }
}

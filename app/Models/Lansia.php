<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lansia extends Model
{

    protected $guarded = ['id'];
    public $table = 'lansia';

    public function rekamkesehatan()
    {
        return $this->hasMany(RekamKesehatan::class, 'pasien_id', 'pasien_id');
    }
}

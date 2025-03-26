<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lansia extends Model
{

    protected $guarded = ['id'];
    public $table = 'lansia';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rekamkesehatan()
    {
        return $this->hasMany(RekamKesehatan::class, 'lansia_id', 'id');
    }
}

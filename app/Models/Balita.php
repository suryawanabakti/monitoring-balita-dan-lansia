<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    protected $guarded = ['id'];
    public $table = 'balita';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rekamkesehatan()
    {
        return $this->hasMany(RekamKesehatan::class, 'balita_id', 'id');
    }
}

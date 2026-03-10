<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTrack extends Model
{
    protected $fillable = ['user_id', 'fecha', 'entrada', 'salida', 'tipo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}